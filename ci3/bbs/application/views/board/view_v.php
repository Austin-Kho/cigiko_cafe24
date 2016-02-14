	<article id="boar_area">
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
	</article>