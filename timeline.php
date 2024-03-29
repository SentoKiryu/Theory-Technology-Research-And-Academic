<?php include "fun/index_verify.php";?>
<!DOCTYPE html>
<html>
<head lang="zh-CN">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>指南</title>
 <!--消除浏览器默认样式--> 
<link rel = "stylesheet" type = "text/css" href = "css/cleardefault.css"> 
<link rel="stylesheet" href="css/timeline/public.css">
<!--personal导航栏统一样式-->
<link rel="stylesheet" type = "text/css" href="css/personalpage/personalNav.css">
<script src="JQuery/jquery-3.2.1.min.js"></script>
<script src = "js/jquery_flexslider.js"></script>
 <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src = "js/personalNav.js"></script>
<script src="js/timeline.js"></script>

</head>
<body>
<?php  
include "fun/connect.php";
?>    
<?php include "head.php"?>
<!--以上导航栏-->    

<div class="about-history" id="fzlc">
    <header class="about-title title-white">
        <h3 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">发展历程</h3>
        <p class="wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">HISTORY</p>
    </header>
    <div class="about-history-list wow zoomIn" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: zoomIn;">		
        <div class="flex-viewport" style="overflow: hidden; position: relative;">
            <ul class="slides clearfix list" style="width: 2600%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
             <?php 
				$sql="select time,UNIX_TIMESTAMP(time) AS date,content,activity from a_activity order by date";
	            $data=$link->query($sql);
				while($val=$data->fetch_array()){
			?>
             <li style="width: 253px; float: left; display: block;">
                 <div class="item">
                     <h3><?php echo $val['time'];?>&nbsp;&nbsp;<?php echo $val['activity']; ?></h3>
                     <div class="desc">
                         <p>
                           <?php echo mb_strlen($val['content'],'utf-8')>90 ? mb_substr($val['content'],0,90,'utf-8').'...' : $val['content'];?>
                         </p>
                     </div>
                 </div>
               </li>
                <?php }?> 
<!--
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2016</h3>
                        <div class="desc">
                            <p>
                            公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。
                            </p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2015</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2014</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2013</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2012</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2011</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2010</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2009</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2008</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2007</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
                <li style="width: 253px; float: left; display: block;">
                    <div class="item">
                        <h3>2006</h3>
                        <div class="desc">
                            <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                        </div>
                    </div>
                </li>
-->
                
                <li style="width: 253px; float: left; display: block;"></li>
            </ul>
        </div>
        <ul class="flex-direction-nav">
            <li class="flex-nav-prev"><a class="flex-prev" href="#">&lt;</a></li>
            <li class="flex-nav-next"><a class="flex-next" href="#">&gt;</a></li>
         </ul>
    </div>
<!--
    <div class="swiper-container about-history-swiper hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="item">
                    <h3>2016</h3>
                    <div class="desc">
                        <p>公司立足于当下商业地产市场形势，优化自身资源配置，成立中正小雅，完美实现了婚庆产业链的高效整合。中正人携手并进，筑梦远航，共创辉煌！</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="item">
                    <h3>2015</h3>
                    <div class="desc">
                        <p>公司进行大项目组改制，深化管理层次，确定项目组责任制与分红制，集团凝聚力更上新的台阶。</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="item">
                    <h3>2014</h3>
                    <div class="desc">
                        <p>公司省内外业务进入全面发展阶段，中杭、中翔、中润等项目相继组建，集团公司实现新的跨越。</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="item">
                    <h3>2013</h3>
                    <div class="desc">
                        <p>5月，公司相继成立策划公司、苏州分公司、无锡分公司、公司战略调整，向集团化发展，合并旗下公司成立（杭州中正商业地产管理有限公司）</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="item">
                    <h3>2012</h3>
                    <div class="desc">
                        <p>全球金融危机下，公司稳步发展，全年仍创营业额达5亿</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="item">
                    <h3>2011</h3>
                    <div class="desc">
                        <p>公司版图不断扩张，走出浙江省，走出长三角，相继在安徽、江苏设立分公司</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="item">
                    <h3>2010</h3>
                    <div class="desc">
                        <p>织里中国童装城项目单项销售额达1.68亿。以杭州为大本营，面向浙江省，成立诸暨分公司</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination about-history-pagination"></div>
    </div>
    
-->
</div>

<script>
	$(function(){
		if((navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))){
			//phone
		}else{
			//PC
			$(".about-history-list").flexslider({animation:"slide",slideshow:false,controlNav:false,itemWidth:253,itemMargin:31,prevText:"<",nextText:">",move:1});
		}
	});
</script>
</body>
</html>