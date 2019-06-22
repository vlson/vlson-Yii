<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '系统管理员';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'email:email',
            [
                'attribute' =>  'role',
                'label' =>  '角色',
                'value' =>  function($model){
                    return ($model->role==1) ? '管理员' : '超级管理员';
                }
            ],
            'mobile',
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

            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>
</div>
