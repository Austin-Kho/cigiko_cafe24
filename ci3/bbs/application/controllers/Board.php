<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Board extends CI_Controller
{
	/**
	 * [__construct 이 클래스의 생성자]
	 * 부모클래스 생성자의 재정의를 막기 위해 부모생성자 상속 ==>parent::__construct();
	 * 클래스 내부에서 사용할 변수를 선언하거나 라이브러리, 모델, 헬퍼 등을 로딩한다.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('board_m');
		$this->load->helper(array('url', 'date', 'form'));
	}

	/**
	 * [index 메서드 생략시 기본 실행 메서드]
	 * @return [type] [description]
	 */
	public function index(){
		$this->lists();
	}

	/**
	 * [_remap 헤더, 푸터가 자동으로 추가된다.]
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
	 * [lists 게시물 목록 불러오기]
	 * @return [type] [description]
	 */
	public function lists(){


		// $this->output->enable_profiler(TRUE); //프로파일러 보기//

		// 검색어 초기화
		$search_word = $page_url = '';
		$uri_segment = 5;

		// 주소 중에서 q(검색어) 세그먼트가 있는지 검사하기 위해 주소를 배열로 전환
		$uri_array = $this->segment_explode($this->uri->uri_string());

		if(in_array('q', $uri_array)){  // 주소에 검색어('q')가 있을 경우, 즉 검색 시 처리

			$search_word = urldecode($this->url_explode($uri_array, 'q')); // 검색어
			// 페이지네이션용 주소
			$page_url = '/q/'.$search_word;
			$uri_segment = 7;
		}

		//페이지네이션 라이브러리 로딩 추가
		$this->load->library('pagination');

		////////페이지네이션 시작///////////////////////////////////////////////////////////////
		// 페이지네이션 설정
		$config['base_url'] = '/ci3/bbs/board/lists/ci_board/'.$page_url.'/page';  // 페이징 주소 > 게시물 목록 주소
		$config['total_rows'] = $this->board_m->get_list($this->uri->segment(3), 'count', '', '', $search_word);  // 게시물의 전체 개수
		$config['per_page'] = 5;    // 한페이지에 표시할 게시물 수
		$config['num_links'] = 4; // 링크 좌우로 보여질 페이지 수
		$config['uri_segment'] = $uri_segment; // 페이지번호가 위치한 세그먼트

		// 페이지네이션 초기화
		$this->pagination->initialize($config); // 원하는 설정값을 넣고 페이지네이션 라이브러리 초기화
		$data['pagination'] = $this->pagination->create_links(); // 페이징 링크생성 > view에 사용할 변수 $data에 할당

		// 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
		$page = $this->uri->segment($uri_segment, 1);

		if($page>1) {
			$start = (($page/$config['per_page'])) * $config['per_page'];
		}else{
			$start = ($page-1) * $config['per_page'];
		}
		$limit = $config['per_page'];

		$data['list'] = $this->board_m->get_list($this->uri->segment(3), '', $start, $limit, $search_word);
		////////페이지네이션 종료///////////////////////////////////////////////////////////////


		$this->load->view('board/list_v', $data);
	}

	/**
	 * [url 중 키 값을 구분하여 값을 가져오도록]
	 * @param  [Array] $url [segment_explode 한 url 값]
	 * @param  [String] $key [가져오려는 값의 key]
	 * @return [String] $url[$k] [리턴 값]
	 */
	public function url_explode($url, $key){
		$cnt = count($url);
		for($i = 0; $cnt>$i; $i++){
			if($url[$i] == $key){
				$k = $i+1;           // 'q' 바로 다음에 있는
				return $url[$k];     // 검색어를 추출하여 리턴한다.
			}
		}
	}

	public function segment_explode($seg){
		// 세그먼트 앞뒤 '/' 제거 후 uri를 배열로 반환
		$len = strlen($seg);
		if(substr($seg, 0, 1) == '/'){
			$seg = substr($seg, 1, $len);
		}
		$len = strlen($seg);
		if(substr($seg, -1) == '/'){
			$seg = substr($seg, 0, $len-1);
		}
		$seg_exp = explode("/", $seg);
		return $seg_exp;
	}

	/**
	 * [view 게시물 내용 보기]
	 * @return [type] [description]
	 */
	public function view(){
		//$this->output->enable_profiler(TRUE); //프로파일러 보기//

		$table = $this->uri->segment(3);
		$board_id = $this->uri->segment(5);

		// 게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
		$data['views'] = $this->board_m->get_view($this->uri->segment(3), $this->uri->segment(5));

		// 게시판 이름과 게시물 번호에 해당하는 댓글 리스트 가져오기
		$data['comment_list'] = $this->board_m->get_comment($table, $board_id);

		// view 호출
		$this->load->view('board/view_v', $data);
	}

	/**
	 * [write 게시판 내용입력 함수]
	 * @return [type] [description]
	 */
	public function write(){

		// 경고창 헬퍼 로딩
		$this->load->helper('alert'); // 3 : PHP에서 alert를 사용하기 위한 사용자 헬퍼 호출
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if(@$this->session->userdata('logged_in')==TRUE){
			$this->load->library('form_validation');

			// 폼 검증 규칙 사전 정의
			$this->form_validation->set_rules('subject', '제목', 'required');
			$this->form_validation->set_rules('contents', '내용', 'required');

			// if($_POST){  // 2 : 작성 버튼 클릭 시
			if($this->form_validation->run() == TRUE){  // 2 : 작성 버튼 클릭 시
				// 글쓰기 POST 전송 시

				// 주소 중에서 page 세그먼트가 있는지 검사하기 위해 주소를 배열로 전환
				$uri_array = $this->segment_explode($this->uri->uri_string()); // 4 : 게시물 작성 후 목록으로 이동할 때 페이지 수 필요해서 선언한 부분,
				if(in_array('page', $uri_array) && urldecode($this->url_explode($uri_array, 'page'))!=''){ //주소중에 /page/세그먼트가 있다면
					$pages = urldecode($this->url_explode($uri_array, 'page'));  //그 값을 $pages변수에 할당하고
				}else{     //없다면
					$pages = 1;  // 초기값인 1을 할당.urldecode($this->url_explode($uri_array, 'page'))!=''
				}
				if( !$this->input->post('subject', TRUE) AND !$this->input->post('contents', TRUE)){ // 5 : 글내용이 없으면

					// 글 내용이 없을 경우, 프로그램단에서 한 번 더 체크
					alert('비 정상적인 접근입니다.', '/ci3/bbs/board/lists/'.$this->uri->segment(3).'/page/'.$pages); //경고창 후 목록으로 이동하고
					exit; // 함수 종료
				}
				// var_dump($_POST);  // 포스트 데이타 내용 확인 //
				$write_data = array(  // 6 : 디비에 입력할 데이터를 배열로 할당
					'table'=>$this->uri->segment(3),
					'subject'=>$this->input->post('subject', TRUE),
					'contents'=>$this->input->post('contents', TRUE),
					'user_id'=>$this->session->userdata('username') // 게시물 작성자 // 현재 로그인한 사용자
				);
				$result = $this->board_m->insert_board($write_data);  // 7 : 모델의 insert_board(); 함수에 데이타 전달하고 result 에 할당??

				if($result){  // 8 : 모델에서 인서트가 성공하면 TRUE가 반환
					// 글 작성 성공 시 게시물 목록으로
					alert('입력 되었습니다.', '/ci3/bbs/board/lists/'.$this->uri->segment(3)/*.'/page/'.$pages*/); // 9 : 성공메세지 후 목록으로
					exit;
				}else{
					// 글 작성 실패 시 게시물 목록으로
					alert('다시 입력해 주세요.', '/ci3/bbs/board/write/'.$this->uri->segment(3)/*.'/page/'.$pages*/); // 10 : 실패메세지 후 목록으로
					exit;
				}
			}else{
				// 쓰기 폼 view 호출
				$this->load->view('board/write_v');  // 1 : 글 쓰기 버튼 눌렀을 때 처음 호출 화면
			}
		}else{
			alert('로그인 후 작성하세요', '/ci3/bbs/auth/login/');
			exit;
		}
	}

	/**
	 * [modify 게시물 수정 함수]
	 * @return [type] [description]
	 */
	public function modify(){
		// 경고창 헬퍼 로딩
		$this->load->helper('alert');
		// 메세지가 깨지는 경우 방지
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

		// 주소 중에서 page 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
		$uri_array = $this->segment_explode($this->uri->uri_string());

		if(in_array('page', $uri_array)){
			$pages = urldecode($this->url_explode($uri_array, 'page'));
		}else{
			$pages = 1;
		}

		// 글 수정 POST 전송 시
		if(@$this->session->userdata('logged_in') == TRUE) {
			// 수정하려는 글의 작성자가 본인인지 검증
			$writer_id = $this->board_m->writer_check();

			if($writer_id->user_id != $this->session->userdata('username')) {
				alert('본인이 작성한 글이 아닙니다.', '/ci3/bbs/board/view/'.$this->uri->segment(3).'/board_id/'.$this->uri->segment(5).'/page/'.$pages);
				exit;
			}

			// 폼 검증 라이브러리 로드
			$this->load->library('form_validation');

			//폼 검증할 필드와 규칙 사전 정의
			$this->form_validation->set_rules('subject', '제목', 'required');
			$this->form_validation->set_rules('contents', '내용', 'required');


			if($this->form_validation->run() == TRUE) {
				if( !$this->input->post('subject', TRUE) AND !$this->input->post('contents', TRUE)) {
					// 글 내용이 없을 경우, 프로그램 단에서 한 번 더 체크
					alert('비 정상적인 접근입니다.', 'ci3/bbs/lists/'.$this->uri->segment(3).'/page'.$pages);
					exit;
				}

				// var_dump($_POST);
				$modify_data = array(
					'table' => $this->uri->segment(3),
					'board_id' => $this->uri->segment(5),
					'subject' => $this->input->post('subject', TRUE),
					'contents' => $this->input->post('contents', TRUE)
				);
				// modify_board 함수로 배열을 전달해 글 내용 수정.
				// 혹시나 $this->input->post(); 데이터를 받지 않고
				// 기존처럼 $_POST 배열을 그대로 함수에 전달하는 경우
				// ($result=$this->board_m->modify_board($_POST);)
				// SQL 삽입공격에 100% 노출 되므로 변수를 재할당하기 귀찮아도
				// 컨트롤러에서 처리하여 모델이 전달하고 모델에서는 데이터베이스
				// 입출력 부분만 담당하게 하는 것이 좋다.
				$result = $this->board_m->modify_board($modify_data);

				if($result){
					// 글 작성 성공 시 게시물 목록으로
					alert('수정 되었습니다.', '/ci3/bbs/board/view/'.$this->uri->segment(3).'/board_id/'.$this->uri->segment(5).'/page/'.$pages);
					exit;
				}else{
					// 글 수정 실패 시 글 내용으로
					alert('다시 수정해 주세요.', '/ci3/bbs/board/modify/'.$this->uri->segment(3).'/board_id/'.$this->uri->segment(5).'/page/'.$pages);
					exit;
				}
			}else{
				// 게시물 내용 가져오기
				// 글 입력과 달리 수정화면에서 내용을 보여주고 수정하기 때문에 글 내용을 가져오는 부분 추가
				$data['views'] = $this->board_m->get_view($this->uri->segment(3), $this->uri->segment(5));

				// 쓰기 폼 호출
				// 뷰 파일 modify_v 에 글 내용을 $data 변수에 담아 전달하고 화면에 출력.
				$this->load->view('board/modify_v', $data);
			}
		}else{
			alert('로그인 후 수정하세요.', '/ci3/bbs/auth/login/');
			exit;
		}
	}

	/**
	 * [delete 게시물 삭제 컨트롤러]
	 * @return [boolean] [삭제 sql 쿼리 성공 여부]
	 */
	public function delete(){
		// 경고창 헬퍼 로딩
		$this->load->helper('alert');
		// 메세지가 깨지는 경우 방지
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

		if(@$this->session->userdata('logged_in') == TRUE) {
			// 삭제하려는 글의 작성자가 본인인지 검증
			$writer_id = $this->board_m->writer_check();

			if($writer_id->user_id != $this->session->userdata('username')) {
				alert('본인이 작성한 글이 아닙니다.', '/ci3/bbs/board/view/'.$this->uri->segment(3).'/board_id/'.$this->uri->segment(5).'/page/'.$pages);
				exit;
			}
			// 게시물 번호에 해당하는 게시물 삭제
			$return = $this->board_m->delete_content($this->uri->segment(3), $this->uri->segment(5));

			// 게시물 목록으로 돌아가기
			if($return){
				// 삭제가 성공한 경우
				alert('삭제 되었습니다.', '/ci3/bbs/board/lists/'.$this->uri->segment(3).'/page/'.$this->uri->segment(7));
			}else{
				// 삭제가 실패한 경우
				alert('삭제 실패하였습니다.', '/ci3/bbs/board/view/'.$this->uri->segment(3).'/board_id/'.$this->uri->segment(5).'/page/'.$this->uri->segment(7));
			}
		}else{
			alert('로그인 후 삭제하세요.', '/ci3/bbs/auth/login/');
			exit;
		}
	}
}
// End of this File.