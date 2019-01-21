<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property int $role_id
 * @property string $role_code 角色代码
 * @property string $role_name 角色名称
 * @property int $status 状态
 * @property string $remark 备注
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_code', 'role_name'], 'string', 'max' => 25],
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
            'role_id' => 'Role ID',
            'role_code' => 'Role Code',
            'role_name' => 'Role Name',
            'status' => 'Status',
            'remark' => 'Remark',
        ];
    }
}
