<?php

namespace app\models;

use yii\base\Model;
use yii\debug\models\router\RouterRules;
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
        ];
    }
}