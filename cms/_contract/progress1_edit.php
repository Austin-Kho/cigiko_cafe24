<?
	// 데이터베이스 연결 정보와 기타 설정
	include '../php/config.php';
	// 각종 유틸리티 함수
	include '../php/util.php';
	// MySQL 연결
	$connect=dbconn();

	// 이름과 아이디에 해당하는 세션이 있는지 확인
	if(!isset($_SESSION[p_id])||!isset($_SESSION[p_name])){
		err_msg('로그인 정보가 없습니다. 다시 로그인해 주세요.');
	}

	$seq = $_REQUEST['seq'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?=$doc_title?></title>
	<link type="text/css" rel="stylesheet" href="../common/cms.css">
	<style type="text/css">
		html { overflow:hidden; }
	</style>
	<script type="text/JavaScript" language="JavaScript" src="../common/global.js"></script>
	<script type="text/JavaScript" language="JavaScript" src="../common/capital.js"></script>
	<script type="text/JavaScript" language="JavaScript" src="../include/calendar/calendar.js"></script>
	<script type="text/javascript">
	<!--
		function _editChk(){
			var form = document.form1;

			if(!form.dong.value){
				alert('동 정보를 입력하세요.');
				form.dong.focus();
				return;
			}
			if(!form.ho.value){
				alert('호 정보를 입력하세요.');
				form.ho.focus();
				return;
			}
			if(!form.type.value){
				alert('타입 정보를 입력하세요.');
				form.type.focus();
				return;
			}
			if(!form.is_except.value){
				alert('세대 상태 정보를 선택하세요.');
				form.is_except.focus();
				return;
			}
			if(!form.price.value){
				alert('공급가격 정보를 입력하세요.');
				form.price.focus();
				return;
			}
			if(!form.pay.value){
				alert('수수료 정보를 입력하세요.');
				form.pay.focus();
				return;
			}
			form.submit();
		}
	//-->
	</script>
</head>
<body style="background-color:white;">
<div style="height:100%; border-width:1px 0 0 0; border-style: solid; border-color:#11ca1f;">
	<div style="height:100%; border-width:1px 0 0 0; border-style: solid; border-color:#C5FAC9; padding:6px 0 0 0;">
		<div style="height:96%; margin:0 auto; width:96%; border-width:2px 2px 2px 2px; border-style: solid; border-color:#96ABE5;">
			<div style="height:50px; border-width:0 0 2px 0; border-style: solid; border-color:#96ABE5; background-color:#D9EAF8; text-align:center; padding-top:30px; margin-bottom:12px;">
				<font color="#4C63BD" style="font-size:11pt"><b>등록 동호수 개별 수정</b></font>
			</div>
			<div style="padding:0 10px 0 10px;">
				<form name="form1" action="progress_post.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="mode" value="individual_reg">
				<input type="hidden" name="seq" value="<?=$seq?>">
				<div style="height:28px; background-color:#F4F4F4; border-width: 1px 0 1px 0; border-color:#CFCFCF; border-style: solid; text-align:center; padding-top:7px;">
					변경 할 동호수 정보를 수정해 주십시요. (<font color="#ff0000">*</font>표시는 필수입력 정보)
				</div>
				<?
					$query = " SELECT * FROM cms_project_data WHERE seq='$seq'  ";
					$result = mysql_query($query, $connect);
					$rows = mysql_fetch_array($result);
				?>
				<div style="height:32px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
					<div style="float:left; padding:9px 15px 0 0; text-align:right; width:100px;">
						동  <font color="#ff0000">*</font>
					</div>
					<div style="float:left; padding-top:8px; text-align:left;">
						<input type="text" name="dong" value="<?=$rows[pj_dong]?>" class="inputstyle2" size="10" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')"> 동
					</div>
				</div>
				<div style="height:32px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
					<div style="float:left; padding:9px 15px 0 0; text-align:right; width:100px;">
						호 수 <font color="#ff0000">*</font>
					</div>
					<div style="float:left; padding-top:8px; text-align:left;">
						<input type="text" name="ho" value="<?=$rows[pj_ho]?>" class="inputstyle2" size="10" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')"> 호
					</div>
				</div>
				<div style="height:32px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
					<div style="float:left; padding:9px 15px 0 0; text-align:right; width:100px;">
						타 입 <font color="#ff0000">*</font>
					</div>
					<div style="float:left; padding-top:8px; text-align:left;">
						<input type="text" name="type" value="<?=$rows[type_ho]?>" class="inputstyle2" size="10" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')"> TYPE
					</div>
				</div>
				<div style="height:32px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
					<div style="float:left; padding:9px 15px 0 0; text-align:right; width:100px;">
						구 분
					</div>
					<div style="float:left; padding-top:8px; text-align:left;">
						<select name="is_except">
							<option value="0" <?if($rows[is_except]==0) echo 'selected';?>> 분양대상 세대
							<option value="1" <?if($rows[is_except]==1) echo 'selected';?>> 기분양 세대
						</select>
					</div>
				</div>
				<div style="height:32px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
					<div style="float:left; padding:9px 15px 0 0; text-align:right; width:100px;">
						공급가격 <font color="#ff0000">*</font>
					</div>
					<div style="padding-top:8px; text-align:left;">
						<input type="text" name="price" value="<?=$rows[price_ho]?>" size="16" class="inputstyle2" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')"> 천원
					</div>
				</div>
				<div style="height:32px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid; padding-bottom:10px;">
					<div style="float:left; padding:9px 15px 0 0; text-align:right; width:100px;">
						수수료 <font color="#ff0000">*</font>
					</div>
					<div style="padding-top:8px; text-align:left;">
						<input type="text" name="pay" value="<?=$rows[pay_ho]?>" size="16" class="inputstyle2" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')"> 천원 (세대당 / VAT 별도)
					</div>
				</div>
				</form>
				<div style="height:50px; text-align:center; padding-top:15px;">
					<input type="button" value=" 수정하기 " onclick="_editChk()" style="height:20px;" class="inputstyle_bt">
					<input type="button" value=" 닫 기 " onclick="opener.location.reload(); self.close();" style="height:20px;" class="inputstyle_bt">
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
