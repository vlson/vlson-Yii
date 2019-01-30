<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">

    <?php $form = ActiveForm::begin(['id' => 'update-form']); ?>
    <?= $form->field($model, 'account_name')->textInput() ?>
    <!--2019.01.30 修改不允许修改密码-->
    <?php if(trim(Yii::$app->controller->action->id) !== 'update'){ ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?php } ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'mobile')->textInput() ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'avatar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
