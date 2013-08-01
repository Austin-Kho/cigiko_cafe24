					<!-- ============================= subject table end ============================= -->
					<div style=" height:18px; background-color:#F4F4F4" class="d3_sub">
						<b><font size="2" color="#cc0099">◈</font><font size="2" color="#6666cc"> 현장별 계약등록</font></b>
						<div style="float:right;">
							<font color="red">*</font> 필수 항목은 반드시 입력하시기 바랍니다.
						</div>
					</div>
					<!-- ============================= subject table end ============================= -->
					<?
						$sa_2_2_rlt = mysql_query("select sa_2_2 from cms_mem_auth where user_id='$_SESSION[p_id]' ", $connect);
						$sa_2_2_row = mysql_fetch_array($sa_2_2_rlt);

						if(!$sa_2_2_row[sa_2_2]||$sa_2_2_row[sa_2_2]==0){
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
						<td height="570" valign="top">
						<div style="height:18px; text-align:right; padding:0 20px 2px 0; margin-top:10px;">
							<!-- <a href="javascript:" onClick="excel_pop('<?=$sa_2_1_row[sa_2_1]?>',1);"><img src="../images/excel_icon.jpg" height="10" border="0" alt="" /> EXCEL로 출력</a> -->
						</div>


						<form method="post" name="set1" action="">
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
							$cont_sort1 = $_REQUEST['cont_sort1'];
							$cont_sort2 = $_REQUEST['cont_sort2'];
							$cont_sort3 = $_REQUEST['cont_sort3'];
							$type = $_REQUEST['type'];
							$dong = $_REQUEST['dong'];
							$ho = $_REQUEST['ho'];
							$mode=$_REQUEST['mode'];
						?>
						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#D6D6D6;">
							<div style="float:left;  width:120px; height:28px; padding-top:7px; background-color:#F4F4F4; text-align:center; color:#000000;">거래구분</div>

							<div style="float:left;  width:110px; height:26px; padding:9px 0 0 15px;; text-align:center;">
								<input type="radio" name="cont_sort1" value="1" <?if(!$cont_sort1||$cont_sort1==1) echo "checked";?> onclick="submit();"> 계약 <!-- 온클릭일 때 다음 셀렉트바 값 변경 -->
								<input type="radio" name="cont_sort1" value="2" <?if($cont_sort1==2) echo "checked";?> onclick="submit();"> 해지 <!-- 온클릭일 때 다음 셀렉트바 값 변경 -->
							</div>
							<div style="float:left;  width:130px; height:28px; padding-top:7px; text-align:center; <?if($cont_sort1==2) echo "display:none;";?>">
								<select name="cont_sort2" class="inputstyle2" style="height:22px; width:100px;" onchange="submit();"><!-- 온 체인지일때 DB 변수 적용 // 계약 가능리스트 또는 해지 가능리스트 불러옴 -->
									<option value="" <?if(!$cont_sort2) echo "selected"; ?>> 선 택
									<option value="1" <?if($cont_sort2==1) echo "selected"; ?>> 청약(가계약)
									<option value="2" <?if($cont_sort2==2) echo "selected"; ?>> 계약(정계약)
								</select>
							</div>
							<div style="float:left;  width:130px; height:28px; padding-top:7px; text-align:center;  <?if(!$cont_sort1||$cont_sort1==1) echo "display:none;";?>">
								<select name="cont_sort3" class="inputstyle2" style="height:22px; width:100px;" onchange="submit();"><!-- 온 체인지일때 DB 변수 적용 // 계약 가능리스트 또는 해지 가능리스트 불러옴 -->
									<option value="" <?if(!$cont_sort3) echo "selected"; ?>> 선 택
									<option value="3" <?if($cont_sort3==3) echo "selected"; ?>> 청약 해지
									<option value="4" <?if($cont_sort3==4) echo "selected"; ?>> 계약 해지
								</select>
							</div>
						</div>
						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#D6D6D6;">
							<div style="float:left;  width:120px; height:28px; padding-top:7px; background-color:#F4F4F4; text-align:center; color:#000000;">타입선택</div>
							<div style="float:left; width:238px; height:28px; padding:7px 0 0 22px;">
								<select name="type" class="inputstyle2" style="height:22px; width:100px;" onchange="submit();">
									<option value="" <?if(!$type) echo 'selected'?>> 선 택
									<?
										$where_add = " WHERE pj_seq='$pj_list' ";
										if(!$mode&&$cont_sort1==1&&($cont_sort2==1)) $where_add .= " AND is_pro_cont='0' AND is_contract='0' ";
										if(!$mode&&$cont_sort1==1&&($cont_sort2==2)) $where_add .= " AND is_contract='0' ";
										if($cont_sort1==2&&$cont_sort3==3) $where_add .= " AND is_pro_cont='1' ";
										if($cont_sort1==2&&$cont_sort3==4) $where_add .= " AND is_contract='1' ";
										$type_qry = "SELECT type_ho FROM cms_project_data $where_add GROUP BY type_ho ORDER BY type_ho ";
										$type_rlt = mysql_query($type_qry, $connect);
										while($type_rows = mysql_fetch_array($type_rlt)){
									?>
									<option value="<?=$type_rows[type_ho]?>" <?if($type==$type_rows[type_ho]) echo 'selected'?>><?=$type_rows[type_ho]?>
									<? } ?>
								</select>
							</div>
							<div style="float:left; width:120px; height:26px; padding-top:9px; color:black; text-align:center; background-color:#F4F4F4;">동 선택</div>
							<div style="float:left; width:138px; height:28px; padding:7px 0 0 22px;">
								<select name="dong" class="inputstyle2" style="height:22px; width:100px;" onchange="submit();">
									<option value="" <?if(!$dong) echo 'selected'?>> 선 택
									<?
										$where_add = " WHERE pj_seq='$pj_list' AND type_ho = '$type' ";
										if(!$mode&&$cont_sort1==1&&($cont_sort2==1)) $where_add .= " AND is_pro_cont='0' AND is_contract='0' ";
										if(!$mode&&$cont_sort1==1&&($cont_sort2==2)) $where_add .= " AND is_contract='0' ";
										if($cont_sort1==2&&$cont_sort3==3) $where_add .= " AND is_pro_cont=1 ";
										if($cont_sort1==2&&$cont_sort3==4) $where_add .= " AND is_contract=1 ";
										$dong_qry="SELECT pj_dong FROM cms_project_data $where_add GROUP BY pj_dong ORDER BY pj_dong ";
										$dong_rlt = mysql_query($dong_qry, $connect);
										while($dong_rows = mysql_fetch_array($dong_rlt)){
									?>
									<option value="<?=$dong_rows[pj_dong]?>"  <?if($dong==$dong_rows[pj_dong]) echo 'selected'?>><?=$dong_rows[pj_dong]?>동
									<? } ?>
								</select>
							</div>
							<div style="float:left; width:120px; height:26px; padding-top:9px; color:black; text-align:center; background-color:#F4F4F4;">호수 선택</div>
							<div style="float:left; width:138px; height:28px; padding:7px 0 0 22px;">
								<select name="ho" class="inputstyle2" style="height:22px; width:100px;" onchange="submit();">
									<option value="" <?if(!$dong) echo 'selected'?>> 선 택
									<?
										$where_add = " WHERE pj_seq='$pj_list' AND type_ho = '$type' AND pj_dong = '$dong' ";
										if(!$mode&&$cont_sort1==1&&($cont_sort2==1)) $where_add .= " AND is_pro_cont='0' AND is_contract='0' ";
										if(!$mode&&$cont_sort1==1&&($cont_sort2==2)) $where_add .= " AND is_contract='0' ";
										//if($cont_sort1==2&&$cont_sort3==3) $where_add .= " AND is_pro_cont=1 ";
										//if($cont_sort1==2&&$cont_sort3==4) $where_add .= " AND is_contract=1 ";

										$ho_qry="SELECT pj_ho FROM cms_project_data $where_add ORDER BY pj_ho DESC ";
										$ho_rlt = mysql_query($ho_qry, $connect);
										while($ho_rows = mysql_fetch_array($ho_rlt)){
									?>
									<option value="<?=$ho_rows[pj_ho]?>"  <?if($ho==$ho_rows[pj_ho]) echo 'selected'?>><?=$ho_rows[pj_ho]?>호
									<? } ?>
								</select>
							</div>
						</div>
						</form>
						<!-- ===================계약물건 검색 종료================== -->




						<!-- ===================계약내용 기록 시작================== -->
						<form method="post" name="form1" action="sales_rp_post.php">
							<input type="hidden" name="pj_seq" value="<?= $pj_list?>">
							<input type="hidden" name="cont_sort1" value="<?= $cont_sort1?>">
							<input type="hidden" name="cont_sort2" value="<?= $cont_sort2?>">
							<input type="hidden" name="cont_sort3" value="<?= $cont_sort3?>">
							<input type="hidden" name="type" value="<?= $type?>">
							<input type="hidden" name="dong" value="<?= $dong?>">
							<input type="hidden" name="ho" value="<?= $ho?>">

						<?
							$query = "SELECT is_except, is_pro_cont, pro_contractor,  pro_cont_tel_1, pro_cont_tel_2, pro_cont_addr, pro_cont_date, pro_draufgabe, pro_due_date,
												  is_contract, contractor, cont_tel_1, cont_tel_2, cont_addr,cont_date, draufgabe,
												  cont_mgm_who, cont_mgm_tel, cont_mgm_sum, cont_worker, worker_where, note
									    FROM cms_project_data WHERE pj_seq='$pj_list' AND type_ho='$type' AND pj_dong='$dong' AND pj_ho='$ho' ";
							$c_result = mysql_query($query, $connect);
							$cont_row = mysql_fetch_array($c_result);

							if($cont_row[is_except]==1){
								$condition = "<font color='#000000'>기 분양 세대</font>";
							}else if($ho&&$cont_row[is_pro_cont]==1){
								$condition = "<font color='#009900'>현재 청약 상태</font>";
								$name = $cont_row[pro_contractor];
								$cont_date = $cont_row[pro_cont_date];
								$tel_1 = $cont_row[pro_cont_tel_1];
								$tel_2 = $cont_row[pro_cont_tel_2];
								$addr = explode(":", $cont_row[pro_cont_addr]);
								$draufgabe = $cont_row[pro_draufgabe];
							}else if($ho&&$cont_row[is_contract]==1){
								$condition = "<font color='#0066ff'>현재 계약 상태</font>";
								$name = $cont_row[contractor];
								$cont_date = $cont_row[cont_date];
								$tel_1 = $cont_row[cont_tel_1];
								$tel_2 = $cont_row[cont_tel_2];
								$addr = explode(":", $cont_row[cont_addr]);
								$draufgabe = $cont_row[draufgabe];
							}else if($ho&&$cont_row[is_pro_cont]==0&&$cont_row[is_contract]==0){
								$condition = "<font color='#ff0000'>현재 미계약 상태</font>";
							}



							$worker_where=explode("-", $cont_row[worker_where]);


						?>
						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#707070; background-color:#ecefe7">
							<div style="float:left; padding:7px 0 0 20px; font-size:13px; color:#000000;"><?if($type) echo "<b>타입(TYPE) ".$type."</b>"; ?></div>
							<div style="float:left; padding:7px 0 0 30px; font-size:13px; color:#000000;"><? if($dong) echo "<b>".$dong."동</b>"; ?></div>
							<div style="float:left; padding:7px 0 0 30px; font-size:13px; color:#000000;"><? if($ho) echo "<b>".$ho."호</b>"; ?></div>
							<div style="float:left; padding:7px 0 0 30px; font-size:13px; color:#000000;"><?=$condition?></div>
						</div>
						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#e6e6e6;">
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">계약고객명 : </div>
							<div style="float:left; width:250px; height:28px; padding:7px 0 0 10px;"><input type="text" name="name" value="<?=$name?>" class="inputstyle2"></div>
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">거래일자</div>
							<div style="float:left; padding:8px 35px 0 10px; ">								
								<!-- <div style="float:left;"> -->
									<input type="text" name="cont_date" id="cont_date" value="<?if(!$cont_date){echo date('Y-m-d');}else{ echo $cont_date;}?>" class="inputstyle2" onclick="cal_add(this); event.cancelBubble=true"  readonly  onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')"><a href="javascript:" onclick="cal_add(document.getElementById('cont_date'),this); event.cancelBubble=true"> <img src="http://cigiko.cafe24.com/cms/images/calendar.jpg" border="0" alt="" /></a>
									<!-- <a href="javascript:" onclick=" to_del('cont_date');" title="지우기"><img src="../images/del.jpg" border="0" alt=""></a> -->
								<!-- </div> -->
							</div>
						</div>

						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#e6e6e6;">
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">연락처1 : </div>
							<div style="float:left; width:250px; height:28px; padding:7px 0 0 10px;"><input type="text" name="tel_1" value="<?=$tel_1?>" class="inputstyle2"></div>
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">연락처2 : </div>
							<div style="float:left; padding:8px 20px 0 10px; "><input type="text" name="tel_2" value="<?=$tel_2?>" class="inputstyle2"></div>
						</div>
						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#e6e6e6;">
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">고객 주소 : </div>
							<div style="float:left; padding:8px 20px 0 10px; ">
							<!-- <input type="text" name="addr" class="inputstyle2" style="width:436px;"> -->
							<input type="button" value="우편번호 검색" onclick="javascript:ZipWindow('../member/zip_search.php?what=1',1)" class="inputstyle_bt">
								<input type="text" name="zipcode1" value="<?=$addr[0]?>" size="5" class="inputstyle2" readonly onKeydown="ZipWindow('../member/zip_search.php',1);" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2');"> -
								<input type="text" name="zipcode2" value="<?=$addr[1]?>" size="5" class="inputstyle2" readonly onKeydown="ZipWindow('../member/zip_search.php',1);" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2');">
								<input type="text" name="address1" value="<?=$addr[2]?>" size="40" class="inputstyle2" readonly onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2');" style="width:310px;">
								<input type="text" name="address2" value="<?=$addr[3]?>" size="25" class="inputstyle2" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2');"> <font color="#788be2">나머지 주소</font>
							</div>
						</div>
						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#e6e6e6;">
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">
								<?if($cont_sort2==1){echo "청약금";} else {echo "계약금";}?> :
							</div>
							<div style="float:left; width:250px; height:28px; padding:7px 0 0 10px;"><input type="text" name="draufgabe" value="<?=$draufgabe?>" class="inputstyle2"> 원</div>
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000; <?if($cont_sort2==2||$cont_sort3==4) echo "display:none;";?>">계약 예정일 : </div>
							<div style="float:left; padding:8px 20px 0 10px;  <?if($cont_sort2==2) echo "display:none;";?>">								
								<input type="text" name="due_date" id="due_date" value="<?if($c_result) echo $cont_row[pro_due_date]; else echo "";?>" class="inputstyle2" onclick="cal_add(this); event.cancelBubble=true"  readonly  onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')"><a href="javascript:" onclick="cal_add(document.getElementById('due_date'),this); event.cancelBubble=true"> <img src="http://cigiko.cafe24.com/cms/images/calendar.jpg" border="0" alt="" /></a>
								<!-- <a href="javascript:" onclick=" to_del('due_date');" title="지우기"><img src="../images/del.jpg" border="0" alt=""></a> -->
							</div>
						</div>
						<?
							if($cont_sort2==2||$cont_sort3==4){
						?>
						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#e6e6e6;">
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">MGM 지급대상 : </div>
							<div style="float:left; width:250px; height:28px; padding:7px 0 0 10px;"><input type="text" name="mgm_to" value="<?=$cont_row[cont_mgm_who]?>" class="inputstyle2"></div>
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">MGM 지급연락처 : </div>
							<div style="float:left; width:150px; height:28px; padding:7px 0 0 10px;">
								<input type="text" name="mgm_tel" value="<?=$cont_row[cont_mgm_tel]?>" class="inputstyle2" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')">
							</div>
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">MGM 지급금액 : </div>
							<div style="float:left; padding:8px 20px 0 10px; ">
								<input type="text" name="mgm_sum"  value="<?=$cont_row[cont_mgm_sum]?>" class="inputstyle2" onmouseover="cngClass(this,'inputstyle22')" onmouseout="cngClass(this,'inputstyle2')"> 원
							</div>
						</div>
						<? } ?>
						<div style="height:35px; border-width:0 0 1px 0; border-style:solid; border-color:#e6e6e6;">
							<div style="float:left;  width:105px; height:28px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">계약담당직원 : </div>
							<div style="float:left; width:190px; padding:8px 0px 0 10px;">소속본부 :
								<select name="headq" class="inputstyle2" style="height:22px; width:100px;">
									<option value="" selected> 선 택
									<?
										$where_add = " WHERE 1=1 ";
										if($pj_list) $where_add.=" AND pj_seq='$pj_list' ";
										$qry = "SELECT seq, headq FROM cms_resource_headq $where_add GROUP BY headq ORDER BY headq";
										$rlt = mysql_query($qry, $connect);
										while($row = mysql_fetch_array($rlt)){
									?>
									<option value="<?=$row[headq]?>" <?if($row[headq]==$worker_where[0]) echo "selected";?>><?=$row[headq]?>
									<? } ?>
								</select>
							</div>
							<div style="float:left; width:160px; padding:8px 0px 0 10px;">소속 팀 :
								<select name="team" class="inputstyle2" style="height:22px; width:100px;">
									<option value="" selected> 선 택
									<?
										$where_add = " WHERE 1=1 ";
										if($pj_list) $where_add.=" AND pj_seq='$pj_list' ";
										$qry = "SELECT seq, team FROM cms_resource_team $where_add GROUP BY team ORDER BY team";
										$rlt = mysql_query($qry, $connect);
										while($row = mysql_fetch_array($rlt)){
									?>
									<option value="<?=$row[team]?>" <?if($row[team]==$worker_where[1]) echo "selected";?>><?=$row[team]?>
									<? } ?>
								</select>
							</div>
							<div style="float:left; width:190px; padding:8px 0px 0 10px;">이 름 : <input type="text" name="worker" value="<?=$cont_row[cont_worker]?>" class="inputstyle2" style="width:105px;"></div>
						</div>
						<div style="height:115px; border-width:0 0 1px 0; border-style:solid; border-color:#B2BCDE;">
							<div style="float:left; width:105px; height:108px; padding:7px 0 0 15px; background-color:#F4F4F4; color:#000000;">비 고 : </div>
							<div style="float:left; padding:8px 20px 0 10px; ">
								<textarea name="note" rows="5" cols="20" class="inputstyle2" style="height:80px; width:510px;"><?=$cont_row[note]?></textarea>
							</div>
						</div>
						<div class="form2" style="height:36px; padding:12px 20px 0 0; text-align:right;">
							<?
								if($sa_2_2_row[sa_2_2]<2){
									$submit_str="alert('등록 권한이 없습니다!')";
								}else{
									 $submit_str="cont_check(".$member_row[is_company].");";
								}
							?>
							<input type="button" value=" 등 록 하 기 " onclick="<?=$submit_str?>" class="submit_bt" style="height='28'">
						</div>
						</form>
						</td>
					</tr>
					</table>
					</div>
					<? } ?>
