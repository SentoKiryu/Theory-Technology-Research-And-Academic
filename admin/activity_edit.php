<?php
include "../fun/verify.php";
?>
<!doctype html>
<html lang="en">
<head>
	<title>活动详情</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
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
<?php include "../fun/connect.php";?>
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
						<input type="text" name="name" class="form-control" id="name" placeholder="输入班级或学号">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
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
							<div id="subPages" class="collapse">
								<ul class="nav">
									<li><a href="tables.php" class="">学生信息</a></li>
									<li><a href="student.php" class="">添加学生</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subActv" data-toggle="collapse" class="collapsed"><i class="lnr lnr-chart-bars"></i> <span>活动管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subActv" class="collapse in">
								<ul class="nav">
									<li><a href="activity.php" class="active">所有活动</a></li>
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
					<h3 class="page-title">添加活动</h3>
					<div class="clearfix">
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-body">
								<?php
									$id=$_GET['id'];
									$sqlone="select type,activity,time,content from a_activity where id='$id'";
									$data=$link->query($sqlone);
									$val=$data->fetch_array();
								?>
								<form class="form-horizontal" style="margin-top: 6%">
							      <input type="hidden" name="id" id="a_id" value="<?php echo $id;?>">
								  <div class="form-group">
									<label for="inputType" class="col-sm-2 control-label">活动类型</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="inputType" placeholder="请输入活动类型" value="<?php echo $val['type']?>">
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputActivity" class="col-sm-2 control-label">活动名</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="inputActivity" placeholder="请输入活动名" value="<?php echo $val['activity']?>">
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputTime" class="col-sm-2 control-label">活动时间</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="inputTime" placeholder="请选择时间" value="<?php echo $val['time']?>">
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputEdit" class="col-sm-2 control-label">活动内容</label>
									<div class="col-sm-10">
									<script id="editor" type="text/plain" name="content" style="height:300px;" ><?php echo $val['content']?></script>
									</div>
								  </div>
								  <div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="button" class="btn btn-success" id="button">确定修改</button>
									</div>
								  </div>
								</form>
								</div>
							</div>
							<!-- END TABLE HOVER -->
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
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="bootstrap-time/dist/js/bootstrap-datepicker.min.js"></script>
	<script src="bootstrap-time/dist/locales/bootstrap-datepicker.zh-CN.min.js"></script>
	<script src="layer/layer.js"></script>
	<script src="ueditor/ueditor.config.js"></script>
	<script src="ueditor/ueditor.all.min.js"></script>
	<script src="ueditor/lang/zh-cn/zh-cn.js"></script>
	<script type="text/javascript">
//		ueditor
		var  ue=UE.getEditor('editor',{
		toolbars: [
        ['fullscreen', '', 'undo', 'redo', '']
		],
		autoHeightEnabled: true,
		elementPathEnabled : false,
		autoFloatEnabled: true
	}); 
	</script>
	<script>
		
		//		bootstrap时间选择器
		$("#inputTime").datepicker({
			format:"yyyy-mm-dd",
			language:"zh-CN",
			todayHighlight:true,//开启（选中）当前日期
			orientation:"top auto",//自动向上
//			startView:1
		});
		//数据提交
		$('#button').on('click',function(){
			var inputType=$('#inputType').val();
			var inputActivity=$('#inputActivity').val();
			var inputTime=$('#inputTime').val();
			var editor=ue.getContent();
			var id=$('#a_id').val();
//			alert(id);
			if(inputType==""){
				layer.msg('活动类型还没填',{icon:5});
				$('#inputType').focus();
			}else if(inputActivity==""){
				layer.msg('活动名还没填',{icon:5});
				$('#inputActivity').focus();
			}else if(inputTime==""){
				layer.msg('请选择活动时间',{icon:5});
				$('inputTime').focus();
			}else if(editor==""){
				layer.msg('活动内容是必不可少的',{icon:5});
				$('#editor').focus();
			}else{
				$.post("edit_look.php",{
					inputType:inputType,
					inputActivity:inputActivity,
					inputTime:inputTime,
					editor:editor,
					id:id
				},function(data){
					if(data==1){
						layer.msg('你没有任何修改',{icon:3});
					}else if(data==2){
						layer.msg('修改成功，可前往活动页面查看',{icon:1});
					}else if(data==3){
						layer.msg('修改失败，请检查原因',{icon:2});
					}
				});
			}
		})
		//搜索
		$(".btn").on('click',function(){
			var val=$("#name").val();
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
