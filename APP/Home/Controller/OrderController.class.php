<?php
/**
 *
 * 功能说明：排行榜控制器。
 *
 **/
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {

    public function order(){

        //导航栏基本用户信息
        R('Comment/index');

        /** 主播魅力榜 */

        $data=file_get_contents('http://10.1.1.17/rest/homeAnchors/ranking.mt');
        $data=json_decode($data,true);
        $this->assign('mlb', $data['data']);
        //print_r($data['data']);
        /** 爵位榜 */

        $data=file_get_contents('http://10.1.1.17/rest/homeAnchors/theTitle.mt');
        $data=json_decode($data,true);
        $this->assign('jwb', $data['data']);
       // print_r($data['data']);
        /** 粉丝活跃榜 */

        $data=file_get_contents('http://10.1.1.17/rest/homeAnchors/active.mt');
        $data=json_decode($data,true);
        $this->assign('hyb', $data['data']);
       // print_r($data['data']);

        $this->display();

    }

}
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016/10/27
 * Time: 14:16
 */