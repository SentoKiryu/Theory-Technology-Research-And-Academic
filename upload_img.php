<?php
session_start();
include "fun/connect.php";
$name=$_SESSION["Atc_Stu_Num"];
$time=time();
$upload='upload/';//文件路径
$images_name = '';
$img_name = time();
$file_name=date('Y-m-d',time());
!is_dir($upload.$file_name)?mkdir($upload.$file_name):null;//创建时间格式文件夹
foreach($_FILES['file']['tmp_name'] as $k => $v)
{
	$load=$upload.$file_name."/".$name.$img_name.$k.'.jpg';
    move_uploaded_file($v,$load);
    $images_name=$name.$img_name.$k.'.jpg';
	$sql="insert into a_achievement(no,file_path,file_name)values('$name','$load','$images_name')";
	if($k==0){
		if($link->query($sql)){
			$GLOBALS['id']=$link->insert_id;//插入数据后返回插入行的id
			$sqlone="insert into a_picture(a_id,file_path,file_name)values('$id','$load','$images_name')";
			$link->query($sqlone);
		}
	}else{
		$sqltwo="insert into a_picture(a_id,file_path,file_name)values('$id','$load','$images_name')";
		$link->query($sqltwo);
	}
}
echo $id;