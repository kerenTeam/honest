<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*   用户
*/
class Information extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->model('tag_model');
	}

	// 资讯列表
	public function lists()
	{

		$this->load->view('information/list');
		$this->load->view('footer');
	}

	// 新增资讯
	public function add()
	{

		$this->load->view('information/addInformation');
		$this->load->view('footer');
	}

	// 编辑资讯
	public function compile()
	{

		$this->load->view('information/compileInformation');
		$this->load->view('footer');
	}

	// 频道管理
	public function channel()
	{
		$data['tags'] = $this->tag_model->taglist();

		$this->load->view('information/channel',$data);
		$this->load->view('footer');
	}
	// 新增频道
	public function addchannel(){
		if($_POST){
			$data['tagName'] = $this->input->post('tagName');
			if($this->tag_model->addtag($data)){
				echo "<script>alert('新增成功！');history.go(-1);location.reload();</script>";exit;
			}else{
				echo "<script>alert('新增失败！');history.go(-1);location.reload();</script>";exit;
			}
		}
	}

	// 删除频道
	public function delchannel()
	 {
	 	if($_GET['id']){
	 		$id = $_GET['id'];
	 		if($this->tag_model->deltag($id)){
	 			echo "<script>alert('删除成功！');history.go(-1);location.reload();</script>";exit;
	 		}else{
	 			echo "<script>alert('删除失败！');history.go(-1);location.reload();</script>";exit;
	 		}
	 	}
	 } 

	 // 频道搜索
	 public function channelsearch()
	 {
	 	if($_POST){
	 		$seac = $this->input->post('search');
	 		$sql = "select * from honest_mytag where tagName like '%$seac%'";
	 		$query = $this->db->query($sql);
	 		$data['tags'] = $query->result_array();

	 		$this->load->view('information/channel',$data);
			$this->load->view('footer');
	 	}
	 }

}



?>