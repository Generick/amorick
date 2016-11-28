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
		$msg['password'] = md5(I('post.password'));
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
		$data['nickname'] = urlencode($nickname);
		//$this->ajaxReturn($data['nickname']);exit;
		$data['password'] = md5(I('post.password'));
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
		$result = $user->data($data)->add();

		if ($result) {
			$user_packs = M('bu_user_packs');
			$packs['createDT'] = $timer;
			$packs['status'] = 1;
			$packs['userid'] = $result;
			$packs_result = $user_packs->data($packs)->add();
		}

		$str['result'] = $result;
		$str['packs_result'] = $packs_result;
		if ($result) {
			$_SESSION['userid'] = (int)$result;
			$str['url'] = U('Index/index');
			$this->ajaxReturn($str);
		}else{
			$this->ajaxReturn(0);
		}
		//$this->ajaxReturn(0);
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
		$dir = __DIR__;
		$url = explode('Controller',$dir);
		$url = $url[0];
		require_once $url."\Common\qqlogin.php";
		//$this->show("");
	}
	//weixin login
	function wxlogin(){
		$dir = __DIR__;
		$dir = explode('Controller',$dir);
		$url = $dir[0];
		require_once $url.'\Common\wxlogin.php';
	}
	//qq reg
	function qqreg(){
		$AuthCode = I('get.code');
		$state = I('get.state');
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