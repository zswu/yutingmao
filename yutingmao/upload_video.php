<?php
session_start();
if(!$_SESSION['user_log']) header("location:../login.php");	
$id_user=$_SESSION['user_log'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
   
   
   <? 
  
   
   $goods_url_file = time().mt_rand(100,999999);
      $file=$goods_url_file.".vtt";

if(!file_exists($file)) 
{ 
$handle=fopen($file,"a");

$str="WEBVTT

$s0_start_1:$s0_start_2:$s0_start_3.000 --> $s0_end_1:$s0_end_2:$s0_end_3.000 align:end line:5% position:100%
Stage 0
Title:$s0_title
Description:$s0_de

$s1_start_1:$s1_start_2:$s1_start_3.000 --> $s1_end_1:$s1_end_2:$s1_end_3.000 align:end line:5% position:100%
Stage 1
Title:$s1_title
Description:$s1_de

$s2_start_1:$s2_start_2:$s2_start_3.000 --> $s2_end_1:$s2_end_2:$s2_end_3.000 align:end line:5% position:100%
Stage 2
Title:$s2_title
Description:$s2_de

$s3_start_1:$s3_start_2:$s3_start_3.000 --> $s3_end_1:$s3_end_2:$s3_end_3.000 align:end line:5% position:100%
Stage 3
Title:$s3_title
Description:$s3_de

$s4_start_1:$s4_start_2:$s4_start_3.000 --> $s4_end_1:$s4_end_2:$s4_end_3.000 align:end line:5% position:100%
Stage 4
Title:$s4_title
Description:$s4_de
";


fwrite($handle,$str);
fclose($handle);
} 
   
 $s0_start=$s0_start_3+$s0_start_2*60+$s0_start_1*60*60; 
  $s1_start=$s1_start_3+$s1_start_2*60+$s1_start_1*60*60; 
  $s2_start=$s2_start_3+$s2_start_2*60+$s2_start_1*60*60; 
  $s3_start=$s3_start_3+$s3_start_2*60+$s3_start_1*60*60; 
  
  
  $s0_end=$s0_end_3+$s0_end_2*60+$s0_end_1*60*60;  
  $s1_end=$s1_end_3+$s1_end_2*60+$s1_end_1*60*60; 
  $s2_end=$s2_end_3+$s2_end_2*60+$s2_end_1*60*60; 
  $s3_end=$s3_end_3+$s3_end_2*60+$s3_end_1*60*60; 
   
   $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');
          
            mysql_query('set  names  utf8');//设置编码        
             # 选择数据库
        $re = mysql_select_db('website', $link);         
        

       #  将上传到服务端的临时文件移动到指定位置
      
       //print_r($_POST);
       
       //print_r($_FILES);
       $arr = explode('.',$_FILES['uploadfile']['name']);  //分割文件名
       $file_extend = end($arr);  //取数组中的最后一个值
       $goods_url = time().mt_rand(100,999999).'.'.$file_extend;
       move_uploaded_file($_FILES['uploadfile']['tmp_name'],'uploads/'.$goods_url);  //../表示上一级目录
       
       $goods_title = $_POST['goods_title']; // 商品名称
       $goods_introduce = $_POST['goods_introduce']; // 商品介绍
       $times = time(); // 当前时间
	   //tags
	   $tag1 = $_POST['tag1'];
	   $tag2 = $_POST['tag2'];
	   $tag3 = $_POST['tag3'];
	   
	   $in_name2 = $_POST['in_name2'];
	   $in_name1 = $_POST['in_name1'];
	   $in_name3 = $_POST['in_name3'];
	   
	   //stage
	   $s0_title = $_POST['s0_title'];	  
	   $s0_de = $_POST['s0_de'];
	   
       $s1_title = $_POST['s1_title'];
	   $s1_de = $_POST['s1_de'];
	   
	   	   $s2_title = $_POST['s2_title'];
	   $s2_de = $_POST['s2_de'];
	   
	   	   $s3_title = $_POST['s3_title'];
	   $s3_de = $_POST['s3_de'];
	   
	   	   $s4_title = $_POST['s4_title'];
	   $s4_de = $_POST['s4_de'];
	   
     echo $goods_url;
	   
       $sql = "
	   INSERT INTO  `website`.`video` (
`idvideo` ,
`title` ,
`type` ,
`url` ,
`time` ,
`user_iduser` ,
`description` ,
`vtt` 
)
VALUES (
'' ,  '$goods_title',  '1',  '$goods_url',  '$times', '$id_user' ,  '$goods_introduce',  '$file'
)";
 // 将商品相关信息写入商品表的sql
       
       mysql_query($sql);  //执行sql
	   
//get id number
$sql="SELECT LAST_INSERT_ID()";
$result_id=mysql_query($sql);
$row_id=mysql_fetch_row($result_id);
echo $row_id[0];	   
	   

$sql2= " 
INSERT INTO  `website`.`stage` (
`idstage` ,
`stage_num` ,
`stage_title` ,
`stage_description` ,
`stage_start_time` ,
`stage_end_time` ,
`idvideo`
)
VALUES (
'' ,  '0', '$s0_title' ,  '$s0_de', '$s0_start' , '$s0_end' ,  '$row_id[0]'
), (
'' ,  '1', '$s1_title' ,  '$s1_de', '$s1_start' , '$s1_end' ,  '$row_id[0]'
), (
'' ,  '2', '$s2_title' ,  '$s2_de', '$s2_start' , '$s2_end' ,  '$row_id[0]'
), (
'' ,  '3', '$s3_title' ,  '$s3_de', '$s3_start' , '$s3_end' ,  '$row_id[0]'
), (
'' ,  '4', '$s4_title' ,  '$s4_de', '$s4_start' , '$s4_end' ,  '$row_id[0]'
)";

mysql_query($sql2);



$sql4=" 
INSERT INTO  `website`.`all_have_tag` (
`idall_have_tag` ,
`video_idvideo` ,
`instrument_idinstrument` ,
`3d_model_id3d_model` ,
`tag_name`
)
VALUES (
'' , '$row_id[0]',  '-1',  '-1','$tag1'
)"; 
mysql_query($sql4);



/////////////////////di 2 ci 

$sql4=" 
INSERT INTO  `website`.`all_have_tag` (
`idall_have_tag` ,
`video_idvideo` ,
`instrument_idinstrument` ,
`3d_model_id3d_model` ,
`tag_name`
)
VALUES (
'' , '$row_id[0]',  '-1',  '-1',  '$tag2'
)"; 
mysql_query($sql4);


///////////////////di 3 ci

$sql4=" 
INSERT INTO  `website`.`all_have_tag` (
`idall_have_tag` ,
`video_idvideo` ,
`instrument_idinstrument` ,
`3d_model_id3d_model` ,
`tag_name`
)
VALUES (
'' , '$row_id[0]',  '-1',  '-1', '$tag3'
)"; 
mysql_query($sql4);



///////////////////////////////////

 $sql2 = "    SELECT *
FROM `instrument`
WHERE `name` = '$in_name1'
LIMIT 0 , 30 ";
    $result2 = mysql_query($sql2);
		$row2 = mysql_fetch_assoc($result2);
$rows= $row2['idinstrument'];		
		
 $sql3 = "   INSERT INTO `website`.`instrument_has_video` (
`instrument_idinstrument` ,
`video_idvideo`
)
VALUES (
'$rows',' $row_id[0]'
)";
 mysql_query($sql3); 

  
  
  ///////////////////////////////////

 $sql2 = "    SELECT *
FROM `instrument`
WHERE `name` = '$in_name2'
LIMIT 0 , 30 ";
    $result2 = mysql_query($sql2);
		$row2 = mysql_fetch_assoc($result2);
$rows= $row2['idinstrument'];		
		
 $sql3 = "   INSERT INTO `website`.`instrument_has_video` (
`instrument_idinstrument` ,
`video_idvideo`
)
VALUES (
'$rows',' $row_id[0]'
)";
 mysql_query($sql3); 

///////////////////////////////////

 $sql2 = "    SELECT *
FROM `instrument`
WHERE `name` = '$in_name3'
LIMIT 0 , 30 ";
    $result2 = mysql_query($sql2);
		$row2 = mysql_fetch_assoc($result2);
$rows= $row2['idinstrument'];		
		
 $sql3 = "   INSERT INTO `website`.`instrument_has_video` (
`instrument_idinstrument` ,
`video_idvideo`
)
VALUES (
'$rows',' $row_id[0]'
)";
 mysql_query($sql3); 
 


	   ?>
</body>
</html>
