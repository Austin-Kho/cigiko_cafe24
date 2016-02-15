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

	public function forms(){
		// $this->output->enable_profiler(TRUE);

		// 폼 검증 라이브러리 로드
		$this->load->library('form_validation');

		// 폼 검증할 필드와 규칙 사전 정의
		$this->form_validation->set_rules('username', '아이디', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', '비밀번호', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', '비밀번호 확인', 'trim|required|md5');
		$this->form_validation->set_rules('email', '이메일', 'trim|required|valid_email');

		if($this->form_validation->run()==FALSE) {
			// 폼 검증이 싪했을 경우 또는 일반 입력 페이지
			$this->load->view('test/forms_v');
		}else{
			$this->load->view('test/success_v');
		}
	}
}
// End of this File