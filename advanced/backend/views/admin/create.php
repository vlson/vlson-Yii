<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = '添加管理员';
$this->params['breadcrumbs'][] = ['label' => '后台管理员', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
