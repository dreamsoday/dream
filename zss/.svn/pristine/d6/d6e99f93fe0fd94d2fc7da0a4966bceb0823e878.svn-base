<?php

namespace frontend\models;
use Yii;

/**
 * This is the model class for table "zss_admin".
 *
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $admin_email
 * @property string $admin_phone
 * @property string $admin_password
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $admin_lastlogin
 * @property string $admin_lastip
 * @property integer $admin_status
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [[['created_at', 'updated_at', 'admin_lastlogin', 'admin_status'],
            'integer'], [['admin_name', 'admin_email'], 'string', 'max' => 30], [['admin_phone'],
            'string', 'max' => 11], [['admin_password'], 'string', 'max' => 32], [['admin_lastip'],
            'string', 'max' => 15]];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ['admin_id' => 'Admin ID', 'admin_name' => 'Admin Name', 'admin_email' =>
            'Admin Email', 'admin_phone' => 'Admin Phone', 'admin_password' =>
            'Admin Password', 'created_at' => 'Created At', 'updated_at' => 'Updated At',
            'admin_lastlogin' => 'Admin Lastlogin', 'admin_lastip' => 'Admin Lastip',
            'admin_status' => 'Admin Status', ];
    }
    public function nav()
    {
        $connection = Yii::$app->db;
        return $connection->createCommand("select * from zss_auth_node where node_pid=0")->
            queryAll();
    }
    public function navnext($node_id)
    {
        $connection = Yii::$app->db;
        return $connection->createCommand("select * from zss_auth_node where node_pid=$node_id")->
            queryAll();
    }
    //用户角色(关系表)关联
    public function getZssAuthAdminNode()
    {
        return $this->hasOne(ZssAuthAdminNode::className(), ['admin_id' => 'admin_id']);
    }
    //用户角色关联
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['shop_id' => 'shop_id']);
    }
 /*=========================徐建begin=================================================*/   
    /**
     * @CountController
     * @统计管理
     * @author:徐建
     */
    public function adminuser($user)
    {
        $admin_user_message=Admin::find()
                ->select('*')
                ->innerJoin(" `zss_auth_admin_node` on `zss_admin`.`admin_id` = `zss_auth_admin_node`.`admin_id` ")
                ->innerJoin(" `zss_auth_role` on `zss_auth_admin_node`.`role_id` = `zss_auth_role`.`role_id`")
                ->innerJoin(" `zss_shop` on `zss_admin`.`shop_id` = `zss_admin`.`shop_id` ")
                ->where("`admin_name` = '$user'")
                ->asArray()
                ->all();
       // print_r($admin_user_message);die;
        return $admin_user_message;
    }
 /*=========================徐建end=================================================*/  
/*==============================================刘国洋begin=======================================================*/
    /**
     * 用户列表
     *@author:刘国洋
     */
    public function admin_list($username)
    {
        $admin_id = Admin::find()->select(['admin_id'])->where("admin_name='$username'")->
            one();
        $admin_id = $admin_id['admin_id'];
        $admin_role = ZssAuthAdminNode::find()->where("admin_id='$admin_id'")->one();
        $role_id = $admin_role['role_id'];
        $arr = ZssAuthAdminNode::find()->with('admin')->with('zssAuthRole')->where("role_id>'$role_id'")->
            all();
        return $arr;
    }
    /**
     * 用户删除
     *@author:刘国洋
     */
    public function admin_del($username)
    {
        $admin_id = Admin::find()->select(['admin_id'])->where("admin_name='$username'")->
            one();
        $admin_id = $admin_id['admin_id'];
        $admin_role = ZssAuthAdminNode::find()->where("admin_id='$admin_id'")->one();
        $role_id = $admin_role['role_id'];
        $admin_id = Yii::$app->request->get('admin_id');
        $connection = Yii::$app->db;
        $connection->createCommand()->delete('zss_auth_admin_node', "admin_id='$admin_id'")->
            execute();
        $arr = ZssAuthAdminNode::find()->with('admin') //->with('shop')
            ->with('zssAuthRole')->where("role_id>'$role_id'")->all();
        return $arr;
    }
    
    /**
     * 用户添加(1)
     */
    public function admin_add($username)
    {
        $a_id = Admin::find()->select(['admin_id'])->where("admin_name='$username'")->
            one();
        $a_id = $a_id['admin_id'];
        //$adminuser=Admin::find()->where("$admin_id='$admin_id'")->one();
        $admin_role = ZssAuthAdminNode::find()->where("admin_id='$a_id'")->one();
        $role_id = $admin_role['role_id'];
        $role = ZssAuthRole::find()->where("role_id>'$role_id'")->all();
        return $role;
    }
    /**
     * 用户添加(2)
     */
    public function admin_insert($user,$username)
    {
        $user = $user['AdminForm'];
        //print_r($user);die;
        @$admin_name = $user['admin_name'];
        @$admin_phone = $user['admin_phone'];
        @$admin_email = $user['admin_email'];
        @$admin_status = $user['admin_status'];
        @$role_id = $user['role_id'];
        @$admin_password = md5($user['admin_password']);
        //echo $admin_password;die;
        @$updated_at = time();
        $connection = Yii::$app->db;
        $re = $connection->createCommand()->insert('zss_admin', ['admin_name' => "$admin_name",
            'admin_phone' => "$admin_phone", 'admin_email' => "$admin_email", 'admin_status' =>
            "$admin_status", 'admin_password' => "$admin_password", 'updated_at' => "$updated_at"])->
            execute();
        //print_r($shoplist);die;
        $last_id = $connection->createCommand('SELECT LAST_INSERT_ID()')->queryOne();
        //print_r($last_id['LAST_INSERT_ID()']);die;
        $ad = $last_id['LAST_INSERT_ID()'];
        $re1 = $connection->createCommand()->insert('zss_auth_admin_node', ['admin_id'=>"$ad",'role_id' =>
            "$role_id"])->execute();
        
        $admin_id = Admin::find()->select(['admin_id'])->where("admin_name='$username'")->
            one();
        $admin_id = $admin_id['admin_id'];
        $admin_role = ZssAuthAdminNode::find()->where("admin_id='$admin_id'")->one();
        $role_id = $admin_role['role_id'];
        $arr = ZssAuthAdminNode::find()->with('admin')->with('zssAuthRole')->where("role_id>'$role_id'")->
            all();
        return $arr;
    }
    /**
        * 用户唯一性
        */
        public function adminname($adminname)
        {
            $connection = Yii::$app->db;
            $ad = Admin::find()->where("admin_name='$adminname'")->one();
            return $ad;
        }
    /**
     * 用户修改
     * @author:刘国洋
     */
    public function admin_up($username)
    {
        $a_id = Admin::find()->select(['admin_id'])->where("admin_name='$username'")->
            one();
        $a_id = $a_id['admin_id'];
        //$adminuser=Admin::find()->where("$admin_id='$admin_id'")->one();
        $admin_role = ZssAuthAdminNode::find()->where("admin_id='$a_id'")->one();
        $role_id = $admin_role['role_id'];
        $admin_id = Yii::$app->request->get('admin_id');
        //echo $role_id;die;
        $adminrole = ZssAuthAdminNode::find()->with('admin')->with('zssAuthRole')->
            where("admin_id='$admin_id'")->one();
        $role = ZssAuthRole::find()->where("role_id>'$role_id'")->all();
        return array('adminrole' => $adminrole, 'role' => $role);
    }
    /**
     * 用户修改(2)
     *@author:刘国洋
     */
    public function admin_update($user)
    {
        $user = $user['AdminForm'];
        @$adm_id = $user['admin_id'];
        @$admin_name = $user['admin_name'];
        @$admin_phone = $user['admin_phone'];
        @$admin_email = $user['admin_email'];
        @$admin_status = $user['admin_status'];
        @$role_id = $user['role_id'];
        @$admin_password = md5($user['admin_password']);
        //echo $admin_password;die;
        @$updated_at = date('Y-m-d H:i:s', time());
        $connection = Yii::$app->db;
        $re = $connection->createCommand()->update('zss_admin', ['admin_name' => "$admin_name",
            'admin_phone' => "$admin_phone", 'admin_email' => "$admin_email", 'admin_status' =>
            "$admin_status", 'admin_password' => "$admin_password", 'updated_at' => "$updated_at"],
            "admin_id='$adm_id'")->execute();
        //print_r($shoplist);die;
        $re1 = $connection->createCommand()->update('zss_auth_admin_node', ['role_id' =>
            "$role_id"], "admin_id='$adm_id'")->execute();
        $cookies = Yii::$app->request->cookies;
        $username = $cookies->getValue('username', 'en');
        $admin_id = Admin::find()->select(['admin_id'])->where("admin_name='$username'")->
            one();
        $admin_id = $admin_id['admin_id'];
        $admin_role = ZssAuthAdminNode::find()->where("admin_id='$admin_id'")->one();
        $role_id = $admin_role['role_id'];
        $arr = ZssAuthAdminNode::find()->with('admin')->with('zssAuthRole')->where("role_id>'$role_id'")->
            all();
        return $arr;
    }
    
    
/*=================================刘国洋end========================================================*/



}
