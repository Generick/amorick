<?php
/**
 * 功能说明：前台登录控制器
 **/
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function index()
	{
		//显示登录页面

		$this->display();
	}
	public function checkedUser(){
		//用户名验证
		$username = I('post.username');
		$user = M("bu_user");
		$res = $user -> where(array('username' => $username)) -> find();
		if(!$res){
			$this->ajaxReturn(0);
		}else{
			$this->ajaxReturn(1);
		}
	}

	public function checkedCode($code){

		$config =    array(

			'reset'    =>    false, // 关闭验证码杂点
		);

		//验证码验证
		$verify = new \Think\Verify($config);

		if($verify->check($code)){
			return true;
		}else{
			return false;
		}

	}

	public function login(){
		//登录验证
		$msg = array();
		$str = array();
		$msg['username'] = I('post.username');
		$msg['password'] = $this->password_deal(I('post.password'));
		$msg['vaildcode'] = I('post.vaildcode');

		if (!$this->checkedCode($msg['vaildcode'])) {
			$str['code'] = 2;
			$this->ajaxReturn($str);
			exit();
		}
		//$this->ajaxReturn($msg);
		$user = M("bu_user");
		$result = $user -> where("username='{$msg['username']}'") -> find();
		//$this->ajaxReturn($result);
		if($result){
			if($msg['password'] == $result['password']){
				//$sessionId = session_id();
				$_SESSION['userid'] = $result['userid'];
				//var_dump($_SESSION['userid']);exit;
				//返回数据
				$str['url'] = U('Index/index');
				$str['code'] = 0;
				$str['userid']=$_SESSION['userid'];
				//set cookie
				if (I('post.checked') == "true") {
					//remember login
					//set cookie
					$expiretime = time()+3600*24*365;
					$cookieData = $_SESSION['userid'].','.$msg['username'];
					$cookieEncrypt = $this->m_encrypt($cookieData);
					setcookie('KDUID',$cookieEncrypt,$expiretime,'/',$_SERVER['HTTP_HOST']);
					$str['cookie'] = $cookieEncrypt;
				}else{
					//empty cookie
					isset($_COOKIE['KDUID'])?setcookie('KDUID','',time()-3600,'/'):false;
				}

				$this->ajaxReturn($str);
			}else{
				$str['code'] = 1;
				$this->ajaxReturn($str);
			}
		}else{
 
			//$this->display("Login/index");
		}
	}
	// check cookie
	function checkCookie(){
		if (!isset($_COOKIE['KDUID'])) {
			return false;
		}else{
			$cookieData = $_COOKIE['KDUID'];
			$cookie_decode = $this->m_decrypt($cookieData);
			$cookie_array = explode(',',$cookie_decode);
			$userid = $cookie_array[0];
			$_SESSION['userid'] = $userid;
			return true;
		}
		
	}

	//nickname check
	function nicknamecheck(){
		$nickname = I('post.nickname');
		$nickname_black_list = nickname_black_list();
		if (in_array($nickname,$nickname_black_list)) {
			$this->ajaxReturn(1);exit;
		}else{
			$nickname = urlencode($nickname);
			$result = M('bu_user')->where(array('nickname'=>$nickname))->select();
			if ($result) {
				$this->ajaxReturn(2);exit;
			}
			$this->ajaxReturn(0);
		}
	}
	//reg
	function regUser(){
		$nickname_black_list = nickname_black_list();
		//$this->ajaxReturn(0);exit;
		$data = array();
		$str = array();
		$timer=date('Y-m-d H:i:s');
		$data['username'] = I('post.username');
		$nickname = I('post.nickname');
		//nickname urlencode
		$data['nickname'] = urlencode($nickname);
		//$this->ajaxReturn($data['nickname']);exit;
		$data['password'] = $this->password_deal(I('post.password'));
		$verifycode = I('post.verifycode');
		if (!$this->checkedCode($verifycode)) {
			$this->ajaxReturn(1);exit;
		}

		//preg_match('/^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email)
		if (in_array($nickname,$nickname_black_list)) {
			$this->ajaxReturn(2);exit;
		}

		// chekc nickname only one
		$nickcheck = M('bu_user')->where(array('nickname'=>$data['nickname']))->select();
		if ($nickcheck) {
			$this->ajaxReturn(3);exit;
		}

		$data['createDT'] = $timer;
		$data['status'] = 1;
		$data['accountfrom'] = 0;
		$data['email'] = $data['username'];
		$data['avatar'] = '46a920d47a9c287e627693554180598a';
		$data['gender'] = 0;
		$data['logins'] = 1;
		$user = M('bu_user');
		$new_user_id = $user->data($data)->add();// if success, return new id
		//insert new user info to bu_user_packs data table
		if ($new_user_id) {
			$user_packs = M('bu_user_packs');
			$packs['createDT'] = $timer;
			$packs['status'] = 1;
			$packs['userId'] = $new_user_id;
			$packs_result = $user_packs->data($packs)->add();
		}
		//return data
		$str['new_user_id'] = $new_user_id;
		$str['packs_result'] = $packs_result;
		//reg success
		if ($new_user_id) {
			$_SESSION['userid'] = (int)$new_user_id;
			$reg_cookie_data = $this->m_encrypt($new_user_id.','.$data['username']);
			setcookie('KDUID',$reg_cookie_data,time()+3600,'/',$_SERVER['HTTP_POST']);
			$str['url'] = U('Index/index');
			$this->ajaxReturn($str);
		}else{
			$this->ajaxReturn(0);//reg falied
		}
		//$this->ajaxReturn(0);
	}


	//password deal
	function password_deal($pwd){
		return md5(md5($pwd));
	}
	// save login session  to Redis
	function session_to_redis(){
		Vendor('session.session');
		ini_set('session.save_handler',"user");
		\session::getSession('redis',array(
			'host'=>_REDIS_HOST_,
			'port'=>'6379',
			'auth'=>_REDIS_PWD_,
			))->begin();
		session_start();
	}
	//encrypt
	function m_encrypt($encryptData){
		//echo "string";
		$key = pack('H*', "bcb04b7e103a0cd8b54669051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
        $key_size =  strlen($key);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

        $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$encryptData, MCRYPT_MODE_CBC, $iv);
        $ciphertext = $iv . $ciphertext;
        $ciphertext_base64 = base64_encode($ciphertext);
        return $ciphertext_base64;
	}
	//decrypt
	function m_decrypt($decryptData){
		//echo "string";
		$key = pack('H*', "bcb04b7e103a0cd8b54669051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
        $key_size =  strlen($key);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

        $ciphertext_dec = base64_decode($decryptData);
        $iv_dec = substr($ciphertext_dec, 0, $iv_size);
        $ciphertext_dec = substr($ciphertext_dec, $iv_size);
        $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
        return $plaintext_dec;
	}
	//qq login
	function qqlogin(){
		// $dir = __DIR__;
		// $url = explode('Controller',$dir);
		// $url = $url[0];
		// require_once $url."\Common\qqlogin.php";
		// //$this->show("");
		// exit();
		if (isset($_GET['isiphone']) && I('get.isiphone')=="1") {
			$_SESSION['isiphone'] = 1;
		}
		$action = isset($_GET['action'])?I('get.action'):'';
		switch ($action) {
			case '':
				# code...
			case 'login':
				if (I('get.from') == 'client') {
					$_SESSION['from'] = 'client';
				}
				if (I('get.from') == 'mobile') {
					$_SESSION['from'] = 'mobile';
				}
				if (I('get.from') == 'mobile_new') {
					$_SESSION['from'] = 'mobile_new';
				}
				$this->qq_login_core();//qq login
				break;
			case 'regmobile':
			case 'reg':
				$this->qq_callback();
				if($_SESSION['from']=='mobile'){
					echo "<script src='/iumobile/js/StageWebViewBridge.php?20141114c'></script>"."<script>StageWebViewBridge.call('fnCalledFromJS', null, '".$_COOKIE['KDUUS']."');</script>";
				}else if($_SESSION['from']=='mobile_new'){
					echo "<script src='/iumobile/js/StageWebViewBridge.php?20141114c'></script>"."<script>StageWebViewBridge.call('fnCalledFromJS', null, '".$_COOKIE['KDUUS']."|{$userinfo['userId']}|{$userinfo['nickname']}');</script>";
				}else if($_SESSION['from']=='client'){
					echo '<script>self.location="/index.php"</script>';
				}else{
					echo '<script>window.opener.location.href="/";window.close()</script>';
				}
				break;
			default :
				break;
		}
	}
	//weixin login
	function wxlogin(){
		// $dir = __DIR__;
		// $dir = explode('Controller',$dir);
		// $url = $dir[0];
		// require_once $url.'\Common\wxlogin.php';
		$code = I('get.code');
		$state = I('get.state');
	}
	//wx login&reg
	function wxreg(){
		$AuthCode = I('get.code');
		$state = I('get.state');
		$appid = 'wxedb924ffe29990ab';
		$appsecret = '7649359358fe7d106b0e3a965ecfea42';
		if (empty($code)) {
			$this->error("授权失败");
		}
		$token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';
		$token = json_decode(file_get_contents($token_url));
		if (isset($token->errcode)) {
			$msg =  "<h1>错误:</h1>".$token->errcode;
			$msg .= '<br/><h2>错误信息：</h2>'.$token->errmsg;
			$this->show($msg);
			exit();
		}
		$access_token_url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$appid.'&grant_type=refresh_token&refresh_token='.$token->refresh_token;
		//shift to object
		$access_token = json_decode(file_get_contents($access_token_url));
		if (isset($access_token->errcode)) {
		    $msg = '<h1>错误：</h1>'.$access_token->errcode;
		    $msg .= '<br/><h2>错误信息：</h2>'.$access_token->errmsg;
		    $this->show($msg);
		    exit;
		}
		// 参数: http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html
		$user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token->access_token.'&openid='.$access_token->openid.'&lang=zh_CN';
		//shift to object
		$user_info = json_decode(file_get_contents($user_info_url),true);
		if (isset($user_info->errcode)) {
		    $smg = '<h1>错误：</h1>'.$user_info->errcode;
		    $msg .= '<br/><h2>错误信息：</h2>'.$user_info->errmsg;
		    $this->show($msg);
		    exit;
		}
		if (empty($user_info)) {
			echo "The state does not match,You may be a victim of CSRF";
		}else{
			$userinfo = M('bu_user')->where(array('snsid'=>$user_info['openid']))->field('userId')->select();
			//user exists
			if ($userinfo) {
				$users = $this->search_save_user($userinfo['userId']);
				$this->set_login_info($users);
				setcookie("KDUID",$this->logincookie($users),time()+3600*24,'/',$_SERVER['HTTP_HOST']);
        		$_COOKIE['KDUID']=$this->logincookie($users);
        		$this->show('<script>window.opener.location.href="/";window.close()</script>') ;
			}else{
				//user does not exists in database
				$dir = dirname(dirname(dirname(dirname(__FILE__))))."\Public\upload\\";
				$ac = $this->GrabImage($user_info['headimgurl'],$dir, $user_info['openid'].".jpg");
		         if(!empty($ac)){
		             $tmp_img=$_SERVER['HTTP_HOST']."/upload/".$user_info['openid'].".jpg";
		         }else{
		             $tmp_img =$user_info['headimgurl'];
		         }
		        $tmp_img1=$_SERVER['HTTP_HOST']."/upload/".$user_info['openid'].".jpg";
		        $imghttp = get_headers($user_info['headimgurl'],true);

		        $_COOKIE['KDUID']=$this->register_by_opensns(2,$user_info['openid'],$user_info['nickname'],$tmp_img,$user_info['sex'],"WX");

		        $this->show('<script>window.opener.location.href="/";window.close()</script>');
			}
		}
	}

	function path(){
		$path = dirname(dirname(dirname(dirname(__FILE__))))."\Public\\";
		$str = "收到回复开始的开发商的胜多负少";
		$this->show(substr_replace($str,"...",9));
		$this->show($_SERVER['HTTP_HOST']);
	}
	//grabimage
	function GrabImage($url,$dir='',$filename=''){
		if(empty($url)){
                return false;
            }
            $ext = strrchr($url, '.');// find the last appear postion of a string in another string
            //为空就当前目录
            if(empty($dir)) $dir = dirname(__FILE__).'\upload\\';

           // $dir = realpath($dir);
            //目录+文件
            $filename = $dir . (empty($filename) ? time().$ext : $filename);
            //开始捕捉
           /* ob_start();
            readfile($url);
            $img = ob_get_contents();
            ob_end_clean();*/

            $ch = curl_init ($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
            $img = curl_exec ($ch);
            curl_close ($ch);

            $size = strlen($img);
            $fp2 = fopen($filename , "a");
            if(!$fp2){
                return $dir;
            }
            fwrite($fp2, $img);
            fclose($fp2);
            return $filename;
	}
	//qq login method
	function qq_login_core(){
		$qq_oauth_config = $this->qq_oauth_config();
		$_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
    	$login_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=" 
        . $qq_oauth_config['oauth_consumer_key'] . "&redirect_uri=" . urlencode($qq_oauth_config['oauth_callback'])
        . "&state=" . $_SESSION['state']
        . "&scope=".$qq_oauth_config['scope'];
    	header("Location:$login_url");
	}

	//qq callback
	function qq_callback(){
		$qq_oauth_config = $this->qq_oauth_config();
		if ($_REQUEST['state'] == $SESSION['state']) {
			$token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
            . "client_id=" . $qq_oauth_config["oauth_consumer_key"]. "&redirect_uri=" . urlencode($qq_oauth_config["oauth_callback"])
            . "&client_secret=" . $qq_oauth_config["oauth_consumer_secret"]. "&code=" . $_REQUEST["code"];
            $response = file_get_contents($token_url);//curl_get($token_url);
            if (strpos($response,"callback") !== false) {
            	$lpos = strpos($response, "(");
            	$rpos = strrpos($response, ")");
            	$response  = substr($response, $lpos + 1, $rpos - $lpos -1);
            	$msg = json_decode($response);
            	if (isset($msg->error)) {
            		echo "<h3>error:</h3>" . $msg->error;
                	echo "<h3>msg  :</h3>" . $msg->error_description;
                	exit;
            	}
            }
            $params = array();
            parse_str($response,$params);//=>array
            $_SESSION['access_token'] = $params['access_token'];
            $this->get_openid();
            //get qq user info
            $qq_user_info = $this->get_qquser_info();
            if (empty($_SESSION['openid']) || empty($qq_user_info)) {
            	echo "The state does not match,You may be a victim of CSRF";
            }else{
            	$userinfo = M('bu_user')->where(array('snsid'=>$_SESSION['openid']))->select();
            	if ($userinfo) {
            		$users=$this->search_save_user($userinfo['userId']);
            		//save login info to session
                	$this->set_login_info($users);
                	setcookie("KDUID",$this->logincookie($users),time()+3600*24,'/',$_SERVER['HTTP_HOST']);
                	$_COOKIE['KDUID']=$this->logincookie($users);
            	}else{
            		if ($qq_user_info['gender'] == '男') {
            			$gender = 1;
            		}else{
            			$gender = 0;
            		}
            		$avatar = $qq_user_info['figureurl_qq_2']?$qq_user_info['figureurl_qq_2']:$qq_user_info['figureurl_qq_1'];
            		$_COOKIE['KDUID']=$this->register_by_opensns(1,$_SESSION['openid'],$qq_user_info['nickname'],$avatar,$gender,"QQ");
            	}
            }
		}else{
			echo "The state does not match,You may be a victim of CSRF";
		}
	}
	//get openid
	function get_openid(){
		$graph_url = "https://graph.qq.com/oauth2.0/me?access_token=".$_SESSION['access_token'];

	    $str  = file_get_contents($graph_url);
	    if (strpos($str, "callback") !== false){
	        $lpos = strpos($str, "(");
	        $rpos = strrpos($str, ")");
	        $str  = substr($str, $lpos + 1, $rpos - $lpos -1);
	    }

	    $user = json_decode($str);
	    if (isset($user->error)){
	        echo "<h3>error:</h3>" . $user->error;
	        echo "<h3>msg  :</h3>" . $user->error_description;
	        exit;
	    }

	    //debug
	    //echo("Hello " . $user->openid);

	    //set openid to session
	    $_SESSION["openid"] = $user->openid;
	}
	//get qq user info
	function get_qquser_info(){
		//
		$qq_oauth_config = $this->qq_oauth_config();

    //参数: http://wiki.open.qq.com/wiki/website/get_user_info
	    $get_user_info = "https://graph.qq.com/user/get_user_info?"
	        . "access_token=" . $_SESSION['access_token']
	        . "&oauth_consumer_key=" . $qq_oauth_config["oauth_consumer_key"]
	        . "&openid=" . $_SESSION["openid"]
	        . "&format=json";

	    $info = file_get_contents($get_user_info);
	    $arr = json_decode($info, true);
	    return $arr;
	}
	//qq oauth config
	function qq_oauth_config(){
		return array(
			    'scope'=>'get_user_info',
			    'oauth_consumer_key'=>"101321404",//APP ID
			    'oauth_consumer_secret'=>"97047c25e765fdf012b118efd2d46293",//APP KEY
			    'oauth_callback'=>"http://kedo.tv/opensns/qq/reg",//回调地址
			    'oauth_request_token_url'=>"http://openapi.qzone.qq.com/oauth/qzoneoauth_request_token",
			    'oauth_authorize_url'=>'http://openapi.qzone.qq.com/oauth/qzoneoauth_authorize',
			    'oauth_request_access_token_url'=>'http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token',
			    'user_info_url' => 'http://openapi.qzone.qq.com/user/get_user_info',
		);
	}

	//search save user
	function search_save_user($userid){
		//
		$sql = "select u.userId as userId,u.nickname as nickname,u.password as password,a.roomNumber as roomNumber,u.avatar as avatar,u.username as username,u.loginDT as loginDT,u.logins as logins from bu_user u left JOIN bu_user_anchors a ON u.userId = a.userId where u.userId ={$userid}";
		$userinfo = M()->query($sql);
		$loginDT = $userinfo['loginDT'];
		$nowDT = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
		$logins = $userinfo['logins']?$userinfo['logins']:0;
		if ($loginDT == '' or $loginDT == null) {
			$loginDT = $nowDT;
			$result = M('bu_user')->where(array('userId'=>$userinfo['userId']))->data(array('loginDT'=>$loginDT,'logins'=>1))->save();
		}else{
			$loginDT_str = date('Y-m-d',strtotime($loginDT));
	        $nowDT_str = date('Y-m-d',strtotime($nowDT));
	        if($nowDT_str > $loginDT_str){
	            $logins ++;
	            $result = M('bu_user')->where(array('userId'=>$userinfo['userId']))->data(array('loginDT'=>$loginDT,'logins'=>$logins))->save();
	        }
		}

		if ($userinfo) {
			if ($userinfo['isblock'] == 1) {
				return false;
			}
			$datas1 = curl_post(_centers_."personInfo.mt","userId={$userinfo['userId']}");
			$acceptData1=json_decode($datas1, true);
			if ($userinfo['nickname'] == base64_encode(base64_decode($userinfo['nickname']))) {
	            $uuname = base64_decode($userinfo['nickname']);
	        }else{
	            $uuname = $userinfo['nickname'];
	        }

	        if($acceptData1['resultStatus'] == 200){
	            $uuname=$acceptData1['data']['user']?$acceptData1['data']['user']:$uuname;
	            $userinfo['coins'] =intval($acceptData1['data']['coins']);
	            $userinfo['spender'] =$acceptData1['data']['spender'];
	            $userinfo['differ'] = $acceptData1['data']['differ'];
	            $userinfo['nextSpender'] = $acceptData1['data']['nextSpender'];
	            $userinfo['active'] = $acceptData1['data']['active'];
	            $userinfo['activeDiffer'] = $acceptData1['data']['activeDiffer'];
	            $userinfo['nextActive'] = $acceptData1['data']['nextActive'];
	            $userinfo['socType'] = $acceptData1['data']['socType'];
	        }else{
	            $userinfo['coins'] =0;
	            $userinfo['spender'] =0;
	            $userinfo['differ'] = 0;
	            $userinfo['nextSpender'] = 1;
	            $userinfo['active'] = 0;
	            $userinfo['activeDiffer'] = 0;
	            $userinfo['nextActive'] =1; //比例
	            $userinfo['socType'] =0;
	        }
		}
		$userinfo['nickname'] = $uuname;
		$userinfo = $this->safe_output($userinfo,true);
		return $userinfo;
	}
	// set login info
	function set_login_info($userinfo){
		$_SESSION['login_info'] = $userinfo;
	}
	//get login info
	function get_login_info(){

		if($_SESSION['login_info'] or !empty($_SESSION['login_info'])){
	        //$_SESSION['login_info']['isc']='1';
	        return $_SESSION['login_info'];
	    }
	    return false;
	}
	//safe output
	function safe_output($arr,$return=true){
		if(!is_array($arr)){
			return;
		}
		foreach($arr as $key=>$val){
			if(is_array($val)){
				$val=$this->safe_output($val);
				$arr[$key]=$val;
			}
			else{
				$arr[$key]=nl2br(htmlspecialchars($val));
			}
		}
		if($return){
			return $arr;
		}
	}
	//login cookie
	function logincookie($userinfo){
		$cookie_str = $userinfo['userId'].','.$userinfo['nickname'];
		return $this->m_encrypt($cookie_str);
	}

	//register by open sns
	function register_by_opensns($type,$snsid,$nickname,$avatar,$gender,$sns_type){
		$nickname = trim($nickname);
		$nc_count = M('bu_user')->where(array('nickname'=>$nickname))->count();
		if ($nc_count != 0) {
			$nickname.="00".$nc_count;
		}
		//过滤昵称
		$nickname_black_list = nickname_black_list();
		$nickname = str_replace($nickname_black_list,'',$nickname);
		$nickname = base64_encode($nickname);//?
		if (!$_COOKIE['uniqid']) {
			$_COOKIE['uniqid'] = 0;
		}
		$timer = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
		$username = $sns_type.substr(md5($snsid),1,7);
		$pass = md5($snsid);
		$gnr = $gender?$gender:0;
		//$db->Execute("insert into bu_user(createDT,status,nickname,username,password,accountfrom,snsid,gender,logins) values('".$timer."',1,'$nickname','$username','$pass','$type','$snsid',$gnr,1)");
		$data = array();
		$data['createDT'] = $timer;
		$data['status'] = 1;
		$data['nickname'] = $nickname;
		$data['username'] = $username;
		$data['password'] = $pass;
		$data['accountfrom'] = $type;
		$data['snsid'] = $snsid;
		$data['gender'] = $gnr;
		$data['logins'] = 1;
		$newuserid = M('bu_user')->data($data)->add();// success return new id
		if ($newuserid) {
			$data = array();
			$data['createDT'] = $timer;
			$data['status'] = 1;
			$data['userId'] = $userid;
			M('bu_user_packs')->data($data)->add();
		}
		$token = $this->logincookie(array('userId'=>$newuserid,'nickname'=>$nickname));
		setcookie("KDUID",$token,time()+3600,'/',$_SERVER['HTTP_HOST']);
		$mz_avatar = '46a920d47a9c287e627693554180598a';
		if($avatar){
	        $md5_fanmian=$this->uploadSnsImages($avatar);
	        if(!$md5_fanmian){
	            $md5_fanmian=$mz_avatar;
	        }
	        M('bu_user')->where(array('userId'=>$userid))->data(array('avatar'=>$md5_fanmian))->save();

		}else{
	        M('bu_user')->where(array('userId'=>$userid))->data(array('avatar'=>$mz_avatar))->save();
	    }
		return $token;
	}
	//upload sns images
	function uploadSnsImages($imgurl){
		$zimg_upload_url = _IMAGES_DOMAIN_;
        $simg=$imgurl;

        $post_data = $this->curl_file_get_contents($simg); // raw_post方式//
		
		$ch = curl_init();

        $headers = array();
        $headers[] = 'Content-Type:jpg'; // 还有这里！

        curl_setopt($ch, CURLOPT_URL, $zimg_upload_url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        $info = curl_exec($ch);
        curl_close($ch);
		
        $json = json_decode($info, true);
        if($json['ret']==true){
            return $json['info']['md5'];
        }
        return false;
	}
	//curl file get contents
	function curl_file_get_contents($durl){
		$ch = curl_init();
	   curl_setopt($ch, CURLOPT_URL, $durl);
	   curl_setopt($ch, CURLOPT_TIMEOUT, 2);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	   $r = curl_exec($ch);
	   curl_close($ch);
	   return $r;
	}

	//退出登陆
	public function logout(){

		//delete cookie,destory session
		//$_SESSION['userid'] == '';
		$_SESSION = array();
		session_destroy();
		setcookie('KDUID','',time()-3600,'/');

		$url = U("Index/index");
		header("Location: {$url}");
		exit(0);

	}
 
	//验证码生成方法

	public function verify() {
		$config = array(
			'fontSize' => 14, // 验证码字体大小
			'length' => 4, // 验证码位数
			'useNoise' => false, // 关闭验证码杂点
			'imageW'=>100,
			'imageH'=>30,
		);
		$verify = new \Think\Verify($config);
		$verify -> entry();
	}

}