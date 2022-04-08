<?php 
include "../fun/connect.php";
include "../fun/verify.php";
$id=$_POST['id'];
$sql0="delete from a_achievement where id='$id'";
if($link->query($sql0)){
	echo 1;
}else{
	echo 2;
}