<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\bootstrap\datetimepicker;

use Yii;
use yii\web\AssetBundle;

/**
 * Class DatetimePickerAsset
 * @package xutl\bootstrap\datetimepicker
 */
class DatetimePickerAsset extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@vendor/xutl/yii2-bootstrap-datetimepicker-widget/assets';

    /**
     * @inherit
     */
    public $css = [
        'css/bootstrap-datetimepicker.min.css',
    ];

    /**
     * @inherit
     */
    public $js = [
        'js/bootstrap-datetimepicker.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var boolean whether to automatically generate the needed language js files.
     */
    public $autoGenerate = true;

    /**
     * @var string language to register translation file for
     */
    public $language;

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        if ($this->autoGenerate) {
            $language = $this->language;
            $fallbackLanguage = substr($this->language, 0, 2);
            if ($fallbackLanguage !== $this->language && !file_exists(Yii::getAlias($this->sourcePath . "/js/locales/bootstrap-datetimepicker.{$language}.js"))) {
                $language = $fallbackLanguage;
            }
            $this->js[] = "js/locales/bootstrap-datetimepicker.$language.js";
        }
        parent::registerAssetFiles($view);
    }
}