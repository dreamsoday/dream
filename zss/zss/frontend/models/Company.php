<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_company".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property integer $company_discount
 * @property string $company_price
 * @property string $company_subtract
 * @property integer $user_status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $giveaway_id
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_discount', 'user_status', 'created_at', 'updated_at', 'giveaway_id'], 'integer'],
            [['company_price', 'company_subtract'], 'number'],
            [['company_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_discount' => 'Company Discount',
            'company_price' => 'Company Price',
            'company_subtract' => 'Company Subtract',
            'user_status' => 'User Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'giveaway_id' => 'Giveaway ID',
        ];
    }

  /*  public function getUser()
    {
        return $this->hasOne(User::className(),['company_id'=>'company_id']);
    }*/

    /**
     * @公司查询
     */
    public function selcompany()
    {
        return [
            Company::find()->asarray()->all(),
        ];
    }

    /**
     * @公司删除
     */
    public function companydel($company_id)
    {
        return $this->findOne($company_id)->delete();
    }

    /**
     * @公司添加
     */
    public function companyadd($data)
    {
        $company = new Company;
        $company->company_name = $data["Companyform"]["company_name"];
        $company->company_discount = $data["Companyform"]["company_discount"];
        $company->company_price = $data["Companyform"]["company_price"];
        $company->company_subtract = $data["Companyform"]["company_subtract"];
        $company->created_at = time();
        $company->updated_at = time();
        $company->giveaway_id = $data["giveaway_id"];
        return $company->save();
    }

    /**
     * @公司修改查询
     */
    public function companysel($company_id)
    {
        return [
            Company::find()->where("company_id = '$company_id'")->asarray()->all(),
        ];
    }

    /**
     * @公司修改
     */
    public function companyup($data)
    {
        $re = new Company;
        $company = $re->find()->where("company_id = ".$data["company_id"])->one();
        $company->company_name = $data["company_name"];
        $company->company_discount = $data["company_discount"];
        $company->company_price = $data["company_price"];
        $company->company_subtract = $data["company_subtract"];
        $company->updated_at = time();
        $company->giveaway_id = $data["giveaway_id"];
        return $company->save();
    }
}
