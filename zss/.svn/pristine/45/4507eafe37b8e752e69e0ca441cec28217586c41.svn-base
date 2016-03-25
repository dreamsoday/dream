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
    	<li><a href="<?php echo Yii::$app->urlManager->createUrl('system/index')?>">用户管理</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('system/useradd')?>">用户添加</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('app/cf')?>">轮播图</a></li> 
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('app/cg')?>">轮播组</a></li>  
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        
        <div id="contentwrapper" class="contentwrapper">
        	
        	<div id="basicform" class="subcontent">
                                
                    <div class="contenttitle2">
                        <h3>图片轮播组修改</h3>
                    </div><!--contenttitle-->
<?php $form = ActiveForm::begin(); ?>
 <p>
                            <label>是否显示</label>
                            <span class="formwrapper">
                            <?php if($arrone->group_isshow ==1){ ?>
                               <input type="radio" name="group_isshow" value="1" checked/>显示
                               <input type="radio" name="group_isshow" value="0" />隐藏<br />
                              <?php }else{?>
                               <input type="radio" name="group_isshow" value="1" />显示
                                <input type="radio" name="group_isshow" value="0" checked/>隐藏<br />
                              <?php }?>
                            </span>
                        </p>                       
<p>
 <label>描述</label>
 <span class="field"><textarea name="group_desc" id="" cols="30" rows="10"><?= Html::encode($arrone->group_desc)?></textarea></span>
 </p>  
 <p>
 <label>开始时间</label>
 <span class="field"><input type="text" name="group_starttime" value="<?php echo date('Y-m-d H:i:s',$arrone['group_starttime'])?>" id="datetimepicker1"/></span>
 </p> 
 <p>
 <p>
 <label>结束时间</label>
 <span class="field"><input type="text" name="group_endtime" value="<?php echo date('Y-m-d H:i:s',$arrone['group_endtime'])?>" id="datetimepicker"/></span>
 </p> 
 <p>
 <label>轮播组名</label>
 <span class="field"><input type="text" name="group_name" value="<?= Html::encode($arrone->group_name)?>"/></span>
 </p> 
 <input type="hidden" value="<?= Html::encode($arrone->group_id)?>" name="group_id"/>
<button>Submit</button>

<?php ActiveForm::end(); ?>
                    
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
jQuery('#datetimepicker').datetimepicker();
jQuery('#datetimepicker1').datetimepicker();
</script>
</body>
</html>
