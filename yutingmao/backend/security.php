<?php
session_start();
if(!$_SESSION['user_log']) header("location:../login.php");	
$id_user=$_SESSION['user_log'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transdmin Light</title>

<!-- CSS -->
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>
</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>Transdmin Light</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
        	<li><a href="index.php" class="active">ABOUT</a></li> 
        	<!-- Use the "active" class for the active menu item  -->
        	<li><a href="management.php">MANAGEMENT</a></li>
        	<li><a href="administrator.php">ADMINISTRATOR</a></li>
        	<li><a href="#"></a></li>
        	<li class="logout"><a href="#">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    <li><a href="personal_information.php" >Personal Information </a></li>
                    	<li><a href="update_information.php" >Update Information </a></li>
                    	<li><a href="security.php" class="active">Security</a></li>
                    	<li><a href="#"></a></li>
                    	<li><a href="#"></a></li>
                    	<li><a href="#"></a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">About</a> &raquo; <a href="#" class="active">Security</a></h2>
                
                <div id="main">
               	  <form action="handle_password.php" class="jNice" method="post">
					<h3>Change My Password </h3>
					<p>&nbsp;</p>
					<p>Please Enter the Old Password:</p>
                    	<p><input type="password" maxlength="55" name="oldpassword" class="inputtext" />&nbsp;</p>
                    	<p>&nbsp;</p>
                    	<p>Please Enter the New Password:</p>
                    	<p><input type="password" maxlength="55" name="newpassword" class="inputtext" />&nbsp;</p>
                   	  <p>&nbsp;</p>
                    	<p>Please Re-enter the New Password:</p>
                    	<p>
               	    <input type="password" maxlength="55" name="newpassword0" class="inputtext" />&nbsp;</p>
                    	<p>&nbsp;</p>
                    	<p>&nbsp;</p>
                    	<p>
                   	      <input name="submit" type="submit" value=" Submit "  />
                  	          </p>
               	  </form>
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        <p id="footer"><a href="http://www.perspectived.com">Yuting Mao</a></p>
    </div>
    <!-- // #wrapper -->
</body>
</html>


