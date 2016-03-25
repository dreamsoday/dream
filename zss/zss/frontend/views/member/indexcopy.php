<?php
use yii\helpers\Html;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="assets/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
       <ul>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/index')?>">会员信息</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/grade')?>">会员等级管理</a></li> 
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/partner')?>">合作伙伴管理</a></li>     
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
        
    <div class="centercontent tables">
        <div id="contentwrapper" class="contentwrapper">
          
          <div class="contenttitle2">
                    <h3>会员信息</h3>
                </div><!--contenttitle-->
                <button class="vip_add">添加</button>
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2" style="text-align: center;">
                    <colgroup>
                        <col class="con0" style="width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                          <th class="head0 nosort"><input type="checkbox" /></th>
                            <th class="head1">ID</th>
                            <th class="head0">名称</th>
                            <th class="head1">性别</th>
                            <th class="head0">手机号</th>
                            <th class="head1">余额</th>
                            <th class="head0">积分</th>
                            <th class="head1">公司</th>
                            <th class="head0">创建时间</th>
                            <th class="head1">修改时间</th>
                            <th class="head0">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- 会员信息循环 -->
                    <?php foreach($arr as $v):?>
                        <tr class="gradeX">
                          <td align="center"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                          <td class="center"><?php echo $v["user_id"]?></td>
                                <td class="center">
                                <a href="index.php?r=member/vipdetails&user_id=<?php echo $v['user_id']?>">
                                <?php echo $v["user_name"]?>
                                </a>
                                </td>
                                <td class="center">
                                    <?php 
                                        if ($v["user_sex"]==0) {
                                            echo "男";
                                        } elseif ($v["user_sex"]==1) {
                                            echo "女";
                                        } else {
                                            echo "保密";
                                        }
                                    ?>
                                </td>
                                <td class="center"><?php echo $v["user_phone"]?></td>
                                <td class="center"><?php echo $v["user_price"]?></td>
                                <td class="center"><?php echo $v["user_integral"]?></td>
                                <td class="center"><?php echo $v["company_name"]?></td>
                                <td class="center">
                                    <?php echo date('Y-m-d H:i:s',$v["created_at"])?>
                                </td>
                                <td class="center">
                                    <?php echo date('Y-m-d H:i:s',$v["updated_at"])?>
                                </td>
                                <td value='<?php echo $v["user_id"]?>'><a href="index.php?r=member/vipdel&user_id=<?php echo $v["user_id"]?>" class="vip_del">删除</a></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

        </div><!--contentwrapper-->
        
        <div class="add" align="center" style="display: none;">
            <form action="<?php echo Yii::$app->urlManager->createUrl('member/useradd')?>" method="post">
                <table align="center">
                    <tr>
                        <h3>添加用户</h3>
                    </tr>
                    <tr>
                        <td>用户名称：</td>
                        <td><input type="text" name="user_name" placeholder="请输入用户名"/></td>
                    </tr>
                    <tr>
                        <td>用户电话：</td>
                        <td><input type="text" name="user_phone" placeholder="电话为11位"/></td>
                    </tr>
                    <tr>
                        <td>用户密码：</td>
                        <td><input type="password" name="user_password" placeholder="请输入密码"/></td>
                    </tr>
                    <tr>
                        <td>用户余额：</td>
                        <td><input type="text" name="user_price" placeholder="余额不能大于4位"/></td>
                    </tr>
                    <tr>
                        <td>用户积分：</td>
                        <td><input type="text" name="user_integral" placeholder="积分不能大于4位"/></td>
                    </tr>
                    <tr>
                        <td>合作公司：</td>
                        <td>
                            <select name="company_id" id="">
                                <?php foreach ($company as $k => $v) {?>
                                
                                <option value="<?php echo $v['company_id']?>"><?php echo $v['company_name']?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="添加" /></td>
                        <td><input type="reset" value="重置" /></td>
                    </tr>
                </table>
            </form>

    

        </div>

    </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
<script>
    jQuery(document).ready(function($){
        //隐藏添加
        $(".add").hide();
        $(document).on("click",".vip_add",function(){
            $(".add").show();
        })
    });

</script>