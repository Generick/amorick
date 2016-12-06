var m_contents = '<div class="bgmask" style="height: 100%;z-index:20002;display: none;"></div>\
    <div class="login-box-global-css" id="loginbox" style="display: none;">\
        <div class="box_head">\
            <div style="position:relative">\
                <div class="box_close icons Stat 2_3" onclick="winclose()"></div>\
            </div>\
            <ul class="loginswitch">\
                <li id="tab_login" class="regsw"><a href="javascript:void(0)"\
                    onclick="selectTagLoginBox(\'tab_login\');refreshCode();"\
                    id="loginboxLoginbtn">登录</a></li>\
                <li class="" id="tab_reg"><a href="javascript:void(0)"\
                    onclick="selectTagLoginBox(\'tab_reg\');refreshCode();"\
                    id="loginboxRegbtn">注册</a></li>\
            </ul>\
        </div>\
        <div class="clear"></div>\
<div class="rlbox" id="tab_reg_content" style="display: none;">\
            <div class="regbox">\
                <form id="registerForm" method="get" onsubmit="return false;">\
                    <div class="regmail">\
                        <div class="border_center topb">\
                            <input type="text" id="reg_email" style="margin-top:0"\
                                placeholder="帐号(邮箱号)" class="input210">\
                        </div>\
                        <div class="border_right topb"></div>\
                        <div class="oktip"></div>\
                        <div id="mailinputTip" class="regdes" style="display: none;">用于登录</div>\
                        <div class="error" style="display: none;"></div>\
                    </div>\
                    <div class="regnic">\
                        <div class="border_center topb">\
                            <input type="text" id="reg_nickname" placeholder="昵称"\
                                class="input210 f_g">\
                        </div>\
                        <div class="border_right topb"></div>\
                        <div class="oktip"></div>\
                        <div class="error" style="display: none;"></div>\
                    </div>\
                    <div class="regpw">\
                        <div class="border_center topb">\
                            <input type="password" id="reg_password" placeholder="创建密码"\
                                class="input210">\
                        </div>\
                        <div class="border_right topb"></div>\
                        <div class="oktip"></div>\
                        <div id="pwinputTip" class="regdes" style="display: none;">6-30位字符，区分大小写</div>\
                        <span class="pwbar"></span>\
                        <div class="error" style="display: none;"></div>\
                        <div class="pwbar"></div>\
                    </div>\
                    <div class="regpw2">\
                        <div class="border_center topb">\
                            <input type="password" id="reg_repassword" placeholder="确认密码"\
                                class="input210">\
                        </div>\
                        <div class="border_right topb"></div>\
                        <div class="oktip"></div>\
                        <div id="pwinput2Tip" class="regdes" style="display: none;">请再次输入密码\
                        </div>\
                        <div class="error" style="display: none;"></div>\
                    </div>\
                    <div class="regcode">\
                        <div class="border_center topb">\
                            <input type="text" id="reg_vaildcode"\
                                placeholder="验&nbsp;证&nbsp;码" class="input100">\
                            <div class="checkCode"></div>\
                        </div>\
                        <div class="border_right topb"></div>\
                        <img src="" class="yzmimg yzmimg_reg" onclick="refreshRegCode()">\
                        <div class="oktip"></div>\
                        <div class="regdes" onclick="refreshRegCode()">刷新</div>\
                        <div class="error" style="display: none;"></div>\
                    </div>\
                    <p class="agree_p">\
                        <label class="agree"> <input type="checkbox"\
                            checked="true" id="agreement" class="icon_checked fl v-middle">\
                            我已阅读并同意 <a target="_blank" href="#">网站使用协议</a>\
                        </label>\
                    </p>\
                    <button class="Stat 2_1 regbtn" id="regsub" type="button">立即注册</button>\
                </form>\
                <div class="other_login_area">\
                    <span class="other_log_qq"> <a\
                        href="javascript:login.qqlogin()"></a>\
                    </span> <span class="other_log_sina"> <a\
                        href="javascript:login.wxlogin()" class="Stat 2_2"></a>\
                    </span>\
                </div>\
            </div>\
            <div></div>\
        </div>\
<!--登录-->\
        <div class="rlbox" id="tab_login_content" style="display: block;">\
            <div class="regbox logbox">\
                <!--form id="login_form2" onsubmit="return false;"-->\
                <form method="post" id="login_form2" name="login" onsubmit="return false;">\
                    <div class="regmail lip">\
                        <div class="border_center topb">\
                            <input type="text" id="tcuser" placeholder="帐号(邮箱号)"\
                                class="input210" style="color: rgb(153, 153, 153);margin-top:0">\
                        </div>\
                        <div class="border_right topb"></div>\
                        <div class="oktip"></div>\
                        <div style="display:none;" class="regdes">请输入正确的帐号地址</div>\
                        <div class="error" style="display: none;"></div>\
                    </div>\
                    <div class="regpw lip">\
                        <div class="border_center topb">\
                            <input type="password" id="password" name="pwd"  class="input210" placeholder="密码" />\
                        </div>\
                        <div class="border_right topb"></div>\
                        <div class="oktip"></div>\
                        <div class="regdes" style="display: none;">6-30位字符，区分大小写</div>\
                        <div class="error" style="display: none;"></div>\
                        <div class="pwbar"></div>\
                    </div>\
                    <div class="log_yzm lip">\
                        <div class="border_center topb">\
                            <input type="text" id="login_vaildcode" placeholder="验证码"\
                                class="input100">\
                        </div>\
                        <div class="border_right topb"></div>\
                        <img class="yzmimg yzmimg_login" style="width: 65px;"\
                            alt="点击图片切换验证码" onclick="refreshCode();"\
                            src="">\
                        <div class="oktip"></div>\
                        <div class="regdes" onclick="refreshCode();">刷新</div>\
                        <div class="error" style="display: none;"></div>\
                        <div class="pwbar"></div>\
                    </div>\
                    <p class="agree_p">\
                        <label class="agree"> <input type="checkbox"\
                            id="tcremember" class="icon_checked fl v-middl" checked="true">\
                            下次自动登录 <a target="_blank" href="javascript:;">忘记密码</a>\
                        </label>\
                    </p>\
                    <button id="loginsub" class="tcloginbtn" type="submit">登 录</button>\
                </form>\
                <div class="other_login_area">\
                    <span class="other_log_qq"> <a\
                        href="javascript:login.qqlogin()"></a>\
                    </span> <span class="other_log_sina"> <a\
                        href="javascript:login.wxlogin()" class="Stat 2_2"></a>\
                    </span>\
                </div>\
            </div>\
        </div>\
    </div>';
function winclose(){
	$('.bgmask').hide();
	$('#loginbox').hide();
}

function login(){
	
}
function reg(){

}

function getLoginUrl(){
	var url0 = $('#m_url').val();
	url1 = url0.split('index.login')[0];
	//url2 = url1+'verify/'+Math.random();
	return url1;
}
function refreshCode(){
	var url = getLoginUrl();
	var url1 = url+'verify/num/'+Math.random();
	$('.yzmimg_login').attr('src',url1);
	//var yzm_login = document.getElementsByClassName("yzmimg_login")[0].setAttribute('src',window.location.href.split('index.html')[0]+'verify/'+Math.random());
}

function refreshRegCode () {
	var url = getLoginUrl();
	var url1 = url+'verify/num/'+Math.random();
	document.getElementsByClassName("yzmimg_reg")[0].setAttribute('src',url1);
	//$('.yzmimg_reg').attr('src',window.location.href.split('index.html')[0]+'verify/'+Math.random());
}

function selectTagLoginBox(showContent){
	$('.loginswitch #tab_login').removeClass('regsw');
	$('.loginswitch #tab_reg').removeClass('regsw');
	$('#tab_login_content').hide();
	$('#tab_reg_content').hide();
	$('.loginswitch #'+showContent).addClass('regsw');
	refreshCode();
	refreshRegCode();
	$('#'+showContent+'_content').show();
}


function index_hover(){
	var rank = $('.rank');
	var rich = $('.rich');
	var fans = $('.fans');
	var my = '.monthcharts,.yearcharts';
	var wy = '.weekcharts,.yearcharts';
	var wm = '.weekcharts,.monthcharts';
	rank.find('.week').hover(function(){
		rank.find(my).hide();
		rank.find('.weekcharts').show();
	});
	rank.find('.month').hover(function(){
		rank.find(wy).hide();
		rank.find('.monthcharts').show();
	});
	rank.find('.year').hover(function(){
		rank.find(wm).hide();
		rank.find('.yearcharts').show();
	});

	rich.find('.week').hover(function(){
		rich.find(my).hide();
		rich.find('.weekcharts').show();
	});
	rich.find('.month').hover(function(){
		rich.find(wy).hide();
		rich.find('.monthcharts').show();
	});
	rich.find('.year').hover(function(){
		rich.find(wm).hide();
		rich.find('.yearcharts').show();
	});

	fans.find('.week').hover(function(){
		fans.find(my).hide();
		fans.find('.weekcharts').show();
	});
	fans.find('.month').hover(function(){
		fans.find(wy).hide();
		fans.find('.monthcharts').show();
	});
	fans.find('.year').hover(function(){
		fans.find(wm).hide();
		fans.find('.yearcharts').show();
	});
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

			var reg = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;
			if (!reg.test(user)) {
				$('#tcuser').parent().siblings('.error').html("邮箱格式不正确.").show();
				return;
			}
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
	show:function(){
		$('.bgmask').show();
		$('#loginbox').show();
		selectTagLoginBox('tab_login');
	},
	checkUser:function(){
		if ($('#tcuser').val() =='') {
			$('#tcuser').parent().siblings('.error').html("请输入账号/邮箱号").show();
			//$('#tcuser').focus();
		}else{
			var username = $('#tcuser').val();
			var reg = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;

			if (!reg.test(username)) {
				$('#tcuser').parent().siblings('.error').html("邮箱格式不正确.").show();
				return;
			}
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
						$('#tcuser').parent().siblings('.error').html("用户名不存在!").show();
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
document.write(m_contents);
reg.prototype = {
	verifyUserName:function(){
		var username = $('#reg_email').val();
		if (username == '' || username.indexOf(' ')>=0) {
			$('#reg_email').parent().siblings('.oktip').hide();
			$('#reg_email').parent().siblings('.error').html('用户名不能为空或者包含空格').show();
			$('#reg_email').focus();
			return;
		}

		var reg = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;
		if (!reg.test(username)) {
			$('#reg_email').parent().siblings('.error').html("邮箱格式不正确.").show();
			return;
		}
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
		$('#reg_email').parent().siblings('.error').hide();
		//console.log('userreg');
		var username = $('#reg_email').val();
		var nickname = $('#reg_nickname').val();
		var password = $('#reg_password').val();
		var verifycode = $('#reg_vaildcode').val();
		if (password.length<6) {
			$('#reg_password').parent().siblings('.error').html("密码长度至少为6位").show();
			return false;
		}

		var reg = /^[0-9a-z][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}[0-9a-z]\.){1,4}[a-z]{2,4}$/;
		if (!reg.test(username)) {
			$('#reg_email').parent().siblings('.error').html("邮箱格式不正确.").show();
			return;
		}
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
				}else if(msg == 2){
					$('.regnic .error').html("昵称中包含有不允许的文字.").show();
				}else if(msg == 3){
					$('.regnic .error').html('此昵称已存在，换一个吧.').show();
				}else{
					//console.log(msg);
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
	},
	show:function(){
		$('.bgmask').show();
		$('#loginbox').show();
		selectTagLoginBox('tab_reg');
		refreshRegCode();
	},
	pwdLength:function(){
		var pwd = $('#reg_password').val();
		if (pwd.length <6) {
			$('#reg_password').parent().siblings('.error').html("密码长度至少为6位").show();
		}else{
			$('#reg_password').parent().siblings('.error').hide();
		}
	},
	nicknameCheck:function(){
		var nickname = $('#reg_nickname').val();
		var url = getLoginUrl();
		$.ajax({
			type:'post',
			url:url+'nicknamecheck',
			data:{'nickname':nickname},
			dataType:'json',
			success:function(msg){
				if (msg ==1 ) {
					$('.regnic .error').html("昵称中包含有不允许的文字.").show();
				}else if(msg == 2){
					$('.regnic .error').html('此昵称已存在，换一个试试吧.').show();
				}else{
					$('.regnic .error').hide();
				}
			}
		});
	},
	agreementCheck:function(){
		checked = $('#agreement').is(':checked');
		if (checked) {
			$('#regsub').attr('disabled',false);
			$('#regsub').css('background-color','#f77599');
		}else{
			$('#regsub').attr('disabled',true);
			$('#regsub').css('background-color','gray');
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
		login.show();
	});
	$('.bgmask').click(function(){
		$('.bgmask').hide();
		$('#loginbox').hide();
	});
	$('.Reg').click(function(){
		reg.show();
	});
	$('#btn_login').on('click',login.show);
	$('.btn_login.regBtn').on('click',reg.show);
	$('.btn_login.qqLog').on('click',login.qqlogin);
	$('.btn_login.weChatLog').on('click',login.wxlogin);
	$('#reg_password').on('blur',reg.pwdLength);
	$('#reg_nickname').on('blur',reg.nicknameCheck);
	$('#agreement').on('click',reg.agreementCheck);
	
	// 首页年月日排行显示隐藏效果
	index_hover();

});