function center(){

};

center.prototype = {
	pwdChk:function(){
		var oldpwd = $('#oldpwd').val();
		var userid = $('#userid').val();
		var url = window.location.href.split('passwd')[0];
		console.log(url);
		$.ajax({
			type:'post',
			url:url+'pwdChk',
			data:{'userid':userid,'oldpwd':oldpwd},
			dataType:'json',
			success:function(msg){
				if (msg==1) {
					console.log('原密码输入错误');
					alert("原密码错误");
				}else if(msg==0){
					console.log('密码正确');
				}
			}
		});
	}
};

var center = new center();

$(document).ready(function(){
	$('#oldpwd').blur(function(){
		center.pwdChk();
	});
});