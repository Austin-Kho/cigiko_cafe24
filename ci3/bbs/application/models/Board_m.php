<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Board_m extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * [get_list 게시물 목록 DB에서 가져오기 함수]
	 * @param  string $table [테이블 명(세그먼트-인자로 사용)]>
	 * @return [Array]        [게시물 목록 데이터]
	 */
	public function get_list($table = 'ci_board', $type='', $offset='', $limit='', $search_word=''){

		$sword ='';

		if($search_word!=''){
			// 검색어가 있을 경우 처리
			$sword = ' WHERE subject LIKE "%'.$search_word.'%" OR contents LIKE "%'.$search_word.'%" ';
		}

		$limit_query = '';

		if($limit !='' OR $offset !=''){// 페이징이 있을 경우의 처리
			$limit_query = ' LIMIT '.$offset.', '.$limit;
		}

		$sql = " SELECT * FROM ".$table.$sword." ORDER BY board_id DESC ".$limit_query;
		$query = $this->db->query($sql);{}

		if($type=='count'){
			// 리스트를 반환하는 것이 아니라 전체 게시물의 수를 반환
			$result = $query->num_rows();
			// $this->db->count_all($table);
		}else{
			$result = $query->result();  // <--쿼리 결과를 '객채배열'로 받음
			// $result = $query->result_array(); // <- 쿼리 결과를 '순수배열' 로 받음
		}
		return $result;
	}

	/**
	 * [get_view 게시판 내용보기 디비 로직]
	 * @param  [String] $table [테이블명]
	 * @param  [int] $id    [게시물 아이디]
	 * @return [Array]        [게시물 내용]
	 */
	public function get_view($table, $id){
		// 조회수 증가
		$sql0 = " UPDATE ".$table." SET hits=hits+1 WHERE board_id='".$id."'";
		$this->db->query($sql0);

		$sql = " SELECT * FROM ".$table." WHERE board_id='".$id."'";
		$query = $this->db->query($sql);

		// 게시물 내용 반환
		$result = $query->row();

		return $result;
	}

	/**
	 * [insert_board 게시판 입력쿼리 함수]
	 * @return [bool] [입력성공 여부]
	 */
	public function insert_board($arrays){

		$insert_array = array(
			'board_pid' => 0,       // 원글이라 0을 입력, 댓글일 경우는 원글 번호 입력
			'user_id' => 'advisor', // 7장에서 로그인 처리후엔 로그인한 아이디
			'user_name' => '웅파',
			'subject' => $arrays['subject'],
			'contents' => $arrays['contents'],
			'reg_date' => date('Y-m-d H:i:S')
		);
		$result = $this->db->insert($arrays['table'], $insert_array); // 테이블명, 데이터

		// 결과 반환
		return $result;
	}

	/**
	 * [modify_board 게시물 수정 db UPDATE 처리 모델]
	 * @param  [Array] $arrays [디비 수정입력 데이터]
	 * @return [boolean]         [수정 처리 성공여부]
	 */
	public function modify_board($arrays){
		$modify_array = array(
			'subject' => $arrays['subject'],
			'contents' => $arrays['contents'],
 		);

 		$where = array( // 입력과 달리 추가된 부분
 			'board_id' => $arrays['board_id']
 		);

 		// UPDATE 구문에서는 세번째 인자로 WHERE 절에 해당하는 내용이 들어감
 		$result = $this->db->update($arrays['table'], $modify_array, $where);

 		// 결과 반환
 		return $result;
	}
}
// End of this File