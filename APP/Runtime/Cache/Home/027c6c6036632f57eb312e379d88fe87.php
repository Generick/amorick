<?php if (!defined('THINK_PATH')) exit();?><html><head lang="en">
    <meta charset="UTF-8">
    <title>个人中心－蝌蚪TV</title>
    <link data-fixed="true" href="/kedo/Public/center/css/centeros.css" rel="stylesheet">
    <link href="/kedo/Public/center/css/icons.css" rel="stylesheet">
    <link href="/kedo/Public/center/css/login.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/kedo/Public/js/jquery-1.12.2.min.js"></script>
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
    <script src="/kedo/Public/center/js/sea.js"></script>
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
                <img id="peravatar" src="<?php echo (_IMAGES_DOMAIN_); ?>/<?php echo ($user["avatar"]); ?>" alt="HelloBaby">
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
            <a href="<?php echo U('Center/index');?>"><div class="cl-index cl-title">我的首页</div></a>
        </div>
    </div>
    <div class="pi">
        <div class="cl-div  hasnenu ">
            <div class="cl-trade cl-title">交易中心</div>
            <div class="arrow-down"></div>
        </div>
        <div class="cl-set-info" style="display: none;">
            <ul>
                <li><a href="<?php echo U('Trade/recharge');?>">充值记录</a></li>
                <li><a href="<?php echo U('Trade/record');?>">交易记录</a></li>
                <li><a href="<?php echo U('Trade/recive');?>">收到礼物</a></li>
            </ul>
        </div>
    </div>
    <div class="pi">
        <div class="cl-div  ">
            <a href="<?php echo U('FriendList/index');?>"><div class="cl-care cl-title">我的关注</div></a>
        </div>
    </div>
    <div class="pi">
        <div class="cl-div ">
            <a href="<?php echo U('Message/index');?>"><div class="cl-notice cl-title">消息中心</div></a>
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

            <ul>
                <li><a href="<?php echo U('Personinfo/info');?>">基本资料</a></li>
                <li><a href="<?php echo U('Personinfo/avatar');?>">修改头像</a></li>
                <li><a href="<?php echo U('Personinfo/passwd');?>">修改密码</a></li>
                <li><a href="<?php echo U('Personinfo/myphone');?>">绑定手机</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<!--main-->
<div class="inmiddle">


    <script src="/kedo/Public/center/js/sea.js"></script>
    <script>

    </script>

    <div class="center-right">
        <div class="cr-basics" style="">
            <div class="cr-title">基本资料</div>

            <form class="J_profile_form" action="/kedo/index.php/Home/Personinfo/update" method="post">
            <table id="info-table">
                <tr  class="cr-hline">
                    <td class="n-type">昵称：</td>
                    <td class="" colspan="3">
                        <input type="text" name="nickname" id="aliasname"   value="<?php echo ($user['nickname']); ?>"/>
                    </td>
                </tr>
                <tr class="cr-hline">
                    <td  class="n-type">
                        <span>性别：</span>
                    </td>
                    <td colspan="3">
                        <?php if($user['Gender'] == '1'): ?><label class="mr20"><input name="gender" type="radio" value="1" checked />男</label>
                            <label class="mr20"><input name="gender" type="radio" value="0" />女</label>
                            <?php else: ?>
                            <label class="mr20"><input name="gender" type="radio" value="1" />男</label>
                            <label class="mr20"><input name="gender" type="radio" value="0" checked />女</label><?php endif; ?>
                    </td>
                </tr>
                <tr class="cr-hline">
                    <td class="n-type">所在地：</td>
                    <td>
                        <select name="province" id="province"></select>
                    </td>
                    <td>
                        <select name="city"  id="city"></select>
                    </td>
                    <!--<td>-->
                        <!--<select name="county" id="county"></select>-->
                    <!--</td>-->
                    <!--<td>-->
                        <!--<input type="radio" name="issecret" id="" value="1">保密 <input type="radio" name="issecret" value="2" />公开-->
                    <!--</td>-->
                </tr>

                <tr class="cr-hline">
                    <td class="n-type">生日：</td>
                    <td> <select id="sel_year" name="year"   ></select></td>
                    <td> <select  id="sel_month" name="month"></select> </td>
                    <td> <select id="sel_day" name="day"></select></td>

                    <!--<input   name="birthday" value="<?php echo (date('Y-m-d',$user['birthday'])); ?>" type="text" data-date-format="dd-mm-yyyy" />　-->

                </tr>
                <tr class="cr-hline">
                    <td  class="n-type"> <td colspan="3"><button id="submits" >保存</button></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    <!--main-->
</div>
<!--birthday-->
<script type="text/javascript" src="/kedo/Public/personinfo/js/birthday.js"></script>
    <script>
        $(function () {
            $.ms_DatePicker({
                YearSelector: ".sel_year",
                MonthSelector: ".sel_month",
                DaySelector: ".sel_day"
            });
            $.ms_DatePicker();
        });
    </script>

<!--city-->
<script type="text/javascript"  src="/kedo/Public/personinfo/js/area.js"></script>
<script type="text/javascript">_init_area('.$city.');</script>';
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

</body>
</html>