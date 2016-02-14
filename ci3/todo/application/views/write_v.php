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
			</blockquote		</header>

		<nav id="gnb">
			<ul>
				<li><a href="/todo/index.php/main/lists/" rel="external">todo 애플리케이션 프로그램</a></li>
			</ul>
		</nav>

		<article id="board_area">
			<header>
				<h1>Todo 쓰기</h1>
			</header>


			<form action="" class="form-horizontal" method="post" id="write_action">
				<fieldset>
					<div class="control_group">
						<label for="input01" class="control-label">내용</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input01" name="content">
							<p class="help-block"></p>
						</div>
						<label for="input02" class="control_label">시작일</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input02" name="created_date">
							<p class="help-block"></p>
						</div>
						<label for="input03" class="control-label">종료일</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input03" name="due_date">
							<p class="help-block"></p>
						</div>

						<div class="form-actions">
							<input type="submit" class="btn btn-primary" id="write_btn" value="작성">
						</div>
					</div>
				</fieldset>
			</form>
		</article>

	<footer id="footer">
		<blockquote>
			<p>
				<a href="http://cikorea.net/" class="azubu" target="blank">CodeIgniter한국사용자포럼</a><small>Copyright by<em class="black"><a href="mailto:advisor@cikorea.net">웅파</a></em></small>
			</p>
		</blockquote>
	</footer>

	</div>

</body>
</html>