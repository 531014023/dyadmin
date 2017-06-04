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
  },
  loading:function (type) {
      type = type||0;
      var index = layer.load(type,{time:10*1000});
      return index;
  },
  msg:function (content,isbtn,callback) {
      layer.msg(content,isbtn?{
          btn:['明白了','知道了'],
          time:0
      }:{
          time:2000
      },function () {
          callback();
      });
  },
  msgicon:function (content,isbtn,icon,callback) {
      layer.msg(content,isbtn?{
          icon:icon,
          btn:['明白了','知道了'],
          time:0
      }:{
          icon:icon,
          time:2000
      },function () {
          callback();
      });
  }
};