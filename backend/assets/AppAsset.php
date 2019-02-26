<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    //默认自动加载样式
    public $css = [
        'css/main.css',
        'css/demo.css',
        'css/main-nav.css',
        //VENDOR CSS
        'vendor/linearicons/style.css',
        'vendor/font-awesome/css/font-awesome.min.css',
        'vendor/chartist/css/chartist-custom.css',
        'https://cdn.linearicons.com/free/1.0.0/icon-font.min.css',
    ];
    //默认自动加载js
    public $js = [
        'js/klorofil-common.js',
        'https://cdn.bootcss.com/twitter-bootstrap/4.1.0/js/bootstrap.min.js',
        'https://cdn.bootcss.com/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js',
        'https://cdn.bootcss.com/easy-pie-chart/2.1.6/jquery.easypiechart.min.js',
        'https://cdn.bootcss.com/chartist/0.11.0/chartist.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }

    //定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }
}
