<?php
session_start();
if(!$_SESSION['user_log']) header("location:../login.php");	
$id_user=$_SESSION['user_log'];

	
    $link = mysql_connect('arlia.computing.dundee.ac.uk:3306', 'yuting', '123456');

    mysql_query('set names utf8');//设置编码
    # 选择数据库
    $re = mysql_select_db('website', $link);

$sql=" SELECT *
FROM `user`
WHERE `iduser` ='$id_user'
LIMIT 0 , 30  ";
 $result = mysql_query($sql);
 $row = mysql_fetch_assoc($result);

 
$oldpassword0 = $row['password'];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$newpassword0 = $_POST['newpassword0'];

if($newpassword!=$newpassword0)
{echo "The two passwords did not match!";exit;
}

if($oldpassword!=$oldpassword0)
{echo "The old password is incorrect!";exit;
}

$sql2=" UPDATE user SET password='$newpassword' WHERE iduser='$id_user'";
 $result2 = mysql_query($sql2);
echo "Succeed!"

?>