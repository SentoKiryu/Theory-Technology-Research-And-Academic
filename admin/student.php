<?php 
include "../fun/verify.php";
?>
<!doctype html>
<html lang="en">

<head>
	<title>学生添加</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<link href="bootstrap-time/dist/css/bootstrap-datepicker3.css" rel="stylesheet">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
			<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				 <form class="navbar-form navbar-left" action="form.php" method="post" id="form">
				     <select class="form-control input-sm" name="select" id="select">
			        	<option>请选择</option>
			        	<option  value="1" title="选择此项请输入班级如:信计162">查看班级信息</option>
			        	<option  value="3" title="选择此项请输入班级如:信计162">查看班级成就</option>
			        	<option  value="2" title="选择此项请输入学号">查看个人成就</option>
			        </select>
					<div class="input-group">
						<input type="text" name="name" id="input" class="form-control" placeholder="输入班级或学号">
						<span class="input-group-btn"><button type="button" id="btn" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/moren.jpg" class="img-circle" alt="Avatar"> <span>ATC后台管理人:<?php echo $_SESSION["username"]?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a id="logout"><i class="lnr lnr-exit"></i> <span>退出登录</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>数据分析</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>学生管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse in">
								<ul class="nav">
									<li><a href="tables.php" class="">学生信息</a></li>
									<li><a href="student.php" class="active">添加学生</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subActv" data-toggle="collapse" class="collapsed"><i class="lnr lnr-chart-bars"></i> <span>活动管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subActv" class="collapse">
								<ul class="nav">
									<li><a href="activity.php" class="">所有活动</a></li>
									<li><a href="addactivity.php" class="">添加活动</a></li>
								</ul>
							</div>
						</li>
						<li><a href="achievement.php" class=""><i class="lnr lnr-thumbs-up"></i> <span>个人成就</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">学生信息录入</h3>
						<div class="clearfix">
						  <div class="row">
						    <div class="col-md-12">
						      <div class="panel">
						        <div class="panel-body">
									<form class="form-horizontal" style=" text-align:center;margin-top: 5%" role="form">
									  <div class="form-group">
										 <label class="col-sm-2 control-label" for="name">姓名</label>
										 <div class="col-sm-4">
											<input class="form-control" id="name"  type="text" placeholder="输入姓名"/>
										 </div>
										 <label class="col-sm-2 control-label" for="no">学号</label>
										 <div class="col-sm-4">
											<input class="form-control" id="no" type="text" placeholder="输入学号"/>
										 </div>
									  </div>
									  <div class="form-group">
										<label class="col-sm-2 control-label" for="xueyuan">所属学院</label>
										 <div class="col-sm-4">
											<input class="form-control" id="xueyuan" type="text" placeholder="输入学院"/>
										 </div>
										 <label class="col-sm-2 control-label" for="grade">性别</label>
										 <div class="col-sm-4" id="sex" >
										  <div class="col-sm-6">
										   <label >男</label>
										   <input type="radio" name='sex'  value="男" checked>
										   </div>
										   <div class="col-sm-6">
										   <label >女</label>
										   <input type="radio" name='sex'  value="女">
										   </div>
										 </div>
									  </div>
									  <div class="form-group">
										<label class="col-sm-2 control-label" for="grade">年级</label>
										 <div class="col-sm-4">
											<input class="form-control" id="grade" type="text" placeholder="输入年级如:2016"/>
										 </div>
										 <label class="col-sm-2 control-label" for="banji">班级</label>
										 <div class="col-sm-4">
											<input class="form-control" id="banji" type="text" placeholder="输入班级 如:信计162"/>
										 </div>
									  </div>
									  <div class="form-group">
										<label class="col-sm-2 control-label" for="time">出生年月</label>
										 <div class="col-sm-4">
											<input class="form-control" id="time" type="text" placeholder="选择日期" autocomplete="off"/>
										 </div>
										 <label class="col-sm-2 control-label" for="phone">联系电话</label>
										 <div class="col-sm-4">
											<input class="form-control" id="phone" type="text" placeholder="输入手机号"/>
										 </div>
									  </div>
									  <button type="button" class="btn btn-info" id="submit" style="float: right">提交</button>
									</form> 
								  </div>
								</div>
							</div>
                            </div>
						</div>		
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="bootstrap-time/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="bootstrap-time/dist/locales/bootstrap-datepicker.zh-CN.min.js"></script>
	<script src="layer/layer.js"></script>
	<script>
//		bootstrap时间选择器
		$("#time").datepicker({
			format:"yyyy-mm-dd",
			language:"zh-CN",
			todayHighlight:true,//开启（选中）当前日期
			orientation:"top auto",//自动向下
//			startView:1
		});
//		提交表单事件
		$(document).ready(function(){
			$("#submit").on('click',function(){
				var name=$("#name").val();
				var no=$("#no").val();
				var academy=$("#xueyuan").val();
				var sex=$("input[name='sex']:checked").val()
				var grade=$("#grade").val();
				var banji=$("#banji").val();
				var time=$("#time").val();
				var phone=$("#phone").val();
				if(name==""){
					layer.msg('名字还没有填写',{icon:5});
					$("#name").focus();
				}else if(no==""){
					layer.msg('学号必须填',{icon:5});
					$("#no").focus();
				}else if(academy==""){
					layer.msg('这位同学是哪个学院的？',{icon:5});
					$("#xueyuan").focus();
				}else if(grade==""){
					layer.msg('需要填写年级',{icon:5});
					$("#grade").focus();
				}else if(banji==""){
					layer.msg('班级必须填写',{icon:5});
					$("#banji").focus();
				}else if(time==""){
					layer.msg('请选择出生年月',{icon:5});
					$("#time").focus();
				}else if(phone==""){
					layer.msg('填写联系电话方便联系学生',{icon:5});
					$("#phone").focus();
				}else{
					$.post("adduser.php",{
					name:name,
					no:no,
					academy:academy,
					sex:sex,
					grade:grade,
					banji:banji,
					time:time,
					phone:phone
				},function(data){
					if(data==1){
						layer.msg('该同学已注册',{icon:3});
					}else if(data==2){
						layer.msg('添加成功！',{icon:1});					
					}else if(data==3){
						layer.msg('添加失败！',{icon:5});
					}
				});
				}
					
			});
		});
		//搜索
	    $("#btn").on('click',function(){
			var val=$("#input").val();
			if(val==""){
				layer.msg('你没有任何输入',{icon:2});
			}else if($("#select").val()==1){
				$("#form").submit();
			}else if($("#select").val()==2){
				$("#form").attr("action","formone.php");
				$("#form").submit();
			}else if($("#select").val()==3){
				$("#form").attr("action","formtwo.php");
				$("#form").submit();
			}
		});
	//退出登录
	$('#logout').on('click',function(){
		layer.confirm('你确定要退出登录码？',{
			btn:['确定','取消']
		},function(){
			$.get("logout.php",function(data){
				if(data==1){
			        window.location.href="login.php";
				}
			});
		});
	})
	</script>
</body>

</html>
