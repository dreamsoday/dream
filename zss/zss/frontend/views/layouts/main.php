<div class="topheader">
        <div class="left">


            <h1 class="logo">宅食送<span>Admin</span></h1>

            <span class="slogan">后台管理系统</span>
            
            
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
            <!--<div class="notification">
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
            </div>-->
            <div class="userinfo">
                <img src="assets/images/thumbs/avatar.png" alt="" />
                <span>
                    <?php
                        $cookies = Yii::$app->request->cookies;
                       echo $language = $cookies->getValue('username', 'en');
                    ?>
                </span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
                <div class="avatar">
                    <a href=""><img src="assets/images/thumbs/avatarbig.png" alt="" /></a>
                   
                </div><!--avatar-->
                <div class="userdata">
                    <h4>
                        <?php
                        $cookies = Yii::$app->request->cookies;
                       echo $language = $cookies->getValue('username', 'en');
                    ?>
                    </h4>
                    <ul>
                        <li><a href="<?php echo Yii::$app->urlManager->createUrl('system/update')?>">修改密码</a></li>
                        
                        <li><a href="<?php echo Yii::$app->urlManager->createUrl('login/login')?>">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
        <ul class="headermenu"> 
        </ul>
        
       <div class="headerwidget">
            
        </div><!--headerwidget-->
        
    </div><!--header-->

<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
    <script>
    str='';
    $(function(){
      $.ajax({
        data:"GET",
        url:"<?php echo Yii::$app->urlManager->createUrl('login/encode')?>",
        async:"false",
        dataType:"json",
        success:function(data){
        for(i in data){
            str=str+"<li><a href='index.php?r="+data[i].node_title+"&node_id="+data[i].node_id+"'><span class='icon icon-flatscreen'></span>"+data[i].node_name+"</a></li>"
            $(".headermenu").html(str);
        }
      }
    })
})
</script>
<?= $content?>
