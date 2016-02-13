<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller
{
	/**
	 * [__construct description]>이 클래스의 생성자
	 * 부모클래스 생성자의 재정의를 막기 위해 부모생성자 상속 ==>parent::__construct();
	 * 클래스 내부에서 사용할 변수를 선언하거나 라이브러리, 모델, 헬퍼 등을 로딩한다.
	 */
	public function __construct(){
		parent::__construct();

		$this->load->database();
		$this->load->model('board_m');
		$this->load->helper(array('url', 'date'));
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
// End of this File.