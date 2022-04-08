<?php
include "../fun/connect.php";
include "../fun/verify.php";
$name=$_POST['name'];
$no=$_POST['no'];
$academy=$_POST['academy'];
$sex=$_POST['sex'];
$grade=$_POST['grade'];
$banji=$_POST['banji'];
$time=$_POST['time'];
$phone=$_POST['phone'];
$pass=substr($no,-6);
$date=time();
$sql="insert into a_user(name,no,password,academy,sex,grade,class,age,phone,addtime) values('$name','$no','$pass','$academy','$sex','$grade','$banji','$time','$phone','$date')";
$sql1="select no from a_user where no='$no'";
$val=$link->query($sql1);
if($val->fetch_row()){
	echo 1;
}else{
	if($link->query($sql)){
		echo 2;
	}else{
		echo 3;
	}
}