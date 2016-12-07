<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="utf-8">
<title>广场-蝌蚪直播</title>



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
	<div class="main-square">
		<div class="square-top">
			<span class="cur-suqare-title">全部</span>
		</div>
		<div class="square-order">
			<span class="square-order-title">显示排序: </span> <span
				class="square-order-li square-order-choose">智能排序</span>
		</div>
		<ul class="squ_li clearFix">

			<?php if(is_array($data)): $i = 0; $__LIST__ = array_slice($data,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gc): $mod = ($i % 2 );++$i;?><li class="fl squ_first"><a href="/kedo/1001.html" target="_blank">
					<em class="sprite_big_box biankuang-blue"></em>
				<img src="<?php echo ($gc["image"]); ?>&w=133&amp;h=194" alt="小蜜桃">
				<span class="sprite_l pic_liverlevel_L_<?php echo ($gc["totalpoint"]); ?>"></span>
					<i>当前人数:<?php echo ($gc[numbers]); ?></i>
					<div>
						<p><?php echo (urldecode($gc["nickName"])); ?></p>
						<p>
							<?php if($gc["online"] == '1'): echo (ceil($gc[onlineTime]/60000)); ?>分钟前开播
								<?php else: ?>
								未开播<?php endif; ?>
						</p>
						<b class="b1"></b> <b class="b2"></b>
					</div>
			</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

			<?php if(is_array($data)): $i = 0; $__LIST__ = array_slice($data,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gc): $mod = ($i % 2 );++$i;?><li class="fl ">
				<a href="<?php echo ($gc["roomNumber"]); ?>" target="_blank">
					<em class="sprite_small_box biankuang_white_little "></em>
				<!--img src="http://images.181show.com/f9ff6aff8fe39b7f1f019211e0428492?w=133&amp;h=194"
					alt="Fantasy"-->
				<img src="<?php echo ($gc["image"]); ?>"
					alt="Fantasy">
				<span class="sprite_s pic_liverlevel_S_<?php echo ($gc["totalpoint"]); ?>"></span>
					<i>当前人数：<?php echo ($gc["numbers"]); ?></i>
					<div>
						<p><?php echo (urldecode($gc["nickName"])); ?></p>
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