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

 
$username = $_POST['username'];
$email = $_POST['email'];
$realname= $_POST['realname'];
$occupation= $_POST['occupation'];
$phone= $_POST['phone'];
$address= $_POST['address'];
$country= $_POST['country'];
$city= $_POST['city'];
$password = $row['password'];


if ($username==NULL)
$username=$row['username'];
if ($email==NULL)
$email=$row['email'];
if ($realname==NULL)
$realname=$row['realname'];
if ($occupation==NULL)
$occupation=$row['occupation'];
if ($phone==NULL)
$phone=$row['phone'];
if ($address==NULL)
$address=$row['address'];
if ($country==NULL)
$country=$row['country'];
if ($city==NULL)
$city=$row['city'];

$sql2=" DELETE FROM `user` WHERE `user`.`iduser` ='$id_user' LIMIT 1";
 $result2 = mysql_query($sql2);

$sql0="INSERT INTO `website`.`user` (
`iduser` ,
`username` ,
`email` ,
`password` ,
`realname` ,
`occupation` ,
`phone` ,
`address` ,
`city` ,
`country`
)
VALUES (
'$id_user' , '$username', '$email', '$password','$realname' , '$occupation' , '$phone' , '$address' , '$city' , '$country'
)";

	 $result0 = mysql_query($sql0);
	 echo "Succeed!";
//`email` = `$email`, `password`= `$password`,`realname`=`$realname`,`occupation`=`$occupation`, `phone`= `$phone`,`address` =`$address` ,`city`=`$city`, `country`= `$country`
?>