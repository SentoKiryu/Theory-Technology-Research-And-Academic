$(function(){ // 控制personalNav-b的显示消失行为
    $(window).scroll(function(){
        // console.log($(this).scrollTop());
        var time = 200; // time的值是白色导航栏显示和消失的时间，单位为毫秒
        if($(this).scrollTop() > 50){
            if($("nav.personal-nav-b").is(":animated")){
                $("nav.personal-nav-b").stop(true,false).fadeIn(time);
            } else {
                $("nav.personal-nav-b").fadeIn(time);
            }
        } else {
            if($("nav.personal-nav-b").is(":animated")){
                $("nav.personal-nav-b").stop(true,false).fadeOut(time);
            } else {
                $("nav.personal-nav-b").fadeOut(time);
            }
            
        }
    });
});

$(function(){ // 获取他的头像信息
    // console.log(the_user);
    $.ajax({
        url:"xxxxx.php",
        method:"post",
        data:15, // 开发时将15换成the_user
        dataType:"text",
        success:function(response){ // response应该是字符串，内容为个人头像的服务器储存地址
            if(response){
                // console.log(response);
                $("img.profile").attr("src",response);
            } else {
                return;
            }
        },
        error:function(xhr,status,error){
            console.log("请求失败");
            console.log("错误信息为：" + xhr + "||" + status + "||" + error);
        }
    });
});

$(function(){ // 控制导航下拉菜单行为


    function delCookie(key) { // 封装删除cookie函数
        var date = new Date();
        date.setTime(date.getTime() - 1);
        var delValue = getCookie(key);
        if (!!delValue) {
            document.cookie = key+'='+delValue+';expires='+date.toGMTString();
        }
    }


    $("li.char.plus").children("div").css("display","none")
    .end().click(function(e){
        $("li.char.plus").children("div:last-child").toggle();
        e.stopPropagation();
    });

    var level2 = $("li.char.plus").children("div:last-child");
    $(window).scroll(function(){
        if($(".personal-nav-b").is(":visible") && level2.is(":visible")){
            level2.css({
                position:"fixed",
                top:"50px",
                left:"1392px",
                bottom:""
            });
            console.log("看得到" + level2.position().top);
        } else {
            // console.log("看不到");
            // level2.css("bottom","-91px");
            level2.css({
                position: "fixed",
                left: "1392px",
                top: "50px"
            });

        }
    });
    $(document).click(function(e){
        $("li.char.plus").children("div").css("display","none");
    })
    
});

