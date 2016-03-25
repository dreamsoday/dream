<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script src='assets/js/jquery.js'></script>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<!-- ---------------------引用日历插件----------------------- -->
<link rel="stylesheet" type="text/css" href="assets/time/jquery.datetimepicker.css"/>

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


<style>
     #nav
    {
       /* background-color:red;*/
        height:70px;
        border-bottom: solid;
        font-size:18px;
    }
    /*文本框的日历插件*/
    .date_css
    {
        /*width:100px;*/
        height:30px;
        border:solid;
        width:110px;
    }
</style>
<body class="withvernav" id='aa'>
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
       <ul>
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('order/index')?>">订单列表</a></li>
                  
        
            
            <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
            
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
        
    <div class="centercontent tables" id='nav'>
    <!--     最上面-->
        <div class="pageheader notab">


    <span style="margin-left:20px">
    支付方式
        <select style='margin-top:20px;margin-right:20px;width:100px;height:22px;' id='payment'>
            <option value="">请选择</option>
            <?php foreach($payment as $k=>$value):?>
                <option value="<?php echo $value['payment_mode']?>" ><?php echo $value['payment_mode']?></option>
            <?php endforeach;?>
        </select>
    </span>

    <span style='margin-right:20px;'>
        订单状态
        <select style='width:100px;height:22px;' id='order_state'>
            <option value="">请选择</option>
            <option value="已支付" value="已支付">已支付</option>
            <option value="未支付"  value="未支付">未支付</option>
            <option value="支付失败"  value="支付失败">支付失败</option>
        </select>
    </span>

    <span style='margin-right:20px;'>
        方式
        <select style='width:100px;height:22px;' id='mode'>
            <option value="">请选择</option>
            <option value="自取" value="自取">自取</option>
            <option value="餐食"  value="餐食">餐食</option>
            <option value="外卖" value="外卖">外卖</option>
        </select>
    </span>
            

            <input type="text" id="datetimepicker" class='one'/>
            <input type="text" id="end" class='two'/>
            <input type="button" value='查询' id='three'/>
        </div><!--pageheader-->
        


        <div id="contentwrapper" class="contentwrapper" id='table1'>
          <div id='bb'>
          <div class="contenttitle2">
                    <h3>订单列表</h3>
                </div><!--contenttitle-->
                <div id="content">
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
                    <colgroup>
                        <col class="con0" style="width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                          
                            <th class="head0">订单号</th>
                            <th class="head0">用户名</th>
                            <th class="head0">菜名</th>
                            <th class="head0">地址</th>
                            <th class="head0">手机号</th>
                            <th class="head0">类型</th>
                            <th class="head0">运费</th>
                            <th class="head0">支付状态</th>
                            <th class="head0">支付方式</th>
                            <th class="head0">总价格</th>
                            <th class="head0">时间</th>
                            <th calss='head0'>操作订单</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <!--             循环订单列表-->
                    <?php foreach($order as $k=>$v):?>
                        <tr class="gradeX">
                          
                            <td><?= Html::encode($v['order_sn']) ?></td>
                            <td><?= Html::encode($v['user_name']) ?></td>
                            <td><?= Html::encode($v['menu_name']) ?></td>
                            <td><?= Html::encode($v['order_address']) ?></td>
                            <td><?= Html::encode($v['user_phone']) ?></td>
                            <td class="center">
                                     <?php if($v['delivery_type']==1)
                                     {
                                        echo "外卖";
                                     }
                                else if($v['delivery_type']==2)
                                    {
                                            echo "自取";
                                    }
                                else if($v['delivery_type']==3)
                                    {
                                        echo "餐食";
                                    }
                            ?>
                            </td>
                            <td class="center"><?= Html::encode($v['order_freight']) ?></td>
                            <td class="center">
                                <?php if($v['order_paystatus']==1)
                                {
                                        echo "未支付";
                                }
                                else if($v['order_paystatus']==2)
                                {
                                        echo "已支付";
                                }
                                else if($v['order_paystatus']==3)
                                {
                                    echo "支付失败";
                                }?>
                            </td>
                            <td class="center"><?= Html::encode($v['payment_mode']) ?></td>
                            <td class="center"><?= Html::encode($v['order_realamount']) ?></td>
                            <td class="center"><?= Html::encode(date("Y-m-d H:i:s",$v['created_att'])) ?></td>
                            <td value="<?php echo $v['order_id']?>"><a href="<?php echo Yii::$app->urlManager->createUrl('order/order_details')?>&order_id=<?php echo $v['order_id']?>"  id='chakan'>查看详情</a></td>                        
                        </tr>
                     <?php endforeach;?>   
                    </tbody>
                </table>
            </div>
        </div><!--contentwrapper-->
        
    </div><!-- centercontent -->
    
    </div>
</div><!--bodywrapper-->

</body>
<script src="assets/time/jquery.datetimepicker.js"></script>
<script>



    $(document).ready(function(){
        //支付方式
        $(document).change("#payment",function(){
            payment=$("#payment").attr('value');
           
        })
        //订单状态
        $(document).change("#order_state",function(){
            order_state=$("#order_state").attr('value');
           
        })
        //吃饭方式
        $(document).change("#mode",function(){
            mode=$("#mode").attr('value');
            $.get("<?php echo Yii::$app->urlManager->createUrl('order/order_search')?>",{payment:payment,order_state:order_state,mode:mode},function(data){
                $("#content").html(data);
              // alert(data)
            })
        })

    })

  
  </script>


  <script>
        jQuery('#datetimepicker').datetimepicker();
        jQuery('#end').datetimepicker();
        jQuery(document).on('click','#three',function(){
            one=$(".one").val();
            two=$(".two").val();
            $.get("<?php echo Yii::$app->urlManager->createUrl('order/rili')?>",{one:one,two:two},function(data){
               $("#bb").html(data);
            })
        })
  </script>
</html>
