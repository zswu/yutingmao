<?php
//include "add_code.php";  
//print_r($_POST);

echo $username = $_POST['username'];
echo $email = $_POST['email'];
$password = $_POST['password'];
$confirmpass = $_POST['confirmpass'];
$realname= $_POST['realname'];
$occupation= $_POST['occupation'];
$phone= $_POST['phone'];
$address= $_POST['address'];
$country= $_POST['country'];
$city= $_POST['city'];
$terms= $_POST['terms'];

//$key = "testkey";  
//$encrypt = passport_encrypt($password,$key); 
//$decrypt = passport_decrypt($encrypt,$key); 
//echo $encrypt;
//echo $decrypt;

//$encrypt= md5($password);
if($username==NULL||$email==NULL||$password==NULL)
{echo"All the fields that followed by a asterisk are required!";
exit;
}

if($password!=$confirmpass)
{echo"The two passwords did not match!";
exit;
}
if($terms!='on')
{echo"Please tick the Terms and Conditions box";
exit;
}

 $link = mysql_connect('arlia.computing.dundee.ac.uk', 'yuting', '123456');

    mysql_query('set names utf8');//设置编码
    # 选择数据库
    $re = mysql_select_db('website', $link);



$sql="INSERT INTO  `website`.`user` (
`username` ,
`email` ,
`password` ,
`realname` ,
`occupation` ,
`phone` ,
`address` ,
`city` ,
`country`
)VALUES ('$username', '$email', '$password','$realname' , '$occupation' , '$phone' , '$address' , '$city' , '$country'
)";

$result=mysql_query($sql);
//header("location: ./login.php");
?>