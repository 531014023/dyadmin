/**
 * Created by dy on 2017/6/3.
 */
var dialog = {
  success: function (content,url) {
      layer.alert(content,{icon:1},function (index) {
          if(url){
              window.location.href = url;
          }
          layer.close(index);
      });
  },
  error:function (content) {
      layer.alert(content,{icon:2},function (index) {
         layer.close(index);
      });
  },
  confirm:function (content,callback) {
      layer.confirm(content,{icon:3},function (index) {
          callback(true);
          layer.close(index);
      },function (index) {
          callback(false);
          layer.close(index);
      });
  },
  prompt:function (callback) {
      layer.prompt(function(value, index){
          callback(value);
          layer.close(index);
      });
  }
};