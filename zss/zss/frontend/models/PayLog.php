<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_pay_log".
 *
 * @property integer $log_id
 * @property integer $user_id
 * @property string $log_type
 * @property string $log_price
 * @property string $log_give_price
 * @property string $created_at
 */
class Paylog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_pay_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['log_type', 'log_price', 'log_give_price'], 'number'],
            [['created_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'user_id' => 'User ID',
            'log_type' => 'Log Type',
            'log_price' => 'Log Price',
            'log_give_price' => 'Log Give Price',
            'created_at' => 'Created At',
        ];
    }

    public function selpay($user_id)
    {
        return [
            Paylog::find()
            ->select('*')
            ->innerJoin('`zss_user` on `zss_user`.`user_id` =`zss_pay_log`.`user_id`')
            ->where("zss_user.user_id='$user_id'")
            ->asArray()
            ->all(),
        ];
    }
}
