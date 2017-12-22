<script type="text/javascript">
	// $(document).ready(function(){
	// 	$('#write_btn').click(function(){
	// 		if($('#input01').val()==''){
	// 			alert('제목을 입력해주세요.');
	// 			$('#input01').focus();
	// 			return false;
	// 		}else if($('#input02').val()==''){
	// 			alert('내용을 입력해주세요.');
	// 			$('#input02').focus();
	// 			return false;
	// 		}else{
	// 			$('#write_action').submit();
	// 		}
	// 	});
	// });
</script>
	<article id="board_area">
		<heder>
			<h1></h1>
		</heder>

		<!-- <form action="" class="form-horizontal" method="post" id="write_action"> --> <!--  //form 태그 주석 처리 -->
<?php
	// CSRF(크로스 사이트 요청 위조) 공격을 방어하기 위해서
	// application/config/config.php :: $config['csrf_protection'] =  TRUE; 로 지정한 후 form_open() 함수로 form을 열어 준다.
	$attributes = array('class' => 'form-horizontal', 'id' => 'write_action');   // 추가할  속성 값을 배열로 작성하여 form_open() 함수의 두 번째 파라미터로 전달.
	echo form_open('/board/write/ci_board', $attributes);             // form_open(); 함수를 출력.
 ?>
			<fieldset>
				<legend>게시물 쓰기</legend>
				<div class="control-group">
					<label for="input01" class="control-label">제목</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01" name="subject" value="<?php echo set_value('subject'); ?>">
						<p class="help-block">게시물의 제목을 써주세요</p>
					</div>
					<label for="input02" class="control-label">내용</label>
					<div class="controls">
						<textarea name="contents" id="input02" cols="30" rows="5" class="input-xlarge"><?php echo set_value('contents'); ?></textarea>
						<p class="help-block">게시물의 내용을 써주세요.</p>
					</div>
					<div class="controls">
						<p class="help-block"><font color="blue"><?php echo validation_errors(); ?></font></p>
					</div>

					<div class="form-actions">
						<button class="btn btn-primary" id="write_btn" type="submit">작성</button>
						<button class="btn" onclick="history.go(-1)">취소</button>
					</div>
				</div>
			</fieldset>
		</form>
	</article>