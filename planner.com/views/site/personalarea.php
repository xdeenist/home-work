<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = 'Personal Area';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="site-login">

    <button type="submit" class="btn btn-default col-md-11">My project</button><a href="<?php echo Url::to(['site/create']); ?>" class="btn btn-success" style="margin-left:15px">Create</a>
</div>

<br/>
<br/>

<div class="site-login">
    <button type="submit" class="btn btn-default col-md-11">Projects with me</button>
</div>

<br/>
<br/>

    <div class="bg-success col-md-11" style="margin-top: 35px;">
        <ul>
            <li><a href="task">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">...</a></li>

        </ul>
    </div>


    <?php ActiveForm::end(); ?>

</div>