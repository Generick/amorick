<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="utf-8">
<link href="/kedo/Public/css/anchor-level.css" rel="stylesheet">
<title>广场-蝌蚪直播</title>
<meta property="qc:admins" content="105415766763547646">
<meta name="description"
	content="超人气视频直播互动娱乐社区，在这里你可以展示自己的才艺，也可以跟众多优秀的美女主播在线互动聊天、视频交友">
<link data-fixed="true" href="/kedo/Public/css/square.css" rel="stylesheet">
<link href="/kedo/Public/css/icons.css" rel="stylesheet">
<link href="/kedo/Public/css/login.css" type="text/css" rel="stylesheet">
<link href="/kedo/Public/css/index.css" rel="stylesheet">
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
				<li class="fl "><a href="/kedo/index.php/Home/Index/index">首页</a></li>
				<li class="fl cu"><a href="#">广场</a></li>
				<li class="fl "><a href="/kedo/index.php/Home/Mall/mall">商城</a></li>
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


	<div class="main-square">
		<div class="square-top">
			<span class="cur-suqare-title">全部</span>
		</div>
		<div class="square-order">
			<span class="square-order-title">显示排序: </span> <span
				class="square-order-li square-order-choose">智能排序</span>
		</div>
		<ul class="squ_li clearFix">

			<?php if(is_array($data)): $i = 0; $__LIST__ = array_slice($data,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gc): $mod = ($i % 2 );++$i;?><li class="fl squ_first"><a href="/10003.html" target="_blank">
					<em class="sprite_big_box biankuang-blue"></em>
				<img src="<?php echo ($gc["image"]); ?>&w=133&amp;h=194" alt="小蜜桃">
				<span class="sprite_l pic_liverlevel_L_<?php echo ($gc["totalpoint"]); ?>"></span>
					<i>当前人数:<?php echo ($gc[numbers]); ?></i>
					<div>
						<p><?php echo ($gc["nickName"]); ?></p>
						<p>
							<?php if($gc["online"] == '1'): echo (ceil($gc[onlineTime]/60000)); ?>分钟前开播
								<?php else: ?>
								未开播<?php endif; ?>
						</p>
						<b class="b1"></b> <b class="b2"></b>
					</div>
			</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

			<?php if(is_array($data)): $i = 0; $__LIST__ = array_slice($data,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gc): $mod = ($i % 2 );++$i;?><li class="fl "><a href="/10022.html" target="_blank"> <em
					class="sprite_small_box biankuang_white_little "></em>
				<!--img src="http://images.181show.com/f9ff6aff8fe39b7f1f019211e0428492?w=133&amp;h=194"
					alt="Fantasy"-->
				<img src="<?php echo ($gc["image"]); ?>"
					alt="Fantasy">
				<span class="sprite_s pic_liverlevel_S_<?php echo ($gc["totalpoint"]); ?>"></span>
					<i>当前人数：<?php echo ($gc["numbers"]); ?></i>
					<div>
						<p><?php echo ($gc["nickName"]); ?></p>
						<!--<p><?php echo (ceil($gc[onlineTime]/60000)); ?>分钟前开播</p>-->
						<p>
							<?php if($gc["online"] == '1'): echo (ceil($gc[onlineTime]/60000)); ?>分钟前开播
								<?php else: ?>
								未开播<?php endif; ?>
						</p>
					</div>
			</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
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