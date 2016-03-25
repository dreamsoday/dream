<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Order;
use frontend\models\Shop;
use frontend\models\Menu;
use frontend\models\User;
use frontend\models\ZssPayment;
use frontend\models\Payment;

/***
  *@负责人:宋听森
  *@模块:订单模块
  *@时间:2016年03月18日
  *@版权归xujian.online所有
  *
 ***/
/**
 * Site controller
 */
class OrderController extends Controller
{
	/*
    *action 显示订单列
    *
    *
  */
   	public function actionIndex()
    {
   			$model_payment = new Payment();//实例化表名
   			$payment = $model_payment->payment();//调用支付方式
   			//订单数据的查询
        $model_order = new Order();
        $order_list = $model_order->order_lists();
        return $this->render('order',array('payment'=>$payment,'order'=>$order_list));
   		}

   		/**
      * @action 按下拉条件查询订单数据
      * @parment 支付方式的字段
      * @order  支付状态的字段
      * @mode  吃饭方式的字段
      */
   		function actionOrder_search()
      {
          $request = Yii::$app->request;
          $payment = $request->get('payment');//接收支付方式
     			$order_state = $request->get('order_state');//接收支付状态
     			$mode = $request->get('mode');//接收吃饭方式
          $model_all = new Order();
          $search_all = $model_all->search($payment,$mode,$order_state);   			
          return $this->renderPartial('order_search',[
                'order' => $search_all,
            ]);	
   		}

   	/**
     * action 订单详情表
     * param   $order_id 订单表的ID
     * param   $order_id['shop_id'] 菜品表的ID
     * @return mixed
     */
   	  public function actionOrder_details()
      {
          $request = Yii::$app->request;
          $order_id = $request->get('order_id');
          $model = new Order();//实例化
          $order = $model->order_details($order_id);//把订单ID传入model
          $menu = new Menu;//实例化菜品表
          $menu_id = $menu->menu_list($order['shop_id']);//把门店ID传入model
          $order_list =  array_merge($order,$menu_id);//数组合并在一起
		  //print_r($order_list);die;
       		return $this->render('order2',array('order'=>$order_list));
   	  }

    /**
     * action 引用插件
     * one  日历开始时间
     * two  日历结束时间
     * @return mixed
     */
    function actionRili()
    {
        $request = Yii::$app->request;
        $one = $request->get('one');
        $two = $request->get('two');
        $one1 = strtotime("$one");
        $two1 = strtotime("$two");
        $model = new Order();//实例化
        $rili = $model->calendar($one1,$two1);
        return $this->renderPartial('order_search',[
                'order' => $rili,
            ]);
    }
}
