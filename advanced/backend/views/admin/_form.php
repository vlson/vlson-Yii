<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php if($model->role === null){$model->role = 1;}?>
    <?= $form->field($model, 'role')->dropDownList([1=>'管理员',2=>'超级管理员']) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?php if($model->status === null){$model->status = 1;}?>
    <?= $form->field($model, 'status')->radioList([0=>'已删除', 1=>'正常']) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
