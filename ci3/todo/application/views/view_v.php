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
	<script type="text/javascript" src="http:ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<link type="text/css" href="/ci3/todo/include/css/bootstrap.min.css" media="screen" rel="stylesheet">
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
				<li><a href="/todo/index.php/main/lists/" rel="external">todo 애플리케이션 프로그램</a></li>
			</ul>
		</nav>
		<article id="board_area">
			<header>
				<h1>Todo 조회</h1>
			</header>
			<table cellspacing="0" cellpadding="0" class="table table-striped">
				<thead>
					<tr>
						<th scope="co1"><?php echo $views->id; ?></th>
						<th scope="co2">시작일 : </th>
						<th scope="co3">종료일 : </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th colspan="3"><?php echo $views->content; ?></th>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4"><a href="/ci3/todo/index.php/main/lists/" class="btn btn-primary">목록</a><a href="/ci3/todo/index.php/main/delete/<?php echo $this->uri->segment(3); ?>" class="btn btn-danger">삭제</a><a href="/ci3/todo/index.php/main/write" class="btn btn-success">쓰기</a></th>
					</tr>
				</tfoot>
			</table>
		</article>

		<footer id="footer">
			<blockquote>
				<p><a href="http://www.cikorea.net/" class="azubu" target="blank">CodeIgniter한국사용자포험</a></p>
				<small>Copyright by <em class="black"><a href="mailto:advisor@cikorea.net">웅파</a></em></small>
			</blockquote>
		</footer>
	</div>
</body>
</html>