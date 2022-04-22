<?php

namespace app\models;

use yii\base\Model;
use yii\debug\models\router\RouterRules;
use yii\helpers\VarDumper;
use yii\rbac\Rule;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [

            [['username', 'password', 'password_repeat'], 'required'],
            [['username', 'password', 'password_repeat'], 'string', 'min' => 4,],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password']
        ];
    }
    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->auth_key = \Yii::$app->security->generateRandomString();

        if ($user->save()) {
            return true;
        }
        \Yii::error($user->errors);
        return false;
    }
}