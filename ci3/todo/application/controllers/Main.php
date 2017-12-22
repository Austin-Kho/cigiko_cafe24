<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * todo 컨트롤러
 */
class Main extends CI_Controller
{
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
	 * [index description]->주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
	 * @return [type] [description]
	 */
	public function index(){
		$this->lists();
	}

	/**
	 * [lists description] -> todo 목록
	 * @return [type] [description]
	 */
	public function lists(){
		$data['list'] = $this->todo_m->get_list();
		$this->load->view('list_v', $data);
	}

	/**
	 * todo 조회
	 */
	public function view(){ // 조회 함수. 현재 클래스명 다음 세그먼트 현재 함수명
		// todo 번호에 해당하는 데이터 가져오기
		$id = $this->uri->segment(3); // 현재 url의 메소드 다음 세그먼트를 $id변수로 저장(세그먼트 규칙=index.php->0번째 세그먼트)
		$data['views'] = $this->todo_m->get_view($id); // 모델 get_view()함수의 인자로 $id 전달 // view에 데이터를 넘길때는 반드시 2차 배열로 넘김. 뷰에서는 $views['id']형태로 사용
		// view 호출
		$this->load->view('view_v', $data);
	}
	/**
	 * [write description] - todo 입력하기
	 * @return [type] [description]
	 */
	public function write(){ // 쓰기 함수는 $_POST 유무에 따라 분기하여 처리한다.

		if($_POST){
			// 글쓰기 POST 전송 시

			$content = $this->input->post('content', TRUE);
			$created_date = $this->input->post('created_date', TRUE);
			$due_date = $this->input->post('due_date', TRUE);


			$this->todo_m->insert_todo($content, $created_date, $due_date);

			redirect('/main/lists/');

			exit;

		}else{
			// 쓰기 폼 view 호출
			$this->load->view('write_v');
		}
	}

	/**
	 * [delete description] >todo 게시물 삭제
	 * @return [type] [description]
	 */
	public function delete(){
		// 게시물번호에 해당하는 게시물 삭제
		$id = $this->uri->segment(3);

		$this->todo_m->delete_todo($id);

		redirect('/main/lists/');
	}
}
// End of file this File