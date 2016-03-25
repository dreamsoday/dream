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
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/tables.js"></script>
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
<?php if ($n==0):?>
        <style>
        .add{ display: none; }
        </style>
    <?php endif;?>
<body class="withvernav">
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
       <ul>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/index')?>">会员信息</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/grade')?>">会员等级管理</a></li> 
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('member/partner')?>">合作伙伴管理</a></li>     
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
        
    <div class="centercontent tables">
        <div id="contentwrapper" class="contentwrapper">
          
          <div class="contenttitle2">
                    <h3>合作伙伴管理</h3>
                </div><!--contenttitle-->
                <button class="company_add">添加</button>
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
                          <th class="head0 nosort"><input type="checkbox" /></th>
                            <th class="head1">ID</th>
                            <th class="head0">名称</th>
                            <th class="head1">创建时间</th>
                            <th class="head0">修改时间</th>
                            <th class="head1">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($company as $k => $v) { ?>
                        <?php foreach ($v as $kk => $vv) { ?>
                        <tr class="gradeX">
                          <td align="center"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                          <td class="center"><?php echo $vv["company_id"]?></td>
                                <td class="center"><?php echo $vv["company_name"]?></td>
                                <td class="center">
                                    <?php echo date('Y-m-d H:i:s',$vv["created_at"])?>
                                </td>
                                <td>
                                    <?php echo date('Y-m-d H:i:s',$vv["updated_at"])?>
                                </td>
                                <td value='<?php echo $vv["company_id"]?>'><a href="index.php?r=member/partnerup&company_id=<?php echo $vv["company_id"]?>">修改</a> | <a href="index.php?r=member/partnerdel&company_id=<?php echo $vv["company_id"]?>" class="partner_del">删除</a></td>
                        </tr>
                        <?php }?>
                        <?php }?>
                    </tbody>
                </table>
        </div><!--contentwrapper-->
        
    <div class="add"  style="margin-left: 200px;">
        
        <h3 >合作伙伴添加</h3>
            <br />
            <!-- <form action="<?php echo Yii::$app->urlManager->createUrl('member/partneradd')?>" method="post"> -->
                <style>
                .help-block{ color: red }
            </style>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal'],

            ]); ?>    
            <p>
                <label>名称：</label>
                <span class="field"><?= $form->field($model, 'company_name', ['inputOptions'=>['placeholder'=>'名称在五个字以内']])->label(false)->textinput(); ?></span>
            </p>
            <br />
            <p>
                <label>折扣：</label>
                <span class="field"><?= $form->field($model, 'company_discount', ['inputOptions'=>['placeholder'=>'折扣不能大于100小于0']])->label(false)->textinput(); ?></span>
            </p>
            <br />
            <p>
                <label>满减：</label>
                <span class="field"><?= $form->field($model, 'company_price', ['inputOptions'=>['placeholder'=>'金额在4位以内']])->label(false)->textinput(); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="field"><?= $form->field($model, 'company_subtract', ['inputOptions'=>['placeholder'=>'金额在4位以内']])->label(false)->textinput(); ?></span>
            </p>
            <br />
            <p>
                <label>赠品：</label>
                <span class="field">
                    <select name="giveaway_id" id="">
                        <?php foreach ($giveaway as $k => $v) { ?>
                            <option value="<?php echo $v["giveaway_id"]?>"><?php echo $v["giveaway_name"]?></option>
                        <?php  }?>
                    </select>
                </span>
            </p>
            <br />
            <p>
                <input type="submit" value="添加" />
                <input type="reset" value="重置" />
            </p>

            <?php ActiveForm::end(); ?>

    </div>
    


    </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>


<script>
    jQuery(document).ready(function($){
        //添加
        //$(".add").hide();
        $(document).on("click",".company_add",function(){
            $(".add").show();
        })
    });

</script>