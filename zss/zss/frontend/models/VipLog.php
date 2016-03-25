<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_vip_log".
 *
 * @property integer $log_id
 * @property integer $user_id
 * @property integer $shop_id
 * @property string $order_id
 * @property integer $created_at
 */
class Viplog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_vip_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'shop_id', 'created_at'], 'integer'],
            [['order_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'user_id' => 'User ID',
            'shop_id' => 'Shop ID',
            'order_id' => 'Order ID',
            'created_at' => 'Created At',
        ];
    }
    public function selorder($user_id)
    {
        return [
            Viplog::find()
            ->select('*')
            ->innerJoin('`zss_order` on `zss_order`.`order_id` =`zss_vip_log`.`order_id`')
            ->innerJoin('`zss_shop` on `zss_shop`.`shop_id` =`zss_vip_log`.`shop_id`')
            ->innerJoin('`zss_user` on `zss_user`.`user_id` =`zss_vip_log`.`user_id`')
            ->where("zss_user.user_id='$user_id'")
            ->asArray()
            ->all(),
        ];

    }
}
