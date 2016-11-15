<?php
/**
 *
 * 功能说明：交易中心页面控制器。
 *
 **/
namespace Home\Controller;
use Think\Controller;
class TradeController extends Controller {
    public function index(){
        // echo 'aa';
        $this->display();

    }
    //充值记录；
    public function recharge(){
        $this->display(Trade/recharge);
    }

    //


}