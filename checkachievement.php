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
    <!--achievement.css-->
    <link rel = "stylesheet" type="text/css" href = "css/subachievement/achievement.css">
    <title>subachievement</title>
</head>
<body>
<?php include "head.php"?>
<!----------------------------------------以上为导航栏，以下为页面主体------------------------------------------------------------->
    <div class="main-container" id = "main">
        <div class = "pagedescribe">
            <h1>上传个人成就</h1>
            <h3>填写我的成就信息</h3>
            <div class="btn-group type-btn">
                    <button ref = "type" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        类 型 <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li class = "level-1">
                            <a href="#">思政道德</a>
                            <ul class = "level-2 a">
                                <li>栋梁工程</li>
                                <li>青马</li>
                                <li>红色社团</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                            <a href="#">社会实践</a>
                            <ul class = "level-2 b">
                                    <li>N+n助学</li>
                                    <li>志愿服务活动</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                            <a href="#">科学技术&创新创业</a>
                            <ul class = "level-2 c">
                                    <li>数学建模</li>
                                    <li>互联网+</li>
                                    <li>创新训练</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                            <a href="#">社团活动&社会工作</a>
                            <ul class = "level-2 d">
                                <li>班级任职</li>
                                <li>学院任职</li>
                                <li>学校组织任职</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                            <a href="#">职业技能素养</a>
                            <ul class = "level-2 e">
                                <li>扩展</li>
                                <li>职业探索</li>
                                <li>就业指导</li>
                            </ul>
                        </li>
                        <li class = "level-1">
                                <a href="#">文体身心</a>
                                <ul class = "level-2 f">
                                        <li>运行会</li>
                                        <li>心理主题班团活动</li>
                                </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class = "level-1">
                            <a href="#">其他</a>
                        </li>
                    </ul>
            </div>
        </div>
        <tit @update-item = "assignMess"></tit>
        <keywords @update-item = "assignMess"></keywords>
        <resume @update-item = "assignMess"></resume>
        <detail @update-item = "assignMess"></detail>
        <acquaintances @update-item = "assignMess"></acquaintances>
        <pic @update-item = "assignMess"></pic>
        <div class = "save-submit">
            <!-- <button @click = "toSave">保存</button> -->
            <button @click = "toSave">保存</button> <!--暂时解绑-->
            <button @click = "toSubmit">提交</button>
        </div>
    </div>



    <!---------------------------------------------------------------------->

    <template id = "tit">
        <div class = "title">
            <span>标题（不超过10字符）：</span>
            <input ref = "tit_input" type = "text" maxlength = "10" v-model = "title">
        </div>
    </template>


    <template id = "keywords">
        <div class="keywords">
            <ul class = "keywords-list">
                <li>关键词（每个不超过五字符）：</li>
                <li v-for = "x in 5" >
                    <input ref = "key_input" v-model = "keyWords[x-1]" type = "text" maxlength="6">
                </li>
            </ul>
        </div>
    </template>

    <template id = "resume">
        <div class = "resume">
            <!-- <button @click = "show = !show">!show</button> -->
            <div class = "title">
                <h3>个人成就简介（不超过120字符）</h3>
            </div>
            <div class = "point-out">
                <transition name = "cue">
                    <div v-show = "cueShow.success" class="cue alert alert-success alert-dismissible success" role="alert">
                        <button type="button" class="close" ><span aria-hidden="false" @click = "cueShow.success = !cueShow.success">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition>

                <transition name = "cue">
                    <div  v-show = "cueShow.info" class="cue alert alert-info alert-dismissible info" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.info = !cueShow.info">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition> 

                <transition name = "cue">
                    <div  v-show = "cueShow.warning" class="cue alert alert-warning alert-dismissible warning" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.warning = !cueShow.warning">&times;</span></button>
                        <strong>Warning!</strong> 限制12个字符，你现在已经输入{{ length }}个字符了，超出的部分会被裁剪上传哦!~
                    </div>
                </transition>

                <transition name = "cue">
                    <div  v-show = "cueShow.danger" class="cue alert alert-danger alert-dismissible danger" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.danger = !cueShow.danger">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition>
            </div>
            <div class = "resume-edi">
                <div id = "resume-edi-tool"></div>
                <div id = "resume-edi-text"></div>
            </div>
        </div>
    </template>

    <template id = "detail">
        <div class = "detail">
            <div class = "title">
                <h3>成就详细（限制1000字）</h3>
            </div>
            <div class = "point-out">
                <transition name = "cue">
                    <div v-show = "cueShow.success" class="cue alert alert-success alert-dismissible success" role="alert">
                        <button type="button" class="close" ><span aria-hidden="false" @click = "cueShow.success = !cueShow.success">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition>

                <transition name = "cue">
                    <div  v-show = "cueShow.info" class="cue alert alert-info alert-dismissible info" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.info = !cueShow.info">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition> 

                <transition name = "cue">
                    <div  v-show = "cueShow.warning" class="cue alert alert-warning alert-dismissible warning" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.warning = !cueShow.warning">&times;</span></button>
                        <strong>Warning!</strong> 限制12个字符，你现在已经输入{{ length }}个字符了，超出的部分会被裁剪上传哦!~
                    </div>
                </transition>

                <transition name = "cue">
                    <div  v-show = "cueShow.danger" class="cue alert alert-danger alert-dismissible danger" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.danger = !cueShow.danger">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition>
            </div>
            <div class = "detail-edi">
                <div id = "detail-edi-tool"></div>
                <div id = "detail-edi-text"></div>
            </div>
        </div>
    </template>

    <template id = "acquaintances">
            
        <div class = "acquaintances">
            <div class = "title">
                <h3>个人心得</h3>
            </div>
            <div class = "point-out">
                <transition name = "cue">
                    <div v-show = "cueShow.success" class="cue alert alert-success alert-dismissible success" role="alert">
                        <button type="button" class="close" ><span aria-hidden="false" @click = "cueShow.success = !cueShow.success">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition>

                <transition name = "cue">
                    <div  v-show = "cueShow.info" class="cue alert alert-info alert-dismissible info" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.info = !cueShow.info">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition> 

                <transition name = "cue">
                    <div  v-show = "cueShow.warning" class="cue alert alert-warning alert-dismissible warning" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.warning = !cueShow.warning">&times;</span></button>
                        <strong>Warning!</strong> 限制12个字符，你现在已经输入{{ length }}个字符了，超出的部分会被裁剪上传哦!~
                    </div>
                </transition>

                <transition name = "cue">
                    <div  v-show = "cueShow.danger" class="cue alert alert-danger alert-dismissible danger" role="alert">
                        <button type="button" class="close"><span aria-hidden="true" @click = "cueShow.danger = !cueShow.danger">&times;</span></button>
                        <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                </transition>
            <div class = "acquaintances-edi">
                <div id = "acquaintances-edi-tool"></div>
                <div id = "acquaintances-edi-text"></div>
            </div>
        </div>
    </template>

    <template id = "pic">
            <div class = "pic">
                <div class = "title">
                    <h3>图片上传</h3>
                </div>
                <div class = "pic-edi">
                    <div id = "pic-edi-tool"></div>
                    <div id = "pic-edi-text"></div>
                </div>
            </div>
    </template>        
</body>
    
<script src = "Vue/Vue_source/vue2.5.17.js"></script>
<script src = "Vue/Vue_source/vue-resource.min.js"></script>
<script src = "js/getCookie.js"></script>
<script src = "wangEditor-3.1.1/wangEditor.min.js"></script>
<script src = "Vue/Vue_demo/checkachieve/v_checkachieve.js"></script>
<script src = "js/subachievement.js"></script>
</html>
