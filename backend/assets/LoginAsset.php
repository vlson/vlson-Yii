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
        '/css/log_in.css',
    ];
    public $js = [
        '/js/login.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
