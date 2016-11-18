<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>蝌蚪直播-最好玩的直播平台</title>

    <link href="/kedo/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/kedo/Public/css/style.css" rel="stylesheet">
    <link href="/kedo/Public/css/homeBg.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/kedo/Public/login/css/login.css">
    <!-- <script type="text/javascript" src="/kedo/Public/login/css/login.js"></script> -->
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
            <!--if condition="empty($_SESSION='2') eq true"-->
                <?php if($_SESSION['userid']!= ''): ?><ul class="nav navbar-nav navbar-right hidden-sm afHdNavR">
                        <li class="logName"><a href="<?php echo U('Center/index');?>" class="ellipsis"><?php echo ($user['nickname']); ?></a></li>
                        <li class="glyphicon glyphicon-menu-down"><a href=""></a></li>
                        <li class=""><a href="<?php echo U('Login/logout');?>">退出<span class="sr-only">(current)</span></a></li>
                        <li class="glyphicon glyphicon-envelope"><a href=""></a></li>
                    </ul>
                 <?php else: ?>
                    <ul class="nav navbar-nav navbar-right hidden-sm hdNavR">
                        <li><a href="<?php echo U('Login/index');?>" class="login" onclick="return false;">登录</a></li>
                        <li class="hidden-xs"><a href="">|</a></li>
                        <li class="hidden-lg hidden-md hidden-sm show-xs line"><a href=""></a></li>
                        <li class="Reg"><a href="./">注册<span class="sr-only">(current)</span></a></li>
                    </ul><?php endif; ?>


        </div><!--/.nav-collapse -->
    </div>
</div>


<!--主体-->
<div class="container main">
    <div class="row clearFix outer">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 mainLeft fl" role="main">
            <div id="carousel-example-captions" class="carousel slide" data-ride="carousel" style="margin-bottom:30px;">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-captions" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-captions" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item">
                        <img data-src="holder.js/1128x320/auto/#777:#777" alt="900x500" src="/kedo/Public/images/banner1.jpg" data-holder-rendered="true"/>
                    </div>
                    <div class="item">
                        <img data-src="holder.js/900x500/auto/#666:#666" alt="900x500" src="/kedo/Public/images/banner2.jpg" data-holder-rendered="true"/>
                    </div>
                    <div class="item active">
                        <img data-src="holder.js/900x500/auto/#555:#555" alt="900x500" src="/kedo/Public/images/banner3.jpg" data-holder-rendered="true"/>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
                    <span class="icon-prev glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
                    <span class="icon-next glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <div class="thumb-bar"></div>
            </div>

            <!--热门主播-->
            <div class="hotCon">
                <div class="page-header clearfix clearFix outer">
                    <h4 class="pull-left fl">
                        <span class="glyphicon glyphicon-hot">HOT</span>
                        <span>热门主播</span>

                    </h4>
                    <h4 class="pull-right fr hotR">
                        <a href="<?php echo U('Square/square');?>"><small>更多</small></a>
                    </h4>
                </div>
                <div class="row row1 clearFix outer">

                    <?php if(is_array($rmzb)): $i = 0; $__LIST__ = array_slice($rmzb,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rm): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 fl fir">
                        <a href="<?php echo ($rm["city"]); ?>" class="thumbnail firHot">
                            <!--img src="/kedo/Public/images/girl01.png" alt=""/-->
                            <img src="<?php echo ($rm["image"]); ?>" alt=""/>
                            <span class="glyphicon glyphicon-stats"></span>
                            <div class="firT thumbnail">
                                <div class=""></div>
                                <p class="text-center">人数：<span><?php echo ($rm["numbers"]); ?></span></p>
                            </div>
                            <div class="firB ellipsis">
                                <p class="colorPin f16"><?php echo (urldecode($rm["nickName"])); ?></p>
                                <p class="clearfix f12 outer">
                                    <span class="glyphicon glyphicon-user"></span>
                                   <!-- <span> <?php echo (ceil($rm['onlineTime']/60000)); ?></span>
                                    <span>分钟之前开播</span>-->
                                    <span>
                                        <?php if($rm["online"] == '1'): echo (ceil($rm['onlineTime']/60000)); ?>分钟前开播
                                                <?php else: ?>
                                                未开播<?php endif; ?>
                                    </span>
                                    <span class="glyphicon glyphicon-map-marker"></span>
                                    <span>上海</span>
                                </p>
                            </div>
                            <div class="shadow thumbnail"></div>
                            <div class="playBtn"></div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>


                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-6 fr itemList">
                        <div class="row clearFix outer">

                         <?php if(is_array($rmzb)): $i = 0; $__LIST__ = array_slice($rmzb,1,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rm): $mod = ($i % 2 );++$i;?><div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 fl items">
                                <a href="https://www.baidu.com" class="hotItem thumbnail" id="a">
                                    <!--img src="/kedo/Public/images/girl02.png" alt=""/-->
                                    <img src="<?php echo ($rm["image"]); ?>" alt=""/>
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <div class="hotT thumbnail">
                                        <div class=""></div>
                                        <p class="text-center">人数：<span><?php echo ($rm["numbers"]); ?></span></p>
                                    </div>
                                    <div class="hotB">
                                        <span class="colorPin f14 f14"><?php echo (urldecode($rm["nickName"])); ?></span>
                                        <p class="f12">
                                            <!-- <span class="glyphicon glyphicon-user"></span> -->
                                            <?php if($rm["online"] == '1'): echo (ceil($rm['onlineTime']/60000)); ?>分钟前开播
                                                <?php else: ?>
                                                未开播<?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="playBtn"></div>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>

                            <?php if(is_array($rmzb)): $i = 0; $__LIST__ = array_slice($rmzb,7,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rm): $mod = ($i % 2 );++$i;?><div class="col-lg-2 hidden-md hidden-sm hidden-xs fl items">
                                <a href="#" class="hotItem thumbnail">
                                    <!--img src="/kedo/Public/images/girl02.png" alt=""/-->
                                    <img src="<?php echo ($rm["image"]); ?>" alt=""/>
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <div class="hotT thumbnail">
                                        <div class=""></div>
                                        <p class="text-center">人数：<span><?php echo ($rm["numbers"]); ?></span></p>

                                    </div>
                                    <div class="hotB">
                                        <span class="colorPin f14"><?php echo (urldecode($rm["nickName"])); ?></span>
                                        <p class="f12">
                                            <!-- <span class="glyphicon glyphicon-user"></span-->
                                            <span>
                                                 <?php if($rm["online"] == '1'): echo (ceil($rm['onlineTime']/60000)); ?>分钟前开播
                                                <?php else: ?>
                                                未开播<?php endif; ?>
                                            </span>

                                        </p>
                                    </div>
                                    <div class="playBtn"></div>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>

                        </div>
                    </div>
                </div>

                <div class="row row2 clearFix outer">

                    <!--md档13,14另加的两个-->

                </div>

                <div class="row row3 clearFix outer">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 fl items">
                        <a href="#" class="thumbnail">
                            <img src="/kedo/Public/images/hotImg.png" alt=""/>
                        </a>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-6 fl">

                        <div class="row clearFix outer">

                            <?php if(is_array($rmzb)): $i = 0; $__LIST__ = array_slice($rmzb,8,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rm): $mod = ($i % 2 );++$i;?><div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 fl items">
                                <a href="#" class="hotItem thumbnail">
                                    <img src="<?php echo ($rm["image"]); ?>" alt=""/>
                                    <span class="glyphicon glyphicon-stats"></span>
                                    <div class="hotT thumbnail">
                                        <div class=""></div>
                                        <p class="text-center">人数：<span><?php echo ($rm["numbers"]); ?></span></p>

                                    </div>
                                    <div class="hotB">
                                        <span class="colorPin f14 f14"><?php echo (urldecode($rm["nickName"])); ?></span>
                                        <p class="f12">
                                            <!-- <span class="glyphicon glyphicon-user"></span> -->
                                            <?php if($rm["online"] == '1'): echo (ceil($rm['onlineTime']/60000)); ?>分钟前开播
                                                <?php else: ?>
                                                未开播<?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="playBtn"></div>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>

                        </div>
                    </div>
                </div>

                <div class="row row4 clearFix outer">
                    <!--md档另加的7,8,9,10档-->

                </div>

            </div>

            <!--精彩推荐-->
            <div class="recomm">
                <div class="page-header clearfix">
                    <h4 class="pull-left"><span class="glyphicon glyphicon-fire"></span>精彩推荐
                    </h4>
                    <h4 class="pull-right recommR">
                        <a href="javascript:;"><small>话题</small></a>
                        <a href="javascript:;"><small>游戏</small></a>
                        <a href="javascript:;"><small>户外</small></a>
                        <a href="javascript:;"><small>lol</small></a>
                        <a href="<?php echo U('Square/square');?>"><small>更多</small></a>
                    </h4>

                </div>
                <div class="row outer">

                   <!-- <foreach name="jctj" item="tj" -->
                    <?php if(is_array($jctj)): $i = 0; $__LIST__ = array_slice($jctj,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tj): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-sm-3 col-xs-4">
                        <a href="#" class="thumbnail">
                            <div class="recommImg thumbnail">
                                <img src="<?php echo ($tj[image]); ?>" alt=""/>
                                <div class="thumb-bar"></div>
                                <div class="shadow"></div>
                                <div class="playBtn"></div>
                            </div>
                            <div class="recommB">
                                <div class="clearfix">
                                    <span class="color33 pull-left"><?php echo (urldecode($tj[nickName])); ?></span>
                                    <div class="color99 pull-right">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                        <span><?php echo ($tj["numbers"]); ?></span>
                                    </div>
                                </div>
                                <p class="color99 ellipsis f12"><?php echo ($jc[$tj[online]]); ?></p>
                            </div>

                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>

            <!--最新入驻-->
            <div class="hotCon">
                <div class="page-header clearfix">
                    <h4 class="pull-left">
                        <span class="glyphicon glyphicon-hot">NEW</span>
                        <span>最新入驻</span>

                    </h4>
                    <h4 class="pull-right recommR">
                        <a href="javascript:;"><small>话题</small></a>
                        <a href="javascript:;"><small>游戏</small></a>
                        <a href="javascript:;"><small>户外</small></a>
                        <a href="javascript:;"><small>lol</small></a>
                        <a href="<?php echo U('Square/square');?>"><small>更多</small></a>
                    </h4>
                </div>
                <div class="row">

                    <?php if(is_array($zxzb)): $i = 0; $__LIST__ = array_slice($zxzb,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zx): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                        <a href="<?php echo ($zx["city"]); ?>" class="thumbnail firHot">
                            <!--img src="/kedo/Public/images/girl01.png" alt=""/-->
                            <img src="<?php echo ($zx["image"]); ?>" alt=""/>
                            <div class="firB ellipsis">
                                <p class="colorPin f16"><?php echo (urldecode($zx["nickName"])); ?></p>
                                <p class="clearfix f12 outer">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                    <span><?php echo ($zx["numbers"]); ?>人</span>
                                    <span class="glyphicon glyphicon-fire"></span>
                                    <!--<span><?php echo (ceil($zx['onlineTime']/60000)); ?>分钟前开播</span>-->
                                    <span>
                                         <?php if($zx["online"] == '1'): echo (ceil($zx['onlineTime']/60000)); ?>分钟前开播
                                                <?php else: ?>
                                                未开播<?php endif; ?>
                                    </span>
                                </p>
                            </div>
                            <div class="shadow thumbnail"></div>
                            <div class="playBtn"></div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-6">
                        <div class="row">

                            <?php if(is_array($zxzb)): $i = 0; $__LIST__ = array_slice($zxzb,1,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zx): $mod = ($i % 2 );++$i;?><div class="col-lg-2 hidden-md hidden-sm hidden-xs">
                                <a href="#" class="hotItem thumbnail">
                                    <img src="<?php echo ($zx["image"]); ?>" alt=""/>
                                    <div class="hotB">
                                        <span class="colorPin f14"><?php echo (urldecode($zx["nickName"])); ?></span>
                                        <p class="f12">
                                            <!-- <span class="glyphicon glyphicon-user"></span> -->
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            <span><?php echo ($zx["numbers"]); ?>人</span>
                                           <!-- <span><?php echo (ceil($zx['onlineTime']/60000)); ?>分钟前开播</span>-->
                                            <span>
                                             <?php if($zx["online"] == '1'): echo (ceil($zx['onlineTime']/60000)); ?>分钟前开播
                                                <?php else: ?>
                                                未开播<?php endif; ?>
                                           </span>
                                        </p>
                                    </div>
                                    <div class="playBtn"></div>
                                </a>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>



                        </div>

                    </div>

                </div>

                <div class="row">

                    <!--md档13,14另加的两个-->
                </div>

            </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right fr mainRight" role="complementary">
            <!--登录注册-->
            <div class="thumbnail regLog text-center">
                <!--登录后-->
                <!--if condition="empty($_session='') eq true"-->

                    <?php if($_SESSION['userid']!= ''): ?><div class="caption AfterLog">
                            <div class="row">
                                <div class="pull-left imgR img-circle colorPin">
                                    <img class="img-circle" src="/kedo/Public/images/photo_title.jpg" alt=""/>
                                </div>
                                <div class="pull-left">
                                    <div class="name"><?php echo (urldecode($user['nickname'])); ?></div>
                                    <div class="money">
                                        <span class="glyphicon glyphicon-bold img-circle"></span>
                                        <span class="moneyNum"><?php echo ($user['coins']); ?></span>
                                    </div>
                                    <div class="charge"><button type="button" class="btn btn-warning">充值</button></div>
                                </div>
                            </div>

                            <!--<div class="progress row">
                                <div class="progress-bar bgPin" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                                    <span class="sr-only">40% 完成</span>
                                </div>
                            </div>-->
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-danger" role="progressbar"
                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 60%;">
                                    <span class="sr-only"><?php echo ($user['nextSpender']); ?>% 完成（危险）</span>
                                </div>
                            </div>
                            <div>还差<?php echo ($user["differ"]); ?>经验值升级到下一级</div>


                            <p class="row showOw clearfix outer">
                                <input class="btn btn-md btn-default colorBlue pull-left fl show" type="submit" value="开播">
                                <input class="btn btn-md btn-default colorBlue pull-right fr" type="submit" value="OW">
                            </p>


                            <div class="clearfix outer">
                                <span class="pull-left fl">获得成就</span>
                            </div>
                            <hr/>
                            <div class="clearfix achieve outer">
                                <span class="achieve1 pull-left"></span>
                                <span class="achieve2 pull-left"></span>
                                <span class="achieve3 pull-left"></span>
                                <span class="achieve4 pull-left"></span>
                                <a href="" class="pull-right">更多</a>
                            </div>

                        </div>

                <!--登陆前-->
                <?php else: ?>

                        <div class="caption beforLog">
                            <p class="row">
                                <button type="button" id="btn_login" class="btn_login loginBtn btn btn-warning" data-loading-text="Loading..." autocomplete="off" >立即登录</button>
                            </p>
                            <p class="row">
                                <a type="button" href="" class="btn_login regBtn btn btn-default" data-loading-text="Loading..." autocomplete="off">一键注册</a>
                            </p>
                            <p class="text-left color99 pasTip">忘记密码 点击 <b><a href="javascript:;">这里找回</a></b></p>
                            <hr/>
                            <p class="text-left quickLog">快捷登录</p>
                            <p class="row">
                                <button type="button" class="btn_login btn btn-info qqLog" data-loading-text="Loading..." autocomplete="off">QQ账号登录</button>
                            </p>
                            <p class="row">
                                <button type="button" class="btn_login btn btn-success weChatLog" data-loading-text="Loading..." autocomplete="off">微信账号登录</button>
                            </p>

                        </div><?php endif; ?>
            </div>


            <!--我的关注-->
            <div class="thumbnail follow text-left">
                <div class="caption">
                    <div class="row foTit outer">
                        <h4 class="pull-left titH fl">我的关注</h4>
                        <div class="pull-right titD fl">
                            <a href="#" class="glyphicon glyphicon-menu-up"></a>
                            <a href="#" class="glyphicon glyphicon-menu-down"></a>
                        </div>
                    </div>

                    <?php if(is_array($gzlb)): $i = 0; $__LIST__ = array_slice($gzlb,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gz): $mod = ($i % 2 );++$i;?><div class="row foLi outer">
                        <a href="javascript:;">
                            <!--img class="pull-left fl" src="/kedo/Public/images/photo_title.jpg" alt=""/-->
                            <img class="pull-left fl" src="<?php echo ($gz['imagePrivate']); ?>&h=60&w=60" alt=""/>
                            <div class="pull-left fl">
                                <p class="name"><?php echo (urldecode($gz["nickName"])); ?></p>
                                <p class="ynLiv"><?php echo ($a[$gz[online]]); ?></p>
                            </div>
                            <div class="pull-left spriteLev liverlevel-pic_liverlevel_<?php echo ($gz["totalpoint"]); ?> fl"></div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>
            <!--申请入驻-->
            <a href="javascript:;" class="thumbnail">
                <img src="/kedo/Public/images/download.jpg"/>
            </a>

            <!--主播排行榜-->
            <div class="thumbnail text-left rank">
                <div class="caption">
                    <div class="row foTit outer">
                        <h4 class="pull-left titH hidden-sm fl">主播排行榜</h4>
                        <h4 class="pull-left titH visible-sm-block fl">主播榜</h4>
                        <div class="pull-right titD">
                            <a href="#" class="colorPin">周</a>
                            <a href="#" class="colorPin">月</a>
                            <a href="#" class="colorPin">年</a>
                        </div>
                    </div>

                    <?php if(is_array($zbzb)): $i = 0; $__LIST__ = array_slice($zbzb,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zb): $mod = ($i % 2 );++$i;?><div class="row foLi outer">
                        <a href="javascript:;">
                            <img class="pull-left fl" src="<?php echo ($zb["avatar"]); ?>&h=60&w=60" alt=""/>
                            <div class="pull-left fl">
                                <p class="name"><?php echo (urldecode($zb["nickname"])); ?></p>
                                <p class="ynLiv">房间号<?php echo ($zb["roomNumber"]); ?></p>
                            </div>
                            <div class="pull-left spriteLev liverlevel-pic_liverlevel_<?php echo ($zb["totalpoint"]); ?> fl"></div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>


                </div>

            </div>

            <!--土豪榜-->
            <div class="thumbnail rich text-left">
                <div class="caption">
                    <div class="row foTit outer">
                        <h4 class="pull-left titH">土豪榜</h4>
                        <div class="pull-right fl titD">
                            <a href="#" class="colorPin">周</a>
                            <a href="#" class="colorPin">月</a>
                            <a href="#" class="colorPin">年</a>
                        </div>
                    </div>

                    <?php if(is_array($thzb)): $i = 0; $__LIST__ = array_slice($thzb,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zb): $mod = ($i % 2 );++$i;?><div class="row foLi outer">
                        <a href="javascript:;">
                            <img class="pull-left fl" src="<?php echo ($zb["avatar"]); ?>&h=60&w=60" alt=""/>
                            <div class="pull-left fl">
                                <p class="name"><?php echo (urldecode($zb["nickname"])); ?></p>
                                <p class="ynLiv"><?php echo ($zb["activelmg"]); ?></p>
                            </div>
                            <div class="pull-left spriteLev liverlevel-pic_liverlevel_<?php echo ($zb["spender"]); ?> fl"></div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>


                </div>
            </div>

            <!--粉丝活跃榜-->
            <div class="fans thumbnail text-left">
                <div class="caption">
                    <div class="row foTit outer">
                        <h4 class="pull-left titH hidden-sm fl">粉丝活跃榜</h4>
                        <h4 class="pull-left titH visible-sm-block fl">粉丝榜</h4>
                        <div class="pull-right titD fl">
                            <a href="#" class="colorPin">周</a>
                            <a href="#" class="colorPin">月</a>
                            <a href="#" class="colorPin">年</a>
                        </div>
                    </div>

                    <?php if(is_array($fshyb)): $i = 0; $__LIST__ = array_slice($fshyb,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fs): $mod = ($i % 2 );++$i;?><div class="row foLi outer">
                        <a href="javascript:;">
                            <img class="pull-left fl" src="<?php echo ($fs["avatar"]); ?>&h=60&w=60" alt=""/>
                            <div class="pull-left fl">
                                <p class="name"><?php echo (urldecode($fs["nickname"])); ?></p>
                                <p class="ynLiv"><?php echo ($fs["spenderlmg"]); ?></p>
                            </div>
                            <div class="pull-left fl spriteLev liverlevel-pic_liverlevel_<?php echo ($fs["active"]); ?>"></div>
                        </a>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>


                </div>

            </div>

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
                        <img src="/kedo/index.php/Home/Index/verify" class="yzmimg yzmimg_reg" onclick="refreshRegCode()">
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
<!--底部-->
<div class="bs-docs-footer navbar-inverse" role="contentinfo">
    <div class="container">
        <p>
            <a href="javascript:;">关于蝌蚪 </a>|
            <a href="javascript:;">服务协议 </a>|
            <a href="javascript:;">客服帮助 </a>|
            <a href="javascript:;">关于我们 </a>|
            <a href="javascript:;">版权声明</a>

        </p>
        <p>
            <img src="/kedo/Public/images/logo_foot.png"/>
            <span> -Copyright©2016 沪ICP备14054721号</span>
        </p>
        <p>蝌蚪客服电话：021-63156389 | 商务合作邮箱：
            <a class="officialMailbox" href="mailto:mt@mutiantech.com">kd@kedo.tv</a>
        </p>
    </div>
</div>

<!-- 2 jQuery库 同时加载该库必须在加载bootstrap.min.js之前 -->
<script src="/kedo/Public/js/jquery-1.12.2.min.js"></script>
<!-- 3 加载bootstrap的核心ＪＳ库 -->
<script src="/kedo/Public/js/bootstrap.min.js"></script>
<script src="/kedo/Public/js/boot.js"></script>
<script type="text/javascript" src="/kedo/Public/js/index.js"></script>
<!--<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>-->
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
</body>
</html>