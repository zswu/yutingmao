<?php
session_start();
if(!$_SESSION['user_log']) header("location:../login.php");	
$id_user=$_SESSION['user_log'];
?>

 <?php
    # 取得操作数据库的资格(与数据库建立连接)
    $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');

    mysql_query('set names utf8');//设置编码
    # 选择数据库
    $re = mysql_select_db('website', $link);

    # 取数据
    # 编写sql语句
    $sql = " SELECT *
FROM `comment`
WHERE `user_idusers` ='$id_user'
LIMIT 0 , 30 ";
    $result = mysql_query($sql);
	
	
	  $sql2 = " SELECT comment.title, comment.content
FROM `comment` INNER JOIN `video` ON comment.video_idvideo =video.idvideo
WHERE `user_idusers` ='$id_user'
LIMIT 0 , 30 ";
    $result2 = mysql_query($sql2);
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
        	<li><a href="index.php" >ABOUT</a></li> 
        	<!-- Use the "active" class for the active menu item  -->
        	<li><a href="management.php" class="active">MANAGEMENT</a></li>
        	<li><a href="administrator.php">ADMINISTRATOR</a></li>
        	<li><a href="#"></a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
				<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="upload.php" class="active" >Upload</a></li>
                    	<li><a href="display_my_uploads.php"  >Display My  Uploads </a></li>
                    	<li><a href="edit_my_uploads.php">Edit My Uploads </a></li>
                    	<li><a href="view_comment.php">View Comments </a></li>
                    	<li><a href="#"></a></li>
                    	<li><a href="#"></a></li>
                    </ul>
                    <!-- // .sideNav -->
              </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Management</a> &raquo; <a href="#" class="active">Upload</a></h2>
                
                <div id="main">
                	<form action="" class="jNice">
					<h3>The Sent Comments&nbsp;</h3>
					<fieldset>
				  <?php while($row = mysql_fetch_assoc($result)){ ?>
				  Title: <?php echo $row['title'];?><br>
				  Content: <?php echo $row['content'];?>
				  <br>
				  <br>
					   <?php } ?>
					</fieldset>
                    </form>
					
						<h3>The Received Comments&nbsp;</h3>
						
									<fieldset>
				  <?php while($row2 = mysql_fetch_assoc($result2)){ ?>
				  Title: <?php echo $row2['title'];?><br>
				  Content: <?php echo $row2['content'];?>
				  <br>
				  <br>
					   <?php } ?>
					</fieldset>
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        <p id="footer">Yuting Mao<a href="http://www.perspectived.com"></a></p>
    </div>
    <!-- // #wrapper -->
</body>
</html>


