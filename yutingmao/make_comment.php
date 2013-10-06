<?php
session_start();
if(!$_SESSION['user_log']) header("location:../login.php");

$name = $_POST['name'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$id_video=$_POST['id'];
$id =$_SESSION['user_log'];

$showtime=date("Ymd");


mysql_connect('arlia.computing.dundee.ac.uk:3306','yuting','123456');
mysql_select_db('website');
mysql_query("set names utf8");

$sql="INSERT INTO `website`.`comment` (
`idcomment` ,
`title` ,
`content` ,
`tag` ,
`time` ,
`instrument_idinstrument` ,
`video_idvideo` ,
`3d_model_id3d_model`,
`user_idusers`
)
VALUES (
'' , '$name', '$message', '$subject', '$showtime','$id_in', '$id_video', '$id_model', '$id'
)";

mysql_query($sql);
echo "sucessful!"
?>