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
        $userid = $_SESSION['userid'];
        $user = M('bu_user');
        $result = $user->where("userId='{$userid}'")->find();
        $this->assign('user',$result);
       // echo 'aa';

/*
        $show=M('show');
        $data=$show->order('viewernum','DESC')->limit(20)->select();
        $this->assign('data', $data);
*/
      //  $data=file_get_contents('http://kedo.tv/rest/homeAnchors/hotAnchors.mt');
       // $data=json_decode($data,true);
       // $this->assign('rmzb', $data);

        //首页热门主播展示；
        $data=file_get_contents('http://kedo.tv/rest/homeAnchors/hotAnchors.mt');
        $data=json_decode($data,true);
       
        $this->assign('rmzb', $data['data']);
        // print_r($data['data']);
       // dump($data);exit;

        //首页精彩推荐；
        $data=file_get_contents('http://kedo.tv/rest/homeAnchors/GameAnchors.mt');
        $data=json_decode($data,true);
        $jc=array(0=>'不在线',1=>'在线');
        $this->assign('jc',$jc);
        $this->assign('jctj',$data['data']);
        

        //首页最新主播展示；
        $zxzb=file_get_contents('http://kedo.tv/rest/homeAnchors/newAnchors.mt');
        $zxzb=json_decode($zxzb,true);
        $this->assign('zxzb',$zxzb['data']);
        //print_r($zxzb['data']);


        //首页用户关注列表展示
        $data=file_get_contents('http://kedo.tv/rest/homeAnchors/followList.mt');
        $data=json_decode($data,true);
		$a=array('0'=>'不在线', '1'=>'在线' );
		//$a[$online];
		$this->assign('a',$a);
        $this->assign('gzlb',$data['data']);
        //print_r($data['data']);


        //首页主播排行榜（周榜）；
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/giftWeels.mt');
        $data=json_decode($data,true);
        $this->assign('zbzb', $data['data']);
       // print_r($data['data']);

        //首页主播排行榜（月榜）；
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/giftMonth.mt');
        $data=json_decode($data,true);
        $this->assign('zbyb', $data);
        // $this->display();


        //首页土豪排行榜（周榜）；
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/localTyrantDay.mt');
        $data=json_decode($data,true);
        $this->assign('thzb', $data['data']);
       // print_r($data['data']);

        //首页粉丝活跃榜；
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/fansActive.mt');
        $data=json_decode($data,true);
        $this->assign('fshyb',$data['data']);
        //  print_r($data);


        $this->display();
    }
     //首页热门主播展示；
    public function hotAnchors(){
        //echo "aaa";

        $data=file_get_contents('http://kedo.tv/rest/homeAnchors/hotAnchors.mt');
        $data=json_decode($data,true);
        $this->assign('rmzb', $data);
       // var_dump($data);
        //dump($data);exit;
       //$this->display("Index/index");

    }
    //首页最新主播展示；
    public function newAnchors(){

        $zxzb=file_get_contents('http://kedo.tv/rest/homeAnchors/newAnchors.mt');
        $zxzb=json_decode($zxzb,true);
        $this->assign('zxzb',$zxzb);
		//dump($zxzb);exit;
        //$this->display();

    }

    //首页用户关注列表展示
    public function followlist(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/homeAnchors/followList.mt');
        $data=json_decode($data,true);
        $this->assign('gzlb', $data);
        //dump($data);
        //$this->display('Index/index');

    }

    //首页主播排行榜（周榜）；
    public function giftWeels(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/giftWeels.mt');
        $data=json_decode($data,true);
        $this->assign('zbzb', $data);
        //$this->display();

    }
    //首页主播排行榜（月榜）；
    public function giftMonth(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/giftMonth.mt');
        $data=json_decode($data,true);
        $this->assign('zbyb', $data);
       // $this->display();

    }
    //首页主播排行榜（年榜）；
    public function giftYear(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/giftYear.mt');
        $data=json_decode($data,true);
        $this->assign('zbnb', $data);
       // $this->display();

    }
    //首页土豪排行榜（周榜）；
    public function localTyrantDay(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/localTyrantDay.mt');
        $data=json_decode($data,true);
        $this->assign('thzb', $data);
        $this->display();

    }
    //首页土豪排行榜（月榜）；
    public function localTyrantMonth(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/localTyrantMonth.mt');
        $data=json_decode($data,true);
        $this->assign('thyb', $data);
       // $this->display();

    }
    //首页土豪排行榜（年榜）；
    public function localTyrantYear(){
        //echo "aaa";
        $data=file_get_contents('http://kedo.tv/rest/anchorRanking/localTyrantYear.mt');
        $data=json_decode($data,true);
        $this->assign('thnb', $data);
        //$this->display();

    }
    //首页粉丝活跃榜；
    public function fansActive(){
        //echo "aaa";
        $data=file_get_contents(' http://kedo.tv/rest/anchorRanking/fansActive.mt');
        $data=json_decode($data,true);
        $this->assign('fshyb', $data);
        //$this->display();

    }



}