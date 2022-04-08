<?php 
include "../fun/verify.php";
?>
<!doctype html>
<html lang="en">
<head>
	<title>学生信息</title>
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
</head>

<body>
<?php include "../fun/connect.php" ?>
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
						<li><a href="index.php" class="active"><i class="lnr lnr-home"></i> <span>数据分析</span></a></li>
						
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>学生管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="tables.php" class="">学生信息</a></li>
									<li><a href="student.php" class="">添加学生</a></li>
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
					<h3 class="page-title">个人成就</h3>
					<div class="clearfix">
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>姓名</th>
												<th>学号</th>
												<th>性别</th>
												<th>班级</th>
												<th>活动类型</th>
												<th>获奖活动</th>
												<th>获奖学期</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
										<?php
	                                        $class=$_POST["name"];
											$sql="select a_achievement.id,a_achievement.no,name,sex,class,type,activity,term from a_achievement,a_user where a_achievement.no=a_user.no and class='$class'";
											$data=$link->query($sql);
	                                        $data0=$data->fetch_all();
											$num=15;//显示条数
											$count=count($data0);
											$w=ceil($count/$num);//向上取整（总页数）
											$page=isset($_GET['page'])?$_GET['page']:1;//取到当前是第几页
											$offset=($page-1)*$num;
											$sql="select a_achievement.id,a_achievement.no,name,sex,class,type,activity,term from a_achievement,a_user where a_achievement.no=a_user.no and class='$class' limit $offset,{$num}";
											$data=$link->query($sql);
											$p=($page==1)?0:($page-1);//上一页
											$n=($page==$w)?0:($page+1);//下一页
	                                        while($val=$data->fetch_array()){
										?>
											<tr>
												
												<td><?php echo $val['name']?></td>
												<td><?php echo $val['no']?></td>
												<td><?php echo $val['sex']?></td>
												<td><?php echo $val['class']?></td>
												<td><?php echo $val['type']?></td>
												<td><?php echo $val['activity']?></td>
												<td><?php echo $val['term']?></td>
												<td>
													<a href="ach_look.php?id=<?php echo $val['id']?>"><i class="fa fa-eye" title="查看"></i></a>&nbsp;|&nbsp;
													<a href="ach_edit.php?id=<?php echo $val['id']?>"><i class="fa fa-edit" title="修改"></i></a>&nbsp;|&nbsp;
													<button type="button" style="cursor:pointer;border:0px;background-color:white " class="del" value="<?php echo $val['id']?>"><i class="fa fa-trash" title="删除"></i></button>
												</td>
											</tr>
											<?php }?>
										</tbody>
									</table>
									<?php 
										echo "<ul class='pagination'>"?>
										   <?php 
											if($page==1){
												echo "<li><a>首页</a></li>";
											}else{
												echo "<li><a href='?page=1'>首页</a></li>";
											}
											if($p){
												echo  "<li><a href='?page={$p}'>上一页</a></li>";
											}else{
												echo "<li><a>上一页</a></li>";
											}
											if($n){
												echo  "<li><a href='?page={$n}'>下一页</a></li>";
											}else{
												echo "<li><a>下一页</a></li>";
											}
											if($page==$w){
												echo  "<li><a>尾页</a></li>";
											}else{
												echo  "<li><a href='?page={$w}'>尾页</a></li>";
											}
									        ?>
									        
									<?php echo "</ul>"?>
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
	<!--        编辑模态框-->
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="layer/layer.js"></script>
    <script>
		$('.del').on('click',function(){
			var id=$(this).val();
//			console.log(id);
			layer.confirm('你确定要删除吗？',{
				btn:['确定','取消']
			},function(){
				$.post("ach_del.php",{id:id},function(data){
					if(data==1){
						layer.msg('删除成功！',{icon:1});
					}else{
						layer.msg('删除失败！',{icon:2});
					}
				});
			});
		});
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
