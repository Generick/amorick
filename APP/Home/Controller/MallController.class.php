<?php
/**
 *
 * 功能说明：商城控制器。
 *
 **/
namespace Home\Controller;
use Think\Controller;
class MallController extends Controller {

    public function mall(){

        R('Comment/index');
        $this->display();
    }
    public function mall_prop(){
        R('Comment/index');
        $this->display(Mall/mall_prop);
    }
    public function mall_ride(){
        R('Comment/index');
        $this->display(Mall/mall_ride);
    }
}

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016/10/27
 * Time: 14:24
 */