<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   交流互动
*/
class API_honest extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
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

		if($_POST){
			$callback = $_GET['callback'];
			$arr = $_POST['params'];
			var_dump($_POST);
			$data = array(
				'phone' => $_GET['phoneNumber'],
				'passWord' => $_GET['passWord'],
			);
			$user = $this->honestapi_model->Loginuser($arr['phoneNumber']);
			if($user != ''){
				// 该用户已注册
				echo "$callback(2)";
			}else{
				if($this->honestapi_model->Register($data)){
					// 注册成功
					echo "$callback(1)";
				}else{
					// 注册失败
					echo "$callback(0)";
				}
			}
		}

	} 
	// 登陆用户
	public function login()
	{
		$json = json_decode(file_get_contents('php://input'), true);
			var_dump($json);
		if($_POST){

			 
			$user = $this->honestapi_model->Loginuser($json['phoneNumber']);
			if(!empty($user)){
				if(md5($arr['passWord']) != $user['passWord']){
					// 密码错误
					echo "2";
				}else{
					// 登陆成功
					echo "1";
				}
			}else{
				// 没有该用户
				echo "0";
			}
		}
	}

	// 个人中心
	



}



?>