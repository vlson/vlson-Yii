<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/flipTimer.css',
    ];
    public $js = [
        'js/jquery.flipTimer.js',
        'js/index.plugins.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
