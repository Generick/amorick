<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="utf-8">
<link href="/kedo/Public/css/anchor-level.css" rel="stylesheet">
<title>广场-蝌蚪直播</title>
<meta property="qc:admins" content="105415766763547646">
<meta name="description" content="超人气视频直播互动娱乐社区，在这里你可以展示自己的才艺，也可以跟众多优秀的美女主播在线互动聊天、视频交友">
<link data-fixed="true" href="/kedo/Public/css/square.css" rel="stylesheet">
<link href="/kedo/Public/css/icons.css" rel="stylesheet">
<link href="/kedo/Public/css/index.css" rel="stylesheet">
<link href="/kedo/Public/css/login.css" type="text/css" rel="stylesheet">
</head>
<body style="zoom: 1;">

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
				<li class="fl "><a href="/kedo/index.php/Home">首页</a></li>
				<li class="fl "><a href="<?php echo U('Square/square');?>">广场</a></li>
				<li class="fl "><a href="<?php echo U('Mall/mall');?>">商城</a></li>
				<li class="fl cu"><a href="#">排行榜</a></li>
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

	<div class="main-order">
		<div class="order-list">
			<div class="order-box-outer charmList">
				<div class="order-title">
					<div class="order-title-h1">
						主播魅力榜
						<div class="order-title-bg"></div>
					</div>
				</div>
				<ul id="orderTit">
					<li class="active">总榜</li>
					<li>月榜</li>
					<li>日榜</li>
				</ul>

				<div class="order-box-bg" id="orderBody">
					<div class="order-box-content">
						<div class="orderItem cur">
							<div class="order-box-top">

								<a href="/.html" class="order-box-second">
									<div class="order-second-img">
										<img class="rank_pho"
											src="http://img.kedo.tv/d5feef62c58c4048e42c16ca63a61987"
											alt="苦艾酒"> <span class="secondCrown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite consumelevel-pic_consumelevel_7"></span>苦艾酒
									</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="/.html" target="_blank" class="order-box-first">
									<div class="order-first-img">
										<img class="rank_pho"
											src="http://img.kedo.tv/128474f5fa24aac08adf87c316f3c091"
											alt="小耳朵增可爱"> <span class="crown"></span> <span
											class="crown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite liverlevel-pic_liverlevel_24"></span>小耳朵增可爱
									</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="/.html" class="order-box-third">
									<div class="order-third-img">
										<img class="rank_pho"
											src="http://img.kedo.tv/2c7b5b68ce3f4978df3fee6838ab7111"
											alt="昨天的事情"> <span class="thirdCrown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite liverlevel-pic_liverlevel_22"></span>昨天的事情
									</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="/.html" target="_blank"> <span
											class="number">4.</span> <span
											class="diamond sprite sprite consumelevel-pic_consumelevel_2"></span>
											<span class="order-second-name">赞义大王</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">5.</span> <span
											class="diamond sprite sprite consumelevel-pic_consumelevel_1"></span>
											<span class="order-second-name">头大大</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">6.</span> <span
											class="diamond sprite sprite consumelevel-pic_consumelevel_0"></span>
											<span class="order-second-name">春天的雪花</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">7.</span> <span
											class="diamond sprite sprite consumelevel-pic_consumelevel_0"></span>
											<span class="order-second-name">别问我是谁</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">8.</span> <span
											class="diamond sprite sprite consumelevel-pic_consumelevel_0"></span>
											<span class="order-second-name">晒太阳一号</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">9.</span> <span class="diamond sprite "></span>
											<span class="order-second-name">~姐很~自然~</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">10.</span> <span class="diamond sprite "></span>
											<span class="order-second-name">白糖✔</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">11.</span> <span class="diamond sprite "></span>
											<span class="order-second-name">rongrong</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">12.</span> <span class="diamond sprite "></span>
											<span class="order-second-name">爱，你懂吗</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">13.</span> <span class="diamond sprite "></span>
											<span class="order-second-name">不见不散</span>
									</a></li>
									<li><a href="/.html" target="_blank"> <span
											class="number">14.</span> <span class="diamond sprite "></span>
											<span class="order-second-name">淡伤</span>
									</a></li>

								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁订单胖胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="order-box-outer">
				<div class="order-title">
					<div class="order-title-h1">
						爵位榜
						<div class="order-title-bg"></div>
					</div>
				</div>

				<ul id="orderTit">
					<li class="active">总榜</li>
					<li>月榜</li>
					<li>日榜</li>
				</ul>

				<div class="order-box-bg" id="orderBody">
					<div class="order-box-content">
						<div class="orderItem cur">
							<div class="order-box-top">

								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img class="rank_pho"
											src="http://img.kedo.tv/d5feef62c58c4048e42c16ca63a61987"
											alt="苦艾酒"> <span class="secondCrown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite consumelevel-pic_consumelevel_7"></span>苦艾酒
									</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img class="rank_pho"
											src="http://img.kedo.tv/128474f5fa24aac08adf87c316f3c091"
											alt="小耳朵增可爱"> <span class="crown"></span> <span
											class="crown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite consumelevel-pic_consumelevel_12"></span>小耳朵增可爱
									</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img class="rank_pho"
											src="http://img.kedo.tv/2c7b5b68ce3f4978df3fee6838ab7111"
											alt="昨天的事情"> <span class="thirdCrown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite consumelevel-pic_consumelevel_7"></span>昨天的事情
									</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>

							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>

									<li><a href="javascript:;"> <span class="number">4.</span>
											<span
											class="diamond sprite sprite consumelevel-pic_consumelevel_2"></span>
											<span class="order-second-name">赞义大王</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span
											class="diamond sprite sprite consumelevel-pic_consumelevel_1"></span>
											<span class="order-second-name">头大大</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span
											class="diamond sprite sprite consumelevel-pic_consumelevel_0"></span>
											<span class="order-second-name">春天的雪花</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span
											class="diamond sprite sprite consumelevel-pic_consumelevel_0"></span>
											<span class="order-second-name">别问我是谁</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span
											class="diamond sprite sprite consumelevel-pic_consumelevel_0"></span>
											<span class="order-second-name">晒太阳一号</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="diamond sprite "></span> <span
											class="order-second-name">~姐很~自然~</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="diamond sprite "></span> <span
											class="order-second-name">白糖✔</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="diamond sprite "></span> <span
											class="order-second-name">rongrong</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="diamond sprite "></span> <span
											class="order-second-name">爱，你懂吗</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="diamond sprite "></span> <span
											class="order-second-name">不见不散</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="diamond sprite "></span> <span
											class="order-second-name">淡伤</span>
									</a></li>

								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖问问胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖胖跳脱11衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="order-box-outer">
				<div class="order-title">
					<div class="order-title-h1">
						粉丝活跃榜
						<div class="order-title-bg"></div>
					</div>
				</div>

				<ul id="orderTit">
					<li class="active">总榜</li>
					<li>月榜</li>
					<li>日榜</li>
				</ul>

				<div class="order-box-bg" id="orderBody">
					<div class="order-box-content">
						<div class="orderItem cur">
							<div class="order-box-top">

								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">

										<img class="rank_pho"
											src="http://img.kedo.tv/128474f5fa24aac08adf87c316f3c091"
											alt="小耳朵增可爱"> <span class="secondCrown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite activelevel-pic_activelevel_6"></span>小耳朵增可爱
									</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img class="rank_pho"
											src="http://img.kedo.tv/b809265e1afc3a737571664bfa294eec"
											alt="淡淡DE"> <span class="crown"></span> <span
											class="crown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite activelevel-pic_activelevel_8"></span>淡淡DE
									</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img class="rank_pho"
											src="http://img.kedo.tv/2c7b5b68ce3f4978df3fee6838ab7111"
											alt="昨天的事情"> <span class="thirdCrown"></span>
									</div>
									<div class="order-first-name">
										<span class="sec sprite activelevel-pic_activelevel_6"></span>昨天的事情
									</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>

							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>

									<li><a href="javascript:;"> <span class="number">4.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_5"></span>
											<span class="order-second-name">雅妹妹丶</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_5"></span>
											<span class="order-second-name">滋滋 ぃ</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_5"></span>
											<span class="order-second-name">软软丶</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_4"></span>
											<span class="order-second-name">杀手古德</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_4"></span>
											<span class="order-second-name">春天的雪花</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_4"></span>
											<span class="order-second-name">晒太阳一号</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_4"></span>
											<span class="order-second-name">治愈系❤楠楠</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_4"></span>
											<span class="order-second-name">污力大胸弟</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_4"></span>
											<span class="order-second-name">桃安</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_4"></span>
											<span class="order-second-name">小雨燕</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span
											class="diamond sprite sprite activelevel-pic_activelevel_3"></span>
											<span class="order-second-name">Loong</span>
									</a></li>


								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>


		</div>
	</div>

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