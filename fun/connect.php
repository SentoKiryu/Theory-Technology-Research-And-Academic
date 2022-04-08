<?php
$dbname='atc';
$user='root';
$paw='rjyfzxphp';
$host='localhost';
$link=new mysqli($host,$user,$paw,$dbname);
mysqli_query($link,"SET NAMES UTF8");
if($link->connect_error){
    die("数据库连接错误：".$link->connect_error);
}