					<!-- ===== subject table end ===== -->
					<div style=" height:18px; background-color:#F8F8F8" class="d3_sub">
						<b><font size="2" color="#cc0099">◈</font><font size="2" color="#6666cc"> 현장별 수수료 채권(입금) 현황</font></b>
						<div style="float:right;">
							<!-- <font color="red">*</font> 필수 항목은 반드시 입력하시기 바랍니다. -->
						</div>
					</div>
					<!-- ===== subject table end ===== -->
					<?
						$ca_2_1_rlt = mysql_query("select ca_2_1 from cms_mem_auth where user_id='$_SESSION[p_id]' ", $connect);
						$ca_2_1_row = mysql_fetch_array($ca_2_1_rlt);

						if(!$ca_2_1_row[ca_2_1]||$ca_2_1_row[ca_2_1]==0){
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
							<!-- <a href="javascript:" onClick="excel_pop(<?=$ca_1_2_row[ca_1_2]?>,2);"><img src="../images/excel_icon.jpg" height="10" border="0" alt="" /> EXCEL 출력</a> -->
						</div>
						현장별 매출채권 현황





						</td>
					</tr>
					</table>
					</div>
					<? } ?>
