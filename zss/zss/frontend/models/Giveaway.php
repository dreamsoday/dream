<?php

namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "zss_giveaway".
 *
 * @property integer $giveaway_id
 * @property string $giveaway_name
 * @property integer $giveaway_num
 * @property integer $giveaway_time
 * @property integer $giveaway_show
 * @property string $giveaway_expenditure
 */
class Giveaway extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_giveaway';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['giveaway_num', 'giveaway_time', 'giveaway_show'], 'integer'],
            [['giveaway_expenditure'], 'number'],
            [['giveaway_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'giveaway_id' => 'Giveaway ID',
            'giveaway_name' => 'Giveaway Name',
            'giveaway_num' => 'Giveaway Num',
            'giveaway_time' => 'Giveaway Time',
            'giveaway_show' => 'Giveaway Show',
            'giveaway_expenditure' => 'Giveaway Expenditure',
        ];
    }

    /**
     * 赠品的显示
     */
    public function giveawayshow()
    {
        return [
            Giveaway::find()->asArray()->all(),
        ];
    }
    public function selgiveaway()
    {
        return 
            Giveaway::find()->asArray()->all();
        
    }
}
