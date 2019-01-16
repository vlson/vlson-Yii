<?php
namespace backend\assets;

use yii\base\Exception;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/login.css',
    ];
    public $js = [
        'js/login.js',
        'https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js',
        'https://cdn.bootcss.com/twitter-bootstrap/4.1.0/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
