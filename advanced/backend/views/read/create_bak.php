<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Read */

$this->title = 'Create Read';
$this->params['breadcrumbs'][] = ['label' => 'Reads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="read-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
