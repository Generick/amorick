<?php
/**
 * 功能说明：注册页面控制器
 */
namespace Home\Controller;
use Think\Controller;

class RegisterController extends Controller{

	public function index(){

		//显示注册或登录的页面
		$this -> display();
	}

	public function checkedUser(){

		//注册用户的验证
		$user = M("user");
		$data = $user -> where("username='{$_POST['username']}'") -> select();
		//若有结果集，则输出1
		if($data){
			echo 1;
		}
	}

	public function checkedCode(){

		$config =    array(
			'reset'    =>    false, // 关闭验证码杂点
		);
		//验证码验证
		$verify = new \Think\Verify($config);

		if(!$verify->check($_POST['user_code'])){
			echo 1;
		}

	}

	public function register(){

		//进行插入操作
		//验证密码是否一致之后 MD5密码
		$_POST['pwd'] = md5($_POST['pwd']);
		$_POST['repwd'] = md5($_POST['repwd']);
		$_POST['regdate'] = time();

		//实例化
		$user = M("user");

		if($user -> create($_POST)){
			//添加成功获取的用户id号
			$id = $user -> add();
			if($id){
				//通过用户id号,查询
				$list = $user ->find($id);
				$_SESSION['webuser'] = $list;
				
						$this -> redirect("index/index");
					}else{
						$this -> error("有故障");
					}
				

			}else{
				$this -> error("注册失败",U("Register/index"));
			}
		
	}

	//验证码生成方法
	public function code(){
		$config =    array(
			'imageW'	  =>	100,
			'imageH'	  =>	30,
			'fontSize'    =>    15,    // 验证码字体大小
			'length'      =>    3,     // 验证码位数
			'useNoise'    =>    false, // 关闭验证码杂点
			'reset'       =>    false, // 关闭验证码杂点
		);
		ob_clean();//清除缓冲区图片
		$Verify = new \Think\Verify($config);
		$Verify -> entry();

	}
}