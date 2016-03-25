<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\Shop;
use frontend\models\ShopForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
header("content-type:text/html;charset=utf-8");
class ShopController extends Controller
{
	public $enableCsrfValidation=false;
	//门店列表
	public function actionIndex(){
		$shoplist=Shop::find()->all();
        
		//print_r($shoplist);die;
		return $this->render('shoplist',['shoplist'=>$shoplist]);
	}
	//门店删除
	public function actionShopdel()
	{
		$shop_id=Yii::$app->request->get('shop_id');
        $model=new Shop();
        $re=$model->shopdel($shop_id);
        if($re)
        {
            $shoplist=Shop::find()->all();
            return $this->render('shoplist',['shoplist'=>$shoplist]);
        }
		
	}
	//门店修改(1)
	public function actionShopup()
	{
		$shop_id=Yii::$app->request->get('shop_id');
		//print_r($shop_id);
        $store = new ShopForm();
        if($store->load(yii::$app->request->post())&&$store->validate())
        {
            $shop=Yii::$app->request->post();
    		//print_r($shop);die;
            $shop_update = new Shop();
            $shop_revise = $shop_update->shop_update($shop);
            if($shop_revise)
            {
                return $this->render('shoplist',['shoplist'=>$shop_revise]);
            }
        }
        else
        {
            $model=new Shop();
            $shoplist=$model->shopup($shop_id);
            if($shoplist)
            {
                return $this->render('shopup',['shoplist'=>$shoplist,'store'=>$store]);
            }
        }
        
	}
	//门店修改(2)
	public function actionShopgai()
	{
		$shop=Yii::$app->request->post();
		//print_r($shop);die;
        $shop_update = new Shop();
        $shop_revise = $shop_update->shop_update($shop);
        if($shop_revise)
        {
            return $this->render('shoplist',['shoplist'=>$shop_revise]);
        }
		
	}
	//门店添加(1)
	public function actionShopadd()
	{
	   $model = new ShopForm();
       //print_r($model);die;
       if($model->load(yii::$app->request->post())&&$model->validate()){
           $shop=Yii::$app->request->post();
           //print_r($shop);die;
           $shop = $shop['ShopForm'];
           $shop_add=new Shop();
           $shop_insert = $shop_add->shop_insert($shop);
           return $this->render('shoplist',['shoplist'=>$shop_insert]);
        }
        else
        {
            return $this->render('shopadd',['model'=>$model]);
        }
	   
	}
	//门店添加(2)
	/**
 * public function actionShopaddpro()
 * 	{
 * 		$shop=Yii::$app->request->post();
 * 	
 *         $model = new ShopForm;
 *         $shop_add=new Shop();
 *         
 *         
 * 		
 * 	}
 */
    //验证门店唯一性
    public function actionShopname()
    {
        $shopname = Yii::$app->request->post('shopname');
        $shop = new Shop();
        $shopname = $shop->shopname($shopname);
        if($shopname)
        {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }
}
