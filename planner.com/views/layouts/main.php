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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?  ?>
<div class="wrap">
    <?php
    Yii::$app->session->open();
    NavBar::begin([
        'brandLabel' => 'Planner',
        'brandUrl' => ['/task/my-tasks'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest ? (
                ['label' => '', 'url' => ['#']]
            ) : (                
                ['label' => 'Personal Area', 'url' => ['/user/personal-area']]
            ),
            Yii::$app->user->isGuest ? (
                ['label' => 'Home', 'url' => ['/site/index']]
            ) : (
                ['label' => 'My Tasks', 'url' => ['/task/my-tasks']]
            ),
            Yii::$app->user->isGuest ? (
            ['label' => 'Register', 'url' => ['/user/signup']]
            ) : (
                ['label' => 'Notice ' . Html::tag('span', 25, ['class' => 'badge']),
                    'items' => [
                        ['label' => 'Notice 1', 'url' => '#'],
                        ['label' => 'Notice 2', 'url' => '#'],
                    ],
                ]
            ),
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
        'encodeLabels' => false 
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
