<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
        <!-- 菜品分类的列表 -->
          <div class="contenttitle2">
                    <h3>菜品分类表</h3>
                    <div><a href="<?php echo Yii::$app->urlManager->createUrl("menu/addseries")?>">添加</a>&nbsp;&nbsp;<button id="delall">删除</button></div> 
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
                          <th class="head0 nosort"><input type="checkbox" class="checkall"/></th>
                             <th class="head1">分类名称</th>
                            <th class="head0">排序</th>
                            <th class="head1">添加时间</th>
                            <th class="head0">修改时间</th>
                            <th class="head0">编辑</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                           <th class="head0"></th>
                            <th class="head1">分类名称</th>
                            <th class="head0">排序</th>
                            <th class="head1">添加时间</th>
                            <th class="head0">修改时间</th>
                            <th class="head1">编辑</th>
                        </tr>
                    </tfoot>
                    <tbody>
              <?php foreach($arrtype as $v){?> 
              	
                        <tr class="gradeC">
                          <td align="center"><span class="center">
                            <input type="checkbox" value="<?= Html::encode($v->series_id) ?>" id="sele" name="check"/>
                          </span></td>
                            <td><?= Html::encode($v->series_name) ?></td>
                            <td><?= Html::encode($v->series_sort) ?></td>
                            <td><?= Html::encode(date("Y-m-d H:i:s",$v->created_at))?></td>
                            <td><?= Html::encode(date("Y-m-d H:i:s",$v->updated_at))?></td>
                            <td value="<?=Html::encode($v->series_id)?>">
                            <a href="<?php echo Yii::$app->urlManager->createUrl('menu/editor')?>&&series_id=<?= Html::encode($v->series_id) ?>"><img src="/assets/images/gai.jpg" alt="" height="10" width="10"/></a>&nbsp;&nbsp;
                            <a href="javascript:void(0)" class="delone"><img src="/assets/images/laji.jpg" alt="" height="10" width="10"/></a></td>      
                        </tr>
                         <?php }?> 
                    </tbody>
                </table>
        
        </div><!--contentwrapper-->

     
     
    </div>
    </div><!-- centercontent -->
   
    
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
   $(".delone").click(function(){
        series_id=$(this).parent().attr("value");
        $(this).parent().parent().remove();
           $.ajax({
               type: "GET",
               url: "<?php echo Yii::$app->urlManager->createUrl('menu/delone')?>",
               data:"series_id="+series_id,
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
            data:{"series_id":str},
            success:function(date){
                if(date==1){
                    location.reload();
                }else{
                    alert("删除失败")
                }
            }
        })
   })
})
</script>
