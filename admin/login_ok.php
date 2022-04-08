<?php
session_start();
include "../fun/connect.php";
$name1=$_POST["username"];
$name=htmlspecialchars($name1,ENT_QUOTES);
$pwd=$_POST["pwd"];
$sql="select username,password from a_admin where username='$name' and password='$pwd'";
$data=$link->query($sql);
if($data->fetch_all()){
	echo 1;
	$_SESSION["username"]=$name;
}else{
	echo 0;
}