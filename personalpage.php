<?php include "fun/index_verify.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="always" name="referrer">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <title>ATC测试个人空间</title>
    <!--JQuery-->
    <script src = "JQuery/jquery-3.2.1.min.js"></script>
    <!-- personalpage.js-->
    <script src = "js/personalpage.js"></script>
    <!--引入personalNav导航栏行为-->
    <script src = "js/personalNav.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--suolve.js-->
    <!-- <script src = "js/personalpage.js"></script> -->
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--消除浏览器默认样式--> 
    <link rel = "stylesheet" type = "text/css" href = "css/cleardefault.css"> 
    <!--personalpage样式--> 
    <link rel = "stylesheet" type = "text/css" href = "css/personalpage/personalpage.css">
    <!--personal导航栏统一样式-->
    <link rel="stylesheet" type = "text/css" href="css/personalpage/personalNav.css">
    <!--suolve.css-->
    <link rel="stylesheet" type = "text/css" href="css/personalpage/overview_suolve.css">
    <!--classified.css-->
    <link rel = "stylesheet" type = "text/css" href = "css/personalpage/classified.css">
    <!--checkbar.css-->
    <link rel="stylesheet" type = "text/css" href="css/personalpage/checkbar.css">
    <style>

    </style>
</head>
<body>
<?php include "fun/connect.php"?>
<?php include "head.php"?>
<!----------------------------------------以上为导航栏，以下为页面主体------------------------------------------------------------->


    <div class="main-container">  <!--页面主体大容器-->
            
        <div class = "info-left-main"  id = "left"> <!--left父组件-->
           <avatar :manifesto = "manifesto" :avatar = "avatar">
                <manifesto @update-mani = "updateMani"></manifesto>
           </avatar>
        </div>

        <div class="info-right-main" id = "right" >  <!--页面主体右侧部分-->
            <template v-if = "warnShow">
                <div class="warning alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Oh! my sheet!!</strong> 你必须完善你的个人信息后，才能使用我站上传功能！ 
                </div>
            </template>
            <tag :taglist = "['预 览 全 部','我 的 成 就']">
                <div class = "pannel-describe" slot = "pannel-describe">你可以在这里查看你的所有以往上传过的成就。“我的成就”中可以按类筛选你已上传的成就。</div>
                <template scope = "props"> <!--props的值来自tag的default slot-->
                    <pannel  :active-pannel = "props.activePannel">
                        <overview slot = "overview" @del-achievement = "delAchievement"></overview>
                    </pannel>
                
                    <pannel  :active-pannel = "props.activePannel">
                        <checkbar slot = "checkbar" @keystrupdate = "keystrupdate" @key-type-update = "keyTypeUpdate"></checkbar>
                        <classified slot = "classified" :key-str = "keyStr" :key-type = "keyType" :del-index = "delIndex"></classified>
                    </pannel>
                </template>
            </tag>

        </div>


        <!-- <div class = "placeholder">PlaceHolder 1800px</div> 巨型占位符 -->


    </div>

    <template id = "checkbar">
        <div class="checkbar-container ">

                <div class="input-group search-input">
                    <input v-model = "searchText" type="text" class="form-control" placeholder="Search for title...">
                </div>
                <div class="btn-group selected-btn">
                    <button ref = "selectbtn" type="button"  class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <!--这里将会改为for循环-->
                        <li><a href="#" id = "all" @click.prevent = "typeSelect($event)">All</a></li>
                        <?php $sqlone="select type from a_activity group by type";
							$dataone=$link->query($sqlone);
                            while($valone=$dataone->fetch_array()){
						?>
                        <li><a href="#" @click.prevent = "typeSelect($event)"><?php echo $valone['type'];?></a></li>
                        <?php }?>
<!--
                        <li role="separator" class="divider"></li>
                        <li><a href="#" @click.prevent = "typeSelect($event)">其他</a></li>
-->
                    </ul>
                </div>
                <div class="btn-group type-btn selected-btn">
                    <a href="edit.php" class="btn btn-primary dropdown-toggle" >
                        编辑成就
                    </a>
<!--
                    <ul class="dropdown-menu">
                        <li class = "level-1">
                            <a href="#">思政道德</a>
                            <ul class = "level-2 a">
                                <li onclick = "location.href = 'achievement.php?type=栋梁工程'">栋梁工程</li>
                                <li onclick = "location.href = 'achievement.php?type=青马'">青马</li>
                                <li onclick = "location.href = 'achievement.php?type=红色社团'">红色社团</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                            <a href="#">社会实践</a>
                            <ul class = "level-2 b">
                                    <li onclick = "location.href = 'achievement.php?type=N+n助学'">N+n助学</li>
                                    <li onclick = "location.href = 'achievement.php?type=志愿服务活动'">志愿服务活动</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                            <a href="#">科学技术&创新创业</a>
                            <ul class = "level-2 c">
                                    <li onclick = "location.href = 'achievement.php?type=数学建模'">数学建模</li>
                                    <li onclick = "location.href = 'achievement.php?type=互联网+'">互联网+</li>
                                    <li onclick = "location.href = 'achievement.php?type=创新训练'">创新训练</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                            <a href="#">社团活动&社会工作</a>
                            <ul class = "level-2 d">
                                <li onclick = "location.href = 'achievement.php?type=班级任职'">班级任职</li>
                                <li onclick = "location.href = 'achievement.php?type=学院任职'">学院任职</li>
                                <li onclick = "location.href = 'achievement.php?type=学校组织任职'">学校组织任职</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                            <a href="#">职业技能素养</a>
                            <ul class = "level-2 e">
                                <li onclick = "location.href = 'achievement.php?type=扩展'">扩展</li>
                                <li onclick = "location.href = 'achievement.php?type=职业探索'">职业探索</li>
                                <li onclick = "location.href = 'achievement.php?type=就业指导'">就业指导</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                                <a href="#">文体身心</a>
                                <ul class = "level-2 f">
                                        <li onclick = "location.href = 'achievement.php?type=运动会'">运行会</li>
                                        <li onclick = "location.href = 'achievement.php?type=心理主题班团活动'">心理主题班团活动</li>
                                </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class = "level-1">
                            <a href="achievement.php">其他</a>
                        </li>
                    </ul>
-->
            </div>
<!--                <hr>-->

        </div>
    </template>

    <!--本组件为classified，可以自行请求ajax数据-->
    <template id = "classified">
        <div class = 'classified-container'>
            <ul>
                <!--因为翻页栏出现致命bug，暂时取消-->
                <!-- <li v-for = "(item,index) in items" v-if = "showContents(index + 1)" v-show = "claMatch(item,currentKeyStr)"> -->
                <li v-for = "(item,index) in items"  v-show = "claMatch(item,currentKeyStr)" @click = "toCheckAchievement(item.num)">
                    <div class = "cla-left">
                        <h2 class = "cla-title" >{{item.title}}</h2>
                        <h3 class = "cla-keywords"><span v-for = "key in item.keyWords">{{key}}</span></h3>
                        <h3 class = "cla-resume">{{item.resume}}</h3>
                        <h4 class = "cla-type-num">
                            <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>&nbsp;<span>{{item.type}}</span>
                            <span class = "num-id" style="display: none"><span class = "id-icon">id:</span>&nbsp;<span>{{item.num}}</span></span>
                        </h4>
                    </div>
            
                    <div class = "cla-right">
                        <div class = "cla-img-box">
                            <img v-for = "img in item.imgSrc" class = "cla-img-1" :src = "img">
                        <div>
                    </div>
                </li>
            </ul>
            <!-- <div class = "pagination"> // 翻页栏临时取消
                <ul>
                    <li v-for = "x in pageCountCompute.counts"   @click = "changePage(x,$event)"><span>{{x}}</span></li>
                    <template v-if = "pageCountCompute.shrunk">
                        <li><span>......</span></li>
                        <li @click = "changePage(pageCountCompute.realCounts,$event)"><span>{{pageCountCompute.realCounts}}</span></li>
                    </template>
                    <li  @click = "changePage(pagination.page - 1)" ><span>上一页</span></li>
                    <li  @click = "changePage(pagination.page + 1)"><span>下一页</span></li>
                    <li  @click = "changePage(1)"><span>首页</span></li>
                    <li  @click = "changePage(pageCountCompute)"><span>尾页</span></li>
                </ul>
            </div> -->
        </div>
    </template>
    <template id = "overview">
        <div class = "overbox">
           <?php 
	          $name=$_SESSION["Atc_Stu_Num"];
	          $sql="select id,no,type,activity,term,title,wintime,content,file_path,addtime from a_achievement where no='$name' and type!='' order by addtime desc";
	          $data=$link->query($sql);
	          while($val=$data->fetch_array()){?>
            <div class = "white">
                <div class="suolve" >
                    <div class="suolve-top-box" >
                        <div class = "del-achievement">
                            <a href="look.php?id=<?php echo $val['id'];?>" class="glyphicon glyphicon-eye-open" title="点击查看" aria-hidden="true"></a>
                        </div>
                        <div class="date">
                            <!--2.时间data yy-dd--> 
                            <span class="day"><?php echo date("d",$val['addtime'])?></span>
                            <span class="month"><?php echo date("m",$val['addtime']) ?></span>
                        </div>
                        <!-- <div class="see-picture">
                            <span>照片</span>
                        </div> -->
                        <div class="top-shawdow" style="display: none;"></div>
                        <!--3.第一张图片的地址 imgSrc-->
                        <img class="picture" src="<?php echo $val['file_path']?>">
                    </div>
                    <div class="suolve-bottom-box">
                        <div class="title-box">
                            <!--4.单次上传的标题信息 title-->
                            <h1 class="title"><?php echo $val['title']?></h1>
                            <h2 class="diy-label">
                                <ul class="liy-label-list">
                                    <li class="label" title="获奖时间"><?php echo $val['wintime']?></li>
                                </ul>
                            </h2>
                            
                            <div class="resume-box" style="display: block; top: 150px;">
                                <div class="resume-content">
                                    <!--6.成就简述，最多120字 resume-->
                                    <span style="display: none; opacity: 1;"><?php echo mb_strlen($val['content'],'utf-8')>90? mb_substr($val['content'],0,90,'utf-8').'...' : $val['content'];?></span>
                                </div>
                            </div>
                        </div>
                        <div class="title-footer">
                            <ul class="type-phone-info">
                                <li class="type">
                                    <ul class="type-list">
                                    <!--7.上传成就类型 type-->
                                        <li class="type-content glyphicon glyphicon-hand-right">&nbsp;<?php echo $val['activity']?></li>
                                    </ul>
                                </li>                          
                            </ul>
                        </div>
                    </div><!--suolve-bottom-box-->
                    
                </div><!--suolve-->
                </div>
                <?php } ?>
            </div>
<!--            </transition-group>-->
    </template>


    <template id = "pannel">
        <div v-show = "show" class = "cc"><!--来自pannel组件-->
            <!-- <h2>{{ currentActivePannel }}</h2> -->
            <slot name = "checkbar"></slot>
            <slot name = "overview"></slot>
            <slot name = "classified"></slot>
            <!--空slot用于备用和占位符测试-->
            <slot></slot>
        </div>
    </template>


    <template id = "tag">
        <div class = "tag-container">
            <slot name = "pannel-describe"></slot>
            <ul class = "title-list">
                <li  
                    v-for = "(tag,index) in currentTagList" class = "titletag" @click = "updateActive(index)"
                    :class = "{'active-title':tabCls(index)}">
                        <span>{{ tag }}</span>
                </li>
            </ul>
            <slot :active-pannel = "activeTitle"></slot>
        </div>
    </template>

<!----------------------------------------以下为左侧内容模板---------------------------------------------------------->


    <template id = "left-avatar">
        <div class = "info-left" id = "info-left">
            <div class = "avatar-header">
                <!--头像与昵称的读取应该来自数据库-->
                <img class = "avatar-header" :src="currentAvatar" style="height:300px ">
                <!--点击图片会跳转到完善信息页面-->
                <span class = "personal-name" title = "点击更换昵称">{{ currentNickname }}</span>
                
                <div class = "manifesto">
                    <p class = "manifesto-text">{{ currentManifesto }}</p>
                </div>
            </div>
            <!--slot内应该插入manifesto组件，如果是游客视角则不必插入任何组件-->
            <slot></slot>
        </div>
    </template>
    

    <template id = "left-manifesto">
            <div class = "my-manifesto">
                <button @click = "maiShow = !maiShow" type="button" class="btn btn-default btn-manifesto">我的宣言</button>
                <transition name = "mani"
                 @before-leave = "maiBeforeLeave"
                 @leave = "maiLeave"
                 @beform-enter = "maiBeforeEnter"
                 @enter = "maiEnter"
                 :css = "false">
                <div v-show = "maiShow" id = "monstrous">
                    <textarea placeholder="input your manifesto..." v-model = "manifestoText"></textarea>
                    <div class = "minor-btn-group-1">
                        <button @click = "updateManifesto(); maiShow = !maiShow"  type="button" class="btn btn-default btn-deliver">发&nbsp;布</button>
                        <button type="button" @click = "maiShow = !maiShow" class="btn btn-default btn-cancel">取&nbsp;消</button>
                    </div>
                </div>
                </transition>
                <button type="button" class="btn btn-default btn-complete" id="info" value="information.php">个人信息</button>
            </div>
    </template>




</body>
<script src="js/getCookie.js"></script>
<!--Velocity-->
<script src = "velocity/velocity.min.js"></script>
<!--Vue2.5.17.js-->
<script src = "Vue/Vue_source/vue2.5.17.js"></script>
<!--Vue-resource-->
<script src = "Vue/Vue_source/vue-resource.min.js"></script>

    <!--左侧头像+宣言展示子组件-->
    <script src = "Vue/Vue_demo/personalpage/v_left_avatar.js"></script>
    <!--左侧按钮组+宣言上传组件-->
    <script src = "Vue/Vue_demo/personalpage/v-left_manifesto.js"></script>
    <!--左侧主体部分父组件-->
<script src = "Vue/Vue_demo/personalpage/v_left_index.js"></script>
<!--右侧父组件-->
<script src = "Vue/Vue_demo/personalpage/v_right_index.js"></script>
<script src="admin/layer/layer.js"></script>
<script>
	$('#info').on('click',function(){
		var id=$(this).val();
			layer.open({
			  type: 2,
			  title:'个人信息',
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