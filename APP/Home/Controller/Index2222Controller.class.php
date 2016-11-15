<?php
/**
 *
 * 功能说明：首页展示控制器。
 *
 **/
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       // echo 'aa';


        if(isset($_GET[openid]) and $_GET[openid] !=''){
            include("qq_index.php");
            exit();
        }
/*
        $show=M('show');
        $data=$show->order('viewernum','DESC')->limit(20)->select();
        $this->assign('data', $data);
*/

        $this->display();
    }
     //首页热门主播展示；
    public function hotAnchors(){
        //echo "aaa";

        $data=file_get_contents('http://kedo.tv/rest/homeAnchors/hotAnchors.mt');
        $data=json_decode($data,true);
        $this->assign('data', $data);
        //$this->ajaxReturn($data,'xml');
        var_dump($data);
        //echo $data;
       // $this->display();

    }
    //首页最新主播展示；
    public function newAnchors(){

        $data=file_get_contents('http://kedo.tv/rest/homeAnchors/newAnchors.mt');
        $data=json_decode($data,true);
        $this->assign('data', $data);
        //$this->display();

    }

    //首页用户关注列表展示
    public function followlist(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/homeAnchors/followList.mt');
        $data=json_decode($data,true);
        $this->assign('data', $data);
       // $this->display();

    }

    //首页主播排行榜（周榜）；
    public function giftWeels(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/giftWeels.mt');
        $data=json_decode($data,true);
        $this->assign('data', $data);
        //$this->display();

    }
    //首页主播排行榜（月榜）；
    public function giftMonth(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/giftMonth.mt');
        $data=json_decode($data,true);
        $this->assign('data', $data);
       // $this->display();

    }
    //首页主播排行榜（年榜）；
    public function giftYear(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/giftYear.mt');
        $data=json_decode($data,true);
        $this->assign('data', $data);
       // $this->display();

    }
    //首页土豪排行榜（周榜）；
    public function localTyrantDay(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/localTyrantDay.mt');
        $this->display();

    }
    //首页土豪排行榜（月榜）；
    public function localTyrantMonth(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/localTyrantMonth.mt');
        $data=json_decode($data,true);
        $this->assign('data', $data);
       // $this->display();

    }
    //首页土豪排行榜（年榜）；
    public function localTyrantYear(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/localTyrantYear.mt');
        $this->display();

    }
    //首页粉丝活跃榜；
    public function fansActive(){
        //echo "aaa";
        $data=file_get_contents(' http://kedo.tv/rest/anchorRanking/fansActive.mt');
        $data=json_decode($data,true);
        $this->assign('data', $data);
        //$this->display();

    }



}