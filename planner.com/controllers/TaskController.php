<?php

namespace app\controllers;

use app\models\Neo;
use Yii;
use yii\helpers\Json;
use app\models\Task;
use app\models\User;
use app\models\Timetracking;
use app\models\Dependence;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Notice;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionTask($id)
    {               
        $model = $this->findModel($id);
        $owner = User::getUserName($model->owner);        
        $employer = User::getUserName($model->employer);
        $lastactivity = Timetracking::lastActivity($id);
        $worktime = Timetracking::WorkTime($id);

        if ($model->employer == 0) {
            $this->redirect('/task/update' . "/" . $id);
        }

        if (isset($_POST['accept'])) { 
            if ($model->status == "WaitSubmit") {
                $model->status = "InWork";
                $model->employer = "$model->employer";
                $model->update();
                $this->updateNotice($id);
                $this->createNotice($id, $model, "owner" ," was accepted!");
            } elseif ($model->status == "WaitConfirm") {
                $model->status = "Finish";
                $model->employer = "$model->employer";
                $model->update();
                $this->updateNotice($id);
                $this->createNotice($id, $model, "employer" ," was accepted!");
                $del_dep = Dependence::find()->where(['dep_task_id' => $id ])->one(); // drop where dep_task_id = $id
                if ($del_dep) {
                    $del_dep->delete();
                }
                
            }
        } elseif (isset($_POST['discard'])) {
            if ($model->status == "WaitSubmit") {
                $model->status = "NotAccepted";
                $model->employer = "0";
                $model->update();
                $this->updateNotice($id);
                $this->createNotice($id, $model, "owner" ," was not accepted!");
            } elseif ($model->status == "WaitConfirm") {
                $model->status = "InWork";
                $model->employer = "$model->employer";
                $model->update();
                $this->updateNotice($id);
                $this->createNotice($id, $model, "employer" ," was not accepted!");
            }
        }

        $denendence = Dependence::find()->where(['task_id' => $id])->asArray()->all();
        if (isset($denendence[0]['task_id'])) {
            $denendence = 1;
        } else  { 
            $denendence = 0; 
        }

        if (isset(Yii::$app->user->id)) {
            $notice = Notice::find()->where(['user_id' => Yii::$app->user->id, 'task_id' => $id, 'read_n' => NULL])->one();
            if ($notice) {
                if ($model->status == "WaitSubmit" || $model->status == "WaitConfirm") {
                    $control = 'submit';
                    } else if ($model->owner == Yii::$app->user->id || $model->employer == Yii::$app->user->id) { 
                    $control = "fullcontrol";
                    }               
                } else if ($model->owner == Yii::$app->user->id || $model->employer == Yii::$app->user->id) { 
                $control = "fullcontrol";
            } else { 
                $control = false;
            }
    
            if ($model->employer == Yii::$app->user->id) {
                    $controlEmployer = 1; 
            } else { 
                $controlEmployer = 0; 
            }
             
        } else {
            $control = false;
            $controlempl = 0;
        }


        return $this->render('task', [
            'model' => $model,
            'owner' => $owner,
            'employer' => $employer,
            'lastactivity' => $lastactivity,
            'worktime' => $worktime,
            'id' => $id,
            'denendence' => $denendence,
            'control' => $control,
            'controlEmployer' => $controlEmployer
        ]);
    }

    public function actionMyTasks()
    {
        $model = new Task();     
        return $this->render('mytasks', [
            'model' => $model
        ]);
    }


    public function actionGetTasks(){
        $model = new Task();
                $res_arr = $model->SelectNoParrent();
        for ($i=0; $i < count($res_arr); $i++) { 
            $items = $model->SelectParrent($res_arr[$i], 0);
        }
        $allitems = $model->SelectNoTree($items);
        echo Json::encode($allitems);   
        
    }

    public function actionSetTimeTracking($taskId, $state){
        $model = new Timetracking();
        Yii::$app->session->open();
        $user_id = Yii::$app->user->id;
        $date = date('Y-m-d H:i:s');
        if ($state == "play" || $state == "resume") {
            $model->user_id = $user_id;
            $model->task_id = $taskId;
            $model->start = $date;
            $model->save();
        } elseif ($state == "pause") {
            $pause = Timetracking::find()->where(['pause' => NULL, 'task_id' => $taskId])->one();
            $pause->pause = $date;
            $pause->update();
        } elseif ($state == "stop") {
            $stop = Timetracking::find()->where(['pause' => NULL, 'task_id' => $taskId])->one();
            if (is_null($stop)) {
                $tsk_model = Task::find()->where(['task_id' => $taskId])->one();
                $tsk_model->status = 'WaitConfirm';
                $tsk_model->employer = "$tsk_model->employer";
                $tsk_model->track_time = Timetracking::WorkTime($taskId);
                $tsk_model->update();
                $not = new Notice;
                $not->user_id = $tsk_model->owner;
                $not->task_id = $taskId;
                $not->notice_text = "Task " . "'" . $tsk_model->task_name . "'" . " wait to submit!";
                $not->save();            
            } else {
                $pause = Timetracking::find()->where(['pause' => NULL,'task_id' => $taskId])->one();
                $pause->pause = $date;
                $pause->update();
                $tsk_model = Task::find()->where(['task_id' => $taskId])->one();
                $tsk_model->status = 'WaitConfirm'; 
                $tsk_model->employer = "$tsk_model->employer";
                $tsk_model->track_time = Timetracking::WorkTime($taskId);              
                $tsk_model->update();
                $not = new Notice;
                $not->user_id = $tsk_model->owner;
                $not->task_id = $taskId;
                $not->notice_text = "Task " . "'" . $tsk_model->task_name . "'" . " wait to submit!";
                $not->save();            
            }
        }
    }

    /**
    * Prepare data to view fill info for task
    */

    public function actionGetFullTask($id){
        $fullRes = Task::find()->where(['task_id' => $id])->asArray()->one();

        $employer = User::findOne($fullRes['employer']);
        $fullRes['employerId'] = $fullRes['employer'];
        $owner = User::findOne($fullRes['owner']);                
        $fullRes['employer'] = $employer->username;        
        $fullRes['owner']= $owner->username;

        $worktime = Timetracking::WorkTime($id);
        if (is_null($worktime)) {
            $fullRes['worktime'] = 0;
            } else {
                $fullRes['worktime'] = $worktime;
            }
        if (is_null($fullRes['percentcomplete'])) {
                   $fullRes['percentcomplete'] = "0";
            } else {$fullRes['percentcomplete'] = $fullRes['percentcomplete'];}      

        $fullRes['lastactivity'] = Timetracking::lastActivity($id);

        echo Json::encode($fullRes);
    }

    /**
     * Displays a single Task model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {  
        $model = new Task();
        if (Yii::$app->request->post()) {
            $us_id = User::getUserId(Yii::$app->request->post()['Task']["employer"]);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $newid = $model->task_id;
            $upd = Task::findOne($newid);
            $upd->owner = $us_id['owner_id'];
            $upd->employer = $us_id['empl_id'];
            if (is_numeric($id)) {
                $upd->parent_task = $id;
                $depen = new Dependence;
                $depen->task_id =  $id;
                $depen->dep_task_id = $newid;
                $depen->save();
            }
            $upd->update();
            $not = new Notice;
            $not->user_id = $upd->employer;
            $not->task_id = $newid;
            $not->notice_text = "Task " . "'" . $upd->task_name . "'" . " wait to submit!";
            $not->save();

            return $this->redirect('/task/task' . "/" . $newid);             
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        Yii::$app->session->open();
        $model = $this->findModel($id);
        if ($model->owner != Yii::$app->user->id) {
            return $this->redirect('/user/personal-area');
        }

        $username  = User::getUserName($model->employer);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $us_id = User::getUserId(Yii::$app->request->post()['Task']["employer"]);
            $upd = Task::findOne($id);
            $upd->employer = $us_id['empl_id'];
            $upd->status = 'InWork';
            $upd->update();
            $this->updateNotice($model->task_id);
            return $this->redirect('/task/task'. "/" . $model->task_id);
        } else {
            return $this->render('update', [
                'model' => $model,
                'username' => $username
            ]);
        }
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('This task does not exist.');
        }
    }

    public function updateNotice($id){
        $not = Notice::find()->where(['user_id' => Yii::$app->user->id, 'task_id' => $id, 'read_n' => NULL])->one();
        $not->read_n = 1;
        $not->update();
    }

    public function createNotice($id, $model, $user ,$mes){
        $newnot = new Notice;
        $newnot->user_id = $model->$user;
        $newnot->task_id = $id;
        $newnot->notice_text = "Task " . "'" . $model->task_name . "'" . $mes;
        $newnot->save(); 
    }

}
