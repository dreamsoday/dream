<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_auth_admin_node".
 *
 * @property integer $admin_id
 * @property integer $role_id
 */
class ZssAuthAdminNode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_auth_admin_node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'role_id' => 'Role ID',
        ];
    }
    //用户角色关联(1)
    public function getAdmin(){
        return $this->hasOne(Admin::className(), ['admin_id' => 'admin_id']);
    }
    //用户角色关联(2)
    public function getZssAuthRole(){
        return $this->hasOne(ZssAuthRole::className(), ['role_id' => 'role_id']);
    }
}
