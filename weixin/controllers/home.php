<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*   微信首页
*/
class home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('exchange_model'):
	}

	function index(){
		// 交流中心banner
		$banner = $this->
		$this->load->view('home_index');
	}

}

 ?>