<?php
/**
 * 功能说明：个人信息设置控制器
 **/
namespace Home\Controller;
use Boris\ReadlineClient;
use Think\Controller;
class PersoninfoController extends ComController
{

	public function info()
	{
		$ab = S('info');
		$this->assign('user', $ab);

		$this->display();
	}


	//data:$('#myform:input').serialize();
	public function update(){
		
		$data = $_POST;
		$data['birthday'] = mktime(0, 0, 0, I('month'), I('day'), I('year'));
		$data['birthday'] = date("Y-m-d", $data['birthday']);
		//var_dump($data['birthday']);exit();
		//var_dump(date("Y-m-d",$data['birthday']));exit;
		//var_dump($data);exit;
		$user = M('bu_user');
		if ($user->where("userid={$_SESSION['userid']}")->create($data)) {
			if ($user->save()) {
				$this->success("成功！", U('Personinfo/info'));
			} else {
				$this->error('失败！');
			}
		}
	}

//加载用户头像页面
	public function avatar(){
		//导航栏基本用户信息
		R('Comment/index');

		$this -> display();
	}

	function imgupload(){
		$dir = dirname(dirname(dirname(dirname(__FILE__))))."\Public\upload\\";

		$result = array();
		$result['success'] = false;
		$success_num = 0;
		$msg = '';
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

		$result['msg'] = $msg;
		if ($success_num > 0)
		{
			$result['success'] = true;
		}
		//返回图片的保存结果,json
		$this->ajaxReturn($result);

	}

	function uploadImg($imgurl){
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

	

	//密码安全，重设密码
	public function passwd()
	{
		$ab = S('info');
		$this->assign('user', $ab);
		$this->display();
	}

	//检验密码重设;
	public function changePasswd()
	{

		$data['oldpwd'] = md5(I("Password"));
		$data['password'] = md5(I("newpwd"));

		//var_dump($data['oldpwd']);
		//var_dump($data['newpwd']);;

		$uid = $_SESSION['userid'];
		$user = M('bu_user');
		$res = $user->where("userId='{$uid}'")->find();
		//var_dump($res['password']);
		if ($res['password'] != $data['oldpwd']) {
			$this->error("原密码错误！");
		}
		if ($user->where("userid='{$uid}'")->save($data)) {
			$this->success("密码修改成功", U('Personinfo/passwd'));
		} else {
			$this->error("密码修改失败");
		}
	}

//	function pwdChk(){
//		$userid = I('post.userid');
//		$user = M('bu_user');
//		$result = $user->find($userid);
//		$oldpwd = md5(I('post.oldpwd'));
//		if ($oldpwd == $result['passwd']) {
//			$this->ajaxReturn(0);
//		}
//		$this->ajaxReturn(1);
//	}
//
	
	//绑定手机；
	public function myphone(){
		$userid = $_SESSION['userid'];
		$phone = M('bu_user')->where(array('userId'=>$userid))->getField('mobile');
		$this->assign('phone',$phone);
		$this->display();
	}

	function phoneCore(){
		$type=I('post.type');
		$ajax_data=array();
		$userId=$_SESSION['userid'];
	    	if($type=='send'){
		        if(I('post.number')==''){
		            $ajax_data['resultMessage']="require number with no!";
		            $this->ajaxReturn($ajax_data);
		            exit();
		        }
		        $phoneNumber=I('post.number');
		        $datas = curl_post("http://10.1.1.17/rest/personCenter/sendMessage.mt","number=$phoneNumber");
		        $acceptData=json_decode($datas, true);
		        if($acceptData!=null and $acceptData['data'] !=''){
		            $send_phone_info['time']=$_SERVER['REQUEST_TIME'];
		            $send_phone_info['phone']=$phoneNumber;
		            $send_phone_info['code']=$acceptData['data'];
		            $_SESSION['phone_array']=$send_phone_info;

		            $ajax_data['resultMessage']="success";
		            $ajax_data['resultCode']=200;
		            $ajax_data['ts']=$_SESSION['phone_array'];
		        }else{
		            $ajax_data['resultMessage']="send message error!";
		            $ajax_data['resultCode']=100;
		        }
		        $this->ajaxReturn($ajax_data);
		        exit();
	       }

	    	if($type=='bind'){
		         $code=I('post.code');

		        //没有短信信息
		        if(!empty($_SESSION['phone_array']) and count($_SESSION['phone_array']) >0){
		            $phone_infos=$_SESSION['phone_array'];
		        }else{
		            $ajax_data['resultMessage']="no send message!";
		            $ajax_data['resultCode']="100";
		            $ajax_data['ts']=$_SESSION;
		            $this->ajaxReturn($ajax_data);
		            exit();
		        }
		        //验证码错误
		        if($code!=$phone_infos['code']){
		            $ajax_data['resultMessage']="code error!";
		            $ajax_data['resultCode']="100";
		            $ajax_data['ts']=$_SESSION['phone_array'];
		            $this->ajaxReturn($ajax_data);
		            exit();
		        }
		        $bind_phone=$phone_infos['phone'];

		        $user = M('bu_user');
		        $userid = $_SESSION['userid'];
		        $userphone = array();
		        $userphone['mobile'] = $bind_phone;
		        $res = $user->where(array('userId'=>$userid))->data($userphone)->save();
		        if ($res) {
		        	$ajax_data['resultMessage'] = 'success';
		        	$ajax_data['resultCode'] = '200';
		        }else{
		        	$ajax_data['resultMessage'] = 'update phone error';
		        	$ajax_data['resultCode'] = '100';
		        	$ajax_data['ts'] = $_SESSION['phone_array'];
		        }
		        $this->ajaxReturn($ajax_data);
		        exit();
		     }
		}
	
}