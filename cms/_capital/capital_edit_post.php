<?
	// 데이터베이스 연결 정보와 기타 설정
	include '../php/config.php';
	// 각종 유틸 함수
	include '../php/util.php';
	// MySQL 연결
	$connect=dbconn();
?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?


	$seq_num=$_REQUEST['seq_num'];
	$worker=$_SESSION['p_name'];


	// form(form1-post)에서 받은 데이터
	$deal_date= $_POST['deal_date'];

	$class1 = $_POST['class1'];
	$class2 = $_POST['class2'];
	$account = $_POST['account'];
	$cont = $_POST['cont'];
	$acc = $_POST['acc'];
	$inc = $_POST['inc'];
	$in = $_POST['in'];
	$exp = $_POST['exp'];
	$out = $_POST['out'];
	$evi = $_POST['evi'];


	############# 회원 정보 테이블에 입력 값을 등록한다. #############

	$query1="UPDATE cms_capital_cash_book SET class1='$class1',
																 class2='$class2',
																 account='$account',
																 cont='$cont',
																 acc='$acc',
																 in_acc='$in',
																 inc='$inc',
																 out_acc='$out',
																 exp='$exp',
																 evidence='$evi',
																 worker='$worker',
																 deal_date='$deal_date'

						               WHERE seq_num='$seq_num' ";
	$result1=mysql_query($query1, $connect);
	if(!$result1) err_msg('데이터베이스 오류가 발생하였습니다.');     // util.php 파일에 선언한 err_msg()함수 호출, 메세지 출력 후 이전페이지로.

	echo ("<script>
					window.alert('정상적으로 입출금 정보가 수정 되었습니다!');
					opener.location.reload();
					self.close();
				 </script>");
?>
