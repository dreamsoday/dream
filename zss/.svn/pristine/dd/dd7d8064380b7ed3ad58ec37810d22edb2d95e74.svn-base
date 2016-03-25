<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>登录页面_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<!-- <script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script> -->
<!-- <script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script> -->
<!-- <script type="text/javascript" src="assets/js/custom/general.js"></script> -->
<!-- <script type="text/javascript" src="assets/js/custom/index.js"></script> -->
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

<body class="loginpage">
	<div class="loginbox">
    	<div class="loginboxinner">
        	
            <div class="logo">
            	<h1 class="logo">宅食送.<span>Admin</span></h1>
				<span class="slogan">后台管理系统</span>
            </div><!--logo-->
            
            <br clear="all" /><br />
            
            <!-- <div class="nousername">
                            <div class="loginmsg">密码不正确.</div>
            </div> --><!--nousername-->
            
            <!-- <div class="nopassword">
                            <div class="loginmsg">用户名不正确.</div>
                <div class="loginf">
                    <div class="thumb"><img alt="" src="assets/images/thumbs/avatar1.png" /></div>
                    <div class="userlogged">
                        <h4></h4>
                        <a href="<?php echo Yii::$app->urlManager->createUrl('login/logsuccess')?>">Not <span></span>?</a> 
                    </div>
                </div>loginf
            </div> --><!--nopassword-->
            
                <div class="username">
                	<div class="usernameinner">
                    	<input type="text" name="username" id="username" />
                    </div>
                </div>
                
                <div class="password">
                	<div class="passwordinner">
                    	<input type="password" name="password" id="password" />
                    </div>
                </div>
                <button>登录</button>
                
            
            <script>
            //全局变量：统计密码错误次数
               // var error_cnt = 0;
                /*
                function login(){
                  //检查用户名是否为空
                  
                  //假设正确密码为password，检查密码是否正确
                  
                  if(document.getElementById("password").value!='123'){
                    alert("密码错误");
                    //先将错误次数自增1，然后判断是否大于等于3次
                    if(++error_cnt>=3){
                      //将登录按钮隐藏
                      document.getElementById("yzm").style.display = "block";
                    }
                    return false;
                  }
                    var username=$("#username").val();
                    alert(username);
                }
                */
                jQuery(document).ready(function($){
                    $(document).on('click',':button',function(){
                if(document.getElementById("username").value==''){
                    alert("用户名不能为空");
                    return false;
                  }
                  //检查密码是否为空
                  if(document.getElementById("password").value==''){
                    alert("密码不能为空");
                    return false;
                  }
                        var username=$("#username").val();
                        //alert(username);
                        var password=$("#password").val();
                        $.ajax({
                           type: "POST",
                           url: "<?php echo Yii::$app->urlManager->createUrl('login/proving')?>",
                           data: {'username':username,'password':password},
                           success: function(msg){
                            //alert(msg);
                             if(msg==1)
                             {
                                //alert('登陆成功');
                                location.href="<?php echo Yii::$app->urlManager->createUrl('login/logsuccess')?>";
                             }
                             if(msg==2)
                             {
                                alert('用户名或密码错误');
                             }

                           }
                        });
                    })
                })
                
            </script>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>
