<?php if (!defined('THINK_PATH')) exit();?><html><head lang="en">
    <meta charset="UTF-8">
    <title>个人中心－蝌蚪TV</title>
    <link data-fixed="true" href="/kedo/Public/center/css/centeros.css" rel="stylesheet">
    <link href="/kedo/Public/center/css/icons.css" rel="stylesheet">
    <link href="/kedo/Public/center/css/login.css" type="text/css" rel="stylesheet">
</head>
<body style="zoom: 1;">
<div class="bgmask" style="display: none; height: 100%; z-index: 20002;"></div>
<div class="login-box-global-css" id="loginbox" style="display:none">
    <div class="box_head">
        <div style="position:relative">
            <div class="box_close icons Stat 2_3" onclick="login.close()">

            </div>
        </div>
        <ul class="loginswitch">
            <li id="tab_login" class="regsw"><a href="javascript:void(0)" onclick="selectTagLoginBox('tab_login');changeVaildcodeLogin();" id="loginboxLoginbtn">登录</a></li>			<li class="" id="tab_reg"><a href="javascript:void(0)" onclick="selectTagLoginBox('tab_reg');changeVaildcode();" id="loginboxRegbtn">注册</a></li>		</ul>	</div>	<div class="clear"></div>	<div class="rlbox" id="tab_reg_content" style="display: none;">		<div class="regbox">			<form id="registerForm" method="get" onsubmit="return false;">				<div class="regmail">					<div class="border_center topb">						<input type="text" id="reg_email" style="margin-top:0" placeholder="帐号(邮箱号)" class="input210">					</div>					<div class="border_right topb"></div><div class="oktip"></div>					<div id="mailinputTip" class="regdes" style="display: none;">用于登录</div>					<div class="error" style="display: none;"></div>				</div>				<div class="regnic">					<div class="border_center topb">						<input type="text" id="reg_nickname" placeholder="昵称" class="input210 f_g">					</div>						<div class="border_right topb"></div>					<div class="oktip"></div>					<div class="error" style="display: none;"></div>				</div>				<div class="regpw">					<div class="border_center topb">										<input type="password" id="reg_password" placeholder="创建密码" class="input210">					</div>						<div class="border_right topb"></div><div class="oktip"></div>						<div id="pwinputTip" class="regdes" style="display: none;">6-30位字符，区分大小写</div>					<span class="pwbar"></span>					<div class="error" style="display: none;"></div>					<div class="pwbar"></div>				</div>				<div class="regpw2">					<div class="border_center topb">							<input type="password" id="reg_repassword" placeholder="确认密码" class="input210">					</div>						<div class="border_right topb"></div><div class="oktip"></div>					<div id="pwinput2Tip" class="regdes" style="display: none;">请再次输入密码 </div>					<div class="error" style="display: none;"></div>				</div>				<div class="regcode">					<div class="border_center topb">							<input type="text" id="reg_vaildcode" placeholder="验&nbsp;证&nbsp;码" class="input100">						<div class="checkCode"></div>					</div>					<div class="border_right topb"></div>					<img title="点击图片切换验证码" class="yzmimg yzmimg_reg" onclick="changeVaildcode()">					<div class="oktip"></div>					<div class="regdes" onclick="changeVaildcode()">刷新</div>					<div class="error" style="display: none;"></div>				</div>				<p class="agree_p">					<label class="agree">						<input type="checkbox" checked="true" id="agreement" class="icon_checked fl v-middle">						我已阅读并同意						<a target="_blank" href="/news/4.html">网站使用协议</a>					</label>				</p>				<button class="Stat 2_1 regbtn" id="regsub" type="button">立即注册</button>			</form>			<div class="other_login_area">				<span class="other_log_qq">					<a href="javascript:login.qqlogin()"></a>				</span>				<span class="other_log_sina">					<a href="javascript:login.wxlogin()" class="Stat 2_2"></a>				</span>			</div>		</div>		<div></div>	</div>	<div class="rlbox" id="tab_login_content" style="display: block;">		<div class="regbox logbox">			<form id="login_form2" onsubmit="return false;">				<div class="regmail lip">					<div class="border_center topb">						<input type="text" id="tcuser" placeholder="帐号(邮箱号)" class="input210" style="color: rgb(153, 153, 153);margin-top:0">					</div>					<div class="border_right topb"></div><div class="oktip"></div>					<div style="display:none;" class="regdes">请输入正确的帐号地址</div>					<div class="error" style="display: none;"></div>				</div>				<div class="regpw lip">					<div class="border_center topb">							<input type="password" placeholder="密码" id="tcpass" class="input210">					</div>					<div class="border_right topb"></div><div class="oktip"></div>						<div class="regdes" style="display: none;">6-30位字符，区分大小写</div>					<div class="error" style="display: none;"></div>					<div class="pwbar"></div>				</div>				<div class="log_yzm lip">					<div class="border_center topb">						<input type="text" id="login_vaildcode" placeholder="验证码" class="input100">					</div>					<div class="border_right topb"></div>					<img class="yzmimg yzmimg_login" style="width: 65px;" alt="点击图片切换验证码" onclick="changeVaildcodeLogin()">					<div class="oktip"></div>						<div class="regdes" onclick="changeVaildcodeLogin()">刷新</div>					<div class="error" style="display: none;"></div>					<div class="pwbar"></div>				</div>				<p class="agree_p">					<label class="agree">						<input type="checkbox" id="tcremember" class="icon_checked fl v-middl" checked="true">						下次自动登录						<a target="_blank" href="javascript:;">忘记密码</a>					</label>				</p> 				<button id="loginsub" class="tcloginbtn" type="submit">登 录</button>			</form>			<div class="other_login_area">				<span class="other_log_qq">					<a href="javascript:login.qqlogin()"></a>				</span>				<span class="other_log_sina">					<a href="javascript:login.wxlogin()" class="Stat 2_2"></a>				</span>			</div>		</div>	</div></div>

<link data-fixed="true" href="/kedo/Public/center/css/index.css" rel="stylesheet">
<div class="head-outer btline">
    <div class="header clearFix">
        <a class="hd_bg fl" href="/"></a>
        <ul class="nav fl">
            <li class="fl "><a href="/kedo/index.php/Home/Index/index">首页</a></li>
            <li class="fl "><a href="/kedo/index.php/Home/Square/square">广场</a> </li>
            <li class="fl "><a href="/kedo/index.php/Home/Mall/mall">商城</a> </li>
            <li class="fl "><a href="/kedo/index.php/Home/Order/order">排行榜</a> </li>
        </ul>
        <div class="input fl">
            <input type="text" placeholder="输入房间号/频道号/ID" id="searchText">
            <a class="search" target="_blank"></a>
        </div>
        <div class="user clearFix">
            <div class="fl hd_hov">
                <a class="username fl" href="/kedo/index.php/Home/Personinfo/index"><?php echo ($use["nickName"]); ?></a>
                <a href="<?php echo U('Login/logout');?>" class="userout">退出</a>
                <a class="expand fl" id="expand" href="javascript:;"></a>
            </div>

            <a class="email fl" href="javascript:;"></a>
            <div class="honor">
                <div class="hon-header">
                    <div class="hon-title">我的勋章</div>
                </div>
                <div class="hon-list">
                    <ul>
                        <li><span class="medal-li med3" title="万箭齐发"></span></li>
                        <li><span class="medal-li med1" title="力拔山河"></span></li>
                        <li><span class="medal-li med2" title="腰缠万贯"></span></li>
                        <li><span class="medal-li med1" title="钟灵毓秀"></span></li>
                        <li><span class="medal-li med3" title="雄霸天下"></span></li>
                        <li><span class="medal-li med1" title="猴子偷桃"></span></li>
                        <li><span class="medal-li med2" title="回光返照"></span></li>
                        <li><span class="medal-li med3" title="钟灵毓秀"></span></li>
                        <li><span class="medal-li med1" title="母仪天下"></span></li>
                        <li><span class="medal-li med2" title="肆无忌惮"></span></li>
                    </ul>
                </div>
                <div class="hon-bottom">
                    <div class="tocenter"><a href="/kedo/index.php/Home/Center/index">个人中心</a></div>
                    <div class="logout"><a href="<?php echo U('Login/logout');?>">退出</a></div>
                </div>
            </div>
        </div>

    </div>
</div>

<!--main-->
<div class="inmiddle">
    <script src="/kedo/Publiccenter/js/sea.js"></script>
    <script>

        seajs.config({
            base: "/js/",
            alias: {
                // "jquery": "jquery/jquery/1.10.1/jquery.js"
            }
        });
        seajs.use("ajax/username");
    </script>
    <div class="zhezhao"></div>

    <div class="center-info">
        <div class="info-left">
            <div class="c-photo">
                <img src="<?php echo ($user["avatar"]); ?>" alt="HelloBaby">
            </div>

            <div class="a-myname">
                <div class="m-name">
                    <span class="center-name"><?php echo ($user["nickName"]); ?></span><span class="center-edit"></span>
                </div>
                <div class="uid">ID:<?php echo ($user["userid"]); ?></div>
            </div>
            <div class="c-myname" style="display: none">
                <div><input type="input" id="nickname" value="<?php echo ($user["nickname"]); ?>" maxlength="16"></div>
                <button id="sure" class="small-button" onclick="seajs.use('ajax/username', function(test){ test.check(); });">确定</button>
                <button id="cancel" class="small-button">取消</button>
            </div>
        </div>
        <div class="info-middle">
            <div class="c-mylevel">我的爵位</div>
            <div class="c-level-bar">
                <div class="center-level sprite consumelevel-pic_consumelevel_0"></div>
                <div class="c-all-bars">
                    <div class="c-i-bar" style="width:0.00%"></div>
                </div>
                <div class="center-level sprite consumelevel-pic_consumelevel_1"></div>
            </div>
            <div class="c-level-message">还差<?php echo ($user["differ"]); ?>经验升级</div>
        </div>
        <div class="c-right">
            <div class="c-myfund">我的资产</div>
            <div class="c-funds">
                <div class="c-funds-jb"><?php echo ($user["balance"]); ?></div>
                <div class="c-funds-cz"><a href="/kedo/index.php/Home/Pay/index">充值</a></div>

            </div>
        </div>

    </div>
    <div class="duikdou">
        <div class="dui-header">兑换k豆</div>
        <div class="dui-mian">
            <div class="dui-input"><input type="text" name="duiv" id="duiv" class="duiv"></div>
            <div class="dui-control">
                <button class="dui-queren">确认</button>
                <button class="dui-cancel">退出</button>
            </div>
        </div>
    </div>


<!--main-->

<div class="center-left">
    <div class="pi">
        <div class="cl-div  ">
            <a href="/kedo/index.php/Center/index"><div class="cl-index cl-title">我的首页</div></a>
        </div>
    </div>
    <div class="pi">
        <div class="cl-div  hasnenu   ">
            <div class="cl-trade cl-title">交易中心</div>
            <div class="arrow-down"></div>
        </div>
        <div class="cl-set-info" style="display: none;">
            <ul>
                <li><a href="/kedo/index.phpTrade/recharge">充值记录</a></li>
                <li><a href="/kedo/index.phpTrade/record">交易记录</a></li>
                <li><a href="/kedo/index.phpTrade/recive">收到礼物</a></li>
            </ul>
        </div>
    </div>
    <div class="pi">
        <div class="cl-div  ">
            <a href="/kedo/index.php/FriendList/index"><div class="cl-care cl-title">我的关注</div></a>
        </div>
    </div>
    <div class="pi">
        <div class="cl-div ">
            <a href="/kedo/index.php/Message/index"><div class="cl-notice cl-title">消息中心</div></a>
        </div>
    </div>
    <!-- <div class="pi">
         <div class="cl-div ">
             <a href="/centeros.php?ptype=treasure"><div class="cl-treasure cl-title">我的财富</div></a>
         </div>
     </div>-->

    <div class="pi">
        <div class="cl-div hasnenu cl-focus">
            <div class="cl-setting cl-title ">我的设置</div>
            <div class="arrow-down"></div>
        </div>
        <div class="cl-set-info hidden">
            <!--ul>
                <li><a href="centeros.php?ptype=info">基本资料</a></li>
                <li><a href="centeros.php?ptype=mportrait">修改头像</a></li>
                <li><a href="centeros.php?ptype=mpass">修改密码</a></li>
                <li><a href="centeros.php?ptype=mphone">绑定手机</a></li>
            </ul-->
            <ul>
                <li><a href="/kedo/index.php/Personinfo/info">基本资料</a></li>
                <li><a href="/kedo/index.php/Personinfo/avatar">修改头像</a></li>
                <li><a href="/kedo/index.php/Personinfo/passwd">修改密码</a></li>
                <li><a href="/kedo/index.php/Personinfo/myphone">绑定手机</a></li>
            </ul>
        </div>
    </div>
</div>
</div>

<!--main-->
<div class="inmiddle">
    <?php
 $current_page="mpass"; ?>
    <script>
        seajs.use("ajax/userpass");
    </script>
    <div class="center-right">
        <div calass="cr-mid-passwd">
            <div class="cr-title">修改密码</div>
            <form id="J_pw_edit" action="/kedo/index.php/Home/Personinfo/changePasswd" method="post" name="checkpasswd" >
                <input type="hidden" name="userid" value="<?php echo ($_SESSION['openid']['userid']); ?>" />
            <div class="midfy-passwd-area">
                <table>
                    <tr>
                        <td class="bind-phone-aright">原密码： </td>
                        <td><input class="input-pass"  type="password" id="oldpwd"/></td>
                    </tr>
                    <tr>
                        <td class="bind-phone-aright">新密码： </td>
                        <td><input  class="input-pass"   type="password" id="newpwd"/><span id="changepwd"></span></td>
                    </tr>
                    <tr>
                        <td class="bind-phone-aright">确认密码： </td>
                         <td><input  class="input-pass"   type="password" id="repwd"/><span id="changerepwd"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button id="save"  class="small-button">保存</button>
                            <button id="cancel"  class="small-button">取消</button>
                        </td>
                    </tr>
                </table>
            </div>
            </form>
            <div class="midfy-passwd-area-else">
                <div class="else-pass-title">其他方式修改</div>
                <div class="midify-else">
                    <div class="modify-by-">
                        <div class="mod-bleft"> <img src="/kedo/Public/personinfo/image/mpass-phone.png" /> </div>
                        <div class="mod-bright">
                            <div>通过手机修改</div>
                            <button class="ck-pass-phone">点击修改</button>
                        </div>
                    </div>
                    <div class="modify-by-" style="float:right;">
                        <div class="mod-bleft"> <img src="/kedo/Public/personinfo/image/mpass-email.png" style="margin-top:40px"/> </div>
                        <div class="mod-bright">
                            <div>通过邮箱修改</div>
                            <button class="ck-pass-phone">点击修改</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="win-phone" style="display: none">
        <div class="phone-find-passwd1" style="display: none">
            <div class="find-bump-title">手机找到回密码
                <div class="find-bump-oxx">
                </div>
            </div>
            <div class="find-main1">
                <div class="divv">
                    <span class="fin-pro">手机号:</span>
                    <span class="fin-current-phone divv2">18745465467</span>
                    <span class="fin-mb">更换手机</span>
                </div>
                <div  class="divvv">
                    <span class="fin-pro">验证码号:</span>
                    <input type="text" value=""  class="divv2" maxlength="11" id="y-code">
                    <button class="fin-mb-send small-button">发送验证码</button>
                    <span class="fmbResend">重新发送  <i>39s</i></span>
                </div>
                <div  class="divvvv">
                    <button id="next-step" class="small-button">下一步</button>
                </div>
            </div>
        </div>

        <div class="repass-next" style="display: none">
            <div class="find-bump-title">手机找到回密码 <div class="find-bump-oxx"></div></div>
            <div class="find-main2">
                <table >
                    <tr>
                        <td class="n-type">新密码：</td>
                        <td class="input-pass2">
                            <input type="password" id="fin-new-pass"/>
                        </td>
                        <td colspan="2">
                            34e2
                        </td>
                    </tr>
                    <tr>
                        <td class="n-type">确认密码：</td>
                        <td class="input-pass2">
                            <input type="password" id="fin-renew-pass"/>
                        </td>
                    </tr>
                    <tr >
                        <td></td>
                        <td class="next-bt-area">
                            <button class="small-button" id="nnext-step">下一步</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="repass-end" style="text-align: center;display: none">
            <div class="find-bump-title">手机找到回密码 <div class="find-bump-oxx"></div></div>
            <div class="">
                <div class="setting-gous">
                    <div class="fin-endding1">你的新登录设置成功!</div>
                    <div class="fin-endding2">今后将使用新密码登录蝌蚪账户,请牢记!</div>
                </div>
                <div class="setting-gous2">您可能需要:<a href="#">重新登录</a></div>
            </div>
        </div>
    </div></div>


<!--main-->
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
<script type="text/javascript" src="/kedo/Public/js/jquery-1.12.2.min.js"></script>
<script type="text/javascript" src="/kedo/Public/js/center.js"></script>

</body>
</html>