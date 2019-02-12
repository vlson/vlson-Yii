<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Node */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="node-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'node_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'node_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->dropDownList([1=>'控制器', 2=>'操作行为']) ?>

    <?= $form->field($model, 'p_id')->dropDownList($primary_node) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([1=>'正常', 0=>'已删除']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
