<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>验证提示页面_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.smartWizard-2.0.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		// Smart Wizard 	
  		jQuery('#wizard').smartWizard({onFinish: onFinishCallback});
      	jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});
		jQuery('#wizard3').smartWizard({onFinish: onFinishCallback});
		jQuery('#wizard4').smartWizard({onFinish: onFinishCallback});
		
		function onFinishCallback(){
			alert('Finish Clicked');
		} 
		
		jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
		
		jQuery('select, input:checkbox').uniform();
	});
</script>
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
    <div class="topheader">
        <div class="left">
           <h1 class="logo">Ama.<span>Admin</span></h1>
            <span class="slogan">后台管理系统</span>
            
            <div class="search">
            	<form action="" method="post">
                	<input type="text" name="keyword" id="keyword" value="Enter keyword(s)" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
        	<!--<div class="notification">
                <a class="count" href="notifications.html"><span>9</span></a>
        	</div>
			-->
            <div class="userinfo">
            	<img src="assets/images/thumbs/avatar.png" alt="" />
                <span>Juan Dela Cruz</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">            	<div class="avatar">
                	<a href=""><img src="assets/images/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                    	Change theme: <br />
                    	<a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
<div class="userdata">
                	<h4>Juan Dela Cruz</h4>
                    <span class="email">youremail@yourdomain.com</span>
                    <ul>
                    	<li><a href="editprofile.html">Edit Profile</a></li>
                        <li><a href="accountsettings.html">Account Settings</a></li>
                        <li><a href="help.html">Help</a></li>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    <ul class="headermenu">
            <li><a href="<?php echo Yii::$app->urlManager->createUrl('login/dashboard')?>"><span class="icon icon-flatscreen"></span>Dashboard</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl('login/manageblog')?>"><span class="icon icon-pencil"></span>Manage Blog</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl('login/message')?>"><span class="icon icon-message"></span>Messages</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl('login/report')?>"><span class="icon icon-chart"></span>Reports</a></li>
        </ul>
        <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	<h4>Today's Earnings</h4>
                    <h2>$640.01</h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                	<h4>Current Rate</h4>
                    <h2>53%</h2>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->
    
    <div class="vernav2 iconmenu">
    	<ul>
        	<li class="current"><a href="#formsub" class="editor">Forms</a>
            	<span class="arrow"></span>
            	<ul id="formsub">
               		<li><a href="forms.html">Basic Form</a></li>
                    <li class="current"><a href="wizard.html">Wizard</a></li>
                    <li><a href="editor.html">WYSIWYG</a></li>
                </ul>
            </li>
            <!--<li><a href="filemanager.html" class="gallery">File Manager</a></li>-->
            <li><a href="elements.html" class="elements">Elements</a></li>
            <li><a href="widgets.html" class="widgets">Widgets</a></li>
            <li><a href="calendar.html" class="calendar">Calendar</a></li>
            <li><a href="support.html" class="support">Customer Support</a></li>
            <li><a href="typography.html" class="typo">Typography</a></li>
            <li><a href="tables.html" class="tables">Tables</a></li>
			<li><a href="buttons.html" class="buttons">Buttons &amp; Icons</a></li>
            <li><a href="#error" class="error">Error Pages</a>
            	<span class="arrow"></span>
            	<ul id="error">
               		<li><a href="notfound.html">Page Not Found</a></li>
                    <li><a href="forbidden.html">Forbidden Page</a></li>
                    <li><a href="internal.html">Internal Server Error</a></li>
                    <li><a href="offline.html">Offline</a></li>
                </ul>
            </li>
            <li><a href="#addons" class="addons">Addons</a>
            	<span class="arrow"></span>
            	<ul id="addons">
               		<li><a href="newsfeed.html">News Feed</a></li>
                    <li><a href="profile.html">Profile Page</a></li>
                    <li><a href="productlist.html">Product List</a></li>
                    <li><a href="photo.html">Photo/Video Sharing</a></li>
                </ul>
            </li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">Forms</h1>
            <span class="pagedesc">The content below are loaded using inline data</span>
            
            <ul class="hornav">
                <li class="current"><a href="#default">Default</a></li>
                <li><a href="#tabbed">Tabbed</a></li>
                <li><a href="#vertical">Vertical</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        
        	<div id="default" class="subcontent">
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform" method="post" action="">
                    <div id="wizard" class="wizard">
                    	<br />
                        <ul class="hormenu">
                            <li>
                            	<a href="#wiz1step1">
                                	<span class="h2">Step 1</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Basic Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2">
                                	<span class="h2">Step 2</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Account Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step3">
                                	<span class="h2">Step 3</span>
                                    <span class="dot"><span></span></span>
                                    <span class="label">Terms of Agreement</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br clear="all" /><br /><br />
                        	
                        <div id="wiz1step1" class="formwiz">
                        	<h4>Step 1: Basic Information</h4>
                        	
                                <p>
                                    <label>First Name</label>
                                    <span class="field"><input type="text" name="firstname" id="firstname" class="longinput" /></span>
                                </p>
                                
                                <p>
                                    <label>Last Name</label>
                                    <span class="field"><input type="text" name="lastname" id="lastname" class="longinput" /></span>
                                </p>
                                                                
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="selection" id="selection">
                                        <option value="">Choose One</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select></span>
                                </p>
                                
                        	
                            
                        </div><!--#wiz1step1-->
                        
                        <div id="wiz1step2" class="formwiz">
                        	<h4>Step 2: Account Information</h4>
                            
                                <p>
                                    <label>Account No</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="80" rows="5" name="location"></textarea></span>
                                </p>
                                                                                               
                        </div><!--#wiz1step2-->
                        
                        <div id="wiz1step3">
                        	<h4>Step 3: Terms of Agreement</h4>
                            <div class="par terms">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                            </div>
                        </div><!--#wiz1step3-->
                        
                    </div><!--#wizard-->
                    </form>
                    <!-- END OF DEFAULT WIZARD -->
                    
                    <br /><br />
                    
            </div><!-- #default -->
            
            
            <div id="tabbed" class="subcontent" style="display: none">
            
                    <!-- START OF TABBED WIZARD -->
                    <form class="stdform" method="post" action="">
                    <div id="wizard2" class="wizard">
                    	
                        <ul class="tabbedmenu">
                            <li>
                            	<a href="#wiz1step2_1">
                                	<span class="h2">STEP 1</span>
                                    <span class="label">Basic Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2_2">
                                	<span class="h2">STEP 2</span>
                                    <span class="label">Account Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2_3">
                                	<span class="h2">STEP 3</span>
                                    <span class="label">Terms of Agreement</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br clear="all" /><br /><br />
                        	
                        <div id="wiz1step2_1" class="formwiz">
                        	<h4>Step 1: Basic Information</h4>
                        	
                                <p>
                                    <label>First Name</label>
                                    <span class="field"><input type="text" name="firstname" class="longinput" /></span>
                                </p>
                                
                                <p>
                                    <label>Last Name</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                                                
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="selection">
                                        <option value="">Choose One</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select></span>
                                </p>
                                
                        	
                            
                        </div><!--#wiz1step2_1-->
                        
                        <div id="wiz1step2_2" class="formwiz">
                        	<h4>Step 2: Account Information</h4> 
                            
                                <p>
                                    <label>Account No</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="80" rows="5" name="location"></textarea></span>
                                </p>
                                                                                               
                        </div><!--#wiz1step2_2-->
                        
                        <div id="wiz1step2_3">
                        	<h4>Step 3: Terms of Agreement</h4>
                            <div class="par terms">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                            </div>
                        </div><!--#wiz1step2_3-->
                        
                    </div><!--#wizard-->
                    </form>
                                        
                    <!-- END OF TABBED WIZARD -->
                                
            </div><!-- #tabbed -->
            
            <div id="vertical" class="subcontent" style="display: none">
            
                    <!-- START OF VERTICAL WIZARD -->
                    <form class="stdform" method="post" action="">
                    <div id="wizard3" class="wizard verwizard">
                    	
                        <ul class="verticalmenu">
                            <li>
                            	<a href="#wiz1step3_1">
                                    <span class="label">Step 1: Basic Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step3_2">
                                    <span class="label">Step 2: Account Information</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step3_3">
                                    <span class="label">Step 3: Terms of Agreement</span>
                                </a>
                            </li>
                        </ul>
                                                	
                        <div id="wiz1step3_1" class="formwiz">
                        	<h4>Step 1: Basic Information</h4> 
                        	
                                <p>
                                    <label>First Name</label>
                                    <span class="field"><input type="text" name="firstname" class="longinput" /></span>
                                </p>
                                
                                <p>
                                    <label>Last Name</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                                                
                                <p>
                                    <label>Gender</label>
                                    <span class="field"><select name="selection">
                                        <option value="">Choose One</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                    </select></span>
                                </p>
                                
                        	
                            
                        </div><!--#wiz1step3_1-->
                        
                        <div id="wiz1step3_2" class="formwiz">
                        	<h4>Step 2: Account Information</h4> 
                            
                                <p>
                                    <label>Account No</label>
                                    <span class="field"><input type="text" name="lastname" class="longinput" /></span>
                                </p>
                                <p>
                                    <label>Address</label>
                                    <span class="field"><textarea cols="80" rows="5" name="location" class="longinput"></textarea></span>
                                </p>
                                                                                               
                        </div><!--#wiz1step3_2-->
                        
                        <div id="wiz1step3_3">
                        	<h4>Step 3: Terms of Agreement</h4>
                            <div class="par terms">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                <p><input type="checkbox"  /> I agree with the terms and agreement...</p>
                            </div>
                        </div><!--#wiz1step3_3-->
                        
                    </div><!--#wizard-->
                    </form>
                    
                    <br clear="all" /><br />
                    
                    <!-- END OF VERTICAL WIZARD -->
                    
            </div><!--#vertical-->
            
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
