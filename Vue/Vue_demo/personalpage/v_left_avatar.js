Vue.component("avatar",{
    template:"#left-avatar",
    props:{
        avatar:{
            type:String,
            default:function(){
                return "img/personalpage/头像涅普.jpg";
            },//在父组件没有传递avatar的时候的默认值，传递的为""并不能其效果。
        },
        nickname:{
            type:[String,Number],
            default:function(){
                return "F.directionClear";
            },
            
        },
        manifesto:""

    },
    data:function(){
        return{
            currentAvatar:this.avatar,
            currentNickname:this.nickname,
            currentManifesto:this.manifesto,
        };
    },
    watch:{
        manifesto(){
            this.currentManifesto = this.manifesto;
        }
    },
    methods:{
        
    },
    mounted(){
        
    }
});

