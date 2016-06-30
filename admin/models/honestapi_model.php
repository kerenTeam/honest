<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*   城事安全API模型
*/
class Honestapi_model extends CI_Model
{

	// 信息表
	const TBL_MYPUBLISH = 'mypublish';
	// 用户表
	const TBL_MEMBER = 'member';
	// 问题解答
	const TBL_MYQYESTION = 'myquestion';
	// 评论表
	const TBL_COMMENT = "comment";
	// 频道
	const TBL_TAG = "mytag";
	// 系统设置
	const TBL_SYATEM = "system";

	// 返回banner 和网站 关键字
	public function Banners()
	{
		$where['name'] = "banner";
		$query = $this->db->where($where)->get(self::TBL_SYATEM);
		return $query->row_array();
	}

	// 返回所有咨询信息
	public function Consulting(){
		$contion['commend'] = '1';
		$query = $this->db->where($contion)->get(self::TBL_MYPUBLISH);
		return $query->result_array();
	}
	#咨询详情
	public function ConsultingInfo($id){
		$contion['publishId'] = $id;
		$query = $this->db->where($contion)->get(self::TBL_MYPUBLISH);
		return $query->row_array();
	}

	// 交流互动
	public function Interacting()
	{
		$query = $this->db->get(self::TBL_MYPUBLISH);
		return $query->result_array();
	}
	#交流互动详情
	public function InterInfo($id){
		$where['publishId'] = $id;
		$query = $this->db->where($where)->get(self::TBL_MYPUBLISH);
		return $query->row_array();
	}
// 	#根据评论id返回
// 	public function Comment($id)
// 	{
// 		// $where['commentId'] = $id;
// 		$sql = "SELECT a.commentId, a.comment, a.recommentId, a.commentTime, b.userName, b.headPicImg
// FROM member AS b, comment AS a
// WHERE a.userId = b.userId
// AND a.commentId =$id";
// 		$query = $this->db->query($sql);
// 		return $query->row();
// 	}

	// 问题解答
	public function Problem()
	{
		$query = $this->db->get(self::TBL_COMMENT);
		return $query->result_array();
	}

	// 频道管理
	public function Channel()
	{
		  $query = $this->db->get(self::TBL_TAG);
		  return $query->result_array();
	}
	// 我的频道
	public function MyChannel($phone)
	{
		$where['phone'] = $phone;
		$query = $this->db->where($where)->get(self::TBL_MEMBER);
		return $query->row_array(); 
	}

	//注册用户
	public function Register($data){
		return $this->db->insert(self::TBL_MEMBER,$data);
	} 
	
	//登陆用户
	public function Loginuser($data)
	{
		$where['phoneNumber'] = $data;
		$query = $this->db->where($where)->get(self::TBL_MEMBER);
		return $query->row_array();
 	}

 	// 修改密码
 	public function NewPassword($data,$phone)
 	{
 		$where['phoneNumber'] = $phone;
 		return $this->db->where($where)->update(self::TBL_MEMBER,$data); 

 	}
}

?>