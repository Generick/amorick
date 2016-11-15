<?php
/**
* 功能说明：模块公共文件。
**/

/**
 * 函数：加密
 * return           加密后的密码
 */
function password($password){

	return md5('ke'.$password.'do');

}