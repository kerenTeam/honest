<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		
		$this->load->view('home_index');
	}

}

 ?>