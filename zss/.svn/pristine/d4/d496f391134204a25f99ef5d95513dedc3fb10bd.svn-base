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
                            <th class="head1">ID</th>
                            <th class="head0">名称</th>
                            <th class="head1">性别</th>
                            <th class="head1">余额</th>
                            <th class="head0">积分</th>
                            <th class="head0">创建时间</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- 会员信息循环 -->
                  
                    
                        <tr class="gradeX">
                          <td class="center"><?php echo $details["user_id"]?></td>
                                <td class="center">
                                <a href="index.php?r=member/vipdetails&user_id=<?php echo $details['user_id']?>">
                                <?php echo $details["user_name"]?>
                                </a>
                                </td>
                                <td class="center">
                                    <?php 
                                        if ($details["user_sex"]==0) {
                                            echo "男";
                                        } elseif ($details["user_sex"]==1) {
                                            echo "女";
                                        } else {
                                            echo "保密";
                                        }
                                    ?>
                                </td>
                                <td class="center" value="<?php echo $details["user_id"]?>"><span class="up_price"><?php echo $details["user_price"]?></span></td>
                                <td class="center" value="<?php echo $details["user_id"]?>"><span class="up_interal"><?php echo $details["user_integral"]?></span></td>
                                <td class="center">
                                    <?php echo date('Y-m-d H:i:s',$details["created_at"])?>
                                </td>
                        </tr>
                   
                    </tbody>
                </table>


<br />
消费记录
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
                            <th class="head1" width="15%" >订单号</th>
                            <th class="head0">消费门店</th>
                            <th class="head1">取餐号</th>
                            <th class="head1">余额</th>
                            <th class="head0">积分</th>
                            <th class="head0">日期</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- 会员信息循环 -->
                    <?php foreach($order as $v):?>
                        <?php foreach($v as $vv):?>
                        <tr class="gradeX">
                          <td class="center"><?php echo $vv["order_sn"]?></td>
                                <td class="center"><?php echo $vv["shop_name"]?></td>
                                <td class="center"><?php echo $vv["order_seatnumber"]?></td>
                                <td class="center"><?php echo $vv["order_realamount"]?></td>
                                <td class="center"><?php echo $vv["order_integral"]?></td>
                                <td class="center">
                                    <?php echo date('Y-m-d H:i:s',$vv["created_at"])?>
                                </td>
                        </tr>
                    <?php endforeach;?>
                <?php endforeach;?>
                    </tbody>
                </table>
<br />

充值记录
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
                            <th class="head1" style="width: 1000px">支付类型</th>
                            <th class="head0">充值金额</th>
                            <th class="head1">赠送金额</th>
                            <th class="head0">日期</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- 会员信息循环 -->
                    <?php foreach($paylog as $v):?>
                        <?php foreach($v as $vv):?>
                        <tr class="gradeX">
                            <td class="center" width="18%">
                                <?php 
                                        if ($vv["log_type"]==1) {
                                            echo "微信支付";
                                        } elseif ($vv["log_type"]==2) {
                                            echo "支付宝支付";
                                        } elseif ($vv["log_type"]==3) {
                                            echo "银联支付";
                                        } 
                                    ?>
                            </td>
                            <td class="center"  width="20%"><?php echo $vv["log_price"]?></td>
                            <td class="center"  width="20%"><?php echo $vv["log_give_price"]?></td>
                            <td class="center">
                                <?php echo date('Y-m-d H:i:s',$vv["created_at"])?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endforeach;?>
                    </tbody>
                </table>


        </div><!--contentwrapper-->
        
    </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
<script>
    jQuery(document).ready(function($){
        $(document).on("click",".up_price",function(){
          name=$(this).html();
          $(this).parent().html("<input type='text' value='"+name+"' class='upinput'/>")
        })
        $(document).on("blur",".upinput",function(){
          var aa=$(this).val()
            a_id=$(this).parent().attr("value")
            $(this).parent().html("<span class='up_price'>"+aa+"</span>")
          $.get("<?php echo Yii::$app->urlManager->createUrl('member/update')?>",{a_id:a_id,aa:aa},function(data){
             if(data==1){
              alert("修改成功");
            }else{
              alert("修改失败");
            }

          })
        })
    })
</script>

