

Vue.component("test1",{
    template:"<div class = 'component-test'>测试用组件1</div>"
});
Vue.component("test2",{
    template:"<div class = 'component-test'>测试用组件2</div>"
});

Vue.component("tag",{
    template:"#tag",
    props:{
        taglist:{
            type:Array
        },
    },
    data:function(){
        return {
            currentTagList:this.taglist,
            activeTitle:0  // ！！！ 如果改为其他值，即默认初始显示不是第一页，那么在样式特效行为上可能会出现崩坏，暂时不知解决方法以及崩坏原因。
        };
    },
    methods:{
        updateActive(index){
          this.activeTitle = index;
        },
        tabCls(index){
            return this.activeTitle == index;
        },
        tellIndex(){
            _this = this;
            var panelComps = this.$children.filter(function(pannel){
                return pannel.$options.name == "pannelText";
            });
            panelComps.forEach(function(pannel,index){           
                pannel.myIndex = index;
            });
        }
    },
    watch:{
        // activeTitle:function(){
            
        // }
    },
    mounted(){
        this.tellIndex();
    }
});

Vue.component("pannel",{
    name : "pannelText",
    template:"#pannel",
    props:{
        activePannel:{
            type:Number
        },
    },
    data:function(){
        return {
            currentActivePannel:this.activePannel,
            myIndex:"",
            show:"",
           
        };
    },
    methods:{
        // aasd(){
        //     console.log("你找错人了");
        // }
    },
    watch:{
        activePannel(){
            this.currentActivePannel = this.activePannel;
        },
        currentActivePannel(){
            /*当切换pannel时再次确认myIndex是否和currentActivePannel相等 */
            this.show = this.myIndex == this.currentActivePannel;
        },
        myIndex(){
            /* 主要用于初始化和改变顺序过程，因为在加载pannel组件期间，父元素还没有tellIndex(),所以myIndex和show都为空值，show会因此是true */
            this.show = this.myIndex == this.currentActivePannel;
        }
    },
    mounted:function(){
        // ... */
    }
});

Vue.component("checkbar",{
    template:"#checkbar",
    
    data:function(){
        return {
            searchText:"",
            searchType:"",
            newType:""
        };
    },
    methods:{
        typeSelect(event){
            // console.log(event.target.innerHTML);
            this.$refs.selectbtn.innerHTML = event.target.innerHTML + "<span class='caret'></span>";
            this.$emit("key-type-update",event.target.innerHTML);
        }   
    },
    watch:{
        searchText(){
            this.$emit("keystrupdate",this.searchText);
        }
    }
});

Vue.component("classified",{
    template:"#classified",
    props:{
        keyStr:{
            type:String,
            default:"前端"
        },
        keyType:{
            type:String,
            default:""
        },
        delIndex:{
            type:Object
        }
    },
    data:function(){
        return {
            currentKeyStr:this.keyStr,
            currentKeyType:this.keyType,
            items:[
//				{
//                data:"0505",
//                imgSrc:["img/personalpage/yoom2.jpg","img/personalpage/yoom.jpg"], 
//                title:"前端工程师面试成功",
//                keyWords:["web前端","自定义","关键词","标签"],
//                resume:"大家好，我想要成为一名优秀的前端工程师，因此我每天学习都很开心，所以我非常的喜欢魂魄妖梦，我非常喜欢妖梦。妖梦给了我很多的动力！我是从幻想万华镜中了解到妖梦的，之所以我喜欢，是因为他太萌了，蝴蝶结魅力十足，蝴蝶结赛高，裸腿赛高，波波头赛高！",
//                type:"前端",
//                num:"18843163425"
//            },
//            {
//                data:"0606",
//                imgSrc:["img/personalpage/yoom.jpg"],
//                title:"数学建模国赛一等奖",
//                keyWords:["国赛","数学建模","一等奖","激动"],
//                resume:"历经了半个数十家的数学建模培训，虽然劳累，但是收获了国赛一等奖还是非常值得的。",
//                type:"前端",
//                num:"18845123698"
//            }
			],
            the_user_opt : {
                the_user:the_user
            },
            pagination:{
                page:1,
            },
        };
    },
    methods:{
        getPersonalMessage(){
            this.$http.post("personal_page.php",{the_user:the_user},{emulateJSON:true}).then(function(response){
//                 this.items.push(JSON.parse(JSON.stringify(response.body)));
//                 console.log(JSON.parse(JSON.stringify(response.body)));
                var _items = JSON.parse(JSON.stringify(response.body))
                for(var item in _items){
                    this.items.push(JSON.parse(JSON.stringify(response.body))[item]);
                }
            },function(){
                console.log("请求失败");
            });
        },
        claMatch(item,str){
            if(this.currentKeyType == document.getElementById("all").innerHTML){
                console.log(document.getElementById("all").innerHTML);
                var regType = new RegExp();
            } else {
                var regType = new RegExp(this.currentKeyType);
            }
            var regStr = new RegExp(str.trim()); // 最开始记反了，在RegExp中的字符串应该是要匹配的内容
            return  regType.test(item.type) && regStr.test(item.title);
        },
        showContents(index){  // 翻页栏用的
            /* index应该是前面传来的index + 1 ，这里的index是指从1开始的*/
            return index > (this.pagination.page -1) * 4 && index <= this.pagination.page*4; 
        },
        changePage(index){  // 翻页栏用的
            if(typeof index == "number"){
                var reIndex = index;
                this.pagination.page = index;
            } else {
                var reIndex = index.realCounts;
                this.pagination.page = index.realCounts;
            }
            
            if(reIndex == 0){
                this.pagination.page = 1;
            } else if(reIndex == Math.ceil((this.items.length / 4) + 1))
            {   
                console.log(this.pageCountCompute);
                this.pagination.page = this.pageCountCompute.realCounts;
            }
            
        },
        delAchievement(){
            this.items.splice(this.delIndex.index,1);
        },
        toCheckAchievement(id){
            window.location.href = "look.php?"+"id="+id; 
        }
    },
    computed:{
        pageCountCompute(){ // 翻页栏用的
            var pageCount = Math.ceil(this.items.length / 4);
            // console.log({counts:pageCount,shrunk:false});
            return pageCount > 6 ? {counts:4,realCounts:pageCount,shrunk:true} : {counts:pageCount,realCounts:pageCount,shrunk:false};
        },
    },
    watch:{
       keyStr(){
            this.currentKeyStr = this.keyStr;
       },
       keyType(){
            this.currentKeyType = this.keyType;
       },
       delIndex(){
           this.delAchievement();
       }
    },
    mounted(){
        this.getPersonalMessage();
        // this.$emit("keyStrUpdate");
    }
});
Vue.component("overview",{
    template:"#overview",
    data:function(){
        return {
            /*item中的信息应该来自于php，本组件向php发送Ajax请求*/
            items:[
//				{
//                    data:"0505",
//                    imgSrc:["img/personalpage/yoom2.jpg"],
//                    title:"前端工程师面试成功",
//                    keyWords:["web前端","自定义","关键词","标签"],
//                    resume:"大家好，我想要成为一名优秀的前端工程师，因此我每天学习都很开心，所以我非常的喜欢魂魄妖梦，我非常喜欢妖梦。妖梦给了我很多的动力！我是从幻想万华镜中了解到妖梦的，之所以我喜欢，是因为他太萌了，蝴蝶结魅力十足，蝴蝶结赛高，裸腿赛高，波波头赛高！",
//                    type:"数学建模",
//                    num:"18843163425"
//                },
//                {
//                    data:"0606",
//                    imgSrc:["img/personalpage/头像涅普.jpg"],
//                    title:"数学建模国赛一等奖",
//                    keyWords:["国赛","数学建模","一等奖","激动"],
//                    resume:"历经了半个数十家的数学建模培训，虽然劳累，但是收获了国赛一等奖还是非常值得的。",
//                    type:"红色行动",
//                    num:"18845123698"
//                }
			],
            the_user_opt : {
                the_user:the_user
            },
            pagination:{  // 翻页栏出现致命错误，暂时取消翻页栏
                page:1,
            },
            p:0 // 在delAchievement函数中应用的，因为如果总是删除同一位置的成就，传过去的索引就总是相同的，
                // 也就不会被overview组件中的watch发现，因此p就必须作为区别每一次删除的标识
        };
    },
    methods:{
        getPersonalMessage(){
            this.$http.post("personal_page.php",{the_user:the_user},{emulateJSON:true}).then(function(response){
                // this.items.push(JSON.parse(JSON.stringify(response.body)));
                console.log(JSON.parse(JSON.stringify(response.body)));
                var _items = JSON.parse(JSON.stringify(response.body))
                for(var item in _items){
                    this.items.push(JSON.parse(JSON.stringify(response.body))[item]);
                }
                
            },function(){
                console.log("请求失败");
            });
        },
        showContents(index){ // 翻页栏出现致命错误，暂时取消翻页栏
            /* index应该是前面传来的index + 1 ，这里的index是指从1开始的*/
            return index > (this.pagination.page -1) * 9 && index <= this.pagination.page*9; 
        },
        changePage(index){ // 翻页栏出现致命错误，暂时取消翻页栏
            if(typeof index == "number"){
                var reIndex = index;
                this.pagination.page = index;
            } else {
                var reIndex = index.realCounts;
                this.pagination.page = index.realCounts;
            }
            
            if(reIndex == 0){
                this.pagination.page = 1;
            } else if(reIndex == Math.ceil((this.items.length / 9) + 1))
            {   
                console.log(this.pageCountCompute);
                this.pagination.page = this.pageCountCompute.realCounts;
            }   
        },
        delAchievement(id,index){
            var _this = this;
            if(confirm("确认删除这篇成就么，删除后将无法找回！")){
                this.$http.post("delachievement.php",{the_user:the_user,the_id:id},{emulateJSON:true})
                .then(response => {
                    
                },response => {
                 console.log("删除请求失败");
                });
                // $(".white").eq(index).hide(500,function(){
                //     console.log("执行完成");
                // });
                _this.items.splice(index,1);
                this.$emit("del-achievement",{index:index,p:this.p++});
            }
            else{
                return;
            }
        },
        toCheckAchievement(id){
            window.location.href = "look.php?"+"id="+id; 
        }
    },
    computed:{
        pageCountCompute(){ // 翻页栏出现致命错误，暂时取消翻页栏
            var pageCount = Math.ceil(this.items.length / 9);
            // console.log({counts:pageCount,shrunk:false});
            return pageCount > 6 ? {counts:4,realCounts:pageCount,shrunk:true} : {counts:pageCount,realCounts:pageCount,shrunk:false};
        },
    },
    mounted(){
        this.getPersonalMessage();
        
    }
        

    
});

new Vue({
    el:"#right",
    name:"right",
    data:{
        tagList:["预览全部","我的成就"], // 这个未必用的上
        keyStr:"",
        keyType:"",
        warnShow:true,
        delIndex:undefined
    },
    methods:{
        keystrupdate(key){
            this.keyStr = key;
        },
        keyTypeUpdate(key){
            this.keyType = key;
        },
        checkInforComplate(){
            // console.log(the_user);
            this.$http.post('re_boolean.php',{the_user:the_user},{emulateJSON:true}).then(function(response){
                // console.log(typeof response.body + "||" + response.body); // 打开注释查看后端返回的宣言
                this.warnShow = response.body;
            },function(response){
                console.log("请求失败" + "错误主体为：" + response);
            }); 
        },
        delAchievement(index){
            this.delIndex = index;
        }
    },
    mounted(){
        this.checkInforComplate();
    }
});

