<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vlson_account_role".
 *
 * @property int $id
 * @property int $role_id 角色id
 * @property int $account_id 通行证id
 * @property int $status 状态
 */
class AccountRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vlson_account_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'account_id', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'account_id' => 'Account ID',
            'status' => 'Status',
        ];
    }
}
