<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zss_order_info".
 *
 * @property integer $info_id
 * @property integer $order_id
 * @property integer $menu_num
 * @property integer $created_at
 * @property integer $menu_id
 */
class OrderInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_order_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'menu_num', 'created_at', 'menu_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'info_id' => 'Info ID',
            'order_id' => 'Order ID',
            'menu_num' => 'Menu Num',
            'created_at' => 'Created At',
            'menu_id' => 'Menu ID',
        ];
    }
}
