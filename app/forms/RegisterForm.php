<?php

namespace app\forms;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * RegisterForm is the model behind the register form.
 */
class RegisterForm extends Model
{
    public $email;
    public $password;
    public $passwordRepeat;
    public $firstName;
    public $lastName;


    /**
     * @return array of the validation rules
     */
    public function rules()
    {
        return [
            [['email', 'password', 'passwordRepeat', 'firstName', 'lastName'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
//	public function attributeLabels()
//	{
//		return [
//			'passwordRepeat' => 'Repeat Password',
//		];
//	}

    /**
     * Registers a user
     *
     * @return bool whether the model passes validation
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->email = $user->username = $this->email;
            $user->first_name = $this->firstName;
            $user->last_name = $this->lastName;

            $user->setPassword($this->password);
            $user->generateAuthKey();

            if (!$user->save()) {
                $this->addErrors($user->errors);

                return false;
            }

            return true;
        }

        return false;
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'passwordRepeat' => Yii::t('app', 'Password Repeat'),
        ];
    }

}