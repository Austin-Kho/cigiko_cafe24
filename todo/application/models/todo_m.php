<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * todo 모델
 */
class Todo_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	/**
	 * todo 목록 가져오기
	 */
	function get_list(){
		$sql = "SELECT * FROM ci_items";
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}

	/**
	 * [get_view description] - todo 조회
	 * @return [type] [description]
	 */
	public function get_view($id){
		$sql = "SELECT * FROM ci_items WHERE id =' ".$id."'"; // 쿼리 작성
		$query = $this->db->query($sql);     // 쿼리 실행(mysql_query($sql)과 같음.)
		$result = $query->row();   // 쿼리 결과 생성 (mysql_query_row($query)와 같음.)

		// 내용 반환
		return $result;    // 객체 배열 형태로 반환
	}

	/**
	 * [insert_todo description] - 데이터 입력 모델
	 * @param  [type] $content      [description] -> $_POST 값
	 * @param  [type] $created_date [description] -> $_POST 값
	 * @param  [type] $due_date     [description] -> $_POST 값
	 * @return [type]               [description]
	 */
	public function insert_todo($content, $created_date, $due_date){
		$sql = "INSERT INTO ci_items (content, created_date, due_date) VALUES ('".$content."', '".$created_date."', '".$due_date."')";
		$query = $this->db->query($sql); // 쿼리 실행 (mysql_query($sql)과 동일함.)
	}
}
// End of this File