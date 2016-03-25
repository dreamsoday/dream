<?php

namespace frontend\models;

use yii\base\Model;

class Companyform extends Model
{
    public $company_discount;
    public $company_price;
    public $company_subtract;
    public $company_name;
    public function rules()
    {
        return  [
            ['company_discount', 'integer', 'min' => 0, 'max' => 100, 'message' => '输入有误'],
            ['company_discount', 'required','message' => '请先输入'],
            ['company_price', 'number', 'min' => 0, 'max' => 9999, 'message' => '输入有误'],
            ['company_price', 'required','message' => '请先输入'],
            ['company_subtract', 'number', 'min' => 0, 'max' => 9999, 'message' => '输入有误'],
            ['company_subtract', 'required','message' => '请先输入'],
            ['company_name', 'string', 'max' =>5, 'message' => '输入有误'],
            ['company_name', 'required','message' => '请先输入'],
            ['company_name', 'unique', 'targetClass' => 'frontend\models\Company', 'message' => '公司已存在'],
        ];
    }
}