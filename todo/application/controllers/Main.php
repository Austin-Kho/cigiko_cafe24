<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * todo 컨트롤러
 */
class Main extends CI_Controller{
	/**
	 * [__construct description] 이 클래스의 생성자
	 * 부모클래스 생성자의 재정의를 막기 위해 부모생성자 상속 ==>parent::__construct();
	 * 클래스 내부에서 사용할 변수를 선언하거나 라이브러리, 모델, 헬퍼 등을 로딩한다.
	 */
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('todo_m');
		$this->load->helper(array('url', 'date'));
	}

	/**
	 * [Index description] 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
	 */
	public function Index(){
		$this->lists();
	}

	/**
	 * [lists description] todo 목록
	 * @return [type] [description] * 모델 데이타 리스트
	 * 컨트롤러에서 뷰에 $data['list'] 형태로 데이터를 넘겼다면
	 * 뷰에서는 $list 형태로 사용할 수 있음.
	 */
	public function lists(){
		$data['list'] = $this->todo_m->get_list();
		$this->load->view('todo/list_v', $data); // 모델파일(todo_m)에서 수집한 데이타를 뷰파일에 두번째 인자로 넘김.
	}
}
// End of file main.php