<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LikeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '点赞';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="like-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'art_id',
            'ip',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
