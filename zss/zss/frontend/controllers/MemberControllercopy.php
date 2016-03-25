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

/**
 *会员管理
 * MemberController
 */
header('content-type:text/html;charset=utf8');
class MemberController extends Controller
{
	//会员信息
	public function actionIndex()
	{
		$connection = Yii::$app->db;
		$command = $connection->createCommand('
			SELECT
			user_id ,user_name,user_sex,user_phone,user_price,user_integral,company_name,zss_user.created_at,zss_user.updated_at
			FROM
			zss_user
			INNER JOIN zss_company ON zss_user.company_id = zss_company.company_id
			order by user_id asc
		');
		$vip = $command->queryAll();
		$arr = $connection->createCommand("SELECT company_name,company_id FROM zss_company");
		$company = $arr->queryAll();
		return $this->render("/member/index",array("arr"=>$vip,"company"=>$company));
	}

	//会员删除
	public function actionVipdel()
	{
		$user_id = Yii::$app->request->get('user_id');
		//print_r($user_id);die;
		$connection = Yii::$app->db;
		$arr = $connection ->createCommand("DELETE FROM zss_user WHERE user_id='$user_id'")->execute();
		$this->redirect(array("/member/index"));
		
	}

	//会员添加
	public function actionUseradd()
	{
		$connection = Yii::$app->db;
		$user_name = Yii::$app->request->post("user_name");
		$user_phone = Yii::$app->request->post("user_phone");
		$user_password = Yii::$app->request->post("user_password");
		$user_price = Yii::$app->request->post("user_price");
		$user_integral = Yii::$app->request->post("user_integral");
		$company_id = Yii::$app->request->post("company_id");
		$time = time();
		$uptime = time();
		$data = $connection->createCommand()->insert('zss_user', [
		    'user_name' => "$user_name",
		    'user_phone' => "$user_phone",
		    'user_password' => "$user_password",
		    'user_price' => "$user_price",
		    'user_integral' => "$user_integral",
		    'company_id' => "$company_id",
		    'created_at' => "$time",
		    'updated_at' => "$uptime",
		])->execute();
		$this->redirect(array("/member/index"));
	}

	//会员详细信息
	public function actionVipdetails()
	{
		$user_id = Yii::$app->request->get('user_id');	
		$connection = Yii::$app->db;
		//会员信息
		$command = $connection->createCommand("
			SELECT distinct zss_user.user_id,user_name,user_price,user_sex,user_integral,zss_user.created_at
			FROM zss_user 
			inner join zss_pay_log on zss_user.user_id = zss_pay_log.user_id
			inner join zss_vip_log on zss_user.user_id = zss_vip_log.user_id
			WHERE zss_user.user_id='$user_id'
		");
		$details = $command->queryAll();
		//消费记录
		$command = $connection->createCommand("
			SELECT * FROM zss_vip_log 
			inner join zss_order on zss_vip_log.order_id = zss_order.order_id
			inner join zss_shop on zss_vip_log.shop_id = zss_shop.shop_id
			inner join zss_user on zss_user.user_id = zss_vip_log.user_id
			WHERE zss_user.user_id='$user_id'
		");
		$order = $command->queryAll();
		//充值金额
		$command = $connection->createCommand("
			SELECT * FROM zss_pay_log 
			inner join zss_user on zss_user.user_id = zss_pay_log.user_id
			WHERE zss_user.user_id='$user_id'
		");
		$paylog = $command->queryAll();

		return $this->render("/member/vipdetails",array("details"=>$details,"order"=>$order,"paylog"=>$paylog));
	}
		

	//会员等级
	public function actionGrade()
	{
		$connection = Yii::$app->db;
		$command = $connection->createCommand('SELECT * FROM zss_vip');
		$level = $command->queryAll();
		$command = $connection->createCommand('SELECT * FROM zss_giveaway');
		$giveaway = $command->queryAll();
		return $this->render("/member/grade",array("level"=>$level,"giveaway"=>$giveaway));
	}

	//等级删除
	public function actionGradedel()
	{
		$grade_id = Yii::$app->request->get('vip_id');
		//print_r($user_id);die;
		$connection = Yii::$app->db;
		$arr = $connection ->createCommand("DELETE FROM zss_vip WHERE vip_id='$grade_id'")->execute();
		$this->redirect(array("/member/grade"));
		
	}

	//等级添加
	public function actionGradeadd()
	{
		$connection = Yii::$app->db;
		$vip_name = Yii::$app->request->post("vip_name");
		$vip_discount = Yii::$app->request->post("vip_discount");
		$vip_price = Yii::$app->request->post("vip_price");
		$vip_subtract = Yii::$app->request->post("vip_subtract");
		$giveaway_id = Yii::$app->request->post("giveaway_id");
		$time = time();
		$uptime = time();
		$data = $connection->createCommand()->insert('zss_vip', [
		    'vip_name' => "$vip_name",
		    'vip_discount' => "$vip_discount",
		    'vip_price' => "$vip_price",
		    'vip_subtract' => "$vip_subtract",
		    'giveaway_id' => "$giveaway_id",
		    'created_at' => "$time",
		    'updated_at' => "$uptime",
		])->execute();
		$this->redirect(array("/member/grade"));
	}

	//等级修改查询
	public function actionGradeup()
	{
		$vip_id = Yii::$app->request->get("vip_id");
		$connection = Yii::$app->db;
		$command = $connection->createCommand("SELECT * FROM zss_vip WHERE vip_id = '$vip_id'");
		$level = $command->queryAll();
		$command = $connection->createCommand('SELECT * FROM zss_giveaway');
		$giveaway = $command->queryAll();
		return $this->render("/member/vip_update",array("level"=>$level,"giveaway"=>$giveaway));
	}

	//等级修改
	public function actionVipup()
	{
		$connection = Yii::$app->db;
		$vip_id = Yii::$app->request->post("vip_id");
		$vip_name = Yii::$app->request->post("vip_name");
		$vip_discount = Yii::$app->request->post("vip_discount");
		$vip_price = Yii::$app->request->post("vip_price");
		$vip_subtract = Yii::$app->request->post("vip_subtract");
		$giveaway_id = Yii::$app->request->post("giveaway_id");
		$uptime = time();
		$connection = Yii::$app->db;
		$connection->createCommand()->update('zss_vip', [
			'vip_name' => "$vip_name",
		    'vip_discount' => "$vip_discount",
		    'vip_price' => "$vip_price",
		    'vip_subtract' => "$vip_subtract",
		    'giveaway_id' => "$giveaway_id",
		    'updated_at' => "$uptime", 
		], "vip_id='$vip_id'")->execute();
		$this->redirect(array("/member/grade"));
	}

	//合作伙伴
	public function actionPartner()
	{
		$connection = Yii::$app->db;
		$command = $connection->createCommand('SELECT * FROM zss_company');
		$company = $command->queryAll();
		$command = $connection->createCommand('SELECT * FROM zss_giveaway');
		$giveaway = $command->queryAll();
		return $this->render("/member/partner",array("company"=>$company,"giveaway"=>$giveaway));
	}

	//公司删除
	public function actionPartnerdel()
	{
		$company_id = Yii::$app->request->get('company_id');
		//print_r($user_id);die;
		$connection = Yii::$app->db;
		$arr = $connection ->createCommand("DELETE FROM zss_company WHERE company_id='$company_id'")->execute();
		$this->redirect(array("/member/partner"));
		
	}

	//公司添加
	public function actionPartneradd()
	{
		$connection = Yii::$app->db;
		$company_name = Yii::$app->request->post("company_name");
		$company_discount = Yii::$app->request->post("company_discount");
		$company_price = Yii::$app->request->post("company_price");
		$company_subtract = Yii::$app->request->post("company_subtract");
		$giveaway_id = Yii::$app->request->post("giveaway_id");
		$time = time();
		$uptime = time();
		$data = $connection->createCommand()->insert('zss_company', [
		    'company_name' => "$company_name",
		    'company_discount' => "$company_discount",
		    'company_price' => "$company_price",
		    'company_subtract' => "$company_subtract",
		    'giveaway_id' => "$giveaway_id",
		    'created_at' => "$time",
		    'updated_at' => "$uptime",
		])->execute();
		$this->redirect(array("/member/partner"));
	}

	//公司修改查询
	public function actionPartnerup()
	{
		$company_id = Yii::$app->request->get("company_id");
		$connection = Yii::$app->db;
		$command = $connection->createCommand("SELECT * FROM zss_company WHERE company_id = '$company_id'");
		$company = $command->queryAll();
		$command = $connection->createCommand('SELECT * FROM zss_giveaway');
		$giveaway = $command->queryAll();
		return $this->render("/member/company_update",array("company"=>$company,"giveaway"=>$giveaway));
	}

	//公司修改
	public function actionCompanyup()
	{
		$connection = Yii::$app->db;
		$company_id = Yii::$app->request->post("company_id");
		$company_name = Yii::$app->request->post("company_name");
		$company_discount = Yii::$app->request->post("company_discount");
		$company_price = Yii::$app->request->post("company_price");
		$company_subtract = Yii::$app->request->post("company_subtract");
		$giveaway_id = Yii::$app->request->post("giveaway_id");
		$uptime = time();
		$connection = Yii::$app->db;
		$connection->createCommand()->update('zss_company', [
			'company_name' => "$company_name",
		    'company_discount' => "$company_discount",
		    'company_price' => "$company_price",
		    'company_subtract' => "$company_subtract",
		    'giveaway_id' => "$giveaway_id",
		    'updated_at' => "$uptime", 
		], "company_id='$company_id'")->execute();
		$this->redirect(array("/member/partner"));
	}

}
