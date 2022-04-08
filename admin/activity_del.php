<?php
include "../fun/connect.php";
include "../fun/verify.php";
$id=$_POST['id'];
$sql="delete from a_activity where id='$id'";
if($link->query($sql)){
	echo 1;
}else{
	echo 0;
}