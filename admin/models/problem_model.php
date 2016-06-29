<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class problem_model extends CI_Model
{
	

	// 问题表
	const TBL_MYQUESTION = 'myquestion';

	// 问题列表
	public function problemlist()
	{
		$query = $this->db->get(self::TBL_MYQUESTION);
		return $query->result_array();
	}
	
	
}

?>