					<!-- ============== subject table end ============== -->
					<div style=" height:18px; background-color:#F8F8F8" class="d3_sub">
						<b><font size="2" color="#cc0099">◈</font><font size="2" color="#6666cc"> 현장 전도금 입출내역</font></b>
						<div style="float:right;">
							<!-- <font color="red">*</font> 필수 항목은 반드시 입력하시기 바랍니다. -->
						</div>
					</div>
					<!-- ============== subject table end ============== -->
					<?
						$pr_1_1_rlt = mysql_query("select pr_1_1 from cms_mem_auth where user_id='$_SESSION[p_id]' ", $connect);
						$pr_1_1_row = mysql_fetch_array($pr_1_1_rlt);

						if(!$pr_1_1_row[pr_1_1]||$pr_1_1_row[pr_1_1]==0){
					?>
					<div style="display:inline;">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" valign="middle" style="font-size:13px; color:black;" height="580">
								<p>해당 페이지에 대한 조회 권한이 없습니다. 관리자(<?=$admin_tel?>)에게 문의하여 주십시요!</p>
								<p>또는 <a href="javascript:message_win('<?=$cms_url?>member/message_3.php?r_id=<?=$admin_id?>')" class="no_auth">관리자나 해당 직원에게 메세지</a>를 보낼 수 있습니다.</p>
							</td>
						</tr>
					</table>
					</div>
					<? }else{ ?>
					<div style="display:inline;">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td height="580" valign="top">
						<div style="height:18px; text-align:right; padding:0 20px 2px 0; margin-top:10px;">
							<a href="javascript:" onClick="alert('준비 중입니다!');"><img src="../images/excel_icon.jpg" height="10" border="0" alt="" /> EXCEL로 출력</a>
						</div>
						<form method="post" name="cash_book_frm" action="<?$_SERVER['PHP_SELF']?>">
						<input type="hidden" name="start" value="1">
						<div style="height:35px; border-width:1px 0 1px 0; border-color:#D6D6D6; border-style:solid;">
							<!-- ============ 본사 직원일 때 프로젝트 선택 가능 시작 ============  -->
							<?
								if($member_row[is_company]==1){
								$pj_rlt = mysql_query("SELECT seq FROM cms_project_info ORDER BY cont_date DESC, seq DESC LIMIT 1", $connect);
								$pj_row = mysql_fetch_array($pj_rlt);
								// if(!$pj_list) $pj_list = $pj_row[seq];
								$year_frm=$_REQUEST['year_frm'];
								$pj_list=$_REQUEST['pj_list'];
							?>
							<div style="float:left; width:80px; height:28px; background-color:#F4F4F4; padding:7px 20px 0 20px; color:black;">
								년도 별
							</div>
							<div style="float:left; width:160px; height:28px; padding:7px 20px 0 10px;">
								<select name="year_frm" onchange="submit();" class="inputstyle2" style="height:22px; width:100px;"><!-- ==================================== 계약년도 폼 ===================================== -->
									<option value="1"> 전 체
									<?
										$start_year = "2013";
										if(!$year_frm) $year_frm=date('Y');  // 첫 화면에 전체 계약 목록을 보이고 싶으면 이 행을 주석 처리
										$year=range($start_year,date('Y'));
										for($i=(count($year)-1); $i>=0; $i--){
									?>
									<option value="<?=$year[$i]?>" <?if($year_frm==$year[$i]) echo "selected"; ?>><?=$year[$i]."년"?>
									<?	} ?>
								</select>
							</div>
							<div style="float:left; width:80px; height:28px; background-color:#F4F4F4; padding:7px 20px 0 20px; color:black;">
								프로젝트
							</div>
							<div style="float:left; height:28px; padding:6px 20px 0 10px;">
								<select name="pj_list" onchange="submit();" class="inputstyle2" style="height:22px; width:180px;"><!-- ==================================== 프로젝트 리스트 ===================================== -->
									<!-- <option value=""<?if(!$pj_list) echo "selected"?>> 선 택 -->
									<?
										if($year_frm>1){
											$where=" WHERE cont_date LIKE '$year_frm%' ";
										}
										$qry = "SELECT * FROM cms_project_info $where ORDER BY cont_date DESC ";
										$rlt = mysql_query($qry, $connect);
										for($i=0; $rows=mysql_fetch_array($rlt); $i++){
									?>
									<option value="<?=$rows[seq]?>" <?if($pj_list==$rows[seq]) echo "selected"; ?>><?=$rows[pj_name]?>
									<? } ?>
								</select>
							</div>
							<? } ?>
							<!-- ============ 본사 직원일 때 프로젝트 선택 가능 종료 ============   -->
							<!--  ============ 현장 담당자일 때 담당 프로젝트만 시작 ============  -->
							<?
								if($member_row[is_company]==2){
									$pj_list=$member_row[pj_seq];
							?>
							<div style="float:left; height:28px; background-color:#F8F8F8; padding:7px 20px 0 20px; color:black;">
							<?
								$result = mysql_query("SELECT seq, pj_name FROM cms_project_info, cms_member_table WHERE pj_seq=seq ", $connect);
								$row = mysql_fetch_array($result);
								echo "<font color='#cc0000'>*</font> ".$row[pj_name]."  현장 전도금 입출내역";
							?>
							</div>
							<? } ?>
							<!--  ============ 현장 담당자일 때 담당 프로젝트만 종료 ============  -->
						</div>
						<?
							$auth_qry = "SELECT * FROM cms_member_table WHERE user_id='$_SESSION[p_id]' ";
							$auth_rlt = mysql_query($auth_qry, $connect);
							$auth_row= mysql_fetch_array($auth_rlt);

							///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
							// 이 페이지 쓰기 권한 설정하기
							$auth_level=2; // 이페이지 마스터 쓰기 권한 레벨

							if($auth_row[is_admin]==1){ $w_auth =2;
							}else if($pr_1_1_row[pr_1_1]==2){ if($auth_row[auth_level]<=$auth_level){ $w_auth =2; }else{ $w_auth =1;}}else{	$w_auth =0;}
							///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

							$class1 = $_REQUEST['class1'];
							$class2 = $_REQUEST['class2'];
							$s_date = $_REQUEST['s_date'];
							$e_date = $_REQUEST['e_date'];
							$sh_con = $_REQUEST['sh_con'];
							$sh_text = $_REQUEST['sh_text'];

							$add_where=" WHERE (cms_capital_cash_book.pj_seq = '$pj_list' AND ((in_acc=no AND class2<>7) OR (out_acc=no AND class2<>8))) ";

							if($class1){
								 if($class1==1) $add_where.=" AND class1='1' ";
								 if($class1==2) $add_where.=" AND class1='2' ";
								 if($class1==3) $add_where.=" AND class1='3' ";
							}
							if($class2) $add_where.=" AND class2='$class2' ";
							if($s_date) $add_where.=" AND deal_date>='$s_date' ";
							if($e_date) {$add_where.=" AND deal_date<='$e_date' "; $e_add=" AND deal_date<='$e_date' ";} else{$e_add="";}

							if($sh_text){
								 if($sh_con==1) $add_where.=" AND (bank like '%$sh_text%' OR name like '%$sh_text%' OR number like '%$sh_text%' OR holder like '%$sh_text%' OR note like '%$sh_text%' OR cont like '%$sh_text%' OR acc like '%$sh_text%' OR evidence like '%$sh_text%' OR cms_capital_cash_book.worker like '%$sh_text%') "; // 통합검색
								 if($sh_con==2) $add_where.=" AND cont like '%$sh_text%' "; // 적 요
								 if($sh_con==3) $add_where.=" AND acc like '%$sh_text%' "; //거래처
								 if($sh_con==4) $add_where.=" AND (in_acc like '%$sh_text%' or out_acc like '%$sh_text%') "; // 계정
								 if($sh_con==5) $add_where.=" AND evidence like '%$sh_text%' ";  //증빙서류
							}
						?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="60" height="38" class="form2" bgcolor="#e4f1d8" style="color:black;">구 분 </td>
							<td class="form2" width="180">
								<select name="class1" style="width:80px;" onChange="inoutSel_(this.form)">
									<option value="" <?if(!$class1) echo "selected";?>> 선 택
									<option value="1" <?if($class1==1) echo "selected";?>> 입 금
									<option value="2" <?if($class1==2) echo "selected";?>> 출 금
									<option value="3" <?if($class1==3) echo "selected";?>> 대 체
								</select>
								<select name="class2" style="width:80px;" onchange = "inoutSel2_(this.form)">
									<option value="" <?if(!$class2) echo "selected";?>> 선 택
									<option value="1" <?if($class2==1) echo "selected";?>> 수 익
									<option value="2" <?if($class2==2) echo "selected";?>> 차 용
									<option value="3" <?if($class2==3) echo "selected";?>> 회 수
									<option value="4" <?if($class2==4) echo "selected";?>> 비 용
									<option value="5" <?if($class2==5) echo "selected";?>> 상 환
									<option value="6" <?if($class2==6) echo "selected";?>> 대 여
									<option value="7" <?if($class2==7) echo "selected";?>> 본 사
									<option value="8" <?if($class2==8) echo "selected";?>> 현 장
								</select>
							</td>
							<td width="60" class="form2" bgcolor="#e4f1d8" style="color:black;">거래기간 </td>
							<td class="form2" colspan="2">							
							<div style="float:left;">
								<input type="text" name="s_date" id="s_date" value="<?=$s_date?>" size="12" class="inputstyle2" onclick="cal_add(this); event.cancelBubble=true"  readonly  onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')">
								<a href="javascript:" onclick="cal_add(document.getElementById('s_date'),this); event.cancelBubble=true"> <img src="http://cigiko.cafe24.com/cms/images/calendar.jpg" border="0" alt="" /></a> ~ 
							</div>
							<div style="float:left; padding-left:5px; margin-right:5px;">
								<input type="text" name="e_date" id="e_date" value="<?=$e_date?>" size="12" class="inputstyle2" onclick="cal_add(this); event.cancelBubble=true"  readonly  onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')">
								<a href="javascript:" onclick="cal_add(document.getElementById('e_date'),this); event.cancelBubble=true"> <img src="http://cigiko.cafe24.com/cms/images/calendar.jpg" border="0" alt="" /></a>
							</div>
							<a href="javascript:" onclick="term_put('s_date', 'e_date', 'd');" title="오늘"><img src="../images/to_today.jpg" border="0" alt=""></a>
							<a href="javascript:" onclick="term_put('s_date', 'e_date', 'w');" title="1주일"><img src="../images/to_week.jpg" border="0" alt=""></a>
							<a href="javascript:" onclick="term_put('s_date', 'e_date', 'm');" title="한달"><img src="../images/to_month.jpg" border="0" alt=""></a>
							<a href="javascript:" onclick="term_put('s_date', 'e_date', '3m');" title="3개월"><img src="../images/to_3month.jpg" border="0" alt=""></a>	
							<a href="javascript:" onclick=" to_del('s_date', 'e_date');" title="지우기"><img src="../images/del.jpg" border="0" alt=""></a>
							</td>
							<td class="form2">
								<select name="sh_con">
									<option value="1" <?if($sh_con==1) echo "selected";?>> 통합검색
									<option value="2" <?if($sh_con==2) echo "selected";?>> 적 요
									<option value="3" <?if($sh_con==3) echo "selected";?>> 거래처
									<option value="4" <?if($sh_con==4) echo "selected";?>> 계 정
									<option value="5" <?if($sh_con==5) echo "selected";?>> 증빙서류
								</select>
							</td>
							<td class="form2"><input type="text" name="sh_text" value="<?=$sh_text?>" size="18" class="inputstyle2" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')" onClick="this.value='' "></td>
							<td class="form2"><input type="button" value=" 검 색 " onclick="submit();" class="inputstyle11" style="height='23'; width='60';"></td>
						</tr>
						</table>
						<table><tr><td height="8"></td></tr></table>
						<table border="0" width="100%" cellspacing="0" cellpadding="0">
							<tr align="center">
								<td width="30" height="35" bgcolor="#EAEAEA" class="tb1">
									<input type="checkbox" disabled>
								</td>
								<td width="120" bgcolor="#EAEAEA" class="tb1">거래 일자</td>
								<td width="100" bgcolor="#EAEAEA" class="tb1"> 구 분</td>
								<td width="200" bgcolor="#EAEAEA" class="tb1">적 요</td>
								<td bgcolor="#EAEAEA" class="tb1">거 래 처</td>
								<td width="100" bgcolor="#EAEAEA" class="tb1">입금 금액</td>
								<td width="60" bgcolor="#EAEAEA" class="tb1">입금 계정</td>
								<td width="100" bgcolor="#EAEAEA" class="tb1">지출 금액</td>
								<td width="60" bgcolor="#EAEAEA" class="tb1">지출 계정</td>
								<td bgcolor="#EAEAEA" class="tb1">증빙 서류</td>
								<!-- <td bgcolor="#EAEAEA" class="tb1">전 표</td> -->

								<?if($w_auth>0){  //관리자와 자금담당에게만 출력 ?>
								<td width="35" bgcolor="#EAEAEA" class="tb1">수정</td>
								<td width="35" bgcolor="#EAEAEA" class="tb1">삭제</td>
								<?}?>
							</tr>
							<?
								$query="SELECT seq_num, no FROM cms_capital_cash_book, cms_capital_bank_account $add_where ";
								$result=mysql_query($query, $connect);
								$total_bnum=mysql_num_rows($result);     // 총 게시물 수   11111111111111111111
								mysql_free_result($result);

								$index_num = 10;								// 한 페이지 표시할 목록 개수 22222222222222
								$page_num = 10;								// 한 페이지에 표시할 페이지 수 33333
								if(!$start) $start = 1;							// 현재페이지 444444444
								$s = ($start-1)*$index_num;
								$e = $index_num;

								if($total_bnum==0){
							?>
							<tr>
								<td align="center" height="250" style="border-width: 0 0 1px 0; border-color:#E1E1E1; border-style: solid;" colspan="13"> 등록된 데이터가 없습니다. </td>
							</tr>
							<?
								}else{

								$query1="SELECT seq_num, class1, class2, cont, acc, in_acc, inc, out_acc, exp, evidence, worker, deal_date, name, no
										   FROM cms_capital_cash_book, cms_capital_bank_account $add_where ORDER BY deal_date desc, seq_num DESC LIMIT $s, $e";
								$result1=mysql_query($query1, $connect);

								for($i=0; $rows1=mysql_fetch_array($result1); $i++){
									 $bunho=$total_bnum-($i+$cline)+1;
									 if($rows1[class1]==1) $cla1="<font color='#0066ff'>[입금]</font>";
									 if($rows1[class1]==2) $cla1="<font color='#ff3333'>[출금]</font>";
									 if($rows1[class1]==3) $cla1="<font color='#669900'>[대체]</font>";

									 if($rows1[class2]==1) $cla2="<font color='#0066ff'>[수익]</font>";
									 if($rows1[class2]==2) $cla2="<font color='#6600ff'>[차용]</font>";
									 if($rows1[class2]==3) $cla2="<font color='#0066ff'>[회수]</font>";
									 if($rows1[class2]==4) $cla2="<font color='#ff3333'>[비용]</font>";
									 if($rows1[class2]==5) $cla2="<font color='#ff0099'>[상환]</font>";
									 if($rows1[class2]==6) $cla2="<font color='#993300'>[대여]</font>";
									 if($rows1[class2]==7) $cla2="<font color='#669900'>[본사]</font>";
									 if($rows1[class2]==8) $cla2="<font color='#009900'>[현장]</font>";

									 $cla = $cla1." - ".$cla2;


									 if($rows1[inc]==0||($rows1[class1]==3&&$rows1[out_acc]==$rows1[no])){ // (수입금이 '0' 이거나 대체거래이고, 출금계정이 은행등록계좌와 같으면,
										 $inc="-";
									 }else{
										 $inc=number_format($rows1[inc]); // 수입금
									 }
									 if($rows1[exp]==0||($rows1[class1]==3&&$rows1[in_acc]==$rows1[no])){ // 지출금이 '0' 이거나 대체거래이고 입금계정이 은행등록계좌와 같으면,
										 $exp="-";
									 }else{
										 $exp=number_format($rows1[exp]); // 지출금
									 }

									 if($rows1[acc]) {$acc=$rows1[acc];}else{$acc="-";} // 거래처정보가 없을 때

									 if($rows1[evidence]==1) $evi="증빙 없음";
									 if($rows1[evidence]==2) $evi="간이영수증";
									 if($rows1[evidence]==3) $evi="세금계산서";
									 if($rows1[evidence]==4) $evi="계산서";

									 // ???
									 if($rows1[in_acc]==0||($rows1[class1]==3&&$rows1[out_acc]==$rows1[no])){ // 입금계정정보가 없거나 대체거래이고 출금계정이 은행등록계좌와 같으면,
										 $in_acc="";
									 }else{
										 $in_acc=$rows1[name];  // 입금계정은 계좌별칭
									 }
									 if($rows1[out_acc]==0||($rows1[class1]==3&&$rows1[in_acc]==$rows1[no])){ // 출금계정정보가 없거나 대체거래이고 입금계정이 은행등록계좌와 같으면,
										 $out_acc="";
									 }else{
										 $out_acc=$rows1[name]; // 출금계정은 계좌별칭
									 }
							?>
							<tr>
								<td align="center" height="30" class="tb2"><input type="checkbox" name="seq_num[]" value="<?=$rows1[seq_num]?>"></td>
								<td align="center" height="30" class="tb2"><?=$rows1[deal_date]?></td>
								<td align="left" height="30" class="tb2"><?=$cla?></td>
								<td align="left" height="30" class="tb2"><?=$rows1[cont]?></td>
								<td align="left" height="30" class="tb2"><?=$acc?></td>
								<td align="right" height="30" class="tb2" bgcolor="#ececff" style="padding-right:10px;"><?=$inc?></td>
								<td align="center" height="30" class="tb2"><?=$in_acc?></td>
								<td align="right" height="30" class="tb2" bgcolor="#fff0f0" style="padding-right:10px;"><?=$exp?></td>
								<td align="center" height="30" class="tb2"><?=$out_acc?></td>
								<td align="center" height="30" class="tb2"><?=$evi?></td>
								<!-- <td align="center" height="30" class="tb2"></td> -->
								<?if($w_auth>0){ //쓰기 권한 있는 직원에게만 출력 ?>
								<td align="center" height="30" class="tb2">
									<?if($w_auth>1||($w_auth>0&&date('Y-m-d')==$rows1[deal_date])) { //관리자와 마스터 쓰기권한이 아니면 당일건에 대해서만 수정 삭제 가능 ?>
									<a href='javascript:'onclick="popUp('<?=$cms_url?>_capital/capital_edit.php?edit_code=<?=$rows1[seq_num]?>','capital_edit')"><?}else{?><a href="javascript:" onclick="alert('관리자가 아니면 당일 건에 대해서만 수정/삭제 가능합니다.\n\n수정 문의 : <?=$admin_tel?>');"><? } ?>
									수정</a>
								</td>
								<td align="center" height="30" class="tb2">
									<?if($w_auth>1||($w_auth>0&&date('Y-m-d')==$rows1[deal_date])) { //관리자와 마스터 쓰기권한이 아니면 당일건에 대해서만 수정 삭제 가능 ?>
									<a href="javascript:" onclick="cap_del(<?=$rows1[seq_num]?>);"><?}else{?><a href="javascript:" onclick="alert('관리자가 아니면 당일 건에 대해서만 수정/삭제 가능합니다.\n\n삭제 문의 : <?=$admin_tel?>');"><? } ?>
									삭제</a>
								</td>
								<?}?>
							</tr>
							<?
								 }
								if($result1) mysql_free_result($result1);
							?>
							<tr>
								<td height="32" align="center" colspan="13">
									<?
										$back_url="&amp;m_di=1&amp;s_di=1&amp;pj_list=$pj_list";
										page_avg($total_bnum,$page_num, $index_num,$start,$back_url);
										//1. 총게시물수 2. 한페이지 페이지수 3. 한페이지목록 수 4. 시작페이지 5. 해당 페이지 필요변수
										}
									?>
								</td>
							</tr>
							</table><table><tr><td height="8"></td></tr></table>

							<table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse; border:1px solid #D6D6D6;">
							<tr align="center">
							<?
								$cash1=" SELECT SUM(inc) AS in_total FROM cms_capital_cash_book  WHERE (pj_seq='$pj_list' AND in_acc='1' AND class2<>7) $e_add "; // 현금수입금 합계 구하기
								$ca_qry1=mysql_query( $cash1, $connect);
								$ca_row1=mysql_fetch_array($ca_qry1);
								$cash2="SELECT SUM(exp) AS out_total FROM cms_capital_cash_book  WHERE (pj_seq='$pj_list' AND out_acc='1' AND class2<>8) $e_add "; // 현금지출금 합계 구하기
								$ca_qry2=mysql_query( $cash2, $connect);
								$ca_row2=mysql_fetch_array($ca_qry2);

								$b_bal1="SELECT SUM(inc) AS in_total FROM cms_capital_cash_book  WHERE (pj_seq='$pj_list' AND in_acc>'1' AND class2<>7) $e_add   "; // 계좌수입금 합계 구하기
								$b_qry1=mysql_query($b_bal1, $connect);
								$b_row1=mysql_fetch_array($b_qry1);
								$b_bal2="SELECT SUM(exp) AS out_total FROM cms_capital_cash_book  WHERE (pj_seq='$pj_list' AND out_acc>'1' AND class2<>8) $e_add   "; // 계좌지출금 합계 구하기
								$b_qry2=mysql_query($b_bal2, $connect);
								$b_row2=mysql_fetch_array($b_qry2);

								$dept1=" SELECT SUM(inc) AS in_total FROM cms_capital_cash_book  WHERE pj_seq='$pj_list' AND class2='2' $e_add   "; // 차용금 합계 구하기
								$de_qry1=mysql_query( $dept1, $connect);
								$de_row1=mysql_fetch_array($de_qry1);
								$dept2=" SELECT SUM(exp) AS out_total FROM cms_capital_cash_book  WHERE pj_seq='$pj_list' AND class2='5'  $e_add   "; // 상환금 합계 구하기
								$de_qry2=mysql_query( $dept2, $connect);
								$de_row2=mysql_fetch_array($de_qry2);

								$loan1=" SELECT SUM(exp) AS in_total FROM cms_capital_cash_book  WHERE pj_seq='$pj_list' AND class2='6'  $e_add   "; // 대여금 합계 구하기
								$lo_qry1=mysql_query( $loan1, $connect);
								$lo_row1=mysql_fetch_array($lo_qry1);
								$loan2=" SELECT SUM(inc) AS out_total FROM cms_capital_cash_book  WHERE pj_seq='$pj_list' AND class2='3'  $e_add   "; // 회수금 합계 구하기
								$lo_qry2=mysql_query( $loan2, $connect);
								$lo_row2=mysql_fetch_array($lo_qry2);

								$cash_hand = number_format($ca_row1[in_total]-$ca_row2[out_total])." 원"; // 현금시재
								$bank_balance=number_format($b_row1[in_total]-$b_row2[out_total])." 원"; // 계좌잔고
								$dept=number_format($de_row1[in_total]-$de_row2[out_total])." 원"; // 차용금 잔고
								$loan=number_format($lo_row1[in_total]-$lo_row2[out_total])." 원"; // 대여금 잔고
								if($bank_balance==0) $bank_balance="-";
								if($cash_hand==0) $cash_hand="-";
								if($dept==0) $dept="-";
								if($loan==0) $loan="-";
							?>
								<td width="10%" bgcolor="#f0f0ff"  height="35"> 현금시재 </td>
								<td width="15%" align="right" style="padding:0 20px 0 0px;"><?=$cash_hand?></td>
								<td width="10%" bgcolor="#f0f0ff">예금잔고</td>
								<td width="15%" align="right" style="padding:0 20px 0 0px;"><a href="javascript:" onClick="popUp('bank_balance.php','bank_balance');"><?=$bank_balance;?> <font color="#ff0066"><b>+</b></font></a></td>
								<td width="10%" bgcolor="#fff0fc"> 차입금잔액 </td>
								<td width="15%" align="right" style="padding:0 20px 0 0px;"><a href="javascript:" onClick="popUp('payable_balance.php','payable_balance');"><?=$dept;?> <font color="#ff0066"><b>+</b></font></a></td>
								<td width="10%" bgcolor="#fff0fc"> 대여금잔액 </td>
								<td width="15%" align="right" style="padding:0 20px 0 0px;"><a href="javascript:" onClick="popUp('loan_balance.php','loan_balance');"><?=$loan;?> <font color="#ff0066"><b>+</b></font></a></td>
							</tr>
							</table>
							</form>
						</td>
					</tr>
					</table>
					</div>
					<? } ?>
