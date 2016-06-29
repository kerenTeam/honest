<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   交流互动
*/
class Interaction extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('interaction_model');
	}

	// 交流互动列表
	public function iList()
	{	
		$data['interaction'] = $this->interaction_model->listinter();

		$this->load->view('interaction/interactionList',$data);
		$this->load->view('footer');
	}

	// 新增交流互动
	public function add()
	{

		$this->load->view('interaction/addInteraction');
		$this->load->view('footer');
	}

	// 编辑交流互动
	public function compile()
	{

		$this->load->view('interaction/compileInteraction');
		$this->load->view('footer');
	}

	// 交流互动回复列表
	public function reply()
	{

		$this->load->view('interaction/reply');
		$this->load->view('footer');
	}
}



?>