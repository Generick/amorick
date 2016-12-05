<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/25
 * Time: 19:59
 */
if($_SERVER[HTTP_HOST]=='kedo.tv'){
    //echo "roomnumber";

    if(strpos($_SERVER['SCRIPT_NAME'],"live.php") && strstr($_SERVER['QUERY_STRING'],"roomnumber")){
        Header('Location:http://www.kedo.tv/'.$_GET['roomnumber']);
    }else {
        $heardUrl = 'http://www.' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];  //$_SERVER["SERVER_NAME"]
        Header('HTTP/1.1 301 Moved Permanently');
        Header('Location:' . $heardUrl);
    }
    exit();
}
define("_dataurl_","http://www.kedo.tv/files/");//首页数据接口前缀
define("_centers_","http://www.kedo.tv/rest/homeAnchors/");//个人中心动态数据接口前缀；
define("_IMAGES_DOMAIN_","http://img.kedo.tv");//图片前缀
define('_REDIS_HOST_','09ede0159aa64f40.m.cnhza.kvstore.aliyuncs.com');//redis地址
define('_REDIS_PWD_','09ede0159aa64f40:fooBa4eds');//redis地址
define('_REDIS_KEYB_','ext');

return array(
    //'配置项'=>'配置值'

    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'rm-bp13gx2a9433w42r1.mysql.rds.aliyuncs.com', // 服务器地址
    'DB_NAME'               =>  'anchors',          // 数据库名
    'DB_USER'               =>  'anchors',      // 用户名
    'DB_PWD'                =>  'a@n#c$h%o&r*sZ',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    'URL_MODEL'             =>  2,
);




////ini_set('display_errors','On');
////error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
//error_reporting(0);
//define('_CDNDOMAIN_','http://mains.kedo.tv');//文件加速服务器
//define('_IMAGES_DOMAIN_','http://img.kedo.tv');//图片服务器
//define('_IMGPLUS_DOMAIN_','http://static.kedo.tv');//图片服务器
//define('_INTERFACE_','http://www.kedo.tv');//接口
//define('_MYSQL_HOST_','rm-bp13gx2a9433w42r1.mysql.rds.aliyuncs.com');//数据库地址
//define('_MYSQL_DB_','anchors');//数据库名
//define('_MYSQL_USER_','anchors');//数据库用户名
//define('_MYSQL_PWD_','a@n#c$h%o&r*sZ');//数据库密码
//define('_COREWEB_','http://core.kedo.tv/guildsSoc/checkToken.mt');//公会地址
//define('_REDIS_HOST_','09ede0159aa64f40.m.cnhza.kvstore.aliyuncs.com');//redis地址
//define('_REDIS_PWD_','09ede0159aa64f40:fooBa4eds');//redis地址
//define('_REDIS_KEYB_','ext');
//
//$vsn = md5(date('Y-d-m')."S%00000");