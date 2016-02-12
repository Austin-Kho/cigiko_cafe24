<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *todo 모델
 */
class Todo_m extends CI_Mode{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * [get_list description] -> todo 목록 가져오기
	 * @return [type] [description] items db에서 가져온 데이터
	 */
	function get_list(){
		$sql = 'SELECT * FROM items';
		$query = $this->db->query($sql);
		$result = $query->result();

		return $result;
	}
}
// End of this File