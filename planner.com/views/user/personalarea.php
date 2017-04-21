<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Personal Area';
$this->params['breadcrumbs'][] = $this->title;
$id = 24;
?>


<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="site-login">
    <h1>My personal info:</h1>
    <div class="row">
        <div class="col-sm-4 col-md-8">
            <div class="thumbnail">
                <div class="caption">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">My username :: <?php echo $userInfo->username?></li>
                        <li class="list-group-item list-group-item-info">My E-Mail :: <?php echo $userInfo->email?> </li>
                        <li class="list-group-item list-group-item-warning">My user status :: <?php echo $userInfo->userstatus?></li>
                        <li class="list-group-item list-group-item-danger">Register date :: <?php echo $userInfo->regdata?></li>
                    </ul>
                </div>
            </div>
        </div>
        <ul>
            <li style="list-style-type: none;"><a href="<?php echo Url::to(['task/my-tasks']); ?>" class="btn btn-success col-md-3">My tasks</a></li>
                <br/>
                <br/>                
                <br/>
            <li style="list-style-type: none;"><a href="<?php echo Url::to(['task/create']) . "/new"; ?>" class="btn btn-default col-md-3" >Create new</a></li>
        </ul>
    </div>   
</div>

<div class="site-login">
<h1>My tasks to do:</h1>
    <div class="row">
        <div class="col-sm-4 col-md-12">
            <div class="thumbnail">
                <div class="caption">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']) . "/" . $id; ?>">task 1</a></li>
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']); ?>">task 2</a></li>
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']); ?>">task 3</a></li>
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']); ?>">task 4</a></li>
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']); ?>">task 5</a></li>
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']); ?>">task 6</a></li>
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']); ?>">task 7</a></li>
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']); ?>">task 8</a></li>
                        <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']); ?>">task 9</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    

</div>
    <?php ActiveForm::end(); ?>
</div>