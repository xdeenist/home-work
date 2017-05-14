<?php
use yii\helpers\Url;
use sjaakp\taggable\TagEditor;
use \yii\widgets\ActiveForm;
use \app\models\User;
use \app\models\Task;
use kartik\typeahead\TypeaheadBasic;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;

if ($maxEstimate < 1000 * 1000) {
    $maxEstimate  = $maxEstimate + $model->estimation;
    $deadlinetasklable = " (max $maxEstimate hrs) ";
} else { $deadlinetasklable = " "; }


$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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

    <?= $form->field($model, 'editorTags')->widget(TagEditor::className(), [
        'tagEditorOptions' => [
            'autocomplete' => [
                'source' => Url::toRoute(['tag/suggest'])
            ],
        ]
    ]) ?>

    <?php if (!is_numeric($_GET['id'])) { echo $form->field($model, 'deadline')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'language' => 'ru',
        // modify template for custom rendering
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'startDate' => date("yyyy-MM-dd H:i:s"),
        ]
    ]);} ?>

<?= $form->field($model, 'estimation')->textInput(['type' => 'number', 'min' => 1, 'max' => $maxEstimate])->label("Estimation " . $deadlinetasklable ) ?>

    <p><b>Upload Url</b></p>

<!-- Upload URL -->
<div class="input-group control-group after-add-more">


    <input type="text" name="url[]" class="form-control" placeholder="Enter URL Here">
    <div class="input-group-btn">
        <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
    </div>
</div>


<div class="copy-fields hide">
    <div class="control-group input-group" style="margin-top:10px">
        <input type="text" name="url[]" class="form-control" placeholder="Enter URL Here">
        <div class="input-group-btn">
            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>
</div>

<br/>

<p><b>Upload Files</b></p>

<!-- Upload Files -->

<div class="input-group control-group after-add-more2">
    <input type="file" name="file[]" class="form-control" placeholder="">
    <div class="input-group-btn">
        <button class="btn btn-success add-more2" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
    </div>
</div>


<div class="copy-fields2 hide">
    <div class="control-group input-group" style="margin-top:10px">
        <input type="file" name="file[]" class="form-control" placeholder="">
        <div class="input-group-btn">
            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>
</div>

    <br/>
    <br/>

<?php foreach ($model->resources as $resource) { if (!empty($resource->res_path)){
    echo "<div>".Html::img($resource->res_path, ['width'=>'200']) . "<a href='' class='rem_res glyphicon glyphicon-trash' res_id='". $resource->res_id ."'></a></div>";
}}?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<script>

    $(document).ready(function() {

                    //URL
        $(".add-more").click(function(){
            var html = $(".copy-fields").html();
            $(".after-add-more").after(html);
        });
                    //Files
        $(".add-more2").click(function(){
            var html = $(".copy-fields2").html();
            $(".after-add-more2").after(html);
        });

            // Remove Url and Files
        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
            $(this).parents(".control-group2").remove();
        });


        $('.rem_res').click(function () {

            var resource = $(this);
            var res_id = resource.attr('res_id');

            $.ajax({
                url: '<?php echo Url::toRoute('remove-resource'); ?>',
                data: {res_id: res_id},
                method: 'post',
                success: function(data){
                    resource.parent().remove();
                }
            });

            return false;
        });
    });
</script>
