<?php
header("Content-type: text/html; charset=utf-8"); 
session_start();
if(!isset($_SESSION["Atc_Stu_Num"])){
die("<div style='text-align:center;margin-top:10%'><img src='img/error.jpg'><a href='index.php'>非法访问请登陆</a></div>");
}
?>