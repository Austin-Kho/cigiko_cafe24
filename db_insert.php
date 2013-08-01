<?
	###### 데이터베이스 연결 ######
	// 데이터베이스 연결 정보와 기타 설정
	include 'cms/php/config.php';
	// 각종 유틸 함수
	include 'cms/php/util.php';
	// MySQL 연결
	$connect=dbconn();

	$mode = $_REQUEST[mode];
	$db_file = $_REQUEST[db_file];
	$s_id = $_SESSION[speedmail_id];

	if($mode == "ins") {
		$table_name=" `".$_REQUEST['table_name']."` "; // 테이블 명
		$colom1 = $_REQUEST['colom1'];
		$colom2 = $_REQUEST['colom2'];
		$colom3 = $_REQUEST['colom3'];
		$colom4 = $_REQUEST['colom4'];
		$colom5 = $_REQUEST['colom5'];
		$colom6 = $_REQUEST['colom6'];

		if($colom1) $field_name = "  `".$colom1."` ";
		if($colom2) $field_name.= ", `".$colom2."` ";
		if($colom3) $field_name.= ", `".$colom3."` ";
		if($colom4) $field_name.= ", `".$colom4."` ";
		if($colom5) $field_name.= ", `".$colom5."` ";
		if($colom6) $field_name.= ", `".$colom6."` ";

		$file = $_FILES[db_file][tmp_name];
		$fp = fopen("$file", "r");
		if (!$fp) {
			err_msg("파일열기 오류 발생");
		}

		while($data = fgets($fp)) {

			$a = explode("\t", $data);

			if($colom1){ $value_arr = "  '".$a[0]."'"; }
			if($colom2){ $value_arr.= ", '".$a[1]."'"; }
			if($colom3){ $value_arr.= ", '".$a[2]."'"; }
			if($colom4){ $value_arr.= ", '".$a[3]."'"; }
			if($colom5){ $value_arr.= ", '".$a[4]."'"; }
			if($colom6){ $value_arr.= ", '".$a[5]."'"; }


				//db query 설정 부분..
				$query="INSERT INTO $table_name ($field_name)
											 VALUES ($value_arr);";							 	
				$result=mysql_query($query, $connect);
		}		
		if(!$result){
			echo "<script>
					alert('데이터베이스 에러입니다!');
			      </script>";			
		}else{
			echo "<script>
					alert('정상적으로 디비에 입력 되었습니다!');
				  </script>";			
		}
		fclose($fp);
	}
?>
<title>탭으로 분리된 데이터 텍스트 파일 디비 인서트 </title>
<form name="insform2" method="post" enctype="multipart/form-data">
<input type="hidden" name="mode" value="ins">
<b><font color="blue">[파일입력]</font></b><p>
<table>
<tr>
	<td>테이블명(table)</td>
	<td><input type="text" name="table_name"></td>
</tr>
<tr>
	<td>컬럼명1(colom1)</td>
	<td><input type="text" name="colom1"></td>
</tr>
<tr>
	<td>컬럼명2(colom2)</td>
	<td><input type="text" name="colom2"></td>
</tr>
<tr>
	<td>컬럼명3(colom3)</td>
	<td><input type="text" name="colom3"></td>
</tr>
<tr>
	<td>컬럼명4(colom4)</td>
	<td><input type="text" name="colom4"></td>
</tr>
<tr>
	<td>컬럼명5(colom5)</td>
	<td><input type="text" name="colom5"></td>
</tr>
<tr>
	<td>컬럼명6(colom6)</td>
	<td><input type="text" name="colom6"></td>
</tr>
<tr>
	<td>파일(file)</td>
	<td><input type="file" name="db_file"><input type="submit" value=" 입력 "></td>
</tr>
</table>
</form>
