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
   
   <? $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');
          
            mysql_query('set  names  utf8');//设置编码        
             # 选择数据库
        $re = mysql_select_db('website', $link);         
        

       #  将上传到服务端的临时文件移动到指定位置
      
       //print_r($_POST);
       
       //print_r($_FILES);
       $arr = explode('.',$_FILES['uploadfile1']['name']);  //分割文件名
       $file_extend = end($arr);  //取数组中的最后一个值
       $goods_url = time().mt_rand(100,999999).'.'.$file_extend;
       move_uploaded_file($_FILES['uploadfile1']['tmp_name'],'../project/uploads/'.$goods_url);  //../表示上一级目录
	   
	     $arr2 = explode('.',$_FILES['uploadfile2']['name']);  //分割文件名
       $file_extend2 = end($arr2);  //取数组中的最后一个值
       $goods_url2 = time().mt_rand(100,999999).'.'.$file_extend2;
       move_uploaded_file($_FILES['uploadfile2']['tmp_name'],'../project/uploads/'.$goods_url2);  //../表示上一级目录
	   
	        $arr3= explode('.',$_FILES['uploadfile3']['name']);  //分割文件名
       $file_extend3 = end($arr3);  //取数组中的最后一个值
       $goods_url3= time().mt_rand(100,999999).'.'.$file_extend3;
       move_uploaded_file($_FILES['uploadfile3']['tmp_name'],'../project/uploads/'.$goods_url3);  //../表示上一级目录
	   
	       
       
       $goods_title = $_POST['goods_title']; // 商品名称
       $goods_introduce = $_POST['goods_introduce']; // 商品介绍
	   
	   $variants = $_POST['variants'];
	   $code = $_POST['code'];
	   $manufacturer = $_POST['manufacturer'];
	 $video_name2 = $_POST['video_name2'];
	   $video_name1 = $_POST['video_name1'];
		$video_name3 = $_POST['video_name3'];
	   $tag1 = $_POST['tag1'];
	    $tag2= $_POST['tag2'];
		 $tag3 = $_POST['tag3'];
	   
	   
       $times = time(); // 当前时间
     
	   
       $sql = "
	  INSERT INTO `website`.`instrument` (
`idinstrument` ,
`name` ,
`manufactuer` ,
`description` ,
`url` ,
`url2` ,
`url3` ,
`user_iduser` ,
`product_code` ,
`variants` 
)
VALUES (
'', '$goods_title', '$manufacturer', '$goods_introduce','$goods_url', '$goods_url2', '$goods_url3', '$id_user','$code', '$variants'
)"; // 将商品相关信息写入商品表的sql
       
       mysql_query($sql);  //执行sql
	   
$sql="SELECT LAST_INSERT_ID()";
$result_id=mysql_query($sql);
$row_id=mysql_fetch_row($result_id);
//echo $row_id[0];		   
	   
	   
	 $sql2 = "    SELECT *
FROM `video`
WHERE `title` = '$video_name1'
LIMIT 0 , 30 ";
    $result2 = mysql_query($sql2);
		$row2 = mysql_fetch_assoc($result2);
$rows= $row2['idvideo'];		
		
 $sql3 = "   INSERT INTO `website`.`instrument_has_video` (
`instrument_idinstrument` ,
`video_idvideo`
)
VALUES (
' $row_id[0]', '$rows'
)";
 mysql_query($sql3); 

  
  
   $sql2 = "    SELECT *
FROM `video`
WHERE `title` ='$video_name2'
LIMIT 0 , 30 ";
    $result2 = mysql_query($sql2);
		$row2 = mysql_fetch_assoc($result2);
$rows=$row2['idvideo'];		
		 
    $sql3 = "   INSERT INTO `website`.`instrument_has_video` (
`instrument_idinstrument` ,
`video_idvideo`
)
VALUES (
' $row_id[0]', '$rows'
)";
 mysql_query($sql3); 
 
 
 
  $sql2 = "    SELECT *
FROM `video`
WHERE `title` LIKE '$video_name3'
LIMIT 0 , 30 ";
    $result2 = mysql_query($sql2);
		$row2 = mysql_fetch_assoc($result2);
$rows= $row2['idvideo'];	
		
  $sql3 = "   INSERT INTO `website`.`instrument_has_video` (
`instrument_idinstrument` ,
`video_idvideo`
)
VALUES (
' $row_id[0]', '$rows'
)";
 mysql_query($sql3); 
 
 
   
   $sql4=" 
INSERT INTO  `website`.`all_have_tag` (
`idall_have_tag` ,
`video_idvideo` ,
`instrument_idinstrument` ,
`3d_model_id3d_model` ,
`tag_name`
)
VALUES (
'' , '',  '$row_id[0]',  '','$tag1'
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
'' , '',  '$row_id[0]',  '','$tag2'
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
'' , '',  '$row_id[0]',  '','$tag3'
)"; 
mysql_query($sql4);
   	
	   ?>
</body>
</html>
