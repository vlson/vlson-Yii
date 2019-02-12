<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%node}}".
 *
 * @property int $node_id
 * @property string $node_code 权限节点代号
 * @property string $node_title 权限节点标题
 * @property int $level 权限节点等级
 * @property int $p_id 父级权限节点
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
            [['node_code', 'node_title'], 'string', 'max' => 25],
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
            'node_id' => '权限节点ID',
            'node_code' => '权限节点代号',
            'node_title' => '权限节点标题',
            'level' => '权限节点等级',
            'p_id' => '父级权限节点',
            'sort' => '排序',
            'status' => '状态',
            'remark' => '备注',
        ];
    }
}
