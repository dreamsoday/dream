<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_subtract".
 *
 * @property integer $subtract_id
 * @property string $subtract_price
 * @property string $subtract_subtract
 * @property integer $subtract_show
 * @property integer $created_at
 * @property integer $updated_at
 */
class Subtract extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_subtract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subtract_price', 'subtract_subtract'], 'number'],
            [['subtract_show', 'created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subtract_id' => 'Subtract ID',
            'subtract_price' => 'Subtract Price',
            'subtract_subtract' => 'Subtract Subtract',
            'subtract_show' => 'Subtract Show',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /** 
     *  满减的显示
     */
    public function subtractshow()
    {
        return [
            Subtract::find()->asArray()->all(),
        ];
    }
    /**
     * 满减的删除
     */
    public function subtractdel($subtract_id)
    {
        return[
            Subtract::deleteAll('subtract_id=:subtract_id',array(":subtract_id"=>$subtract_id)),
        ];
    }
    /** 
     *  满减的增加
     */
    public function subtractadd($data)
    {
        $subtract = new subtract;
        $created_at = time();
        $subtract->subtract_price = $data['subtract_price'];
        $subtract->subtract_subtract = $data['subtract_subtract'];
        $subtract->created_at = $created_at;
        $subtract->updated_at = $created_at;
        return $subtract->save();
    }
    public function subtractupd($subtract_id)
    {
        return[
            Subtract::find()->where(array('subtract_id'=>$subtract_id))->asArray()->all(),
        ];
    }
    /**
     * 修改
     */
    public function subtractupdate($data)
    {
        $updated_at = time();
        return [
            Subtract::updateAll(array('subtract_price'=>$data['subtract_price'],'subtract_subtract'=>$data['subtract_subtract'],'updated_at'=>$updated_at),'subtract_id=:subtract_id',array(":subtract_id"=>$data['subtract_id'])),
        ];
    }
}