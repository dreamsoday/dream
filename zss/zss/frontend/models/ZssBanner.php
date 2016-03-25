<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_banner".
 *
 * @property integer $banner_id
 * @property string $banner_title
 * @property string $banner_desc
 * @property string $banner_thumb
 * @property string $banner_url
 * @property integer $group_id
 */
class ZssBanner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['banner_title', 'banner_thumb', 'banner_url'], 'string', 'max' => 30],
            [['banner_desc'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'banner_id' => 'Banner ID',
            'banner_title' => 'Banner Title',
            'banner_desc' => 'Banner Desc',
            'banner_thumb' => 'Banner Thumb',
            'banner_url' => 'Banner Url',
            'group_id' => 'Group ID',
        ];
    }
    //展示图片轮播
  public function getZssBannerGroup(){
        return $this->hasOne(ZssBannerGroup::className(), ['group_id' => 'group_id']);
    }
    public function banngroup(){
        return ZssBanner::find()->with('zssBannerGroup')->orderBy("banner_id desc")->all();
    }
    //实现图片的删除
    public function del($banner_id){
     $connection=Yii::$app->db;
     return $connection->createCommand()->delete('zss_banner', "banner_id=$banner_id")->execute();
    }
    //实现修改前的查询
    public function up($banner_id){
     $model=ZssBanner::find();
     return $model->where("banner_id=$banner_id")->one();
    }
     //实现修改
    public function trueup($post){
     $banner_id=$post['banner_id'];
     $connection=Yii::$app->db;
     return $connection->createCommand()->update("zss_banner",["group_id"=>$post['group_id'],"banner_title"=>$post['banner_title'],"banner_desc"=>$post['banner_desc'],"banner_url"=>$post['banner_url'],"banner_thumb"=>$post['banner_thumb']],"banner_id=$banner_id")->execute();  
    }
    //实现添加
    public function add($post){
          $this->banner_title=$post['banner_title'];
          $this->banner_desc=$post['banner_desc'];
          $this->banner_url=$post['banner_url'];
          $this->group_id=$post['group_id'];
          $this->banner_thumb=$post['banner_thumb'];
          return $this->save();
    }
}
