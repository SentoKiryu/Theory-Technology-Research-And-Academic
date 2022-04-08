<?php session_start();?>
<?php
include"fun/connect.php";
$name=$_SESSION["Atc_Stu_Num"];
$id=intval(trim($_GET['id']));
$sql="select * from a_achievement where a_achievement.id='$id' and a_achievement.no='$name'";
$data=$link->query($sql);
$val=$data->fetch_array();
//图片
$sqlone="select a_picture.file_path from a_picture,a_achievement where a_achievement.id='$id' and a_achievement.id=a_picture.a_id and a_achievement.no='$name'";
$dataone=$link->query($sqlone);
require_once('TCPDF/tcpdf.php');   
//实例化   
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);   
   
// 设置文档信息   
$pdf->SetCreator('ATC平台');
$pdf->SetAuthor('理学院');
$pdf->SetTitle('个人成就信息下载');
$pdf->SetSubject('TCPDF Tutorial');   
$pdf->SetKeywords('TCPDF, PDF, PHP');   
   
// 设置页眉和页脚信息   
$pdf->SetHeaderData( '',58, '', '东北电力大学理学院',
      array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
   
// 设置页眉和页脚字体   
$pdf->setHeaderFont(Array('stsongstdlight', '', '10'));
$pdf->setFooterFont(Array('helvetica', '', '8'));
//$pdf->setPrintHeader(false);
// 设置默认等宽字体   
$pdf->SetDefaultMonospacedFont('courier');   
   
// 设置间距   
$pdf->SetMargins(25, 25, 25);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(10);
   
// 设置分页   
$pdf->SetAutoPageBreak(TRUE, 25);   
   
//设置图像比例
$pdf->setImageScale(1.25);   
   
//自动换页
$pdf->setFontSubsetting(true);   
   
//设置字体   
$pdf->SetFont('stsongstdlight', '', 14);   
   
$pdf->AddPage();
$str1 = '
<div style="text-align: center;font-size: 30px;font-family: 黑体">'.$val['title'].'</div>
<div style="font-size: 15px;text-align: center;font-family: 黑体">'.$val['type'].'&nbsp;|&nbsp;'.$val['activity'].'</div>
<p style="font-family: 宋体;line-height:28px;">'.$val['content'].'</p>
<div style="font-family: 宋体;">参与时间：'.$val['wintime'].'</div>';
while($var=$dataone->fetch_array()){
	$str1.= '<div><img src="'.$var['file_path'].'"></div>';
}
//输出pdf
$pdf->writeHTML($str1, true, false, true, false, '');
$pdf->Output(time().'.pdf', 'I');