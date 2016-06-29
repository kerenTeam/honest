<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Interaction_model extends CI_Model
{
	

	// 信息表
	const TBL_MYPUB = 'mypublish';

	// 查询交流互动
	public function listinter()
	{
		$query = $this->db->get(self::TBL_MYPUB);
		return $query->result_array();
	}

}

?>