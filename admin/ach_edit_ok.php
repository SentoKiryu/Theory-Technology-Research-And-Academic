<?php 
include "../fun/connect.php";
include "../fun/verify.php";
$id=$_POST['id'];
$inputTerm=$_POST['inputTerm'];
$inputType=$_POST['inputType'];
$inputTitle=$_POST['inputTitle'];
$inputActivity=$_POST['inputActivity'];
$editor=$_POST['editor'];
$sql="select term,type,title,activity,content from a_achievement where id='$id'";
$sqlone="update a_achievement set term='$inputTerm',type='$inputType',title='$inputTitle',activity='$inputActivity',content='$editor' where id='$id'";
$data=$link->query($sql);
$val=$data->fetch_array();
if($val['term']==$inputTerm && $val['type']==$inputType && $val['title']==$inputTitle && $val['activity']==$inputActivity && $val['content']==$editor){
	echo 1;
}else{
	if($link->query($sqlone)){
		echo 2;
	}else{
		echo 3;
	}
}