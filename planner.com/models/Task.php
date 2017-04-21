<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "task".
 *
 * @property string $task_id
 * @property int $owner
 * @property string $employer
 * @property int $parent_task
 * @property string $task_name
 * @property string $task_deskription
 * @property string $deadline
 * @property string $start_task
 * @property int $estimation
 * @property int $track_time
 * @property string $status
 * @property int $dell
 */
class Task extends ActiveRecord
{
    public $items = [];
    public $arrayitems = [];
    public $file;
    public $ntskid;

    // public $indent = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner', 'parent_task', 'estimation', 'track_time', 'dell'], 'integer'],
            [['task_name'], 'required'],
            [['task_deskription'], 'string'],
            [['deadline', 'start_task'], 'safe'],
            [['employer'], 'string', 'max' => 50],
            [['task_name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 225],
            [['file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'owner' => 'Owner',
            'employer' => 'Employer',
            'parent_task' => 'Parent Task',
            'task_name' => 'Task Name',
            'task_deskription' => 'Task Deskription',
            'deadline' => 'Deadline',
            'percentcomplete' => 'Percent Complete',
            'estimation' => 'Estimation',
            'track_time' => 'Track Time',
            'status' => 'Status',
            'dell' => 'Dell',
        ];
    }
    
    public function SelectNoParrent(){
        Yii::$app->session->open();
            $user_id = Yii::$app->user->id;
            return Task::find()->where(['owner' => $user_id, 'parent_task' => NULL])->all();      
    }

    public function SelectParrent($arr, $indent){
        // $timetrack = Timetracking::find()->limit(1)->where(['task_id' => $arr->task_id])->orderBy(['start' => SORT_DESC])->asArray()->one();
        $lastactivity = Timetracking::lastActivity($arr->task_id);
        if (is_null($arr->parent_task)) {
            $parent = 0;
        } else {$parent = $arr->parent_task;}
        if ($lastactivity['time'] == 0) {
            $lastactivity['time'] = "Not activity";
        }
        $this->items['id'] = $arr->task_id; 
        $this->items['indent'] = $indent; 
        $this->items['parent'] = $parent; 
        $this->items['title'] = $arr->task_name; 
        $this->items['duration'] = $arr->estimation; 
        $this->items['percentComplete'] = $arr->percentcomplete; 
        $this->items['start'] = $lastactivity['time']; 
        $this->items['finish'] = $arr->status; 
        $this->items['effortDriven'] = 0;    
        array_push($this->arrayitems, $this->items);

        Yii::$app->session->open();
            $user_id = Yii::$app->user->id;
        $parent_arr = Task::find()->where(['owner' => $user_id, 'parent_task' => $arr->task_id])->all(); 
        for ($i=0; $i < count($parent_arr); $i++) { 
            $this->SelectParrent($parent_arr[$i], $i+1);
        }

        return $this->arrayitems;
    }

    public function SelectNoTree($arrayitems){
        $user_id = Yii::$app->user->id;
        $res = Task::find()->where(['owner' => $user_id])->andWhere(['not', ['parent_task' => null]])->all();
        for ($i=0; $i < count($res); $i++) {
            if (is_null($res[$i]->parent_task)) {
                $parent = 0;
            } else {
                $parent = $res[$i]->parent_task;
            }

            $lastactivity = Timetracking::lastActivity($res[$i]->task_id);
            if ($lastactivity['time'] == 0) {
                $lastactivity['time'] = "Not activity";
            }

            $this->items['id'] = $res[$i]->task_id;
            $this->ntskid = $res[$i]->task_id;
            $this->items['indent'] = 0; 
            $this->items['parent'] = $parent; 
            $this->items['title'] = $res[$i]->task_name; 
            $this->items['duration'] = $res[$i]->estimation; 
            $this->items['percentComplete'] = $res[$i]->percentcomplete; 
            $this->items['start'] = $lastactivity['time']; 
            $this->items['finish'] = $res[$i]->status; 
            $this->items['effortDriven'] = 0;
            $aa = array_filter($arrayitems,function($a){
                                            return $a["id"] == $this->ntskid;
                                        }); 
            if (!$aa) {
                array_push($arrayitems, $this->items);  
            }              
        }
        return $arrayitems;
    }

    public function getResource()
    {
        return $this->hasMany(Resource::className(),['task_id' => 'res_id']);
    }
}
