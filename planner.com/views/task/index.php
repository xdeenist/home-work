<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">
    <script src="/web/js/nb.js"></script>
    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->
<!--        --><?//= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'task_id',
            'owner',
            'employer',
            'parent_task',
            'task_name',
             'task_deskription:ntext',
             'deadline',
//             'start_task',
             'estimation',
             'track_time:datetime',
             'status',
             'dell',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
