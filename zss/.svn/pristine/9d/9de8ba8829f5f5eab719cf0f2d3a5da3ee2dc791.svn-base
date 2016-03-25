<?php
use yii\helpers\Html;
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
            <li><a href="?r=marketing/discount">折扣管理</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu--><!--leftmenu-->
        
    <div class="centercontent tables">
        <div id="contentwrapper" class="contentwrapper">
          
          <div class="contenttitle2">
                    <font size="25px">折扣信息修改</font>
        </div><!--contentwrapper-->
        <div id="form" style="margin-left:50px; margin-bottom:200px;margin-top:50px;">
            <form id="form1" class="stdform" method="post" action="<?= Yii::$app->urlManager->createUrl(['marketing/discountupdate'])?>">
            <input type="hidden" value="a429b6c0f4468db23a5661d1682db537fe2672c7" name="YII_CSRF_TOKEN" />
                <p>
                    <label>折扣</label>
                    <span class="field"><input type="text" value="<?php echo $discount_list['0']['discount_num']?>" name="discount_num" id="firstname" class="longinput" /></span>
                </p>
                <p>
                    <label>门店</label>
                    <span class="field">
                     <select name="shop_id" id="selection">
                        <?php foreach($shop_list as $k=>$v){?>
                        <option value="<?php echo $v['shop_id']?>"><?php echo $v['shop_name']?></option>
                        <?php } ?>
                    </select>
                    </span>
                </p>
                <input type="hidden" name="discount_id" value="<?php echo $discount_id;?>" />
                <br />
                <p class="stdformbutton">
                    <button class="submit radius2">修改</button>
                </p>
            </form>
        </div>
    </div><!-- centercontent --> 
</div><!--bodywrapper-->
</body>
</html>
<script>
     jQuery(document).ready(function($){
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
    });
</script>