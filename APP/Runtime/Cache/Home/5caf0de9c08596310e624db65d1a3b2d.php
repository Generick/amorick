<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>充值中心-蝌蚪直播</title>
    <link rel="stylesheet" href="/kedo/Public/css/charge.css"/>
    <link href="/kedo/Public/css/anchor-level.css" rel="stylesheet">
    <meta name="description" content="超人气视频直播互动娱乐社区，在这里你可以展示自己的才艺，也可以跟众多优秀的美女主播在线互动聊天、视频交友" />
    <link data-fixed="true" href="/kedo/Public/css/square.css" rel="stylesheet">
    <script src="/kedo/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ($cdn_domain); ?>/js/login.js?20150908"></script>

    <link href="/kedo/Public/css/index.css" rel="stylesheet" type="text/css">
    <link href="/kedo/Public/css/login.css" type="text/css" rel="stylesheet">

    <?php if( ($pf == qqgame) or ($pf == QQGame)): ?><script src="/kedo/Public/js/pay_QQCloud.js"></script>
   <?php else: ?>
    <script src="/kedo/Public/js/charge.js"></script><?php endif; ?>

</head>


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

<div class="head-outer btline">
    <div class="header clearFix">
        <a class="hd_bg fl" href="/"></a>
        <ul class="nav fl">
            <li class="fl "><a href="<?php echo U('Index/index');?>">首页</a></li>
            <li class="fl "><a href="<?php echo U('Square/square');?>">广场</a></li>
            <li class="fl "><a href="<?php echo U('Mall/mall');?>">商城</a></li>
            <li class="fl "><a href="<?php echo U('Order/order');?>">排行榜</a></li>
        </ul>

        

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
                    <li class="logName"><a href="<?php echo U('Center/index');?>" class="ellipsis"><?php echo ($user['nickname']); ?></a></li>
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
    </div>
</div>
<div class="recharge">
    <div class="wrapper">
        <div class="char_tit">
            <div class="clearFix">
                <span class="sprite_pay icon_hot fl"></span>
                <h3 class="fl">充值k豆</h3>
                <div style="clear: both"></div>
                <span class="rest">
                	<i>账户余额 <strong><?php echo ($user['coins']); ?></strong> k豆</i>
                </span>
            </div>
            <p><span>用户昵称：</span><i><?php echo ($user['nickname']); ?></i></p>
        </div>
        <div class="char_details">
            <div class="fl">
                <div class="amount clearFix">
                    <h3 class="fl">充值金额:</h3>
                    <ul class="fl amoLi">
                        <li class="fl clickBg">
                            <span val="1000">1000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="5000">5000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="10000">10000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="20000">20000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="30000">30000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="50000">50000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="80000">80000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="100000">100000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="200000">200000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="300000">300000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="500000">500000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="800000">800000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="1000000">1000000k豆</span>
                        </li>
                        <li class="fl">
                            <span val="2000000">2000000k豆</span>
                        </li>
                        <li class="fl">
                            <span  val="3000000">3000000k豆</span>
                        </li>
                    </ul>
                </div>
                <?php if( ($pf == qqgame) or ($pf == QQGame)): ?><div class="qqgameWay" data-type="QQGame">

                    <form name="QQCloud" id="QQCloud" action="/rest/www/cloud.jsp" method="post"  >
                        <div style="margin: 5px;">
                            <p>实付金额：<i id="P_RMB">10</i>元(<span id="P_DB">1000</span>k豆)</p>
                        </div>
                        <input type="hidden" name="WIDtotal_fee" id="WIDtotal_fee">
                        <input type="hidden" name="WIDtotal_Id" id="WIDtotal_Id">
                        <input type="hidden" id="openid" name="openid" value="<?php echo ($openid); ?>"/>
                        <input type="hidden" id="openkey" name="openkey" value="<?php echo ($openkey); ?>"/>
                        <input type="hidden" id="pf" name="pf" value="<?php echo ($pf); ?>"/>
                        <input type="hidden" id="pfkey" name="pfkey" value="<?php echo ($pfkey); ?>"/>
                        <input class="imChar" type="button" value="立即充值"/>
                    </form>
                </div>
                <div class="paybox" style="display:none;width: 500px;height: 360px;position: fixed;margin: 200px auto;left: 0;right: 0;top: 0;bottom: 0"></div>
               <?php else: ?>
                <div class="charWay">
                    <div class="wayLi clearFix">
                        <h3 class="fl">支付方式<?php echo ($pf); ?>:</h3>
                        <div class="fl wayBank">
                            <ul class="clearFix ways">
                                <li class="fl sprite_pay bank_17 cli"  ptype="ZFB"></li>
                                <li class="fl sprite_pay bank_18"  ptype="WXP"></li>
                                <li class="fl sprite_pay bank_20" ptype="CFT"></li>
                                <li class="fl sprite_pay bank_19" ptype="ZXZF"></li>
                            </ul>

                            <ul class="banks clearFix">
                                <li class="sprite_pay bank_101 " btype="101"></li>
                                <li class="sprite_pay bank_201 " btype="201"></li>
                                <li class="sprite_pay bank_301 " btype="301"></li>
                                <li class="sprite_pay bank_401 " btype="401"></li>
                                <li class="sprite_pay bank_501 " btype="501"></li>
                                <li class="sprite_pay bank_601 " btype="601"></li>
                                <li class="sprite_pay bank_701 " btype="701"></li>
                                <li class="sprite_pay bank_801 " btype="801"></li>
                                <li class="sprite_pay bank_13  " btype="13"></li>
                                <li class="sprite_pay bank_1101" btype="1101"></li>
                                <li class="sprite_pay bank_1201" btype="1201"></li>
                                <li class="sprite_pay bank_1901" btype="1901"></li>
                                <li class="sprite_pay bank_1902" btype="1902"></li>
                                <li class="sprite_pay bank_1903" btype="1903"></li>
                                <li class="sprite_pay bank_1904" btype="1904"></li>
                                <li class="sprite_pay bank_1905" btype="1905"></li>
                                <li class="sprite_pay bank_1906" btype="1906"></li>
                                <li class="sprite_pay bank_1907" btype="1907"></li>
                                <li class="sprite_pay bank_1908" btype="1908"></li>
                                <li class="sprite_pay bank_1909" btype="1909"></li>
                                <li class="sprite_pay bank_1910" btype="1910"></li>
                            </ul>
                            <form name="alpay" id="alpay" action="/rest/www/alipay.jsp" method="post"   target="_blank">
                                <input type="hidden" name="WIDtotal_fee" id="WIDtotal_fee"/>
                                <input type="hidden" name="WIDtotal_Id" id="WIDtotal_Id"/>
                                <input type="hidden" name="WIDbank_type" id="WIDbank_type"/>
                                <p>实付金额：<i id="P_RMB">10</i>元(<span id="P_DB">1000</span>k豆)</p>
                                <input class="imChar" type="button" value="立即充值"/>
                            </form>
                        </div>
                    </div>
                </div><?php endif; ?>


            </div>
            <div class="fr char_explain">
                <h3 class="expl">充值说明</h3>
                <div class="exp">
                    <p>1元=100k豆</p>
                    <p>k豆是您在本平台消费的虚拟货币，您可以通过充值获得，也可手动添加充值金额。</p>
                </div>
                <h3 class="act">您可到直播间进行：</h3>
                <ul>
                    <li class="clearFix">
                        <span class="fl"></span>
                        <p class="fl">送礼物</p>
                    </li>
                    <li class="clearFix">
                        <span class="fl"></span>
                        <p class="fl">点歌</p>
                    </li>
                    <li class="clearFix">
                        <span class="fl"></span>
                        <p class="fl">与明星进行互动</p>
                    </li>
                    <li class="clearFix">
                        <span class="fl"></span>
                        <p class="fl">消费</p>
                    </li>
                    <li class="clearFix">
                        <span class="fl"></span>
                        <p class="fl">可以帮自己升级</p>
                    </li>

                </ul>
                <div class="customService">
                    <h3>在线客服：</h3>
                    <div class="custom_bg"></div>
                    <div class="qq_chat"></div>
                    <p>在线时间每天10:00~19:00，其它时间请留言</p>
                </div>
                <h3>投诉电话</h3>
                <div class="teNum clearFix">
                    <span class="tel_bg fl"></span>
                    <p class="fl">021-897834889</p>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="mks"></div>
<div class="wxximage">
    <div class="wximage">
        <div class="x"></div>
        <div class="ifo clearFix">充值提示</div>
        <div class="mn-box"></div>
        <div class="mn-info">
            <div>请打开微信-扫描上方二维码完成支付</div>
            <div class="kca">￥<span id="mys"></span>元</div>
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