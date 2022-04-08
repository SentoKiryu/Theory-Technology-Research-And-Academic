<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--JQuery-->
    <script src = "JQuery/jquery-3.2.1.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--引入personalNav导航栏行为-->
    <script src = "js/personalNav.js"></script>
    <!--消除浏览器默认样式--> 
    <link rel = "stylesheet" type = "text/css" href = "css/cleardefault.css"> 
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--personal导航栏统一样式-->
    <link rel="stylesheet" type = "text/css" href="css/personalpage/personalNav.css">
    <link rel="stylesheet" type="text/css" href="admin/bootstrap-time/dist/css/bootstrap-datepicker3.css">
    <link href="bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <!--achievement.css-->
<!--    <link rel = "stylesheet" type="text/css" href = "css/subachievement/achievement.css">-->
    <title>个人成就编辑</title>
</head>
<body>
<?php include "fun/connect.php"?>
<!----------------------------------------以上为导航栏，以下为页面主体------------------------------------------------------------->
<div class="main-content" >
	<div class="container-fluid" >					
			<div class="clearfix" >
			  <div class="row">
				<div class="col-md-12" >
				  <div class="panel">
					<div class="panel-body" >
						<form class="form-horizontal" style=" text-align:center;margin-top: 5%" role="form">
						  <div class="form-group">
							<label class="col-xs-2 control-label" for="grade">活动类型</label>
							 <div class="col-xs-4" style="float: left">
							  <select class="form-control" id="type">
							     <option>请选择活动类型</option>
							  <?php  
									$id=$_GET['id'];
									$sql="select type from a_activity group by type";
									$data=$link->query($sql);
									while($val=$data->fetch_array()){
								 ?>
								  <option name="type" value="<?php echo $val['type']?>"><?php echo $val['type']?></option>
								  <?php }?>
							  </select>
							 </div>
							 <?php 
							  $id=$_GET['id'];
							   $sqlone="select term,wintime,content,title from a_achievement where id='$id'";
							   $dataone=$link->query($sqlone);
							   $valone=$dataone->fetch_array();
							  ?>
							 <label class="col-xs-2 control-label" for="banji">活动名</label>
							 <div class="col-xs-4">
							   <select class="form-control" id="activity" style=""></select>
							   <input type="hidden" id="input" class="form-control" placeholder="请输入活动名称" autocomplete="off">
							 </div>
						  </div>
						  <div class="form-group">
						    <label class="col-xs-2 control-label" for="time">获奖时间</label>
						  	<div class="col-xs-4">
						  		<input type="text" id="time" class="form-control" placeholder="选择时间" value="<?php echo $valone['wintime'] ?>" autocomplete="off">
						  	</div>
						  	<label class="col-xs-2 control-label" for="wintime">获奖学期</label>
						  	<div class="col-xs-4">
						  		<input type="text" id="wintime" class="form-control" value="<?php echo $valone['term'] ?>" placeholder="输入获奖学期如：20181">
						  	</div>
						  </div>
						 
<!--
						  <div class="form-group">
						     <div class="col-sm-2"></div>
							 <div class="col-sm-9" style="float: left">							 
						       <input id="file" type="file" multiple  name='file[]' data-overwrite-initial="false" data-min-file-count="" titlt="最多可上传5张图片" title="最多可上传5张图片">
						       <input type="hidden" value="" id="file0">
							 </div>
                          </div>
-->
                           <div class="form-group">
						  	<label class="col-xs-2 control-label" for="title">标题</label>
						  	<div class="col-xs-10">
						  		<input type="text" class="form-control" id="title" placeholder="输入标题" value="<?php echo $valone['title']?>">
						  	</div>
						  </div>
						   <div class="form-group">
							 <label for="inputEdit" class="col-xs-2 control-label">个人成就简述及心得</label>
							 <div class="col-xs-10">
							    <script id="editor" type="text/plain" name="content" style="height:300px;width:100%" ><?php echo $valone['content']?></script>
							 </div>
						  </div>
						
						  <div class="form-group">
						  	<input class="col-xs-12 form-control" type="hidden" id="inputID" value="<?php echo $id;?>">
						  </div>
						  <button type="button" class="btn btn-info" id="submit" ><strong>提&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp交</strong></button>
						</form> 
					  </div>
					</div>
				</div>
				</div>
			</div>		
	</div>
</div>
<script src="admin/ueditor/ueditor.config.js"></script>
<script src="admin/ueditor/ueditor.all.min.js"></script>
<script src="admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="admin/layer/layer.js"></script>
<script src="admin/bootstrap-time/dist/js/bootstrap-datepicker.min.js"></script>
<script src="admin/bootstrap-time/dist/locales/bootstrap-datepicker.zh-CN.min.js"></script>
<script src="bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/js/fileinput_locale_zh.js" type="text/javascript"></script> 
<script>
	var  ue=UE.getEditor('editor',{
		toolbars: [
        ['undo', 'redo',]// 加入fullscreen 增加全屏功能
		],
		autoHeightEnabled: true,
		elementPathEnabled : false,
		autoFloatEnabled: true,
		zIndex: "0"
	}); 
	//二级联动下拉菜单
	$("#type").change(function(){
		var type=$(this).val();
		//选择其他，隐藏选择框（默认打开），打开输入框
		if(type=='其他'){
			$('#activity').attr("style","display:none");
			$('#input').attr("type","text");
		}else{
			
			$.post("edit_select.php",{type:type},function(data){
			$('#input').attr("type","hidden");
			$('#activity').attr("style","");
			$('#activity').html(data);
		});
		}
	});
	//时间选择器
	$("#time").datepicker({
		format:"yyyy-mm-dd",
		language:"zh-CN",
		todayHighlight:true,//开启（选中）当前日期
		orientation:"bottom auto",//自动向下
//		startView:1
	});
	//图片上传
//	$("#file").fileinput({
//		language: 'zh',
//        uploadUrl: 'upload_img.php',
//        allowedFileExtensions : ['jpg', 'png','gif'],
//        overwriteInitial: false,
//        showUpload: true, //是否显示上传按钮
//        showCaption: true,//是否显示标题
//		uploadAsync: true,//ajax同步上传
//        maxFileSize: 0,
////        maxFilesNum: 10,
//		maxFileCount:5,//最多上传5张图片
////        allowedFileTypes: ['image', 'video', 'flash'],
//		slugCallback: function(filename) {
//            return filename.replace('(', '_').replace(']', '_');
//        }
//	}).on("fileuploaded",function(event,data){//处理成功后的回调函数
//		if(data.response){
//			$('#file0').attr("value",data.response);//接受后台传回的数据库id的值将其传给#file0
//		}
//	});
	//ajax提交表单
	$('#submit').on('click',function(){
		var type=$('#type').val();
		var activity=$('#activity').val();
		var input=$('#input').val();
		var time=$('#time').val();
		var wintime=$('#wintime').val();
		var title=$('#title').val();
		var content=ue.getContent();
		var id=$('#inputID').val();
		if(type=="" || type=="请选择活动类型"){
			layer.msg('请选择活动类型',{icon:5});
		}else if(time==""){
			layer.msg('请选择获奖时间',{icon:5});
			$('#time').focus();
		}else if(wintime==""){
			layer.msg('请输入获奖学期',{icon:5});
			$('#wintime').focus();
		}else if(title==""){
			layer.msg('请输入标题',{icon:5});
			$('#title').focus();
		}else if(content==""){
			layer.msg('需要记录个人心得',{icon:5});
		}else{
			$.post("look_edit_xg.php",{
				type:type,
				activity:activity,
				input:input,
				time:time,
				wintime:wintime,
				title:title,
				content:content,
				id:id
			},function(data){
				if(data==1){
					layer.msg('修改成功',{icon:1});
				}else{
					alert('修改失败',{icon:2});
				}
			});
		}
	});
</script>
</body>
</html>
