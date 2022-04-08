var E = window.wangEditor;

function getAchievementId(key){
    var _url = window.location.href;
    if(_url.split("?")[1]){
        var kv = _url.split("?")[1].split("&");
        var arr = [];
        for(let i = 0; i <= kv.length-1; i++){
            arr = arr.concat(kv[i].split("="));
            // 之前的错误写法 arr.concat(kv[i].split("=")); 返回的新数组并没有得到操作，
            //原数组并不会变化。如果想要替换原数组就不得不在将新的数组覆盖原有数组！
        }
        if(arr.indexOf(key) != -1){
            return arr[arr.indexOf(key) + 1];
        } else {
            console.log("检查参数是否正确，存在传值但是不存在该键名");
        }
        
    } else {
        console.log("并没有传来任何get值");
        return;
    }
}

Vue.component("keywords",{
    template:"#keywords",
    data:function(){
        return {
            keyWords:[],
            currentKeyWords:{
                keyWords:[]
            }
        };
    },
    mounted(){
        var _this = this;
        this.$refs.key_input.forEach(function(key,index){
            key.onchange = function(){
                _this.currentKeyWords.keyWords[index] = _this.keyWords[index].substr(0,5);
            };
            key.onblur = function(){
                _this.$emit("update-item",_this.currentKeyWords);
            }
        });
    }
});

Vue.component("tit",{
    template:"#tit",
    data:function(){
        return {
            title:"",
            currentTitle:{title:""}
        }
    },
    mounted(){
        var _this = this;
        this.$refs.tit_input.onchange = function(){
            // console.log("开始onchange");
            _this.currentTitle.title = this.value.substr(0,10);
        }
        this.$refs.tit_input.onblur = function(){
            _this.$emit("update-item",_this.currentTitle);
        }
    }
});

Vue.component("resume",{
    template:"#resume",
    data:function(){
        return {
            cueShow:{
                success:false,
                info:false,
                warning:false,
                danger:false
            },
            resume:{resume:""},
            length:0,
            currentLength:0
        };
    },
    compute:{

    },
    mounted(){
            var _this = this;
            var resume_edi = new E("#resume-edi-tool","#resume-edi-text");
            // resume_edi.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
            resume_edi.customConfig.zIndex = 100;
            resume_edi.customConfig.menus = [
                'head',  // 标题
                'bold',  // 粗体
                'fontSize',  // 字号
                'fontName',  // 字体
                'italic',  // 斜体
                'underline',  // 下划线
                'strikeThrough',  // 删除线
                'foreColor',  // 文字颜色
                'backColor',  // 背景颜色
                'link',  // 插入链接
                'list',  // 列表
                'justify',  // 对齐方式
                'quote',  // 引用
                'emoticon',  // 表情
                'image',  // 插入图片
                'table',  // 表格
                'video',  // 插入视频
                'code',  // 插入代码
                'undo',  // 撤销
                'redo'  // 重复
            ];
            
            resume_edi.customConfig.onchange = function(){
                var text = resume_edi.txt.html();
                _this.resume.resume = text.substr(0,1200);
                // alert(resume_edi.txt.html()); 

                _this.length = text.length;
                _this.currentLength = _this.resume.resume.length;

                if(_this.length > 12){
                    _this.cueShow.warning = true;
                    // console.log("大于120了");
                } else {
                    _this.cueShow.warning = false;
                }

                // console.log(resume_edi.innerHTML);
            };

            resume_edi.customConfig.onblur = function(){
                _this.$emit("update-item",_this.resume);
            };


            resume_edi.create();
            
            
        }
});

Vue.component("detail",{
    template:"#detail",
    data:function(){
        return {
            cueShow:{
                success:false,
                info:false,
                warning:false,
                danger:false
            },
            detail:{detail:""},
            length:0,
            currentLength:0
        };
    },
    methods:{

    },
    mounted(){

        // var detail_edi = new E("#detail-edi-tool","#detail-edi-text");
        // detail_edi.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
        // detail_edi.customConfig.zIndex = 100;
        // detail_edi.create();    

        var _this = this;
        var detail_edi = new E("#detail-edi-tool","#detail-edi-text");
        // detail_edi.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
        detail_edi.customConfig.zIndex = 100;
        detail_edi.customConfig.menus = [
            'head',  // 标题
            'bold',  // 粗体
            'fontSize',  // 字号
            'fontName',  // 字体
            'italic',  // 斜体
            'underline',  // 下划线
            'strikeThrough',  // 删除线
            'foreColor',  // 文字颜色
            'backColor',  // 背景颜色
            'link',  // 插入链接
            'list',  // 列表
            'justify',  // 对齐方式
            'quote',  // 引用
            'emoticon',  // 表情
            'image',  // 插入图片
            'table',  // 表格
            'video',  // 插入视频
            'code',  // 插入代码
            'undo',  // 撤销
            'redo'  // 重复
        ];
        
        detail_edi.customConfig.onchange = function(){
            var text = detail_edi.txt.html();

            _this.detail.detail = text.substr(0,10000);
            // console.warn(_this.detail.detail);


            _this.length = text.length;
            _this.currentLength = _this.detail.detail.length;

            if(_this.length > 1000){
                _this.cueShow.warning = true;
                // console.log("大于120了");
            } else {
                _this.cueShow.warning = false;
            }

            // console.log(text + "||" + _this.detail.detail);
        };

        detail_edi.customConfig.onblur = function(){
            _this.$emit("update-item",_this.detail);
        };


        detail_edi.create();
        
        
    }
    
});

Vue.component("acquaintances",{
    template:"#acquaintances",
    data:function(){
        return {
            cueShow:{
                success:false,
                info:false,
                warning:false,
                danger:false
            },
            acquaintances:{acquaintances:""},
            length:0,
            currentLength:0
        };
    },
    mounted(){

//         var acquaintances_edi = new E("#acquaintances-edi-tool","#acquaintances-edi-text");
            // acquaintances_edi.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
            // acquaintances_edi.customConfig.zIndex = 100;
            // acquaintances_edi.create();    

        var _this = this;
        var acquaintances_edi = new E("#acquaintances-edi-tool","#acquaintances-edi-text");
        acquaintances_edi.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
        acquaintances_edi.customConfig.zIndex = 100;
        acquaintances_edi.customConfig.menus = [
            'head',  // 标题
            'bold',  // 粗体
            'fontSize',  // 字号
            'fontName',  // 字体
            'italic',  // 斜体
            'underline',  // 下划线
            'strikeThrough',  // 删除线
            'foreColor',  // 文字颜色
            'backColor',  // 背景颜色
            'link',  // 插入链接
            'list',  // 列表
            'justify',  // 对齐方式
            'quote',  // 引用
            'emoticon',  // 表情
            'image',  // 插入图片
            'table',  // 表格
            'video',  // 插入视频
            'code',  // 插入代码
            'undo',  // 撤销
            'redo'  // 重复
        ];
        acquaintances_edi.customConfig.onchange = function(){
            var text = acquaintances_edi.txt.html();

            _this.acquaintances.acquaintances = text.substr(0,500);
            // console.warn(_this.acquaintances.acquaintances);


            _this.length = text.length;
            _this.currentLength = _this.acquaintances.acquaintances.length;

            if(_this.length > 500){
                _this.cueShow.warning = true;
                // console.log("大于120了");
            } else {
                _this.cueShow.warning = false;
            }

            // console.log(text + "||" + _this.acquaintances.acquaintances);
        };

        acquaintances_edi.customConfig.onblur = function(){
            _this.$emit("update-item",_this.acquaintances);
        };


        acquaintances_edi.create();
        
        
    }
});

Vue.component("pic",{
    template:"#pic",
    data:function(){
        return {
            pic:""
        };
    },
    mounted(){
        var picture_edi = new E("#pic-edi-tool","#pic-edi-text");
        // picture_edi.customConfig.uploadImgServer = '/upload'
        picture_edi.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
        picture_edi.customConfig.zIndex = 100;
        picture_edi.create();
    }
});

var vm = new Vue({
    el:"#main",
    data:{
        item:{ 
            title:"",
            keyWords:[],
            resume:"",
            type:"",
            detail:"",
            acquaintances:"",
            imgSrc:""
        }
    },
    methods:{
        assignMess(Mes){
            if(Mes != ""){
                if(Object.assign){
                    this.item = Object.assign(this.item,Mes);
                } else {
                    console.log("浏览器并不支持ES6的Object.assign对象替换合并方法");
                }
                
            } else {
                // console.log("还有没填的");
            }
        },
        toSave(){ // 暂时解绑，回收功能
            if(this.item.title == ''){
                alert("至少得填写标题才能上传吧！");
                return;
            }
            this.$http.post("xxxx.php",this.item,{emulateJSON:true}).then(function(response){
                console.log(response.body);
            },function(){
                console.log("请求失败");
            });
        },
        toSubmit(){
            if(this.item.title == ''){
                alert("至少得填写标题才能上传吧！");
                return;
            }
            this.item.imgSrc = $(".pic-edi").find("img").attr("src");
            console.log($(".pic-edi").find("img").attr("src"));
            this.$http.post("xxxx.php",this.item,{emulateJSON:true}).then(function(response){
                console.log(response.body);
            },function(){
                console.log("请求失败");
            });
        },
    },
    mounted(){
        var _this = this;
        var btn = $(".type-btn").find("ul.level-2 > li");
        btn.click(function(){
            $(".type-btn").children("button").text($(this).text());
            _this.item.type = $(this).text();
            // console.log($(this).text() + "||" + _this.item.type);
        });
        // this.$http.post("re_type.php",{the_user:the_user},{emulateJSON:true})
        // .then(function(response){
        //     if(response.body){
        //         console.log("请求成功" + response.body);
        //         btn.parent().find(":contains(" + response.body + ")").trigger("click");
        //     }
        // },function(){
        //     console.log("请求没有成功");
        // });
        btn.parent().find(":contains(" + decodeURI(getAchievementId("type")) + ")").trigger("click");
        
    }
});

