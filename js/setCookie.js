/*
    本js文件为模拟服务器端发送的cookie，在这js解决
*/

function setCookie(name,value,expireDays){
    // "name=value; expires=GMTSting;
    var exdate = new Date();
    if(expireDays == null){
        document.cookie = name + "" + escape(value) + ";"
    } else {
        exdate.setDate(exdate.getDate() + expireDays);
        document.cookie = name + "=" + escape(value) + ";" + " " + "expires=" + exdate.toGMTString() + ";";
    }
};

setCookie("the_user","15",1);