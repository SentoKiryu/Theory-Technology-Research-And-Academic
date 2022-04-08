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

/*
	commit:
		1.本js代码为个人主页缩略图overview动画，
*/

$(function(){	//鼠标移动到公屏缩略简历上时，呈现出动画效果的js代码
	var top_option = {
		"speed":800,
	}
	var top_height = $("div.suolve-top-box").height();
	var bottom_height = $("div.suolve-bottom-box").height();
	var img_height = $("img.picture").height(),
		img_width = $("img.picture").width();
		img_top = $("img.picture").position().top;
		img_left = $("img.picture").position().left;
	function shadow_show(thing){
		if(arguments[0].className == "suolve")
		{
			// arguments[0].style.boxShadow = "5px 5px 5px #E6E6E6";
		}
	}

	for(var i = 0; i <= $("div.suolve").length - 1; i++)
	{	
		shadow_show($("div.suolve").get(i));
	}

	$("div.suolve").each(function(index,element){
		$(this).mouseenter(function(){    //当鼠标进入***************************************************************************************************************
			if($(this).children("div.suolve-top-box").is(":animated"))
			{	
				// console.log(top_height);
				// console.log(bottom_height);
				// console.log(bottom_height);
				$(this).children("div.suolve-top-box").stop(true,false)
									   .animate({
											"height":top_height - (top_height)* 0.63  + "px"
									   });
				$(this).children("div.suolve-bottom-box").stop(true,false)
									   .animate({
										   "height":bottom_height + (bottom_height)* 0.63  + "px"
									   });
				$(this).find("img.picture").stop(true,false).animate({
										"height":img_height + 50 + "px",
										"width":img_width + 50 + "px",
										"top": img_top - 25 +"px",
										"left":img_left - 25 +"px"
								});
				$(this).find("div.top-shawdow").stop(true,false).fadeIn();
				$(this).find("div.resume-box").stop(true,false).delay().animate({
					top:"0px"
				});
				$(this).find("div.resume-box")
							   .children()
							   .first()
							   .find("span").stop(true,false).fadeIn();			
			}
			
			//top高度变小，同时top遮照层显现（颜色渐变），top中心放大背景放大，bottom高度变大。
			// console.log($("div.top-shawdow").parent().valueOf());
			$(this).find("div.top-shawdow").fadeIn();
						// speed - 设置动画的速度
						// easing - 规定要使用的 easing 函数
						// callback - 规定动画完成之后要执行的函数
						// step - 规定动画的每一步完成之后要执行的函数
						// queue - 布尔值。指示是否在效果队列中放置动画。如果为 false，则动画将立即开始
						// specialEasing - 来自 styles 参数的一个或多个 CSS 属性的映射，以及它们的对应 easing 函数
			$(this).children("div.suolve-top-box").animate({
					height:top_height  - (top_height) * 0.63  + "px"
			});
	
			// console.log($(this).children("img.picture").parent().valueOf());
	
			$(this).find("img.picture").animate({
					height:img_height + 50 +"px",
					width:img_width + 50 +"px",
					top:"-25px",
					left:"-25px"
			});
			$(this).find("div.suolve-bottom-box").animate({	
					height:bottom_height + (bottom_height) * 0.63  + "px"
			});
			//让隐藏的个人简述内容显示在上方，字体同时渐变
			$(this).find("div.resume-box").delay(100).show().animate({
					top:"0px"
			});
			$(this).find("div.resume-box").children()
							   .first()
							   .find("span")
							   .fadeIn();
		});
	});
		
		
	$("div.suolve").each(function(value,element){
		$(this).mouseleave(function(){ //当鼠标移出***********************************************************************************************
			if($(this).children("div.suolve-top-box").is(":animated"))
			{
				$(this).children("div.suolve-top-box").stop(true,false)
									   .animate({
											"height":top_height
									   });
				$(this).children("div.suolve-bottom-box").stop(true,false)
									   .animate({
										   "height":bottom_height
									   });
				$(this).find("img.picture").stop(true,false).animate({
										"height":img_height,
										"width":img_width,
										"top":"0px",
										"left":"0px"
								});
				$(this).children("div.top-shawdow").stop(true,false).fadeOut();
				$(this).find("div.resume-box").stop(true,false).delay().animate({
								top:"150px"
							});
				$(this).find("div.resume-box").children()
											  .first()
											  .find("span").stop(true,false).fadeOut();
			}
			 	$(this).children("div.suolve-top-box").animate({
					"height":top_height,
				});
				$(this).find("img.picture").animate({
					"height":img_height,
					"width":img_width,
					"top":"0px",
					"left":"0px"
				})
				$(this).children("div.suolve-bottom-box").animate({	
						"height":bottom_height
				});
				$(this).find("div.top-shawdow").fadeOut();
				$(this).find("div.resume-box").delay().show().animate({
					top:"150px"
				});
				$(this).find("div.resume-box").children()
							   .first()
							   .find("span")
							   .fadeOut();
		});
	});

	/**************************************************以下为点击缩略图“照片”实现查看照片前端功能 ***************************************************************/
	
	// console.log($(".see-picture span").html());
	

	$("div.suolve").each(function(index,element){
		$(this).find(".see-picture").click(function(){
			$("div.shadow-box").show();
			var $shadow_width = $("div.shadow-box").width(),
			$shadow_height = $("div.shadow-box").height();
			var $picture_width = $("div.picture-box").width(),
			$picture_height = $("div.picture-box").height();
			$("div.picture-box").wrap("<center></center>"); 
			$("div.picture-box").animate({
				"top": ($shadow_height - $picture_height)/2 + "px",
			});
			
			document.onkeydown=function(event){
				var e = event || window.event || arguments.callee.caller.arguments[0];
				if(e && e.keyCode==27){ // 按 Esc 
					$("div.picture-box").animate({
						"top":"-1000px",
					},function(){
						$("div.shadow-box").hide();
					});
					
				 }
			}  
		});
	});

	/***************************************以下为点击电话号码，跳转到查看详细简历页************************************/
	$("div.suolve").find("li.phone-number").click(function(){
		window.location.href = "uneditable.php";
	});


	}); 



// $(function(){
// 	console.log("已经执行");
// 	$(".pagination").find("li").click(function(){
// 		$(this).addClass("active").siblings().removeClass("active");
// 	});
// })