<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_order".
 *
 * @property integer $order_id
 * @property string $order_sn
 * @property integer $user_id
 * @property string $order_freight
 * @property integer $delivery_type
 * @property string $order_address
 * @property integer $order_seatnumber
 * @property string $order_amount
 * @property string $order_realamount
 * @property integer $payment_id
 * @property integer $order_paystatus
 * @property integer $order_paytime
 * @property integer $created_att
 * @property integer $shop_id
 * @property integer $order_integral
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'delivery_type', 'order_seatnumber', 'payment_id', 'order_paystatus', 'order_paytime', 'created_att', 'shop_id', 'order_integral'], 'integer'],
            [['order_freight', 'order_amount', 'order_realamount'], 'number'],
            [['order_sn'], 'string', 'max' => 20],
            [['order_address'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_sn' => 'Order Sn',
            'user_id' => 'User ID',
            'order_freight' => 'Order Freight',
            'delivery_type' => 'Delivery Type',
            'order_address' => 'Order Address',
            'order_seatnumber' => 'Order Seatnumber',
            'order_amount' => 'Order Amount',
            'order_realamount' => 'Order Realamount',
            'payment_id' => 'Payment ID',
            'order_paystatus' => 'Order Paystatus',
            'order_paytime' => 'Order Paytime',
            'created_att' => 'Created Att',
            'shop_id' => 'Shop ID',
            'order_integral' => 'Order Integral',
        ];
    }
    /*================================徐建begin=============================================*/
    /**
     * @CountController
     * 统计管理
     *@author:徐建
     */
    public function order()
    {
        $order_realamount = Order::find()
                ->select('zss_shop.shop_id,zss_shop.shop_name,zss_menu.menu_name,zss_order_info.menu_num,zss_order.order_realamount,zss_order.order_paytime')
                ->innerJoin(" `zss_order_info` on `zss_order`.`order_id` = `zss_order_info`.`order_id` ")
                ->innerJoin(" `zss_shop` on `zss_order`.`shop_id` = `zss_shop`.`shop_id`")
                ->innerJoin("`zss_menu` on `zss_shop`.`menu_id` = `zss_menu`.`menu_id`")
                ->asArray()
                ->all();
        //print_r($order_realamount);die;
        return $order_realamount;
    }
    /**
     * @CountController
     * 销量统计
     *@author:徐建
     */
    public function sales()
    {
        $salesinfo = Order::find()
                ->select('SUM(menu_num),SUM(order_realamount),`zss_menu`.`menu_name`,`zss_order_info`.`order_id`')
                ->innerJoin("`zss_order_info` on `zss_order`.`order_id` = `zss_order_info`.`order_id`")
                ->innerJoin("`zss_menu` on `zss_order_info`.`menu_id` = `zss_menu`.`menu_id`")
                ->groupBy("`zss_order_info`.`menu_id`")
                ->orderBy(['SUM(menu_num)'=>SORT_DESC])
                ->asArray()
                ->all();
        //print_r($salesinfo);die;
        return $salesinfo;
    }
    /*===============================徐建end==============================*/
    /*================================宋听森begin====================================*/
     /**
     *@author:宋听森
     *@订单管理
     */
    //关联用户表
    public function getUser()
    {
        // 第一个参数为要关联的子表模型类名，
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
    //关联门店表
     public function getShop()
    {
        // 第一个参数为要关联的子表模型类名，
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasOne(Shop::className(), ['shop_id' => 'shop_id']);
    }
    //关联支付方式表
     public function getPayment()
    {
        // 第一个参数为要关联的子表模型类名，
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasOne(Payment::className(), ['payment_id' => 'payment_id']);
    }

    /**
     * action 订单表显示数据联查字段
     * param $order_id 订单表的ID
     * asArray(); 转化为数组
     * @return mixed
     */
    function order_details($order_id)
    {
         return  Order::find()->with('user')->with('shop')->with('payment')->where(['order_id'=>$order_id])->asArray()->one();
    }

    /**
     * action 订单表显示数据
     * @return mixed
     */
    function order_lists()
    {
        return Order::find()
        -> select('*')
        -> innerjoin("`zss_payment` on `zss_payment`.`payment_id`=`zss_order`.`payment_id`")
        -> innerjoin("`zss_shop` on `zss_shop`.`shop_id`=`zss_order`.`shop_id`")
        -> innerjoin("`zss_menu` on `zss_menu`.`menu_id`=`zss_shop`.`menu_id`")
        -> innerjoin("`zss_user` on `zss_user`.`user_id`=`zss_order`.`user_id`")
        -> asArray()
        -> all();
    }

    /**
     * action 订单表多条件查询显示数据
     * payment 订蛋支付方式
     * mode 订蛋吃饭方式
     * order_state 订蛋支付状态
     * @return mixed
     */
    function search($payment,$mode,$order_state)
    {
        if($payment == "微信")
            {
                $payment = 1;
            }
        else if($payment == "网银")
            {
                $payment = 2;
            }
        else if($payment == "支付宝")
            {
                $payment = 3;
            }
            //吃饭方式
        if($mode == "外卖")
            {
                $mode = 1;
            }
        else if($mode == "自取"){
                $mode = 2;
            }
        else if($mode == "餐食"){
                $mode = 3;
            }
            //支付状态
        if($order_state == "未支付")
            {
                $order_state = 1;
            }
        else if($order_state == "已支付")
            {
                $order_state = 2;
            }
        else if($order_state == "支付失败")
            {
                $order_state = 3;
            }
            //拼接联查方式
        $where = "";
        if($payment != "")
            {
                $where .= "zss_order.payment_id=$payment";
            }
        else
            {
                $where .= 1;
            }

        if($order_state != "")
            {
                $where .= " and zss_order.order_paystatus=$order_state";
            }
         else
            {
                $where .= " and 1";
            }

         if($mode != "")
            {
                $where .= " and zss_order.delivery_type=$mode";
            }
         else
            {
                $where .= " and 1";
            }
    return Order::find()
        -> select('*')
        -> innerjoin("`zss_payment` on `zss_payment`.`payment_id`=`zss_order`.`payment_id`")
        -> innerjoin("`zss_shop` on `zss_shop`.`shop_id`=`zss_order`.`shop_id`")
        -> innerjoin("`zss_menu` on `zss_menu`.`menu_id`=`zss_shop`.`menu_id`")
        -> innerjoin("`zss_user` on `zss_user`.`user_id`=`zss_order`.`user_id`")
        -> where($where)
        -> asArray()
        -> all();
    }

    /**
     * action 根据日立时间查询数据
     * one 日历开始时间
     * two 日历结束时间
     * @return mixed
     */
    function calendar($one1,$two1)
    {
        return Order::find()
        -> select('*')
        -> innerjoin("`zss_payment` on `zss_payment`.`payment_id`=`zss_order`.`payment_id`")
        -> innerjoin("`zss_shop` on `zss_shop`.`shop_id`=`zss_order`.`shop_id`")
        -> innerjoin("`zss_menu` on `zss_menu`.`menu_id`=`zss_shop`.`menu_id`")
        -> innerjoin("`zss_user` on `zss_user`.`user_id`=`zss_order`.`user_id`")
        -> where("zss_order.created_att>='$one1' and zss_order.created_att<='$two1'")
        -> asArray()
        -> all();
    }

    /*=================================宋听森end=====================================*/
   
}
