<?php
/**
 * @link https://github.com/borodulin/yii2-codemirror
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-codemirror/blob/master/LICENSE.md
 */
namespace common\widgets;

use yii\helpers\Html;

/**
 * @author Andrey Borodulin
 */
class UploadInputWidget extends \yii\widgets\InputWidget
{
    public $mode;
    public $options = [];
    /**
     * @inheritdoc
     */
    public function run()
    {
        $options = [
            'class' => "form-control",
            'style' => "width:80%;",
        ];
        $this->options = array_merge($this->options,$options);
        if ($this->hasModel()) {
            echo Html::activeInput('text',$this->model, $this->attribute, $this->options);
            echo '<input id="upload-file-'.$this->attribute.'" name="filename" type="file" style="" class="form-control">';
            $name = $this->attribute;
        } else {
            echo Html::input('text',$this->name, $this->value, $this->options);
            echo '<input id="upload-file-'.$this->attribute.'" name="filename" type="file" style="" class="form-control">';
            $name = $this->name;
        }
        $this->registerAssets($name);
    }
    /**
     * Registers Assets
     * @param string $name name
     */
    public function registerAssets($name)
    {
        $view = $this->getView();
        $id = 'upload-file-'.$name;
        if($this->hasModel()){
            $array = explode('\\',get_class($this->model));
            $input_id = strtolower(end($array)).'-'.$name;
        }else{
            $input_id = $this->options['id'];
        }
        $domain_url = isset($this->options['domain_url']) ? $this->options['domain_url'] : '';
        $backend_label = \yii::$app->params['backend_label'];

        $js = <<<EOF
            $('#{$id}').fileinput({
                showPreview:false,
                showRemove:false,
                showUpload:false,
                showCaption:false,
                language: 'zh',
                mainClass:'bbbb',
                browseLabel:'选择',
                uploadUrl: '/file/upload',
                allowedFileExtensions : ['jpg', 'png','gif','rar','zip','doc','pdf','docx','flv','xlsx','pptx','swf','txt','mp3'],
                layoutTemplates:{
                    'progress':''
                }
            });
            $('#{$id}').on('fileloaded', function(event, file, previewId, index, reader) {
                $("#{$id}").fileinput('upload');
            });
            $("#{$id}").on('fileuploaded', function(event, data) {
                $('#{$input_id}').val('{$domain_url}'+data.response.data.url)
            });
EOF;
        $css = <<<EOE
            .file-input{
                width      : 15%;
                margin-top : -34px;
                float      : right;
            }
            .file-preview {
                display    : none;
            }
EOE;
        $view->registerJs($js);
        $view->registerCss($css);
        \kartik\file\FileInputAsset::register($this->view);
    }
}