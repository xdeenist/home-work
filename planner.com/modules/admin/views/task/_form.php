<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'owner')->textInput() ?>

    <?= $form->field($model, 'employer')->textInput() ?>

    <?= $form->field($model, 'parent_task')->textInput() ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_deskription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deadline')->textInput() ?>

    <?= $form->field($model, 'percentcomplete')->textInput() ?>

    <?= $form->field($model, 'estimation')->textInput() ?>

    <?= $form->field($model, 'track_time')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dell')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
