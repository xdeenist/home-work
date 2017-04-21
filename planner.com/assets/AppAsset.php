<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/site.css',
        '/css/examples.css',
        '/css/jquery-ui-1.8.16.custom.css',
        '/css/player.css',
        '/css/slick.grid.css',
        '/css/slick-default-theme.css'
    ];
   public $js = [
       // 'js/firebugx.js',
       // 'js/jquery-1.7.min.js',
       // 'js/jquery-ui-1.8.16.custom.min.js',
       // 'js/jquery.event.drag-2.2.js',
       // 'js/slick.core.js',
       // 'js/slick.formatters.js',
       // 'js/slick.editors.js',
       // 'js/slick.grid.js',
       // 'js/slick.dataview.js'
   ];
   // public $jsOptions=[
   //     'position' => \yii\web\View::POS_HEAD
   // ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
