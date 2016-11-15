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

		// $str['url'] = U('Index/index');
		// $str['code'] = 0;
		// $this->ajaxReturn($str);exit;

		if (!$this->checkedCode($msg['vaildcode'])) {
			$str['code'] = 2;
			$this->ajaxReturn($str);
			exit();
		}
		//$this->ajaxReturn($msg);
		//连接数据库
		$user = M("bu_user");
		//查询用户名为登录传来的值的数据
		$result = $user -> where("username='{$msg['username']}'") -> find();
		//$this->ajaxReturn($result);
		//var_dump($result);exit;
		if($result){
			//判断密码
			if($msg['password'] == $result['password']){
				$_SESSION['userid'] = $result['userid'];
				//var_dump($_SESSION['userid']);exit;
				$str['url'] = U('Index/index');
				$str['code'] = 0;
				$str['userid']=$_SESSION['userid'];
				$this->ajaxReturn($str);
				//$this -> redirect("Index/index");
			}else{
				$str['code'] = 1;
				$this->ajaxReturn($str);
				//$this->display("Login/index");
			}
		}else{
 
			//$this->display("Login/index");
		}
	}

	//reg
	function regUser(){
		//$this->ajaxReturn(0);exit;
		$data = array();
		$str = array();
		$timer=date('Y-m-d H:i:s');
		$data['username'] = I('post.username');
		$data['nickname'] = urlencode(I('post.nickname'));
		$data['password'] = md5(I('post.password'));
		$verifycode = I('post.verifycode');
		if (!$this->checkedCode($verifycode)) {
			$this->ajaxReturn(1);exit;
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
			$this->ajaxReturn($str);
		}else{
			$this->ajaxReturn(0);
		}
		//$this->ajaxReturn(0);
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
		$dir = explode('Controller',__DIR__)[0];
		require_once $dir.'\Common\wxlogin.php';
	}
	//qq reg
	function qqreg(){
		$AuthCode = I('get.code');
		$state = I('get.state');
	}

	//退出登陆
	public function logout(){

		//注销登录
		//只注销用户信息，在session中的也注销
		$user = M("user");
		$user -> where("userid='{$_SESSION['openid']['userid']}'") -> setField('status',1);

		cookie('user',null);
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