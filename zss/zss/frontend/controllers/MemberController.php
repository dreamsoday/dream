<?php
namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\Vip;
use frontend\models\Order;
use frontend\models\Giveaway;
use frontend\models\Company;
use frontend\models\Viplog;
use frontend\models\Paylog;
use frontend\models\Form;
use frontend\models\Levelform;
use frontend\models\Companyform;
use yii\web\Controller;

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
		//两表联查显示会员
		$vip = User::find()->with('company')->all();
		//所在公司
		$company = new Company;
		$companyinfo = $company->selcompany();  
		$model = new Form();
		if (Yii::$app->request->post()) {
			$n = 1;
		} else {
			$n = 0;
		}
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {        	
        	$user = new User;
			$user->user_add(Yii::$app->request->post());
        	$this->redirect(array("/member/index"));
        }
		return $this->render("/member/index",array("vip"=>$vip,"companyinfo"=>$companyinfo,"model"=>$model,"n"=>$n));
	}

	//会员删除
	public function actionVipdel()
	{
		$id = Yii::$app->request->get('user_id');	
		$user = new User;
		$arr = $user->user_del($id);
		if ($arr) {
			echo "<script>alert('删除成功');
				location.href='index.php?r=/member/index';
			</script>";
		}
		
	}

	//会员详细信息
	public function actionVipdetails()
	{
		$user_id = Yii::$app->request->get('user_id');	
		$user = new User();
		$details = $user->seluser($user_id);
		$orders = new Viplog();
		$order = $orders->selorder($user_id);
		$paylogs = new Paylog();
		$paylog = $paylogs->selpay($user_id);
		return $this->render("/member/vipdetails",array("details"=>$details,"order"=>$order,"paylog"=>$paylog));
	}

	//会员等级
	public function actionGrade()
	{
		//会员等级
		$level = new Vip;
		$level = $level->selgrade();
		//赠品
		$giveaway = new Giveaway;
		$giveaway = $giveaway->selgiveaway();
		$model = new Levelform();
		if (Yii::$app->request->post()) {
			$n = 1;
		} else {
			$n = 0;
		}
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	//print_r($_POST);die;
        	$vip = new Vip;
			$vip->vipadd(Yii::$app->request->post());
        	$this->redirect(array("/member/grade"));
        }
		return $this->render("/member/grade",array("level"=>$level,"giveaway"=>$giveaway,"model"=>$model,"n"=>$n));
	}

	//等级删除
	public function actionGradedel()
	{
		$grade_id = Yii::$app->request->get('vip_id');
		$vip = new Vip;
		$arr = $vip->vipdel($grade_id);
		if ($arr) {
			echo "<script>alert('删除成功');
				location.href='index.php?r=/member/grade';
			</script>";
		}
		
	}

	//等级修改查询
	public function actionGradeup()
	{
		$vip_id = Yii::$app->request->get("vip_id");
		$vip = new Vip;
		$level = $vip->gradeup($vip_id);
		$giveaway = new Giveaway;
		$giveaway = $giveaway->selgiveaway();
		return $this->render("/member/vip_update",array("level"=>$level,"giveaway"=>$giveaway));
	}

	//等级修改
	public function actionVipup()
	{
		$vip = new Vip;
		$arr = $vip->vipup(Yii::$app->request->post());
		if ($arr) {
			echo "<script>alert('修改成功');
				location.href='index.php?r=/member/grade';
			</script>";
		}
	}

	//合作伙伴
	public function actionPartner()
	{
		$company = new Company;
		$company = $company->selcompany();
		$giveaway = new Giveaway;
		$giveaway = $giveaway->selgiveaway();
		$model = new Companyform();
		if (Yii::$app->request->post()) {
			$n = 1;
		} else {
			$n = 0;
		}
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	$company = new Company;
			$company->companyadd(Yii::$app->request->post());
        	$this->redirect(array("/member/partner"));
        }
		return $this->render("/member/partner",array("company"=>$company,"giveaway"=>$giveaway,"model"=>$model,"n"=>$n));
	}

	//公司删除
	public function actionPartnerdel()
	{
		$company_id = Yii::$app->request->get('company_id');
		$company = new Company;
		$arr = $company->companydel($company_id);
		if ($arr) {
			echo "<script>alert('删除成功');
				location.href='index.php?r=/member/partner';
			</script>";
		}
	}

	//公司修改查询
	public function actionPartnerup()
	{
		$company_id = Yii::$app->request->get("company_id");
		$company = new Company;
		$company = $company->companysel($company_id);
		$giveaway = new Giveaway;
		$giveaway = $giveaway->selgiveaway();
		return $this->render("/member/company_update",array("company"=>$company,"giveaway"=>$giveaway));
	}

	//公司修改
	public function actionCompanyup()
	{
		$company = new Company;
		$arr = $company->companyup(Yii::$app->request->post());
		if ($arr) {
			echo "<script>alert('修改成功');
				location.href='index.php?r=/member/partner';
			</script>";
		}
	}


}
