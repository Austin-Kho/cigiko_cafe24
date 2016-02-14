<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Board_m extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * [get_list description]>게시물 목록 DB에서 가져오기 함수
	 * @param  string $table [description]>테이블 명(세그먼트-인자로 사용)
	 * @return [type]        [description]
	 */
	public function get_list($table = 'ci_board', $type='', $offset='', $limit){

		$limit_query = '';

		if($limit !='' OR $offset !=''){// 페이징이 있을 경우의 처리
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}

		$sql = " SELECT * FROM ".$table." ORDER BY board_id DESC ".$limit_query;
		$query = $this->db->query($sql);{}

		if($type=='count'){
			// 리스트를 반환하는 것이 아니라 전체 게시물의 수를 반환
			$result = $query->num_rows();
		}else{
			$result = $query->result();  // <--쿼리 결과를 '객채배열'로 받음
			// $result = $query->result_array(); // <- 쿼리 결과를 '순수배열' 로 받음
		}
		return $result;
	}
}
// End of this File