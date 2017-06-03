//{literal}
	var ajax = function(url,type,data){
		$.ajax({
			url:url,
			type:type,
			data:data,
			dataType:"json",
			success:function(res){
				return res;
			},
			error:function(){
				return false;
			}
		});
	}
//{/literal}