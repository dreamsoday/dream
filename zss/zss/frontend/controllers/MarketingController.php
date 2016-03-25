<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Wallet;
use frontend\models\MarketingForm;
use frontend\models\Add;
use frontend\models\Giveaway;
use frontend\models\Coupon;
use frontend\models\Menu;
use frontend\models\Discount;
use frontend\models\Shop;
use frontend\models\Subtract;
use frontend\models\Series;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
header("content-type:text/html;charset=utf-8");
/**
 * Marketing controller
 */
class MarketingController extends Controller
{/*	
	/**
	 *	红包管理页面
	 *	@ $wallet_list 为查询红包的数据	
	 */
	public function actionIndex()
	{
		$wallet = new Wallet();   //实例化ZssWallet对象
		$wallet_list = $wallet->selectwallet();
		return $this->render('wallet',array('wallet_list'=>$wallet_list['0']));
	}
	/**
	 * 验证红包名称唯一性
	 */
	public function actionWalletone()
	{
		$wallet_name = $_GET['wallet_name'];
		$wallet = new Wallet;
		$re = $wallet->walletone($wallet_name);
		if($re){
			echo "红包名称已存在!";
		}else{
			echo "红包名称可以添加!";
		}
	}
	/**
	 *  红包的删除
	 *  @wallet_id 为要删除红包
	 */
	public function actionWalletdel()
	{
		$wallet_id = $_GET['wallet_id'];
		$wallet = new Wallet();
		$re = $wallet->walletdel($wallet_id);
		if($re){
			$this->redirect(array("/marketing/index"));
		}
	}
	/**
	 *  红包的添加
	 *  @ wallet_name       红包名称
	 *  @ wallet_num_price  红包是否限定金额 1限定 0不限定
	 *  @ wallet_share      分享者得到金额
	 *  @ wallet_sharing    被分享者得到金额
	 *  @ wallet_template   红包模板
	 *  @ wallet_price      限定金额
	 *  @ created_at        创建时间
	 */
	public function actionWalletadd()
	{
		$data['wallet_name'] = Yii::$app->request->post('wallet_name');
		$data['wallet_num_price'] = Yii::$app->request->post('wallet_num_price');
		$data['wallet_price'] = Yii::$app->request->post('wallet_price');
		$data['wallet_share'] = Yii::$app->request->post('wallet_share');
		$data['wallet_sharing'] = Yii::$app->request->post('wallet_sharing');
		if($data['wallet_price']=="") {$data['wallet_price'] = 2;}
		if($data['wallet_share']=="") {$data['wallet_share'] = 1;}
		if($data['wallet_sharing']=="") {$data['wallet_sharing'] = 1;}
		$data['created_at'] = time();
        $data['wallet_show'] = 1;
        $data['updated_at'] = time();
        //print_r($data);die;
		$wallet = new Wallet;
		$re = $wallet->walletadd($data);
		if($re){
			$this->redirect(array("/marketing/index"));
		}
	}
	/**
	 *	红包的修改
	 */
	public function actionWalletupd()
	{
		$id = $_GET['wallet_id'];
		$wallet = new Wallet;   //实例化ZssWallet对象
		$wallet_list = $wallet->walletsearch($id);
		return $this->render('walletupd',array('wallet_list'=>$wallet_list,'wallet_id'=>$id));
	}
	//红包修改
	public function actionWalletupdate()
	{
		$data['wallet_name'] = Yii::$app->request->post('wallet_name');
		$data['wallet_num_price'] = Yii::$app->request->post('wallet_num_price');
		$data['wallet_price']=Yii::$app->request->post('wallet_price');
		$data['wallet_share']=Yii::$app->request->post('wallet_share');
		$data['wallet_sharing']=Yii::$app->request->post('wallet_sharing');
		$data['wallet_id']=Yii::$app->request->post('wallet_id');
		if($data['wallet_price']=="") {$data['wallet_price']=2;}
		if($data['wallet_share']=="") {$data['wallet_share']=1;}
		if($data['wallet_sharing']=="") {$data['wallet_sharing']=1;}
		$wallet = new Wallet;
		$re = $wallet->walletupdate($data);
		if($re){
			$this->redirect(array("/marketing/index"));
		}
	}
	/**
	 *   折扣表显示
	 */
	public function actionDiscount()
	{
		$discount = new Discount;   //实例化ZssWallet对象
		$discount_list = $discount->discountshow();
		$shop = new Shop;   //实例化Shop对象
		$shop_list = $shop->find()->asArray()->all();
		return $this->render('discount',array('discount_list'=>$discount_list['0'],'shop_list'=>$shop_list));
	}
	/**
	 *  折扣的删除
	 */
	public function actionDiscountdel()
	{
		$discount_id = $_GET['discount_id'];
		$discount = new Discount;   //实例化Zssdiscount对象
		$re = $discount->discountdel($discount_id);
		if($re){
			$this->redirect(array("/marketing/discount"));
		}
	}
	//折扣的添加
	public function actionDiscountadd()
	{
		$request = Yii::$app->request;
		$discount = new Discount;
		$re = $discount->discountadd(Yii::$app->request->post());
		if($re){
			$this->redirect(array("/marketing/discount"));
		}
	}
	//折扣的修改
	public function actionDiscountupd()
	{
		$discount_id = Yii::$app->request->get('discount_id');
		$discount = new Discount;   //实例化Zssdiscount对象
		$discount_list = $discount->discountupd($discount_id);
		$shop = new Shop;   //实例化Shop对象
		$shop_list = $shop->find()->asArray()->all();
		return $this->render('discountupd',array('discount_list'=>$discount_list['0'],'discount_id'=>$discount_id,'shop_list'=>$shop_list));
	}
	public function actionDiscountupdate()
	{
		$request = Yii::$app->request;
		$discount = new Discount;
		$re = $discount->discountupdate(Yii::$app->request->post());
		if($re){
			$this->redirect(array("/marketing/discount"));
		}
	}
	/**
	 *   满减显示页面
	 */
	public function actionSubtract()
	{
		$subtract = new Subtract;   //实例化ZssSubtract对象
		$subtract_list = $subtract->subtractshow();
		return $this->render('subtract',array('subtract_list'=>$subtract_list['0']));
	}
	//满减的删除
	public function actionSubtractdel(){
		$subtract_id = $_GET['subtract_id'];
		$subtract = new Subtract;   //实例化ZssSubtract对象
		$re = $subtract->subtractdel($subtract_id);
		if($re){
			$this->redirect(array("/marketing/subtract"));
		}
	}
	//满减的添加
	public function actionSubtractadd()
	{
		$request = Yii::$app->request;
		$subtract = new Subtract;
		$re = $subtract->subtractadd(Yii::$app->request->post());
		if($re){
			$this->redirect(array("/marketing/subtract"));
		}
	}
	//满减的修改
	public function actionSubtractupd(){
		$subtract_id = $_GET['subtract_id'];
		$subtract = new Subtract;   //实例化ZssSubtract对象
		$subtract_list = $subtract->subtractupd($subtract_id);
		return $this->render('subtractupd',array('subtract_list'=>$subtract_list['0'],'subtract_id'=>$subtract_id));
	}
	public function actionSubtractupdate()
	{
		$subtract = new Subtract; 
		$re = $subtract->subtractupdate(Yii::$app->request->post());
		if($re){
			$this->redirect(array("/marketing/subtract"));
		}
	}

	/**
	 *   满赠显示页面
	 */
	public function actionAdd()
	{
		$add = new Add();
		$add_list = $add->addshow();
		$giveaway = new Giveaway;   //实例化Giveaway对象
		$giveaway_list = $giveaway->giveawayshow();
		$model = new MarketingForm;
		if (Yii::$app->request->post())
		{
			$is_show = 1;
		}else{
			$is_show = 0;
		}
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			$add = new Add;
			$re = $add->addpro(Yii::$app->request->post());
			if ($re){
				$this->redirect(array("/marketing/add"));
			}
		}else{
			return $this->render('add',array('is_show'=>$is_show,'add_list'=>$add_list,'giveaway_list'=>$giveaway_list['0'],'model'=>$model));
		}
	}
	//满赠的删除
	public function actionAdddel()
	{
		$add_id = $_GET['add_id'];
		$add = new Add;
		$re = $add->adddel($add_id);
		if($re){
			$this->redirect(array("/marketing/add"));
		}
	}
	//满赠的修改
	public function actionAddupd()
	{
		$add_id = $_GET['add_id'];
		$add = new Add;
		$add_list = $add->addsearch($add_id);
		$giveaway = new Giveaway;   //实例化Giveaway对象
		$giveaway_list = $giveaway->giveawayshow();
		return $this->render('addupd',array('add_list'=>$add_list['0'],'giveaway_list'=>$giveaway_list['0'],'add_id'=>$add_id));
	}
	public function actionAddupdate()
	{
		$add = new Add;
		$re = $add->addupdate(Yii::$app->request->post());
		if($re)$this->redirect(array("/marketing/add"));
	}

	/**
	 *优惠券显示
	 */
	public function actionCoupon()
	{
		$coupon = new Coupon;
		$coupon_list = $coupon->couponshow();
		$series = new Series;
		$series_list = $series->seriesshow();
		return $this->render('coupon',array('coupon_list'=>$coupon_list,'series_list'=>$series_list));
	}
	public function actionSeriesmenu()
	{
		$series_id = $_GET['series_id'];
		$series = new Series;
		$data = $series->seriesmenu($series_id);
		echo "<h3>".$data['0']['series_name']."</h3>";
		foreach ($data as $k=>$v) {
			echo "<input type='checkbox' name='menu_id[]' value=".$v['menu_id'].">".$v['menu_name']."</br>";
		}
	}
	//添加
	public function actionCouponadd()
	{
		$coupon = new Coupon;
		$re = $coupon->couponadd(Yii::$app->request->post());
		if ($re){
			$this->redirect(array("/marketing/coupon"));
		}
	}
	//优惠券的删除
	public function actionCoupondel()
	{
		$coupon_id = $_GET['coupon_id'];
		$coupon = new Coupon;
		$re = $coupon->coupondel($coupon_id);
		if($re){
			$this->redirect(array("/marketing/coupon"));
		}
	}
	public function actionCouponupd()
	{
		$coupon_id = $_GET['coupon_id'];
		$coupon = new Coupon;
		$coupon_list = $coupon->couponsearch($coupon_id);
		$series = new Series;
		$series_list = $series->seriesshow();
		return $this->render('couponupd',array('coupon_list'=>$coupon_list,'series_list'=>$series_list,'coupon_id'=>$coupon_id));
	}
	
	public function actionCouponupdate()
	{
		$coupon = new Coupon;
		$re = $coupon->couponupdate(Yii::$app->request->post());
		if($re){
			$this->redirect(array("/marketing/coupon"));
		}
	}
	/**
	 *   判断优惠券名称唯一性
	 */
	public function actionCouponone()
	{
		$coupon_name = $_GET['coupon_name'];
		$coupon = new Coupon;
		$re = $coupon->couponone($coupon_name);
		if($re){
			echo  "优惠券名称已存在!";
		}else{
			echo "优惠券名称可以添加!";
		}
	}
}
