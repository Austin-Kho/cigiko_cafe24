<?
	###### 데이터베이스 연결 ######
	// 데이터베이스 연결 정보와 기타 설정
	include_once 'php/config.php';
	// 각종 유틸 함수
	include_once 'php/util.php';
	// MySQL 연결
	$connect=dbconn();
?>
<!DOCTYPE HTML>
<html lang="ko">
 <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<title> <?=$doc_title?> </title>
	<link rel="shortcut icon" href="<?=$cms_url?>images/cms.ico">
	<link type="text/css" rel="stylesheet" href="<?=$cms_url?>common/cms.css">
	<script type="text/javascript" src="common/global.js"></script>
 </head>
 <body>
 <div id="wrap">
	<div id="header">
	<? include 'include/t_menu.php'; ?>
	</div>
	<div id="content">
	<?
		if(!$_SESSION['p_id']){
	?>
	<div style="width:1080px; height:650px; text-align:center; display: table-cell; vertical-align: middle;">
		<p>로그인 정보가 없습니다. 다시 로그인하여 주십시요!</p>
		<input type="button" value="로그인" class="sub_bt1" onclick="location.href='<?=$cms_url?>member/login_form.php';">
		<input type="button" value=" 닫 기 " class="sub_bt1" onclick="window.self.close()">
	</div>
	<? }else{?>
	<div style="height:700px;">
		<div style="float:left; width:730px; height:485px; padding-right:10px;">
			<div style="height:230px;"><!-- 메인 배너 div -->
				<div style="float:left; width:242px;"><a href="#/"><img src="images/img/3.jpg" width="235" height="220" title="월드메르디앙 가야" alt="" /></a></div>
				<div style="float:left; width:242px;"><a href="http://dymaru.co.kr/" target="_blank"><img src="images/img/2.jpg" width="235" height="220" title="월드메르디앙 대연마루" alt="" /></a></div>
				<div style="float:left; width:242px;"><a href="#/"><img src="images/img/1.jpg" width="235" height="220" title="월드메르디앙 펠라티움55" alt="" /></a></div>
			</div>
			<div style="height:28px; text-align:center; padding-top:8px;"><a href="#;"><img src="images/vit_bt.jpg" title="1" alt="" /></a></div>
			<div style="clear:left; width:730px;"><!-- 공지 사항 div -->
				<div style="width:706px; height:19px; border:1px solid #CBCDD9; padding:5px 0 0 10px;  color:#000000; background:url('../images/headcell_bg.jpg')"><b>공지사항</b></div>
				<div style="width:700px; height:156px; padding:5px 8px 5px 8px; border-width:0 1px 1px 1px; border-style:solid; border-color:#CBCDD9;">
					<div style="clear:left; float:left; width:630px; height:24px; padding-top:6px; border-width:0 0 1px 0; border-style:solid; border-color:#EAEBF2;">
						·  공지사항 폼 준비 중!
					</div>
					<div style="float:right; color:#8D8D93; width:65px; height:24px; padding:6px 5px 0 0; border-width:0 0 1px 0; border-style:solid; border-color:#EAEBF2;">2013/05/20</div>
					<div style="clear:left; float:left; width:630px; height:24px; padding-top:6px; border-width:0 0 1px 0; border-style:solid; border-color:#EAEBF2;">
						· 공지사항 폼 준비 중!
					</div>
					<div style="float:right; color:#8D8D93; width:65px; height:24px; padding:6px 5px 0 0; border-width:0 0 1px 0; border-style:solid; border-color:#EAEBF2;">2013/05/20</div>
					<div style="clear:left; float:left; width:630px; height:24px; padding-top:6px; border-width:0 0 1px 0; border-style:solid; border-color:#EAEBF2;">
						· 공지사항 폼 준비 중!
					</div>
					<div style="float:right; color:#8D8D93; width:65px; height:24px; padding:6px 5px 0 0; border-width:0 0 1px 0; border-style:solid; border-color:#EAEBF2;">2013/05/20</div>
					<div style="clear:left; float:left; width:630px; height:24px; padding-top:6px; border-width:0 0 1px 0; border-style:solid; border-color:#EAEBF2;">
						· 공지사항 폼 준비 중!
					</div>
					<div style="float:right; color:#8D8D93; width:65px; height:24px; padding:6px 5px 0 0; border-width:0 0 1px 0; border-style:solid; border-color:#EAEBF2;">2013/05/20</div>
					<div style="clear:left; float:left; width:630px; height:24px; padding-top:6px;">
						· 공지사항 폼 준비 중!
					</div>
					<div style="float:right; color:#8D8D93; width:65px; height:24px; padding:6px 5px 0 0;">2013/05/20</div>
				</div>
			</div>
		</div>
		<div style="float:left; width:340px; height:485px;">
			<div style="height:200px; border:2px solid #EE8509;">
				메인 구성 준비 중..
			</div>
			<div style="height:247px; border:1px solid #CDCDCD; margin-top:10px;">
				메인 구성 준비 중..2
			</div>
		</div>
		<div style="clear:left; height:200px; border-width:1px 0 0 0; border-style:solid; border-color:#b4b8c5;">
			<div style="height:200px; border:1px solid #CDCDCD; margin-top:20px;">
				메인 구성 준비 중..3
			</div>
		</div>
	</div>
	<? } ?>
	</div>
 </div>
 <div id="footwrap">
	<div id="footer"><?=$doc_copyright?></div>
 </div>
 </body>
</html>