							<!-- 업무일지 목록 파일 -->
								<div style="height:38px; border-width:1px 0 1px 0; border-color:#D6D6D6; border-style:solid; margin:6px 0 10px 0;">
									<?
										$s_date = $_REQUEST['s_date'];
										$e_date = $_REQUEST['e_date'];
									?>
									<form name="sch_frm" method="post" action="">

									<div style="float:left; width:80px; height:28px; background-color:#f4f4f4; padding-top:10px; color:black; text-align:center;">작성일자</div>
									<div style="float:left; width:430px; height:28px; padding:9px 0px 0 5px;">
										<div style="float:left;">
											<input type="text" name="s_date" id="s_date" value="<?=$s_date?>" size="11" class="inputstyle2" onclick="cal_add(this); event.cancelBubble=true"  readonly  onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')">
											<a href="javascript:" onclick="cal_add(document.getElementById('s_date'),this); event.cancelBubble=true"> <img src="http://cigiko.cafe24.com/cms/images/calendar.jpg" alt="" /></a> ~
										</div>
										<div style="float:left; padding-left:5px; margin-right:5px;">
											<input type="text" name="e_date" id="e_date" value="<?=$e_date?>" size="11" class="inputstyle2" onclick="cal_add(this); event.cancelBubble=true"  readonly  onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')">
											<a href="javascript:" onclick="cal_add(document.getElementById('e_date'),this); event.cancelBubble=true"> <img src="http://cigiko.cafe24.com/cms/images/calendar.jpg" alt="" /></a>
										</div>
										<a href="javascript:" onclick="term_put('s_date', 'e_date', 'd');" title="오늘"><img src="../images/to_today.jpg" alt=""></a>
										<a href="javascript:" onclick="term_put('s_date', 'e_date', 'w');" title="1주일"><img src="../images/to_week.jpg" alt=""></a>
										<a href="javascript:" onclick="term_put('s_date', 'e_date', 'm');" title="한달"><img src="../images/to_month.jpg" alt=""></a>
										<a href="javascript:" onclick="term_put('s_date', 'e_date', '3m');" title="3개월"><img src="../images/to_3month.jpg" alt=""></a>
										<a href="javascript:" onclick=" to_del('s_date', 'e_date');" title="지우기"><img src="../images/del.jpg" alt=""></a>
									</div>
									<div style="float:left; width:75px; height:28px; padding:9px 0 0 15px;">
										<!-- <select name="sh_con" style="width:80px; height:21px;">
											<option value="" <?if(!$sh_con) echo "selected";?>> 통합검색
											<option value="1" <?if($sh_con=='1') echo "selected";?>> 작성자
											<option value="2" <?if($sh_con=='2') echo "selected";?>> 부서명
											<option value="3" <?if($sh_con=='3') echo "selected";?>> 담당업무
											<option value="3" <?if($sh_con=='3') echo "selected";?>> 비 고
										</select> -->
									</div>
									<div style="float:left; width:110px; height:28px; padding-top:8px; text-align:right;">
										<!-- <input type="text" name="_search" value="<?=$_search?>" size="20" class="inputstyle2" style="width:105px;" onclick="this.value='' "> -->
									</div>
									<div style="float:right; width:40px; height:28px; background-color:#F8F8F8; padding:7px 20px 0 0px; color:black;">
										<input type="button" value=" 검 색 " onclick="submit();" class="inputstyle11" style="height:24px;">
									</div>
									</form>
								</div>
								<!-- ================================= 업무일지 contents S ================================= -->
								<div style="height:336px;">
									<div style="clear: left; width:30px; text-align:center;" class="blue_title"><input type="checkbox" name="mnum_cont" disabled></div>
									<div style="width:100px; text-align:center;" class="blue_title">작성일자 </div>
									<div style="width:160px; text-align:center;" class="blue_title">현장명</div>
									<div style="width:80px; text-align:center;" class="blue_title">소속본부 </div>
									<div style="width:80px; text-align:center;" class="blue_title">소속 팀 </div>
									<div style="width:90px; text-align:center;" class="blue_title">작성자</div>
									<div style="width:228px; border-width:1px 0 1px 0; text-align:center;" class="blue_title">비 고</div>
									<?
										/*****기본 표시 목록*****/
										if($member_row[is_company]==1){ // 본사 직원일 경우
											$add_where = " WHERE 1=1 ";
											$pj_w = $headq."-".$team;
											if($pj_list) $add_where = " WHERE pj_seq='$pj_list' ";
											if($headq&&!$team) $add_where .= " AND pj_where LIKE '$headq%' ";
											if($headq&&$team) $add_where .= " AND pj_where ='$pj_w' ";

										}else{ // 현장 관계자일 경우
											if($member_row[is_company]<>1&&$member_row[pj_posi]=='1'){// 소속 본부장일 경우
												$add_where = " WHERE pj_seq='$pj_list' ";
											}else if($member_row[is_company]<>1&&$member_row[pj_posi]=='2'){// 소속 팀장일 경우
												$add_where = " WHERE pj_seq='$pj_list' AND pj_where='$member_row[pj_where]' ";
											}else if($member_row[is_company]<>1&&$member_row[pj_posi]=='3'){// 소속 팀원일 경우
												$add_where = " WHERE pj_seq='$pj_list' AND pj_where='$member_row[pj_where]' ";
											}
										}
										/*****기본 표시 목록*****/

										if($s_date) $add_where.=" AND work_date>='$s_date' ";
										if($e_date) $add_where.=" AND work_date<='$e_date' ";

										$query="SELECT seq FROM cms_work_log $add_where ";
										$result=mysql_query($query, $connect);
										$total_bnum=mysql_num_rows($result);     // 총 게시물 수   11111111111111111111
										mysql_free_result($result);
										if($total_bnum==0){
									?>
									<div style="clear:left; height:80px; text-align:center; padding-top:50px; margin-bottom:10px;">등록된 데이터가 없습니다.</div>
									<?
									}else{
										$start=$_REQUEST['start'];
										$index_num = 10;								// 한 페이지 표시할 목록 개수 22222222222222
										$page_num = 10;								// 한 페이지에 표시할 페이지 수 33333
										if(!$start) $start = 1;							// 현재페이지 444444444
										$s = ($start-1)*$index_num;
										$e = $index_num;

										$query = "SELECT seq, work_date, pj_seq, pj_where, writer, d_sale_act FROM cms_work_log $add_where ORDER BY work_date DESC LIMIT $s, $e";
										$result = mysql_query($query, $connect);
										while($rows = mysql_fetch_array($result)){
											$pj_where = explode("-", $rows[pj_where]);
											$qry = "SELECT pj_name, headq, team, name FROM cms_project_info, cms_resource_headq, cms_resource_team, cms_member_table WHERE cms_project_info.seq='$rows[pj_seq]' AND cms_resource_headq.seq='$pj_where[0]' AND cms_resource_team.seq='$pj_where[1]' AND user_id='$rows[writer]' ";
											$rlt = mysql_query($qry, $connect);
											$dt_row = mysql_fetch_array($rlt);
									?>
									<div style="clear:left; width:30px; border-width:0 1px 1px 0; text-align:center;" class="bor_ddd"><input type="checkbox" name="seq[]" value="<?$rows[seq]?>"></div>
									<div style="width:100px; border-width:0 1px 1px 0; text-align:center;" class="bor_ddd">
										<a href="sales_main.php?m_di=1&amp;s_di=2&amp;ss_di=3&amp;pj_list=<?=trim($rows[pj_seq])?>&amp;headq=<?=trim($pj_where[0])?>&amp;team=<?=trim($pj_where[1])?>&amp;seq=<?=trim($rows[seq])?>" class="no_auth"><?=$rows[work_date]?></a><!-- 작성일자 -->
									</div>
									<div style="width:160px; border-width:0 0 1px 0; text-align:center;" class="bor_ddd"><?=$dt_row[pj_name]?></div><!-- 현장명 -->
									<div style="width:80px; border-width:0 0 1px 1px; text-align:center;" class="bor_ddd"><?=$dt_row[headq]?></div><!-- 소속본부 -->
									<div style="width:80px; border-width:0 0 1px 1px; text-align:center;" class="bor_ddd"><?=$dt_row[team]?></div><!-- 소속 팀 -->
									<div style="width:90px; border-width:0 0 1px 1px; text-align:center;" class="bor_ddd"><?=$dt_row[name]?></div><!-- 작성자 -->
									<div style="width:218px; padding:6px 0 0 10px; border-width:0 0 1px 1px; " class="bor_ddd"><?=rg_cut_string($rows[d_sale_act], 20, "..")?></div><!-- 비 고 -->
									<?
											}
										}
									?>
								</div>
								<div style="height:35px; padding-top:20px; text-align:center;">
									<?
										if($total_bnum>$index_num){
											echo "<span>";
											$back_url=htmlspecialchars("&m_di=1&s_di=2&pj_list=$pj_list&headq=$headq&team=$team&s_date=$s_date&e_date=$e_date");
											page_avg($total_bnum, $page_num, $index_num, $start, $back_url);
											//1. 총게시물수 2. 한페이지 페이지수 3. 한페이지목록 수 4. 시작페이지 5. 해당페이지 필요변수
											echo "</span>";
										}
									?>
								</div>
								<!-- ================================= 업무일지 contents E ================================= -->
								<?
									if($sa_1_2_row[sa_1_2]<2){
										$submit_str="alert('등록 권한이 없습니다. 관리자에게 문의하여 주십시요!')";
										$del_str="alert('삭제 권한이 없습니다. 관리자에게 문의하여 주십시요!')";
									}else{
										$submit_str=htmlspecialchars("location.href='$_SERVER[PHP_SELF]?m_di=1&s_di=2&ss_di=2&mode=reg' ");
										$del_str="alert('준비중..! 현재 해당 부서에 대한 수정 화면에서 개별 삭제처리만 가능합니다.')";
									}
								?>
							<div style="float:left; height:30px; width:605px; padding:8px 0 0 10px; border-width:1px 0 0 0; border-style:solid; border-color:#dddddd;"><input type="button" value="신규 등록" onclick="<?=$submit_str?>"></div>
							<div style="float:right; height:30px; width:150px; padding:8px 10px 0 0; border-width:1px 0 0 0; border-style:solid; border-color:#dddddd; text-align:right;"><!-- <input type="button" value="선택 삭제" onclick="<?=$del_str?>"> --></div>