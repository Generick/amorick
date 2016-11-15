<?php
/**
 * 功能说明：个人中心
 */
namespace Home\Controller;
//use Home\Controller\;
use Think\Controller;
class CenterController extends Controller {

	public function index(){
		$userid = $_SESSION['userid'];
		$user = M("bu_user");
		$res = $user ->where("userId='{$userid}'") ->find();
		$this -> assign("user", $res);
		$this -> display();
	}

	//data:$('#myform:input').serialize();
	public function update(){
		$data = $_POST;
		$data['birthday'] = mktime(0, 0, 0, I('month'), I('day'), I('year'));

		//var_dump($data['birthday']);
		//var_dump(date("Y-m-d",$data['birthday']));exit;

		//var_dump($data);exit;
		if(I('year') && I('month') && I('day')){
			$data['birthday'] = mktime(0, 0, 0, I('month'), I('day'), I('year'));
		}else{
			unset($_POST['year']);
			unset($_POST['month']);
			unset($_POST['day']);
		}
		//var_dump($data);exit;
		$user = M('user_info');
		if($user -> create($data)){
			if($user -> save()){
				$this -> success("成功！",U('Personinfo/index'));
			}else{
				$this -> error('失败！');
			}
		}
	}

	//加载用户头像页面
	public function avatar(){

		$uid = $_SESSION['webuser']['uid'];
		$user = M("user_info");
		$data = $user -> find($uid);
		$this -> assign('user',$data);
		$this -> display();
	}

	//执行修改头像页面
	public function modavatar(){

		//var_dump($_FILES['icon']);exit;
		if($_FILES['icon']['name']){
			//echo 22;exit;
			//var_dump($_SESSION['webuser']['icon']);exit;
			unlink("./Public/uploads/{$_POST['oldicon']}");
			unlink("./Public/uploads/b_{$_POST['oldicon']}");
			unlink("./Public/uploads/m_{$_POST['oldicon']}");
			unlink("./Public/uploads/s_{$_POST['oldicon']}");

			//头像上传
			$upload = new \Think\Upload();
			$upload -> maxSize = 102400000;
			$upload -> exts = array('jpg','jpeg','png','gif');
			$upload -> rootPath = 'Public';
			$upload -> savePath = '/uploads/';
			$info = $upload -> upload();

			$file = $info['icon']['savename'];

			$_SESSION['webuser']['icon'] = $file;


			//图片缩放
			$image = new \Think\Image();
			$image -> open("./Public/uploads/{$info['icon']['savename']}");
			//生成一个缩放后填充大小180*200和36*36的缩略图并保存为thumb.jpg
			$image -> thumb(200,200,\Think\Image::IMAGE_THUMB_FILLED) -> save("./Public/uploads/b_{$info['icon']['savename']}");
			$image -> thumb(120,120,\Think\Image::IMAGE_THUMB_FILLED) -> save("./Public/uploads/m_{$info['icon']['savename']}");
			$image -> thumb(48,48,\Think\Image::IMAGE_THUMB_FILLED) -> save("./Public/uploads/s_{$info['icon']['savename']}");

			$_POST['icon'] = $file;
			//var_dump($file);exit;
		}else{
			//echo 11;exit;
			unset($_POST['oldicon']);
		}

		$user = M("user_info");

		if($user -> create()){
			if($user -> save()){
				$this->redirect('Personinfo/avatar');
				//$this -> success("修改成功","index");
			}else{
				$this -> error("修改失败");
			}
		}
	}

	//用户积分
	public function credits(){

		$uid = $_SESSION['webuser']['uid'];
		$user = M('user_info');
		$data = $user -> find($uid);
		$point=M('point');

		$points1=$point->where("uid={$uid} and typeid=1")->find();
		$points2=$point->where("uid={$uid} and typeid=2")->find();
		$points3=$point->where("uid={$uid} and typeid=3")->find();
		$points4=$point->where("uid={$uid} and typeid=4")->find();

		$this -> assign("apoint",$points1);
		$this -> assign("bpoint",$points2);
		$this -> assign("cpoint",$points3);
		$this -> assign("dpoint",$points4);

		$this -> assign('res',$data);
		$this -> display();
	}

	//用户权限详情
	public function permission(){

		$uid = $_SESSION['webuser']['uid'];
		//$uid = 1;
		$user = M('user_info');
		$data = $user -> find($uid);	//获取用户的总积分$data['credits']

		//var_dump($data['credits']);exit;

		$permi = M("user_group");
		$row = $permi -> find($data['groupid']);
		$_SESSION['data'] = $row;

		if(!empty($_GET['gid'])){
			$row = $permi -> find($_GET['gid']);
		}
		$members = $permi -> where("grouptype='member'") -> select();
		$systems = $permi -> where("grouptype='system'") -> select();
		//var_dump($row);exit;
		// echo "<pre>";
		$result = $permi -> order("points desc") -> select();

		//var_dump($result);exit;
		foreach($result as $k=>$v){
			if($data['credits'] > $v['points']){
				$info = $permi -> where("points='{$result[$k-1]['points']}'") -> find();
				// var_dump($info['gid']);
				// var_dump($info);

				$this -> assign('row',$row);				//若用户是管理员
				$this -> assign('members',$members);		//若用户是会员组
				$this -> assign('systems',$systems);		//若用户是管理组
				$this -> assign('info',$info);				//等级的用户信息
				$this -> assign('data',$data);				//用户的基本信息
				$this -> display();
				exit;
			}
		}
	}
	//密码安全，重设密码
	public function passwd(){
		$this -> display();
	}

	//检验密码重设
	public function changePasswd(){


		$data['oldpwd'] = md5(I('pwd'));
		$data['pwd'] = md5(I("newpwd"));
		//var_dump($data['oldpwd']);exit;
		$uid = I("uid");
		$user = M('user_info');
		$res = $user -> find($uid);

		if($res['pwd'] != $data['oldpwd']){
			$this -> error("原密码错误！");
		}

		$data['uid'] = $uid;
		if($user -> create($data)){
			if($user -> save()){
				$this -> success("密码修改成功！");
			}else{
				$this -> error("密码修改失败！");
			}
		}
	}
}