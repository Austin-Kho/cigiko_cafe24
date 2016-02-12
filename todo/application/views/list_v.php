<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>CodeIgniter</title>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<![endif]-->
	<script type="text/css" rel="stylesheet" href="/todo/include/css/bootstrap.css"></script>
</head>
<body>
	<div id="main">
		<header id="header" data-role="header" data-position="fixed"><!-- 헤더 시작 -->
			<blockquote>
				<p>만들면서 배우는 CodeIgniter</p>
				<small>실행 예제</small>
			</blockquote>
		</header><!-- 헤더 종료 -->

		<nav id="gnb"><!-- gnb 시작 -->
			<ul>
				<li><a href="/todo/index.php/main/lists/" rel="external">todo 애플리케이션 프로그램</a></li>
			</ul>
		</nav><!-- gnb 시작 -->
		<article id="board_area">
			<header>
				<h1>Todo 목록</h1>
			</header>
			<table cellspacing="0" cellpadding="0" class="table table-striped">
				<thead>
					<tr>
						<th scope="co1">번호</th>
						<th scope="co2">내용</th>
						<th scope="co3">시작일</th>
						<th scope="co4">종료일</th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach ($list as $lt) {
				?>
					<tr>
						<th scope="row"><?php echo $lt->id; ?></th>
						<td><a href="/todo/index.php/main/view/<?php echo $lt->id; ?>" rel="external"><?php echo $lt->content; ?></a></td>
						<td>
							<time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt->created_on)); ?>">
								<?php echo $lt->created_on; ?>
							</time>
						</td>
						<td>
							<time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt->due_date)); ?>">
								<?php echo $lt->due_date; ?>
							</time>
						</td>
					</tr>
				<?php
					}
				?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4"><a href="/todo/index.php/main/write/" class="btn btn-success">쓰기</a></th>
					</tr>
				</tfoot>
			</table>
			<div><p></p></div>
		</article>

		<footer id="footer">
			<blockquote>
				<p><a href="http://www.cikorea.net/" class="azubu" target="blank">CodeIgniter한국사용자포럼</a></p>
				<small>Copyright by	<em class="black"><a href="mailto:advisor@cikorea.net">웅파</a></em></small>
			</blockquote>
		</footer>
	</div>
</body>
</html>