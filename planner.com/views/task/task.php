<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Task Info';
$this->params['breadcrumbs'][] = $this->title;
// var_dump($taskmodel->resources);
// var_dump($model->tagLinks);die();

?>

<script src="/web/js/player.js"></script>
<script src="/web/js/d3.min.js"></script>
<script src="/web/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript"> 
var stoptime = false;
var url = '<?php echo Url::base(true) . Url::toRoute(['task/set-time-tracking']); ?>'
var timeurl = '<?php echo Url::base(true) . Url::toRoute(['task/get-time']); ?>'
var estimation = '<?php echo $taskmodel->estimation ?>';
var deadtime = (estimation*60) - '<?php echo $taskmodel->track_time ?>';
var taskId = '<?php echo $id; ?>';
var status = '<?php echo $taskmodel->status;?>';
var denendence = '<?php echo $denendence;?>';
var control = '<?php echo $controlEmployer ?>';
$(function () {
    initializeTimer(deadtime)
    if ('<?php echo  $lastactivity['status'];?>' == 'start') {
        stoptime = true;
        state='play';
        var button = d3.select("#button_play").classed('btn-success', true);
        button.select("i").attr('class', "glyphicon glyphicon-pause");
    } else if('<?php echo $worktime;?>' != 0 && '<?php echo $taskmodel->status;?>' == 'InWork') {
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
                            <li class="list-group-item list-group-item-success">Task :: <?= $taskmodel->task_name ?></li>
                            <li class="list-group-item list-group-item-info">Owner task :: <?= $owner?></li>
                            <li class="list-group-item list-group-item-info">Employer task :: <?= $employer?></li>
                            <li class="list-group-item list-group-item-info">Task Description :: <?= $taskmodel->task_deskription?></li>
                            <li class="list-group-item list-group-item-info">Last Activity :: <?php if($lastactivity['time']==0){ echo "Not activity";} else { echo $lastactivity['status'] . " at " . $lastactivity['time'];} ?></li>
                            <li class="list-group-item list-group-item-info">Estimation :: <?= $taskmodel->estimation?> hours</li>
                            <li class="list-group-item list-group-item-info">Work Time :: <?= $worktime?> minute</li>
                            <li class="list-group-item list-group-item-info">Percent Complete :
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?= $taskmodel->percentcomplete?>%"><?= $taskmodel->percentcomplete?> %
                                        <span class="sr-only">45% Complete</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-info">Status :: <?= $taskmodel->status?></li>
                            <li class="list-group-item list-group-item-info">Deadline :: <?= ($taskmodel->estimation * 60) - $worktime; ?> minute</li>
                            <?php if ($control == 'fullcontrol') { ?>   
                            <li class="list-group-item list-group-item-warning">Resources :: <?php foreach ($taskmodel->resources as $resource) {
//                                    echo Html::img($resource->res_path, ['width'=>'50']);
                                    if (!empty($resource->res_path)){
                                    echo Html::a(' ссылка ',$resource->res_path);}
                                }?></li>
                            <li class="list-group-item list-group-item-warning">
                                <div class="article-view">
                                    <p><?php if ($taskmodel->tagLinks) {
                                        echo "." . $taskmodel->tagLinks;
                                    } else { echo "No tags"; } ?></p>
                                </div>
                            </a></li>
                            <?php } ?>                            
                        </ul>
                    </div>
                </div>
            </div>  
    <?php if ($control == 'fullcontrol') { ?>        
    <div class="control">

        <?php if( $taskmodel->owner == Yii::$app->user->id ){ echo Html::a('Delete', ['/task/delete/'. $id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);} else { ?>  <a href="<?php echo '#'; ?>" class="btn btn-danger" style="margin-left:0px">Delete</a>  
        <?php } ?>

        <a href="<?php if( $taskmodel->owner == Yii::$app->user->id ) { echo Url::to(['task/update']) . "/" . $id; } else { echo "#"; } ?>" class="btn btn-default col-md-2" style="margin-right: 10px">Edit</a>
            <br/><br/>
        <a href="<?php echo Url::to(['task/create']) . "/" . $id; ?>" class="btn btn-success col-md-2" style="margin-left:0px">Add new task</a>
            <br/><br/><br/>
            <div class="container">

                    <button type="button" id="button_play" class="btn btn-default col-md-1" onclick='buttonPlayPress(<?= $taskmodel->task_id?>, denendence )'>
                        <i class="glyphicon glyphicon-play"></i>
                    </button>
                    <button type="button" id="button_stop" class="btn btn-default col-md-1" onclick='buttonStopPress(<?= $taskmodel->task_id?>, denendence)'>
                        <i class="glyphicon glyphicon-stop"></i>
                    </button>
                    <br/><br/><br/>
                <div id="infmsg"></div>
                <div id="timer" style="font-size: 25px; color: green;"></div>
            </div>
    </div>
    <?php } elseif ($control == 'submit') { ?>
        <div class="control">
        <?= Html::submitButton('Accept', ['class' => 'btn btn-success col-md-2', 'name' => 'accept']) ?>
            <br/><br/><br/>
        <?= Html::submitButton('Not accept', ['class' => 'btn btn-danger col-md-2', 'name' => 'discard']) ?>
            <br/><br/><br/>
        </div>
    <?php } elseif ($control == 'finish') { ?>
        <div class="control">
        <?= Html::submitButton('ok', ['class' => 'btn btn-success col-md-2', 'name' => 'ok']) ?>
            <br/><br/><br/>
        </div>
    <?php } ?>
 </div>
 </div>     
    <?php ActiveForm::end(); ?>


