<?php
session_start();
include "fun/connect.php";
// header('Content-Type:application/json');
$name=$_SESSION["Atc_Stu_Num"];
$sql="select * from a_achievement where no='$name' and type!=''";
$data=$link -> query($sql);
//var_dump($count);
$opt=array();
////$img=array();
while ($val=$data->fetch_array()){
    $opt[$val['id']]['data']=date("m d",$val['addtime']);
    $opt[$val['id']]['imgSrc']=array($val['file_path']);
    $opt[$val['id']]['title']=$val['title'];
    $opt[$val['id']]['keyWords']=array($val['wintime']);
    $opt[$val['id']]['resume']=$val['activity'];
    $opt[$val['id']]['type']=$val['type'];
    $opt[$val['id']]['num']=$val['id'];
}
//var_dump($opt);
echo json_encode($opt);