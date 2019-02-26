<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">

    <?php $form = ActiveForm::begin(['id' => 'account-form']); ?>
    <?= $form->field($model, 'account_name')->textInput() ?>
    <!--2019.01.30 修改不允许修改密码-->
    <?php if(trim(Yii::$app->controller->action->id) !== 'update'){ ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?php } ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'mobile')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList([1 => '正常 ', 0 => '已删除']) ?>
    <?= $form->field($model, 'avatar')->textInput() ?>
    <?= $form->field($model, 'role')->widget(Select2::className(), [
        'data' => ArrayHelper::map($role_arr, 'role_id', 'role_name'),
        'language' => 'zh_CN',
        'options' => [
            'placeholder' => '请选择用户角色',
            'multiple'=>'multiple',
        ],
        'pluginOptions' => [
            'allowClear' => false,
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
