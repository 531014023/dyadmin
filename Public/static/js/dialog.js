var dialog = {
    error:function (content,callback,icon) {
        var con = arguments[2]?arguments[2]:5;
        layer.alert(content,{icon:con},function (index) {
            layer.close(index);
            if(callback){
                callback();
            }
        });
    },
    success:function (content,callback,icon) {
        var con = arguments[2]?arguments[2]:6;
        layer.alert(content,{icon:con},function (index) {
            layer.close(index);
            if(callback) {
                callback();
            }
        });
    },
    confirm:function (content,callback,icon) {
        var con = arguments[2]?arguments[2]:3;
        layer.confirm(content,{icon:con},function (index) {
            layer.close(index);
            callback();
        });
    },
    prompt:function (title,callback,type) {
        var con = arguments[2]?arguments[2]:0;
        layer.prompt({
            formType:con,
            title:title,
            value:""
        },function (value,index,elem) {
            layer.close(index);
            if(callback){
                callback(value);
            }
        });
    }
};
layer.config({
    extend: 'extend/layer.ext.js'
});