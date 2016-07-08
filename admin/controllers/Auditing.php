<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   信息审核
*/
class Auditing extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		
	}


	// 微信审核
	public function weixin()
	{

		$this->load->view('auditing/weixinList');
		$this->load->view('footer');
	}

	// 微信审核详情
	public function weixinInfo()
	{

		$this->load->view('auditing/weixinInfo');
		$this->load->view('footer');
	}

	// 安监局发布审核
	public function safety()
	{

		$this->load->view('auditing/safetyList');
		$this->load->view('footer');
	}

	// 安监局发布审核详情
	public function safetyInfo()
	{

		$this->load->view('auditing/safetyInfo');
		$this->load->view('footer');
	}


}



?>