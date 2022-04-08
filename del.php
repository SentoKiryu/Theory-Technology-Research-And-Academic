<?php 
include "fun/connect.php";
$id=$_POST['id'];
$sql="delete from a_achievement where id='$id'";
if($link->query($sql)){
	echo 1;
}else{
	echo 0;
}
