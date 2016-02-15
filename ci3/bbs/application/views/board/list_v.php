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

	<article id="board_area">
		<header>
			<h1></h1>
		</header>
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th scope="co1">번호</th>
					<th scope="co2">제목</th>
					<th scope="co3">작성자</th>
					<th scope="co4">조회수</th>
					<th scope="co5">등록일</th>
				</tr>
			</thead>
			<tbody>
<?php foreach ($list as $lt): ?><!-- while 문과 비슷 / foreach 문이 키와 배열로 분리사용할 수 있어서 더 유용함 -->
					<tr>
						<th scope="row"><?php echo $lt->board_id; ?></th><!-- 모델에서 객체배열로 반환했기 때문에 $lt->board_id 형태로 사용 -->
						<td>
							<a href="/ci3/bbs/<?php echo $this->uri->segment(1); ?>/view/<?php echo $this->uri->segment(3); ?>/board_id/<?php echo $lt->board_id; ?>/page/<?php echo $this->uri->segment(5); ?>" rel="external">
								<?php echo $lt->subject; ?>
							</a>
						</td>
						<td><?php echo $lt->user_name; ?></td>
						<td><?php echo $lt->hits; ?></td>
						<td>
							<time datetime="<?php echo mdate("%Y-%m-%d", human_to_unix($lt->reg_date)); ?>"><?php echo mdate("%Y-%m-%d", human_to_unix($lt->reg_date)); ?></time>
						</td>
					</tr>
<? endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="5"><?php echo $pagination; ?></th>
				</tr>
			</tfoot>
		</table>
		<div>
			<p><a href="/ci3/bbs/board/write/<?php echo $this->uri->segment(3) ?>/page/<?php echo $this->uri->segment(5) ?>" class="btn btn-success">쓰기</a></p>
		</div>
		<div>
			<form action="" id="bd_search" method="post">
				<input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);">
				<input type="button" id="search_btn" value="검색">
			</form>
		</div>
	</article>