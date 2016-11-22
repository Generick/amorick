<?php
/**
 *
 * 功能说明：公用控制器。
 *
 **/
namespace Home\Controller;
use Think\Controller;
class ComController extends Controller {

    public function _initialize(){
        //C(setting());
        /*
                $links = M('links')->limit(10)->order('o ASC')->select();
                $this->assign('links',$links);
                */

        //判断session中是否存在值

        if(!$_SESSION['userid'] ){
            //$this -> display('Login/index');
            $this->redirect('Index/index');
        }else{
            $userid = $_SESSION['userid'];
            $user = M("bu_user");
            $res = $user ->cache('info',200)-> find($userid);
            $this -> assign("user", $res);
        }
    }

}
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016/10/27
 * Time: 13:55
 */