function winclose(){
	$('.bgmask').hide();
	$('#loginbox').hide();
}

function login(){
	
}
function reg(){

}

function getLoginUrl(){
	var url0 = $('#url').val();
	url1 = url0.split('index.html')[0];
	//url2 = url1+'verify/'+Math.random();
	return url1;
}
function refreshCode(){
	var url = getLoginUrl();
	var url1 = url+'verify/'+Math.random();
	$('.yzmimg_login').attr('src',url1);
	//var yzm_login = document.getElementsByClassName("yzmimg_login")[0].setAttribute('src',window.location.href.split('index.html')[0]+'verify/'+Math.random());
}

function refreshRegCode () {
	var url = getLoginUrl();
	var url1 = url+'verify/'+Math.random();
	document.getElementsByClassName("yzmimg_reg")[0].setAttribute('src',url1);
	//$('.yzmimg_reg').attr('src',window.location.href.split('index.html')[0]+'verify/'+Math.random());
}

function selectTagLoginBox(showContent){
	refreshCode();
	refreshRegCode();
	$('#tab_login_content').hide();
	$('#tab_reg_content').hide();
	$('.loginswitch #tab_login').removeClass('regsw');
	$('.loginswitch #tab_reg').removeClass('regsw');
	$('.loginswitch #'+showContent).addClass('regsw');
	$('#'+showContent+'_content').show();
}

login.prototype = {
	signin:function(){
		$('#password .error').hide();
		$('.log_yzm .error').hide();
		if ($('#tcuser').val() == '') {
			console.log('null');
			$('#tcuser').parent().siblings('.error').html("请输入邮箱号/账号").show();
			$('#tcuser').focus();
		}else if($('#password').val() == ''){
			$('#password').parent().siblings('.error').html("请输入密码!").show();
			// $('#password').focus();
			console.log('null');
		}else if($('#login_vaildcode').val() == ''){
			$('.log_yzm .error').html('请输入验证码!').show();
			$('#login_vaildcode').focus();
		}else{
			var user = $('#tcuser').val();
			var pwd = $('#password').val();
			var vaildcode = $('#login_vaildcode').val();
			var checked = $('#tcremember').is(':checked');
			//var url = window.location.href.split('index.html')[0];
			var url = getLoginUrl();
			$.ajax({
				type:'post',
				url:url+'login',
				data:{'username':user,'password':pwd,'vaildcode':vaildcode,'checked':checked},
				dataType:'json',
				success:function(msg){
					if (msg.code==0) {
						//console.log(msg.url);
						//console.log(msg.userid);
						//console.log(msg);
						window.location.href = msg.url;
					}else if(msg.code==1){
						console.log("密码错误");
						$('#password').parent().siblings('.error').html('密码错误！').show();
						console.log(msg);
					}else{
						//console.log('验证码错误');
						$('.log_yzm .error').html('验证码错误！').show();
					}
					
				}
			});
		}
	},
	pwdNull:function(){
		if($('#password').val() == ''){
			$('#password').parent().siblings('.error').html("密码不能为空!").show();
			$('#password').focus();
		}else{
			$('#password').parent().siblings('.error').hide();
		}
	},
	signout:function(){
		//alert("jjj");
	},
	checkUser:function(){
		if ($('#tcuser').val() =='') {
			$('#tcuser').parent().siblings('.error').html("请输入账号/邮箱号").show();
			//$('#tcuser').focus();
		}else{
			var username = $('#tcuser').val();
			$('#tcuser').parent().siblings('.error').hide();
			//var url = window.location.href.split('index.html')[0];
			var url = getLoginUrl();
			$.ajax({
				type:'post',
				url:url+'checkedUser',
				data:{'username':username},
				dataType:'json',
				success:function(msg){
					if (msg == 0) {
						console.log('用户名不正确!');
						$('#tcuser').parent().siblings('.error').html("用户名不正确!").show();
						//$('#tcuser').focus();
					}else{
						console.log('ok');
						$('#tcuser').parent().siblings('.oktip').show();
					}
				}
			});
		}
	},
	close:function(){
		return false;
	},
	qqlogin:function(){
		var w=500;
        var h=400;
        //var url = window.location.href.split('index.html')[0];
        var url = getLoginUrl();
        //console.log(url);
　　  	window.open(url+'qqlogin','snslogin','top='+(window.screen.height-h)/2+',left='+(window.screen.width-w)/2+',width='+w+',height='+h);
	},
	wxlogin:function(){
		var w = 580;
		var h = 580;
		var redirect_uri="http%3a%2f%2fwww.kedo.tv%2fopensns%2fweixin%2findex.php";
		window.open('https://open.weixin.qq.com/connect/qrconnect?appid=wxedb924ffe29990ab&redirect_uri='+redirect_uri+'&response_type=code&scope=snsapi_login&state=STATE#wechat_redirect','snslogin','top='+(window.screen.height-h)/2+',left='+(window.screen.width-w)/2+',width='+w+',height='+h);
	}
};

reg.prototype = {
	verifyUserName:function(){
		var username = $('#reg_email').val();
		if (username == '' || username.indexOf(' ')>=0) {
			$('#reg_email').parent().siblings('.oktip').hide();
			$('#reg_email').parent().siblings('.error').html('用户名不能为空或者包含空格').show();
			$('#reg_email').focus();
			return;
		}
		//var url = window.location.href.split('index.html')[0];
		var url = getLoginUrl();
		$.ajax({
			type:'post',
			url:url+'checkedUser',
			data:{'username':username},
			dataType:'json',
			success:function(msg){
				if (msg == 1) {
					$('.reg_email').parent().siblings('.oktip').hide();
					$('#reg_email').parent().siblings('.error').html("此用户名已被注册，换个试试吧").show();
				}else{
					$('#reg_email').parent().siblings('.error').hide();
					$('#reg_email').parent().siblings('.oktip').show();
					console.log('ok');
				}
			}
		});
	},
	UserReg:function(){
		$('.regcode .error').hide();
		//console.log('userreg');
		var username = $('#reg_email').val();
		var nickname = $('#reg_nickname').val();
		var password = $('#reg_password').val();
		var verifycode = $('#reg_vaildcode').val();
		//var url = window.location.href.split('index.html')[0];
		var url = getLoginUrl();
		$.ajax({
			type:'post',
			url:url+'regUser',
			data:{'username':username,'password':password,'nickname':nickname,'verifycode':verifycode},
			dataType:'json',
			success:function(msg){
				if (msg == 1) {
					console.log('验证码错误'+msg);
					$('.regcode .error').html('验证码错误').show();
				}else if(msg == 0){
					console.log("注册失败");
				}else{
					console.log(msg);
					window.location.href = msg.url;
				}
				//console.log(msg);
			}
		});
	},
	samePassword:function(){
		//console.log('dd');
		var pwd = $('#reg_password').val();
		var repwd = $('#reg_repassword').val();
		if (pwd !== repwd) {
			$('.regpw2 .error').html('两次密码不一致!').show();
		}else{
			$('.regpw2 .error').hide();
		}
	}
};

var login = new login();
var reg = new reg();


$(document).ready(function(){
	refreshCode();
	$('.tcloginbtn').click(function(){
		login.signin();
	});
	$('#tcuser').blur(function(){
		login.checkUser();
	});
	$('#reg_email').blur(function(){
		reg.verifyUserName();
	});
	$('#regsub').click(function(){
		reg.UserReg();
	});
	$('#reg_repassword').blur(function(){
		reg.samePassword();
	});
	$('#password').blur(function(){
		login.pwdNull();
	});
	$('.login').click(function(){
		$('.bgmask').show();
		$('#loginbox').show();
		refreshCode();
	});
	$('.bgmask').click(function(){
		$('.bgmask').hide();
		$('#loginbox').hide();
	});
	$('.Reg').click(function(){
		$('.bgmask').show();
		$('#loginbox').show();
		selectTagLoginBox('tab_reg');
		refreshRegCode();
	});
});