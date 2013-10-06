<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<LINK media=all href="css/css1.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="/css/style.css" />


<SCRIPT src="js/xixi.js" type=text/javascript></SCRIPT>
<title></title>
<style type="text/css">
<!--
.STYLE1 {color: #FFFFFF}
.STYLE3 {color: #FFFF80; font-weight: bold; }
.STYLE4 {
	color: #FFFF00;
	font-style: italic;
}
.STYLE8 {color: #FFFFFF; font-style: italic; }
.STYLE10 {color: #FFFFFF; font-weight: bold; font-style: italic; }
-->
</style>



</head>

 <?php
 
 echo $in_names=$_GET['in_names'];
 
    # 取得操作数据库的资格(与数据库建立连接)
    $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');

    mysql_query('set names utf8');//设置编码
    # 选择数据库
    $re = mysql_select_db('website', $link);


    # 取数据
    # 编写sql语句
    $sql = "SELECT *
        FROM `instrument` 
		WHERE idinstrument='$in_names'
        LIMIT 0 , 30";
     $result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	
	
	
	$sql2=" SELECT *
FROM `user` INNER JOIN `instrument` ON user.iduser=instrument.user_iduser
WHERE idinstrument='$in_names'
LIMIT 0 , 30 ";
  $result2 = mysql_query($sql2);
	$row2 = mysql_fetch_assoc($result2);
	
	
	
	$sql3= "SELECT *  
	FROM `all_have_tag` 
	WHERE `instrument_idinstrument` = '$in_names' 
	LIMIT 0 , 30";
	 $result3 = mysql_query($sql3);
	 
	 
		$sql4= "SELECT * 
FROM  `comment` INNER JOIN `user` ON comment.user_idusers=user.iduser
WHERE  `instrument_idinstrument` ='$in_names' 
LIMIT 0 , 30";
	 $result4 = mysql_query($sql4);
	 
	  
	 
	 $sql6="SELECT * 
FROM  `instrument_has_video` INNER JOIN `video` ON instrument_has_video.video_idvideo=video.idvideo
WHERE  `instrument_idinstrument` ='$in_names'
LIMIT 0 , 30";
$result6 = mysql_query($sql6);
	 
	 
	 
	?>
<div id="header">
		<div>
			<div id="logo">
				<a href="index.html"><img src="未命名.JPG" alt="Logo" width="209" height="82" /></a>			</div>
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
	
	
<body style="text-align:center">

	<div id="container">
		<div class="left">
		  <DIV class=s-t>
				<H3 class="STYLE3">Instrument</H3>
		  </DIV>
			<DIV class=s-c>
			  <DIV class=s-main> 
					<DIV class=pics>
						<P class="p1"><a href=""><a href=""></a>
					    <!--<img alt="www.mobanwang.com" id=dailyImage src="images/01-big.jpg">  --><img src="uploads/<?php echo $row['url'];?>" width="201%" height="295" id="imgshow"></P>
						<P class=tip id=dailyImageFrom>&nbsp;
						</P>
				  </DIV>
					
										<DIV class=s-detail STYLE2>
						<DIV class=cnt id=dailyContent> 
						 <table width="705" border="0">
  <tr>
    <td width="220" height="51"><span class="STYLE3">Product Name:</span></td>
    <td width="475"><span class="STYLE8"><?php echo $row['name'];?></span></td>
  </tr>
  <tr>
    <td height="52"><span class="STYLE3">Product Code(s):</span></td>
    <td><span class="STYLE8"><?php echo $row['product_code'];?></span></td>
  </tr>
  <tr>
    <td height="51"><span class="STYLE3">Variants:&nbsp;</span></td>
    <td><span class="STYLE8"><?php echo $row['variants'];?></span></td>
  </tr>
  <tr>
    <td height="53"><span class="STYLE3">Manufacturer：</span></td>
    <td><span class="STYLE8"><?php echo $row['manufactuer'];?></span></td>
  </tr>
  <tr>
    <td height="53"><span class="STYLE3">Description:</span></td>
    <td><span class="STYLE8"><?php echo $row['description'];?></span></td>
  </tr>
  <tr>
    <td height="54"><span class="STYLE3">Tags:</span></td>
    <td><span class="STYLE4">
      <?php while($row3 = mysql_fetch_assoc($result3)){ $tagg=$row3['tag_name']; ?>
      <a href="<?php echo "tag.php?new=".$tagg?>"> <?php echo $row3['tag_name']; ?></a> &nbsp; &nbsp;&nbsp;
      <?php } ?>
      &nbsp;</span></td>
  </tr>
  <tr>
    <td height="58"><span class="STYLE3">Related Videos:</span></td>
    <td><span class="STYLE8">
      <?php while($row6 = mysql_fetch_assoc($result6)){$video_names=$row6['idvideo']; ?>
      <a href="<?php echo "video.php?video_names=".$video_names?>"> <?php echo $row6['title']; ?></a> &nbsp; &nbsp;&nbsp;
      <?php } ?>
      &nbsp;</span></td>
  </tr>
  <tr>
    <td height="64"><span class="STYLE3">Uploaded by User:</span></td>
    <td><span class="STYLE8"><?php echo $row2['username'];?></span></td>
  </tr>
</table>
                         <p>&nbsp;</p>
						  <p><br>
						     <br> 
					        <br>
						    
                                                    </p>
						  <table width="718" border="1" bordercolor="#FFFFFF">
  <tr bordercolor="#FFFFFF">
    <td width="124" height="43"><span class="STYLE10">&nbsp;Title</span></td>
    <td width="315"><span class="STYLE10">&nbsp;Content</span></td>
    <td width="137"><span class="STYLE10">&nbsp;Author</span></td>
    <td width="114"><span class="STYLE8">&nbsp;<strong>Time</strong></span></td>
  </tr>
    <?php while($row4 = mysql_fetch_assoc($result4)){ ?>
	
  <tr>
    <td height="47"  border="1" bordercolor="#FFFFFF"><span class="STYLE8">&nbsp;<?php echo $row4['title'];?></span></td>
    <td><span class="STYLE8">&nbsp;<?php echo $row4['content'];?></span></td>
    <td><span class="STYLE8">&nbsp;<?php echo $row4['username'];?></span></td>
	<td><span class="STYLE8">&nbsp;<?php echo $row4['time'];?></span></td>
  </tr>
    <?php } ?>
</table>

		


						  
						 
				          <p>&nbsp;				          </p>
					        <p>&nbsp;</p>
					        <p>
					          <script language="javascript">function showimg(str){
	document.getElementById("imgshow").src=str;
}
                              </script>			  
					          
					          
					          
				                         </p>
					        <form action="make_comment.php" method="post">
<table>
					<tr>
					  <td width="100" height="46"><em>
					    <label for="name"><span class="STYLE1"><strong>Title:</strong></span><strong></label>
					  </em></td>
					  <td width="290"><input name="name" type="text" id="name" maxlength="30" /> </td>
						
					  <td width="237"><em>
				      <input type="hidden" name="id" value="<?php echo $my_id;?>">
				      &nbsp;</em></td>
					</tr>
					<tr>					</tr>
					<tr>
						<td height="121" class="message"><span class="STYLE8">
						  <label for="message"><strong>Comment:</strong></label>
					  </span></td>
						<td colspan="3"><em>
						  <textarea name="message" id="message" cols="70" rows="5"></textarea>
						  </em></td>
					</tr>
					<tr>
						<td height="54"><span class="STYLE8"><strong>Tag:</strong></span></td>
						<td colspan="2"><input name="subject" type="text" id="subject" maxlength="30" /></td>
					  <td width="86" colspan="1"><input type="submit" value="Submit"  /></td>
					</tr>
	  </table>
		</form>  
					      </p>
						</DIV>
					</DIV>
			  </DIV>
			</div>
		</div>
		<DIV class=right>
			<DIV class=slide-pic id=slidePic>
				<A class=gray id=prev hideFocus href="javascript:;">前移</A> 
				<DIV class=pic-container>
					<UL>
					  <LI class=cur>
					  <P><IMG src="uploads/<?php echo $row['url'];?>" width="1024" height="440" onClick="showimg('uploads/<?php echo $row['url'];?>');"></P>
					  
					  <LI class="">
					  <P><IMG src="uploads/<?php echo $row['url2'];?>" width="1024" height="493" onClick="showimg('uploads/<?php echo $row['url2'];?>');"></P>
					  
					  <LI class="">
					  <P><IMG src="uploads/137099000710828.png"  onclick="showimg('uploads/137099000710828.png');"></P>
					  
					  <LI class="">
					  <P><IMG src="uploads/137099000710828.png" ></P>
					  
					  
					  <LI class="">
					  <P><IMG src="uploads/137099000710828.png"></P>
					</UL>
				</DIV>
				 <A id=next hideFocus href="javascript:;">后移</A>
			</DIV>
			
			

		  
		  
			<SCRIPT type=text/javascript>
			
			jQuery(function(){
			if (!$('#slidePic')[0]) 
			return;
			var i = 0, p = $('#slidePic ul'), pList = $('#slidePic ul li'), len = pList.length;
			var elePrev = $('#prev'), eleNext = $('#next');
			//var firstClick = false;
			var w = 100, num = 3;
			p.css('width',w*len);
			if (len <= num) 
			eleNext.addClass('gray');
			function prev(){
			if (elePrev.hasClass('gray')) {
			//alert('已经是第一张了');
			return;
			}
			p.animate({
			marginTop:-(--i) * w
			},500);
			if (i < len - num) {
			eleNext.removeClass('gray');
			}
			if (i == 0) {
			elePrev.addClass('gray');
			}
			}
			function next(){
			if (eleNext.hasClass('gray')) {
			//alert('已经是最后一张了');
			return;
			}
			//p.css('margin-left',-(++i) * w);
			p.animate({
			marginTop:-(++i) * w
			},500);
			if (i != 0) {
			elePrev.removeClass('gray');
			}
			if (i == len - num) {
			eleNext.addClass('gray');
			}
			}
			elePrev.bind('click',prev);
			eleNext.bind('click',next);
			pList.each(function(n,v){
			$(this).click(function(){
			if(n-i == 2){
			next();
			}
			if(n-i == 0){
			prev()
			}
			$('#slidePic ul li.cur').removeClass('cur');
			$(this).addClass('cur');
			show(n);
			}).mouseover(function(){
			$(this).addClass('hover');
			}).mouseout(function(){
			$(this).removeClass('hover');
			})
			});
			function show(i){
			var ad = areaDailyList[i];
			var t = ad.date.split('-');
			$('#dailyTitle').html(ad.title);
			$('#dailyImage').attr('src',ad.image);
			$('#dailyImageFrom').html('' + ad.imageFrom + '');
			$('#dailyContent').html(ad.content);
			$('#dailyDate').html('<em class="ym">' + t[0] + '.' + t[1] + '</em><em class="day">' + t[2] + '</em>');
			var shareRRUrl = encodeURIComponent('http://www.nuomi.com/share365/'+ad.id);
			var shareUrl = encodeURIComponent('http://www.nuomi.com/#reading');
			var shareTitle = encodeURIComponent(ad.title + 'http://www.mobanwang.com');
			var shareContent = encodeURIComponent(ad.content.substring(0,100)+'...');
			
			}
			});
			</SCRIPT>
		</DIV>
	</div>
	

<p>&nbsp;</p>
<p><p>&nbsp;</p>
</p>
<p></p>
</body>
</html>