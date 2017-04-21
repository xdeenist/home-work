<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Timetracking extends ActiveRecord {

	public static function WorkTime($id){
        return Timetracking::find()->select(['TIMESTAMPDIFF(hour, start, pause)'])->where(['task_id' => $id])->sum('TIMESTAMPDIFF(hour, start, pause)');
    }

    public static function TimeTrack($id){
    	return Timetracking::find()->limit(1)->where(['task_id' => $id])->orderBy(['start' => SORT_DESC])->asArray()->one();
    }

    public static function lastActivity($id){
        $timetrack = self::TimeTrack($id);
    	if (is_null($timetrack['pause'])) {
            if (is_null($timetrack['start'])) {
                $lastactivity['status'] = "Not activity";
                $lastactivity['time'] = 0;
                return $lastactivity;
            } else { 
                $lastactivity['status'] = "start";
                $lastactivity['time'] = $timetrack['start'];
                return $lastactivity; 
            }            
        } else { 
            $lastactivity['status'] = "pause";
            $lastactivity['time'] = $timetrack['pause'];
            return $lastactivity; 
        }
    }
}