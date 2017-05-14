<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Result search ';
$this->params['breadcrumbs'][] = $this->title;
?>

<p><h3>Result search for: "<?php echo $post ?>"</h3></p>

<div class="site-login">
    <div class="row">
        <div class="col-sm-5 col-md-9">
            <div class="thumbnail">
                <div class="caption">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Tasks: </li>                        
                        <?php if ($taskName) {                        
                            foreach ($taskName as $value) { ?>
   						   <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']) . "/" . $value->task_id; ?>"><?php echo $value->task_name ?></a></li>
						<?php
                            } 
                        } 
                        ?>
                        <li class="list-group-item list-group-item-success">Task discriptions: </li>                        
                        <?php if ($taskDeskription) { 
                            foreach ($taskDeskription as $value) { ?>
                            <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']) . "/" . $value->task_id; ?>"><?php echo $value->task_deskription ?></a></li>
                        <?php
                            } 
                        } 
                        ?>
                        <li class="list-group-item list-group-item-success">Users: </li> 
                        <?php if ($users) {                        
                            foreach ($users as $value) { ?>
                            <li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['user/info']) . "/" . $value->user_id; ?>"><?php echo $value->username ?></a></li>
                        <?php
                            } 
                        } 
                        ?>
               		</ul>
                </div>
            </div>
        </div>
    </div>
</div>