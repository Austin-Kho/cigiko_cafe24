<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

/**
* Board_m
* 공통 게시판 모델
* @uses     CI_Model
* @category Model
* @package  Package
* @author    <cigiko>
* @license  
* @link     
*/
class Board_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_list($table = 'ci_board')
	{
		$sql = "SELECT * FROM ".$table." ORDER BY board_id DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		// $result = $query->result_array();

		return $result;
	}
}


/* End of file board_m.php */
/* Location: ./application/models/board_m.php */