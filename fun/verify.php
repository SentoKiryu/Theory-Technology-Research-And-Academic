<?php
header("Content-type: text/html; charset=utf-8"); 
session_start();
if(!isset($_SESSION["username"])){
die("<div style='text-align:center;margin-top:10%'><img src='../img/error.jpg'><a href='login.php'>非法访问请登陆</a></div>");
}
?>