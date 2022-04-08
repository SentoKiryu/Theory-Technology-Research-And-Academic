<?php 
include "../fun/connect.php";
include "../fun/verify.php";
$id=$_POST['id'];
$sql="select * from a_user where id='$id'";
$data=$link ->query($sql);
$val=$data->fetch_assoc();
	echo "<label for=\"recipient-name\" class=\"control-label\">学号:</label><input type=\"text\" class=\"form-control\" id=\"recipient-name1\" value=\"" .$val["no"].  "\"disabled>
	<label for=\"recipient-name\" class=\"control-label\">姓名:</label><input type=\"text\" class=\"form-control\" id=\"recipient-name2\" name=\"aaa\" value=\"" .$val["name"].  "\"   >
	<label for=\"recipient-name\" class=\"control-label\">性别:</label><input type=\"text\" class=\"form-control\" id=\"recipient-name3\" value=\"" .$val["sex"].  "\"   > 
	<label for=\"recipient-name\" class=\"control-label\">年龄:</label><input type=\"text\" class=\"form-control\" id=\"recipient-name4\" value=\"" .$val["age"].  "\"   >
	<label for=\"recipient-name\" class=\"control-label\">学院:</label><input type=\"text\" class=\"form-control\" id=\"recipient-name5\" value=\"" .$val["academy"].  "\" >
	<label for=\"recipient-name\" class=\"control-label\">年级:</label><input type=\"text\" class=\"form-control\" id=\"recipient-name6\" value=\"" .$val["grade"].  "\"   >
	<label for=\"recipient-name\" class=\"control-label\">班级:</label><input type=\"text\" class=\"form-control\" id=\"recipient-name7\" value=\"" .$val["class"].  "\"   >
	<label for=\"recipient-name\" class=\"control-label\">联系方式:</label><input type=\"text\" class=\"form-control\" id=\"recipient-name8\" value=\"" .$val["phone"].  "\"   >";
