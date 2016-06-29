<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   统计管理
*/
class Other extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	// 访问数据详情
	public function visitInfo()
	{

		$this->load->view('statistics/visitInfo');
	}

	// 用户行为详情
	public function actionInfo()
	{

		$this->load->view('statistics/actionInfo');
	}

	// 资讯数据详情
	public function zixunInfo()
	{

		$this->load->view('statistics/zixunInfo');
	}


}



?>