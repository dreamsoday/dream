<?php

/**
 * @author 刘国洋
 * @copyright 2016
 */

namespace frontend\models;

//use Yii;
use yii\base\Model;

class AdminForm extends Model{
    public $admin_name;
    public $admin_email;
    public $admin_phone;
    public $admin_password;
    public $admin_status;
    public $role_id;
   
    public function rules()
    {
        return [
            [['admin_status','role_id'],'required','message'=>'请选择'],
            ['admin_name','required','message'=>'用户名不能为空'],
            ['admin_phone','match','pattern' => '/^(13|15|18)[0-9]{9}$/','message'=>'手机号格式不正确'],
            ['admin_email', 'match','pattern' => '/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/','message' => '请输入正确的邮箱.'],
            ['admin_password', 'match','pattern' => '/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/','message' => '密码不得少于6位.'],
        ];
    }
}


?>