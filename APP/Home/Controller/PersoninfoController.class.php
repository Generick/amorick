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
		$user = S('info');
		$this->assign('user',$user);
		$this -> display();
	}

	function imgupload(){
		define('_IMAGES_DOMAIN_','http://images.181show.com');
		$dir = dirname(dirname(dirname(dirname(__FILE__))))."\Public\upload\\";

		// $result['success'] = true;
		// $this->ajaxReturn($result);
		$result = array();
		$result['success'] = false;
		$success_num = 0;
		$msg = '';
		//$user=checklogin();
		if(!file_exists($dir)){
		    mkdir($dir,0755);
		}
		//
		$filename = date("YmdHis").'_'.floor(microtime() * 1000).'_'.$this->createRandomCode(8);

		$imgfile = $_FILES['__avatar1'];
		if ($imgfile['error']>0) {
			$msg = $imgfile['error'];
		}else{
			$ext = end(explode('.',$imgfile["tmp_name"]));
			$savepath = $dir.$filename.'.ico';
			//debug info
			$result["dir"] = $dir;
			$result["filename"] = $filename;
			$result['ext'] = $ext;
			$result["savepath"] = $savepath;
			$result['userid'] = $_SESSION['userid'];
			//$result["success"] = "ehrhfik";
			if (move_uploaded_file($imgfile["tmp_name"],$savepath)) {
				$success_num++;
				$md5_img = $this->uploadImg($savepath);
				$result['avatarUrls'] = _IMAGES_DOMAIN_.'/'.$md5_img;
				//save avatar to user
				$userid = $_SESSION['userid'];
				$user = M("bu_user");
				$data = array();
				$data['avatar'] = $md5_img;
				$res = $user->where(array('userId'=>$userid))->data($data)->save();
				$_SESSION['avatar'] = $md5_img;
				$result['res'] = $res;
				if ($res) {
					$result['message'] = 200;
				}else{
					$result['message'] = $savepath;
				}

			}else{
				$result['success'] = "error to load to local server";
			}
		}

		// $avatars = array("__avatar1");
		// $avatars_length = count($avatars);
		// for ( $i = 0; $i < $avatars_length; $i++ ){ 
		// 	$avatar = $_FILES[$avatars[$i]];
		// 	$avatar_number = $i + 1;
		// 	if ( $avatar['error'] > 0 ){
		// 		$msg .= $avatar['error'];
		// 	}
		// 	else{
		// 		$savePath =  $dir."$filename.jpg";

		//         if(move_uploaded_file($avatar["tmp_name"], $savePath)){
		//             $success_num++;
		//             $md5_fanmian=$this->uploadImg($savePath);
		//             $result['avatarUrls'][$i] = _IMAGES_DOMAIN_."/".$md5_fanmian;
		//             // global $db;
		//             // $db->Execute("update bu_user set avatar='$md5_fanmian' where userId= $user[userId]");
		//             // $_SESSION['login_info']['avatar']=$md5_fanmian;
		//             // if($db->Affected_Rows()>0){
		//             //     $result['message']=200;
		//             // }else{
		//             //     $result['message']=$savePath;
		//             // }
		//         }else{
		//             $result['success'] = "error to load to local server!";
		//         }


		// 	}
		// }

		// $result["userId"]	= $_POST["userId"];
		// $result["username"]	= $_POST["username"];

		$result['msg'] = $msg;
		if ($success_num > 0)
		{
			$result['success'] = true;
		}
		//返回图片的保存结果（返回内容为json字符串）
		//print json_encode($result);
		$this->ajaxReturn($result);

	}

	function uploadImg($imgurl){
		define('_IMAGES_DOMAIN_','http://images.181show.com');
		$zimg_upload_url = _IMAGES_DOMAIN_;
	    $simg=$imgurl;

	    $ch = curl_init();

	    $post_data = file_get_contents($simg); // raw_post方式

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

	function createRandomCode($length){
		$randomCode = "";
		$randomChars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		for ($i = 0; $i < $length; $i++)
		{
			$randomCode .= $randomChars { mt_rand(0, 35) };
		}
		return $randomCode;
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