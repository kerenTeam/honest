<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   统计管理
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	// 登录
	public function index()
	{
		$this->load->view('login');
	}
	// 登陆操作
	public function adminlogin()
	{
		if($_POST){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run()){
				if($this->user_model->login()){
					$session['username'] = $_POST['username'];
					$this->session->set_userdata($session);
					redirect('admin/index');
				}else{
					
				echo '<script>alert("登陆失败");</script>';
				redirect('login/index');
				}
			}
		}
	}


}



?>