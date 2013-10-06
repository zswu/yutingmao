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
        
$id = $_POST['id'];
echo $id1 = $_POST['id1'];
echo $id2 = $_POST['id2'];
echo $id3 = $_POST['id3'];
       $title = $_POST['title']; // 商品名称
       $description = $_POST['description']; // 商品介绍
      
	   //tags
echo	   $tag1 = $_POST['tag1'];
echo	   $tag2 = $_POST['tag2'];
echo	   $tag3 = $_POST['tag3'];
	   
	   //stage
	   $s0_title = $_POST['stage_title0'];
	   $s0_start = $_POST['start0'];
	   $s0_end = $_POST['end0'];
	   $s0_de = $_POST['des0'];
	   
       $s1_title = $_POST['stage_title1'];
	   $s1_start = $_POST['start1'];
	   $s1_end = $_POST['end1'];
	   $s1_de = $_POST['des1'];
	   
	   	   $s2_title = $_POST['stage_title2'];
	   $s2_start = $_POST['start2'];
	   $s2_end = $_POST['end2'];
	   $s2_de = $_POST['des2'];
	   
	   	   $s3_title = $_POST['stage_title3'];
	   $s3_start = $_POST['start3'];
	   $s3_end = $_POST['end3'];
	   $s3_de = $_POST['des3'];
	   
	   	   $s4_title = $_POST['stage_title4'];
	   $s4_start = $_POST['start4'];
	   $s4_end = $_POST['end4'];
	   $s4_de = $_POST['des4'];
	   

	echo $s0_start;
	
	$sqll="
	 UPDATE video SET title='$title' , description='$description' WHERE idvideo='$id'";
	
	
		$sql000="
	 UPDATE stage SET stage_title='$s0_title' , stage_start_time='$s0_start',stage_end_time='$s0_end', stage_description='$s0_de' WHERE  idvideo='$id' AND stage_num=0";
	 	$sql111="
	 UPDATE stage SET stage_title='$s1_title' , stage_start_time='$s1_start',stage_end_time='$s1_end', stage_description='$s1_de' WHERE  idvideo='$id' AND stage_num=1";
	 	$sql222="
	 UPDATE stage SET stage_title='$s2_title' , stage_start_time='$s2_start',stage_end_time='$s2_end',stage_description='$s2_de' WHERE  idvideo='$id' AND stage_num=2";
	 	$sql333="
	 UPDATE stage SET stage_title='$s3_title' , stage_start_time='$s3_start',stage_end_time='$s3_end',stage_description='$s3_de' WHERE  idvideo='$id' AND stage_num=3";
	 	$sql444="
	 UPDATE stage SET stage_title='$s4_title' , stage_start_time='$s4_start',stage_end_time='$s4_end',stage_description='$s4_de' WHERE  idvideo='$id' AND stage_num=4";
	 
	 
	 	$sqlt0="
UPDATE all_have_tag SET tag_name='$tag1' WHERE idall_have_tag='$id1'";
	
	
		 	$sqlt1="
UPDATE all_have_tag SET tag_name='$tag2' WHERE idall_have_tag='$id2'";


	 	$sqlt2="
UPDATE all_have_tag SET tag_name='$tag3' WHERE idall_have_tag='$id3'";

  
   
       
       $result= mysql_query($sqll);  //执行sql
	    mysql_query($sql000); 
 mysql_query($sql111); 
  mysql_query($sql222); 
   mysql_query($sql333); 
    mysql_query($sql444); 
	 $result0= mysql_query($sqlt0); 
	  $result1= mysql_query($sqlt1); 
	   $result2= mysql_query($sqlt2); 
	   ?>
</body>
</html>
