<?php
include "fun/connect.php";
$type=$_POST['type'];
$activity=$_POST['activity'];
$input=$_POST['input'];
$time=$_POST['time'];
$wintime=$_POST['wintime'];
$title=$_POST['title'];
$content=$_POST['content'];
$id=$_POST['id'];
$date=time()+8*60*60;
$act="";
if($type=='其他'){
	$act=$input;
}else{
	$act=$activity;
}
$sql="update a_achievement set type='$type',activity='$act',wintime='$time',term='$wintime',title='$title',content='$content',addtime='$date' where id='$id'";
if($link->query($sql)){
	echo 1;
}else{
	echo 0;
}