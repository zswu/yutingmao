<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8" />
	<title>News</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie9.css" />
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="css/ie8.css" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie7.css" />
	<![endif]-->
</head>

			 <?php
    # 取得操作数据库的资格(与数据库建立连接)
    $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');

    mysql_query('set names utf8');//设置编码
    # 选择数据库
    $re = mysql_select_db('website', $link);
	
	$sql = "SELECT  DISTINCT `tag_name` 
FROM `all_have_tag`
LIMIT 0 , 30";
 $result = mysql_query($sql);
	
?>
	
<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="index.html"><img src="未命名.JPG" alt="Logo" width="236" height="74" /></a>			</div>
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
	  <div class="section">
	    <div class="figure">
			  <p>   
		      <form action="tag.php" method="post" enctype="multipart/form-data">
                 <p>Search Tag
                   <input type="text" name="my_tag" />
                 
                   <input name="submit" type="submit" value="submit" />
                
		      </form>		  </p>
			  <p>&nbsp;
			  
			  <?php while($row = mysql_fetch_assoc($result)){$tagg=$row['tag_name']; ?>
			   <a href="<?php echo "tag.php?new=".$tagg?>"> 
			   <?php echo $row['tag_name']; ?><br>
			  
			    <?php } ?>
			  
			  
			  
			  </p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
		</div>
	  </div>
		<div>
			<p>&nbsp;</p>
		</div>
	</div>
	<div id="footer">
		<div>
			<div class="first">
				<h3>Surgical Techique Online</h3>
				<p>sdjfkl sdjflsf sdfjsdlf sakd f</p>
				<div>
					<p>Telephone. : <span>12345678-90</span></p>
					<p>Fax : <span>23456789-01</span></p>
					<p>Email : <span>wmaoyuting@gmail.com</span></p>
				</div>
			</div>
			<div>
				<h3>Get Social with us!</h3>
				<p>jsdkfl asjdlf sjdlfj asldfj lsa </p>
				<div>
					<a href="http://facebook.com/freewebsitetemplates" class="facebook" target="_blank"></a>
					<a href="http://twitter.com/fwtemplates" class="twitter" target="_blank"></a>
					<a href="#" class="linked-in"></a>
				</div>
			</div>
			<div>
				<h3>Share your thoughts!</h3>
				<p>sdjaklf sajdfl ksajd flakjsdlkf jalsjdf </p>
				<form action="#">
					<label for="subscribe"><input type="text" id="subscribe" maxlength="30" value="email address" /></label>
					<input class="submit" type="submit" value="" />
				</form>
				<p>Copyright &copy; 2013 Yuting Mao <br /> All rights reserved</p>
			</div>
		</div>
	</div>
</body>
</html>