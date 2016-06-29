<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   统计管理
*/
class System extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
	}

	// 用户管理
	public function user()
	{

		$this->load->view('system/adminUser');
		$this->load->view('footer');
	}

	// 角色管理
	public function role()
	{

		$this->load->view('system/role');
		$this->load->view('footer');
	}

	// 权限管理
	public function authority()
	{

		$this->load->view('system/authority');
		$this->load->view('footer');
	}

	// 系统日志
	public function log()
	{

		$this->load->view('system/log');
		$this->load->view('footer');
	}


}



?>