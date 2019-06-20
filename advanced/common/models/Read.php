<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%v_read}}".
 *
 * @property int $id
 * @property int $art_id 文章id
 * @property string $ip IP
 * @property int $status 状态：0已删除，1正常
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Read extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%v_read}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['ip'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'art_id' => '文章id',
            'ip' => 'Ip',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
