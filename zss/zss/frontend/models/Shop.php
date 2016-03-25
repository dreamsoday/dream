<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_shop".
 *
 * @property integer $shop_id
 * @property string $shop_name
 * @property string $shop_phone
 * @property string $shop_addr
 * @property string $shop_logitude
 * @property string $shop_latitude
 * @property integer $shop_open
 * @property integer $shop_over
 * @property integer $shop_opens
 * @property integer $shop_overs
 * @property integer $shop_support
 * @property integer $shop_status
 * @property string $shop_remarks
 * @property integer $shop_sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_open', 'shop_over', 'shop_opens', 'shop_overs', 'shop_support', 'shop_status', 'shop_sort', 'created_at', 'updated_at'], 'integer'],
            ['shop_name','required', 'string', 'max' => 30,'message'=>'不能为空'],
            ['shop_phone','required', 'string', 'max' => 11],
            ['shop_addr', 'string', 'max' => 50],
            [ 'shop_latitude', 'string', 'max' => 20],
            ['shop_remarks', 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shop_id' => 'Shop ID',
            'shop_name' => 'Shop Name',
            'shop_phone' => 'Shop Phone',
            'shop_addr' => 'Shop Addr',
            'shop_logitude' => 'Shop Logitude',
            'shop_latitude' => 'Shop Latitude',
            'shop_open' => 'Shop Open',
            'shop_over' => 'Shop Over',
            'shop_opens' => 'Shop Opens',
            'shop_overs' => 'Shop Overs',
            'shop_support' => 'Shop Support',
            'shop_status' => 'Shop Status',
            'shop_remarks' => 'Shop Remarks',
            'shop_sort' => 'Shop Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    //用户角色关联
    public function getAdmin(){
        return $this->hasOne(Admin::className(), ['shop_id' => 'shop_id']);
    }
    //门店删除
    public function shopdel($shop_id)
    {
        $connection=Yii::$app->db;
		$re=$connection->createCommand()->delete('zss_shop', "shop_id='$shop_id'")->execute();
        return $re;
    }
    /**
     * 门店修改
     */
     public function shopup($shop_id)
     {
        $shoplist=Shop::find()->where("shop_id='$shop_id'")->one();
        return $shoplist;
     }
     /**
      * 门店修改(2)
      */
      public function shop_update($shop)
      {
        @$shop = $shop['ShopForm'];
     	@$shop_id=$shop['shop_id'];
		@$shop_name=$shop['shop_name'];
		@$shop_phone=$shop['shop_phone'];
		@$shop_logitude=$shop['shop_logitude'];
		@$shop_latitude=$shop['shop_latitude'];
		@$shop_open=strtotime($shop['shop_open']);
		//echo $shop_open;die;
		@$shop_over=strtotime($shop['shop_over']);
		@$shop_opens=strtotime($shop['shop_opens']);
		@$shop_overs=strtotime($shop['shop_overs']);
		$sum = '';
		@$arr=$shop['shop_support'];
		$count = count($arr);
		for($i = 0; $i < $count; $i++){
		$sum .= ','.$arr[$i];
		}
		@$sum = substr($sum,1);
		//echo($sum);die;
		//echo implode($shop['shop_support']);
		@$shop_status=$shop['shop_status'];
		@$shop_remarks=$shop['shop_remarks'];
		@$shop_sort=$shop['shop_sort'];
		@$updated_at=date('Y-m-d H:i:s',time());
		$connection = Yii::$app->db;
		$re=$connection->createCommand()->update('zss_shop', [
		    'shop_name' => "$shop_name",
		    'shop_phone' => "$shop_phone",
		    'shop_logitude' => "$shop_logitude",
		    'shop_latitude' => "$shop_latitude",
		    'shop_open' => "$shop_open",
		    'shop_over' => "$shop_over",
		    'shop_opens' => "$shop_opens",
		    'shop_overs' => "$shop_overs",
		    'shop_support' => "$sum",
		    'shop_status' => "$shop_status",
		    'shop_remarks' => "$shop_remarks",
		    'updated_at' => "$updated_at"],"shop_id='$shop_id'")->execute();
		//print_r($shoplist);die;
		$shoplist=Shop::find()->all();
        return $shoplist;
        
      }

      /**
       * 门店添加
       */
       public function shop_insert($shop)
       {
        @$shop_name=$shop['shop_name'];
		@$shop_phone=$shop['shop_phone'];
        @$shop_addr=$shop['shop_addr'];
		@$shop_logitude=$shop['shop_logitude'];
		@$shop_latitude=$shop['shop_latitude'];
		@$shop_open=strtotime($shop['shop_open']);
		//echo $shop_open;die;
		@$shop_over=strtotime($shop['shop_over']);
		@$shop_opens=strtotime($shop['shop_opens']);
		@$shop_overs=strtotime($shop['shop_overs']);
		$sum = '';
		@$arr=$shop['shop_support'];
		$count = count($arr);
		for($i = 0; $i < $count; $i++){
		$sum .= ','.$arr[$i];
		}
		@$sum = substr($sum,1);
		//echo($sum);die;
		//echo implode($shop['shop_support']);
		@$shop_status=$shop['shop_status'];
		@$shop_remarks=$shop['shop_remarks'];
		@$shop_sort=$shop['shop_sort'];
		@$updated_at=date('Y-m-d H:i:s',time());
		@$created_at=date('Y-m-d H:i:s',time());
		$connection = Yii::$app->db;
		$re=$connection->createCommand()->insert('zss_shop', [
		    'shop_name' => "$shop_name",
		    'shop_phone' => "$shop_phone",
            'shop_addr' => "$shop_addr",
		    'shop_logitude' => "$shop_logitude",
		    'shop_latitude' => "$shop_latitude",
		    'shop_open' => "$shop_open",
		    'shop_over' => "$shop_over",
		    'shop_opens' => "$shop_opens",
		    'shop_overs' => "$shop_overs",
		    'shop_support' => "$sum",
		    'shop_status' => "$shop_status",
		    'shop_remarks' => "$shop_remarks",
            'shop_sort' => "$shop_sort",
		    'created_at' => "$created_at",
		    'updated_at' => "$updated_at"])->execute();
		$shoplist=Shop::find()->all();
        return $shoplist;
       }
       /**
        * 门店唯一性
        */
        public function shopname($shopname)
        {
            $connection = Yii::$app->db;
            $ad = Shop::find()->where("shop_name='$shopname'")->one();
            return $ad;
        }

    /**
     * @CountController
     * 统计管理
     * 
     */
    //查询本店信息
    public function myshoporder($shop_name)
    {
      $order_realamount = Shop::find()
              ->select('zss_shop.shop_id,zss_shop.shop_name,zss_menu.menu_name,zss_order_info.menu_num,zss_order.order_realamount,zss_order.order_paytime')
              ->innerJoin("`zss_menu` on `zss_shop`.`menu_id` = `zss_menu`.`menu_id`")
              ->innerJoin("`zss_order_info` on `zss_menu`.`menu_id` = `zss_order_info`.`menu_id`")
              ->innerJoin("`zss_order` on `zss_order_info`.`order_id` = `zss_order`.`order_id` ")
              ->where("`zss_shop`.`shop_name`='$shop_name'")
              ->asArray()
              ->all();
      return $order_realamount;
      //print_r($order_realamount);die;
    }
    /**
     * 
     * @param type $shop_name@CountController
     * 本店销量统计
     */
    public function myshopsales($shop_name)
        {
            /*
            $arr=$db->createCommand("SELECT SUM(menu_num),SUM(order_realamount),zss_menu.menu_name,zss_order_info.order_id
                from zss_order
                inner join zss_order_info on zss_order.order_id=zss_order_info.order_id 
                inner join zss_menu on zss_order_info.menu_id=zss_menu.menu_id
                where shop_id=$shop_id
                group by zss_order_info.menu_id 
                order by SUM(menu_num) desc
                ")->queryAll();
             */
            $salesinfo = Shop::find()
                    ->select('SUM(menu_num),SUM(order_realamount),`zss_menu`.`menu_name`,`zss_order_info`.`order_id`')
                    ->innerJoin("`zss_menu` on `zss_shop`.`menu_id` = `zss_menu`.`menu_id`")
                    ->innerJoin("`zss_order_info` on `zss_menu`.`menu_id` = `zss_order_info`.`menu_id`")
                    ->innerJoin("`zss_order` on `zss_order_info`.`order_id` = `zss_order`.`order_id` ")
                    ->where("`zss_shop`.`shop_name`='$shop_name'")
                    ->groupBy("`zss_order_info`.`menu_id`")
                    ->orderBy(['SUM(menu_num)'=>SORT_DESC])
                    ->asArray()
                    ->all();
            //print_r($salesinfo);die;
            return $salesinfo;
            //print_r($salesinfo);die;
        }
    //关联订饭表
     public function getOrder()
    {
        // 第一个参数为要关联的子表模型类名，
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasOne(Order::className(), ['shop_id' => 'shop_id']);
    }
	//关联订饭表
    public function getMenu()
    {
        // 第一个参数为要关联的子表模型类名，
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasOne(Menu::className(), ['menu_id' => 'menu_id']);
    }
}
