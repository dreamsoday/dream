<?php
use yii\helpers\Html;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>数据表格页面_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/jquery.js"></script> 
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

<body class="withvernav">
<div class="bodywrapper">
    <div class="vernav2 iconmenu">
       <ul>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('shop/index')?>">门店列表</a></li>
        <li><a href="<?php echo Yii::$app->urlManager->createUrl('shop/shopadd')?>">门店添加</a></li>     
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
        
    <div class="centercontent tables">
        <div id="contentwrapper" class="contentwrapper">
          
          <div class="contenttitle2">
                    <h3>宅食送门店列表</h3>
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
                          <th class="head0 nosort"><input type="checkbox" /></th>
                          <th class="head0">ID</th>
                            <th class="head0">门店名称</th>
                            <th class="head0">是否关店</th>
                            <th class="head1">创建时间</th>
                            <th class="head0">修改时间</th>
                            <th class="head0">操作</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th class="head0"><span class="center">
                            <input type="checkbox" />
                          </span></th>
                           <th class="head0">ID</th>
                           <th class="head0">门店名称</th>
                            <th class="head0">是否关店</th>
                            <th class="head1">创建时间</th>
                            <th class="head0">修改时间</th>
                            <th class="head0">操作</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <!-- 门店循环 -->
                    <?php foreach($shoplist as $v):?>
                        <tr class="gradeX">
                          <td align="center"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                          <td><?= Html::encode($v->shop_id) ?></td>
                            <td><?= Html::encode($v->shop_name) ?></td>
                            <?php if($v['shop_status'] ==1){ ?>
                                <td>营业中</td>
                              <?php }else{?>
                                <td>停业</td>
                              <?php }?>
                            <td><?php echo date('H:i:s',$v['created_at'])?></td>
                            <td><?php echo date('H:i:s',$v['updated_at'])?></td>
                            <td>
                            <!-- 修改 -->
                            <a href="<?php echo Yii::$app->urlManager->createUrl('shop/shopup')?>&shop_id=<?= Html::encode($v->shop_id) ?>"><img width="20px" height="20px" src="<?php echo yii::$app->request->baseUrl?>/assets/images/gai.jpg" alt="" /></a>
                            <!-- 删除 -->
                            <a href="<?php echo Yii::$app->urlManager->createUrl('shop/shopdel')?>&shop_id=<?= Html::encode($v->shop_id) ?>"><img width="20px" height="20px" src="<?php echo yii::$app->request->baseUrl?>/assets/images/laji.jpg" alt="" /></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
        </div><!--contentwrapper-->
        
    </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
