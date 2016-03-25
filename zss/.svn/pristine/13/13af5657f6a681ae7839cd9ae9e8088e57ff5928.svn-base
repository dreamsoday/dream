<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_auth_role".
 *
 * @property integer $role_id
 * @property string $role_name
 * @property integer $role_status
 * @property string $role_remark
 */

class ZssAuthRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_auth_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_status'], 'integer'],
            [['role_name'], 'string', 'max' => 20],
            [['role_remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'role_name' => 'Role Name',
            'role_status' => 'Role Status',
            'role_remark' => 'Role Remark',
        ];
    }
    //用户角色关联
    public function getZssAuthAdminNode(){
        return $this->hasOne(ZssAuthAdminNode::className(), ['role_id' => 'role_id']);
    }
}
