$(function(){ //首页导航栏行为
    var i = 1;
    $(window).scroll(function(){ //当页面滚动时导航栏自动收缩或扩张
        // console.log($(this).scrollTop());
        if($(this).scrollTop() > 50 ){
            $(".nav").css({
                height:65 + "px",
                background:"rgba(85,85,85,.8)"
            }).find("li").css({
                marginTop:17 + "px",
            });
        } else {
            $(".nav").css({
                height:100 + "px",
                background:"rgba(230,230,230,0)"
            }).find("li").css({
                marginTop:35 + "px",
            });
        }
    });
    $(".sign-in").click(function(){ // 点击登陆出现弹出层
        $(".mask").show(); //遮罩层打开
        $(".login").show().animate({
            top:50 + "px"
        });
    });
    $(".sign-out").click(function(){ // 点击注册出现弹出层
        $(".mask").show(); //遮罩层打开
        $(".register").show().animate({
            top:50 + "px"
        });
    });
    $(".home").click(function(){
        window.location.reload();
    });
    $(".about-us").click(function(){
        window.location.href = "#"; // #号需替换为“关于我们”网页
    });
    $(document).keydown(function(event){ /*动画过程多次按下Esc会有短停，需要改进*/ 
        if(event.keyCode == 27 && $(".login").is(":visible")){// 当键盘按下的是Esc键并且登陆弹出层存在时
        
                    $(".login").stop(true,false).animate({
                        top:-560 + "px"
                    },function(){
                            $(this).hide();
                            $(".mask").hide(); // 关闭遮罩层
                    });
                    
                } 
        if(event.keyCode == 27 && $(".register").is(":visible")){// 当键盘按下的是Esc键并且登陆弹出层存在时
                    $(".register").stop(true,false).animate({
                        top:-560 + "px"
                    },function(){
                            $(this).hide();
                            $(".mask").hide(); // 关闭遮罩层
                    });
                    
                } 
        });
        
    
});

$(function(){ //首页图片大小设置及图片轮播行为
    // console.log(document.body.clientHeight);
    // console.log(window.innerHeight);
    $(".img-homepage").css({
        height:(window.innerHeight) * 1,
        // width:window.innerWidth
    });
});

