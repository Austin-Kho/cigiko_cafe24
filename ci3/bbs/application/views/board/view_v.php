<script type="text/javascript" src="/ci3/bbs/include/js/httpRequest.js"></script>
<script type="text/javascript">

	function comment_add() {
		var csrf_token = getCookie('csrf_cookie_name');
		var name = "comment_contents="+encodeURIComponent(document.com_add.comment_contents.value)+"&csrf_test_name="+csrf_token+"&table=<?php echo $this->uri->segment(3);?>&board_id=<?php echo $this->uri->segment(5);?>";
		sendRequest("/ci3/bbs/ajax_board/ajax_comment_add", name, add_action, "POST");
	}

	function add_action() {
		if(httpRequest.readyState == 4) {
			if(httpRequest.status == 200) {
				if(httpRequest.responseText == 1000) {
					alert('댓글 내용을 입력하세요.');
				}else if(httpRequest.responseText == 2000) {
					alert('다시 입력하세요.');
				}else if(httpRequest.responseText == 9000) {
					alert('로그인 하여야 합니다.');
				}else{
					var contents = document.getElementById('comment_area');
					contents.innerHTML = httpRequest.responseText;

					var textareas = document.getElementById('input01');
					textareas.value = '';
				}
			}
		}
	}

	function getCookie(name) {

		var nameOfCookie = name + "=";
		var x = 0;
		while(x <= document.cookie.length) {
			var y = (x+nameOfCookie.length);

			if(document.cookie.substring(x, y) == nameOfCookie) {
				if((endOfCookie = document.cookie.indexOf(";", y)) == -1)
					endOfCookie = document.cookie.length;

				return unescape(document.cookie.substring(y, endOfCookie));
			}
			x = document.cookie.indexOf(" ", x) +1;
			if(x == 0)
				break;
		}
		return "";
	}

</script>

	<article id="board_area">
		<header>
			<h1></h1>
		</header>
		<table class="table table-striped" cellspaing="0" cellpadding="0">
			<thead>
				<tr>
					<th scope="co1"><?php echo $views->subject; ?></th>
					<th scope="co2">이름 : <?php echo $views->user_name; ?></th>
					<th scope="co3">조회수 : <?php echo $views->hits; ?></th>
					<th scope="co4">등록일 : <?php echo $views->reg_date; ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th colspan="4"><?php echo $views->contents; ?></th>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">
						<a href="/ci3/bbs/board/lists/<?php echo $this->uri->segment(3);?>/page/<?php echo $this->uri->segment(7);?>" class="btn btn-primary">목록</a>
						<a href="/ci3/bbs/board/modify/<?php echo $this->uri->segment(3); ?>/board_id/<?php echo $this->uri->segment(5);?>/page/<?php echo $this->uri->segment(7);?>" class="btn btn-warning">수정</a>
						<a href="/ci3/bbs/board/delete/<?php echo $this->uri->segment(3); ?>/board_id/<?php echo $this->uri->segment(5);?>/page/<?php echo $this->uri->segment(7);?>" class="btn btn-danger">삭제</a>
						<a href="/ci3/bbs/board/write/<?php echo $this->uri->segment(3); ?>/page/<?php echo $this->uri->segment(7);?>" class="btn btn-success">쓰기</a>
					</th>
				</tr>
			</tfoot>
		</table>

		<form action="" class="form-horzontal" method="post" name="com_add">
			<fieldset>
				<div class="control-group">
					<label for="input01" class="control-label">댓글</label>
					<div class="controls">
						<textarea name="comment_contents" id="input01" cols="30" rows="3" class="input-xlarge"></textarea>
						<input type="button" class="btn btn-primary" onclick="comment_add()" value="작성">
							<p class="help-block"></p>
					</div>
				</div>
			</fieldset>
		</form>
		<div id="comment_area">
			<table cellspaing="0" cellpadding="0" class="table table-striped">
				<tbody>
<?php foreach ($comment_list as $lt) : ?>
					<tr>
						<th scope="row"><?php echo $lt->user_id; ?></th>
						<td><?php echo $lt->contents; ?></td>
						<td><time datetime="<?php echo mdate('%Y-%M-%j', human_to_unix($lt->reg_date)); ?>"><?php 	echo $lt->reg_date; ?></time></td>
					</tr>
<? endforeach; ?>
				</tbody>
			</table>
		</div>
	</article>