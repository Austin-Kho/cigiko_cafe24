<?
	include "setup_lib.php";
	$hostname = $_REQUEST['hostname'];
	$user_id = $_REQUEST['user_id'];
	$passwd = $_REQUEST['passwd'];
	$dbname = $_REQUEST['dbname'];

	$admin_id = $_REQUEST['admin_id'];
	$passwd1 = $_REQUEST['passwd1'];
	$passwd2 = $_REQUEST['passwd2'];
	$name = $_REQUEST['name'];
	

// DB에 커넥트 하고 DB NAME으로 select DB
	$connect = @mysql_connect($hostname,$user_id,$passwd) or err_msg("MySQL-DB Connect<br>Error!!!","");
	mysql_select_db($dbname, $connect ) or err_msg("MySQL-DB Select<br>Error!!!","");


// 관리자가 1명이상 있을경우 바로 로그인 페이지로...
	$temp=mysql_fetch_array(mysql_query("select count(*) from $member_table where is_admin='1'",$connect));
	if($temp[0]){
		header("location:../admin/admin.php"); 
		mysql_close($connect);
		exit;
	}

// 빈문자열인지를 검사
	if(isBlank($user_id)) err_msg("아이디를 입력하셔야 합니다","");
	if(isBlank($passwd1)) err_msg("비밀번호를 입력하셔야 합니다","");
	if(isBlank($passwd2)) err_msg("비밀번호 확인을 입력하셔야 합니다","");
	if($passwd1!=$passwd2) err_msg("비밀번호와 비밀번호 확인이 일치하지 않습니다","");
	if(isBlank($name)) err_msg("이름을 입력하셔야 합니다","");

// 관리자 정보 입력
	@mysql_query("INSERT INTO $member_table (user_id,password,name,is_admin,reg_date,level) VALUES ('$user_id',password('$password1'),'$name','1','".time()."','1')",$connect) or err_msg(mysql_error(),"");

	mysql_close($connect);

	header("location:../admin/admin.php");
?>
