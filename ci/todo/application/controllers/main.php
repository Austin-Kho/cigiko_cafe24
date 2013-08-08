<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   //1
	/* todo 컨트롤러 */
	class Main extends CI_Controller {       //2
		function __construct()  //3 ---생성자 : 컨트롤러 내에서 변수를 선언하거나 라이브러리, 모델, 헬퍼를 로딩할 수있음..
		{
			parent::__construct();
			$this->load->database();                 //4 : 데이터베이스 로딩
			$this->load->model('todo_m');        //5 : todo 모델을 로딩 ..이후 사용 형식은 8번 참고
			$this->load->helper(array('url', 'date'));                //6 : url 헬퍼 로딩 - redirect() 함수 사용위해 로딩 //날짜 관련 함수 mdate() / human_to_unix() 함수 사용 위해 로딩
		}
		/* 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드 */
		public function index()
		{
			$this->lists();
		}
		/* todo 목록  */
		public function lists()                                        //7 : todo 목록의 실제 함수인 lists 생성
		{
			$data['list'] = $this->todo_m->get_list();   //8 : 5번에서 선언한 todo_m 모델에서 get_list() 함수 호출- todo목록 내용을 가져와 뷰에 전달하는 함수에 담음//다른 데이터를 전달할 경우를 대비해 배열 형태로 저장
			$this->load->view('todo/list_v', $data);     //9 : application/views/todo/list_v.php를 화면에 출력하는데 $data 변수의 내용 출력
		}
		/* todo 조회 */
		function view()
		{
			// todo 번호에 해당하는 데이터 가져오기
			$id = $this->uri->segment(3); // index.php 를 기준(0)으로 '/' 로 구분되는 순서
			$data['views'] = $this->todo_m->get_view($id); // DB에서 데이터를 가져오는 모델
			// view 호출
			$this->load->view('todo/view_v', $data); //뷰를 로딩 / 로딩할 뷰에서 출력할 $data 배열을 넘겨줌 // 뷰에 대이터를 넘길 때는 반드시 2차 배열 형태로 넘겨야 함
		}

		/* todo 입력 */
		function write(){
			if($_POST){
				// 글쓰기 POST 전송 시
				$content = $this->input->post('content', TRUE);
				$created_on = $this->input->post('created_on', TRUE);
				$due_date = $this->input->post('due_date', TRUE);

				$this->todo_m->insert_todo($content, $created_on, $due_date);

				redirect('/main/lists/');

				exit;
			}else{
				// 쓰기 폼 view 호출
				$this->load->view('todo/write_v');
			}
		}
		/**
		 * todo 삭제
		 */
		function delete(){
			//게시물 번호에 해당하는 게시물 삭제
			$id = $this->uri->segment(3);
			$this->todo_m->delete_todo($id);
			redirect('/main/lists/');
		}
	}

	/* End of file main.php */
	/* Locaton: ./application/controllers/main.php */