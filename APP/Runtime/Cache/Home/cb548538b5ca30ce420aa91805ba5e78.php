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
				<li class="fl "><a href="<?php echo U('Index/index');?>">首页</a></li>
				<li class="fl "><a href="<?php echo U('Square/square');?>">广场</a></li>
				<li class="fl cu"><a href="<?php echo U('Mall/mall');?>">商城</a></li>
				<li class="fl "><a href="<?php echo U('Order/order');?>">排行榜</a></li>
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
				<a href="<?php echo U('Mall/mall_prop');?>" class=""> 道具</a>
			</div>
			<div class="mall-top-title">
				<a href="<?php echo U('Mall/mall_ride');?>" class="mselect"> 座驾</a>
			</div>
		</div>
		<div class="clear"></div>

		<!-- 道具-->
		<div class="mall-list">
			<pre></pre>
			<div class="mall-car-box">
				<div class="mall-car-top">蝌蚪骑士</div>
				<div class="mall-car-mid mcar100 clearFix">
					<img
						src="http://img.kedo.tv/4e3b51a49b2ab9ffaded9d525ca03890?p=0&amp;w=164&amp;h=204">
				</div>
				<div class="mall-car-bot clearFix">
					<span
						style="display:inline-block;margin-right: 12px;margin-left: 10px;">0</span><span>蝌蚪币</span>
				</div>
				<div class="mall-car-but clearFix">
					<button onclick="javascript:buy_car('','蝌蚪骑士','0')">购买</button>
				</div>
				<div class="mall-car-p">
					<span></span>
				</div>
			</div>
			<div class="mall-car-box">
				<div class="mall-car-top">青蛙骑士</div>
				<div class="mall-car-mid mcar100 clearFix">
					<img
						src="http://img.kedo.tv/992d9667913729472c1bc2e0d5d7df5d?p=0&amp;w=164&amp;h=204">
				</div>
				<div class="mall-car-bot clearFix">
					<span
						style="display:inline-block;margin-right: 12px;margin-left: 10px;">0</span><span>蝌蚪币</span>
				</div>
				<div class="mall-car-but clearFix">
					<button onclick="javascript:buy_car('','青蛙骑士','0')">购买</button>
				</div>
				<div class="mall-car-p">
					<span></span>
				</div>
			</div>
			<div class="mall-car-box">
				<div class="mall-car-top">青蛙国王</div>
				<div class="mall-car-mid mcar100 clearFix">
					<img
						src="http://img.kedo.tv/ce16b40d15e649fb945253f79c8b9ea4?p=0&amp;w=164&amp;h=204">
				</div>
				<div class="mall-car-bot clearFix">
					<span
						style="display:inline-block;margin-right: 12px;margin-left: 10px;">0</span><span>蝌蚪币</span>
				</div>
				<div class="mall-car-but clearFix">
					<button onclick="javascript:buy_car('','青蛙国王','0')">购买</button>
				</div>
				<div class="mall-car-p">
					<span></span>
				</div>
			</div>
			<div class="mall-car-box">
				<div class="mall-car-top">青铜守护</div>
				<div class="mall-car-mid mcar100 clearFix">
					<img
						src="http://img.kedo.tv/c5090ea391419bc128e90719325d62be?p=0&amp;w=164&amp;h=204">
				</div>
				<div class="mall-car-bot clearFix">
					<span
						style="display:inline-block;margin-right: 12px;margin-left: 10px;">0</span><span>蝌蚪币</span>
				</div>
				<div class="mall-car-but clearFix">
					<button onclick="javascript:buy_car('','青铜守护','0')">购买</button>
				</div>
				<div class="mall-car-p">
					<span></span>
				</div>
			</div>
			<div class="mall-car-box">
				<div class="mall-car-top">白银守护</div>
				<div class="mall-car-mid mcar100 clearFix">
					<img
						src="http://img.kedo.tv/4dca91511800d2bd690ec6ae1b28a156?p=0&amp;w=164&amp;h=204">
				</div>
				<div class="mall-car-bot clearFix">
					<span
						style="display:inline-block;margin-right: 12px;margin-left: 10px;">0</span><span>蝌蚪币</span>
				</div>
				<div class="mall-car-but clearFix">
					<button onclick="javascript:buy_car('','白银守护','0')">购买</button>
				</div>
				<div class="mall-car-p">
					<span></span>
				</div>
			</div>
			<div class="mall-car-box">
				<div class="mall-car-top">黄金守护</div>
				<div class="mall-car-mid mcar100 clearFix">
					<img
						src="http://img.kedo.tv/1497f33ec1602182291e91102a8f1126?p=0&amp;w=164&amp;h=204">
				</div>
				<div class="mall-car-bot clearFix">
					<span
						style="display:inline-block;margin-right: 12px;margin-left: 10px;">0</span><span>蝌蚪币</span>
				</div>
				<div class="mall-car-but clearFix">
					<button onclick="javascript:buy_car('','黄金守护','0')">购买</button>
				</div>
				<div class="mall-car-p">
					<span></span>
				</div>
			</div>
		</div>

		<div class="car_tip">
			<h4>温馨提示：</h4>
			<p>购买座驾将享受与别人不同的进场方式，让你处处彰显尊贵，同是购买坐骑将有机会获得限免道具，机会多多，赶快购买吧！</p>
			<a href="javascript:;" class="growLev">消费物品成长等级 &gt;&gt;</a>
		</div>


		<div class="mall-buy-car" style="display: none">
			<span class="clso"
				style="display: inline-block;background: url(/skin/ym/images/guanbi-hover.png) no-repeat;width: 17px;height: 17px;position: absolute;right: 10px;top:10px;cursor: pointer"></span>
			<div class="buy-car-left">
				<div class="buy-car-top">
					<img src="http://www.showself.com/img/shop/big/kenisaige_CCXR.png"
						alt="炮车">
				</div>
				<div class="buy-car-top-bot">座驾有效期为购买之日起30日内,连续购买多个有效期将叠加</div>
			</div>

			<div class="buy-car-right">
				<div class="mall-car-top buy-car-name">知名跑车(1个月)</div>
				<table>
					<tbody>
						<tr>
							<td>购买数量：</td>
							<td><select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
							</select></td>
						</tr>
						<tr>
							<td>应付全额：</td>
							<td><span class="yfmoney">100</span> 蝌蚪笔</td>
						</tr>
						<tr>
							<td>当前余额：</td>
							<td><span class="curmoney">1837</span> 蝌蚪笔</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="buy-car-but">
				<button onclick="buyok()">购买</button>
			</div>
		</div>
	</div>
	<!--div class="zhezhao"></-div-->

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
                <span>上海暴风信息科技有限公司</span>
                <span>联系电话：021-63156389</span>
                <span>蝌蚪客服电话：021-63156389 | 商务合作邮箱：</span>
                <a class="officialMailbox"  href="mailto:mt@mutiantech.com">kd@kedo.tv</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>