<?
	include '../php/config.php';
	include '../php/util.php';
	$connect=dbconn();

	$mode = $_REQUEST['mode'];
	

	$is_company=$_POST['is_company'];
	$div_seq=$_POST['div_seq'];
	$pj_seq=$_POST['pj_seq'];
	$headq=$_POST['headq'];
	$team=$_POST['team'];
	$posi=$_POST['posi'];	

	$user_id=$_POST['user_id'];
	if($admin_id==$user_id) $is_admin=1; // 콘피그 아이디와 같은 아이디 일경우 is_admin = 1 로 처리
	$passwd=$_POST['passwd'];
	$passwd2=$_POST['passwd2'];
	$name=$_POST['name'];
	$jumin1=$_POST['jumin1'];
	$jumin2=$_POST['jumin2'];
	$email1=$_POST['email1'];
	$email2=$_POST['email2'];
	$rcv_mail=$_POST['rcv_mail'];
	$zipcode1=$_POST['zipcode1'];
	$zipcode2=$_POST['zipcode2'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$phone1=$_POST['phone1'];
	$phone2=$_POST['phone2'];
	$phone3=$_POST['phone3'];
	$hphone1=$_POST['hphone1'];
	$hphone2=$_POST['hphone2'];
	$hphone3=$_POST['hphone3'];

	$email=$email1."@".$email2;    // 이메일 주소
	if($rcv_mail=="on"){
		$rcv_mail=1;
	} else {
		$rcv_mail=0;
	}

	####### DB 입력 정보 가공 ########
	$jnumber=$jumin1."-".$jumin2;     // 주민등록번호
	$user_id=addslashes($user_id);  // 폼에서 넘어온 값을 데이터베이스에 저장할 수 있는 형식으로 변환
	$email=addslashes($email);                               //////<--------------회원 정보를 MySQL 데이터베이스에
	$address1=addslashes($address1);                       //                    넣을 수 있도록 변경한다.
	$address2=addslashes($address2);                       //
	$phone=$phone1."-".$phone2."-".$phone3;              //
	$hphone=$hphone1."-".$hphone2."-".$hphone3;       //
	$zipcode=$zipcode1."-".$zipcode2;                       /////

	$pj_where = $headq."-".$team;	

	if($mode=="join"){
		####### 같은 정보 존재 여부 확인 #########
		$query="SELECT user_id FROM cms_member_table WHERE user_id='$user_id' OR id_number='$jnumber'";
		$result=mysql_query($query, $connect);
		$total_num=mysql_num_rows($result);

		if($total_num){            // 같은 정보가 있을 때 이전 페이지로 옮김
		echo ("<script>
					window.alert('아이디, 주민등록번호 중 중복된 값이 있습니다!');
					history.go(-1)
				 </script>");
		exit;
	} else {
		
		############# 회원 정보 테이블에 입력 값을 등록한다. #############
		$query="INSERT INTO cms_member_table (is_admin, user_id, passwd, name, id_number, email, rcv_mail, zipcode, address1, address2, phone, mobile, request, is_company, div_seq, pj_seq, pj_where, pj_posi, reg_date)
						 VALUES ('$is_admin', '$user_id', '$passwd', '$name', '$jnumber', '$email', '$rcv_mail', '$zipcode', '$address1', '$address2', '$phone', '$hphone', '2', '$is_company', '$div_seq', '$pj_seq', '$pj_where', '$posi', now())";
		$result=mysql_query($query, $connect);

		// 관리자에게 신규 가입 메세지 전송
		$msg = "신규 가입 신청건이 있습니다.<br>".$user_id."/".$name."/".$hphone;
		$msg_qry = "INSERT INTO cms_message_info (sendid_fk, receiveid_fk, message, send_reg)
				          VALUES ('$user_id', '$admin_id', '$msg', now())";
		$msg_rlt = mysql_query($msg_qry, $connect);

		// 저장 과정에서 오류가 생기면
		if(!$result){
			err_msg('데이터베이스 오류가 발생하였습니다.');     // util.php 파일에 선언한 err_msg()함수 호출, 메세지 출력 후 이전페이지로.
		} else {
			echo ("<script>
							window.alert('정상적으로 회원 가입되었습니다. 로그인 후 사용하세요!');
						 </script>");
			echo "<meta http-equiv='Refresh' content='0; URL=login_form.php'>";
		}
	//}



	}else if($mode=="modify"){

		$query="SELECT passwd FROM cms_member_table WHERE user_id='$user_id' OR id_number='$jnumber'";
		$result=mysql_query($query, $connect);
		$row=mysql_fetch_array($result);

		if($passwd!=$row[passwd]){
			err_msg('패스워드가 일치하지 않습니다!');
		}else{

			$no = $_REQUEST['no'];
			$new_passwd=$_REQUEST['new_passwd'];
			if($new_passwd) $passwd=$new_passwd;

			################### DB 업데이트 시작 #####################
			$query = " UPDATE cms_member_table SET passwd = '$passwd',
																name = '$name',
																email = '$email',
																rcv_mail = '$rcv_mail',
																zipcode = '$zipcode',
																address1 = '$address1',
																address2 = '$address2',
																phone = '$phone',
																mobile = '$hphone'
									WHERE no = '$no' ";
			$result = mysql_query($query, $connect);

			// 저장 과정에서 오류가 생기면
			if(!$result){
				err_msg('데이터베이스 오류가 발생하였습니다.');     // util.php 파일에 선언한 err_msg()함수 호출, 메세지 출력 후 이전페이지로.
			} else {
				echo ("<script>
							window.alert('정상적으로 사용자 정보가 변경되었습니다.');
						 </script>");
				echo "<meta http-equiv='Refresh' content='0; URL=../cms.php'>";
			}
		}
	}
?>
