<?php 
namespace Home\Controller;
use Think\Controller;

/**
* 直播间控制器
*/
class LiveController extends Controller{
	
	public function index(){
		//live
		// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		// header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		// header("Pragma: no-cache");
		/*if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false ){
		    header("Location:/html/noie6.html");
		}*/
		// include('include/header.inc.php');
		// include($app_path."include/level.func.php");
		$user=$this->checklogin();
		//vision
		$vsn = md5(date('Y-d-m'));

		//背景
		$bgclassList=array("bg1","bg2");
		$index=rand(0,count($bgclassList)-1);

		$BSG=$bgclassList[$index];
		if(!$_COOKIE["sbg"]){
		    setcookie("sbg",$BSG,time()+10,'/',_COOKIE_DOMAIN_);
		}else{
		    $BSG=$_COOKIE["sbg"];
		}
		$roomnumber=(int)$_GET['roomnumber'];
		$roomnumber = 1029;

		//tokern校验
		// $db->Execute("update bu_user_packs set liveDT='".time()."' where userId='{$user[userId]}'");
		// $liveDT=$db->GetRow("select liveDT from bu_user_packs where userId='{$user[userId]}'");
		// if($liveDT){
		//     $currentToken=base64_encode(md5($user["username"].$user["password"].$liveDT["liveDT"]));
		//     $tokens=$user["username"].$user["password"].$liveDT["liveDT"];
		// }
		//token校验
		$bu_user_packs = M('bu_user_packs');
		$data[] = array();
		$data['liveDT'] = time();
		$result = $bu_user_packs->where(array('userId'=>$user['userId']))->data($data)->save();
		$liveDT = $bu_user_packs->where(array('userId'=>$user['userId']))->getField('liveDT');
		if ($liveDT) {
			$currentToken = base64_encode(md5($username['username'].$user['password'].$liveDT));
			$tokens = $user['username'].$user['password'].$liveDT;
		}
		//over
		//$showinfo=$db->CacheGetRow(10,"select u.userId as userId,u.avatar as avatar,u.nickname as nickname,u.city as city,a.roomNumber as roomNumber from bu_user_anchors a LEFT JOIN bu_user u on a.userId = u.userId WHERE a.roomNumber = $roomnumber and a.`status` =1 and u.`status` =1");
		//
		$model = M('bu_user');
		$userid = $_SESSION['userid'];
		$showinfo = $model->join("bu_user_anchors on bu_user_anchors.userId = bu_user.userId")->where(array("bu_user_anchors.roomNumber"=>$roomnumber,"bu_user_anchors.status"=>1,"bu_user.status"=>1))->select();
		if (!$showinfo) {
			//
		}

		// if(!$showinfo){
		// 	include($app_path."include/footer.inc.php");
		// 	header("Location:/blank.php");
		// 	exit;
		// }

		//$showinfo=safe_output($showinfo);

		if ($showinfo['nickname'] == base64_encode(base64_decode($showinfo['nickname']))) {
		    $b = base64_decode($showinfo['nickname']);
		}else{
		    $b = $showinfo['nickname'];
		}
		$showinfo['nickname'] =$b;
		$showinfo['starlevel']=1;

		//是否主播
		if($roomnumber==$user['roomNumber']){
		    $thisHome=1;
		}
		$vhistory=explode(',',$_COOKIE['vhistory']);
		if(!in_array($roomnumber,$vhistory)){
			array_unshift($vhistory,$roomnumber);
			$carr=array_chunk($vhistory,5);
			$result=join(',',$carr[0]);
			setcookie('vhistory',$result,time()+3600*356*10,'/',_COOKIE_DOMAIN_);
		}
		//礼物
		//$rs=$db->Execute("select * from gift a, giftcate b where a.giftcateid =b.giftcateid AND b.type=0 order by a.indexs DESC");
		//礼物
		$gift = M('gift');
		$rs = $gift->join("giftcate on gift.giftcateid = giftcate.giftcateid")->where(array("giftcate.type"=>0))->order('gift.indexs desc')->select();
		//dump($rs);
		//
		$giftId = $giftinfo = array();

		$zhou_xing = explode(",",$global_config_data["top_week0"].",".$global_config_data["top_week1"]);
		$giftId = $giftinfo = $zhou_xing_gift = array();


		// while($arr=$rs->FetchRow()){
		// 	$arr['class']=str_replace('.png','',$arr['giftimage']);
		// 	$arr['class']=str_replace('.gif','',$arr['class']);
		// 	if(in_array($arr['giftid'],$zhou_xing)){
		// 		$arr['week'] = true;
		// 		$zhou_xing_gift[$arr["giftid"]] = $arr;
		// 	}
		// 	$giftinfo[$arr['giftcateid']][]=$arr;
		// 	$giftId[$arr["giftid"]] = $arr;
		// }

		for ($i=0; $i <count($rs) ; $i++) { 
			$arr = $rs[$i];
			$arr['class'] = str_replace('.png','',$arr['giftimage']);
			$arr['class'] = str_replace('.gif','',$arr['class']);
			if (in_array($arr['giftid'],$zhou_xing)) {
				$arr['week'] = true;
				$zhou_xing_gift[$arr['giftid']] = $arr;
			}
			$giftinfo[$arr['giftcateid']][]=$arr;
			$giftId[$arr['giftid']] = $arr;
		}
		shuffle($zhou_xing_gift);
		//$rs=$db->Execute("select * from giftcate WHERE type=0 order by indexs DESC");
		$rs1 = M('giftcate')->where(array('type'=>0))->order('indexs desc')->select();

		$giftcate = array();
		// while($arr=$rs->FetchRow()){
		// 	$giftcate[$arr["giftcateid"]] = $arr;
		// }
		for ($i=0; $i <count($rs1) ; $i++) { 
			$giftcate[$arr['giftcateid']] = $rs1[$i];
		}
		
		$redis = new \Redis();
		$redis->connect(_REDIS_HOST_, 6379);
		$redis->auth(_REDIS_PWD_);
		$key=_REDIS_KEYB_."_c.mt.cs.ea.rt.nx.".$roomnumber."_6";
		$skid=$redis->get($key);

		$rtp_key=_REDIS_KEYB_."_c.mt.cs.ea.rt.hash.".$roomnumber."_4";
		$hash_room=$redis->hGetAll($rtp_key);

		$roomType= $hash_room['rtype']?$hash_room['rtype']:"";

		$roomType_p='';
		if($hash_room['rtype'] == "2"){
		    $roomType='game';
		    $roomType_p = $roomType."_";
		}else{
		    $roomType='';
		}

		if($skid !="" and file_exists(dirname(__FILE__)."/live_{$skid}.php")){
		    $tt=$skid;
		}else{
		    $tt="comic";
		}

		$skinType = $roomType_p.$tt;
		$page_var['cdn_domain']=_CDNDOMAIN_;
		$site_name = '0000';
		$skinType = 'comic';
		$this->assign('roomType',$roomType);
		$this->assign('currentToken',$currentToken);
		$this->assign('thisHome',$thisHome);
		$this->assign('user',$user);
		$this->assign('roomnumber',$roomnumber);
		$this->assign('showinfo',$showinfo);
		$this->assign('site_name',$site_name);
		$this->assign('skinType',$skinType);
		$this->assign('vsn',$vsn);
		//include($app_path."live_comic.php");
		//include($app_path."include/footer.inc.php");
		//live over

		$this->display();
	}

	function checklogin(){
		$userid = $_SESSION['userid'];
		$user = M('bu_user');
		$userinfo = $user->where(array('userId'=>$userid))->select();
		return $userinfo;
	}
}
?>