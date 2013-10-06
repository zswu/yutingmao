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
        $condition = $_POST['condition'];
	
	$sqll="
	 UPDATE video SET accept='$condition' WHERE idvideo='$id'";

       $result= mysql_query($sqll);  //执行sql
	 
	   ?>
</body>
</html>
