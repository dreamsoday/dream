<?php

namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "zss_coupon".
 *
 * @property integer $coupon_id
 * @property string $coupon_name
 * @property string $coupon_price
 * @property integer $menu_id
 * @property integer $series_id
 * @property integer $add_show
 * @property integer $add_status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $end_at
 */
class Coupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coupon_price'], 'number'],
            [['menu_id', 'series_id', 'add_show', 'add_status', 'created_at', 'updated_at', 'end_at'], 'integer'],
            [['coupon_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coupon_id' => 'Coupon ID',
            'coupon_name' => 'Coupon Name',
            'coupon_price' => 'Coupon Price',
            'menu_id' => 'Menu ID',
            'series_id' => 'Series ID',
            'add_show' => 'Add Show',
            'add_status' => 'Add Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'end_at' => 'End At',
        ];
    }
    /**
     *  优惠券的显示
     */
    public function couponshow()
    {
        return Coupon::find()
               ->select('*')
               ->innerJoin('`zss_menu` on `zss_coupon`.`menu_id` = `zss_menu`.`menu_id`')
               ->innerJoin('`zss_series` on `zss_coupon`.`series_id` = `zss_series`.`series_id`')
               ->asArray()
               ->all();
    }

     /**
     *  优惠券的删除
     */
    public function coupondel($coupon_id)
    {
        return Coupon::deleteAll('coupon_id=:coupon_id',array(":coupon_id"=>$coupon_id));
    }

    public function couponsearch($coupon_id)
    {
        return Coupon::find()->where("coupon_id=:coupon_id",array(':coupon_id'=>$coupon_id))->all();
    }

    /**
     * 优惠券的添加
     */
    public function couponadd($data)
    {
        //print_r($data['menu_id']);die;
        $created_at = time();
        $end_at = time()+24*60*60;
        $str ="";
        if(count($data['menu_id'])>1){
            for ($i=0;$i<count($data['menu_id']);$i++) { 
                $str = implode(',',$data['menu_id']);
            }
            $id =$str;  
        }else{
            $id = $data['menu_id']['0'];
        }
        unset($data['YII_CSRF_TOKEN']);
        $data['menu_id'] = $id;
        $data['created_at'] = $created_at;
        $data['updated_at'] = $created_at;
        $data['end_at'] = $end_at;
        return Yii::$app->db->createCommand()->insert('zss_coupon',$data)->execute();
    }

    /**
     *  优惠券的修改
     */
    public function couponupdate($data)
    {
        $updated_at = time();
        $end_at = time()+24*60*60;
        $str = "";
        if(count($data['menu_id'])>1){
            for ($i=0;$i<count($data['menu_id']);$i++) { 
                $str = implode(',',$data['menu_id']);
            }
            $id =$str;  
        }else{
            $id = $data['menu_id']['0'];
        }
        return Coupon::updateAll(array('coupon_name'=>$data['coupon_name'],'coupon_price'=>$data['coupon_price'],'menu_id'=>$id,'series_id'=>$data['series_id'],'updated_at'=>$updated_at,'end_at'=>$end_at),'coupon_id=:coupon_id',array(":coupon_id"=>$data['coupon_id']));
    }
    /**
     * 优惠券名称唯一性
     */
    public function couponone($coupon_name)
    {
        return Coupon::find()->where('coupon_name=:coupon_name',array(':coupon_name'=>$coupon_name))->all();
    }
}
