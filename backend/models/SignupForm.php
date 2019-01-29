<?php
namespace app\models;

use yii\base\Model;
use common\models\Account;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $account_name;
    public $email;
    public $password;
    public $mobile;
    public $status;
    public $avatar;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_name', 'email', 'mobile', 'avatar'], 'trim'],
            [['account_name', 'email', 'password', 'status'], 'required'],
            ['account_name', 'string', 'min' => 2, 'max' => 25],
            ['account_name', 'unique', 'targetClass' => '\common\models\Account', 'message' => '该通行证已存在！'],

            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Account', 'message' => '该邮箱已存在！'],

            ['mobile', 'number'],
            ['mobile', 'match', 'pattern' => '/^[1][3456789][0-9]{9}$/', 'message' => '手机号码格式不正确！'],
            ['mobile', 'unique', 'targetClass' => '\common\models\Account', 'message' => '该手机号码已存在！'],

            ['password', 'string', 'min' => 6, 'max' => 18, 'message' => '密码最少为6位，最多为18位'],

            ['status', 'integer'],
        ];
    }


    /*
     * 指定对应字段的中文
     * */
    public function attributeLabels()
    {
        return [
            'account_id'    =>  '通行证id',
            'account_name'    =>  '通行证名称',
            'email'    =>  '邮箱地址',
            'mobile'    =>  '联系方式',
            'status'    =>  '状态',
            'created_at'    =>  '创建时间',
            'updated_at'    =>  '更新时间',
            'avatar'    =>  '头像地址',
        ];
    }

    /**
     * Signs user up.
     *
     * @return Admin|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $Account = new Account();
        $Account->account_name = $this->account_name;
        $Account->email = $this->email;
        $Account->mobile = $this->mobile;
        $Account->setPassword($this->password);
        $Account->generateAuthKey();

        return $Account->save() ? $Account : null;
    }
}
