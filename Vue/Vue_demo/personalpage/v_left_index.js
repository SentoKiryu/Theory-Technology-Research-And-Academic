new Vue({
    el:"#left",
    name:"left",
    data:{
        avatar:"img/personalpage/理直气壮.jpg", // 默认的
        nickname:"F.DirctionClear",
        manifesto:"淡然处之 自己亦是风景",
        manifestoText:""
    },
    methods:{
        updateMani(msg){
            // console.log("index接收到请请求");
            // console.log(msg);
            
            // 每次更新请求一次
            this.manifesto = msg;
            this.postMani();
        },
        getMani(){
            // console.log(the_user);
            this.$http.post('re_manifesto.php',{the_user:the_user},{emulateJSON:true}).then(function(response){
                // console.log(typeof response.body + "||" + response.body); // 打开注释查看后端返回的宣言
                this.manifesto = response.body;
            },function(response){
                console.log("请求失败" + "错误主体为：" + response);
            }); 
        },
        getAvatar(){
            this.$http.post('re_avatar.php',{the_user:the_user},{emulateJSON:true}).then(function(response){
                // console.log(typeof response.body + "||" + response.body); // 打开注释查看后端返回的宣言
                this.avatar = response.body;
            },function(response){
                console.log("请求失败" + "错误主体为：" + response);
            });
        },
        getName(){
            this.$http.post('re_avatar.php',{the_user:the_user},{emulateJSON:true}).then(function(response){
                // console.log(typeof response.body + "||" + response.body); // 打开注释查看后端返回的宣言
                this.nickname = response.body;
            },function(response){
                console.log("请求失败" + "错误主体为：" + response);
            });
        },
        postMani(){
            this.$http.post('set_manifesto.php',{
                the_user:the_user,
                manifesto:this.manifesto
            },{emulateJSON:true}).then(
                function(response){
                    console.log("返回的the_user:" + response.body);
                },function(res){
                    console.log("请求失败" + "错误主体为：" + response);
                }
            );
        }
    },
    mounted:function(){
        this.getMani();
        this.getAvatar();
    }
    // watch maifesto 检测变化
});
