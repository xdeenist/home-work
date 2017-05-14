<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property string $task_id
 * @property int $owner
 * @property int $employer
 * @property int $parent_task
 * @property string $task_name
 * @property string $task_deskription
 * @property string $deadline
 * @property int $percentcomplete
 * @property int $estimation
 * @property int $track_time
 * @property string $status
 * @property int $dell
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
            [['owner', 'employer', 'parent_task', 'percentcomplete', 'estimation', 'track_time', 'dell'], 'integer'],
            [['task_name'], 'required'],
            [['task_deskription'], 'string'],
            [['deadline'], 'safe'],
            [['task_name', 'status'], 'string', 'max' => 255],
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
            'percentcomplete' => 'Percentcomplete',
            'estimation' => 'Estimation',
            'track_time' => 'Track Time',
            'status' => 'Status',
            'dell' => 'Dell',
        ];
    }
}
