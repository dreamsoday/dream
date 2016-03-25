<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

class MarketingForm extends Model
{
	public $add_price;
	public function rules()
	{
		return[
			['add_price','required','message'=>'不能为空!'],
			['add_price','number','max'=>9999999,'min'=>1,'message'=>'格式错误!'],
		];
	}
}
?>