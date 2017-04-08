<h1>Create task</h1>
<p>Please fill out the following fields to signup:</p>

<?php 
	use \yii\widgets\ActiveForm;
    use \app\models\User;
    use kartik\typeahead\TypeaheadBasic;



	$this->title = 'Create';
	$this->params['breadcrumbs'][] = $this->title;
?>


<div class="task-form">



    <?php $form = ActiveForm::begin(); ?>

    <?php
        $sdata = User::find()->select('username')->asArray()->all();
        foreach ($sdata as $value) {
            $data[]= $value['username'];
        }
    // TypeaheadBasic usage with ActiveForm and model
        echo $form->field($model, 'employer')->widget(TypeaheadBasic::classname(), [
        'data' => $data,
        'pluginOptions' => ['highlight' => true],
        'options' => ['placeholder' => 'Filter as you type ...'],
        ]);
    ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_deskription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deadline')->textInput() ?>

    <?= $form->field($model, 'start_task')->textInput() ?>

    <?= $form->field($model, 'estimation')->textInput() ?>

    <?= $form->field($model, 'trak_time')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>