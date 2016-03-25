<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>控制台页面_AmaAdmin后台管理系统模板 - 源码之家</title>

<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.slimscroll.js"></script>
<!--<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/dashboard.js"></script>-->
<!-- ---------------------引用日历插件----------------------- -->
  <link rel="stylesheet" href="assets/order/time/jquery.datetimepicker.css">
  <script src="assets/order/time/jquery.js"></script>
  <script src="assets/order/time/jquery.datetimepicker.js"></script>

<style>
    /*导航的div体积*/
    #nav
    {
       /* background-color:red;*/
        height:70px;
        width:1130px;
        border-bottom: solid;
        font-size:18px;
        font-family: 华文行楷,宋体;
    }
    /*文本框的日历插件*/
    .date_css
    {
        /*width:100px;*/
        height:30px;
        border:solid;
        width:110px;
    }

    #table_td
    {
        border:solid;
        color:#f0f;
        text-align:center;
    }
    #table_th
    {
        border:solid;
        text-align:center;
    }
</style>

</head>

<body class="withvernav">
<div class="bodywrapper">

    
    <div class="vernav2 iconmenu">
             <ul>
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('order/index')?>">订单列表</a></li>
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('order/order_details')?>">订单详情</a></li>
            </li>
            
            <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
            
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->


<!-------------------------------------------------------------main    start-->    
<div class="centercontent">

<div id='nav'> 
    <span><span>时间范围:</span><input type="text" id="datetimepicker" class='date_css' style='margin-right:20px;margin-left:10px;'><input type="text" id="end" class='date_css'></span>

    <span style="margin-left:20px">
    支付方式
        <select style='margin-top:20px;margin-right:20px;width:100px;height:22px;'>
            <option value="">请选择</option>
            <?php foreach($payment as $k=>$value):?>
                <option value="<?php echo $value['payment_mode']?>"><?php echo $value['payment_mode']?></option>
            <?php endforeach;?>
        </select>
    </span>

    <span style='margin-right:20px;'>
        订单状态
        <select style='width:100px;height:22px;'>
            <option value="">请选择</option>
            <option value="已支付">已支付</option>
            <option value="未支付">未支付</option>
        </select>
    </span>

    <span style='margin-right:20px;'>
        方式
        <select style='width:100px;height:22px;'>
            <option value="">请选择</option>
            <option value="自取">自取</option>
            <option value="餐食">餐食</option>
            <option value="外卖">外卖</option>
        </select>
    </span>

    <span>
        <span>
        <input type="text"   placeholder='订单号/取餐号/收货人姓名' style='height:32px;border:solid;'/></span>
        <a href=""><img src="assets/images/sousuo.gif" alt="" width=32px;height=20px; style=''/></a>
    </span>

</div>
        <table border='1'>
            <th id='table_th'>订单号</th>
            <th id='table_th'>用户名</th>
            <th id='table_th'>菜&nbsp;名</th>
            <th id='table_th'>地&nbsp;址</th>
            <th id='table_th'>类&nbsp;型</th>
            <th id='table_th'>运&nbsp;费</th>
            <th id='table_th'>支付状态</th>
            <th id='table_th'>支付方式</th>
            <th id='table_th'>总价格</th>
            <th id='table_th'>实付款</th>
            <th id='table_th'>座位号</th>
            <th id='table_th'>取餐号</th>
            <th id='table_th'>时&nbsp;间</th>
            <th id='table_th'>操&nbsp;作</th>
            <?php foreach($order as $k=>$v):?>
                <tr>
                    <td id='table_td'><?php echo $v['order_sn']?></td>
                    <td id='table_td'><?php echo $v['user_name']?></td>
                    <td id='table_td'><?php echo $v['shop_name']?></td>
                    <td id='table_td'><?php echo $v['order_address']?></td>
                    <td id='table_td'>
                    
                    <?php if($v['delivery_type']==1){
                        echo "送货";
                        }else if($v['delivery_type']==2){
                            echo "自取";
                            }
                            else{
                                echo "堂食";
                                }?>
                    </td>
                    <td id='table_td'><?php echo $v['order_freight']?></td>
                    <td id='table_td'><?php if($v['delivery_type']==1){
                        echo "未支付";
                        }else if($v['delivery_type']==2){
                            echo "已支付";
                            }
                            else{
                                echo "支付失败";
                                }?></td>
                    <td id='table_td'><?php echo $v['payment_mode']?></td>
                    <td id='table_td'><?php echo $v['order_realamount']?></td>
                    <td id='table_td'><?php echo $v['order_amount']?></td>
                    <td id='table_td'><?php echo $v['order_seatnumber']?></td>
                    <td id='table_td'><?php echo $v['order_id']?></td>
                    <td id='table_td'>
                    <?php  echo date('Y-m-d H:i:s',$v['created_at']);
                    ?></td>
                    <td id="table_td"><a href="">删除</a></td>
                </tr>
            <?php endforeach;?>
        </table>
</div>
<!---------------------------------------------------------------main    End-->


</div><!--bodywrapper-->

</body>
  <script>
  //***************************日历插件的引用
  $(function() {
    $('#datetimepicker').datetimepicker();
    $('#end').datetimepicker();
  });
  </script>
</html>













<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
        width:1130px;
        border-bottom: solid;
        font-size:18px;
        font-family: 华文行楷,宋体;
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
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl('order/order_details')?>">订单详情</a></li>
            </li>
            
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
            
        </div><!--pageheader-->
        


        <div id="contentwrapper" class="contentwrapper" id='table1'>
          <div id='bb'>
          <div class="contenttitle2">
                    <h3>订单列表</h3>
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
                                <th class="head0">实付款</th>
                                 <th class="head0">座位号</th>
                                  <th class="head0">取餐号</th>
                                   <th class="head0">时间</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <!--             循环订单列表-->
                    <?php foreach($order as $k=>$v):?>
                        <tr class="gradeX">
                          
                            <td><?php echo $v['order_sn']?></td>
                            <td><?php echo $v['user_name']?></td>
                            <td><?php echo $v['menu_name']?></td>
                            <td><?php echo $v['order_address']?></td>
                             <td><?php echo $v['user_phone']?></td>
                            <td class="center">
                                 <?php if($v['delivery_type']==1){
                        echo "送货";
                        }else if($v['delivery_type']==2){
                            echo "自取";
                            }
                            else{
                                echo "堂食";
                                }?>
                            </td>
                            <td class="center"><?php echo $v['order_freight']?></td>
                            <td class="center">
                                <?php if($v['delivery_type']==1){
                        echo "未支付";
                        }else if($v['delivery_type']==2){
                            echo "已支付";
                            }
                            else{
                                echo "支付失败";
                                }?>
                            </td>
                            <td class="center"><?php echo $v['payment_mode']?></td>
                            <td class="center"><?php echo $v['order_realamount']?></td>
                            <td class="center"><?php echo $v['order_amount']?></td>
                            <td class="center"><?php echo $v['order_seatnumber']?></td>
                            <td class="center"><?php echo $v['order_id']?></td>
                            <td><?php  echo date('Y-m-d H:i:s',$v['created_at']);
                            ?></td>
                        </tr>
                     <?php endforeach;?>   
                    </tbody>
                </table>
        
        </div><!--contentwrapper-->
        
    </div><!-- centercontent -->
    
    </div>
</div><!--bodywrapper-->

</body>

<script>

  //***************************日历插件的引用

    //日历插件的引用
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
                $("#bb").html(data)
            })
        })
    })

  
  </script>
</html>
