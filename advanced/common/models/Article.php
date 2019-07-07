<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%v_article}}".
 *
 * @property int $id
 * @property string $title 文章标题
 * @property string $abstract 文章简介
 * @property string $content 文章内容
 * @property string $content_html 文章内容html
 * @property string $cover 封面
 * @property string $label 文章标签
 * @property string $read_num 阅读人数
 * @property string $like_num 点赞人数
 * @property int $status 文章状态：0已删除，1正常
 * @property int $created_at 发布时间
 * @property int $updated_at 修改时间
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%v_article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['abstract', 'content', 'content_html'], 'string'],
            [['status', 'created_at', 'updated_at', 'read_num', 'like_num'], 'integer'],
            [['title', 'cover', 'label'], 'string', 'max' => 250],
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
            'title' => '文章标题',
            'abstract' => '文章简介',
            'content' => '文章内容',
            'content_html' => '文章内容html',
            'cover' => '封面',
            'read_num' => '阅读人数',
            'like_num' => '点赞人数',
            'label' => '文章标签',
            'status' => '文章状态',
            'created_at' => '发布时间',
            'updated_at' => '修改时间',
        ];
    }
}
