<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>ATC后台登陆</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
						<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-primary" style="font-family:黑体;font-size: 25px">ATC后台登陆</div>
							</div>
							<form class="form-auth-small" action="" id="form">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">用户名</label>
									<input type="text" class="form-control" id="name"  placeholder="用户名">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">密码</label>
									<input type="password" class="form-control" id="password" value="thisisthepassword" placeholder="密码">
								</div>
								<button type="button" class="btn btn-primary btn-lg btn-block">登陆</button>
							</form>
						</div>
					
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">理学院ATC人才培养平台</h1>
						</div>
					</div>
<!--					<div class="clearfix"></div>-->
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="layer/layer.js"></script>
	<script>
		$('.btn').on('click',function(){
			var username=$('#name').val();
			var pwd=$('#password').val();
			if(username==""){
				layer.msg('请输入用户名',{icon:5});
				$('#name').focus();
			}else if(pwd==""){
				layer.msg('请输入密码',{icon:5});
				$('#password').focus();
			}else{
				$.post("login_ok.php",{username:username,pwd:pwd},function(data){
					if(data==1){
						layer.msg('登陆成功！',{icon:1});
						$('#form').attr("action","index.php");
						$("#form").submit();
					}else{
						layer.msg('登陆失败！',{icon:2});
					}
				})
			}
		})
	</script>
</body>

</html>
