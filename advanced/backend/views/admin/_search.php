<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="box box-warning">
        <div class="box-header with-border">
            <h6 class="box-title">检索</h6>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'id') ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'username') ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->field($model, 'role')->dropDownList([999=>'全部',1=>'管理员',2=>'超级管理员']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <?php echo $form->field($model, 'email') ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->field($model, 'mobile') ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->field($model, 'status')->dropDownList([999=>'全部', 0=>'已删除', 1=>'正常']) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
