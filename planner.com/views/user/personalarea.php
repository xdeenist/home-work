<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Personal Area';
$this->params['breadcrumbs'][] = $this->title;
// var_dump($AllTags); die();
?>
<script src="/web/js/jquery-3.2.1.min.js"></script>
</script>
<script type="text/javascript">
    function getToDoTasks() {
        $.get('<?php echo Url::to(['user/get-tasks']) ?>', {},  function(data){
            console.log(data);
            if (data) {
            data = JSON.parse(data);       
                for (var i = 0; i < 10 ; i++) {
                    if (data[i].percentcomplete == null) {
                        data[i].percentcomplete = 0;
                    }
                    var ii = i + 1
                    $('#list-tasks').append('<tr> <th scope=row>'+ ii +'</th> <td><a href="<?php echo Url::to(['task/task']) . "/"; ?>'+ data[i].task_id +'">'+ data[i].task_name +'</td> <td>' + data[i].last_time +'</td> <td>'+ data[i].percentcomplete +'</td></tr>');
                }
            } else {
                var ii = i + 1
                $('#tbody').empty();
                $('#list-tasks').append('<tr> <th scope=row>#</th> <td></td> <td></td> <td></td><td></td> </tr>')
            }
        });
    }


    $(document).ready(function() {
        getToDoTasks();
    });
    // setInterval(getToDoTasks,1800000);
</script>

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
        <div class="col-sm-4 col-md-8">
            <div class="thumbnail">
                <div class="caption">
                <div class="panel panel-default">
                    <table class="table">
                        <thead class="list-group-item-success"> 
                            <tr>   
                                <th>#</th> 
                                <th>Task name</th> 
                                <th>Last time (min)</th> 
                                <th>Percentcomplete</th>  
                            </tr>                         
                        </thead>
                        <tbody id="list-tasks" class="list-group-item-info"> 
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-md-4">   
        <p><center><h3> tag cloud</h3></center></p>
                        <?php for ($i=0; $i <50; $i++) {
                            if (isset($AllTags[$i]['tag'])) { ?>
                                <a href="<?php echo Url::to(['tag/view']).'/'.$AllTags[$i]['id'];?>"><span class="tag"><?= $AllTags[$i]['tag']?></span></a>
                            <?php } ?>                                  
                        <?php } ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
