<?php
session_start();
unset($_SESSION["Atc_Stu_Num"]);
if(!isset($_SESSION["Atc_Stu_Num"])){
	echo 1;
}