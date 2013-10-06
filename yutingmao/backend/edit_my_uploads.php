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
		WHERE user_iduser='$id_user'
        LIMIT 0 , 30";
    $result = mysql_query($sql);
	
	
	 $sql = "SELECT *
        FROM `video` 
		WHERE user_iduser='$id_user'
        LIMIT 0 , 30";
    $result = mysql_query($sql);
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
        	<li class="logout"><a href="#">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
				<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="upload.php" >Upload</a></li>
                    	<li><a href="display_my_uploads.php"  >Display My  Uploads </a></li>
                    	<li><a href="edit_my_uploads.php" class="active">Edit My Uploads </a></li>
                    	<li><a href="view_comment.php">View Comments </a></li>
                    	<li><a href="#"></a></li>
                    	<li><a href="#"></a></li>
                    </ul>
                    <!-- // .sideNav -->
              </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Management</a> &raquo; <a href="#" class="active">Edit My Uploads </a></h2>
                
                <div id="main">
                
					<h3>Videos</h3>
			
			


		
					<p>  <?php while($row = mysql_fetch_assoc($result)){ $my_video_id=$row['idvideo']; ?>	
	<form action="handle_update_video.php" class="jNice" method="post">
	<video id="myvideo"  controls="controls" >
  <source src="../uploads/<?php echo $row['url'];?>" type="video/ogg" />
  <source src="../uploads/<?php echo $row['url'];?>" type="video/mp4" />
  <source src="../uploads/<?php echo $row['url'];?>" type="video/webm" />
	</video><br><br>
	<?php    $sql22 = " SELECT *
   FROM `stage`
   WHERE `idvideo` ='$my_video_id'
   ORDER BY `idstage` ASC
   LIMIT 0 , 30 ";
    $result22 = mysql_query($sql22);
	?>
	Title: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
	<input type="text" maxlength="55" name="title" class="inputtext" value="<?php echo $row['title'];?>" /><br>
	Description: &nbsp;<input name="description" type="text" value="<?php echo $row['description'];?>" size="80" maxlength="105" /><br>
	<br>
	<?php while($row22 = mysql_fetch_assoc($result22)){ ?>
	Stage <?php echo $row22['stage_num'];?>: 
	Start:  &nbsp; &nbsp;<input name="start<?php echo $row22['stage_num'];?>" type="text" value="<?php echo $row22['stage_start_time'];?>" size="25" maxlength="55" /> 
	 &nbsp; &nbsp; &nbsp; &nbsp;End: &nbsp; &nbsp;<input name="end<?php echo $row22['stage_num'];?>" type="text"  value="<?php echo $row22['stage_end_time'];?>" size="25" maxlength="55" /><br>
	 Title:&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input name="stage_title<?php echo $row22['stage_num'];?>" type="text"  value="<?php echo $row22['stage_title'];?>" size="30" maxlength="55" />
	 
	<br>Description:&nbsp; &nbsp; &nbsp; &nbsp;  <input type="text" maxlength="55" name="des<?php echo $row22['stage_num'];?>" size="80" value="<?php echo $row22['stage_description'];?>" />
	<br><br><?php } ?>&nbsp;</p>
	
	<?php   $sql3= "SELECT *  
	FROM `all_have_tag` 
	WHERE `video_idvideo` = '$my_video_id'
	LIMIT 0 , 30";
	 $result3 = mysql_query($sql3);
	?>
	

	Tags: <?php $row3 = mysql_fetch_assoc($result3);?> 
	<input type="text" maxlength="55" name="tag1" size="25" value="<?php echo $row3['tag_name'];?>" />
	<input type="hidden" name="id1" value="<?php echo $row3['idall_have_tag'];?>">
	
	<?php $row3 = mysql_fetch_assoc($result3);?> 
	<input type="text" maxlength="55" name="tag2" size="25" value="<?php echo $row3['tag_name'];?>" />
	<input type="hidden" name="id2" value="<?php echo $row3['idall_have_tag'];?>">
	
	<?php $row3 = mysql_fetch_assoc($result3);?> 
	<input type="text" maxlength="55" name="tag3" size="25" value="<?php echo $row3['tag_name'];?>" />
	<input type="hidden" name="id3" value="<?php echo $row3['idall_have_tag'];?>">
	  
	  
	 <input type="hidden" name="id" value="<?php echo $my_video_id;?>"> <br>
  <input type="submit" value="Update"  />  </form> <br><br><br><br><br><br>
  <?php } ?>&nbsp;</p>
	   
	   

					<h3>Instruments</h3>
					<fieldset>
					</fieldset>
                  
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


