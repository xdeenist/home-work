<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->task_name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('View task', ['/task/task/' . $model->task_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['/task/update/' . $model->task_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['/task/delete/' . $model->task_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'task_id',
            'owner',
            'employer',
            'parent_task',
            'task_name',
            'task_deskription:ntext',
            'deadline',
            'estimation',
            // 'track_time:datetime',
            'status',
            'dell',
        ],
    ]) ?>

</div>
