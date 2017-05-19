<?php

namespace app\modules\admin\controllers;

use app\models\Notice;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;
use app\models\Resource;





class TableController extends Controller
{
    static $models = ["User" => "User",
                      "Resource" => "Resource",
                      "Notice" => "Notice",
                      "Task" => "Task",
                     ];

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['*'],
                    ],
                ],
            ],
        ];
    }

    public function actionUpdate($model, $id, $key, $value){
        $rec = call_user_func("app\\models\\$model::findOne",$id);
        $rec->$key = $value;
        $rec->save();
        return json_encode(["errorMessage" => false, "alert" => "Save successfully"]);
    }

    public function actionDelete($model, $id){
        $rec = call_user_func("app\\models\\$model::findOne",$id);
        $rec->delete();
        return json_encode(["errorMessage" => false, "alert" => "Deleted successfully"]);
    }

    public function actionModels(){
        return json_encode(self::$models);
    }


    public function actionData($model){
//        $model   = self::$models[0];
        $records = call_user_func("app\\models\\$model::find")->all();

        $result = [];
        foreach ($records as $rec){
            $record = [];
            foreach ($rec as $key => $value){
                $record[$key] = $value;
            }

            $result[] = $record;
            $keys     = array_keys($record);
        }

        return json_encode([$keys, $result]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
