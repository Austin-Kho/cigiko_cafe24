<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 게시판 메인 컨트롤러
 */
class Board extends CI_Controller {

	/**
	 * [__construct description]>생성자
	 */
	public function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('board_m');
	}

	/**
	 * [index description]>메서드 생략시 기본 실행 메서드
	 * @return [type] [description]
	 */
	public function index(){
		$this->lists();
	}

	/**
	 * [_remap description]>헤더, 푸터가 자동으로 추가된다.
	 * @return [type] [description]
	 */
	public function _remap($method){
		// 헤더 include
		$this->load->view('header_v');

		if(method_exists($this, $method)){
			$this->{"$method"}();
		}

		// 푸터 include
		$this->load->view('footer_v');
	}

	/**
	 * [lists description]>게시물 목록 불러오기
	 * @return [type] [description]
	 */
	public function lists(){
		$data['list'] = $this->board_m->get_list($this->uri->segment(3));
		$this->load->view('board/list_v', $data);
	}
}