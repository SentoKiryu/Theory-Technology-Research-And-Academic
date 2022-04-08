<?php include "fun/index_verify.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="admin/bootstrap-time/dist/css/bootstrap-datepicker3.css">
	<style type="text/css">	
		.bg{
			background: url("img/index/bg7.jpg") no-repeat center;
			background-position: center 0; 
			background-repeat: no-repeat;  
			background-attachment: fixed; 
			background-size:contain; 
		    -webkit-background-size: contain;  
		    -o-background-size: contain;  
		    -moz-background-size: contain;  
		    -ms-background-size: contain;
		}
	</style>	
</head>
<body class="bg">
<?php include "fun/connect.php";
	$name=$_SESSION["Atc_Stu_Num"];
	$sql="select name,sex,age,academy,grade,class,phone from a_user where no='$name'";
	$data=$link->query($sql);
	$val=$data->fetch_array();
?>
<div class="container-fluid">
<div class="row">
	<div class="col-xs-12">
		<form class="form-horizontal" style="margin-top: 10%">			
			<div class="form-group">
				<label class=" col-xs-2 control-label">姓名</label>
				<div class="col-xs-10">
					<input class="form-control" type="text" id="name" placeholder="你的姓名" value="<?php echo $val['name'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class=" col-xs-2 control-label">性别</label>
				<div class="col-xs-10" id="sex" >
				  <div class="col-xs-6">
				   <label >男</label>
				   <input type="radio" name='sex'  value="男" checked>
				   </div>
				   <div class="col-xs-6">
				   <label >女</label>
				   <input type="radio" name='sex'  value="女">
				   </div>
			   </div>
			</div>
			<div class="form-group">
				<label class=" col-xs-2 control-label">出生日期</label>
				<div class="col-xs-10">
					<input class="form-control" type="text" id="time" autocomplete="off" placeholder="选择日期" value="<?php echo $val['age'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class=" col-xs-2 control-label">学院</label>
				<div class="col-xs-10">
					<input class="form-control" type="text" id="academy" placeholder="当前所在院" value="<?php echo $val['academy'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class=" col-xs-2 control-label">年级</label>
				<div class="col-xs-10">
					<input class="form-control" type="text" id="grade" placeholder="当前年级如:2016" value="<?php echo $val['grade'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class=" col-xs-2 control-label" >班级</label>
				<div class="col-xs-10">
					<input class="form-control" type="text" id="class" placeholder="当前所在班级" value="<?php echo $val['class'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class=" col-xs-2 control-label">联系电话</label>
				<div class="col-xs-10">
					<input class="form-control" type="text" id="phone" placeholder="你的联系电话" value="<?php echo $val['phone'];?>">
				</div>
			</div>
<!--				<div class="form-group"></div>-->
			<div style="float: right">
				<button type="button" class="btn btn-primary" style="text-align: center" id="back">返&nbsp;&nbsp;回</button>&nbsp;&nbsp;&nbsp;
				<button type="button" class="btn btn-success" id="button">修&nbsp;&nbsp;改</button>
			</div>
		</form>
	</div>
</div>
</div>
</body>
<script src="JQuery/jquery-3.2.1.min.js"></script>
<script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="admin/bootstrap-time/dist/js/bootstrap-datepicker.min.js"></script>
<script src="admin/bootstrap-time/dist/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="admin/layer/layer.js"></script>
<script>
	//时间选择
	$("#time").datepicker({
	format:"yyyy-mm-dd",
	language:"zh-CN",
	todayHighlight:true,//开启（选中）当前日期
	orientation:"bottom auto",//自动向下
//		startView:1
	});
	//返回按钮
	$('#back').on('click',function(){
		window.location.href=document.referrer;
	})
	//确定按钮
	$('#button').on('click',function(){
		var name=$('#name').val();
		var sex=$("input[name='sex']:checked").val();
		var time=$('#time').val();
		var academy=$('#academy').val();
		var grade=$('#grade').val();
		var BJ=$('#class').val();
		var phone=$('#phone').val();
		if(name==""){
			layer.msg('姓名不能为空',{icon:5});
			$('#name').focus();
		}else if(time==""){
			layer.msg('请选择时间',{icon:5});
			$('#time').focus();
		}else if(academy==""){
			layer.msg('学院不能为空',{icon:5});
			$('#academy').focus();
		}else if(grade==""){
			layer.msg('年级不能为空',{icon:5});
			$('#grade').focus();
		}else if(BJ==""){
			layer.msg('班级不能为空',{icon:5});
			$('#class').focus();
		}else if(phone==""){
			layer.msg('联系方式不能为空',{icon:5});
			$('#phone').focus();
		}else{
			$.post("info_ok.php",{
				name:name,
				sex:sex,
				time:time,
				academy:academy,
				grade:grade,
				BJ:BJ,
				phone:phone
			},function(data){
				if(data==1){
					layer.msg("修改成功！",{icon:1});
				}else if(data==2){
					layer.msg("你没有任何修改",{icon:3});
				}else{
				   layer.msg("修改失败！",{icon:2});
				  }
			})
		}
	});
</script>
</html>