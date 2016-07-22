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
	// 用户资料审核
	const TBL_USERINFO = "userinfo";
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
	public function Consulting($page,$size){
		$contion['commend'] = '1';	
		$query = $this->db->where($contion)->order_by('publishData','desc')->limit($size,$page)->get(self::TBL_MYPUBLISH);
		return $query->result_array();
	}
	#咨询详情
	public function ConsultingInfo($id){
		$contion['publishId'] = $id;
		$query = $this->db->where($contion)->get(self::TBL_MYPUBLISH);
		return $query->row_array();
	}

	// 交流互动
	public function Interacting($page,$size)
	{
		$query = $this->db->order_by('publishData','desc')->limit($size, $page)->get(self::TBL_MYPUBLISH);
		return $query->result_array();
	}

	// 问题解答
	public function Problem()
	{
		$sql = "SELECT a.questionId, a.fromId, a.toId, a.exchangeTitle,a.exchangeTime, b.userId,b.userName, b.headPicImg FROM honest_myquestion as a, honest_member as b where a.fromId = b.userId order by a.exchangeTime desc";
		$query = $this->db->query($sql);
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
		$where['phoneNumber'] = $phone;
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

 	// 根据tag
 	public function TagConsulting($data)
 	{
 		$where['tag'] = $data['tag'];
 		$size = $data['size'];
 		if($data['page'] != 1){
 			$page = $data['page'] * $data['size'] - $data['size'];
 		}else{
 			$page = $data['page'] -1;
 		}
 		$query = $this->db->where($where)->order_by('publishData',"desc")->limit($size,$page)->get(self::TBL_MYPUBLISH);
 		return $query->result_array();
 	}
 	// 根据评论返回的id查询
 	public function MyReply($data)
 	{

 		$where['publishId'] = $data['publishId'];
 		
 		$query = $this->db->where($where)->order_by('publishData','desc')->get(self::TBL_MYPUBLISH);
 		return $query->row_array();
 	}

 	// 我的发布
 	public function MyRelease($data)
 	{
 		$where['userId'] = $data['userId'];
 		$query = $this->db->where($where)->order_by('publishData','desc')->get(self::TBL_MYPUBLISH);
 		return $query->result_array();
  	}
  

  	// p评论
  	public function AddComment($data)
  	{
  		return $this->db->insert(self::TBL_COMMENT,$data);
  	}
  	// 更爱问题品论
  	public function updatepublish($id,$data)
  	 {
  	 	$where['publishId'] = $id;
  	 	return $this->db->where($where)->update(self::TBL_MYPUBLISH,$data);
  	 } 
  	 
  	 // 发布信息
  	 public function InformationeReleas($data)
  	 {
  	 	return $this->db->insert(self::TBL_MYPUBLISH,$data);
  	 }

  	 // 更改用户信息
  	 public function EditUser($id,$data)
  	 {
  	 	$where['userId'] = $id;
  	 	return $this->db->where($where)->update(self::TBL_MEMBER,$data);
  	 }

  	 //提交用户资料
  	public function UserInfo($data)
  	{
  		return $this->db->insert(self::TBL_USERINFO,$data);
  	}
}	

?>