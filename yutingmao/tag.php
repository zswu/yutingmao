<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
<meta charset="UTF-8" />
<title>Tag</title>

<link rel="stylesheet" type="text/css" href="css/style.css" />


</head>
<body onLoad="MM_CheckFlashVersion('7,0,0,0','ҳҪʹýµ Macromedia Flash Player 汾Ƿ');">
<div id="header">
  <div><a href="index.html"><img src="未命名.JPG" alt="Image" width="141" height="75" /></a>
      <div id="logo"> <a href="index.html"></a> </div>
    <div id="navigation">
        <div>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li class="current"><a href="about.html">About us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="video.html">Video</a></li>
            <li><a href="instrument.html">Instrument</a></li>
          </ul>
        </div>
    </div>
  </div>
</div>
<div id="content">
	  <div>
	    <h2>Video </h2>
		
			<p>
			
<?php
    $new=$_GET['new'];
	
?>
			
			 <?php
    # 取得操作数据库的资格(与数据库建立连接)
    $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');

    mysql_query('set names utf8');//设置编码
    # 选择数据库
    $re = mysql_select_db('website', $link);


@$my_tag0 = $_POST['my_tag']; 

if($my_tag0!=NULL)
$my_tag=$my_tag0;

if($new!=NULL)
$my_tag=$new;

echo "All the resources related to  ";
echo $my_tag;


    # 取数据
    # 编写sql语句
 

	     $sql2 = "SELECT *
FROM `all_have_tag` INNER JOIN `video` ON all_have_tag.video_idvideo=video.idvideo 
 WHERE `tag_name` ='$my_tag' AND `accept` =1
LIMIT 0 , 30";
 $result2 = mysql_query($sql2);



 $sql3 = "SELECT *
FROM `all_have_tag` INNER JOIN `instrument` ON all_have_tag.instrument_idinstrument=instrument.idinstrument 
WHERE `tag_name` ='$my_tag' 
LIMIT 0 , 30"; 
 $result3 = mysql_query($sql3);
 


 
 
    ?>
	
	
	
	<br>
		<br>
			<br>
	
  <?php while($row2 = mysql_fetch_assoc($result2)){  $tagg_video=$row2['idvideo'];?>	
 
	<video id="myvideo" width="320" height="240" controls="controls" >
  <source src="uploads/<?php echo $row2['url'];?>" type="video/ogg" />
  <source src="uploads/<?php echo $row2['url'];?>" type="video/mp4" />
  <source src="uploads/<?php echo $row2['url'];?>" type="video/webm" />
	</video>  <a href="<?php echo "video.php?video_names=".$tagg_video?>"> <br><?php echo $row2['title'];?>  </a> <br><br><br>
	   <?php } ?>
	   
	
 <?php while($row3 = mysql_fetch_assoc($result3)){  $tagg_in=$row3['idinstrument'];?>		
	<a href="<?php echo "instrument.php?in_names=".$tagg_in?>"> <img src="uploads/<?php echo $row3['url'];?>" alt="Image" width="320" height="240"/></a> 
	 <a href="<?php echo "instrument.php?in_names=".$tagg_in?>"> <br><?php echo $row3['name'];?>  </a> <br><br><br>
	   <?php } ?>
	   
	   
<!-- cha ru youtube	 -->
	<!-- <iframe width="560" height="315" src="http://www.youtube.com/embed/-mxvpfaGPQk" frameborder="0" allowfullscreen></iframe>
	-->
	
	
<br>






		  &nbsp;
	    </p>
	    </p>
<p>&nbsp;</p>
<h2>&nbsp;</h2>
			<p>&nbsp;</p>
	  </div>
</div>
	<div id="footer">
	  <div></div>
	</div>
</body>
</html>