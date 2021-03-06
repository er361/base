<?php

namespace app\models\forms;

use app\models\UserModel;
use Yii;
use yii\base\Model;

/**
 * Class ResetPasswordForm
 * @package app\models\forms
 */
class ResetPasswordForm extends Model
{
    /**
     * @var string password
     */
    public $password;

    /**
     * @var string confirmPassword
     */
    public $confirmPassword;

    /**
     * @var UserModel
     */
    private $_user;

    /**
     * ResetPasswordForm constructor.
     *
     * @param UserModel $user
     * @param array $config
     */
    public function __construct(UserModel $user, $config = [])
    {
        $this->_user = $user;

        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'confirmPassword'], 'trim'],
            ['password', 'required'],
            ['confirmPassword', 'required'],
            [['password', 'confirmPassword'], 'string', 'min' => 6],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => Yii::t('user', 'New Password'),
            'confirmPassword' => Yii::t('user', 'Confirm New Password'),
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        if ($this->validate()) {
            $this->_user->setPassword($this->password);
            return $this->_user->save(true, ['passwordHash']);
        }

        return false;
    }
}