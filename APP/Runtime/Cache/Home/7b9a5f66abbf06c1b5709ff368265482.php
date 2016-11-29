<?php if (!defined('THINK_PATH')) exit();?><html>
<head lang="en">
    <meta charset="UTF-8">
    <title>个人中心－蝌蚪TV</title>
    <link data-fixed="true" href="/kedo/Public/center/css/centeros.css" rel="stylesheet">
    <link href="/kedo/Public/center/css/icons.css" rel="stylesheet">
    <link data-fixed="true" href="/kedo/Public/center/css/index.css" rel="stylesheet">
    <!--<link href="/kedo/Public/center/css/login.css" type="text/css" rel="stylesheet">-->
    <script src="/kedo/Public/center/js/jquery.js"></script>
    <script src="/kedo/Public/center/js/centeros.js"></script>

</head>
<body style="zoom: 1;">

<div class="head-outer btline">
    <div class="header clearFix">
        <a class="hd_bg fl" href="<?php echo U('Index/index');?>"></a>
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
                <a class="username fl" href="/kedo/index.php/Home/Center/index"><?php echo (urldecode($user['nickname'])); ?></a>
                <a class="hidden-xs" href="">|</a>
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
                    <div class="tocenter"><a href="/kedo/index.php/Home/Center/index"><?php echo (urldecode($user['nickname'])); ?></a></div>
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
            base: "/kedo/Public/js/jscore",
            alias: {
                // "jquery": "jquery/jquery/1.10.1/jquery.js"
            }
        });
        seajs.use("username");
    </script>

    <div class="zhezhao"></div>

    <div class="center-info">
        <div class="info-left">
            <div class="c-photo">
                <?php if($user["avatar"] == ''): ?><img src="http://img.kedo.tv/358f7c00efd7f49b0ee56d8c0c14dc08" alt=""/>
                    <?php else: ?>
                    <img class="img-circle" src="<?php echo (_IMAGES_DOMAIN_); ?>/<?php echo ($user["avatar"]); ?>" alt=""/><?php endif; ?>
            </div>

            <div class="a-myname">
                <div class="m-name">
                    <span class="center-name"><?php echo (urldecode($user["nickname"])); ?></span><span class="center-edit"></span>
                </div>
                <div class="uid">ID:<?php echo ($user["userid"]); ?></div>
            </div>
            <div class="c-myname" style="display: none">
                <div><input type="input" id="nickname" value="<?php echo (urldecode($user["nickname"])); ?>" maxlength="16"></div>
                <button id="sure" class="small-button" onclick="seajs.use('ajax/username', function(test){ test.check(); });">确定</button>
                <button id="cancel" class="small-button">取消</button>
            </div>
        </div>
        <div class="info-middle">
            <div class="c-mylevel">我的爵位</div>
            <div class="c-level-bar">
                <div class="center-level sprite consumelevel-pic_consumelevel_<?php echo ($dj["spender"]); ?>"></div>
                <div class="c-all-bars">
                    <div class="c-i-bar" style="width:<?php echo ($dj['nextSpender']); ?>%"></div>
                </div>
                <div class="center-level sprite consumelevel-pic_consumelevel_<?php echo ($dj['spender']+1); ?>"></div>
            </div>
            <div class="c-level-message">还差<?php echo ($dj['differ']); ?>经验升级</div>
        </div>
        <div class="c-right">
            <div class="c-myfund">我的资产</div>
            <div class="c-funds">
                <div class="c-funds-jb">k豆:<?php echo ($dj["coins"]); ?></div>
                <div class="c-funds-cz"><a href="/kedo/index.php/Home/Pay/pay">充值</a></div>
            </div>
        </div>
		
		<div class="duikdou">
			<div class="dui-header">兑换k豆</div>
			<div class="dui-mian">
            <div class="dui-input">
                <input type="text" name="duiv" id="duiv" class="duiv">
            </div>
            <div class="dui-control">
                <button class="dui-queren">确认</button>
                <button class="dui-cancel">退出</button>
            </div>
			</div>
		</div>
		

    </div>

    


<!--main-->

<div class="center-left">

    <div class="pi">
        <div class="cl-div  cl-focus">
            <a href="<?php echo U('Center/index');?>"><div class="cl-index cl-title">我的首页</div></a>
        </div>
    </div>
    <div class="pi">
        <div class="cl-div  hasnenu">
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
        <div class="cl-div hasnenu">
            <div class="cl-setting cl-title">我的设置</div>
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
    <div class="center-right">
        <div class="mindex-title">我的首页</div>
        <div class="mindex-level-area">
            <div class="titleee"><span class="lev-inf">等级信息</span><span class="blank-btline"></span></div>
            <div class="info-middle active-level">
                <div class="c-mylevel">活跃等级</div>
                <div class="c-level-bar">
                    <div class="center-level activelevel sprite activelevel-pic_activelevel_<?php echo ($dj['active']); ?>"></div>
                    <div class="c-all-bars">
                        <div class="c-i-bar" style="width:<?php echo ($dj['nextActive']); ?>%"></div>
                    </div>
                    <div class="center-level  activelevel sprite activelevel-pic_activelevel_<?php echo ($dj['active']+1); ?>"></div>
                </div>
                <div class="c-level-message" style="margin-left:30px; ">还差<?php echo ($dj["activeDiffer"]); ?>经验升级 </div>
            </div>

            <div class="info-middle  mindex-level">
                <div class="c-mylevel">我的爵位</div>
                <div class="c-level-bar">
                    <div class="center-level sprite consumelevel-pic_consumelevel_<?php echo ($dj['spender']); ?>"></div>
                    <div class="c-all-bars">
                        <div class="c-i-bar" style="width:<?php echo ($dj['nextSpender']); ?>%"></div>
                    </div>
                    <div class="center-level sprite consumelevel-pic_consumelevel_<?php echo ($dj['spender']+1); ?>"></div>
                </div>
                <div class="c-level-message">再消费<?php echo ($dj['differ']); ?>蚪币将升级</div>
            </div>
        </div>

        <div class="mindex-else-title"> 我守护的</div>
        <div class="mycare-list">
                    </div>
        <div class="mindex-else-title"> 我的进场特效</div>
            <div class="mcar-list">

                                    <div class="mcar-box">
                        <div class="mcar-left">
                            <div class=""><img src="http://img.kedo.tv/4e3b51a49b2ab9ffaded9d525ca03890?g=1"></div>
                        </div>
                        <div class="mcar-right">
                            <div class="mcar-right-1 clearFix"><span class="car-name">蝌蚪骑士 </span><span class="xufei">续费</span></div>
                            <div class="mcar-right-2 clearFix">剩余天数：<span>天</span></div>
                            <div class="mcar-right-3 learFix">尚未拥有</div>
                        </div>
                    </div>
                                    <div class="mcar-box">
                        <div class="mcar-left">
                            <div class=""><img src="http://img.kedo.tv/992d9667913729472c1bc2e0d5d7df5d?g=1"></div>
                        </div>
                        <div class="mcar-right">
                            <div class="mcar-right-1 clearFix"><span class="car-name">青蛙骑士 </span><span class="xufei">续费</span></div>
                            <div class="mcar-right-2 clearFix">剩余天数：<span>天</span></div>
                            <div class="mcar-right-3 learFix">尚未拥有</div>
                        </div>
                    </div>
                                    <div class="mcar-box">
                        <div class="mcar-left">
                            <div class=""><img src="http://img.kedo.tv/ce16b40d15e649fb945253f79c8b9ea4?g=1"></div>
                        </div>
                        <div class="mcar-right">
                            <div class="mcar-right-1 clearFix"><span class="car-name">青蛙国王 </span><span class="xufei">续费</span></div>
                            <div class="mcar-right-2 clearFix">剩余天数：<span>天</span></div>
                            <div class="mcar-right-3 learFix">尚未拥有</div>
                        </div>
                    </div>
                                    <div class="mcar-box">
                        <div class="mcar-left">
                            <div class=""><img src="http://img.kedo.tv/c5090ea391419bc128e90719325d62be?g=1"></div>
                        </div>
                        <div class="mcar-right">
                            <div class="mcar-right-1 clearFix"><span class="car-name">青铜守护 </span><span class="xufei">续费</span></div>
                            <div class="mcar-right-2 clearFix">剩余天数：<span>天</span></div>
                            <div class="mcar-right-3 learFix">尚未拥有</div>
                        </div>
                    </div>
                                    <div class="mcar-box">
                        <div class="mcar-left">
                            <div class=""><img src="http://img.kedo.tv/4dca91511800d2bd690ec6ae1b28a156?g=1"></div>
                        </div>
                        <div class="mcar-right">
                            <div class="mcar-right-1 clearFix"><span class="car-name">白银守护 </span><span class="xufei">续费</span></div>
                            <div class="mcar-right-2 clearFix">剩余天数：<span>天</span></div>
                            <div class="mcar-right-3 learFix">尚未拥有</div>
                        </div>
                    </div>
                                    <div class="mcar-box">
                        <div class="mcar-left">
                            <div class=""><img src="http://img.kedo.tv/1497f33ec1602182291e91102a8f1126?g=1"></div>
                        </div>
                        <div class="mcar-right">
                            <div class="mcar-right-1 clearFix"><span class="car-name">黄金守护 </span><span class="xufei">续费</span></div>
                            <div class="mcar-right-2 clearFix">剩余天数：<span>天</span></div>
                            <div class="mcar-right-3 learFix">尚未拥有</div>
                        </div>
                    </div>
                
            </div>
        <div class="clear"></div>

    </div>
</div>
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

<script>
    seajs.use("ajax/usecar");
</script>
    
    </body></html>