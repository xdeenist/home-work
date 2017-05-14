<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Tasks for tag: "' . $tagname->tag . '"';
$this->params['breadcrumbs'][] = $this->title;
?>

<p><h3>Tasks for tag: "<?php echo $tagname->tag ?>"</h3></p>

<div class="site-login">
    <div class="row">
        <div class="col-sm-5 col-md-9">
            <div class="thumbnail">
                <div class="caption">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Tasks</li>                        
                        <?php foreach ($taskTag as $value) { ?>
   						<li class="list-group-item list-group-item-info"><a href="<?php echo Url::to(['task/task']) . "/" . $value['task_id']; ?>"><?php echo $value['task_name'] ?></a></li>
						<?php } ?>
               		</ul>
                </div>
            </div>
        </div>
    </div>
</div>