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
    <div class="vernav2 iconmenu">
     <ul>
                    <li><a href="<?php echo Yii::$app->urlManager->createUrl("menu/index")?>">分类列表</a></li> 
                      <li><a href="<?php echo Yii::$app->urlManager->createUrl("menu/list")?>">菜品列表</a></li>  
       
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->  
    <div class="centercontent">
        <div id="contentwrapper" class="contentwrapper">
        	<div id="basicform" class="subcontent">                
                    <div class="contenttitle2">
                        <h3>菜品分类修改页面</h3>
                    </div><!--contenttitle-->
                                  <?php $form = ActiveForm::begin(); ?>  
    <input type="hidden" name="_csrf" value="<?php echo \Yii::$app->request->getCsrfToken() ?>">    
                        <p>
                     
                            <span class="field"><?= $form->field($model,'series_name')->textInput(["value" =>$result->series_name])->label("分类名称")?>
</span>
                        </p>
                        
                        <p>
                      
                            <span class="field"> <?= $form->field($model,'series_sort')->textInput(["value" =>$result->series_sort])->label("分类排序") ?></span>
                        </p> 
                        <p class="stdformbutton">
                          <button class="submit radius2">Submit Button</button>
                          <button class="reset radius2" stye="padding-left=15px">reset Button</button> 
                        </p>          
               <?php ActiveForm::end(); ?>
            </div><!--subcontent-->
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
