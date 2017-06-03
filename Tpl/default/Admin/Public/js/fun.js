/**
 * Created by dy on 2017/6/3.
 */
var app = "/dyadmin";
/*
* 回车键快捷方式
* @param obj object 快捷按键首次按的jq对象
* @param obj1 object 遮罩层的jq对象
* */
function enter(obj,obj1) {
    $(document).keypress(function (e) {
        if(e.keyCode === 13){
            var dialog_obj = arguments[1]?arguments[1]:$(".layui-layer-btn0");
            var display = dialog_obj.css('display');
            if(display == 'none' || display === undefined) {
                obj.click();
            }else{
                dialog_obj.click();
            }
        }
    });
}
