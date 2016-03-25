<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_payment".
 *
 * @property integer $payment_id
 * @property string $payment_mode
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_mode'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'payment_mode' => 'Payment Mode',
        ];
    }
    //关联订单表
    public function getOrder()
    {
        // 第一个参数为要关联的子表模型类名，
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasOne(Order::className(), ['payment_id' => 'payment_id']);
    }
    /*
        *action 调用支付方式
        *
    */
    function payment()
    {
        return $this->find()->all();
    }
}
