<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_banner_group".
 *
 * @property integer $group_id
 * @property integer $group_isshow
 * @property string $group_desc
 * @property integer $group_addtime
 * @property string $group_name
 * @property integer $group_starttime
 * @property integer $group_endtime
 */
class ZssBannerGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_banner_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_isshow', 'group_addtime', 'group_starttime', 'group_endtime'], 'integer'],
            [['group_desc'], 'string', 'max' => 200],
            [['group_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'group_isshow' => 'Group Isshow',
            'group_desc' => 'Group Desc',
            'group_addtime' => 'Group Addtime',
            'group_name' => 'Group Name',
            'group_starttime' => 'Group Starttime',
            'group_endtime' => 'Group Endtime',
        ];
    }
<<<<<<< .mine
||||||| .r244
        public function getZssBanner(){
        return $this->hasOne(ZssBanner::className(), ['group_id' => 'group_id']);
    }
    public function group(){
        $model=ZssBannerGroup::find();
        return $model->all();
    }
       //实现图片的删除
    public function delgroup($group_id){
     $connection=Yii::$app->db;
     return $connection->createCommand()->delete('zss_banner_group', "group_id=$group_id")->execute();
    }
     //实现修改前的查询
    public function upgroup($group_id){
     $model=ZssBannerGroup::find();
     return $model->where("group_id=$group_id")->one();
    }
      //实现修改
    public function trueup($post){
     $group_id=$post['group_id'];
     $starttime=strtotime($post['group_starttime']);
     $endtime=strtotime($post['group_endtime']);
     $connection=Yii::$app->db;
    return $connection->createCommand()->update("zss_banner_group",["group_isshow"=>$post['group_isshow'],"group_desc"=>$post['group_desc'],"group_starttime"=>$starttime,"group_endtime"=>$endtime,"group_name"=>$post['group_name']],"group_id=$group_id")->execute();  
    }
     //实现添加
    public function addgroup($post){
          $app=new ZssBannerGroup();
          $starttime=strtotime($post['group_starttime']);
          $endtime=strtotime($post['group_endtime']);
          $app->group_starttime=$starttime;
          $app->group_desc=$post['group_desc'];
          $app->group_endtime=$endtime;
          $app->group_id=$post['group_id'];
          $app->group_name=$post['group_name'];
          $app->group_isshow=$post['group_isshow'];
          $app->group_addtime=time();
          return $app->save();
    }
=======
        public function getZssBanner(){
        return $this->hasOne(ZssBanner::className(), ['group_id' => 'group_id']);
    }
    public function group(){
        $model=ZssBannerGroup::find();
        return $model->all();
    }
       //实现图片的删除
    public function delgroup($group_id){
     $connection=Yii::$app->db;
     return $connection->createCommand()->delete('zss_banner_group', "group_id=$group_id")->execute();
    }
     //实现修改前的查询
    public function upgroup($group_id){
     $model=ZssBannerGroup::find();
     return $model->where("group_id=$group_id")->one();
    }
      //实现修改
    public function trueup($post){
     $group_id=$post['group_id'];
     $starttime=strtotime($post['group_starttime']);
     $endtime=strtotime($post['group_endtime']);
     $connection=Yii::$app->db;
    return $connection->createCommand()->update("zss_banner_group",["group_isshow"=>$post['group_isshow'],"group_desc"=>$post['group_desc'],"group_starttime"=>$starttime,"group_endtime"=>$endtime,"group_name"=>$post['group_name']],"group_id=$group_id")->execute();  
    }
     //实现添加
    public function addgroup($post){
          $app=new ZssBannerGroup();
          $starttime=strtotime($post['group_starttime']);
          $endtime=strtotime($post['group_endtime']);
          $app->group_starttime=$starttime;
          $app->group_desc=$post['group_desc'];
          $app->group_endtime=$endtime;
          $app->group_name=$post['group_name'];
          $app->group_isshow=$post['group_isshow'];
          $app->group_addtime=time();
          return $app->save();
    }
>>>>>>> .r262
}
