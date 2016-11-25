<?php
/**
 *
 * 功能说明：公用控制器。
 *
 **/
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller {

    public function index(){

        /*查询并返回用户数据（基本信息和活跃度爵位之类的值）  */
        $userid = $_SESSION['userid'];
        $user = M("bu_user");
        $res = $user->cache('info', 20)->find($userid);
        $this->assign("user", $res);
        // print_r($res);

        $data = file_get_contents("http://10.1.1.17/rest/homeAnchors/personInfo.mt?userId={$userid}");
        $data = json_decode($data, true);

        if ($data[resultStatus] == 200) {

            $dj['coins'] = $data[data]['coins'];
            $dj['spender'] = $data[data]['spender'];
            $dj['differ'] = $data[data]['differ'];
            $dj['nextSpender'] = $data[data]['nextSpender'];
            $dj['active'] = $data[data]['active'];
            $dj['activeDiffer'] = $data[data]['activeDiffer'];
            $dj['nextActive'] = $data[data]['nextActive'];
            $dj['socType'] = $data[data]['socType'];
        } else {
            $dj['coins'] = 0;
            $dj['spender'] = 0;
            $dj['differ'] = 0;
            $dj['nextSpender'] = 1;
            $dj['active'] = 0;
            $dj['activeDiffer'] = 0;
            $dj['nextActive'] = 1; //比例
            $dj['socType'] = 0;
        }
        // print_r($dj);
        $this->assign('dj', $dj);
    }

    
}