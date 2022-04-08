<?php
session_start();
unset($_SESSION['authnum_session']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ATC测试首页</title>
    <script src = "JQuery/jquery-3.2.1.min.js"></script>
    <script src = "js/homepage.js"></script>
    <!--bootstrap-->
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <!--消除浏览器默认样式-->
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cleardefault.css">
    <!--主页CSS文件-->
    <link rel="stylesheet" href="css/homepage/homepage.css2.css">
    <link rel="stylesheet" href="css/homepage/homepage.css">
    <link rel="stylesheet" href="index/css/normalize.min.css">
    <link rel='stylesheet prefetch' href='index/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='index/css/animate.min.css'>
    <link rel="stylesheet" href="index/css/style.css">
    
</head>
<body>
<div class = "mask"></div>  <!--遮罩层默认隐藏-->  
<div class = "nav-container">
    <div class = "nav">
        <ul class = "nav-content">
            <li class = "home left">ATC平台</li>
<!--            <li class = "about-us left" onclick = "location.href = 'aboutus.php'">关于我们</li> 因为懒得该样式。这里暂时用location跳转，有时间的时候需要改回a标签-->
            <li class = "about-us left" value="aboutus.php" id="aboutus">关于我们</li>
            <?php if(isset($_SESSION["Atc_Stu_Num"])){?>
            <li class = "about-us left" onclick = "location.href = 'personalpage.php'">我的空间</li>
            <li class = "about-us left" onclick = "location.href = 'timeline.php'">前往指南</li>
            <?php }?>
            <?php if(isset($_SESSION["Atc_Stu_Num"])){?>
            <li class = "right" id="logout"><img src="img/index/bg5.jpg" class="img-circle" style="width:35px;height:35px" ><?php echo $_SESSION["Atc_Stu_Num"]?></li>
            <?php }else{?>
            <li class = "sign-in right">登&nbsp;陆</li>
            <li class = "sign-out right">注&nbsp;册</li> 
            <?php }?>
        </ul>
    </div>  
</div>

<!--首页大图-->
<!--<img class = "img-homepage" src = "img/index/bg14.jpg">-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000" data-pause="hover">
      <!-- Indicators -->
      <ol class="carousel-indicators" style="margin-bottom: 1%">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner img-homepage" role="listbox">
        <!-- First slide -->
        <div class="item active">
         <img src="img/index/bg19.jpg">
          <div class="carousel-caption" style="margin-bottom: 20%">
            <h1 data-animation="animated bounceInLeft" style="background-color: transparent;font-size: 50px">
              ATC人才培养平台
            </h1>
            <h1 data-animation="animated bounceInRight" style="background-color: transparent">
             十年之计，莫如树木。终身之计，莫如树人。
            </h1>
          </div>
        </div> <!-- /.item -->

        <!-- Second slide -->
        <div class="item">
         <img src="img/index/bg16.jpg">
          <div class="carousel-caption" style="margin-bottom: 20%">
            <h3 class="icon-container" data-animation="animated bounceInDown">
              <span class="glyphicon glyphicon-heart">自律</span>
            </h3>
            <h1 data-animation="animated bounceInUp" style="background-color: transparent">
             真正能让你走远的，都是自律、积极和勤奋。
            </h1>
          </div>
        </div><!-- /.item -->
        <!-- Third slide -->
        <div class="item">
         <img src="img/index/bg17.jpg">
          <div class="carousel-caption" style="margin-bottom: 20%;">
            <h3 class="icon-container" data-animation="animated zoomInLeft">
              <span class="glyphicon glyphicon-glass">勤奋</span>
            </h3>
            <h1 data-animation="animated fadeInDownBig" style="background-color: transparent">
              合抱之木，生于毫末；九层之台，起于垒土；千里之行，始于足下。
            </h1>
          </div>
        </div><!-- /.item -->
      </div><!-- /.carousel-inner -->
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
<!--注册模板-->
<div class = "register" id = "register">
    <h2>注册账号</h2>
    <div class = "form-container">
        <form class = "register-form form-horizontal" method = "post" active = "#">

            <div class="center form-group">
                <div>
                    <label for="inputEmail3" class="col-sm-2 control-label">学号</label>
                
                    <div class="col-sm-10">
                        <input v-model = "reg_message.number" type="number" class="reg-num form-control" id="inputEmail3" placeholder="学号">
                    </div>
                </div>    
            </div>


            <div class="center form-group">
                <div>
                    <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>

                    <div class="col-sm-10">
                        <input v-model = "reg_message.email" type="email" class="reg-email form-control" id="inputEmail3" placeholder="邮箱">
                    </div>
                </div>
            </div>

            <div class="center form-group">
                <div>
                    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                        <input v-model = "reg_message.password" type="password" class="reg-password form-control" id="inputPassword3" placeholder="密码">
                    </div>
                </div>
            </div>


            <div class="center form-group">
                <div>
                    <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-10">
                        <input @change = "confirmPassword" ref="confirmPassword" type="password" class="reg-confirm-password form-control" id="inputPassword3" placeholder="确认密码">
                    </div>
                </div>
            </div>


            <!--<div class="center form-group">-->
                <!--<div>-->
                    <!--<label for="inputPassword3" class="col-sm-2 control-label">验证码</label>-->
                    <!--<div class="col-sm-10">-->
                        <!--<input v-model = "reg_message.identify" type="text" class="reg-identify-code form-control" id="inputPassword3" placeholder="验证码">-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
            
            <!--<img  class = "identify-img" src = "img/验证码.jpg">-->
            <br />            
            <button @click = "submit" ref = "reg_subbtn" type="button" :class="subbtnClass">注&nbsp;册&nbsp;{{ count_down }}</button>
        </form>
    </div>
</div> <!--注册模板-->


<!--登陆模板-->
<div class = "login" id = "login">
        <h2>登&nbsp;陆</h2>
        <div class = "form-container">
            <form class = "login-form form-horizontal" method = "post" active = "#">
    
    
                    <div class="center form-group">
                        <div>
                            <label for="inputEmail3" class="col-sm-2 control-label">学号</label>
                        
                            <div class="col-sm-10">
                                <input v-model = "log_message.number" type="number" class="log-num form-control" id="inputEmail3" placeholder="学号">
                            </div>
                        </div>    
                    </div>
    
    
                <div class="center form-group">
                    <div>
                        <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input v-model = "log_message.password" type="password" class="log-password form-control" id="inputPassword3" placeholder="密码">
                        </div>
                    </div>
                </div>

    
                <div class="center form-group">
                    <div>
                        <label for="inputPassword3" class="col-sm-2 control-label">验证码</label>
                        <div class="col-sm-10">
                            <input v-model = "log_message.identify" type="text" class="log-identify-code form-control" id="inputPassword3" placeholder="验证码" autocomplete="off">
                        </div>
                    </div>
                </div>
                
                <img  class = "identify-img" title="点击刷新" src="./captcha.php" align="absbottom" onclick="this.src='captcha.php?'+Math.random();">
    
    
                <div class="center form-group">
                    <div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" v-model = "remember" > 记住我&nbsp;(Tip:不是自己电脑不要勾选此选项以免账号被盗)
                        </label>
                        </div>
                    </div>
                    </div>
                </div>

                <button @click = "submit" type="button" class="log-subbtn btn btn-primary">登&nbsp;录</button>
            </form>
        </div>
</div> <!--登陆模板-->

<!--占位符-->
<h1 class = "placeholder" style="margin-top: 0px">
    PlaceHolder
</h1>
</body>
<script src = "js/setCookie.js"></script>
<script src="js/getCookie.js"></script>
<!-- <script src="js/test.js"></script> -->
<script src = "Vue/Vue_source/vue2.5.17.js"></script>
<script src = "Vue/Vue_source/vue-resource.min.js"></script>
<script src = "Vue/Vue_demo/homepage/v_homepage.js"></script>
<script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="admin/layer/layer.js"></script>
<script  src="index/js/index.js"></script>
<script>
	//退出登录
	$('#logout').on('click',function(){
		layer.confirm('你确定要退出登录吗？',{
			btn:['确定','取消']
		},function(){
			$.get("logout.php",function(data){
				if(data==1){
					window.location.reload();//刷新页面
				}
			});
		});
	});
	//关于我们
	$('#aboutus').on('click',function(){
		var id=$(this).attr("value");
		  layer.open({
			  type: 2,
			  title:'软件研发中心',
			  shade: 0.8,
			  anim:2,
//			  scrollbar: false,//禁止浏览器滑动
			  area: ['30%', '80%'],
			  fixed: false, //不固定
//			  maxmin: false,
			  content: id//弹出的url
			});
	});

</script>
</html>
