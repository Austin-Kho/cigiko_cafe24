<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');
/**
* Board
* 게시판 메인 컨트롤러
* @uses     CI_Controller
* @category Controller
* @package  Package
* @author    <cigiko>
* @license  
* @link
*/
class Board extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('board_m');
		$this->load->helper('date');
	}

    /**
     * index
     *  주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
     * @access public
     * @return mixed Value.
     */
	public function index()
	{
		$this->lists();		
	}

     /**
     * _remap
     *  사이트 헤더, 푸터가 자동으로 추가된다.
     * @param mixed $method Description.
     * @access public
     * @return mixed Value.
     */
	public function _remap($method)
	{
		// 헤더 include
		$this->load->view('header_v');
		if(method_exists($this, $method))
		{
			$this->{"{$method}"}();
		}
		// 푸터 include
		$this->load->view('footer_v');
	}

    /**
     * lists
     * 목록 불러오기
     * @access public
     * @return mixed Value.
     */
	public function lists()
	{
		$data['list'] = $this->board_m->get_list($this->uri->segment(3));
		$this->load->view('board/list_v', $data);
	}
}

/* End of file board.php */
/* Location: ./application/controllers/board.php */