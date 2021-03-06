<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class User_model extends CI_Model
{
	

	// 用户表
	const TBL_MEMBER = 'member';
	// 审核信息表
	const TBL_APPLY = 'applymessage';
	// 用户资料审核表
	const TBL_USERINFO = 'userinfo';

	// 登陆操作
	public function Login($data)
	{
		$where['phoneNumber'] = $data;
		// $where['groupId'] = '1';
		$array = array(
			'1','2'
		);
		$query = $this->db->where($where)->where_in('groupId',$array)->get(self::TBL_MEMBER);
		return $query->row_array();
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

	// 后台管理用户
	public function adminUser()
	{
		$sql = "select * from honest_member where groupId=1 or groupId=2";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	//编辑用户资料
	public function uploaduser($id,$data)
	{
		$where['userId'] = $id;
		return $this->db->where($where)->update(self::TBL_MEMBER,$data);
	}

	// 新增咨询用户
	public function Counseloradd($data)
	{
		return $this->db->insert(self::TBL_MEMBER,$data);
	}

	// 修改管理用户密码
	public function EditPassWord($id,$data)
	{
		$where['userId'] = $id;
		return $this->db->where($where)->update(self::TBL_MEMBER,$data);
	}

	// 修改用户分组
	public function GetWeixinUser($id,$data)
	{
		$where['userId'] = $id;
		return $this->db->where($where)->update(self::TBL_MEMBER,$data);
	}

	// 用户审核
	public function UserWeixin()
	{
		$query = $this->db->get(self::TBL_APPLY);
		return $query->result_array();
	}
	// 审核
	public function editAdopt($id,$data)
	{
		$where['id'] = $id;
		return $this->db->where($where)->update(self::TBL_APPLY,$data);
	}

	// 用户资料审核
	public function AuditingUser()
	{
		$query = $this->db->get(self::TBL_USERINFO);
		return $query->result_array();
	}

}

?>