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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$doc_title?></title>
	<link type="text/css" rel="stylesheet" href="../common/cms.css">
	<style type="text/css">
		html { overflow:hidden; }
	</style>
	<script type="text/JavaScript" language="JavaScript" src="../common/global.js"></script>
	<script language="JavaScript" type="text/JavaScript">
	<!--
		function form_delete(){
			var form=document.form1;

			var b=0;
				for(i=0; i<form.elements.length; i++){
					if(form.elements[i].name=="mnum[]"){
						if(form.elements[i].checked==true){
							b++;
						}
					}
				}
				if(b==0){
					alert("삭제할 메세지를 선택하여 주세요!");
					return;
				}
			  var cf=confirm('삭제하시겠습니까?');
				if(cf==true){
					 form.gb.value="2";
					 form.submit();
				}
		}

		var checkflag="false";

			function checkAll(){
				 var form=document.form1;

				 if(checkflag=="false"){
						for(var j=0; j<form.elements.length; j++){
							 if(form.elements[j].name=="mnum[]"){
									if(form.elements[j].checked==false)
										 form.elements[j].checked=true;
									}
							 }
							 checkflag="true";
				 } else if(checkflag="true"){
						for(var j=0; j<form.elements.length; j++){
							 if(form.elements[j].name=="mnum[]"){
									if(form.elements[j].checked==true)
										 form.elements[j].checked=false;
									}
							 }
							 checkflag="false";
				 }
			}
	//-->
	</script>
</head>
<body style="background-color:white;">
<div style="height:100%; border-width:1px 0 0 0; border-style: solid; border-color:#11ca1f;">
	<div style="height:100%; border-width:1px 0 0 0; border-style: solid; border-color:#C5FAC9; padding:6px 0 0 0;">
		<div style="height:96%; margin:0 auto; width:96%; border-width:2px 2px 2px 2px; border-style: solid; border-color:#96ABE5;">
			<div style="height:50px; border-width:0 0 2px 0; border-style: solid; border-color:#96ABE5; background-color:#D9EAF8; text-align:center; padding-top:30px; margin-bottom:12px;">
				<font color="#4C63BD" style="font-size:11pt"><b>보낸 쪽지함</b></font>
			</div>
			<div style="text-align:right; padding:15px 20px 6px 0;">
				<a href="message_1.php"> 받은쪽지함 </a> |
				<b><font color="#0066cc">보낸쪽지함</font></b> |
				<a href="message_3.php"> 쪽지쓰기 </a>
			</div>


			<div style="padding:0 10px 0 10px;">
				<form method="post" name="form1" action="message_del.php">
				<input type="hidden" name="gb">
				<div style="height:35px; background-color:#EAEAEA; border-width: 1px 0 1px 0; border-color:#CFCFCF; border-style: solid;">
					<div style="float:left; padding-top:8px; text-align:center; width:25px;">
						<input type="checkbox" name="cont" onclick="checkAll()">
					</div>
					<div style="float:left; padding-top:8px; text-align:center; width:70px;">받는사람</div>
					<div style="float:left; padding-top:8px; text-align:center; width:122px;">메 세 지</div>
					<div style="float:left; padding-top:8px; text-align:center; width:48px;">확인유무</div>
					<div style="float:left; padding-top:8px; text-align:center; width:110px;">확인시간</div>
				</div>
				<?
					$a_re_chk['Y']="확인";
					$a_re_chk['N']="<font color='red'>미확인</font>";

					$query="SELECT mnum FROM cms_message_info WHERE sendid_fk='$_SESSION[p_id]' AND send_del='N'";
					$result=mysql_query($query, $connect);
					$total_bnum=mysql_num_rows($result);     // 총 게시물 수   11111111111111111111
					mysql_free_result($result);
					if($total_bnum==0){
				?>
				<div style="clear:left; height:80px; border-width: 0 0 1px 0; border-color:#CFCFCF; border-style: solid; text-align:center; padding-top:50px; margin-bottom:10px;">보낸 쪽지가 없습니다.</div>
				<?
					}else{

					$index_num = 5;                 // 한 페이지 표시할 목록 개수 22222222222222
					$page_num = 10;								  // 한 페이지에 표시할 페이지 수 33333
					//$start=$_REQUEST['start'];
					if(!$start) $start = 1;              // 현재페이지 444444444
					$s = ($start-1)*$index_num;
					$e = $index_num;

					$query2="SELECT mnum, message, receive_chk, receive_reg, name 
							    FROM cms_message_info, cms_member_table 
							    WHERE sendid_fk='$_SESSION[p_id]' AND send_del='N' AND (receiveid_fk=user_id)
							    ORDER BY mnum DESC LIMIT $s, $e";
					$result2=mysql_query($query2, $connect);
					for($i=0; $rows2=mysql_fetch_array($result2); $i++){
						$bunho=$total_bnum-($i+$cline)+1;
						$msg_char=shortenStr($rows2[message], 20);
					?>
				<div style="clear:left; height:30px; border-width: 0 0 1px 0; border-color:#CFCFCF; border-style: solid;">
					<div style="float:left; padding-top:5px; text-align:center; width:25px;">
						<input type="checkbox" name="mnum[]" value="<?=$rows2[mnum]?>">
					</div>
					<div style="float:left; padding-top:5px; text-align:center; width:70px;">
						<?=shortenStr($rows2[name], 11)?>
					</div>
					<div style="float:left; padding-top:5px; width:122px;">
						<a href="message_view.php?mnum=<?=$rows2[mnum]?>&amp;gb=0"><?=$msg_char?></a>
					</div>
					<div style="float:left; padding-top:5px; text-align:center; width:48px;">
						<?=$a_re_chk[$rows2[receive_chk]]?>
					</div>
					<div style="float:left; padding-top:5px; text-align:right; width:110px;">
						<?=substr($rows2[receive_reg],0,16)?>
					</div>
				</div>

				<?
					}
					mysql_free_result($result2);
				?>
				<div style="height:35; text-align:center; padding-top:10px;">
					<span>
						<?
							$back_url="";
							page_avg($total_bnum, $page_num, $index_num, $start, $back_url);
							//1. 총게시물수 2. 한페이지 페이지수 3. 한페이지목록 수 4. 시작페이지 5. 해당 페이지 필요변수
						?>
					</span>
				</div>
				<? } ?>
				<div style="float:left;">
					<input type="button" value=" 삭 제 " onclick="javascript:form_delete()" class="inputstyle_bt" style="height:20px;">
				</div>
				<div style="float:right;">
					<input type="button" value=" 닫 기 " onclick="self.close();" class="inputstyle_bt" style="height:20px;">
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
