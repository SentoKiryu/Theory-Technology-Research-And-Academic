<?php 
include "../fun/connect.php";
include "../fun/verify.php";
$id=$_POST['idone'];
$sql="delete from a_user where id='$id'";
if($link->query($sql)){
	echo 1;
}else{
	echo 0;
}
