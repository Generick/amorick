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