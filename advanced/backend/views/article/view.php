<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'abstract:ntext',
            'content:ntext',
            'cover',
            'label',
            [
                'attribute' =>  'status',
                'value' =>  function($model){
                    return ($model->status==1) ? '正常' : '已删除';
                }
            ],
            [
                'attribute' =>  'created_at',
                'value' =>  function($model){
                    return date("Y-m-d H:i:s", $model->created_at);
                }
            ],
            [
                'attribute' =>  'updated_at',
                'value' =>  function($model){
                    return date("Y-m-d H:i:s", $model->updated_at);
                }
            ],
        ],
    ]) ?>

</div>
