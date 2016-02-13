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
	<!-- <link type="text/css" href="/todo/include/bootstrap/css/bootstrap.min.css" media="screen" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script> -->
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
		<li><a href="/bbs/<?php echo $this->uri->segment(1); ?>/lists/<?php echo $this->uri->segment(3); ?>" rel="external">게시판 프로젝트</a></li>
	</ul>
</nav>