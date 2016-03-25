<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_payment".
 *
 * @property integer $payment_id
 * @property string $payment_mode
 */
class ZssPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_mode'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'payment_mode' => 'Payment Mode',
        ];
    }
}
