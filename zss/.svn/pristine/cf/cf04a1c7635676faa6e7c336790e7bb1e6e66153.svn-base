<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\Admin;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Shop;
/**
 * Site controller
 */
class LoginController extends Controller
{
	public $enableCsrfValidation=false;
	public function actionLogin(){
      if(isset($cookies['username']))
      {
         $cookies->destroy();
      }
		return $this->renderPartial('login');
	}
	public function actionLogsuccess(){
      $shoplist=Shop::find()->all();
		return $this->render('/shop/shoplist',['shoplist'=>$shoplist]);
	}
	public function actionEncode()
	{
		$model=new Admin();
		$arr=$model->nav();
		echo json_encode($arr);die;
	}
   //登陆验证
   public function actionProving()
   {
      //echo 123;die;
      $username=Yii::$app->request->post('username');
      $cookies = Yii::$app->response->cookies;
      $cookies->add(new \yii\web\Cookie([
          'name' => "username",
          'value' => "$username",
      ]));

      //print_r($username);die;
      $password=md5(Yii::$app->request->post('password'));
      $admin=Admin::find()->where("admin_name='$username' and admin_password='$password'")->one();
      if($admin)
      {
         echo 1;
      }
      else
      {
         echo 2;
      }
   }
}
