					<!-- ============================= subject table end ============================= -->
					<div style=" height:18px; background-color:#F8F8F8" class="d3_sub">
						<b><font size="2" color="#cc0099">◈</font><font size="2" color="#6666cc"> 현장별 계약현황</font></b>
						<div style="float:right;">
							<!-- <font color="red">*</font> 필수 항목은 반드시 입력하시기 바랍니다. -->
						</div>
					</div>
					<!-- ============================= subject table end ============================= -->
					<?
						$sa_2_3_rlt = mysql_query("select sa_2_3 from cms_mem_auth where user_id='$_SESSION[p_id]' ", $connect);
						$sa_2_3_row = mysql_fetch_array($sa_2_3_rlt);

						if(!$sa_2_3_row[sa_2_3]||$sa_2_3_row[sa_2_3]==0){
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
					<?
						}else{
							$auth_qry = "SELECT * FROM cms_member_table WHERE user_id='$_SESSION[p_id]' ";
							$auth_rlt = mysql_query($auth_qry, $connect);
							$auth_row= mysql_fetch_array($auth_rlt);

							// 이 페이지 쓰기 권한 설정하기
							$auth_level=2; // 이페이지 마스터 쓰기 권한 레벨

							if($auth_row[is_admin]==1){ $w_auth =2; }else if($sa_2_3_row[sa_2_3]==2){ if($auth_row[auth_level]<=$auth_level){ $w_auth =2; }else{ $w_auth =1;}}else{	$w_auth =0;}
							// w_auth = 0 > 쓰기 권한 없음 // w_auth = 1 > 실무자 쓰기 권한 // w_auth = 2 > 마스터 쓰기 권한
					?>
					<div style="display:inline;">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td height="580" valign="top">
						<form method="post" action="<?=$_SERVER['PHP_SELF']?>"><!-- ==================================== 폼 시작 ===================================== -->
						<input type="hidden" name="m_di" value="<?=$m_di?>">
						<input type="hidden" name="s_di" value="<?=$s_di?>">
						<div style="height:18px; text-align:right; padding:0 20px 2px 0; margin-top:10px;">
							<!-- <a href="javascript:" onClick="excel_pop('<?=$sa_2_1_row[sa_2_1]?>',1);"><img src="../images/excel_icon.jpg" height="10" border="0" alt="" /> EXCEL로 출력</a> -->
						</div>
						<div style="height:35px; border-width:1px 0 1px 0; border-color:#D6D6D6; border-style:solid;">
							<!-- ============ 본사 직원일 때 프로젝트 선택 가능 시작 ============  -->
							<?
								if($member_row[is_company]==1){
								$pj_rlt = mysql_query("SELECT seq FROM cms_project_info ORDER BY seq DESC LIMIT 1", $connect);
								$pj_row = mysql_fetch_array($pj_rlt);
								$year_frm=$_REQUEST['year_frm'];
								$pj_list=$_REQUEST['pj_list'];
							?>
							<div style="float:left;  width:120px; height:28px; padding-top:7px; background-color:#F4F4F4; text-align:center; color:#000000;">년도 별</div>
							<div style="float:left; width:238px; height:28px; padding:7px 0 0 22px;">
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
							<div style="float:left;  width:120px; height:28px; padding-top:7px; background-color:#F4F4F4; text-align:center; color:#000000;">프로젝트</div>
							<div style="float:left; width:238px; height:28px; padding:7px 0 0 22px;">
								<select name="pj_list" onchange="submit();" class="inputstyle2" style="height:22px; width:150px;"><!-- ==================================== 프로젝트 리스트 ===================================== -->
									<option value=""<?if(!$pj_list) echo "selected"?>> 선 택
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
									$where = explode("-", $member_row[pj_where]);
									$headq = $where[0];
									$team = $where[1];
							?>
							<div style="float:left; width:120px; height:26px; padding-top:9px; color:black; text-align:center; background-color:#F4F4F4;">
								<font color='#cc0000'>*</font> 프로젝트 명
							<?
								$result = mysql_query("SELECT seq, pj_name FROM cms_project_info, cms_member_table WHERE seq=pj_seq AND user_id='$_SESSION[p_id]' ", $connect);
								$row = mysql_fetch_array($result);
							?>
							</div>
							<div style="float:left; width:260px; height:26px; padding:9px 0px 0 0px; text-align:center;"><? echo "<font color='#cc0000'>*</font> <b>".$row[pj_name]."</b>";?></div>	
							<div style="float:left; width:120px; height:26px; padding-top:9px; color:black; text-align:center; background-color:#F4F4F4;">소 속</div>
							<?
								$w_rlt = mysql_query("SELECT headq, team FROM cms_resource_headq, cms_resource_team WHERE cms_resource_headq.seq='$headq' AND cms_resource_team.seq='$team' ", $connect);
								$w_row = mysql_fetch_array($w_rlt);
							?>
							<div style="float:left; width:160px; height:26px; padding:9px 0px 0 0px; text-align:center;"><?=$w_row[headq]?> <font color="#0066ff">▶</font> <?=$w_row[team]?></div>
							<div style="float:left; width:128px; height:26px; padding-top:9px; color:black; text-align:center; background-color:#F4F4F4;">담당자</div>
							<div style="float:left; height:26px; padding:9px 20px 0 20px;"><font color="#003399"><b><?=$_SESSION['p_name']?></b></font><? $writer = $_SESSION['p_id']; ?></div>
							<? } ?>
							<!--  ============ 현장 담당자일 때 담당 프로젝트만 종료 ============  -->
						</div>
						<?
							if(!$pj_list){ $pj_list=$member_row[pj_seq];} // 프로젝트 리스트의 값 [현장 seq 넘버] 가 없으면, 즉 현장 관계자일 때는 담당 현장 프로젝트 seq 넘버 설정
							$pos_con_= $_REQUEST['pos_con_'];
							$dong_data_ =  $_REQUEST['dong_data_'];
							$type_data_ =  $_REQUEST['type_data_'];
							$list_limit = $_REQUEST['list_limit'];
							$s_date = $_REQUEST['s_date'];
							$e_date = $_REQUEST['e_date'];
						?>
						<div style="height:28px; margin-top:15px; padding:3px 15px 0 0; border-width:0 0 1px 0; border-color:#ccc; border-style:solid;">
							<div style="float:left; padding-left:10px;">
								<span style="background-color:#6666cc; padding:3px 10px 3px 10px;"><b><font color="#ffffff">1. 요 약</font></b></span>
							</div>
						</div>
						<?
							if(!$pj_list){
						?>
						<div style="height:50px; text-align:center; padding-top:30px;">
							조회할 프로젝트를 선택하여 주십시요!
						</div>
						<? }else{?>
						<div style="height:24px; border-width:0 0 1px 0; border-color:#ccc; border-style:solid; background-color:#F4F4F4; padding-top:4px; text-align:center;">
							<div style="float:left; width:200px;">프로젝트명</div>
							<div style="float:left; width:116px;">구분(타입)</div>
							<div style="float:left; width:126px;">전체 세대수</div>
							<div style="float:left; width:100px;">분양 세대수</div>
							<div style="float:left; width:126px;">청약 현황</div>
							<div style="float:left; width:126px;">계약 현황</div>
							<div style="float:left; width:126px;">계 약 율</div>
							<div style="float:left; width:126px;">분양율(청약+계약)</div>
						</div>
						<?
							$result=mysql_query("SELECT pj_name FROM cms_project_info WHERE seq='$pj_list' ", $connect);
							$row=mysql_fetch_array($result);

							$color_rlt = mysql_query("SELECT type_info, color_type FROM cms_project_info WHERE seq='$pj_list'", $connect); /// 타입별 컬러 구분
							$color_row = mysql_fetch_array($color_rlt);
							// 타입별 칼라 지정
							$type_info = explode("-", $color_row[type_info]);
							$type_color = explode("-", $color_row[color_type]);
							///////////////////////////////////////////////////////////////////////
							for($i=0; $i<count($type_info); $i++){
								$color[$type_info[$i]]=$type_color[$i];
							}
							///////////////////////////////////////////////////////////////////////
						?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<div style="float:left; width:199px; height:24px; padding-top:4px;text-align:center;"><?=$row[pj_name]?></div>
							</td>
							<td>
							<div style="float:left;">
								<?
									$query = "SELECT type_ho FROM cms_project_data WHERE pj_seq = '$pj_list' GROUP BY type_ho ORDER BY type_ho";
									$result = mysql_query($query, $connect);
									while($rows = mysql_fetch_array($result)){
										$sub_qry = "SELECT COUNT(*) AS sedae, SUM(is_except) AS is_except, SUM(is_pro_cont) AS pro_cont, SUM(is_contract) AS contract
														FROM cms_project_data
														WHERE pj_seq = '$pj_list' AND type_ho = '$rows[type_ho]' ";
										$sub_rlt = mysql_query($sub_qry, $connect);
										$sub_row = mysql_fetch_array($sub_rlt);
										$sale_num = $sub_row[sedae]-$sub_row[is_except];
										if($sale_num==0){
											$rate_con = 0; // 타입별 계약율
											$rete_plus = 0; //타입별 분양율
										}else{
											$rate_con = $sub_row[contract]/$sale_num*100; // 타입별 계약율
											$rete_plus = ($sub_row[pro_cont]+$sub_row[contract])/$sale_num*100; //타입별 분양율
										}
								?>
								<div style="height:28px; text-align:right;">
									<div style="float:left; width:77px; height:24px; padding:4px 0 0 38px; border-width:0 1px 1px 1px; text-align:left;" class="form3"><span style="padding:0 5px 0 5px;  background-color:<?=$color[$rows[type_ho]]?>; margin-right:10px;">&nbsp;</span><?=$rows[type_ho]?></div>
									<div style="float:left; width:105px; height:24px; padding:4px 20px 0 0;" class="form3"><?=number_format($sub_row[sedae])."세대"?></div>
									<div style="float:left; width:80px; height:24px; padding:4px 20px 0 0; background-color:#ecf2ff; color:#003366;" class="form3"><?=number_format($sale_num)."세대"?></div>
									<div style="float:left; width:105px; height:24px; padding:4px 20px 0 0;" class="form3"><?=number_format($sub_row[pro_cont])."건"?></div>
									<div style="float:left; width:105px; height:24px; padding:4px 20px 0 0;" class="form3"><?=number_format($sub_row[contract])."건"?></div>
									<div style="float:left; width:105px; height:24px; padding:4px 20px 0 0;" class="form3"><?=number_format($rate_con, 2)."%"?></div>
									<div style="float:left; width:106px; height:24px; padding:4px 20px 0 0; border-width:0 0 1px 0;" class="form3"><?=number_format($rete_plus, 2)."%"?></div>
								</div>
								<? } ?>
							</div>
							</td>
						</tr>
						</table>
						<?
							$tot_qry = "SELECT COUNT(*) AS sedae, SUM(is_except) AS is_except, SUM(is_pro_cont) AS pro_con, SUM(is_contract) AS contract
											FROM cms_project_data WHERE pj_seq = '$pj_list' ";
							$tot_rlt = mysql_query($tot_qry, $connect);
							$tot_row = mysql_fetch_array($tot_rlt);
							$tot_sale_num = $tot_row[sedae]-$tot_row[is_except];
							if($tot_row[pro_con]==0) $rate_pro=0; else $rate_pro= $tot_row[pro_con]/$tot_sale_num*100;          // 총 청약수
							if($tot_row[contract]==0) $rate_con=0; else $rate_con= $tot_row[contract]/$tot_sale_num*100;         // 총 계약수
						?>
						<div style="clear:left; height:28px; text-align:right; background-color:#f8f8f8;">
							<div style="float:left; width:199px; height:24px; padding-top:4px; border-width:1px 1px 0 0; text-align:center;" class="form3">합 계</div>
							<div style="float:left; width:95px; height:24px; padding:4px 20px 0 0; border-width:0 1px 0 0; color:#003366;" class="form3"></div>
							<div style="float:left; width:105px; height:24px; padding:4px 20px 0 0; border-width:0 1px 0 0; color:#003366;" class="form3"><?=$tot_row[sedae]."세대"?></div>
							<div style="float:left; width:80px; height:24px; padding:4px 20px 0 0; border-width:0 1px 0 0; color:#003366;" class="form3"><?=$tot_sale_num."세대"?></div>
							<div style="float:left; width:105px; height:24px; padding:4px 20px 0 0; border-width:0 1px 0 0; color:#003366;" class="form3"><?=$tot_row[pro_con]."건"?></div>
							<div style="float:left; width:105px; height:24px; padding:4px 20px 0 0; border-width:0 1px 0 0; color:#003366;" class="form3"><?=$tot_row[contract]."건"?></div>
							<div style="float:left; width:105px; height:24px; padding:4px 20px 0 0; border-width:0 1px 0 0; color:#003366;" class="form3"><?=number_format($rate_con,2)."%"?></div>
							<div style="float:left; width:106px; height:24px; padding:4px 20px 0 0; color:#003366;"><?=number_format($rate_pro+$rate_con,2)."%"?></div>
						</div>
						<? } ?>
						<div style="height:28px; padding:18px 0 0 0; border-width:1px 0 0 0; border-color:#ccc; border-style:solid;">
							<div style="float:left; padding-left:10px;">
								<span style="background-color:#993366; padding:3px 10px 3px 10px;"><b><font color="#ffffff">2. 계약현황</font></b></span>
							</div>
							<?
								$where = " WHERE pj_seq = '$pj_list' ";
								if($type_data_) $where.= " AND type_ho = '$type_data_' ";
								if($dong_data_) $where.= " AND pj_dong = '$dong_data_' ";
								if($pos_con_==1) $where.=" AND (is_pro_cont = '0' AND is_contract ='0') ";
								if(!$pos_con_||$pos_con_==2) {
									$where.=" AND (is_pro_cont = '1' OR is_contract = '1') ";
									if($s_date) $where.=" AND (pro_cont_date>='$s_date' OR cont_date>='$s_date') ";
									if($e_date) $where.=" AND (pro_cont_date<='$e_date' OR cont_date<='$e_date') ";
								}
								if($pos_con_==3) {
									$where.=" AND (is_pro_cont = '1' AND is_contract ='0') ";
									if($s_date) $where.=" AND pro_cont_date>='$s_date' ";
									if($e_date) $where.=" AND pro_cont_date<='$e_date' ";
								}
								if($pos_con_==4) {
									$where.=" AND (is_pro_cont = '0' AND is_contract ='1') ";
									if($s_date) $where.=" AND cont_date>='$s_date' ";
									if($e_date) $where.=" AND cont_date<='$e_date' ";
								}

								if($pos_con_=='all') $where.="";
								if($pos_con_=='all'||$pos_con_==1){
									$orderby = ' pj_dong, pj_ho ';
								}else{
									$orderby=' cont_date DESC, pro_cont_date DESC ';
								}
								if($list_limit=='all') {
									$limit_qry = "";
								} else if(!$list_limit){
									$limit_qry = " LIMIT 30 ";
								}else{
									$limit_qry = " LIMIT $list_limit ";
								}
								$query1 = "SELECT pj_dong, pj_ho, type_ho, is_except, pro_contractor, is_pro_cont, pro_cont_tel_1, pro_cont_tel_2,
													pro_cont_date, pro_draufgabe, pro_due_date, is_contract, contractor, cont_tel_1, cont_tel_2,
													cont_date, draufgabe, cont_mgm_who, cont_mgm_tel, cont_mgm_sum, cont_worker, worker_where
										  FROM cms_project_data
									     $where ORDER BY $orderby $limit_qry ";

								$result1 = mysql_query($query1, $connect);
								$data_num=mysql_num_rows($result1);

								/////////////////////////////////////////////////EXCEL 출력 소스
								if($sa_2_3_row[sa_2_3]<1){
									$excel_pop = "alert('출력 권한이 없습니다!');";
								}else{
									$url_where = urlencode($where);
									$excel_pop = "location.href='excel_contract_list.php?pj_seq=$pj_list&amp;where=$url_where&amp;limit=$limit_qry' ";
									//$excel_pop = "alert('파일 준비중!');";
								}
								///////////////////////////////////////////////////////////////////
							?>
							<div style="float:right; padding-right:10px;">
								<a href="javascript:" onClick="<?=$excel_pop?>"><img src="../images/excel_icon.jpg" height="10" border="0" alt="" /> EXCEL 출력</a>
							</div>
							<div style="float:right; padding-right:10px;">
								<input type="button" value=" 검 색 " onclick="submit();" class="inputstyle_bt">
							</div>
							<div style="float:right; padding-right:10px;">
								
								<input type="text" name="e_date" id="e_date" value="<?=$e_date?>" size="12" class="inputstyle2" onclick="cal_add(this); event.cancelBubble=true"  readonly  onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')">
								<a href="javascript:" onclick="cal_add(document.getElementById('e_date'),this); event.cancelBubble=true"> <img src="http://cigiko.cafe24.com/cms/images/calendar.jpg" border="0" alt="" /></a>
								<a href="javascript:" onclick=" to_del('s_date', 'e_date');" title="지우기"><img src="../images/del.jpg" border="0" alt=""></a>
							</div>
							<div style="float:right; padding-right:5px;">
								<input type="text" name="s_date" id="s_date" value="<?=$s_date?>" size="12" class="inputstyle2" onclick="cal_add(this); event.cancelBubble=true"  readonly  onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')">
								<a href="javascript:" onclick="cal_add(document.getElementById('s_date'),this); event.cancelBubble=true"> <img src="http://cigiko.cafe24.com/cms/images/calendar.jpg" border="0" alt="" /></a> ~ 
							</div>
							<div style="float:right; padding-right:10px;">
								<select name="pos_con_" style="width:70px;">
									<option value="all" <?if($pos_con_=='all') echo 'selected';?>> 전 체
									<option value="1" <?if($pos_con_==1) echo 'selected';?>> 미계약
									<option value="2" <?if(!$pos_con_||$pos_con_==2) echo 'selected';?>> 청약+계약
									<option value="3" <?if($pos_con_==3) echo 'selected';?>> 청 약
									<option value="4" <?if($pos_con_==4) echo 'selected';?>> 계 약
								</select>
							</div>
							<div style="float:right; padding:0 10px; 0 10px;">
								<b>계약여부</b> :
							</div>
							<div style="float:right;">
								<select name="dong_data_" style="width:70px;">
									<option value="" selected> 선 택
									<?
										if(!$type_data_||$type_data_==0) {
											$type_sel_qry = "";
										} else {
											$type_sel_qry = " AND type_ho = '$type_data_' ";
										}
										$query = "SELECT pj_dong FROM cms_project_data WHERE pj_seq = '$pj_list' $type_sel_qry GROUP BY pj_dong";
										$result = mysql_query($query, $connect) or die (mysql_error());
										while($rows = mysql_fetch_array($result)){
									?>
									<option value="<?=$rows[pj_dong]?>" <?if($dong_data_==$rows[pj_dong]) echo "selected";?>> <?=$rows[pj_dong]?>
									<? } ?>
								</select>
							</div>
							<div style="float:right; padding:0 10px; 0 15px;">
								<b>동 별</b> :
							</div>
							<div style="float:right;">
								<select name="type_data_" style="width:70px;" onchange="submit();">
									<option value="" selected> 선 택
									<?
										$query = "SELECT type_ho FROM cms_project_data WHERE pj_seq = '$pj_list' GROUP BY type_ho ORDER BY type_ho";
										$result = mysql_query($query, $connect);
										while($rows = mysql_fetch_array($result)){
									?>
									<option value="<?=$rows[type_ho]?>" <?if($type_data_==$rows[type_ho]) echo "selected";?>> <?=$rows[type_ho]?>
									<? } ?>
								</select>
							</div>
							<div style="float:right; padding-right:10px;">
								<b>타입별</b> :
							</div>
							<div style="float:right; padding-right:10px;">
								<select name="list_limit" style="width:70px;" onchange="submit();">
									<option value="all" <?if($list_limit=='all') echo 'selected';?>> 전 체
									<option value="30"  <?if(!$list_limit||$list_limit=='30')echo 'selected';?>>30 개
									<option value="50" <?if($list_limit=='50') echo "selected";?>>50 개
									<option value="100" <?if($list_limit=='100') echo 'selected';?>>100 개
								</select>
							</div>
							<div style="float:right; padding-right:10px;">
								<b>표시 개수</b> :
							</div>
						</div>
						<div style="height:25px; border-width:1px 0 1px; border-color:#ccc; border-style:solid; background-color:#f4f4f4; text-align:center; padding-top:5px;">
							<div style="float:left; width:41px;">동</div>
							<div style="float:left; width:46px;">호수</div>
							<div style="float:left; width:41px;">타입</div>
							<div style="float:left; width:56px;">계약자</div>
							<div style="float:left; width:91px;">연락처1</div>
							<div style="float:left; width:91px;">연락처2</div>
							<div style="float:left; width:81px;">청약일</div>
							<div style="float:left; width:81px;">청약금</div>
							<div style="float:left; width:81px;">계약 예정일</div>
							<div style="float:left; width:81px;">계약일</div>
							<div style="float:left; width:86px;">계약금</div>
							<div style="float:left; width:153px;">MGM</div>
							<div style="float:left; width:88px;">담당자</div>
							<?if($w_auth>0){?>
							<div style="float:left; width:31px;">수정</div>
							<? } ?>
						</div>
						<?
							if($data_num==0){
						?>
						<div style="clear:left; height:110px; text-align:center; padding-top:70px;">
							등록된 해당 데이터가 없습니다.
						</div>
						<?
							}
							for($i=0; $rows1 = mysql_fetch_array($result1); $i++){
								if($rows1[is_except]==1) { // 기분양 세대인 경우
									$bgcolor=" background-color:#d1d1d1; ";
								}else if($rows1[is_contract]==1) { // 계약상태 물건인 경우
									$bgcolor=" background-color:#ffdd77; ";
									$a=2;
								}else if($rows1[is_pro_cont]==1){ // 청약상태 물건인 경우
									$bgcolor=" background-color:#ffffb5; ";
								}else{ // 미계약 상태인 경우
									$bgcolor="";
								}
								$w_where = explode("-", $rows1[worker_where]);
						?>
						<div style="clear:left; height:24px; text-align:center; <?=$bgcolor?>">
							<div style="clear:left; float:left; width:40px; height:22px; padding-top:2px; background-color:<?=$color[$rows1[type_ho]]?>;" class="form3">
								<?=$rows1[pj_dong]?> <!-- 동 -->
							</div>
							<div style="float:left; width:45px; height:22px; padding-top:2px;  background-color:<?=$color[$rows1[type_ho]]?>;" class="form3">
								<?=$rows1[pj_ho]?> <!-- 호 -->
							</div>
							<div style="float:left; width:40px; height:22px; padding-top:2px;  background-color:<?=$color[$rows1[type_ho]]?>;" class="form3">
								<?=$rows1[type_ho]?> <!-- 타입 -->
							</div>
							<div style="float:left; width:55px; height:22px; padding-top:2px;" class="form3">
								<?if($rows1[is_except]==1) echo "기분양분"; if($rows1[is_contract]==1) echo $rows1[contractor]; else echo $rows1[pro_contractor];?><!-- 계약자 -->
							</div>
							<div style="float:left; width:90px; height:22px; padding-top:2px;" class="form3">
								<?if($rows1[is_contract]==1) echo $rows1[cont_tel_1]; else echo $rows1[pro_cont_tel_1];?><!-- 연락처1 -->
							</div>
							<div style="float:left; width:90px; height:22px; padding-top:2px;" class="form3">
								<?if($rows1[is_contract]==1) echo $rows1[cont_tel_2]; else echo $rows1[pro_cont_tel_2];?><!-- 연락처2 -->
							</div>
							<div style="float:left; width:80px; height:22px; padding-top:2px;" class="form3">
								<?if($rows1[pro_cont_date]>0)echo $rows1[pro_cont_date];?><!-- 청약일 -->
							</div>
							<div style="float:left; width:70px; height:22px; padding-top:2px; text-align:right; padding-right:10px;" class="form3">
								<?if($rows1[pro_draufgabe]>0)echo number_format($rows1[pro_draufgabe]);?><!-- 청약금 -->
							</div>
							<div style="float:left; width:80px; height:22px; padding-top:2px;" class="form3">
								<?if($rows1[pro_due_date]>0)echo $rows1[pro_due_date];?><!-- 계약 예정일 -->
							</div>
							<div style="float:left; width:80px; height:22px; padding-top:2px;" class="form3">
								<?if($rows1[cont_date]>0)echo $rows1[cont_date];?><!-- 계약일 -->
							</div>
							<div style="float:left; width:75px; height:22px; padding:2px 10px 0 0; text-align:right;" class="form3">
								<?if($rows1[draufgabe]>0)echo number_format($rows1[draufgabe]);?><!--계약금 -->
							</div>
							<div style="float:left; width:79px; height:22px; padding-top:2px;" class="form3">
								<?="<a href='#;' title='$rows1[cont_mgm_tel]'>".$rows1[cont_mgm_who]."</a>"?><!-- MGM to -->
							</div>
							<div style="float:left; width:65px; height:22px; padding:2px 10px 0 0; text-align:right;" class="form3">
								<?if($rows1[cont_mgm_sum]) echo number_format($rows1[cont_mgm_sum])?><!-- MGM sum -->
							</div>
							<div style="float:left; width:29px; height:22px; padding-top:2px;" class="form3">
								<?=$w_where[1]?><!-- 소속 -->
							</div>
							<div style="float:left; width:54px; height:22px; padding-top:2px;" class="form3">
								<?=$rows1[cont_worker]?><!-- 담당자 -->
							</div>
							<?if($w_auth>0){?>
							<div style="float:left; width:30px; height:22px; padding-top:2px; border-width:0 0 1px 0; border-style=solid;" class="form3">
								<?if($w_auth>1||($w_auth>0&&date('Y-m-d')==$rows1[cont_date])) { //관리자와 마스터 쓰기권한이 아니면 당일건에 대해서만 수정 가능 ?>
								<a href="sales_main.php?m_di=2&amp;s_di=2&amp;pj_list=<?=$pj_list?>&amp;type=<?=$rows1[type_ho]?>&amp;dong=<?=$rows1[pj_dong]?>&amp;ho=<?=$rows1[pj_ho]?>&amp;mode=modi&amp;cont_sort2=<?=$a?>">
								<?}else{?><a href="javascript:" onclick="alert('관리자가 아니면 당일 건에 대해서만 수정 가능합니다.\n\n수정 문의 : <?=$admin_tel?>');"><? } ?>수정</a><!-- 수정 -->
							</div>
							<? } ?>

						</div>
						<? }
							mysql_free_result($result1);
						?>
						</form>
						</td>
					</tr>
					</table>
					</div>
					<? } ?>
