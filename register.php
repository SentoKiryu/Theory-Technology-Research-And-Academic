<?php
include "fun/connect.php";
//$var=$_REQUEST;
//var_dump($var);
$num =  $_REQUEST['number'];
$email =  $_REQUEST['email'];
//$password =  $_REQUEST['password'];
$password=md5($_REQUEST['password']);
$time=time()+8*60*60;
$sql="insert into a_user(no,password,phone,addtime)values('$num','$password','$email','$time')";
if($link ->query($sql)){
    echo 1;
}else{
    echo 0;
}
