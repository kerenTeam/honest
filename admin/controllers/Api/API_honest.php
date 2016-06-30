<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   API接口
*   
*/
class API_honest extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('honestapi_model');
	}
	// banner
	public function banner()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$banners = $this->honestapi_model->Banners();
			$json = $banners['value'];
			if(empty($banners)){
				echo "0";
			}else{
				echo "$callback($json)";
			}
		}
	}
	// 资讯信息
	public function consulting()
	{	
		if($_GET){
			$callback = $_GET['callback'];
			$list = $this->honestapi_model->Consulting();
			$json = json_encode($list);
			if(empty($list)){
				echo '0';
			}else{
				echo "$callback($json)";
			}
		}
	}

	// 咨询信息详情
	public function consInfo(){
		if($_GET){
			$callback = $_GET['callback'];
			$id= $_GET['id'];	
			$listinfo = $this->honestapi_model->ConsultingInfo($id);
			$json = json_encode($listinfo);
			if(empty($listinfo)){
				echo '0';
			}else{
				echo "$callback($json)";
			}
		}
	}

	//交流互动
	public function interacting()
	{
		$callback = $_GET['callback'];
		$interacting = $this->honestapi_model->Interacting();
		$json = json_encode($interacting);
		if(empty($interacting)){
			echo 0;
		}else{
			echo "$callback($json)";
		}
	}
	// 交流互动详情
	public function interactingInfo(){
		$callback = $_GET['callback'];
		$id = $_GET['id'];
		$interinfo = $this->honestapi_model->InterInfo($id);
		$pinid = json_decode($interinfo['comments'],true);
		foreach ($pinid as $key => $value) {
			$sql = "SELECT a.commentId, a.comment, a.recommentId, a.commentTime, b.userName, b.headPicImg FROM honest_member AS b, honest_comment AS a WHERE a.userId = b.userId AND a.commentId =$value";
			$query = $this->db->query($sql);
			$comment[$key] = $query->row_array();
		}
		$interinfo['comment'] = $comment;
		$json = json_encode($interinfo);
		if(empty($interinfo)){
			echo "0";
		}else{
			echo "$callback($json)";
		}
	}

	// 问题解答
	public function problem()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$problem = $this->honestapi_model->Problem();
			$json = json_encode($problem);
			if(empty($problem)){
				echo "0";
			}else{
				echo "$callback($json)";
			}
		}
	}

	// 频道管理
	public function channel()
	{
		$callback = $_GET['callback'];
		$channel = $this->honestapi_model->Channel();
		$json = json_encode($channel);
		if(empty($channel)){
			echo "0";
		}else{
			echo "$callback($json)";
		}
	}
	// 我的频道
	public function mychannels()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$phone = $_GET['phone'];
			$channel = $this->honestapi_model->MyChannel($phone);
			$json = $channel['myTag'];
			if(empty($json)){
				$tag = $this->honestapi_model->Channel();
				$tags = json_encode($tag);
				echo "$callback($tags)";
			}else{
				echo "$callback($json)";
			}
		}
	}

	// 注册用户
	public function register(){

		if($_GET){
			$callback = $_GET['callback'];
			$arr = json_decode($_GET['registerData'],true);
			$data = array(
				'phoneNumber' => $arr['phoneNumber'],
				'passWord' => $arr['passWord'],
			);
			$phone = $arr['phoneNumber'];
			// echo "$callback($phone)";
			$user = $this->honestapi_model->Loginuser($phone);
			if($user != ''){
				// 该用户已注册
				echo "$callback(2)";
			}else{
				if($this->honestapi_model->Register($data )){
					// 注册成功
					echo "$callback(1)";
				}else{
					// 注册失败
					echo "$callback(0)";
				}
			}
		}
	} 
	// 忘记密码
	public function forgetpwd()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$arr = json_decode($_GET['modifyPasswordData'],true);
			$phone = $arr['phoneNumber'];
			$data = array(
					'passWord'=> $arr['newPassWord'],
				);
			$user = $this->honestapi_model->Loginuser($phone);
			if(!empty($user)){
				if($this->honestapi_model->NewPassword($data,$phone)){
					// 修改成功
					echo "$callback(1)"; 
				}else{
					// 修改失败
					echo "$callback(2)";
				}
			}else{
				// 没有该用户
				echo "$callback(0)";
			}
		}
	}

	// 登陆用户
	public function login()
	{
		if($_GET){
			$callback = $_GET['callback'];
			$data = json_decode($_GET['loginData'],true);
			$user = $this->honestapi_model->Loginuser($data['phoneNumber']);
			if(!empty($user)){
				if($data['passWord'] != $user['passWord']){
					// 密码错误
					echo "$callback(2)"; 
				}else{
					// 登陆成功
					echo "$callback(1)";
				}
			}else{
				// 没有该用户
				echo "$callback(0)";
			}
		}
	}

	//获取验证码
	public function send()
	{
		if($_GET){
			$callback= $_GET['callback'];
			$phone = json_decode($_GET['sendData'],true);
			// $ch = curl_init();
		 //    $url = 'http://apis.baidu.com/kingtto_media/106sms/106sms?mobile='.$phone['phoneNumber'].'&content=%e3%80%90%e5%a4%a7%e5%8e%a8%e5%88%b0%e5%ae%b6%e3%80%91%e6%82%a8%e7%9a%84%e6%b3%a8%e5%86%8c%e9%aa%8c%e8%af%81%e7%a0%81%e4%b8%ba%ef%bc%9a'.randNms;
		 //    $header = array('apikey: f8ae5ba4094b4d5134303eb87f7a115d');
		 //    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
		 //    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 //    curl_setopt($ch , CURLOPT_URL , $url);
		 //    $res = curl_exec($ch);
		    $code = randNms;
		    echo "$callback($code)";
		}
	}


	// 个人中心
	



}



?>