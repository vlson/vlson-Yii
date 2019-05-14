<?php
namespace frontend\assets;
use yii\web\AssetBundle;
/**
 * Main frontend application asset bundle.
 */
class BlogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800',
        'css/blog.css',
        'css/animate.css',
        'css/icomoon.css',
    ];
    public $js = [
        'https://cdn.bootcss.com/jquery-easing/1.3/jquery.easing.js',
        'https://cdn.bootcss.com/waypoints/4.0.1/jquery.waypoints.min.js',
        'https://cdn.bootcss.com/stellar.js/0.6.2/jquery.stellar.min.js',
        'js/blog.main.js',
        'https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js',
        'https://cdn.bootcss.com/jquery-easing/1.4.1/jquery.easing.min.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}