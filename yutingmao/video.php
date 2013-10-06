<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8" />
<title>Video</title>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
</script>

<script>



/* myVid=document.getElementById("myvideo");
function getCurTime()
  { 
  alert(myVid.currentTime);
  } 
function setCurTime()
  { 
  myVid.currentTime=5;
  } 
 */
$(document).ready(function(){  
    var video = $('#myvideo');
   // video[0].currentTime="seconds";
   
    $("#play").click(function(){  video[0].play();  });
    $("#pause").click(function(){ video[0].pause(); });
	$("#show").click(function(){  alert(video[0].currentTime);  });
    $("#go10").click(function(){  video[0].currentTime+=10;  });
    $("#back10").click(function(){  video[0].currentTime-=10;  });
	$("#time").click(function(){  video[0].currentTime=10;  });
	$("#jump0").click(function(){  video[0].currentTime=start_time0;  });
	$("#jump1").click(function(){  video[0].currentTime=start_time1;   });
	$("#jump2").click(function(){  video[0].currentTime=start_time2;   });
	$("#jump3").click(function(){  video[0].currentTime=start_time3;   });
	$("#jump4").click(function(){  video[0].currentTime=start_time4;   });
    $("#rate1").click(function(){  video[0].playbackRate+=2;  });
    $("#rate0").click(function(){  video[0].playbackRate-=2;  });
    $("#volume1").click(function(){  video[0].volume+=0.1;  });
    $("#volume0").click(function(){  video[0].volume-=0.1;  });
    $("#muted1").click(function(){  video[0].muted=!video[0].muted;  });
    $("#muted0").click(function(){  video[0].muted=false;  });
	$("#full").click(function(){ 
      video[0].webkitEnterFullscreen(); // webkit类型的浏览器
      video[0].mozRequestFullScreen();  // FireFox浏览器
	  
 });
 
});
  
</script>



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
<script type="text/javascript">
function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}
</script>
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
	    <p><a href="video_youtube.php">youtube</a></p>
	    <p>
	      <?php
    # 取得操作数据库的资格(与数据库建立连接)
    $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');

    mysql_query('set names utf8');//设置编码
    # 选择数据库
    $re = mysql_select_db('website', $link);


$video_names=$_GET['video_names'];

    # 取数据
    # 编写sql语句
    $sql = "SELECT *
        FROM `video` 
		WHERE idvideo='$video_names'
        LIMIT 0 , 30";
    $result = mysql_query($sql);
	
	 $sql2 = "SELECT *
        FROM `video` 
		WHERE idvideo='$video_names'
        LIMIT 0 , 30";
    $result2 = mysql_query($sql2);
	$row2 = mysql_fetch_assoc($result2);
	$my_id= $row2['idvideo'];
	
	$sql3= "SELECT *  
	FROM `all_have_tag` 
	WHERE `video_idvideo` = '$my_id' 
	LIMIT 0 , 30";
	 $result3 = mysql_query($sql3);
	
	$sql4= "SELECT * 
FROM  `stage` 
WHERE  `idvideo` ='$my_id'
LIMIT 0 , 30";
$result4 = mysql_query($sql4);


	$sql5= "SELECT * 
FROM  `stage` 
WHERE   `idvideo` ='$my_id'
LIMIT 0 , 30";
$result5 = mysql_query($sql5);




$sql6="SELECT * 
FROM  `instrument_has_video` INNER JOIN `instrument` ON instrument_has_video.instrument_idinstrument=instrument.idinstrument
WHERE  `video_idvideo` ='$my_id'
LIMIT 0 , 30";
$result6 = mysql_query($sql6);


$sql7="SELECT * 
FROM  `comment` INNER JOIN `user` ON comment.user_idusers=user.iduser
WHERE  `video_idvideo` ='$my_id'
LIMIT 0 , 30";
$result7 = mysql_query($sql7);

    ?>

	      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		  <?php while($row = mysql_fetch_assoc($result)){ ?>	
	<video id="myvideo" width="600" align="center" controls="controls" >
  <source src="uploads/<?php echo $row['url'];?>" type="video/ogg" />
  <source src="uploads/<?php echo $row['url'];?>" type="video/mp4" />
  <source src="uploads/<?php echo $row['url'];?>" type="video/webm" />
  <track label="English subtitles" kind="subtitles" srclang="en"
         src="<?php echo $row['vtt'];?>" default>
	</video>
	   <?php } ?>
<br>	   

<hr> 
	<button id="play">Play</button>
<button id="pause">Pause</button>
<button id="show">show time</button>
<button id="go10">Forward 10s</button>
<button id="back10">Backward 10s</button>
<button id="rate1">Speed+</button>
<button id="rate0">Speed-</button>
<button id="volume1">Volume+</button>
<button id="volume0">Volume-</button>
<button id="muted1">Silence On/Off</button>
<button id="full">Full Screen</button>  
	  <hr>
      <p>
      

	
	<video id="myvideo2" width="320" height="240" controls="controls" >
  <source src="1.mp4" type="video/mp4" />
  <source src="1.webm" type="video/webm" />
   <source src="1.m4v" type="video/m4v" />
	</video>
<br>

      <br>
      <strong>Tags:</strong>
        <?php while($row3 = mysql_fetch_assoc($result3)){ $tagg=$row3['tag_name']; ?>
           <a href="<?php echo "tag.php?new=".$tagg?>">  
           <?php echo $row3['tag_name']; ?></a> &nbsp; &nbsp;&nbsp;
        <?php } ?>
        <p><strong>Related Instruments:</strong>  
		  <?php while($row6 = mysql_fetch_assoc($result6)){$in_names=$row6['idinstrument']; ?>	
		    <a href="<?php echo "instrument.php?in_names=".$in_names?>">  
          <?php echo $row6['name']; ?></a> &nbsp; &nbsp;&nbsp;
		 <?php } ?>
		<br>
          <br>
          <strong>Stages: </strong><br>
          <?php while(($row4 = mysql_fetch_assoc($result4))&&($row4['stage_end_time'])){ ?>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
<button id="jump<?php echo $row4['stage_num']; ?>">Jump To Stage<?php echo $row4['stage_num']; ?></button>
   <em>            &nbsp;&nbsp;&nbsp;&nbsp;Stage <?php echo $row4['stage_num']; ?> &nbsp; &nbsp; 
      <?php echo $row4['stage_title'];  echo $row4['stage_start_time'];?> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
      <?php echo $row4['stage_description'];?> 
      <script> var start_time<?php echo $row4['stage_num']; ?>=<?php echo  $row4['stage_start_time'] ?>; </script>
&nbsp;&nbsp;
     <br> 
  
     <?php } ?>
      </em>
        <p>
  <script>
myVid=document.getElementById("myvideo");
my_time=0;
var my_time2=0;
<?php while(($row5 = mysql_fetch_assoc($result5))&&($row5['stage_end_time'])){ ?>
  var kaishi<?php echo $row5['stage_num']; ?>=<?php echo $row5['stage_start_time']; ?>;
  var jieshu<?php echo $row5['stage_num']; ?>=<?php echo $row5['stage_end_time']; ?>;
   var des<?php echo $row5['stage_num']; ?>="<?php echo $row5['stage_description']; ?>";
     <?php } ?>
	 //document.getElementById("demo1").innerHTML=des1;
	 
function getCurTime()
  { 
  document.getElementById("demo").innerHTML=myVid.currentTime;
   my_time=myVid.currentTime; 
 
if((kaishi0<my_time)&&(jieshu0>my_time)) 
  document.getElementById("demo1").innerHTML=des0;
  
  if((kaishi1<my_time)&&(jieshu1>my_time)) 
  document.getElementById("demo1").innerHTML=des1;
  
  if((kaishi2<my_time)&&(jieshu2>my_time)) 
  document.getElementById("demo1").innerHTML=des2;
  
  if((kaishi3<my_time)&&(jieshu3>my_time)) 
  document.getElementById("demo1").innerHTML=des3;
  
  if((kaishi4<my_time)&&(jieshu4>my_time)) 
  document.getElementById("demo1").innerHTML=des4;
 }
setInterval("getCurTime()",500);



</script><hr>
Current Time:<p id="demo"></p>
Current Stage: <p id="demo1"></p>
<hr>





<form action="" ><table width="822" border="1" bordercolor="#999999">
  <tr>
    <td width="170">&nbsp;Title</td>
    <td width="446">&nbsp;Content</td>
    <td width="93">&nbsp;Author</td>
    <td width="93">&nbsp;Time</td>
  </tr>
    <?php while($row7 = mysql_fetch_assoc($result7)){ ?>	
  <tr>
    <td>&nbsp;<?php echo $row7['title'];?></td>
    <td>&nbsp;<?php echo $row7['content'];?></td>
    <td>&nbsp;<?php echo $row7['username'];?></td>
	<td>&nbsp;<?php echo $row7['time'];?></td>
  </tr>
    <?php } ?>
</table>

		
</form>


<br>
<br>
<br>




<form action="make_comment.php" method="post">
<table>
					<tr>
						<td width="69"><label for="name"><strong>Title:</strong><strong></label></td>
						<td width="297"><input type="text" maxlength="30" id="name" name="name" /> </td>
						
						<td width="287"><input type="hidden" name="id" value="<?php echo $my_id;?>">&nbsp;</td>
					</tr>
					<tr>					</tr>
					<tr>
						<td class="message"><label for="message"><strong>Comment:</strong></label></td>
						<td colspan="3"><textarea name="message" id="message" cols="10" rows="30"></textarea></td>
					</tr>
					<tr>
						<td><strong>Tag:</strong></td>
						<td colspan="2"><input name="subject" type="text" id="subject" maxlength="30" /></td>
						<td colspan="1"><input type="submit" value="" id="send" /></td>
					</tr>
	  </table>
		</form>



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