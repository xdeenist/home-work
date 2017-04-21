<h1>Update task</h1>
<p>Please fill out the following fields to signup:</p>

<?php
use \yii\widgets\ActiveForm;
use \app\models\User;
use kartik\typeahead\TypeaheadBasic;
use dosamigos\datepicker\DatePicker;
$deadlinetask=10;


$this->title = 'Update';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="/web/js/jquery-3.2.1.min.js"></script>

<div class="task-form">



    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php
    $sdata = User::find()->select('username')->asArray()->all();
    foreach ($sdata as $value) {
        $data[]= $value['username'];
    }
    // TypeaheadBasic usage with ActiveForm and model
    echo $form->field($model, 'employer')->widget(TypeaheadBasic::classname(), [
        'data' => $data,
        'pluginOptions' => ['highlight' => true],
        'options' => ['placeholder' => 'Filter as you type ...', 'value' => $username],
        ]);
    ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'task_deskription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deadline')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'estimation')->textInput(['type' => 'number', 'min' => 1, 'max' => $deadlinetask]) ?>

    <p><b>Upload Files and Url</b></p>
    <button class="btn btn-default col-md-2" id="uploadurl">URL</button><button class="btn btn-default col-md-2" style="margin-left:50px" id="uploadfiles">Files</button>
    <br/>
    <div id="url"><br/><br/></div>
    <div id="file"></div>

    <script>
        $('#uploadurl').click(function () {
            if (isNaN($('#url').attr("name"))) {
                $name = 1;
            } else {
                $name = +$('#url').attr("name") + 1;
            }
            $('#url').append('<input class="form-control" type="text" /> <br />');
            return false
        });
        $('#uploadfiles').click(function () {
            $('#file').empty();
            $('#file').append('<input type="file" id="exampleInputFile" />');
            return false
        });
    </script>
    <br/>
    <br/>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Update', ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>