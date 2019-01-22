<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-search">
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

                <?= $form->field($model, 'role_id') ?>

    <?= $form->field($model, 'role_code') ?>

    <?= $form->field($model, 'role_name') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'remark') ?>

                <div class="form-group">
                    <?= Html::submitButton('检索', ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
                </div>
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
