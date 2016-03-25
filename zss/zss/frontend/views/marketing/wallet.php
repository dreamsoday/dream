<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>后台管理系统</title>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<script type="text/javascript" src="assets/js/custom/from.js"></script>
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
            <li><a href="?r=marketing/index">红包管理</a></li>
            <li><a href="?r=marketing/discount">折扣管理</a></li>
            <li><a href="?r=marketing/subtract">满减管理</a></li>
            <li><a href="?r=marketing/add">满赠管理</a></li>
            <li><a href="?r=marketing/coupon">优惠券管理</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu--><!--leftmenu-->
        
    <div class="centercontent tables">
        <div id="contentwrapper" class="contentwrapper">
          
          <div class="contenttitle2">
                    <font size="25px">红包信息</font><button id="click" style="height:30px;width:80px">添加</button>
                    <!-- <button id="w_del" style="height:30px;width:80px">删除</button> -->
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
                          <th class="head0 nosort"><span class="center">
                           <!--  <input type="checkbox" /> -->
                          </span></th>
                            <th class="head1">ID</th>
                            <th class="head0">名称</th>
                            <th class="head1">是否限定金额</th>
                            <th class="head0">限定金额</th>
                            <th class="head1">分享者得到</th>
                            <th class="head0">被分享者得到</th>
                            <th class="head1">创建时间</th>
                            <th class="head0">修改时间</th>
                            <th class="head1">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- 红包循环 -->
                    <?php foreach($wallet_list as $v){?>
                        <tr class="gradeX">
                          <td align="center"><span class="center">
                            <!-- <input type="checkbox" /> -->
                          </span></td>
                          <td class="center"><?php echo $v["wallet_id"]?></td>
                                <td class="center"><?php echo $v["wallet_name"]?></td>
                                <td class="center">
                                    <?php 
                                        if($v['wallet_num_price']==1){
                                            echo "是";
                                        }else{
                                            echo "否";
                                        }
                                    ?>
                                </td>
                                <td class="center"><?php echo $v["wallet_price"]?></td>
                                <td class="center"><?php echo $v["wallet_share"]?></td>
                                <td class="center"><?php echo $v["wallet_sharing"]?></td>
                                <td class="center">
                                    <?php
                                        echo date('Y-m-d H:i:s',$v['created_at']);
                                    ?>
                                </td>
                                <td class="center">
                                    <?php
                                        echo date('Y-m-d H:i:s',$v['updated_at']);
                                    ?>
                                </td>
                                <td class="center" value='<?php echo $v['wallet_id']?>'><a href="?r=marketing/walletupd&&wallet_id=<?php echo $v["wallet_id"]?>">修改</a> | <a href="?r=marketing/walletdel&&wallet_id=<?php echo $v["wallet_id"]?>">删除</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        </div><!--contentwrapper-->
        <div id="form" style="margin-left:1px; margin-bottom:200px;margin-top:50px;">
            <form id="form1" class="stdform" method="post" action="<?= Yii::$app->urlManager->createUrl(['marketing/walletadd'])?>">
            <input type="hidden" value="a429b6c0f4468db23a5661d1682db537fe2672c7" name="YII_CSRF_TOKEN" />
                <p>
                    <label>红包名称</label>
                    <span class="field"><input type="text" name="wallet_name" id="firstname" class="longinput" /><span id='wallet_name'></span></span>
                </p>
                <p>
                    <label>是否限定金额</label>
                    <span class="field">
                    <select name="wallet_num_price" id="selection">
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                    </span>
                </p>
                <p id="wallet_price">
                    <label>限定金额</label>
                    <span class="field"><input type="text" name="wallet_price" id="zong" class="longinput" /></span>
                </p>
                
                <p id="wallet_share">
                    <label>分享者得到</label>
                    <span class="field"><input type="text" name="wallet_share" id="fen" class="longinput" /><span id='fenxiang'></span></span>
                </p>
                <p id="wallet_sharing">
                    <label>被分享者得到</label>
                    <span class="field"><input type="text" name="wallet_sharing" id="shareing" class="longinput" /></span>
                </p>
                <p>
                    <label>红包模板</label>
                    <span class="field"><textarea cols="80" id="editor" rows="5" name="wallet_template" class="mediuminput"></textarea></span> 
                </p>
                <br />
                <p class="stdformbutton">
                    <button class="submit radius2">Submit Button</button>
                </p>
            </form>
        </div>
    </div><!-- centercontent --> 
</div><!--bodywrapper-->
</body>
</html>
<script>
    
    jQuery(document).ready(function($){
    
        $('#form').hide();
        $(document).on('click','#click',function(){
            $('#form').show(); 
        });

        //判断是否限定金额
        // @  is 为是否限定金额
        $('#selection').change(function(){
            var is = $('#selection').val()
            if(is==0)
            {
                $('#wallet_price').hide();
                $('#wallet_share').hide();
                $('#wallet_sharing').hide();
            }
             if(is==1)
            {
                $('#wallet_price').show();
                $('#wallet_share').show();
                $('#wallet_sharing').show();
            }
        });
        // 判断红包的唯一性
        $('#firstname').on('blur',function (){
            var wallet_name = $('#firstname').val();
            $.get('index.php?r=marketing/walletone',{wallet_name:wallet_name},function (txt){
                $('#wallet_name').html(txt)
            });
        });

        //限定总额
        $('#zong').on('blur',function (){
            var wallet_price = $('#zong').val();
            $('#fen').on('blur',function (){
                var share = $('#fen').val();
                   $('#shareing').val(wallet_price-share) ;
            }); 
        });
    });
</script>
