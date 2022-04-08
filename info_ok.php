<?php
session_start();
include "fun/connect.php";
$no=$_SESSION["Atc_Stu_Num"];
$name=$_POST['name'];
$sex=$_POST['sex'];
$time=$_POST['time'];
$academy=$_POST['academy'];
$grade=$_POST['grade'];
$BJ=$_POST['BJ'];
$phone=$_POST['phone'];
$sql="select name,sex,age,academy,grade,class,phone from a_user where no='$no'";
$sqlone="update a_user set name='$name',sex='$sex',age='$time',academy='$academy',grade='$grade',class='$BJ',phone='$phone' where no='$no'";
$val=$link->query($sql);
$data=$val->fetch_array();
if($data['name']==$name && $data['sex']==$sex && $data['age']==$time && $data['academy']==$academy && $data['grade']==$grade && $data['class']==$BJ && $data['phone']==$phone){
	echo 2;
}else{
	if($link->query($sqlone)){
		echo 1;
	}else{
		echo 3;
	}
}
