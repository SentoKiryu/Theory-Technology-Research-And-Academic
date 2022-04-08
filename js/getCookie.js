function getCookie(name){
    // "name=value; expires=GMTSting;
    if(document.cookie.length > 0){
        var cookie_list =  document.cookie;
        var start = cookie_list.indexOf(name);
        if(start != -1){
            // "firetCookie=asd; firstCookie=sss"
            var end = document.cookie.indexOf(";",start)
            if(end == -1){
                end = document.cookie.length;
            }
            // console.log("cookie的值为:" + cookie_list.substring(start,end));
            return unescape(cookie_list.substring(start + name.length + 1,end)); // 进行解码，加1是因为还有=号
        } else {
            console.log("没有相应name的cookie");
            return false;
        };
    } else {
        console.log("没有任何的可使用的cookie");
        return false;
    }
};

the_user = getCookie("the_user"); // the_user将会成为整个站点下所有.js文件的共有全局变量（除框架等源码）。