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
				<?php	foreach ($list as $lt) : //컨트롤러에서 $data['list']로 뷰에 전달된 내용을 $list배열로 사용	?>
					<tr><!-- 현재행이 루프수만큼 반복 // 모델에서 객체배열로 반환했기 때문에 $lt->created_date형태로 사용 //일반배열 반환시는 $lt['created_date']형태로 사용 -->
						<th scope="row"><?php echo $lt->id; ?></th>
						<td><!-- 컨텐츠에 보기 페이지 주소를 미리 링크 함 // 주소형태와 컨트롤러에 전달할 변수는 개발자가 만드는 것이므로 미리 선언하고 그에 맞게 다음 절에서 todo보기 함수인 view();를 만든다. -->
							<a href="/todo/index.php/main/view/<?php echo $lt->id; ?>" rel="external"><?php echo $lt->content; ?></a></td>
						<td>
							<time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt->created_date)); ?>">
								<?php echo $lt->created_date; ?>
							</time>
						</td>
						<td>
							<time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt->due_date)); ?>">
								<?php echo $lt->due_date; ?>
							</time>
						</td>
					</tr>
				<?php endforeach; ?>
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