<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%node}}".
 *
 * @property int $node_id
 * @property string $node_name 节点名称
 * @property string $node_title 节点标题
 * @property int $level 节点等级
 * @property int $p_id 父级节点
 * @property int $sort 排序
 * @property int $status 状态
 * @property string $remark 备注
 */
class Node extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%node}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'p_id'], 'integer'],
            [['node_name', 'node_title'], 'string', 'max' => 25],
            [['sort'], 'string', 'max' => 2],
            [['status'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 125],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'node_id' => 'Node ID',
            'node_name' => 'Node Name',
            'node_title' => 'Node Title',
            'level' => 'Level',
            'p_id' => 'P ID',
            'sort' => 'Sort',
            'status' => 'Status',
            'remark' => 'Remark',
        ];
    }
}
