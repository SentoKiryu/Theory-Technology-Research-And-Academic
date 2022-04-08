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
$atc="";
if($type=='其他'){
	$atc=$input;
}else{
	$atc=$activity;
}
$sql="update a_achievement set type='$type',activity='$atc',wintime='$time',term='$wintime',title='$title',content='$content' where id='$id'";
if($link->query($sql)){
	echo 1;
}else{
	echo 0;
}