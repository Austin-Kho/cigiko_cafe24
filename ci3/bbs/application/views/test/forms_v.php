	<article id="board_area">
		<header>
			<h1></h1>
		</header>

		<?php echo validation_errors(); ?>

		<form action="" class="form-horizontal" method="post">
			<fieldset>
				<legend>폼 검증</legend>
				<div class="control-group">
					<label for="input01" class="control-label">아이디</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01" name="username" value="<?php echo set_value('username'); ?>">
						<p class="help-block">아이디를 입력하세요</p>
					</div>
				</div>
				<div class="control-group">
					<label for="input02" class="control-label">비밀번호</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input02" name="password" value="<?php echo set_value('password'); ?>">
						<p class="help-block">비밀번호를 입력하세요.</p>
					</div>
				</div>
				<div class="control-group">
					<label for="input03" class="control-label">비밀번호 확인</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input03" name="passconf" value="<?php echo set_value('passconf'); ?>">
						<p class="help-block">비밀번호를 한 번 더 입력하세요.</p>
					</div>
				</div>
				<div class="control-group">
					<label for="input04" class="control-label">이메일</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input04" name="email" value="<?php echo set_value('email'); ?>">
						<p class="help-block">이메일을 입력하세요.</p>
					</div>
				</div>
			</fieldset>
			<div><input type="submit" value="전송" class="btn btn-primary"></div>
		</form>
	</article>