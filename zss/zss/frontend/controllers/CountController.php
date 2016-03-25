<?php
namespace frontend\controllers;
header("content-type:text/html;charset=utf-8");
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Admin;
use frontend\models\AmountExcel;
use frontend\models\SalesExcel;
use frontend\models\Shop;
use frontend\models\Order;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * @author 徐建
 * @统计管理
 * @begintime:2016/15：54
 */
class CountController extends Controller
{ 
    /**
     * @财务统计
     * @finance
     */
     public function actionFinance()
     {
       //获取登陆用户
       $user = $_COOKIE['username'];
       $admin = new Admin();
       $admin_user_message = $admin->adminuser($user);
       //print_r($admin_user_message);die;
       $shop_name = $admin_user_message[0]['shop_name'];
       //判断用户身份
       if($admin_user_message[0]['role_id']=='1')
       {
           //实例化model
           $Order = new Order();
           $order_realamount = $Order->order();
           //求出总额
           foreach($order_realamount as $v)
           {
               $amountinfo[] = $v['order_realamount'];
           }
           $amount = array_sum($amountinfo);
           //echo $amount;die;
           return $this->render('finance',['order_realamount'=>$order_realamount,'amount'=>$amount,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name]);
       }else
       {
       //实例化model
       $Shop = new Shop();
       $order_realamount = $Shop->myshoporder($shop_name);
       //print_r($order_realamount);die;
       //print_r($shop_message);die;
       foreach($order_realamount as $v)
       {
       $amountinfo[] = $v['order_realamount'];
       }
       //求出本店收入总价格
       $amount = array_sum($amountinfo);
       //echo $shop_realamount;die;
       return $this->render('finance',['order_realamount'=>$order_realamount,'amount'=>$amount,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name]);
       }
     }
     /**  
      * @销量统计
      * @Sales
      */
     public function actionSales()
     {
       //获取用户信息
       $user=$_COOKIE['username'];
       //查询此用户信息
       $admin = new Admin();
       $admin_user_message = $admin->adminuser($user);
       //print_r($admin_user);die;
       $shop_name=$admin_user_message[0]['shop_name'];
       //判断用户身份
       if($admin_user_message[0]['role_id']==1)
       {
           //实例化model
           $Order = new Order();
           $salesinfo = $Order->sales();
           //print_r($salesinfo);die;
           return $this->render('sales',['salesinfo'=>$salesinfo,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name]);
       }else
       {
           //实例化model
           $Shop = new Shop();
           $salesinfo = $Shop->myshopsales($shop_name);
           return $this->render('sales',['salesinfo'=>$salesinfo,'role_id'=>$admin_user_message[0]['role_id'],'shop_name'=>$shop_name]);
       }

     }
     /**
      * @财务统计导出
      * @excelout1
      */
     public function actionExcelout1()
     {
       //从数据库取得需要导出的数据
       $request = Yii::$app->request;
       $role_id = $request->get('role_id','');
       $shop_name = $request->get('shop_name','');
       if($role_id==1)
       {
             //实例化model
             $Order = new Order();
             $order_realamount = $Order->order();
             //求出总额
             //print_r($order_realamount);die;
             //实例化model
             $AmountExcel = new AmountExcel();
             $AmountExcel->amount($order_realamount);
       }else
       {
             //实例化model
             $Shop = new Shop();
             $order_realamount = $Shop->myshoporder($shop_name);
             //实例化model
             $AmountExcel = new AmountExcel();
             $AmountExcel = amount($order_realamount);
       }

     }
     /**
      * @销量报表导出
      * @Excelout2
      */
     public function actionExcelout2()
     {

       //从数据库取得需要导出的数据
       $request = Yii::$app->request;
       $role_id = $request->get('role_id','');
       $shop_name = $request->get('shop_name','');
     if($role_id==1)
     {     
           //实例化model
           $Order = new Order();
           $salesinfo = $Order->sales();
           //print_r($salesinfo);die;
           //实例化model
           $SalesExcel = new SalesExcel();
           $SalesExcel->sales($salesinfo);
     }else{
           //实例化model
           $Shop = new Shop();
           $salesinfo = $Shop->myshopsales($shop_name);
           //实例化model
           $SalesExcel = new SalesExcel();
           $SalesExcel->sales($salesinfo);
     }
  }
}
