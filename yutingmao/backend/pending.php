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
    $sql = "SELECT *
        FROM `video` 
		WHERE 'accept'=0";
    $result = mysql_query($sql);
	
	
	 $sql2 = "SELECT *
        FROM `instrument` 
		WHERE 'accept'=0";
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
<style type="text/css">
<!--
.STYLE1 {color: #FF8000}
-->
</style>
</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>Transdmin Light</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
      <ul id="mainNav">
        	<li><a href="index.php" >ABOUT</a></li> 
        	<!-- Use the "active" class for the active menu item  -->
        	<li><a href="management.php" >MANAGEMENT</a></li>
        	<li><a href="administrator.php" class="active">ADMINISTRATOR</a></li>
        	<li><a href="#"></a></li>
        	<li class="logout"><a href="#">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="pending.php" class="active"  >Pending Uploads </a></li>
                    	<li><a href="tag_tree.php" >Tag Tree </a></li>
                    	<li><a href="manage_comment.php">Manage Comments </a></li>
						<li><a href=""></a></li>
                    	<li><a href="#"></a></li>
                
                    	<li><a href="#"></a></li>
                    </ul>
                    <!-- // .sideNav -->
              </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Administrator</a> &raquo; <a href="#" class="active">Pending Uploads </a></h2>
                
                <div id="main">
                	
					<h3>Pending Uploads</h3>
					<p>&nbsp; </p>
					  <fieldset>
					<p>  <?php while($row = mysql_fetch_assoc($result)){ ?>	
					<form action="handle_pending.php"  method="post">
					 <table width="200" border="1">
					  <tr><td>
	<video id="myvideo"  controls="controls" >
  <source src="../uploads/<?php echo $row['url'];?>" type="video/ogg" />
  <source src="../uploads/<?php echo $row['url'];?>" type="video/mp4" />
  <source src="../uploads/<?php echo $row['url'];?>" type="video/webm" />
	</video></td>
	<td>
	<span class="STYLE1">Title:</span> <?php echo $row['title'];?> <br> 
	<span class="STYLE1">Description:</span><?php echo $row['description'];?>	
	 <input type="hidden" name="id" value="<?php echo $row['idvideo'];?>"></td>
	
	</tr>
	<tr><td></td>
	<td><input type="radio" name="condition" value="1" /> 
	Accept &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
	   <input type="radio" name="condition" value="-1" /> 
	   Reject  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
	    <input type="submit" value="Submit"  /> 
	</td></tr>
	</table> </form>
	   <?php } ?>&nbsp;</p>
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


