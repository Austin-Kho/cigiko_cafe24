<?
	// 데이터베이스 연결 정보와 기타 설정
	include '../php/config.php';
	// 각종 유틸 함수
	include '../php/util.php';
	// MySQL 연결
	$connect=dbconn();

	// form(form1-post)에서 받은 데이터
	$no = $_POST['no'];
	$brand = $_POST['brand'];
	$note = $_POST['note'];
	$category= $_REQUEST['category'];
	$fn = $_REQUEST['fn'];

	

	$category = strtoupper(addslashes($category)); // - 소문자를 대문대로 변환하여 반환한다.
	$brand = strtoupper(addslashes($brand));

	############# 회원 정보 테이블에 입력 값을 업데이트한다. #############
	$query="UPDATE cms_stock_2nd_classify SET classify='$brand',
																					  note='$note',
																				    reg_date=now()
					 WHERE no='$no' ";
	$result=mysql_query($query, $connect);

	// 저장 과정에서 오류가 생기면

	if(!$result){
		err_msg('데이터베이스 오류가 발생하였습니다.');     // util.php 파일에 선언한 err_msg()함수 호출, 메세지 출력 후 이전페이지로.
	} else {
		echo ("<script>
						window.alert('정상적으로 거래처 정보가 수정 되었습니다!');
						history.go(-2);
					 </script>");
	}
?>
