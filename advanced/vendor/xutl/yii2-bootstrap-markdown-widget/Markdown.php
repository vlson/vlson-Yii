<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\bootstrap\markdown;

use Yii;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Class Markdown
 * @package xutl\bootstrap\markdown
 */
class Markdown extends InputWidget
{
    public $language;

    public $clientOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset ($this->options ['id'])) {
            $this->options ['id'] = $this->getId();
        }
        $this->clientOptions = array_merge([
            'iconlibrary' => 'glyph'
        ], $this->clientOptions);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $language = $this->language ? $this->language : Yii::$app->language;
        if ($this->hasModel()) {
            echo Html::activeTextArea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textArea($this->name, $this->value, $this->options);
        }
        $view = $this->getView();
        $assetBundle = MarkdownAsset::register($view);
        $assetBundle->language = $language;
        $options = empty ($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
        $this->view->registerJs("jQuery(\"#{$this->options['id']}\").markdown({$options});");
    }
}