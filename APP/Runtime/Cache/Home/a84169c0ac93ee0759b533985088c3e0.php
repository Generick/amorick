<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="UTF-8">
<title>商城</title>
<link href="/kedo/Public/css/square.css" rel="stylesheet" type="text/css">
<link href="/kedo/Public/css/index.css" rel="stylesheet" type="text/css">
<link href="/kedo/Public/css/login.css" type="text/css" rel="stylesheet">
</head>
<body>
	
<div class="bgmask" style="display: none; height: 100%; z-index: 20002;"></div>
<div class="login-box-global-css" id="loginbox" style="display:none">
    <div class="box_head">
        <div style="position:relative">
            <div class="box_close icons Stat 2_3" onclick="login.close()"></div>
        </div>
        <ul class="loginswitch">
            <li id="tab_login" class="regsw"><a href="javascript:void(0)"
                                                onclick="selectTagLoginBox('tab_login');changeVaildcodeLogin();"
                                                id="loginboxLoginbtn">登录</a></li>
            <li class="" id="tab_reg"><a href="javascript:void(0)"
                                         onclick="selectTagLoginBox('tab_reg');changeVaildcode();"
                                         id="loginboxRegbtn">注册</a></li>
        </ul>
    </div>
    <div class="clear"></div>
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
                    <img title="点击图片切换验证码" class="yzmimg yzmimg_reg"
                         onclick="changeVaildcode()">
                    <div class="oktip"></div>
                    <div class="regdes" onclick="changeVaildcode()">刷新</div>
                    <div class="error" style="display: none;"></div>
                </div>
                <p class="agree_p">
                    <label class="agree"> <input type="checkbox"
                                                 checked="true" id="agreement" class="icon_checked fl v-middle">
                        我已阅读并同意 <a target="_blank" href="/news/4.html">网站使用协议</a>
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
    <div class="rlbox" id="tab_login_content" style="display: block;">
        <div class="regbox logbox">
            <form id="login_form2" onsubmit="return false;">
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
                        <input type="password" placeholder="密码" id="tcpass"
                               class="input210">
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
                         alt="点击图片切换验证码" onclick="changeVaildcodeLogin()">
                    <div class="oktip"></div>
                    <div class="regdes" onclick="changeVaildcodeLogin()">刷新</div>
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

	<div class="head-outer btline">
		<div class="header clearFix">
			<a class="hd_bg fl" href="/"></a>
			<ul class="nav fl">
				<li class="fl "><a href="/kedo/index.php/Home/Index/index">首页</a></li>
				<li class="fl "><a href="/kedo/index.php/Home/Square/square">广场</a></li>
				<li class="fl cu"><a href="/kedo/index.php/Home/'Mall/mall">商城</a></li>
				<li class="fl "><a href="/kedo/index.php/Home/Order/order">排行榜</a></li>
			</ul>

			<div class="input fl">
    <input type="text" placeholder="输入房间号/频道号/ID" id="searchText">
    <a class="search" target="_blank"></a>
</div>
<div class="reg_log" style="margin-left: 300px;margin-top: 30px;">
    <a  href="<?php echo U('Login/index');?>" class="log">登录</a><span class="reg">/注册</span>

</div>
		</div>
	</div>

	<div class="main-mall">
		<div class="mall-top">
			<div class="mall-top-title">
				<a href="<?php echo U('Mall/mall');?>" class=""> 守护</a>
			</div>
			<div class="mall-top-title">
				<a href="<?php echo U('Mall/mall_prop');?>" class="mselect"> 道具</a>
			</div>
			<div class="mall-top-title">
				<a href="<?php echo U('Mall/mall_ride');?>" class=""> 座驾</a>
			</div>
		</div>
		<div class="clear"></div>

		<!-- 道具-->
		<div class="mall-list">

			<div class="mall-box">
				<div class="mall-box-top">
					<div class="mall-gift-img">
						<img
							src="http://static.youku.com/ddshow/img/shopping/big/global-horn_1.png">
					</div>
					<div class="mall-gift-con">
						<div class="mall-gift-tit">全站喇叭</div>
						<div class="mall-gift-mid">男爵以上才可以购买</div>
						<div class="mall-gift-price">
							<span>5789</span><span>蝌蚪币</span><a href="<?php echo U('Pay/pay');?>"
								target="_blank" class="click">购买</a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="mall-box-bot">
					<div class="bot_tit">全站喇叭</div>
					<div class="">1、公爵以上可用特殊礼物</div>
					<div class="">2、使用后可获得发言橙色炫光效果</div>
				</div>
			</div>

		</div>

		<div class="prop_tip">
			<h5>道具说明</h5>
			<p>公爵以上每月获赠免费道具一个，每一种道具对应相等级别，等级不同，购买的道具也不相同，道具可以赠送给主播或者普通用户，主播获得道具将可以兑换成现金普通用户收到道具后可以转赠给主播</p>
		</div>

	</div>
	<!--div class="zhezhao"></div-->

	<div class="zhezhao"></div>

<div class="footer">
    <div class="wrapper">
        <div class="container">
            <p class="relatedLink">
                <a href="/serveiceArgument.php" target="_blank"> 服务协议 </a>| <a
                    href="/help.php"> 客服帮助 </a>
            </p>
            <p class="clearFix copyright">
                <span class="fl logo_footer"></span> <span class="fl copyrightTxt">
						Copyright©2016 沪ICP备14054721号-4</span>
            </p>
            <p>
                <span>上海暴风信息科技有限公司</span> <span>联系电话：021-63156389</span> <span>蝌蚪客服电话：021-63156389
						| 商务合作邮箱：</span> <a class="officialMailbox"
                                            href="mailto:mt@mutiantech.com">kd@kedo.tv</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>