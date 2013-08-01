<?
	// W3C P3P 규약설정
  @header ("P3P : CP=\"ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC\"");


	/*******************************************************************************
 	 * 에러 리포팅 설정과 register_globals_on일때 변수 재 정의
 	 ******************************************************************************/
 	@error_reporting(E_ALL ^ E_NOTICE);
        foreach($_GET as $key=>$val) $$key = del_html($val);
	@extract($HTTP_POST_VARS); 
	@extract($HTTP_SERVER_VARS); 
	@extract($HTTP_ENV_VARS);

        $page = (int)$page;

	$temp_filename=realpath(__FILE__);
	if($temp_filename) $config_dir=eregi_replace("setup_lib.php","",$temp_filename);
	else $config_dir="";

	/*******************************************************************************
 	 * 기본 변수 초기화. (php의 오류같지 않은 오류 때문에;; ㅡㅡ+)
 	 ******************************************************************************/
	unset($member);
	unset($group);
	unset($setup);
	unset($s_que);
    $select_arrange = str_replace(array("'",'"','\\'),'',$select_arrange);
    if(!in_array($desc,array('desc','asc'))) unset($desc);


	//  초기 헤더를 뿌려주는 부분;;;;
	function head($body="",$scriptfile=""){

		 global $group, $setup, $dir,$member, $PHP_SELF, $id, $_head_executived, $HTTP_COOKIE_VARS, $width;

		 if($_head_executived) return;
		 $_head_executived = true;

		 $f = @fopen("license.txt","r");
		 $license = @fread($f,filesize("license.txt"));
		 @fclose($f);

		 print "<!--\n".$license."\n-->\n";

		 if(!eregi("member_",$PHP_SELF)) $stylefile="skin/$setup[skinname]/style.css"; else $stylefile="style.css";

		 if($setup[use_formmail]){
				$f = fopen("script/script_zbLayer.php","r");
				$zbLayerScript = fread($f, filesize("script/script_zbLayer.php"));
				fclose($f);
		 }

		 // html 시작부분 출력
		 if($setup[skinname]){
?>
<html> 
<head>
	<title><?=$setup[title]?></title>
	<meta http-equiv=Content-Type content=text/html; charset=EUC-KR>
    <meta http-equiv=imagetoolbar content=no>
	<link rel=StyleSheet HREF=<?=$stylefile?> type=text/css title=style>
	<?if($setup[use_formmail]) echo $zbLayerScript;?>
	<?if($scriptfile) include "script/".$scriptfile;?>
</head>
<body topmargin='0'  leftmargin='0' marginwidth='0' marginheight='0' <?=$body?><?

			if($setup[bg_color]) echo " bgcolor=".$setup[bg_color]." ";
			if($setup[bg_image]) echo " background=".$setup[bg_image]." ";

			?>>
			<?
			if($group[header_url]) { @include $group[header_url]; }
			if($setup[header_url]) { @include $setup[header_url]; }
			if($group[header]) echo stripslashes($group[header]);
			if($setup[header]) echo stripslashes($setup[header]);
			?>
			<table border=0 cellspacing=0 cellpadding=0 width=<?=$width?> height=1 style="table-layout:fixed;"><col width=100%></col><tr><td><img src=images/t.gif border=0 width=98% height=1 name=zb_get_table_width><br><img src=images/t.gif border=0 name=zb_target_resize width=1 height=1></td></tr></table>
			<?
		 }else{
			?>
<html>
<head>
	<meta http-equiv=Content-Type content=text/html; charset=EUC-KR>
	<link rel=StyleSheet HREF=style.css type=text/css title=style>
	<?=$script?>
</head>
<body topmargin='0'  leftmargin='0' marginwidth='0' marginheight='0' <?=$body?>>
			<?
				if($group[header_url]) { @include $group[header_url]; }
				if($group[header]) echo stripslashes($group[header]);
		}

	}

	// HTML Tag를 제거하는 함수
	function del_html( $str ) {
		$str = str_replace( ">", "&gt;",$str );
		$str = str_replace( "<", "&lt;",$str );
		return $str;
	}


	// 빈문자열 경우 1을 리턴
	function isblank($str) {
		$temp=str_replace("　","",$str);
		$temp=str_replace("\n","",$temp);
		$temp=strip_tags($temp);
		$temp=str_replace("&nbsp;","",$temp);
		$temp=str_replace(" ","",$temp);
		if(eregi("[^[:space:]]",$temp)) return 0;
		return 1;
	}

	// 요청한 메시지를 화면에 출력한 뒤 페이지를 다시 이전 페이지로 옮김.
	function err_msg($msg, $bool="1"){
		if($bool){
			echo "
			<script>
				window.alert('$msg');
				history.go(-1);
			</script>
			";
			exit;
		}
	}

	// 관리자 테이블과 회원관리 테이블의 이름을 미리 변수로 정의
	$member_table = "cms_member_table";   // 회원들의 데이타가 들어 있는 직접적인 테이블
	$group_table = "cms_company_table";   // 그룹테이블
	$admin_table="cms_admin_table";       // 프로그램의 관리자 테이블

	$send_memo_table ="cms_send_memo";   //보낸 메모 테이블
	$get_memo_table ="cms_get_memo";     //받은 메모 테이블

	$t_division="cms_division";         // Division 테이블
	$t_board = "cms_board";             // 메인 테이블
	$t_comment ="cms_board_comment";    // 코멘트테이블
	$t_category ="cms_board_category";  // 카테고리 테이블	
?>
