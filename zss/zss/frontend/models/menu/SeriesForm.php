<?php

namespace frontend\models\menu;

use yii\base\Model;

class SeriesForm extends Model
{
    public $series_name;
    public $series_sort;
    public $series_status;
    public $created_at;
    public $updated_at;
    public function rules()
    {
        return [[['series_status', 'series_sort', 'created_at', 'updated_at'], 'integer'], [['series_name'],
            'string', 'max' => 20, 'message' => '菜品分类名不能超过20'], ['series_name', 'required',
            'message' => '菜品分类名不能为空'], ['series_sort', 'required', 'message' => '菜品排序不能为空'], ["series_name",
            "unique", "targetClass" => "frontend\models\menu\Series", "message" => "分类名不能重复"]];
    }
}
?>