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

$.ajax({
    url:"re_achievement.php",
    type:"post",
    data:{the_user:the_user,id:getAchievementId("id")},
    success:function(response){
        console.log(JSON.parse(response));
        response = JSON.parse(response);
        _type=response.type;
        _title = response.title;
        _keywords = response.keyWords;
        _resume = response.resume;
        _detail = response.detail;
        _acquaintances = response.acquaintances;
        _imgsrc = response.imgSrc;
    },
    error:function(response){
        console.log("请求失败" + response)
    }
});





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
                // console.log(this.currentKeyWords.keyWords);
        var _this = this;
        var keyDom = this.$refs.key_input;
        var int = setInterval(function(){
            try{
                _this.keyWords = _keywords;
                clearInterval(int);
                for(let i = 0; i < keyDom.length; i++){
                    keyDom[i].dispatchEvent(new Event("change"));
                    keyDom[i].dispatchEvent(new Event("blur"));
                }
            } catch(err){
                console.log(err);
                return;
            }
        },200); // php执行速度较慢查询较慢，_title可能还未回调完毕，设置每100毫秒尝试执行一次。

        this.$refs.key_input.forEach(function(key,index){
            
            key.onchange = function(){
                if(_this.keyWords[index]){
                    _this.currentKeyWords.keyWords[index] = _this.keyWords[index].substr(0,5);
                }
                
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
        var titleDom = this.$refs.tit_input;
        var int = setInterval(function(){
            try{
                _this.title = _title;
                var changeEvent = new Event("change");
                var blurEvent = new Event("blur");
                titleDom.dispatchEvent(changeEvent);
                titleDom.dispatchEvent(blurEvent); 
                clearInterval(int);
            } catch(err){
                console.log(err);
                return;
            }
        },100); // php执行速度较慢查询较慢，_title可能还未回调完毕，设置每100毫秒尝试执行一次。
        
        titleDom.onchange = function(){
            // console.log(this.value); 
            _this.currentTitle.title = _this.title.substr(0,10);
        }
        titleDom.onblur = function(){
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
                _this.length = text.length;
                _this.currentLength = _this.resume.resume.length; // 登记一下裁剪后的真实长度
                if(_this.length > 12){
                    _this.cueShow.warning = true;
                } else {
                    _this.cueShow.warning = false;
                }
                _this.$emit("update-item",_this.resume);
            };

            // resume_edi.customConfig.onblur = function(){ // 移植进入change事件，因为wangEditor并没有提供js模拟blur的方法，也不知道为什么在try中向父组件传值始终传的都是空值。
            //     _this.$emit("update-item",_this.resume);
            // };  


            resume_edi.create();

            var int = setInterval(function(){
                try{
                    resume_edi.txt.html(_resume);
                    resume_edi.change();
                    console.log(_this.resume);
                    // _this.$emit("update-item",_this.resume); // 传值始终是空值
                    // console.log(this);
                    // resume_edi.blur();
                    clearInterval(int);
                }
                catch(err)
                {
                    console.log(err);
                    clearInterval(int);
                }
            },200);
            
            
            
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

            _this.$emit("update-item",_this.detail);


            // console.log(text + "||" + _this.detail.detail);
        };

        // detail_edi.customConfig.onblur = function(){
        //     _this.$emit("update-item",_this.detail);
        // };


        detail_edi.create();

        var int = setInterval(function(){
            try{
                detail_edi.txt.html(_detail);
                detail_edi.change();
                // console.log(_this.resume);
                // _this.$emit("update-item",_this.resume); // 传值始终是空值
                // console.log(this);
                // resume_edi.blur();
                clearInterval(int);
            }
            catch(err)
            {
                console.log(err);
                clearInterval(int);
            }
        },200);
        
        
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
            _this.$emit("update-item",_this.acquaintances);
            // console.log(text + "||" + _this.acquaintances.acquaintances);
        };

        // acquaintances_edi.customConfig.onblur = function(){
        //     _this.$emit("update-item",_this.acquaintances);
        // };


        acquaintances_edi.create();

        var int = setInterval(function(){
            try{
                acquaintances_edi.txt.html(_acquaintances);
                acquaintances_edi.change();
                // console.log(_this.acquaintances);
                // _this.$emit("update-item",_this.resume); // 传值始终是空值
                // console.log(this);
                // resume_edi.blur();
                clearInterval(int);
            }
            catch(err)
            {
                console.log(err);
                clearInterval(int);
            }
        },200);
        
        
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
        
        var int = setInterval(function(){
            try{
                picture_edi.txt.html(_imgsrc);
                clearInterval(int);
            }
            catch(err)
            {
                console.log(err);
                clearInterval(int);
            }
        },200);
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
            // console.log($(".pic-edi").find("img").attr("src"));
            // // if(this.item.title == ''){
            // //     alert("至少得填写标题才能上传吧！");
            // //     return;
            // // }
            // // this.$http.post("xxxx.php",this.item,{emulateJSON:true}).then(function(response){
            // //     console.log(response.body);
            // // },function(){
            // //     console.log("请求失败");
            // // });
        },
        toSubmit(){
            if(this.item.title == ''){
                alert("至少得填写标题才能上传吧！");
                return;
            }
            this.item.imgSrc = $(".pic-edi").find("img").attr("src");
            console.log($(".pic-edi").find("img").attr("src"));
            this.$http.post("xxxx.php",
            {
                the_user:the_user,
                item:this.item,
                id:getAchievementId("id")
            },{emulateJSON:true}).then(function(response){
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
        try{
            var int = setInterval(function(){
                console.log(_type);
                $(".type-btn").find("ul.level-2 > li")
                    .parent().find(":contains(" + _type + ")").trigger("click");
                clearInterval(int);
            },200);
        }
        catch(err){
            console.log(err);
            clearInterval(int);
            return;
        }
        
    }
});



