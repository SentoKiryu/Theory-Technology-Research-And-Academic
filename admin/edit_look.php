<?php
include "../fun/connect.php";
include "../fun/verify.php";
$id=$_POST['id'];
$type=$_POST['inputType'];
$activity=$_POST['inputActivity'];
$time=$_POST['inputTime'];
$content=$_POST['editor'];
$date=time();
$sql="select type,activity,time,content from a_activity where id='$id'";
$sqlone="update a_activity set type='$type',activity='$activity',time='$time',content='$content',addtime='$date' where id='$id'";
$data=$link->query($sql);
$val=$data->fetch_array();
if($val['type']==$type && $val['activity']==$activity && $val['time']==$time && $val['content']==$content){
	echo 1;
}else{
	if($link->query($sqlone)){
		echo 2;
	}else{
		echo 3;
	}
}
