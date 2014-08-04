<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>CodeIgniter</title>
	<!-- [if lt IE 9]>
	<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>	<![endif] -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<link rel="stylesheet" href="/ci/bbs/include/css/bootstrap.css" type="text/css">
</head>
<body>
	<div id="main">
		<header id="header" data-role="header" date-position="fixed"><!-- Header Start -->	
			<blockquote>
				<p>만들면서 배우는 CodeIgniter</p>
				<small>실행 예제</small>
			</blockquote>
		</header><!-- Header End -->

		<nav id="gnb"><!-- gnb Start -->
			<ul>
				<li><a rel="external" href="/bbs/<?=$this->uri->segment(1)?>/lists/<?=$this->uri->segment(3)?>">게시판 프로젝트</a></li>
			</ul>
		</nav><!-- gnb End -->