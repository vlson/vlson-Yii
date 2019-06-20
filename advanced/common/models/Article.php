<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%v_article}}".
 *
 * @property int $id
 * @property string $title 文章标题
 * @property string $abstract 文章简介
 * @property string $content 文章内容
 * @property string $cover 封面
 * @property string $label 文章标签
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
            [['abstract', 'content'], 'string'],
            [['content'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'cover', 'label'], 'string', 'max' => 250],
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
            'cover' => '封面',
            'label' => '文章标签',
            'status' => '文章状态',
            'created_at' => '发布时间',
            'updated_at' => '修改时间',
        ];
    }
}
