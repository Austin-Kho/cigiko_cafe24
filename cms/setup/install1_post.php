<?
	include "setup_lib.php";
	include "schema.sql";

	if(file_exists("config_set.php")) err_msg("이미 config_set.php가 생성되어 있습니다.<br><br>재설치하려면 해당 파일을 지우세요");

	$hostname = $_REQUEST['hostname'];
	$user_id = $_REQUEST['user_id'];
	$passwd = $_REQUEST['passwd'];
	$dbname = $_REQUEST['dbname'];



// 호스트네임, 아이디, DB네임, 비밀번호의 공백여부 검사
	if(isBlank($hostname)) err_msg("HostName을 입력하세요","");
	if(isBlank($user_id)) err_msg("User ID 를 입력하세요","");
	if(isBlank($dbname)) err_msg("DB NAME을 입력하세요","");



// DB에 커넥트 하고 DB NAME으로 select DB
	$connect = @mysql_connect($hostname,$user_id,$passwd) or err_msg("MySQL-DB Connect<br>Error!!!","");
	mysql_select_db($dbname, $connect ) or err_msg("MySQL-DB Select<br>Error!!!","");


// DB 테이블의 생성유무 검사
	function istable($str, $dbname='') {
		global $config_dir;
		if(!$dbname) {
			$f=@file($config_dir."config_set.php") or err_msg("config_set.php파일이 없습니다.<br>DB설정을 먼저 하십시요","install.php");
			for($i=1;$i<=4;$i++) $f[$i]=str_replace("\n","",$f[$i]);
			$dbname=$f[4];
		}

		$result = mysql_list_tables($dbname) or mysql_error();

		$i=0;

		while ($i < mysql_num_rows($result)) {
			if($str==mysql_tablename ($result, $i)) return 1;
			$i++;
		}
		return 0;
	}
	

	echo $admin_table."<br>";
	echo $admin_table_schema."<br>";
	echo $group_table."<br>";
	echo $group_table_schema."<br>";
	echo $member_table."<br>";
	echo $member_table_schema."<br>";
	echo $get_memo_table."<br>";
	echo $get_memo_table_schema."<br>";
	echo $send_memo_table."<br>";
	echo $send_memo_table_schema."<br>";
	


// 관리자 테이블 생성
	if(!isTable($admin_table,$dbname)) @mysql_query($admin_table_schema, $connect) or err_msg("관리자 테이블 생성 실패","");
	else $admin_table_exist=1;


  
// 그룹테이블 생성
	//if(!isTable($group_table,$dbname)) @mysql_query($group_table_schema, $connect) or err_msg("그룹 테이블 생성 실패","");
	//else $group_table_exist=1;

// 회원관리 테이블 생성
	if(!istable($member_table,$dbname)) @mysql_query($member_table_schema, $connect) or err_msg("회원관리 테이블 생성 실패","");
	else $member_table_exist=1;

/*

// 쪽지테이블
	//if(!istable($get_memo_table,$dbname))  @mysql_query($get_memo_table_schema, $connect) or err_msg("받은 쪽지 테이블 생성 실패");
	//else $get_memo_table_exists=1;
	//if(!istable($send_memo_table,$dbname)) @mysql_query($send_memo_table_schema, $connect) or err_msg("보낸 쪽지 테이블 생성 실패");
	//else $send_memo_table_exist=1;


*/

// 파일로 DB 정보 저장
	$file=@fopen("config_set.php","w") or err_msg("config_set.php 파일 생성 실패<br><br>디렉토리의 퍼미션을 707로 주십시요","");
	@fwrite($file,"<?\n$hostname\n$user_id\n$passwd\n$dbname\n?>\n") or err_msg("config_set.php 파일 생성 실패<br><br>디렉토리의 퍼미션을 707로 주십시요","");
	@fclose($file);
	// @mkdir("data",0707);
	// @mkdir("icon",0707);
	// @mkdir("icon/member_image_box",0707);
	// @mkdir("icon/private_icon",0707);
	// @mkdir("icon/private_name",0707);
	// @chmod("icon/member_image_box",0707);
	// @chmod("icon/private_icon",0707);
	// @chmod("icon/private_name",0707);
	// @chmod("data",0707);
	// @chmod("icon",0707);
	@chmod("config_set.php",0707);

	// $temp=mysql_fetch_array(mysql_query("select count(*) from $member_table where is_admin = '1'",$connect));



	mysql_close($connect);

	if($temp[0]) {
		 echo "<meta http-equiv='Refresh' content='0; URL=../admin/admin.php'>";
	}
	else {        // 관리자 정보가 없을때 관리자 정보 입력
		 echo "<meta http-equiv='Refresh' content='0; URL=install2.php?hostname=$hostname&user_id=$user_id&passwd=$passwd&dbname=$dbname'>";
	}
?>
