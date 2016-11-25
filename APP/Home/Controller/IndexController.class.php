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
        if (isset($_GET['rndcode']) || isset($_POST['rndcode'])) {
            $result = R('Personinfo/imgupload');
            $this->ajaxReturn($result);
            exit;
        }

        $isCookie = R('Login/checkCookie');

        //首页导航栏基本用户信息

        R('Comment/index');

        /*curl调用方法*/
       //定义一个要发送的目标URL；
       // $url = "http://10.1.1.17/rest/homeAnchors/anchors.mt";
       //定义传递的参数数组；
  //    $data['aaa']='aaaaa';
  //    $data['bbb']='bbbb';
       // $data[]='';
         //定义返回值接收变量；
       // $rmzb = http($url, $data, 'POST');
        //$rmzb=json_decode($rmzb,true);
        //$this->assign('rmzb', $rmzb['data']);


        //首页热门主播展示；
        $data=curl_post('http://10.1.1.17/rest/homeAnchors/anchors.mt');
        $data=json_decode($data,true);
        $this->assign('rmzb', $data['data']);
        //print_r($data['data']);
       // dump($data);exit;

        //首页精彩推荐；
        $data=curl_post('http://10.1.1.17/rest/homeAnchors/gameAnchors.mt');
        $data=json_decode($data,true);
        $jc=array(0=>'不在线',1=>'在线');
        $this->assign('jc',$jc);
        $this->assign('jctj',$data['data']);
        

        //首页最新主播展示；
        $zxzb=curl_post('http://10.1.1.17/rest/homeAnchors/newAnchors.mt');
        $zxzb=json_decode($zxzb,true);
        $this->assign('zxzb',$zxzb['data']);
       // print_r($zxzb['data']);


        //首页用户关注列表展示
        $data=curl_post('http://10.1.1.17/rest/homeAnchors/followList.mt');
        $data=json_decode($data,true);
		$a=array('0'=>'不在线', '1'=>'在线' );
		//$a[$online];
		$this->assign('a',$a);
        $this->assign('gzlb',$data['data']);
        //print_r($data['data']);


        //首页主播排行榜（周榜）；
        $data=curl_post('http://10.1.1.17/rest/anchorRanking/giftWeels.mt');
        $data=json_decode($data,true);
        $this->assign('zbzb', $data['data']);
       // print_r($data['data']);

        //首页主播排行榜（月榜）；
        $data=curl_post('http://10.1.1.17/rest/anchorRanking/giftMonth.mt');
        $data=json_decode($data,true);
        $this->assign('zbyb', $data['data']);
        // $this->display();

        //首页主播排行榜（年榜）；
        $data=curl_post('http://10.1.1.17/rest/anchorRanking/giftYear.mt');
        $data=json_decode($data,true);
        $this->assign('zbnb', $data['data']);


        //首页土豪排行榜（周榜）；
        $data=curl_post('http://10.1.1.17/rest/anchorRanking/localTyrantDay.mt');
        $data=json_decode($data,true);
        $this->assign('thzb', $data['data']);
       // print_r($data['data']);

        //首页土豪排行榜（月榜）；
        $data=curl_post('http://10.1.1.17/rest/anchorRanking/localTyrantMonth.mt');
        $data=json_decode($data,true);
        $this->assign('thyb', $data['data']);

        //首页土豪排行榜（年榜）；
        $data=curl_post('http://10.1.1.17/rest/anchorRanking/localTyrantYear.mt');
        $data=json_decode($data,true);
        $this->assign('thnb', $data['data']);

        //首页粉丝活跃榜(周榜)；
        $data=curl_post('http://10.1.1.17/rest/anchorRanking/fansActive.mt');
        $data=json_decode($data,true);
        $this->assign('fszb',$data['data']);
        //  print_r($data);

        //首页粉丝活跃榜(月榜)；
        $data=file_get_contents('');
        $data=json_decode($data,true);
        $this->assign('fsyb',$data['data']);

        //首页粉丝活跃榜(年榜)；
        $data=file_get_contents('');
        $data=json_decode($data,true);
        $this->assign('fsnb',$data['data']);

        
        $this->display();
    }



}