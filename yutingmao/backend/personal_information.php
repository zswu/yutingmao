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


 <?php
    # 取得操作数据库的资格(与数据库建立连接)
    $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');

    mysql_query('set names utf8');//设置编码
    # 选择数据库
    $re = mysql_select_db('website', $link);


    # 取数据
    # 编写sql语句
	 $sql = " SELECT *
FROM `user`
WHERE `iduser` ='$id_user'
LIMIT 0 , 30";
    $result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	
	
	
	?>
	
	
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
                    	<li><a href="personal_information.php" class="active" >Personal Information </a></li>
                    	<li><a href="update_information.php" >Update Information </a></li>
                    	<li><a href="security.php">Security</a></li>
                    	<li><a href="#"></a></li>
                    	<li><a href="#"></a></li>
                    	<li><a href="#"></a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">About</a> &raquo; <a href="#" class="active">Personal Information</a></h2>
                
                <div id="main">
                	<form action="" class="jNice">
					<h3>About Me </h3>
                    	<table cellpadding="0" cellspacing="0">
							<tr>
                                <td width="206">E-mail:</td>
                                <td width="492"><?php echo $row['email'];?>&nbsp;</td>
                            </tr>                        
							<tr class="odd">
                                <td>Username:</td>
                                <td ><?php echo $row['username'];?>&nbsp;</td>
                            </tr>                        
							<tr>
                                <td>Name:</td>
                                <td ><?php echo $row['realname'];?>&nbsp;</td>
                            </tr>                        
							<tr class="odd">
                                <td>Occupation:</td>
                                <td><?php echo $row['occupation'];?>&nbsp;</td>
                            </tr>                        
							<tr>
                                <td>Address:</td>
                                <td ><p><?php echo $row['address'];?>&nbsp;</p>
                                </td>
                            </tr>   
							<tr>
                                <td>City:</td>
                                <td ><p><?php echo $row['city'];?>&nbsp;</p>
                                </td>
                            </tr>   
							<tr>
                                <td>Country:</td>
                                <td ><p><?php echo $row['country'];?>&nbsp;</p>
                                </td>
                            </tr>                        
                        </table>
					<h3>&nbsp;</h3>
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


