<script type="text/javascript">
	$(document).ready(function(){
		$('#write_btn').click(function(){
			if($('#input01').val()==''){
				alert('제목을 입력해주세요.');
				$('#input01').focus();
				return false;
			}else if($('#input02').val()==''){
				alert('내용을 입력해주세요.');
				$('#input02').focus();
				return false;
			}else{
				$('#write_action').submit();
			}
		});
	});
</script>
	<article id="board_area">
		<heder>
			<h1></h1>
		</heder>

		<form action="" class="form-horizontal" method="post" id="write_action">
			<fieldset>
				<legend>게시물 수정</legend>
				<div class="control-group">
					<label for="input01" class="control-label">제목</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01" name="subject" value="<?php echo $views->subject; ?>">
						<p class="help-block">게시물의 제목을 써주세요</p>
					</div>
					<label for="input02" class="control-label">내용</label>
					<div class="controls">
						<textarea name="contents" id="input02" cols="30" rows="5" class="input-xlarge"><?php echo $views->contents; ?></textarea>
						<p class="help-block">게시물의 내용을 써주세요.</p>
					</div>
					<div class="form-actions">
						<button class="btn btn-primary" id="write_btn" type="submit">수정</button>
						<button class="btn" onclick="history.go(-1)">취소</button>
					</div>
				</div>
			</fieldset>
		</form>
	</article>