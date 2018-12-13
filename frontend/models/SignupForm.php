<?php
namespace frontend\models;

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


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['account_name', 'trim'],
            ['account_name', 'required'],
            ['account_name', 'unique', 'targetClass' => '\common\models\Account', 'message' => 'This username has already been taken.'],
            ['account_name', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Account', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
        $Account->setPassword($this->password);
        $Account->generateAuthKey();

        return $Account->save() ? $Account : null;
    }
}
