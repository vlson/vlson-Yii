<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-search" style="background-color: white">

    <div class="box box-warning" style="border-top:3px solid #f39c12;border-bottom: 1px solid #f39c12;border-radius: 2px">
        <div class="box-header with-border">
            <h4 class="box-title">检索</h4>
            <div class="glyphicon glyphicon-minus pull-right"></div>
        </div>
    </div>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class=".container-fluid">
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <?= $form->field($model, 'account_id') ?>
            </div>

            <div class="col-xs-6 col-md-3">
                <?= $form->field($model, 'account_name') ?>
            </div>

            <div class="col-xs-6 col-md-3">
                <?= $form->field($model, 'email') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-md-3">
                <?= $form->field($model, 'mobile') ?>
            </div>

            <div class="col-xs-6 col-md-3">
                <?php  echo $form->field($model, 'status') ?>
            </div>

            <div class="col-xs-6 col-md-3">
                <?php  echo $form->field($model, 'created_at') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-md-3">
                <?php  echo $form->field($model, 'updated_at') ?>
            </div>

            <?php  //echo $form->field($model, 'avatar') ?>
        </div>
    </div>

    <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
