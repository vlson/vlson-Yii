<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\editormd;

use Yii;
use yii\web\AssetBundle;

/**
 * Class MarkdownEditorAsset
 * @package xutl\editormd
 */
class MarkdownEditorAsset extends AssetBundle
{
    public $sourcePath = '@vendor/xutl/yii2-editor-md-widget/assets';

    public $js = [
        'editormd.min.js',
    ];

    public $css = [
        'css/editormd.min.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}