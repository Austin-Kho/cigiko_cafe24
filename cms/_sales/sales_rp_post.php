<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?
	// 데이터베이스 연결 정보와 기타 설정
	include '../php/config.php';
	// 각종 유틸 함수
	include '../php/util.php';
	// MySQL 연결
	$connect=dbconn();


	// form(form1-post)에서 받은 데이터
	$pj_seq=$_REQUEST['pj_seq'];				// 프로젝트 고유 코드
	$cont_date = $_REQUEST['cont_date'];	 // 계약(청약)일자
	$cont_sort2 = $_REQUEST['cont_sort2'];	 // 청약 / 계약 여부
	$cont_sort3 = $_REQUEST['cont_sort3'];    // 청약해지 / 계약해지 여부
	$type = $_REQUEST['type'];
	$dong = $_REQUEST['dong'];
	$ho = $_REQUEST['ho'];

	/////////////////////////////////////////////////////////
	$name = $_REQUEST['name']; // 계약자
	$tel_1 = $_REQUEST['tel_1'];    // 연락처 1
	$tel_2 = $_REQUEST['tel_2'];    // 연락처 2
	$addr = $_REQUEST['zipcode1'].":".$_REQUEST['zipcode2'].":".$_REQUEST['address1'].":".$_REQUEST['address2'];    // 계약자 주소
	$draufgabe = $_REQUEST['draufgabe']; // (청약)계약금
	$due_date = $_REQUEST['due_date'];   // 청약 시 계약 예정일(기한)

	$mgm_to = $_REQUEST['mgm_to'];      // MGM 지급대상
	$mgm_tel = $_REQUEST['mgm_tel'];     // MGM 지급자 연락처
	$mgm_sum = $_REQUEST['mgm_sum'];  // MGM 지급금액

	$worker = $_REQUEST['worker'];             // 담당직원
	$headq = $_REQUEST['headq'];              // 소속본부
	$team = $_REQUEST['team'];                  // 소속 팀
	$worder_where = $headq."-".$team;

	$note = $_REQUEST['note'];                    // 비 고
	/////////////////////////////////////////////////////////

	// 변수 다 받았으면 이제부터 시작
	############### DB UPDATE ##############

	if($cont_sort2==1){ // 청약일때
		$query1 =" UPDATE cms_project_data SET is_pro_cont = '1',
													 pro_contractor = '$name',
													 pro_cont_tel_1 = '$tel_1',
													 pro_cont_tel_2 = '$tel_2',
													 pro_cont_addr = '$addr',
													 pro_cont_date = '$cont_date',
													 pro_draufgabe = '$draufgabe',
													 pro_due_date = '$due_date',
													 is_contract = '',
													 contractor = '',
													 cont_tel_1 = '',
													 cont_tel_2 = '',
													 cont_addr = '',
													 cont_date = '',
													 draufgabe = '',
													 cont_mgm_who = '',
													 cont_mgm_tel = '',
													 cont_mgm_sum = '',
													 cont_worker = '$worker',
													 worker_where = '$worder_where',
													 note = '$note',
													 reg_time = now()
									WHERE pj_seq = '$pj_seq'
									AND type_ho = '$type'
									AND pj_dong = '$dong'
									AND pj_ho = '$ho' ";
	}else if($cont_sort2==2){ // 계약일때
		$query1 =" UPDATE cms_project_data SET is_pro_cont = '',
													 is_contract = '1',
													 contractor = '$name',
													 cont_tel_1 = '$tel_1',
													 cont_tel_2 = '$tel_2',
													 cont_addr = '$addr',
													 cont_date = '$cont_date',
													 draufgabe = '$draufgabe',
													 cont_mgm_who = '$mgm_to',
													 cont_mgm_tel = '$mgm_tel',
													 cont_mgm_sum = '$mgm_sum',
													 cont_worker = '$worker',
													 worker_where = '$worder_where',
													 note = '$note',
													 reg_time = now()
									WHERE pj_seq = '$pj_seq'
									AND type_ho = '$type'
									AND pj_dong = '$dong'
									AND pj_ho = '$ho' ";
	}else if($cont_sort3==3){ // 청약해지일때
		$query1 =" UPDATE cms_project_data SET is_pro_cont = '',
													 pro_cont_addr = '',
													 pro_cont_date = '',
													 pro_draufgabe = '',
													 pro_due_date = '',
													 is_contract = '',
													 reg_time = now()
									WHERE pj_seq = '$pj_seq'
									AND type_ho = '$type'
									AND pj_dong = '$dong'
									AND pj_ho = '$ho' ";
	}else if($cont_sort3==4){ // 계약해지일때
		$query1 =" UPDATE cms_project_data SET is_pro_cont = '',
													 is_contract = '',
													 pro_cont_addr = '',
													 pro_cont_date = '',
													 pro_draufgabe = '',
													 pro_due_date = '',
													 cont_addr = '',
													 cont_date = '',
													 draufgabe = '',
													 cont_mgm_who = '',
													 cont_mgm_tel = '',
													 cont_mgm_sum = '',
													 cont_worker = '',
													 worker_where = '',
													 note = '',
													 reg_time = now()
									WHERE pj_seq = '$pj_seq'
									AND type_ho = '$type'
									AND pj_dong = '$dong'
									AND pj_ho = '$ho' ";
	}

	$result1=mysql_query($query1, $connect);

	// 저장 과정에서 오류가 생기면
	if(!$result1){
		err_msg('데이터베이스 오류가 발생하였습니다.');     // util.php 파일에 선언한 err_msg()함수 호출, 메세지 출력 후 이전페이지로.
	} else {
		echo ("<script>
					window.alert('정상적으로 프로젝트(계약)정보가 변경 되었습니다!');
				 </script>");
		echo "<meta http-equiv='Refresh' content='0; URL=sales_main.php?m_di=2&s_di=3&pj_list=".$pj_seq."'>";
	}
?>
