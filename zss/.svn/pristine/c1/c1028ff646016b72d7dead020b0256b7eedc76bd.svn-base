<?php

namespace frontend\models;

use yii\base\Model;

class Levelform extends Model
{
    public $vip_discount;
    public $vip_price;
    public $vip_subtract;
    public $vip_name;
    public function rules()
    {
        return  [
            ['vip_discount', 'integer', 'min' => 0, 'max' => 100, 'message' => '输入有误'],
            ['vip_discount', 'required','message' => '请先输入'],
            ['vip_price', 'number', 'min' => 0, 'max' => 9999, 'message' => '输入有误'],
            ['vip_price', 'required','message' => '请先输入'],
            ['vip_subtract', 'number', 'min' => 0, 'max' => 9999, 'message' => '输入有误'],
            ['vip_subtract', 'required','message' => '请先输入'],
            ['vip_name', 'string', 'max' => 5, 'message' => '输入有误'],
            ['vip_name', 'required','message' => '请先输入'],
            ['vip_name', 'unique', 'targetClass' => 'frontend\models\Vip', 'message' => '等级已存在'],
        ];
    }
}