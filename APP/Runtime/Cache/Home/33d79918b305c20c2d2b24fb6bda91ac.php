<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="/kedo/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/kedo/Public/css/style.css">
<link href="/kedo/Public/login/css/login.css" rel="stylesheet">
<script type="text/javascript" src="/kedo/Public/js/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="/kedo/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/kedo/Public/js/boot.js"></script>
<script type="text/javascript" src="/kedo/Public/login/js/login.js"></script>
</head>

<body>
	<div class="bgmask" style="height: 100%;z-index:20002;display: block;"></div>
	<div class="login-box-global-css" id="loginbox" style="display: block;">
		<div class="box_head">
			<div style="position:relative">
				<div class="box_close icons Stat 2_3" onclick="winclose()"></div>
			</div>
			<ul class="loginswitch">
				<li id="tab_login" class="regsw"><a href="javascript:void(0)"
					onclick="selectTagLoginBox('tab_login');refreshCode();"
					id="loginboxLoginbtn">登录</a></li>
				<li class="" id="tab_reg"><a href="javascript:void(0)"
					onclick="selectTagLoginBox('tab_reg');refreshCode();"
					id="loginboxRegbtn">注册</a></li>
			</ul>
		</div>
		<div class="clear"></div>
		<!-- 注册 -->
		<div class="rlbox" id="tab_reg_content" style="display: none;">
			<div class="regbox">
				<form id="registerForm" method="get" onsubmit="return false;">
					<div class="regmail">
						<div class="border_center topb">
							<input type="text" id="reg_email" style="margin-top:0"
								placeholder="帐号(邮箱号)" class="input210">
						</div>
						<div class="border_right topb"></div>
						<div class="oktip"></div>
						<div id="mailinputTip" class="regdes" style="display: none;">用于登录</div>
						<div class="error" style="display: none;"></div>
					</div>
					<div class="regnic">
						<div class="border_center topb">
							<input type="text" id="reg_nickname" placeholder="昵称"
								class="input210 f_g">
						</div>
						<div class="border_right topb"></div>
						<div class="oktip"></div>
						<div class="error" style="display: none;"></div>
					</div>
					<div class="regpw">
						<div class="border_center topb">
							<input type="password" id="reg_password" placeholder="创建密码"
								class="input210">
						</div>
						<div class="border_right topb"></div>
						<div class="oktip"></div>
						<div id="pwinputTip" class="regdes" style="display: none;">6-30位字符，区分大小写</div>
						<span class="pwbar"></span>
						<div class="error" style="display: none;"></div>
						<div class="pwbar"></div>
					</div>
					<div class="regpw2">
						<div class="border_center topb">
							<input type="password" id="reg_repassword" placeholder="确认密码"
								class="input210">
						</div>
						<div class="border_right topb"></div>
						<div class="oktip"></div>
						<div id="pwinput2Tip" class="regdes" style="display: none;">请再次输入密码
						</div>
						<div class="error" style="display: none;"></div>
					</div>
					<div class="regcode">
						<div class="border_center topb">
							<input type="text" id="reg_vaildcode"
								placeholder="验&nbsp;证&nbsp;码" class="input100">
							<div class="checkCode"></div>
						</div>
						<div class="border_right topb"></div>
						<img src="/kedo/index.php/Home/Login/verify" class="yzmimg yzmimg_reg" onclick="refreshRegCode()">
						<div class="oktip"></div>
						<div class="regdes" onclick="refreshRegCode()">刷新</div>
						<div class="error" style="display: none;"></div>
					</div>
					<p class="agree_p">
						<label class="agree"> <input type="checkbox"
							checked="true" id="agreement" class="icon_checked fl v-middle">
							我已阅读并同意 <a target="_blank" href="#">网站使用协议</a>
						</label>
					</p>
					<button class="Stat 2_1 regbtn" id="regsub" type="button">立即注册</button>
				</form>
				<div class="other_login_area">
					<span class="other_log_qq"> <a
						href="javascript:login.qqlogin()"></a>
					</span> <span class="other_log_sina"> <a
						href="javascript:login.wxlogin()" class="Stat 2_2"></a>
					</span>
				</div>
			</div>
			<div></div>
		</div>
<!--登录-->
		<div class="rlbox" id="tab_login_content" style="display: block;">
			<div class="regbox logbox">
				<!--form id="login_form2" onsubmit="return false;"-->
				<form method="post" id="login_form2" name="login" onsubmit="return false;">
					<div class="regmail lip">
						<div class="border_center topb">
							<input type="text" id="tcuser" placeholder="帐号(邮箱号)"
								class="input210" style="color: rgb(153, 153, 153);margin-top:0">
						</div>
						<div class="border_right topb"></div>
						<div class="oktip"></div>
						<div style="display:none;" class="regdes">请输入正确的帐号地址</div>
						<div class="error" style="display: none;"></div>
					</div>
					<div class="regpw lip">
						<div class="border_center topb">

							<input type="password" id="password" name="pwd"  class="input210" placeholder="密码" />
						</div>
						<div class="border_right topb"></div>
						<div class="oktip"></div>
						<div class="regdes" style="display: none;">6-30位字符，区分大小写</div>
						<div class="error" style="display: none;"></div>
						<div class="pwbar"></div>
					</div>
					<div class="log_yzm lip">
						<div class="border_center topb">
							<input type="text" id="login_vaildcode" placeholder="验证码"
								class="input100">
						</div>
						<div class="border_right topb"></div>
						<img class="yzmimg yzmimg_login" style="width: 65px;"
							alt="点击图片切换验证码" onclick="refreshCode();"
							src="/kedo/Public/login/img/captcha.jpg">
						<div class="oktip"></div>
						<div class="regdes" onclick="refreshCode();">刷新</div>
						<div class="error" style="display: none;"></div>
						<div class="pwbar"></div>
					</div>
					<p class="agree_p">
						<label class="agree"> <input type="checkbox"
							id="tcremember" class="icon_checked fl v-middl" checked="true">
							下次自动登录 <a target="_blank" href="javascript:;">忘记密码</a>
						</label>
					</p>
					<button id="loginsub" class="tcloginbtn" type="submit">登 录</button>
				</form>
				<div class="other_login_area">
					<span class="other_log_qq"> <a
						href="javascript:login.qqlogin()"></a>
					</span> <span class="other_log_sina"> <a
						href="javascript:login.wxlogin()" class="Stat 2_2"></a>
					</span>
				</div>
			</div>
		</div>
	</div>
</body>
</html>