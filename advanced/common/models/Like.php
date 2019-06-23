<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%v_like}}".
 *
 * @property int $id
 * @property int $art_id 文章id
 * @property string $ip IP
 * @property int $status 状态：0已删除，1正常
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%v_like}}';
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
    public function behaviors(){
        return [
            [
                'class' =>  TimestampBehavior::className(),
                'attributes'    =>  [
                    //创建之前
                    ActiveRecord::EVENT_BEFORE_INSERT  =>  ['created_at', 'updated_at'],
                    //更新之前
                    ActiveRecord::EVENT_BEFORE_UPDATE  =>  ['updated_at'],
                ],
                'value' =>  time(),
            ]
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
