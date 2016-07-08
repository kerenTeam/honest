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
		$this->load->model('user_model');
			$this->load->library('upload');
	}

	// 用户管理
	public function user()
	{
		$data['users'] = $this->user_model->adminUser();
		
		$this->load->view('system/adminUser',$data);
		$this->load->view('footer');
	}
	// 新增后台管理用户
	public function addadminUser()
	{
		if($_POST){
			if($_POST['passWord'] != $_POST['pwd']){
				echo "<script>alert('确认密码错误！');history.go(-1);</script>";exit;
			}
			if (!empty($_FILES['picImg']['tmp_name'])) {
                if ($this->upload->do_upload('picImg')) {
                    //上传成功
                    $fileinfo = $this->upload->data();
                    $data['headPicImg'] = 'upload/' . $fileinfo['file_name'];
                  } else {
                    //上传失败
                   echo "<script>alert('上传失败！');history.go(-1);location.reload();</script>";exit;
                  }
            }
			$data = array(
				'userName' => $_POST['userName'],
				'phoneNumber' => $_POST['phoneNumber'],
				'email' => $_POST['email'],
				'passWord' => md5($_POST['passWord']),
				'groupId' => '2',
			);
			if($this->user_model->Counseloradd($data)){
				echo "<script>alert('添加成功！');history.go(-1);</script>";exit;
			}else{
				echo "<script>alert('添加失败！');history.go(-1);</script>";exit;
			}
		}
	}


	// 删除管理账户
	public function deladminuser()
	{
		if($_GET){
			$id = $_GET['id'];
			if($this->user_model->userdel($id)){
					echo "<script>alert('删除成功！');history.go(-1);</script>";exit;
			}else{
				echo "<script>alert('删除失败！');history.go(-1);</script>";exit;
			}
		}
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