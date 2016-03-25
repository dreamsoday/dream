<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_vip".
 *
 * @property integer $vip_id
 * @property string $vip_name
 * @property integer $vip_discount
 * @property string $vip_price
 * @property string $vip_subtract
 * @property integer $user_status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $giveaway_id
 */
class Vip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_vip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vip_discount', 'user_status', 'created_at', 'updated_at', 'giveaway_id'], 'integer'],
            [['vip_price', 'vip_subtract'], 'number'],
            [['vip_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vip_id' => 'Vip ID',
            'vip_name' => 'Vip Name',
            'vip_discount' => 'Vip Discount',
            'vip_price' => 'Vip Price',
            'vip_subtract' => 'Vip Subtract',
            'user_status' => 'User Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'giveaway_id' => 'Giveaway ID',
        ];
    }
    /**
     * @会员查询
     */
    public function selgrade()
    {
        return Vip::find()->all();
    }
    /**
     * @会员删除
     */
    public function vipdel($grade_id)
    {
        return Vip::findOne($grade_id)->delete();
    }
    /**
     * @会员添加
     */
    public function vipadd($data)
    {
        $vip = new Vip;
        $vip->vip_name = $data["Levelform"]["vip_name"];
        $vip->vip_discount = $data["Levelform"]["vip_discount"];
        $vip->vip_price = $data["Levelform"]["vip_price"];
        $vip->vip_subtract = $data["Levelform"]["vip_subtract"];
        $vip->created_at = time();
        $vip->updated_at = time();
        $vip->giveaway_id = $data["giveaway_id"];
        return $vip->save();
    }
    /**
     * @会员修改查询
     */
    public function gradeup($vip_id)
    {
        return $this->find()->where("vip_id=$vip_id")->asArray()->one();
    }
    /**
     * @会员修改
     */
    public function vipup($data)
    {
        $re = new Vip;
        $vip=$re->find()->where('vip_id ='.$data["vip_id"])->one();
        $vip->vip_name = $data["vip_name"];
        $vip->vip_discount = $data["vip_discount"];
        $vip->vip_price = $data["vip_price"];
        $vip->vip_subtract = $data["vip_subtract"];
        $vip->updated_at = time();
        $vip->giveaway_id = $data["giveaway_id"];
        return $vip->save();
    }



    
} 
