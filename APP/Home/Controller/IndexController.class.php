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
        R('Login/session_to_redis');
        //个人中心修改头像插件需
        if (isset($_GET['rndcode']) || isset($_POST['rndcode'])) {
            $result = R('Personinfo/imgupload');
            $this->ajaxReturn($result);
            exit;
        }
        //cook信息
        $isCookie = R('Login/checkCookie');

        //首页导航栏基本用户信息

        R('Comment/index');



        //首页热门主播展示；
        $data=curl_get(_dataurl_.'anchors.json');
        //print_r($data);
        $rel=json_decode($data,true);
       // print_r($rel);
        $this->assign('rmzb', $rel['data']);
       //print_r($rel['data']);


        //首页精彩推荐；
        $data=curl_get(_dataurl_.'gameAnchors.json');
        $data=json_decode($data,true);
        $jc=array(0=>'不在线',1=>'在线');
        $this->assign('jc',$jc);
        $this->assign('jctj',$data['data']);


        //首页最新主播展示；
        $zxzb=curl_get(_dataurl_.'newAnchors.json');
        $zxzb=json_decode($zxzb,true);
        $this->assign('zxzb',$zxzb['data']);
        // print_r($zxzb['data']);


        //首页用户关注列表展示
        $data=curl_get('http://10.1.1.17/rest/homeAnchors/followList.mt');
        $data=json_decode($data,true);
        $a=array('0'=>'不在线', '1'=>'在线' );
        //$a[$online];
        $this->assign('a',$a);
        $this->assign('gzlb',$data['data']);
        //print_r($data['data']);


        //首页主播排行榜（周榜）；
        $data=curl_get(_dataurl_.'giftWeels.json');
        $data=json_decode($data,true);
        $this->assign('zbzb', $data['data']);
        // print_r($data['data']);

        //首页主播排行榜（月榜）；
        $data=curl_get(_dataurl_.'giftMonth.json');
        $data=json_decode($data,true);
        $this->assign('zbyb', $data['data']);
        // $this->display();

        //首页主播排行榜（年榜）；
        $data=curl_get(_dataurl_.'giftYear.json');
        $data=json_decode($data,true);
        $this->assign('zbnb', $data['data']);


        //首页土豪排行榜（周榜）；
        $data=curl_get(_dataurl_.'localTyrantDay.json');
        $data=json_decode($data,true);
        $this->assign('thzb', $data['data']);
        // print_r($data['data']);

        //首页土豪排行榜（月榜）；
        $data=curl_get(_dataurl_.'localTyrantMonth.json');
        $data=json_decode($data,true);
        $this->assign('thyb', $data['data']);

        //首页土豪排行榜（年榜）；
        $data=curl_get(_dataurl_.'localTyrantYear.json');
        $data=json_decode($data,true);
        $this->assign('thnb', $data['data']);

        //首页粉丝活跃榜(周榜)；
        $data=curl_get(_dataurl_.'fansActive.json');
        $data=json_decode($data,true);
        $this->assign('fszb',$data['data']);
        
        //首页粉丝活跃榜月榜
        $data=curl_get(_dataurl_.'');
        $data=json_decode($data,true);
        $this->assign('fsyb',$data['data']);

        //首页粉丝活跃榜(年榜)；
        $data=curl_get(_dataurl_.'');
        $data=json_decode($data,true);
        $this->assign('fsnb',$data['data']);
        //  print_r($data);




//        //首页热门主播展示；
//        $data=curl_post('http://10.1.1.17/rest/homeAnchors/anchors.mt');
//        $data=json_decode($data,true);
//        $this->assign('rmzb', $data['data']);
//        //print_r($data['data']);
//       // dump($data);exit;
//
//        //首页精彩推荐；
//        $data=curl_post('http://10.1.1.17/rest/homeAnchors/gameAnchors.mt');
//        $data=json_decode($data,true);
//        $jc=array(0=>'不在线',1=>'在线');
//        $this->assign('jc',$jc);
//        $this->assign('jctj',$data['data']);
//
//
//        //首页最新主播展示；
//        $zxzb=curl_post('http://10.1.1.17/rest/homeAnchors/newAnchors.mt');
//        $zxzb=json_decode($zxzb,true);
//        $this->assign('zxzb',$zxzb['data']);
//       // print_r($zxzb['data']);
//
//
//        //首页用户关注列表展示
//        $data=curl_post('http://10.1.1.17/rest/homeAnchors/followList.mt');
//        $data=json_decode($data,true);
//		$a=array('0'=>'不在线', '1'=>'在线' );
//		//$a[$online];
//		$this->assign('a',$a);
//        $this->assign('gzlb',$data['data']);
//        //print_r($data['data']);
//
//
//        //首页主播排行榜（周榜）；
//        $data=curl_post('http://10.1.1.17/rest/anchorRanking/giftWeels.mt');
//        $data=json_decode($data,true);
//        $this->assign('zbzb', $data['data']);
//       // print_r($data['data']);
//
//        //首页主播排行榜（月榜）；
//        $data=curl_post('http://10.1.1.17/rest/anchorRanking/giftMonth.mt');
//        $data=json_decode($data,true);
//        $this->assign('zbyb', $data['data']);
//        // $this->display();
//
//        //首页主播排行榜（年榜）；
//        $data=curl_post('http://10.1.1.17/rest/anchorRanking/giftYear.mt');
//        $data=json_decode($data,true);
//        $this->assign('zbnb', $data['data']);
//
//
//        //首页土豪排行榜（周榜）；
//        $data=curl_post('http://10.1.1.17/rest/anchorRanking/localTyrantDay.mt');
//        $data=json_decode($data,true);
//        $this->assign('thzb', $data['data']);
//       // print_r($data['data']);
//
//        //首页土豪排行榜（月榜）；
//        $data=curl_post('http://10.1.1.17/rest/anchorRanking/localTyrantMonth.mt');
//        $data=json_decode($data,true);
//        $this->assign('thyb', $data['data']);
//
//        //首页土豪排行榜（年榜）；
//        $data=curl_post('http://10.1.1.17/rest/anchorRanking/localTyrantYear.mt');
//        $data=json_decode($data,true);
//        $this->assign('thnb', $data['data']);
//
//        //首页粉丝活跃榜(周榜)；
//        $data=curl_post('http://10.1.1.17/rest/anchorRanking/fansActive.mt');
//        $data=json_decode($data,true);
//        $this->assign('fszb',$data['data']);
//        //  print_r($data);

        //首页粉丝活跃榜(月榜)；
        

        $this->display();
    }



}