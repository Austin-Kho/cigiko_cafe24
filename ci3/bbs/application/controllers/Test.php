<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Test extends CI_Controller{

	// public function __construct(){
	// 	parent::__construct();
	// }

	public function index(){
		$this->forms();
	}

	/**
	 * [_remap 페이지 헤더 및 푸터 추가함수]
	 * @param  [type] $method [description]
	 * @return [type]         [description]
	 */
	public function _remap($method){
		// 헤더 include
		$this->load->view('header_v');

		if(method_exists($this, $method)) {
			$this->{"{$method}"}();
		}
		// 푸터 include
		$this->load->view('footer_v');
	}

	/**
	 * [forms 폼 검증 함수]
	 * @return [type] [description]
	 */
	public function forms(){
		// $this->output->enable_profiler(TRUE);

		// 폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		// 폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('username', '아이디', 'trim|required|min_length[5]|max_length[12]');
		// $this->form_validation->set_rules('username', '아이디', 'callback_username_check');
		$this->form_validation->set_rules('password', '비밀번호', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', '비밀번호 확인', 'trim|required|md5');
		$this->form_validation->set_rules('email', '이메일', 'trim|required|valid_email');
		$this->form_validation->set_rules('count', '기본 값', 'numeric');
		$this->form_validation->set_rules('myselect', '셀렉트 값', '');
		$this->form_validation->set_rules('mycheck[]', '체크박스', '');
		$this->form_validation->set_rules('myradio', '라디오버튼', '');

		if($this->form_validation->run()==FALSE) {
			// 폼 검증이 싪했을 경우 또는 일반 입력 페이지
			$this->load->view('test/forms_v');
		}else{
			$this->load->view('test/success_v');
		}
	}

	/**
	 * [username_check ///form() 폼검증 함수에서 사용할 collback_ 함수]
	 * @param  [type] $id [description]
	 * @return [boolean]     [로그인 성공여부]
	 */
	public function username_check($id){
		$this->load->database();

		if($id){
			$result = array();
			$sql = " SELECT id FROM ci_users WHERE username= '".$id."' ";
			$qry = $this->db->query($sql);
			$result = @$qry->row();

			if($result){
				$this->form_validation->set_message('username_check', $id.'은(는) 중복된 아이디입니다.');
				return FALSE;
			}else{
				return TRUE;
			}
		}else{
			return FALSE;
		}
	}
}
// End of this File