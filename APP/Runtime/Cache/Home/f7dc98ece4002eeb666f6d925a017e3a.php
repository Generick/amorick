<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>商城</title>

	

<meta property="qc:admins" content="105415766763547646">
<meta name="description" content="超人气视频直播互动娱乐社区，在这里你可以展示自己的才艺，也可以跟众多优秀的美女主播在线互动聊天、视频交友">
<link href="/kedo/Public/center/css/icons.css" rel="stylesheet">
<link href="/kedo/Public/css/anchor-level.css" rel="stylesheet">
<link href="/kedo/Public/center/css/index.css" rel="stylesheet" type="text/css">
<!--<link href="/kedo/Public/css/square.css" rel="stylesheet" type="text/css">-->
<link data-fixed="true" href="/kedo/Public/css/square.css" rel="stylesheet">
<link href="/kedo/Public/css/bootstrap.min.css" rel="stylesheet">
<link href="/kedo/Public/css/style.css" rel="stylesheet">
<link href="/kedo/Public/css/homeBg.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/kedo/Public/login/css/login.css">
<script src="/kedo/Public/js/jquery-1.12.2.min.js"></script>
<script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
<script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body style="padding-top:60px;">
<!--导航-->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo_head" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav hdNavL">
                <li class="active"><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Square/square');?>">广场</a></li>
                <li><a href="<?php echo U('Mall/mall');?>">商城</a></li>
                <li><a href="<?php echo U('Order/order');?>">排行</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <!--<div class="form-group">
                   <input type="text" class="form-control" placeholder="搜索">
                   <button type="submit" class="btn btn-default glyphicon glyphicon-search"></button>
                </div>-->
                <div class="input-group search">
                    <input type="text" class="form-control searchN" placeholder="输入房间号/频道号/ID">
                  <span class="input-group-btn">
                    <button class="btn btn-default searchBtn" type="button"><span class="glyphicon glyphicon-search"></span></button>
                  </span>
                </div>

            </form>
            <?php if($_SESSION['userid']!= ''): ?><ul class="nav navbar-nav navbar-right hidden-sm afHdNavR">
                    <li class="logName"><a href="<?php echo U('Center/index');?>" class="ellipsis"><?php echo (urldecode($user['nickname'])); ?></a></li>
                    <li class="hidden-xs"><a href="">|</a></li>
                    <li class=""><a href="<?php echo U('Login/logout');?>">退出</a></li>
                    <!--<li class="glyphicon glyphicon-envelope"><a href=""></a></li>-->
                </ul>
                <?php else: ?>
                <ul class="nav navbar-nav navbar-right hidden-sm afhdNavR">
                    <li><a href="<?php echo U('Login/index');?>" class="login" onclick="return false;">登录</a></li>
                    <li class="hidden-xs"><a href="">|</a></li>
                    <li class="hidden-lg hidden-md hidden-sm show-xs line"><a href=""></a></li>
                    <li class="Reg"><a href="./" onclick="return false;">注册</a></li>
                </ul><?php endif; ?>

        </div>
    </div>
</div>

<!--主体-->
	<div class="main-mall">
		<div class="mall-top">
			<div class="mall-top-title">
				<a href="#" class="mselect"> 守护</a>
			</div>
			<div class="mall-top-title">
				<a href="/kedo/index.php/Home/Mall/mall_prop" class=""> 道具</a>
			</div>
			<div class="mall-top-title">
				<a href="/kedo/index.php/Home/Mall/mall_ride" class=""> 座驾</a>
			</div>
		</div>
		<div class="clear"></div>

		<!-- 道具-->

		<div class="guard">
			<div class="wrapper">
				<div class="guardBg spriteGuard pic_shangcheng_banner"></div>
				<div class="privilege">
					<h4>守护特权说明</h4>
					<ul class="gd_list clearFix">
						<li class="fl bgBigLi firstBig">
							<div class="guard_tit_bg"></div>
							<div class="guardType">守护类型</div>
							<ul class="gd_detail">
								<li><span class="spriteGuard icon_huizhang"></span> <span>专属勋章</span>
								</li>
								<li><span class="spriteGuard icon_zuoyi"></span> <span>专属座位</span>
								</li>
								<li class="jinchang clearFix"><span
									class="bg spriteGuard cion_jinchang fl"></span> <span
									class="text fl">进场特效</span></li>
								<li><span class="spriteGuard icon_messages"></span> <span>聊天特权</span>
								</li>
								<li class="last"><span class="spriteGuard icon_tichu"></span>
									<span>房间特权</span></li>
							</ul>
						</li>

						<li class="fl bgBigLi">
							<div class="spriteGuard pic_shuoming_qingtong"></div>
							<div class="kinds">
								<h5>青铜级</h5>
								<p>LV1-LV5</p>
							</div>
							<ul class="gd_detail">
								<li class="firstDetail"><span
									class="spriteGuard pic_guardlevel_qingtong"></span> <span
									class="spriteGuard pic_shangcheng_qingtong"></span></li>
								<li>聊天框 <span class="blue">蓝色</span> 昵称
								</li>
								<li>防普通禁言、踢出房间</li>
							</ul>
						</li>

						<li class="fl bgBigLi">
							<div class="spriteGuard pic_shouhu_baiyin"></div>
							<div class="kinds">
								<h5>白银级</h5>
								<p>LV5-Lv10</p>
							</div>
							<ul class="gd_detail">
								<li class="firstDetail"><span
									class="spriteGuard pic_guardlevel_baiyin"></span> <span
									class="spriteGuard pic_shangcheng_baiyin"></span></li>
								<li>聊天框 <span class="violet">紫色</span> 昵称
								</li>
								<li>防普通禁言、踢出房间</li>
							</ul>
						</li>

						<li class="fl bgBigLi">
							<div class="spriteGuard pic_shuoming_huangjin"></div>
							<div class="kinds">
								<h5>黄金级</h5>
								<p>LV10-LV15</p>
							</div>
							<ul class="gd_detail">
								<li class="firstDetail"><span
									class="spriteGuard pic_guardlevel_huangjin"></span> <span
									class="spriteGuard pic_shangcheng_huangjin"></span></li>
								<li>聊天框 <span class="orange">橙色</span> 昵称
								</li>
								<li>防普通禁言、踢出房间</li>
							</ul>
						</li>
					</ul>
				</div>

			</div>
		</div>

		<div class="howUp">
			<div class="wrapper">
				<div class="spriteGuard pic_shangcheng_shengji"></div>
			</div>
		</div>

		<div class="detail_start">
			<div class="wrapper">
				<div class="spriteGuard pic_shangcheng_kaitong"></div>
			</div>
		</div>

	</div>

	
<!-- login -->
<input type="hidden" name="" id="url" value="<?php echo ($url); ?>">
<div class="bgmask" style="height: 100%;z-index:20002;display: none;"></div>
<div class="login-box-global-css" id="loginbox" style="display: none;">
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
                    <img src="" class="yzmimg yzmimg_reg" onclick="refreshRegCode()">
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
<!-- login over -->


<!-- 3 加载bootstrap的核心ＪＳ库 -->
<script src="/kedo/Public/js/bootstrap.min.js"></script>
<script src="/kedo/Public/js/boot.js"></script>
<script type="text/javascript" src="/kedo/Public/js/index.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.login').click(function(){
            //$('.bgmask').show();
            //$('.login-box-global-css').show();
        });
        $('.bgmask').click(function(){
            //$('.login-box-global-css').hide();
            // $('.bgmask').hide();
        });
    });
</script>

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