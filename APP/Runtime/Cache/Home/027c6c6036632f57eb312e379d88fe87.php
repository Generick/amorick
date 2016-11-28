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
                <a class="username fl" href="/kedo/index.php/Home/Personinfo/index"><?php echo ($user['nickname']); ?></a>
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
                    <div class="tocenter"><a href="/kedo/index.php/Home/Center/index"><?php echo ($user['nickname']); ?></a></div>
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
            base: "/kedo/Public/js/",
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
                <?php if($user["avatar"] == ''): ?><img src="http://img.kedo.tv/358f7c00efd7f49b0ee56d8c0c14dc08" alt=""/>
                    <?php else: ?>
                    <img class="img-circle" src="<?php echo (_IMAGES_DOMAIN_); ?>/<?php echo ($user["avatar"]); ?>" alt=""/><?php endif; ?>
            </div>

            <div class="a-myname">
                <div class="m-name">
                    <span class="center-name"><?php echo ($user["nickname"]); ?></span><span class="center-edit"></span>
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