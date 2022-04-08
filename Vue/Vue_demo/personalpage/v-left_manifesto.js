Vue.component("manifesto",{
    template:"#left-manifesto",
    data:function(){
        return {
            manifestoText:"",
            maiShow:false
        };
    },
    methods:{
        updateManifesto:function(){
            this.$emit("update-mani",this.manifestoText);
        },
        //  @before-leave = "maiBeforeLeave"
        //  @leave = "maiLeave"
        //  @beform-enter = "maiBeforeEnter"
        //  @enter = "maiEnter"
        maiBeforeLeave(el){
            // alert("beforeLeave正在执行");
            return;
        },
        maiLeave(el,done){
            // alert("Leave正在执行");
            // Velocity(el,{height:0},{duration:1000,complete:done});
            $(el).animate({height:0},200,done);
        },
        maiBeforeEnter(el){  /*这里有个奇怪的bug，maiBeforeEnter好像执行了但是没有console，并且Enter中的JQ动画没有效果，类名monstrous的div不会受到height属性的控制*/
            console.log("出现了");
            $(el).css("height","0px");
            return;
        },
        maiEnter(el,done){
            $(el).animate({height:"70%"},200,done);
        }
    },
    mounted:function(){
        // console.log(this.$parent);
    }
   
});