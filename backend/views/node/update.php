<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Node */

$this->title = '修改权限节点';
$this->params['breadcrumbs'][] = ['label' => 'Nodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->node_id, 'url' => ['view', 'id' => $model->node_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="node-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'primary_node'=>$primary_node,
    ]) ?>

</div>
