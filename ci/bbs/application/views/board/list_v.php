<article id="board_area">
	<header>
		<h1></h1>
	</header>
	<table cellspacing="0" cellpadding="0" class="table table-striped">
		<thead>
			<tr>
				<th scope="col">번호</th>
				<th scope="col">제목</th>
				<th scope="col">작성자</th>
				<th scope="col">조회수</th>
				<th scope="col">작성일</th>
			</tr>
		</thead>
		<tbody>
<? foreach ($list as $lt): ?>
			<tr>
				<th scope="row"><?=$lt->board_id; ?></th>
				<td><a href="/ci/bbs/<?=$this->uri->segment(1)?>/view/<?=$this->uri->segment(3); ?>/<?=$lt->board_id; ?>" rel="external"><?=$lt->subject; ?></a></td>
				<td><?=$lt->user_name; ?></td>
				<td><?=$lt->hits; ?></td>
				<td><time datetime='<?=mdate("%Y-%M-%j", $lt->reg_date);?>'><?=mdate("%M, %j,%Y", human_to_unix($lt->reg_date));?></time></td>
			</tr>
<? endforeach; ?>	
		</tbody>
	</table>
</article>