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
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/index')?>">会员信息</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/grade')?>">会员等级管理</a></li> 
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/partner')?>">合作伙伴管理</a></li>     
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        
        <div id="contentwrapper" class="contentwrapper">
            
            <div id="basicform" class="subcontent">
                                
                    <div class="contenttitle2">
                        <h3>合作公司修改</h3>
                    </div><!--contenttitle-->

                    <form class="stdform" action="<?php echo Yii::$app->urlManager->createUrl('member/companyup')?>" method="post">
                    <?php foreach ($company as $k => $v) { ?>
                    <?php foreach ($v as $kk => $vv) { ?>
                        <input type="hidden" name="company_id" value="<?php echo $vv['company_id']?>" />
                        <p>
                            <label>名称：</label>
                            <span class="field"><input type="text" name="company_name" class="smallinput" value="<?php echo $vv['company_name']?>" style="width:150px"/></span>
                        </p>
                        
                        <p>
                            <label>折扣：</label>
                            <span class="field"><input style="width:150px" type="text" name="company_discount" class="mediuminput" value="<?php echo $vv['company_discount']?>"/></span>
                        </p>
                                                
                         <p>
                            <label>满减：</label>
                            <input style="width:100px" type="text" name="company_price" class="mediuminput" value="<?php echo $vv['company_price']?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:100px" type="text" name="company_subtract" class="mediuminput" value="<?php echo $vv['company_subtract']?>"/></span>
                        </p>
                        <?php }?>
                        <?php }?>
                        <p>
                            <label>赠品：</label>
                            <span class="field">
                                <select name="giveaway_id" id="">
                                <?php foreach ($giveaway as $k => $v) { ?>
                                    <option value="<?php echo $v['giveaway_id']?>"><?php echo $v['giveaway_name']?></option>
                                <?php }?>
                                </select>
                            </span>
                        </p>
                        
                                            
                        
                        <br clear="all" /><br />
                        
                        <p class="stdformbutton">
                        <input type="submit" class="submit radius2" value="修改" />
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
