<?php 
include "../fun/connect.php";
include "../fun/verify.php";
$type=$_POST['inputType'];
$activity=$_POST['inputActivity'];
$time=$_POST['inputTime'];
$content=$_POST['editor'];
$date=time();
$sql="insert into a_activity(type,activity,time,content,addtime) values('$type','$activity','$time','$content','$date')";
if($link->query($sql)){
	echo 1;
}else{
	echo 0;
}