<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Account */

$this->title = '修改通行证';
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->account_id, 'url' => ['view', 'id' => $model->account_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'role_arr' => $role_arr,
    ]) ?>

</div>
