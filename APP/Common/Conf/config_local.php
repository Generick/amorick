<?php
define("_dataurl_","http://10.1.1.17/files/");//首页数据接口前缀
define("_centers_","http://10.1.1.17/rest/homeAnchors/");//个人中心动态数据接口前缀；
define("_IMAGES_DOMAIN_","http://images.181show.com");//图片前缀
define('_REDIS_HOST_','112.124.58.61');//redis地址
define('_REDIS_PWD_','foobareds');//redis地址
define('_REDIS_KEYB_','loc');
//echo '2343432432rerer';
return array(
	//'配置项'=>'配置值'


            //'DB_DOMAIN_'            =>  'http://images.181show.com',//图片服务器
            'DB_TYPE'               =>  'mysql',     // 数据库类型
            'DB_HOST'               =>  '10.1.1.17', // 服务器地址
            'DB_NAME'               =>  'anchors',          // 数据库名
            'DB_USER'               =>  'root',      // 用户名
            'DB_PWD'                =>  'ecdf50H31b1a',          // 密码
            'DB_PORT'               =>  '3306',        // 端口
            'DB_PREFIX'             =>  '',    // 数据库表前缀
            'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

            'SHOW_PAGE_TRACE'=>true,
            'URL_MODEL'             =>  2,
			'URL_HTML_SUFFIX' => '',
			'URL_DENY_SUFFIX' => 'html|shtml|xml|tml|hml|ico|png|gif|jpg' 
       // 'URL_HTML_SUFFIX' => 'html|shtml|xml|gif|tml|hml|',
   // 'SHOW_PAGE_TRACE'=>true,

        /* 错误页面模板 */
        //'TMPL_ACTION_ERROR' => MODULE_PATH.'View/Public/error.html', // 默认错误跳转对应的模板文件
        //'TMPL_ACTION_SUCCESS'   =>  MODULE_PATH.'View/Public/success.html', // 默认成功跳转对应的模板文件
        //'TMPL_EXCEPTION_FILE'   =>  MODULE_PATH.'View/Public/exception.html',// 异常页面的模板文件


);


?>
