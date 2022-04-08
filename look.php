<?php include "fun/index_verify.php";?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>个人成就查看</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src = "JQuery/jquery-3.2.1.min.js"></script>
		<script src="js/html5shiv.js"></script>
		<script src = "js/personalNav.js"></script>
		<link rel="stylesheet" href="css/main.css" />
		<link rel="stylesheet" href="css/ie9.css" />
		<link rel="stylesheet" href="css/ie8.css" />
		<link rel="stylesheet" type = "text/css" href="css/personalpage/personalNav.css">
<!--		<link rel="stylesheet" type="text/css" href="admin/layer/mobile/need/layer.css">-->
		<script src="admin/layer/layer.js"></script>
	</head>
	<body>
<?php include "fun/connect.php"?>
  <?php include "head.php"?>
	  <div id="wrapper">
		 <div id="main">
		 <?php $id=$_GET['id'];
		         $name=$_SESSION["Atc_Stu_Num"];
				if(!is_numeric($id)){die("<script>window.location.href='fun/home_verify.php'</script>");}//过滤数字id
			 $sql="select name,activity,type,content,title,wintime,term from a_user,a_achievement where a_achievement.id='$id' and  a_achievement.no='$name'";
		     $data=$link->query($sql);
			 if(!($data->fetch_row())){
					die("<script>window.location.href='fun/home_verify.php'</script>");
				}
		     $val=$data->fetch_array();
			 ?>
			<!-- Post -->
				<article class="post">
					<header>
						<div class="title">
							<h2><a href="#"><?php echo $val['title']?></a></h2>
							<p><?php echo $val['type']?>&nbsp|&nbsp<?php echo $val['activity']?></p>
						</div>
						<div class="meta">								
							<a href="#" class="author" style="font-size: 18px"><span class="name"><?php echo $val['name']?></span><img src="admin/assets/img/moren.jpg" alt="" /></a>
						</div>
					</header>
<!--					心得-->
					<?php echo $val['content']?>
<!--					加载图片-->
					<?php $sqlone="select a_picture.file_path from a_picture,a_achievement where a_achievement.id='$id' and a_achievement.id=a_picture.a_id and a_achievement.no='$name'";
					$dataone=$link->query($sqlone);
					while($var=$dataone->fetch_array()){
					?>
					<a href="#" class="image featured"><img src="<?php echo $var['file_path']?>" alt="" style="height: 400px;"/></a>
					<?php }?>
					<footer>
						<ul class="actions">
							<li><button id="button" class="button big" value="look_edit.php?id=<?php echo $id;?>">编  辑</button></li>
							<li><button href="#" class="button big" id="del" value="<?php echo $id;?>">删  除</button></li>
							<li><a href="OutPdf.php?id=<?php echo $id;?>" class="button big">下  载</a></li>
						</ul>
						<ul class="stats">
							<li><a href="#" class="icon"><?php echo "获奖时间:".$val['wintime']?></a></li>
						</ul>
					</footer>
				</article>
		  </div>
	  </div>
	</body>
	<script>
		//修改窗口
		$('#button').on('click',function(){
			var id=$(this).val();
				layer.open({
				  type: 2,
				  title:'编辑信息',
				  shade: 0.8,
				  anim:2,
//				  scrollbar: false,//禁止浏览器滑动
				  area: ['50%', '80%'],
				  fixed: false, //不固定
//				  maxmin: false,
				  content: id//弹出的url
				});
		});
		//删除按钮
		$('#del').on('click',function(){
			var id=$(this).val();
			layer.confirm("你确定要删除吗？", {
				btn:['确定','取消']
			},function(){
				$.post("del.php",{id:id},function(data){
					if(data==1){
						window.location.href=document.referrer;
					}else{
						layer.msg('删除失败！',{icon:2});
					}
				});
			});
		});
	</script>
</html>