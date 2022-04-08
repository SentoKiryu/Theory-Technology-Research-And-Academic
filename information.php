<?php include "fun/index_verify.php";?>
<?php include "fun/connect.php";?>
<!doctype html>
<html lang="en">
<head>
	<title>Profile</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="admin/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="admin/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="admin/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="admin/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="admin/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="admin/assets/img/favicon.png">
</head>

<body>
<!-- MAIN CONTENT -->
	<div class="container-fluid" style="margin-top:">					
		<div class="clearfix" >
			<div>
					<?php
						$name=$_SESSION["Atc_Stu_Num"];
						$sql="select phone,name,age,sex,academy,class,grade from a_user where no='$name'";
						$data=$link->query($sql);
						$val=$data->fetch_array();
					?>
					<!-- PROFILE HEADER -->
					<div class="profile-header">
						<div class="overlay"></div>
						<div class="profile-main">
								<img src="img/index/header.jpg" style="height: 90px;width: 90px" class="img-circle" alt="Avatar">
							<h3 class="name"><?php echo $_SESSION["Atc_Stu_Num"]?></h3>
							<span class="online-status status-available">在线</span>
						</div>
					
						<div class="profile-stat">
							<div class="row">
								<div class="col-xs-6 stat-item">
									<?php echo intval(((time()+8*60*60)-strtotime($val['age']))/(365*24*60*60));?> <span>年龄</span>
								</div>
								<?php 
									$sqlone="select count(*) as count from a_achievement where no='$name' and type!=''";
									$dataone=$link->query($sqlone);
									$valone=$dataone->fetch_array();
								?>
								<div class="col-xs-6 stat-item">
									<?php echo $valone['count'];?> <span>成就</span>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE HEADER -->
					<!-- PROFILE DETAIL -->
					<div class="profile-detail">
						<div class="profile-info">
							<h4 class="heading">个人信息</h4>
							<ul class="list-unstyled list-justify">
								<li>姓名 <span><?php echo $val['name']?></span></li>
								<li>性别 <span><?php echo $val['sex']?></span></li>
								<li>学院 <span><?php echo $val['academy']?></span></li>
								<li>年级 <span><?php echo $val['grade']?>级</span></li>
								<li>班级 <span><?php echo $val['class']?></span></li>
								<li>出生年月 <span><?php echo $val['age']?></span></li>
								<li>联系电话 <span><?php echo $val['phone']?></span></li>
							</ul>
						</div>
<!--
						<div class="profile-info">
							<h4 class="heading">About</h4>
							<p>Interactively fashion excellent information after distinctive outsourcing.</p>
						</div>
-->
						<div class="text-center"><a href="info.php" class="btn btn-primary">修&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;改</a></div>
					</div>
					<!-- END PROFILE DETAIL -->
				</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="admin/assets/vendor/jquery/jquery.min.js"></script>
	<script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="admin/assets/scripts/klorofil-common.js"></script>
</body>
</html>
