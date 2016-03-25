<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_menu".
 *
 * @property integer $menu_id
 * @property string $menu_name
 * @property integer $series_id
 * @property string $menu_price
 * @property string $menu_introduce
 * @property string $menu_desc
 * @property integer $menu_status
 * @property integer $shop_show
 * @property integer $menu_sort
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $shop_id
 * @property string $image_url
 * @property string $image_wx
 * @property string $image_pc
 * @property integer $menu_num
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series_id', 'menu_status', 'shop_show', 'menu_sort', 'created_at', 'updated_at'], 'integer'],
            [['menu_price'], 'number'],
            [['menu_name'], 'string', 'max' => 30],
            [['menu_introduce'], 'string', 'max' => 200],
            [['menu_desc'], 'string', 'max' => 50],
            [['image_url', 'image_wx', 'image_pc'], 'string', 'max' => 100],
            [['image_url'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'menu_name' => 'Menu Name',
            'series_id' => 'Series ID',
            'menu_price' => 'Menu Price',
            'menu_introduce' => 'Menu Introduce',
            'menu_desc' => 'Menu Desc',
            'menu_status' => 'Menu Status',
            'shop_show' => 'Shop Show',
            'menu_sort' => 'Menu Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            //'shop_id' => 'Shop ID',
            'image_url' => 'Image Url',
            'image_wx' => 'Image Wx',
            'image_pc' => 'Image Pc',
            //'menu_num' => 'Menu Num',
        ];
    }
    //菜品列表
    public function getSeries(){
        return $this->hasOne(Series::className(), ['series_id' => 'series_id']);
    }
    public function delmenu($menu_id){
        $model=Yii::$app->db;
        return $model->createCommand()->delete("zss_menu","menu_id in($menu_id)")->execute();
    }
       public function editormenu($menu_id){
        $app=Menu::find();
        return $app->where("menu_id=$menu_id")->asArray()->One();
    }
    public function getShop(){
        return $this->hasOne(Shop::className(), ['menu_id' => 'menu_id']);
    }
       public function addmenu($post){
            $post['created_at']=time();
            $post['updated_at']=time();
            $post['menu_status']=1;
            $post['shop_show']=1;
            $app=new Menu();
          foreach ($post as $key => $value) {
                $app->$key=$value;
            }
           return $app->save();
    }
       public function editor($post){
            $menu_id=$post['menu_id'];
             $connection=Yii::$app->db;
            return $connection->createCommand()->update("zss_menu",["series_id"=>$post['series_id'],"menu_name"=>$post['menu_name'],"menu_price"=>$post['menu_price'],"image_url"=>$post['image_url'],"menu_desc"=>$post['menu_desc'],"updated_at"=>time(),"image_wx"=>$post['image_wc'],"image_pc"=>$post['image_wc']],"menu_id=$menu_id")->execute();  
          
    }
    //门店  菜品
    function menu_list($shop_id){
        return Shop::find()->with('menu')->where(['shop_id'=>$shop_id])->asArray()->one();
    }
}
