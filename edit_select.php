<?php 
include "fun/connect.php";
$type=$_POST['type'];
$sql="SELECT DISTINCT activity FROM a_activity where type='$type' and type!='其他'";
$data=$link->query($sql);
$select="<option value='0'>请选择活动类型</option>";
while($val=$data->fetch_array()){
		$select.="<option value='$val[activity]'>$val[activity]</option>";
}
echo $select;