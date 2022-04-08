<?php
include "../fun/connect.php";
include "../fun/verify.php";

$no=$_POST['no'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$academy=$_POST['academy'];
$grade=$_POST['grade'];
$classone=$_POST['classone'];
$phone=$_POST['phone'];
$sqlone="select no,name,sex,age,academy,grade,class,phone from a_user where no='$no'";
$sql="update a_user set name='$name',sex='$sex',age='$age',academy='$academy',grade='$grade',class='$classone',phone='$phone' where no='$no'";
$data=$link->query($sqlone);
$val=$data->fetch_assoc();
if($val['name']==$name && $val['sex']==$sex && $val['age']==$age && $val['academy']==$academy && $val['grade']==$grade && $val['class']==$classone && $val['phone']==$phone){
	echo 1;
}else{
	if($link->query($sql)){
	  echo 2;
    }else{
	  echo 3;
   }
}