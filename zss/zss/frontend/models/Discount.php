<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_discount".
 *
 * @property integer $discount_id
 * @property integer $discount_num
 * @property integer $discount_show
 * @property integer $shop_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discount_num', 'discount_show', 'shop_id', 'created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'discount_id' => 'Discount ID',
            'discount_num' => 'Discount Num',
            'discount_show' => 'Discount Show',
            'shop_id' => 'Shop ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /**
     * 折扣的显示
     */
    public function discountshow()
    {
        return [
            Discount::find()->asArray()->all(),
        ];
    }
    public function discountupd($discount_id)
    {
        return [
            Discount::find()->where("discount_id=:discount_id",array(":discount_id"=>$discount_id))->asArray()->all(),
        ];
    }
    /**
     * 折扣的删除
     */
    public function discountdel($discount_id)
    {
        return [
            Discount::deleteAll('discount_id=:discount_id',array(":discount_id"=>$discount_id)),
        ];
    }
    /**
     *  折扣的添加
     */
    public function discountadd($data)
    {
        $created_at = time();
        $discount = new Discount;
        $discount->discount_num = $data['discount_num'];
        $discount->shop_id = $data['shop_id'];
        $discount->discount_show = '1';
        $discount->created_at= $created_at;
        $discount->updated_at = $created_at;
        return $discount->save();
    }
    /**
     * 折扣的修改
     */
    public function discountupdate($data)
    {
        $updated_at = time();
        $discount = new Discount;
        return $discount->updateAll(array('discount_num'=>$data['discount_num'],'shop_id'=>$data['shop_id'],'updated_at'=>$updated_at),'discount_id=:discount_id',array(":discount_id"=>$data['discount_id']));
    }
}
