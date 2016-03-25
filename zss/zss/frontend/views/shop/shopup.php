<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forms | Amanda Admin Template</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/time/jquery.datetimepicker.css"/>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/charCount.js"></script>
<script type="text/javascript" src="assets/js/plugins/ui.spinner.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/forms.js"></script>
<script type="text/javascript" src="assets/time/jquery.datetimepicker.js"></script>

<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">
    
    <div class="vernav2 iconmenu">
    	<ul>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('shop/index')?>">门店列表</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('shop/shopadd')?>">门店添加</a></li>     
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        
        <div id="contentwrapper" class="contentwrapper">
        	
        	<div id="basicform" class="subcontent">
                                
                    <div class="contenttitle2">
                        <h3>宅食送门店修改</h3>
                    </div><!--contenttitle-->

                    <form class="stdform" method="post">
                    	<input type="hidden" name="ShopForm[shop_id]" value="<?php echo $shoplist['shop_id']?>" />
                        <p>
                        	<label>门店名称</label>
                            <span class="field"><input type="text" id='shopname' name="ShopForm[shop_name]" class="smallinput" value="<?php echo $shoplist['shop_name']?>" />
                            <font color='red'><?=Html::error($store,"shop_name")?></font>
                            
                            </span>
                            <script>
        jQuery(document).ready(function($){
        $(document).on('blur','#shopname',function(){
            var shopname=$('#shopname').val();
            //alert(shopname);
            $.ajax({
               type: "POST",
               url: "<?php echo Yii::$app->urlManager->createUrl('shop/shopname')?>",
               data: {"shopname":shopname},
               success: function(msg){
                if(msg==1)
                {
                    alert('店名已存在');
                    document.getElementById('bu').disabled=true;
                }
                else
                {
                    document.getElementById('bu').disabled=false;
                }
               }
           })
        })
       })
    </script>
                        </p>
                        
                        <p>
                        	<label>门店手机</label>
                            <span class="field"><input style="width:150px" type="text" name="ShopForm[shop_phone]" class="mediuminput" value="<?php echo $shoplist['shop_phone']?>"/>
                            <font color='red'><?=Html::error($store,"shop_phone")?></font>
                            </span>
                        </p>
                        
                        <p>
                        	<label>门店地址</label>
                            <span class="field"><textarea cols="80" rows="5" name="ShopForm[shop_addr]" value="<?php echo $shoplist['shop_addr']?>"></textarea>
                            <font color='red'><?=Html::error($store,"shop_addr")?></font>
                            </span> 
                        </p>
                        
                         <p>
                            <label>经度</label>
                            <span class="field"><input style="width:100px" type="text" name="ShopForm[shop_logitude]" class="mediuminput" value="<?php echo $shoplist['shop_logitude']?>"/>
                            <font color='red'><?=Html::error($store,"shop_logitude")?></font>
                            </span>
                        </p>

                         <p>
                            <label>纬度</label>
                            <span class="field"><input style="width:100px" type="text" name="ShopForm[shop_latitude]" class="shop_latitude" value="<?php echo $shoplist['shop_latitude']?>"/>
                            <font color='red'><?=Html::error($store,"shop_latitude")?></font>
                            </span>
                        </p>
                        
                        <p>
                            <label>外卖开放时间</label>
                            <input style="width:100px" type="text" class="datetimepicker1" name="ShopForm[shop_open]" value="<?php echo date('H:i',$shoplist['shop_open'])?>" />
                            <font color='red'><?=Html::error($store,"shop_open")?></font>
                        </p>

                        <p>
                            <label>外卖结束时间</label>
                            <input style="width:100px" type="text" class="datetimepicker1" name="ShopForm[shop_over]" value="<?php echo date('H:i',$shoplist['shop_over'])?>" />
                            <font color='red'><?=Html::error($store,"shop_over")?></font>
                        </p>

                        <p>
                            <label>堂食/自提开放时间</label>
                            <input style="width:100px" type="text" class="datetimepicker1" name="ShopForm[shop_opens]" value="<?php echo date('H:i',$shoplist['shop_opens'])?>"/>
                            <font color='red'><?=Html::error($store,"shop_opens")?></font>
                        </p>

                        <p>
                            <label>堂食/自提结束时间</label>
                            <input style="width:100px" type="text" class="datetimepicker1" name="ShopForm[shop_overs]" value="<?php echo date('H:i',$shoplist['shop_overs'])?>" />
                            <font color='red'><?=Html::error($store,"shop_opens")?></font>
                        </p>

                       
                        <p>
                            <label>门店类型</label>
                            <span class="formwrapper">
                                <input type="checkbox" name="ShopForm[shop_support]" checked="checked" value="0" />全部<br />
                                <input type="checkbox" name="ShopForm[shop_support]" value="1" />自提<br />
                                <input type="checkbox" name="ShopForm[shop_support]" value="2" />外卖<br /> 
                                <input type="checkbox" name="ShopForm[shop_support]" value="3" />堂食<br />
                                <font color='red'><?=Html::error($store,"shop_support")?></font>
                            </span>
                        </p>
                       
                        <p>
                            <label>是否营业</label>
                            <span class="formwrapper">
                                <input type="radio" name="ShopForm[shop_status]" value="1" />营业中<br />
                                <input type="radio" name="ShopForm[shop_status]" value="2" />停业<br />
                                <font color='red'><?=Html::error($store,"shop_status")?></font>
                            </span>
                        </p>

                        <p>
                            <label>描述</label>
                            <span class="field"><input style="width:300px" type="text" name="ShopForm[shop_remarks]" value="<?php echo $shoplist['shop_remarks']?>" />
                            <font color='red'><?=Html::error($store,"shop_remarks")?></font>
                            </span>
                        </p>

                        <p>
                            <label>排序</label>
                            <span class="field"><input type="text" id="spinner" name="ShopForm[shop_sort]" class="width100 noradiusright" />
                            <font color='red'><?=Html::error($store,"shop_sort")?></font>
                            </span>
                        </p>
                        
                        
                        <br clear="all" /><br />
                        
                        <p class="stdformbutton">
                        <input type="submit" id="bu" class="submit radius2" value="修改" />
                        <input type="reset" class="reset radius2" value="重置" />
                        </p>
                        
                        
                    </form>
                    
                    <br />

            </div><!--subcontent-->
            
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->
<script>

jQuery('.datetimepicker1').datetimepicker({
    datepicker:false,
    format:'H:i',
    step:5
});

</script>
</body>
</html>
