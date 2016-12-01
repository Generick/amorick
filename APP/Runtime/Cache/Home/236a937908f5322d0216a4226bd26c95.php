<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>排行榜-蝌蚪直播</title>


	

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
	<div class="main-order">
		<div class="order-list">
			<div class="order-box-outer charmList">
				<div class="order-title">
					<div class="order-title-h1">
						主播魅力榜
						<div class="order-title-bg"></div>
					</div>
				</div>
				<ul id="orderTit">
					<li class="active">总榜</li>
					<li>月榜</li>
					<li>日榜</li>
				</ul>

				<div class="order-box-bg" id="orderBody">
					<div class="order-box-content">
						<div class="orderItem cur">
							<div class="order-box-top">

								<!--第二名-->
								<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><a href="/.html" class="order-box-second">
									<div class="order-second-img">
										<img class="rank_pho" src="<?php echo ($ml["image"]); ?>" alt="hellobaby">
										<span class="secondCrown"></span>
									</div>
									<div class="order-first-name">
										<!--<span class="sec sprite consumelevel-pic_consumelevel_7"></span>苦艾酒2222-->
										<span class="sec <?php echo ($ml["levelImg"]); ?>"></span><?php echo (urldecode($ml["nickName"])); ?>
									</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a><?php endforeach; endif; else: echo "" ;endif; ?>

								<!--第一名-->
								<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><a href="/.html" target="_blank" class="order-box-first">
									<div class="order-first-img">
										<img class="rank_pho" src="<?php echo ($ml["image"]); ?>" alt="hellobaby">
										<span class="crown"></span>
										<span class="crown"></span>
									</div>
									<div class="order-first-name">
										<!--<span class="sec sprite liverlevel-pic_liverlevel_24"></span><?php echo (urldecode($ml["nickName"])); ?>-->
										<span class="sec <?php echo ($ml["levelImg"]); ?>"></span><?php echo (urldecode($ml["nickName"])); ?>
									</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a><?php endforeach; endif; else: echo "" ;endif; ?>


								<!--第三名-->
								<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><a href="/.html" class="order-box-third">
									<div class="order-third-img">
										<img class="rank_pho" src="<?php echo ($ml["image"]); ?>" alt="hellobaby">
										<span class="thirdCrown"></span>
									</div>
									<div class="order-first-name">
										<!--<span class="sec sprite liverlevel-pic_liverlevel_22"></span>昨天的事情-->
										<span class="sec <?php echo ($ml["levelImg"]); ?>"></span><?php echo (urldecode($ml["nickName"])); ?>
									</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a><?php endforeach; endif; else: echo "" ;endif; ?>

							</div>

							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,4,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
										<span class="number">4.</span>
										<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
										<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
									</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,5,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">5.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">6.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,7,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">7.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,8,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">8.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,9,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">9.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,10,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">10.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,11,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">11.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,12,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">12.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,13,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">13.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($mlb)): $i = 0; $__LIST__ = array_slice($mlb,14,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><li><a href="/.html" target="_blank">
											<span class="number">14.</span>
											<span class="diamond sprite <?php echo ($ml["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($ml["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁订单胖胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="order-box-outer">
				<div class="order-title">
					<div class="order-title-h1">
						爵位榜
						<div class="order-title-bg"></div>
					</div>
				</div>

				<ul id="orderTit">
					<li class="active">总榜</li>
					<li>月榜</li>
					<li>日榜</li>
				</ul>

				<div class="order-box-bg" id="orderBody">
					<div class="order-box-content">
						<div class="orderItem cur">
							<div class="order-box-top">

								<!--第二名-->
								<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><a href="javascript:;" class="order-box-second">
										<div class="order-second-img">
											<img class="rank_pho" src="<?php echo ($jw["image"]); ?>" alt="hellobaby">
											<span class="secondCrown"></span>
										</div>
										<div class="order-first-name">
											<!--<span class="sec sprite consumelevel-pic_consumelevel_7"></span>苦艾酒2222-->
											<span class="sec <?php echo ($jw["levelImg"]); ?>"></span><?php echo (urldecode($jw["nickName"])); ?>
										</div>
										<div class="order-second-level">
											<span></span>
										</div>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>

								<!--第一名-->
								<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><a href="javascript:;" target="_blank" class="order-box-first">
										<div class="order-first-img">
											<img class="rank_pho" src="<?php echo ($jw["image"]); ?>" alt="hellobaby">
											<span class="crown"></span>
											<span class="crown"></span>
										</div>
										<div class="order-first-name">
											<!--<span class="sec sprite liverlevel-pic_liverlevel_24"></span><?php echo (urldecode($ml["nickName"])); ?>-->
											<span class="sec <?php echo ($jw["levelImg"]); ?>"></span><?php echo (urldecode($jw["nickName"])); ?>
										</div>
										<div class="order-first-level">
											<span></span>
										</div>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>


								<!--第三名-->
								<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><a href="javascript:;" class="order-box-third">
										<div class="order-third-img">
											<img class="rank_pho" src="<?php echo ($jw["image"]); ?>" alt="hellobaby">
											<span class="thirdCrown"></span>
										</div>
										<div class="order-first-name">
											<!--<span class="sec sprite liverlevel-pic_liverlevel_22"></span>昨天的事情-->
											<span class="sec <?php echo ($jw["levelImg"]); ?>"></span><?php echo (urldecode($jw["nickName"])); ?>
										</div>
										<div class="order-third-level">
											<span></span>
										</div>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>

							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,4,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
										<span class="number">4.</span>
										<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
										<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
									</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,5,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">5.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">6.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,7,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">7.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,8,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">8.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,9,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">9.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,10,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">10.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,11,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">11.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,12,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">12.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,13,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">13.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,14,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">14.</span>
											<span class="diamond sprite <?php echo ($jw["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($jw["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖问问胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖胖跳脱11衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="order-box-outer">
				<div class="order-title">
					<div class="order-title-h1">
						粉丝活跃榜
						<div class="order-title-bg"></div>
					</div>
				</div>

				<ul id="orderTit">
					<li class="active">总榜</li>
					<li>月榜</li>
					<li>日榜</li>
				</ul>

				<div class="order-box-bg" id="orderBody">
					<div class="order-box-content">
						<div class="orderItem cur">
							<div class="order-box-top">

								<!--第二名-->
								<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,1,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><a href="javascript:;" class="order-box-second">
										<div class="order-second-img">
											<img class="rank_pho" src="<?php echo ($hy["image"]); ?>" alt="hellobaby">
											<span class="secondCrown"></span>
										</div>
										<div class="order-first-name">
											<!--<span class="sec sprite consumelevel-pic_consumelevel_7"></span>苦艾酒2222-->
											<span class="sec <?php echo ($hy["levelImg"]); ?>"></span><?php echo (urldecode($hy["nickName"])); ?>
										</div>
										<div class="order-second-level">
											<span></span>
										</div>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>

								<!--第一名-->
								<?php if(is_array($jwb)): $i = 0; $__LIST__ = array_slice($jwb,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jw): $mod = ($i % 2 );++$i;?><a href="javascript:;" target="_blank" class="order-box-first">
										<div class="order-first-img">
											<img class="rank_pho" src="<?php echo ($jw["image"]); ?>" alt="hellobaby">
											<span class="crown"></span>
											<span class="crown"></span>
										</div>
										<div class="order-first-name">
											<!--<span class="sec sprite liverlevel-pic_liverlevel_24"></span><?php echo (urldecode($ml["nickName"])); ?>-->
											<span class="sec <?php echo ($jw["levelImg"]); ?>"></span><?php echo (urldecode($hy["nickName"])); ?>
										</div>
										<div class="order-first-level">
											<span></span>
										</div>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>


								<!--第三名-->
								<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,3,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><a href="javascript:;" class="order-box-third">
										<div class="order-third-img">
											<img class="rank_pho" src="<?php echo ($hy["image"]); ?>" alt="hellobaby">
											<span class="thirdCrown"></span>
										</div>
										<div class="order-first-name">
											<!--<span class="sec sprite liverlevel-pic_liverlevel_22"></span>昨天的事情-->
											<span class="sec <?php echo ($hy["levelImg"]); ?>"></span><?php echo (urldecode($hy["nickName"])); ?>
										</div>
										<div class="order-third-level">
											<span></span>
										</div>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>



							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,4,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
										<span class="number">4.</span>
										<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
										<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
									</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,5,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">5.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">6.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,7,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">7.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,8,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">8.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,9,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">9.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,10,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">10.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,11,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">11.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,12,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">12.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,13,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">13.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>

									<?php if(is_array($hyb)): $i = 0; $__LIST__ = array_slice($hyb,14,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">
											<span class="number">14.</span>
											<span class="diamond sprite <?php echo ($hy["levelImg"]); ?>"></span>
											<span class="order-second-name"><?php echo (urldecode($hy["nickName"])); ?></span>
										</a></li><?php endforeach; endif; else: echo "" ;endif; ?>




								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
						<div class="orderItem">
							<div class="order-box-top">
								<a href="javascript:;" class="order-box-second">
									<div class="order-second-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="secondCrown"></span>
									</div>
									<div class="order-second-name">梁胖胖跳脱衣舞</div>
									<div class="order-second-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-first">
									<div class="order-first-img">
										<img src="/skin/ym/images/fff1.png"> <span class="crown"></span>
									</div>
									<div class="order-first-name">梁胖胖跳脱衣舞</div>
									<div class="order-first-level">
										<span></span>
									</div>
								</a> <a href="javascript:;" class="order-box-third">
									<div class="order-third-img">
										<img src="/skin/ym/images/fff3.png"> <span
											class="thirdCrown"></span>
									</div>
									<div class="order-third-name">梁胖胖跳脱衣舞</div>
									<div class="order-third-level">
										<span></span>
									</div>
								</a>
							</div>
							<div class="clear"></div>
							<div class="order-box-bottom">
								<ul>
									<li><a href="javascript:;"> <span class="number">4.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">5.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">6.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">7.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">8.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">9.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">10.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">11.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">12.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">13.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">14.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
									<li><a href="javascript:;"> <span class="number">15.</span>
											<span class="order-second-name">坐看梁胖胖吃香</span>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

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