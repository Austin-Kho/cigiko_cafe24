	<article id="board_area">
		<header>
			<h1></h1>
		</header>
		<table cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th scope="co1">번호</th>
					<th scope="co2">제목</th>
					<th scope="co3">작성자</th>
					<th scope="co4">조회수</th>
					<th scope="co5">작성일</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $lt): ?>
					<tr>
						<th scope="row"><?php echo $lt->board_id; ?></th>
						<td>
							<a href="/bbs/<?php echo $this->uri->segment(1); ?>/view/<?php echo $this->uri->segment(3); ?>/<?php echo $lt->board_id; ?>" rel="external"><?php echo $lt->subject; ?></a>
						</td>
						<td><?php echo $lt->user_name; ?></td>
						<td><?php echo $lt->hits; ?></td>
						<td>
							<time datetime="<?php echo mdate("%Y-%M-%j", human_to_unix($lt->reg_date)); ?>"><?php echo mdate("%M. %j, %Y", human_to_unix($lt->reg_date)); ?></time>
						</td>
					</tr>
				<? endforeach; ?>
			</tbody>
		</table>
	</article>