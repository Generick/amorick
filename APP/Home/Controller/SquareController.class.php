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
        //echo "aaa";
       $data=file_get_contents('http://kedo.tv/rest/homeAnchors/homeSquare.mt');
        $data=json_decode($data,true);
        $this->assign('data',$data['data']);
        //echo ($data);
       //print_r($data['data']);
        $this->display();

    }

}
