<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class User extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('user_model');
		
	}

	// 微信用户
	public function userInfo()
	{
		$data['users'] = $this->user_model->Users('4');
		$this->load->view('user/userInfo',$data);
		$this->load->view('footer');
	}

	// 用户详情
	public function info()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['userinfo'] = $this->user_model->WeixinUserInfo($id);
			// var_dump($userinfo); 
			$this->load->view('user/lookuser',$data);
			$this->load->view('footer');
		}
	}

	// 删除用户
	public function deluser()
	{
		if($_GET){
			$id = $_GET['id'];
			if($this->user_model->userdel($id)){
				echo "<script>alert('删除成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('删除失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	// 咨询师
	public function counselor()
	{
		$data['users'] = $this->user_model->Users('5');
		$this->load->view('user/counselor',$data);
		$this->load->view('footer');
	}

	// 咨询师详情
	public function counselorinfo()
	{
		if($_GET){
			$id = $_GET['id'];
			$data['userinfo'] = $this->user_model->WeixinUserInfo($id);
			$this->load->view('user/counselorinfo',$data);
			$this->load->view('footer');
		}
	}

	// 咨询记录
	public function search()
	{

		$this->load->view('user/search');
		$this->load->view('footer');
	}
}



?>