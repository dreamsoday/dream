<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_wallet".
 *
 * @property integer $wallet_id
 * @property string $wallet_name
 * @property integer $wallet_num_price
 * @property string $wallet_price
 * @property string $wallet_share
 * @property string $wallet_sharing
 * @property integer $wallet_show
 * @property string $wallet_template
 * @property integer $created_at
 * @property integer $updated_at
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wallet_num_price', 'wallet_show', 'created_at', 'updated_at'], 'integer'],
            [['wallet_price', 'wallet_share', 'wallet_sharing'], 'number'],
            [['wallet_name'], 'string', 'max' => 50],
            [['wallet_template'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wallet_id' => 'Wallet ID',
            'wallet_name' => 'Wallet Name',
            'wallet_num_price' => 'Wallet Num Price',
            'wallet_price' => 'Wallet Price',
            'wallet_share' => 'Wallet Share',
            'wallet_sharing' => 'Wallet Sharing',
            'wallet_show' => 'Wallet Show',
            'wallet_template' => 'Wallet Template',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     *  红包的查询
     */
    public function selectwallet()
    {
        return [
            Wallet::find()->asArray()->all(),
        ];
    }

    /**
     *  红包的删除
     */
    public function walletdel($wallet_id)
    {
        return [
            Wallet::deleteAll('wallet_id=:wallet_id',array(":wallet_id"=>$wallet_id)),
        ];
    }

    /**
     *  红包的添加
     */
    public function walletadd($data)
    {
       // print_r($data);die;
        $wallet = new Wallet;
        $wallet->wallet_name = $data['wallet_name'];
        $wallet->wallet_num_price = $data['wallet_num_price'];
        $wallet->wallet_price = $data['wallet_price'];
        $wallet->wallet_share = $data['wallet_share'] ;
        $wallet->wallet_sharing = $data['wallet_sharing'] ;
        $wallet->wallet_price = $data['wallet_price'] ;
        $wallet->wallet_share = $data['wallet_share'];
        $wallet->wallet_sharing = $data['wallet_sharing'];
        $wallet->created_at = $data['created_at'];
        $wallet->wallet_show = $data['wallet_show'];
        $wallet->updated_at = $data['updated_at'] ;
        return $wallet->save();
    }

    /**
     *  条件查询
     */
    public function walletsearch($id)
    {
        return [
            Wallet::find()->where(array('wallet_id'=>$id))->asArray()->all(),
        ];
    }
    /**
     *  红包的修改
     */
    public function walletupdate($data)
    {
        $updated_at = time();
        return Wallet::updateAll(array("wallet_name"=>$data['wallet_name'],'wallet_num_price'=>$data['wallet_num_price'],'wallet_price'=>$data['wallet_price'],'wallet_share'=>$data['wallet_share'],'wallet_sharing'=>$data['wallet_sharing'],'updated_at'=>$updated_at),'wallet_id=:wallet_id',array(":wallet_id"=>$data['wallet_id']));
    }
    //判断唯一
    public function walletone($wallet_name)
    {
        return Wallet::find()->where("wallet_name=:wallet_name",array(':wallet_name'=>$wallet_name))->asArray()->all();
    }
}
