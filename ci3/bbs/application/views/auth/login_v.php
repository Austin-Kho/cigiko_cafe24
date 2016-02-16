	<article id="board_area">
		<header>
			<h1></h1>
		</header>
<?php
	$attributes = array('class' => 'form-horizontal', 'id' =>'auth_login');
	echo form_open('http://cigiko.cafe24.com/ci3/bbs/auth/login', $attributes);
?>
		<fieldset>
			<legend>로그인</legend>
			<div class="control-group">
				<label for="input01" class="control-label">아이디</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="input01" name="username" value="<?php echo set_value('username'); ?>">
					<p class="help-block"></p>
				</div>
				<label for="input02" class="control-label">비밀번호</label>
				<div class="controls">
					<input type="password" class="input-xlarge" id="input02" name="password" value="<?php echo set_value('password'); ?>">
					<p class="help-block"></p>
				</div>
				<div class="controls">
					<p class="help-block"><?php echo validation_errors(); ?></p>
				</div>

				<div class="form-actions">
					<button class="btn btn-primary" type="submit">확인</button>
					<button class="btn" onclick="history.go(-1);">취소</button>
				</div>
			</div>
		</fieldset>
	</article>