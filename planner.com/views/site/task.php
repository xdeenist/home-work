<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = 'Task Info';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="site-login">

        <button type="submit" class="btn btn-default col-md-10">Task Name</button><a href="<?php echo Url::to(['site/create']); ?>" class="btn btn-success" style="margin-left:15px">Add new task</a>
    </div>

    <br/>
    <br/>

<!--    <div class="site-login">-->
<!--        <button type="submit" class="btn btn-default col-md-11">Projects with me</button>-->
<!--    </div>-->

    <br/>
    <br/>

    <div class="bg-success col-md-10" style="margin-top: 35px;">
        <ul>
            <li>Описание : </li>
            <br/>

            <li>Прогресс : </li>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
            <br/>

            <li>Встроеные файлы:  <a href="#">тык</a></li>

            <br/>

            <li>Кто выполняет : </li>
        </ul>
    </div>


    <?php ActiveForm::end(); ?>

</div>