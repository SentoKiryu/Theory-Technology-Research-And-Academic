<?php
session_start();
include "fun/connect.php";
$num=$_REQUEST['number'];
$paw=$_REQUEST['password'];
//$paw= md5($_REQUEST['password']);
$identify=$_REQUEST['identify'];
$verify=$_SESSION['authnum_session'];
$sql="select * from a_user where no='$num' and password='$paw'";
$data=$link -> query($sql);
$val=$data ->fetch_assoc();
if($identify==$verify){
	if($val){
		$_SESSION["Atc_Stu_Num"]=$num;
		echo 2;
	}else{
		echo 0;
	}
}else{
	echo 1;
}