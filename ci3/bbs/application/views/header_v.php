<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>CodeIgniter</title>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<![endif]-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<link type="text/css" rel="stylesheet" href="/ci3/bbs/include/css/bootstrap.min.css" media="screen" >
	<script type="text/javascript">
		$(document).ready(function(){
			$("#search_btn").click(function(){
				if($("#q").val() == ''){
					alert('검색어를 입력해주세요.');
					return false;
				} else {
					var act = '/ci3/bbs/board/lists/ci_board/q/'+$("#q").val()+'/page/1';//검색후 페이지 이동시에도 검색결과 적용하기 위해 주소에 검색어를 포함하는 소스
					$("#bd_search").attr('action', act).submit();//폼 액션을 지정해주고 폼 전송한다.
				}
			});
		});

		function board_search_enter(form) {// 폼 button에서 엔터키를 눌렀을때 써브밋 해주는 함수
			var keycode = window.event.keyCode;
			if(keycode == 13) $("#search_btn").click();
		}
	</script>
</head>
<body>
<div id="main">
	<header id="header" data-role="header" data-position="fixed">
		<blockquote>
			<p>만들면서 배우는 CodeIgniter</p>
			<small>실행 예제</small>
		</blockquote>
	</header>

<nav id="gnb">
	<ul>
		<li><a href="/ci3/bbs/<?php echo $this->uri->segment(1); ?>/lists/<?php echo $this->uri->segment(3); ?>" rel="external">게시판 프로젝트</a></li>
	</ul>
</nav>