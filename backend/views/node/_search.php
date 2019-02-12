<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="node-search">
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

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                            ]); ?>

                <?= $form->field($model, 'node_id') ?>

    <?= $form->field($model, 'node_code') ?>

    <?= $form->field($model, 'node_title') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'p_id') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'remark') ?>

                <div class="form-group">
                    <?= Html::submitButton('检索', ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
                </div>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
