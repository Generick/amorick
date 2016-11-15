<?php
/**
 * 功能说明：个人信息设置控制器
 **/
namespace Home\Controller;
//use Home\Controller\;
use Think\Controller;
class PersoninfoController extends ComController {
	
	public function info(){
		//$userid = $_SESSION['openid']['userid'];
		//$user = M("user");
		//$res = $user -> find($userid);
		//$this -> assign("user", $res);
		$this -> display();
	}

	//data:$('#myform:input').serialize();


	//加载用户头像页面
	public function avatar(){
		//$userid = $_SESSION['openid']['userid'];
		//$user = M("user");
		//$res = $user -> find($userid);
		//$this -> assign("user", $res);
		$this -> display();
	}

	//执行修改头像页面
	public function modavatar(){

		
	}
	
	//密码安全，重设密码
	public function passwd(){
		$this -> display();
	}

	//检验密码重设;
	public function changePasswd(){
		
		$data['oldpwd'] = md5(I('pwd'));
		$data['pwd'] = md5(I("newpwd"));
		//var_dump($data['oldpwd']);exit;
		$uid = I("userid");
		$user = M('bu_user');
		$res = $user -> find($uid);

		if($res['pwd'] != $data['oldpwd']){
			$this -> error("原密码错误！");
		}

		$data['userid'] = $userid;
		if($user -> create($data)){
			if($user -> save()){
				$this -> success("密码修改成功！");
			}else{
				$this -> error("密码修改失败！");
			}
		}
	}

	function pwdChk(){
		$userid = I('post.userid');
		$user = M('bu_user');
		$result = $user->find($userid);
		$oldpwd = md5(I('post.oldpwd'));
		if ($oldpwd == $result['passwd']) {
			$this->ajaxReturn(0);
		}
		$this->ajaxReturn(1);
	}
	
	//绑定手机；
	public function myphone(){
		$this->display();
	}
	
}