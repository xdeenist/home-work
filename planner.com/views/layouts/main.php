<?php

/* @var $this \yii\web\View */
/* @var $content string */

//use Yii;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use \yii\widgets\ActiveForm;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
    <script src="/web/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
    function getTaskInWork(){
        $.get('<?php echo Url::to(['task/get-task-in-work']) ?>', {}, function(task){
            if (task) {
            console.log(task);
            task = JSON.parse(task);            
                $('#task-v').empty();
                $('#navbarnav').prepend('<li id="task-v"><a href="<?php echo Url::to(['task/task'])?>/'+task.task_id + '">Active task :: ' + task.task_name + '</a></li>');
            }
        });
    }

    function getNotice(){
         $.get('<?php echo Url::to(['notice/notice']);?>', {'user_id': '<?php echo Yii::$app->user->id; ?>'}, function(data){     
                data = JSON.parse(data);
                $('.dropdown-menu').empty();
                
                if (!$("span").is("#baddge")) {
                    $('.dropdown-toggle').append('<span class="badge" id="baddge" >'+ data.length +'</span>');
                }  else {
                    $('#baddge').text(data.length);
                } 

                // if ($('.dropdown-toggle').attr('aria-expanded') === "true") {
                    for (var i = 0; i < data.length; i++) {
                        if (!$('a').is('#' + data[i].notice_id)) {
                            $('.dropdown-menu').append('<li id="' + data[i].notice_id +'"><a href="<?php echo Url::to(['task/task']) . "/" ;?>' + data[i].task_id +'" id="'+ data[i].notice_id +'" tabindex="-1" style="color: green;">'+ data[i].notice_text + '</a></li>');
                        }                        
                    }
                // }
           });
    }
    $(document).ready(function(){
        getNotice();
        getTaskInWork();
    }) 
    setInterval(getNotice,30000);
    </script>
</head>
<body>
<?php $this->beginBody() ?>
<?  ?>

<div class="wrap">
    <?php
    Yii::$app->user->isGuest ? (
    NavBar::begin([
        'brandLabel' => 'Planner',
        'brandUrl' => ['site/index'],
        'options' => [
            'id' => 'custom-bootstrap-menu',
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ])
    ) : (
    NavBar::begin([
        'brandLabel' => 'Planner',
        'brandUrl' => ['/user/personal-area'],
        'options' => [
            'id' => 'custom-bootstrap-menu',
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ])
    );
    if (!Yii::$app->user->isGuest ) {
    ActiveForm::begin(
        [
            'action' => ['site/search'],
            'method' => 'post',
            'options' => [
                'class' => 'navbar-form navbar-right'
            ]
        ]
        );
    echo '<div class="input-group input-group-sm">';
    echo Html::input(
        'type: text', 
        'search',
        '',
        [
            'placeholder' => 'Search...',
            'class' => 'form-control'
        ]
        );
    echo '<span class="input-group-btn">';
    echo Html::submitButton(
        '<span class="glyphicon glyphicon-search"></span>',
        [
            'class' => 'btn btn-success'
        ]
        );
    echo '</span></div>';
    ActiveForm::end();
    }

    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right', 'id' => 'navbarnav'],
        'items' => [
            [
                'label' => 'Admin Panel',
                'url' => ['/admin/table'],
                'visible' => Yii::$app->user->can('dashboard')
            ],
            [
                'label' => 'Personal Area',
                'url' => ['/user/personal-area'],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Home',
                'url' => ['/site/index'],
                'visible' => Yii::$app->user->isGuest
            ],
            [
                'label' => 'My Tasks',
                'url' => ['/task/my-tasks'],
                'visible' => !Yii::$app->user->isGuest
            ],
            [
                'label' => 'Register',
                'url' => ['/user/signup'],
                'visible' => Yii::$app->user->isGuest
            ],
            [
                'label' => 'Notice ' . Html::tag('span', 0, ['class' => 'badge', 'id' => 'baddge']),
                'items' => [
                    ['label' => '', 'url' => '#'],
                ],
                'visible' => !Yii::$app->user->isGuest
            ],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/user/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
        'encodeLabels' => false ,

    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
