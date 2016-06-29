<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class Problem extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
	}

	// 问题解答列表
	public function problem()
	{
		

		$this->load->view('problem/problemList');
		$this->load->view('footer');
	}

	// 新增问题解答
	public function add()
	{

		$this->load->view('problem/addproblem');
		$this->load->view('footer');
	}

	// 编辑问题解答
	public function compile()
	{

		$this->load->view('problem/compileproblem');
		$this->load->view('footer');
	}

}



?>