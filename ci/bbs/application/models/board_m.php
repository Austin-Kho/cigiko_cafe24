<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

/**
 * 공통 게시판 모델
 */

class Board_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_list( $table = 'ci_board', $type='', $offset='', $limit='' )
	{
		$limit_query = '';

		if( $limit != '' or $offset != '' )
		{
			// 페이징이 있을 경우의 처리
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}
		
		if( ! $table) $table = "ci_board";
		$sql = "SELECT * FROM ".$table." ORDER BY board_id DESC ".$limit_query;
		$query = $this->db->query($sql);
		if( $type == 'count' )
		{
			// 리스트를 반환하는 것이 아니라 전체 게시물의 개수를 반환
			$result = $query->num_rows();
			// $this->db->count_all($table);
		}
		else
		{
			// 게시물 리스트 반환
			$result = $query->result();
			// $result = $query->result_array();
		}
		return $result;
	}
}

/* End of file board_m.php */
/* Location: ./application/models/board_m.php */