<?php
    session_start();
	//include "add_code.php";  
    #  接收登录页面提交过来的用户名以及密码

//<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	
	$email = trim($_POST['email']); // 用户名
	$password = trim($_POST['password']); // 密码
	//$key = "testkey";  
    //$password = md5($passwordd);
	//echo $password;
    //$password = passport_decrypt($passwordd,$key); 
	$imgcode  = strtolower($_POST['imgcode']); // 接收从登录页面输入框提交过来的验证码并转成小写
	$myimagecode = strtolower($_SESSION['thisimagcode']);  // 从sesion中取得验证码并转成小写
	//if($imgcode != $myimagecode){
		//echo  'Please enter the correct code';exit;
	//}
	 # 取得操作数据库的资格(与数据库建立连接)
	$link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');
	mysql_query('set  names  utf8');//设置编码	
	 # 选择数据库
    $re = mysql_select_db('website', $link);	 
	#  拿接收过来的用户名和密码去数据库查找，看是否存在此用户名以及其密码
	$sql = "select  *  from  user  where email='$email' and  password='$password'";
	$result = mysql_query($sql);
	$rows = mysql_fetch_assoc($result);
	if( $rows){
        
		$_SESSION['user_log']= $rows['iduser'];
		header("location:./backend/index.php");
	}
	else{
	      echo  'Fail To Login'; 
	}

?>
