<?php

namespace frontend\models;

use yii\base\Model;

class Form extends Model
{
    public $user_price;
    public $user_integral;
    public $user_name;
    public $user_phone;
    public $user_password;
    public function rules()
    {
        $user = [
            ['user_name', 'string', 'max' => 5, 'message' => '输入有误'],
            ['user_name', 'required','message' => '请先输入'],
            ['user_name', 'unique', 'targetClass' => 'frontend\models\User', 'message' => '用户名已存在'],
            ['user_phone', 'string', 'max' => 11, 'min' => 11, 'message' => '手机号长度11位'],
            ['user_password', 'string', 'max' => 32],
            ['user_password', 'required','message' => '请先输入'],
            ['user_integral', 'integer', 'min' => 0, 'max' => 9999, 'message' => '输入有误'],
            ['user_price', 'number','min' => 0, 'max' => 9999, 'message' => '输入有误'],
        ];
        return $user;
    }
}