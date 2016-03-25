<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>zss后台统计管理</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<!--===============================引入插件jquery和css====================================================-->
<script src="assets/js/jquery.datetimepicker.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/jquery.datetimepicker.css"/>
<!--===============================引入插件jquery和css====================================================-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie8.css"/>
<![endif]-->dddd
<!--[if lt IE 9]>
    <script src="assets/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
       <ul>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('count/finance')?>">财务统计</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('count/sales')?>">销量统计</a></li>     
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->

    <div class="centercontent tables">
<?php if($role_id=='1') {?>
<div class="pageheader notab">
<h1 class="pagetitle">财务统计</h1><h2 style="float:right; padding-left:30; align:center;">财务总收入：￥<?php echo $amount;?>元</h2>
</div><!--pageheader-->
<div id="contentwrapper" class="contentwrapper">
<div class="contenttitle2">
<!--===============================引入插件日历插件begin====================================================-->
<h3>选择日期</h3>
 <input type="text" value="" id="datetimepicker" class="begin"/>-<input type="text" value="" id="datetimepicker1" class="end"/>
 <input type="button" id="searchdate" value="查询">
<script>
jQuery('#datetimepicker').datetimepicker();
jQuery('#datetimepicker').datetimepicker({value:'',step:10});

jQuery('#datetimepicker1').datetimepicker();
jQuery('#datetimepicker1').datetimepicker({value:'',step:10});
$(document).on('click','#searchdate',function()
{
    var begintime = $('.begin').attr('value')
    var endtime = $('.end').attr('value')
    $.ajax({
       type: "GET",
       url: "<?= Yii::$app->urlManager->createUrl(['count/finance'])?>",
       data: "begintime ="+begintime+"&endtime="+endtime,
       success: function(msg){
         alert(msg);
       }
    });
})
</script>
 <!--===============================引入日历插件end====================================================-->
</div><!--contenttitle-->
<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
    <colgroup>
        <col class="con0" style="width: 4%" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
    </colgroup>
<thead>
<!-- 循环显示财务列表-->
<tr>
  <th class="head0 nosort"><input type="checkbox" /></th>
    <th class="head0">店名</th>
    <th class="head1">菜名</th>
    <th class="head0">份数</th>
    <th class="head1">金额</th>
    <th class="head0">时间</th>
</tr>
</thead>
<!--开始循环-->
<?php foreach($order_realamount as $v) {?>
    <tr class="gradeA">
      <td align="center"><span class="center">
        <input type="checkbox" />
      </span></td>
        <td><?php echo $v['shop_name']?></td>
        <td><?php echo $v['menu_name']?></td>
        <td><?php echo $v['menu_num']?></td>
        <td class="center"><?php echo $v['order_realamount']?></td>
        <td class="center"><?php echo date('Y-m-d H:i:s',$v['order_paytime'])?></td>
    </tr>
<?php } ?>
<!--结束循环-->
</tbody>
</table>
<?php } else{ ?>
<div class="pageheader notab">
<h1 class="pagetitle">本店财务统计</h1><h2 style="float:right; padding-left:30; align:center;">财务总收入：￥<?php echo $amount;?>元</h2>
</div><!--pageheader-->
<div id="contentwrapper" class="contentwrapper">

<div class="contenttitle2">
<h3>财务信息</h3>
</div><!--contenttitle-->
<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
    <colgroup>
        <col class="con0" style="width: 4%" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
    </colgroup>
<thead>
<!-- 循环显示财务列表-->
<tr>
  <th class="head0 nosort"><input type="checkbox" /></th>
    <th class="head0">店名</th>
    <th class="head1">菜名</th>
    <th class="head0">份数</th>
    <th class="head1">金额</th>
    <th class="head0">时间</th>
</tr>
</thead>
<!--开始循环-->
<?php foreach($order_realamount as $vv) {?>
    <tr class="gradeA">
      <td align="center"><span class="center">
        <input type="checkbox" />
      </span></td>
        <td><?php echo $vv['shop_name']?></td>
        <td><?php echo $vv['menu_name']?></td>
        <td><?php echo $vv['menu_num']?></td>
        <td class="center"><?php echo $vv['order_realamount']?></td>
        <td class="center"><?php echo date('Y-d-d H:i:s',$vv['order_paytime'])?></td>
    </tr>
<?php } ?>
<!--结束循环-->
</tbody>
</table>
<?php } ?>
<a href="<?=Yii::$app->urlManager->createUrl(['count/excelout1'])?>&role_id=<?php echo $role_id?>&shop_name=<?php echo $shop_name?>">导出</a>
</div><!--contentwrapper-->
</div><!-- centercontent -->
</div><!--bodywrapper-->
</body>
</html>


