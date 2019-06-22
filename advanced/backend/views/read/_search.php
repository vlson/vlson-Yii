<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="read-search">

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
                <div class="col-md-3">
                    <?= $form->field($model, 'id') ?></div>

                <div class="col-md-3">
                    <?= $form->field($model, 'art_id') ?></div>

                <div class="col-md-3">
                    <?= $form->field($model, 'ip') ?></div>

                <div class="col-md-3">
                    <?= $form->field($model, 'status')->dropDownList([999=>'全部', 0=>'已删除', 1=>'正常']) ?></div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
