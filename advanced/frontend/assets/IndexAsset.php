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
        'css/index.css',
    ];
    public $js = [
        'js/index.main.js',
        'js/index.plugins.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
