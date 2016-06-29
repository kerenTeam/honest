<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class User_model extends CI_Model
{
	

	// 用户表
	const TBL_MEMBER = 'member';

	// 登陆操作
	public function Login()
	{
		$pass = $this->input->post('password');

		$this->db->where('userName',$this->input->post('username'));
		$this->db->where('passWord',md5($pass));
		$q = $this->db->get(self::TBL_MEMBER);
		if($q->num_rows() > 0){
			return $q->row();
		} 
	}


	// 微信用户
	public function Users($id){
		$where['groupId'] = $id;
		$query = $this->db->where($where)->get(self::TBL_MEMBER);
		return $query->result_array();
	}
	// 微信用户详细信息
	public function WeixinUserInfo($id)
	{
		$where['userId'] = $id;
		$query = $this->db->where($where)->get(self::TBL_MEMBER);
		return $query->row_array();
	}
	// 删除用户
	public function userdel($id){
		$where['userId'] = $id;
		return $this->db->where($where)->delete(self::TBL_MEMBER);
	}


}

?>