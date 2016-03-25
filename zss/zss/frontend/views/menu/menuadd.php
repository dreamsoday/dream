<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
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

   <!-- 左菜单栏的列表 -->
    <div class="vernav2 iconmenu">
         <ul>

                    <li><a href="<?php echo Yii::$app->urlManager->createUrl("menu/index")?>">分类列表</a></li> 
                   <li><a href="<?php echo Yii::$app->urlManager->createUrl("menu/list")?>">菜品列表</a></li>  
       

       
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
    <div class="centercontent tables">
        <div id="contentwrapper" class="contentwrapper">
        <!-- 菜品列表 -->
          <div class="contenttitle2">
                    <h3>菜品分类添加</h3>
          </div><!--contenttitle-->
          <!--  菜品分类的添加 -->
<?php $form=ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
<input type="hidden" name="_csrf" value="<?php echo \Yii::$app->request->getCsrfToken() ?>">
                          <p>
                        <label>菜品分类</label>
                          <span class="field">
            <select name="series_id" class="uniformselect">
            <?php foreach($typename as $v):?>
                            <option value="<?= Html::encode($v->series_id)?>"><?= Html::encode($v->series_name)?></option>
                              <?php endforeach;?>
                          </select>
                          </span>
                      </p>
                      <p>
                    
                          <span class="field"><?= $form->field($model, 'menu_name')->label('菜品名称') ?>
</span>
                      </p> 
                       <p>
                      
                          <span class="field"><?= $form->field($model, 'menu_price')->label('菜品价格') ?></span>
                      </p> 
                       <p>
                      
                            <span class="field"><?= $form->field($model, 'image_url')->fileInput()->label('菜品图片') ?></span> 
                      </p>
                       <p>
                   
                          
                          <span class="field"><?= $form->field($model, 'menu_desc')->textArea(["rows"=>10,"cols"=>30])->label('菜品介绍') ?></span> 
                    
                  
                      </p> 
                    
                      <p class="stdformbutton">
                        <button class="submit radius2">Submit Button</button>
                        <button class="reset radius2">Reset Button</button>
                      </p>          
           <?php ActiveForm::end()?>

    </div><!-- centercontent -->
   </div>
    
</div><!--bodywrapper-->

</body>
</html>
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
<script>
jQuery.noConflict();//解决jquery冲突的问题
  $(document).ready(function($){
   $(".type").click(function(){//实现根据菜品分类名称查找所对应的菜品名称
        series_id=$(this).attr("value");
           $.ajax({
               type: "GET",
               url: "<?php echo Yii::$app->urlManager->createUrl('menu/list')?>",
               data:"series_id="+series_id,
               success:function(msg){
                $("#show").html(msg)
               }
            });
        })
    $(".delone").click(function(){//实现单个删除
        menu_id=$(this).parent().attr("value");
        $(this).parent().parent().remove();
           $.ajax({
               type: "GET",
               url: "<?php echo Yii::$app->urlManager->createUrl('menu/delmenu')?>",
               data:"menu_id="+menu_id,
               success:function(msg){
               }
            });
        })
   $(".checkall").click(function(){//实现全选全不选功能
        $("input[type='checkbox']").prop("checked", function( i, val ) {
            return !val;
        });
   })
    $("#delall").click(function(){//实现批量删除
      allseries_id=$("input[type='checkbox']:checked");//获取所有选中的复选框
      var str='';
      allseries_id.each(function(){
        str=str+','+$(this).val();//拼接要删除的id值
      })
      str=str.substr(1);
    //传要删除的id
        $.ajax({
            type:"GET",
            url:"<?php echo Yii::$app->urlManager->createUrl('menu/delone')?>",
            data:{"menu_id":str},
            success:function(date){
                if(date==1){
                    location.reload();
                }else{
                    alert("删除失败")
                }
            }
        })
   })
    $("#addcontent").click(function(){//点击添加实现菜品分类的添加
      $("#start").css({display:"block"});
    })
})
</script>
