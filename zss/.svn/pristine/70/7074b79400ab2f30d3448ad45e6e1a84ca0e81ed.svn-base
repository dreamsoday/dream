<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\Admin;
use frontend\models\ZssAuthAdminNode;
use frontend\models\menu\Series;
use frontend\models\menu\SeriesForm;
use frontend\models\menu\MenuForm;
use frontend\models\menu\Menu;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;




/**
 * Site controller
 */
class MenuController extends Controller
{
  /**
 * 菜品分类的列表展示
 */
   		public function actionIndex(){
        $modeltype = new Series();
        $seriesinfo = $modeltype->type();//分类数据
   			return $this->render('/series/serieslist',["arrtype"=>$seriesinfo]);
   		}
/**
 * 菜品分类的添加页面
 */
  public function actionAddseries(){
        $model = new Series();
        $regist = new SeriesForm();
        $post = Yii::$app->request->post();
        if ($regist->load($post) && $regist->validate()) {
               $result = $model->addtype($post);
               if(!$result){
                  echo "<script>alert('添加失败');window.history.go(-1);</script>";
               }else{
                $this->redirect(array("/menu/index"));
               }
           }
        return $this->render('/series/seriesadd',["model"=>$regist]);
      }
/**
 * 菜品分类的删除
 */
   		public function actionDelone(){
   			$series_id = Yii::$app->request->get('series_id');
   			$model = new Series();
   		 	$result = $model->del($series_id);
   		 	if($result){
   		 		echo "1";
   		 	}else{
   		 		echo "0";
   		 	}
   		}
/**
 * 菜品分类的修改
 */
   		 public function actionEditor(){
        $model = new Series();
        $regist = new SeriesForm();
   			$series_id = Yii::$app->request->get('series_id');
        $result = $model->seleone($series_id);
        $post = Yii::$app->request->post();
        if($post){//??
          $result = $model->upone($post,$series_id);
          if(!$result){
             echo "<script>alert('修改失败');window.history.go(-1);</script>";
          }else{
            $this->redirect(array("/menu/index"));
          }
        }
   			return $this->render('/series/serieseditor',["result"=>$result,"model"=>$regist]);
   		}
 /**
 * 实现菜品列表
 */        
          public function actionList(){
            $modelmenu=new Menu();
            $modelseries=new Series();
            $typename=$modelseries->type();//所有的菜品分类名称
            $series_id=Yii::$app->request->get('series_id'); 
            //echo $series_id;
            $menuname=$modelmenu->menucontent($series_id);
            //print_r($menuname);die;
            if($series_id !=0){
              return $this->renderPartial('relist',["typename"=>$typename,"menuname"=>$menuname]);
            }
            else{

              return $this->render('list',["typename"=>$typename,"menuname"=>$menuname]);
            }
            
            
       
         }
/**
 * 实现菜品添加
 */
public function actionAddmenu(){
   $modelseries = new Series();
   $menuform = new MenuForm();
   $menu = new Menu();
   $typename = $modelseries->type();//所有的菜品分类名称
   $post = Yii::$app->request->post(); //接收数据
if ($menuform->load($post)){
            $menuform->image_url = UploadedFile::getInstance($menuform, 'image_url');
            if ($re=$menuform->upload()) {
              $imginfo = $menuform->imgthumb($re);
              $addstatus = $menu->addmenu($post,$imginfo);
          if(!$addstatus){
             echo "<script>alert('添加失败');window.history.go(-1);</script>";
          }else{
            $this->redirect(array("/menu/list"));
          }
        }
    }
  return $this->render('menuadd',["typename"=>$typename,"model"=>$menuform]);
}
         //菜品的删除
      public function actionDelmenu(){
         $menu_id=Yii::$app->request->get('menu_id');
         $model=new Menu();
         $result=$model->delmenu($menu_id);
         if($result){
            echo "1";
         }else{
            echo "0";
         }
      }
      //菜品编辑
      public function actionEditormenu(){
            $menu_id=Yii::$app->request->get('menu_id');
            $modelmenu=new Menu();
            $modelseries=new Series();
            $menuform = new MenuForm();
            $modeltype=$modelseries->type();
            $result=$modelmenu->editormenu($menu_id);
            $post=Yii::$app->request->post();
            if($post){
              $image=$_FILES["MenuForm"]["name"]["image_url"];
              if($image){
              $menupath=$menuform->img($menuform);
              if($menupath){
                $imginfo = $menuform->imgthumb($menupath);
                $addstatus = $modelmenu->editor($post,$imginfo);
              }
            }else{
              $addstatus=$modelmenu->editor($post,1);
            }
            if($addstatus){
               $this->redirect(array("/menu/list"));
             }else{
              echo "<script>alert('修改失败');window.history.go(-1);</script>";die;
             }
        }
 return $this->render('menuform',["result"=>$result,"modeltype"=>$modeltype,"model"=>$menuform]);
    }
}
