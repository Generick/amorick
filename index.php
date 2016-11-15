<?php
// +----------------------------------------------------------------------
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0!');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

//define('BIND_MODULE','Home');//绑定Home模块到当前入口文件，可用于新增Home模块

// 定义应用目录
define('APP_PATH','./APP/');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016/10/26
 * Time: 14:49
 */