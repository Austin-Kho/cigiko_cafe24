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
</head>
<body>
<div id="main">
	<header id="header" data-role="header" data-position="fixed">
		<blockquote>
			<p>만들면서 배우는 CodeIgniter</p>
			<small>실행 예제</small>
			<p>
<?php
	if(@$this->session->userdata['logged_in'] == TRUE) {
?>
<?php echo $this->session->userdata('username'); ?> 님 환영합니다. <a href="/ci3/bbs/auth/logout" class="btn">로그아웃</a>
<?php
	}else{
?>
<a href="/ci3/bbs/auth/login" class="btn btn-primary">로그인</a>
<?php
	}
?>
			</p>
		</blockquote>
	</header>

<nav id="gnb">
	<ul>
		<li><a href="/ci3/bbs/<?php echo $this->uri->segment(1); ?>/lists/<?php echo $this->uri->segment(3); ?>" rel="external">게시판 프로젝트</a></li>
	</ul>
</nav>