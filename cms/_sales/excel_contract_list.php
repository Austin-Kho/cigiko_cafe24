<?
session_start();
  Header("Content-type: application/vnd.ms-excel");
  Header("Content-type: charset=UTF-8");
  header("Content-Disposition: attachment; filename=contract_list.xls");
  Header("Content-Description: PHP5 Generated Data");
  Header("Pragma: no-cache");
  Header("Expires: 0");

	// 데이터베이스 연결 정보와 기타 설정
	include '../php/config.php';
	// 각종 유틸 함수
	include '../php/util.php';
	// MySQL 연결
	$connect=dbconn();


	$pj_seq = stripslashes($_REQUEST['pj_seq']);
	$where = stripslashes($_REQUEST['where']);
	$limit = stripslashes($_REQUEST['limit']);
?>
<style type="text/css">
	td{ font-family:맑은 고딕;  font-size: 12px; line-height:150%; }
</style>
<meta http-equiv="Content-Type" content="application/vnd.ms-excel;charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<table border="1" cellpadding="0" cellspacing="0">
	<tr align="center" height="45">
		<td colspan="15" style="font-size:15pt; text-align:center;"><b>계약 현황 리스트</b></td>
	</tr>
	<tr align="center" height="35">
			<td width="40" bgcolor="#EAEAEA">동</td>
			<td width="40" bgcolor="#EAEAEA">호수</td>
			<td width="40" bgcolor="#EAEAEA">타입</td>
			<td width="60" bgcolor="#EAEAEA">계약자</td>
			<td width="100" bgcolor="#EAEAEA">연락처1</td>
			<td width="100" bgcolor="#EAEAEA">연락처2</td>
			<td width="80" bgcolor="#EAEAEA">청약일</td>
			<td width="75" bgcolor="#EAEAEA">청약금</td>
			<td width="80" bgcolor="#EAEAEA">계약예정일</td>
			<td width="80" bgcolor="#EAEAEA">계약일</td>
			<td width="85" bgcolor="#EAEAEA">계약금</td>
			<td colspan="2" bgcolor="#EAEAEA">MGM</td>
			<td colspan="2" bgcolor="#EAEAEA">담당자</td>
	</tr>
<?
	$color_rlt = mysql_query("SELECT type_info, color_type FROM cms_project_info WHERE seq='$pj_seq'", $connect); /// 타입별 컬러 구분
	$color_row = mysql_fetch_array($color_rlt);
	// 타입별 칼라 지정
	$type_info = explode("-", $color_row[type_info]);
	$type_color = explode("-", $color_row[color_type]);
	///////////////////////////////////////////////////////////////////////
	for($i=0; $i<count($type_info); $i++){
		$color[$type_info[$i]]=$type_color[$i];
	}
	$query1 = "SELECT pj_dong, pj_ho, type_ho, is_except, pro_contractor, is_pro_cont, pro_cont_tel_1, pro_cont_tel_2,
													pro_cont_date, pro_draufgabe, pro_due_date, is_contract, contractor, cont_tel_1, cont_tel_2,
													cont_date, draufgabe, cont_mgm_who, cont_mgm_tel, cont_mgm_sum, cont_worker, worker_where
										  FROM cms_project_data
									     $where $limit ";

	$result1 = mysql_query($query1, $connect);
	$data_num=mysql_num_rows($result1);
	$result1=mysql_query($query1, $connect);

	for($i=0; $rows1 = mysql_fetch_array($result1); $i++){
		if($rows1[is_except]==1) { // 기분양 세대인 경우
			$bgcolor=" background-color:#d1d1d1; ";
		}else if($rows1[is_contract]==1) { // 계약상태 물건인 경우
			$bgcolor=" background-color:#ffdd77; ";
			$a=2;
		}else if($rows1[is_pro_cont]==1){ // 청약상태 물건인 경우
			$bgcolor=" background-color:#ffffb5; ";
		}else{ // 미계약 상태인 경우
			$bgcolor="";
		}
		$w_where = explode("-", $rows1[worker_where]);
?>
	<tr>
		<?if($rows1[is_except]==1) $bg_col = "bgcolor='#D1D1D1'"; else $bg_col = "";?>
		<td align="center" height="30" bgcolor="<?=$color[$rows1[type_ho]]?>"><?=$rows1[pj_dong]?></td>
		<td align="center" height="30" bgcolor="<?=$color[$rows1[type_ho]]?>"><?=$rows1[pj_ho]?></td>
		<td align="center" height="30" bgcolor="<?=$color[$rows1[type_ho]]?>"><?=$rows1[type_ho]?></td>
		<td align="center" height="30" <?=$bg_col?>><?if($rows1[is_except]==1) echo "기분양분"; if($rows1[is_contract]==1) echo $rows1[contractor]; else echo $rows1[pro_contractor];?></td><!-- 계약자 -->
		<td align="center" height="30" <?=$bg_col?>><?if($rows1[is_contract]==1) echo $rows1[cont_tel_1]; else echo $rows1[pro_cont_tel_1];?></td><!-- 연락처1 -->
		<td align="center" height="30" <?=$bg_col?>><?if($rows1[is_contract]==1) echo $rows1[cont_tel_2]; else echo $rows1[pro_cont_tel_2];?></td><!-- 연락처2 -->
		<td align="center" height="30" <?=$bg_col?>><?if($rows1[pro_cont_date]>0)echo $rows1[pro_cont_date];?></td><!-- 청약일 -->
		<td align="right" height="30" <?=$bg_col?>><?if($rows1[pro_draufgabe]>0)echo number_format($rows1[pro_draufgabe]);?></td><!-- 청약금 -->
		<td align="center" height="30" <?=$bg_col?>><?if($rows1[pro_due_date]>0)echo $rows1[pro_due_date];?></td><!-- 계약 예정일 -->
		<td align="center" height="30" <?=$bg_col?>><?if($rows1[cont_date]>0)echo $rows1[cont_date];?></td><!-- 계약일 -->
		<td align="right" height="30" <?=$bg_col?>><?if($rows1[draufgabe]>0)echo number_format($rows1[draufgabe]);?></td><!--계약금 -->
		<td align="center" width="80" height="30" <?=$bg_col?>><?=$rows1[cont_mgm_who]?></td><!-- MGM to -->
		<td align="right" width="80" height="30" <?=$bg_col?>><?if($rows1[cont_mgm_sum]) echo number_format($rows1[cont_mgm_sum])?></td><!-- MGM sum -->
		<td align="center" width="36" height="30" <?=$bg_col?>><?=$w_where[1]?></td><!-- 소속 -->
		<td align="center" width="50" height="30" <?=$bg_col?>><?=$rows1[cont_worker]?></td><!-- 담당자 -->
	</tr>
<?
	 }
	 mysql_free_result($result1);
?>
</table>
