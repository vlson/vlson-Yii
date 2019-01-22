<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">
    <div class="panel panel-default">
        <div class="panel-heading" style="padding: 10px 15px">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion"
                   href="#collapseTwo">
                    点击检索
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">

                <?= "<?php " ?>$form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
            <?php if ($generator->enablePjax): ?>
                    'options' => [
                        'data-pjax' => 1
                    ],
            <?php endif; ?>
                ]); ?>

            <?php
            $count = 0;
            foreach ($generator->getColumnNames() as $attribute) {
                if (++$count < 6) {
                    echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                } else {
                    echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                }
            }
            ?>
                <div class="form-group">
                    <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('检索') ?>, ['class' => 'btn btn-primary']) ?>
                    <?= "<?= " ?>Html::resetButton(<?= $generator->generateString('重置') ?>, ['class' => 'btn btn-default']) ?>
                </div>
        </div>
    </div>
</div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
