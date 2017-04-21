<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Task Info';
$this->params['breadcrumbs'][] = $this->title;
// var_dump($model->owner);
// var_dump($model);die();

?>

<script src="/web/js/player.js"></script>
<script src="/web/js/d3.min.js"></script>
<script src="/web/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript"> 
var url = '<?php echo Url::base(true) . Url::toRoute(['task/set-time-tracking']); ?>'
var taskId = '<?php echo $id; ?>';
var status = '<?php echo $model->status;?>';
var denendence = '<?php echo $denendence;?>';
var control = '<?php echo $controlEmployer ?>';
$(function () {
    if ('<?php echo  $lastactivity['status'];?>' == 'start') {
        state='play';
        var button = d3.select("#button_play").classed('btn-success', true);
        button.select("i").attr('class', "glyphicon glyphicon-pause");
    } else if('<?php echo $worktime;?>' != 0 && '<?php echo $model->status;?>' == 'InWork') {
        state = 'pause';
        var button = d3.select("#button_play").classed('btn-success', true);
        button.select("i").attr('class', "glyphicon glyphicon-play");
    }
})
</script>

    <?php $form = ActiveForm::begin(); ?>

    <div class="site-login">

        <div class="row">
            <div class="col-sm-5 col-md-9">
                <div class="thumbnail">
                    <div class="caption">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-success">Task :: <?= $model->task_name ?></li>
                            <li class="list-group-item list-group-item-info">Owner task :: <?= $owner?></li>
                            <li class="list-group-item list-group-item-info">Employer task :: <?= $employer?></li>
                            <li class="list-group-item list-group-item-info">Task Description :: <?= $model->task_deskription?></li>
                            <li class="list-group-item list-group-item-info">Last Activity :: <?php if($lastactivity['time']==0){ echo "Not activity";} else { echo $lastactivity['status'] . " at " . $lastactivity['time'];} ?></li>
                            <li class="list-group-item list-group-item-info">Estimation :: <?= $model->estimation?> hours</li>
                            <li class="list-group-item list-group-item-info">Work Time :: <?= $worktime?> hours</li>
                            <li class="list-group-item list-group-item-info">Percent Complete :                 
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?= $model->percentcomplete?>%"><?= $model->percentcomplete?> %
                                        <span class="sr-only">45% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-info">Status :: <?= $model->status?></li>
                            <?php if ($control == 'fullcontrol') { ?>   
                            <li class="list-group-item list-group-item-warning">Resources :: <a href="#">тык</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
    <?php if ($control == 'fullcontrol') { ?>        
    <div class="control">

        <?= Html::a('Delete', ['/task/delete/'. $id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <a href="<?php echo Url::to(['task/update']) . "/" . $id; ?>" class="btn btn-default col-md-2" style="margin-right: 10px">Edit</a>
            <br/><br/>
        <a href="<?php echo Url::to(['task/create']) . "/" . $id; ?>" class="btn btn-success col-md-2" style="margin-left:0px">Add new task</a>
            <br/><br/><br/>
            <div class="container">

                    <button type="button" id="button_play" class="btn btn-default col-md-1" onclick='buttonPlayPress(<?= $model->task_id?>, denendence )'>
                        <i class="glyphicon glyphicon-play"></i>
                    </button>
                    <button type="button" id="button_stop" class="btn btn-default col-md-1" onclick='buttonStopPress(<?= $model->task_id?>, denendence)'>
                        <i class="glyphicon glyphicon-stop"></i>
                    </button>
                    <br/><br/><br/>
                <div id="infmsg"></div>
            </div>
    </div>
    <?php } elseif ($control == 'submit') { ?>
        <div class="control">
        <?= Html::submitButton('Accept', ['class' => 'btn btn-success col-md-2', 'name' => 'accept']) ?>
            <br/><br/><br/>
        <?= Html::submitButton('Not accept', ['class' => 'btn btn-danger col-md-2', 'name' => 'discard']) ?>
            <br/><br/><br/>
    </div>
    <?php } ?>

        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <?php ActiveForm::end(); ?>

