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
                    <li class="Reg"><a href="./">注册</a></li>
                </ul><?php endif; ?>

        </div>
    </div>
</div>

<!--主体-->
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