<?php
/**
 * Created by PhpStorm.
 * User: tiany
 * Date: 2019/06/26/0026
 * Time: 22:41
 */

namespace common\widgets;


/**
 * Class MarkdownEditor
 * Open local image upload default, you can use xutl\editormd\MarkdownEditor without it.
 * @package app\modules\common\widgets
 */
class MarkdownEditor extends \xutl\editormd\MarkdownEditor{
    /**
     * Hide the editor preview close button.
     */
    const CSS = <<< EOT
.editormd-preview-close-btn {display:none;}
.editormd {z-index:1030;}
EOT;

    /**
     * Prevent image repeat the assignment when form submit.
     */
    const JS = <<< EOT
$("form").submit(function(event){
    if($(this).find("form[target=editormd-image-iframe]")) {
       $(this).parent().find(".editormd-enter-btn").unbind();
    }
});
EOT;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->view->registerCss(self::CSS);
        $this->view->registerJs(self::JS);
        $backend_label = \yii::$app->params['backend_label'];//上傳圖片路徑

        $this->clientOptions = array_merge($this->clientOptions, [
            'saveHTMLToTextarea' => true,
            'preview' => true,
            'imageUpload' => true,
            'watch' => true,
            'imageFormats' => ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            'imageUploadURL' => "/file/upload",
            'toolbarIcons' => [
                "undo", "redo", "|",
                "bold", "italic", "quote", "h2", "|",
                "code", "preformatted-text", "link", "image", "table", "|",
                "list-ul", "list-ol", "hr", "|",
                "watch", "preview", "fullscreen", "|",
                "help", "info"],
        ]);
        parent::run();
    }
}