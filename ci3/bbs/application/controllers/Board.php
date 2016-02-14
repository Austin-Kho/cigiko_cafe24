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

		//페이지네이션 라이브러리 로딩 추가
		$this->load->library('pagination');

		// 페이지네이션 설정
		$config['base_url'] = '/ci3/bbs/board/lists/ci_board/';  // 페이징 주소 > 게시물 목록 주소
		$config['total_rows'] = $this->board_m->get_list($this->uri->segment(3), 'count');  // 게시물의 전체 개수
		$config['per_page'] = 5;    // 한페이지에 표시할 게시물 수
		$config['num_links'] = 2; // 링크 좌우로 보여질 페이지 수
		$config['uri_segment'] = 4; // 페이지번호가 위치한 세그먼트$config[‘num_links’] = 2;

		// 페이지네이션 초기화
		$this->pagination->initialize($config); // 원하는 설정값을 넣고 페이지네이션 라이브러리 초기화
		$data['pagination'] = $this->pagination->create_links(); // 초기화 후 링크생성하여 뷰에 전달하기 위해 $data 변수에 담음

		// 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
		$page = $this->uri->segment($config['uri_segment'], 1);

		if($page>1) {
			$start = (($page/$config['per_page'])) * $config['per_page'];
		}else{
			$start = ($page-1) * $config['per_page'];
		}

		$limit = $config['per_page'];

		$data['list'] = $this->board_m->get_list($this->uri->segment(3), '', $start, $limit);
		$this->load->view('board/list_v', $data);
	}
}
// End of this File.