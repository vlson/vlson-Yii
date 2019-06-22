<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%v_category}}".
 *
 * @property int $id
 * @property string $cate_name 分类名称
 * @property int $status 状态：0已删除，1正常
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%v_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['cate_name'], 'string', 'max' => 250],
            [['id'], 'unique'],
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
            'cate_name' => '分类名称',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
