<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property string $task_id
 * @property integer $owner
 * @property integer $employee
 * @property integer $parent_task
 * @property string $task_name
 * @property string $task_deskription
 * @property string $deadline
 * @property string $start_task
 * @property integer $estimation
 * @property integer $trak_time
 * @property string $status
 */
class Task extends \yii\db\ActiveRecord
{
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
            [['owner', 'parent_task', 'task_name', 'status'], 'required'],
            [['owner', 'employee', 'parent_task', 'estimation', 'trak_time'], 'integer'],
            [['task_deskription'], 'string'],
            [['deadline', 'start_task'], 'safe'],
            [['task_name'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 225],
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
            'employee' => 'Employee',
            'parent_task' => 'Parent Task',
            'task_name' => 'Task Name',
            'task_deskription' => 'Task Deskription',
            'deadline' => 'Deadline',
            'start_task' => 'Start Task',
            'estimation' => 'Estimation',
            'trak_time' => 'Trak Time',
            'status' => 'Status',
        ];
    }
}
