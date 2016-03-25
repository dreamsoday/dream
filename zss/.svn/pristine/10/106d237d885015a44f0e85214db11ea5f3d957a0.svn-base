<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_user".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_phone
 * @property string $user_password
 * @property string $user_price
 * @property integer $user_integral
 * @property string $user_sex
 * @property integer $user_lastlogin
 * @property integer $user_status
 * @property integer $vip_id
 * @property integer $company_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class ZssUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_price'], 'number'],
            [['user_integral', 'user_lastlogin', 'user_status', 'vip_id', 'company_id', 'created_at', 'updated_at'], 'integer'],
            [['user_name'], 'string', 'max' => 30],
            [['user_phone'], 'string', 'max' => 11],
            [['user_password'], 'string', 'max' => 32],
            [['user_sex'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_phone' => 'User Phone',
            'user_password' => 'User Password',
            'user_price' => 'User Price',
            'user_integral' => 'User Integral',
            'user_sex' => 'User Sex',
            'user_lastlogin' => 'User Lastlogin',
            'user_status' => 'User Status',
            'vip_id' => 'Vip ID',
            'company_id' => 'Company ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getZssOrder()
    {
        // 第一个参数为要关联的子表模型类名，
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasOne(ZssOrder::className(), ['user_id' => 'user_id']);
    }
}
