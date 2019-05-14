<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/index.css',
    ];
    public $js = [
        'https://cdn.bootcss.com/jquery/1.11.2/jquery.min.js',
        'https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js',
        'https://cdn.bootcss.com/modernizr/2.8.3/modernizr.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
