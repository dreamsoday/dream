<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_series".
 *
 * @property integer $series_id
 * @property string $series_name
 * @property integer $series_status
 * @property integer $series_sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class Series extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_series';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series_status', 'series_sort', 'created_at', 'updated_at'], 'integer'],
            [['series_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'series_id' => 'Series ID',
            'series_name' => 'Series Name',
            'series_status' => 'Series Status',
            'series_sort' => 'Series Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    //菜品分类列表展示
    public function type(){        
        $model=Series::find();
        return $arr=$model->orderBy("series_sort Desc")->asArray()->all();
    }
    //菜品分类删除
     public function del($series_id){     
        $connection=Yii::$app->db;
        return $connection->createCommand()->delete('zss_series', "series_id in($series_id)")->execute();
    }
    //菜品分类修改前查询
      public function seleone($series_id){     
        $model=Series::find();
        return $arr=$model->where("series_id=$series_id")->asArray()->one();
       
    }
    //菜品分类修改
    public function upone($post){  
         $connection=Yii::$app->db;
         $series_id=$post['series_id'];
        return $connection->createCommand()->update("zss_series",["series_name"=>$post['series_name'],"series_sort"=>$post['series_sort'],"updated_at"=>time()],"series_id=$series_id")->execute();  
    }
    //菜品分类添加
      public function addtype($post){  
         $model=new Series();
         $model->series_name=$post['series_name'];
         $model->series_sort=$post['series_sort'];
         $model->series_status=1;
         $model->created_at=time();
         $model->updated_at=time();
         return $model->save();
    }
    //菜品的显示
    public function seriesshow()
    {
        return Series::find()->asArray()->all();
    }
    public function seriesmenu($series_id)
    {
        return Series::find()
               ->select('*')
               ->innerJoin("`zss_menu` on `zss_series`.`series_id` = `zss_menu`.`series_id`")
               ->where("`zss_series`.`series_id` = $series_id")
               ->asArray()
               ->all();
    }
}
