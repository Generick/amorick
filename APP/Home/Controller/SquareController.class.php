<?php

/**
 *
 * 功能说明：广场控制器。
 *
 **/
namespace Home\Controller;
use Think\Controller;
class SquareController extends Controller {

    public function square(){

        //导航栏基本用户信息
        R('Comment/index');
        
        $data=curl_post('http://kedo.tv/rest/homeAnchors/allAnchors.mt');
        $data=json_decode($data,true);
        $this->assign('data',$data['data']);
        //echo ($data);
       //print_r($data['data']);

       
        $this->display();

    }

}
