
function logout(){
$('#logout').click(function(){
        $.ajax({
            type:'post',
            url:root+'/admin/admin/logout',
            dasta:{},
            dataType:'json',
            success:function(data){
                if(data.status == 1){
                    var url=root+'/admin/index/login.html';
                    return dialog.success("退出成功",function () {
                        location.href = url;
                    });
                }else{
                    dialog.error('退出失败');
                }
            }
        });
    });
}

logout();

/**
 * json数据转url
 * @param $json
 * @returns {string}
 */
function jsonToUrl($json) {
    var str = '';
    $.each($json,function (k,v) {
        str += k+"="+v+"&";
    });
    str = str.substring(0,str.length-1);
    return str;
}

/**
 * 从url中截取参数
 * @returns {{}}
 */
function getUrlJson() {
    var params = location.href.split("#");
    var json = {};
    if(params[1]){
        var param = params[1].split("&");
        var key = [];
        var val = [];
        for (var i=0;i<param.length;i++){
            var arr = param[i].split("=");
            key.push(arr[0]);
            val.push(arr[1]);
        }
        json = getJson(key,val);
    }
    return json;
}

function page(urlquery,json,callback){
    var layer_index = layer.load(2);
    var jsonP = arguments[1]?arguments[1]:null;
    if(!jsonP){
        jsonP = getUrlJson();
    }
    if(!arguments[2]){
        callback = null;
    }
    var href = "";
    if(!$.isEmptyObject(jsonP)){
        href = "#"+jsonToUrl(jsonP);
    }else{
        href = "";
    }
    location.hash = href;
    $.get(urlquery,jsonP,function(res){
        if(res.status){
            layer.close(layer_index);
            $("#pagetable").html(res.data);
            if(callback) {
                callback(res.data);
            }
            var linka = $(".pagination a");
            linka.attr("href","javascript:void(0)");
            var now_p = $(".pagination .active span").text();
            linka.click(function(){
                var pagename = $(this).attr("name");
                if(pagename){
                    now_p = pagename;
                }else{
                    pagename = $(this).attr("class");
                    if(pagename == 'next'){
                        now_p++;
                    }else if(pagename == 'prev'){
                        now_p--;
                    }else if(pagename == 'first'){
                        now_p = 1;
                    }else if(pagename == 'end'){
                        now_p = $(this).text();
                    }
                }
                var index = 0;
                $.each(jsonP,function (k,val) {
                    if(k == 'p'){
                        jsonP[k] = now_p;
                        index = 1;
                    }
                });
                if(index == 0){
                    jsonP.p = now_p;
                }
                page(urlquery,jsonP,callback);
            });
        }else{
            $("#loading").css("display","none");
            $("#pagetable").html(res.info);
            dialog.error(res.info);
        }
        // return window.alert(res.info);
    });
}

/**
 * 回车确认快捷键
 * @param obj
 */
function enter(obj) {
    var cli = arguments[0]?arguments[0]:0;
    $(window).keyup(function (e) {
        if(e.keyCode === 13){
            var btn = $(".layui-layer-btn0");
            var len = btn.length;
            if(len<=0) {
                if(cli != 0) {
                    obj.click();
                }
            }else{
                btn.click();
            }
        }
    });
}

/*
* 双击编辑表格单元格
* obj object 需要点击的表格单元格
* url 需要请求的地址
* callback 传入需要添加的html元素并返回元素的jq对象
* id int 需要修改的列的id
* title text 需要修改的字段名 不设置则不能编辑该单元格
* con text 需要修改的字段对应的内容
* */
function editor(obj,url,callback) {
    var table = arguments[0]?arguments[0]:$("table tr td");
    var postUrl = arguments[1]?arguments[1]:'';
    table.dblclick(function () {
        var con = $.trim($(this).text());
        var id = $.trim($(this).parent().attr("name"));
        var title = $.trim($(this).attr("name"));
        if(!title){
            return false;
        }
        //放置的html元素和对应的选中逻辑
        var saveObj;
        if(callback) {
            saveObj = callback($(this), id, con, title);
        }else{
            //不设置回调则使用默认值
            $(this).html("<input type='text' class='editor_update' value='"+con+"' name='"+id+"' title='"+title+"' style='width: 100%;'>");
            saveObj = $(".editor_update");
        }
        //默认返回对象
        if(!saveObj){
            saveObj = $(".editor_update");
        }
        //获得真实val值
        var setVal = saveObj.val();
        //获取文本框焦点
        saveObj.focus();
        //全选输入框中的文字
        saveObj.select();
        //失去焦点事件
        saveObj.blur(function () {
            var text = $(this).val();
            if(text == setVal){
                $(this).parent().html(con);
                return false;
            }
            var id = $(this).attr("name");
            var title = $(this).attr("title");
            //todo 发请求修改
            $.post(postUrl, {_id: id, title: title, con: text}, function (res) {
                if (res.status) {
                    return location.reload();
                }
                return dialog.error(res.info,function () {
                    location.reload();
                });
            });
        });
        //回车快捷完成编辑
        $(window).keyup(function (e) {
            var code = e.keyCode;
            if(code === 13){
                var blur = saveObj.is(":focus");
                if(blur === false){
                    return false;
                }else{
                    saveObj.blur();
                }
            }
        });
    });
    enter();
}

(function () {
    this.tb = function () {
        return new tbeditor();
    };
    var tbeditor =  function () {
        this.obj = $("table tr td");
        this.url = root+"/updategoods";
        this.callback='';
        this.editor = function () {
            var callback = this.callback;
            var url = this.url;
            this.obj.dblclick(function () {
                var con = $.trim($(this).text());
                var id = $.trim($(this).parent().attr("name"));
                var title = $.trim($(this).attr("name"));
                if (!title) {
                    return false;
                }
                //放置的html元素和对应的选中逻辑
                var saveObj;
                if (callback) {
                    saveObj = callback($(this), id, con, title);
                } else {
                    //不设置回调则使用默认值
                    $(this).html("<input type='text' class='editor_update' value='" + con + "' name='" + id + "' title='" + title + "'>");
                    saveObj = $(".editor_update");
                }
                //默认返回对象
                if (!saveObj) {
                    saveObj = $(".editor_update");
                }
                //获得真实val值
                var setVal = saveObj.val();
                //获取文本框焦点
                saveObj.focus();
                //全选输入框中的文字
                saveObj.select();
                //失去焦点事件
                saveObj.blur(function () {
                    var text = $(this).val();
                    if (text == setVal) {
                        $(this).parent().html(con);
                        return false;
                    }
                    var id = $(this).attr("name");
                    var title = $(this).attr("title");
                    //todo发请求修改
                    $.post(url, {_id: id, title: title, con: text}, function (res) {
                        if (res.status) {
                            return location.reload();
                        }
                        return dialog.error(res.info, function () {
                            location.reload();
                        });
                    });
                });
                //回车快捷完成编辑
                $(window).keyup(function (e) {
                    var code = e.keyCode;
                    if(code === 13){
                        var blur = saveObj.is(":focus");
                        if(blur === false){
                            return false;
                        }else{
                            saveObj.blur();
                        }
                    }
                });
            });
        };
        enter();
    }
})();

/**
 * 通过变量设置json对象的key val
 * @param key
 * @param val
 */
function getJson(key,val) {
    var json = {};
    if(typeof key == 'object'){
        for (var i=0;i<key.length;i++){
            json[key[i]] = val[i];
        }
    }else{
        json[key] = val;
    }
    return json;
}

/**
 * 获取指定日期
 * @param AddDayCount
 * @returns {string}
 * @constructor
 */
function GetDateStr(AddDayCount) {
    var dd = new Date();
    dd.setDate(dd.getDate()+AddDayCount);//获取AddDayCount天后的日期
    var y = dd.getFullYear();
    var m = dd.getMonth()+1;//获取当前月份的日期
    var d = dd.getDate();
    return y+"-"+m+"-"+d+" 00:00:00";
}
enter();

/**
 * layui的table渲染封装
 * @param table
 * @param elem
 * @param url
 * @param limit
 * @param cols
 */
function layTable(table,url,cols,limit,elem) {
    limit = arguments[3]?arguments[3]:10;
    elem = arguments[4]?arguments[4]:'pagetable';
    table.render({
        elem:'#'+elem,
        url:url,
        request: {
            pageName: 'p' //页码的参数名称，默认：page
            ,limitName: 'page' //每页数据量的参数名，默认：limit
        },
        response: {
            statusName: 'status' //数据状态的字段名称，默认：code
            ,statusCode: 1 //成功的状态码，默认：0
            ,msgName: 'info' //状态信息的字段名称，默认：msg
            ,countName: 'count' //数据总数的字段名称，默认：count
            ,dataName: 'data' //数据列表的字段名称，默认：data
        },
        page:{
            hash:'p',
            next:'下一页',
            prev:"上一页"
        },
        limit:limit,
        loading:true,
        cols:cols
    });
}