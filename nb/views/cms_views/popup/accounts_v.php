	<script type="text/javascript">
	<!--
		function acc_d1_sub(){
			var form = document.form1;
			form.acc_d2.value = "";
			form.submit();
		}

		function show_hide(id){
			var obj = eval("document.getElementById('"+id+"')");
			if(obj.style.display=='none') {
				obj.style.display = '';
			}else{
				obj.style.display = 'none';
			}
		}

		function d2_show(acc){
			var val = acc.value;
			var d1_val = val.substr(0,1);
			var d1_obj = eval("document.getElementById('acc"+(eval(d1_val)+1)+"')");
			var d2_obj = eval("document.getElementById('"+val+"')");

			for(i=1; i>=5; i++){
				eval("document.getElementById('acc"+i+"')").style.display="none";
			}
			d1_obj.style.display="";
			d2_obj.style.display="";
		}
	//-->
	</script>
<?
	// $acc_d1 = $_REQUEST['acc_d1'];
	// $acc_d2 = $_REQUEST['acc_d2'];
	// $is_sp = $_REQUEST['is_sp'];
?>
<div style="border-width:1px 0 0 0; border-style: solid; border-color:#11ca1f; background-color: white;">
	<div style="height:100%; border-width:1px 0 0 0; border-style: solid; border-color:#C5FAC9; padding:6px 0 0 0;">
	<table border="0" cellspacing="0" cellpadding="0" style="height:96%; margin:0 auto; width:98%; border-width:2px 2px 2px 2px; border-style: solid; border-color:#96ABE5; margin-bottom:8px;">
	<tr>
		<td valign="top">
			<div style="height:50px; border-width:0 0 2px 0; border-style: solid; border-color:#96ABE5; background-color:#D9EAF8; text-align:center; padding-top:30px; margin-bottom:12px;">
				<font color="#4C63BD" style="font-size:11pt"><b> 회계 계정과목(ACCOUNT) 관리</b></font>
			</div>
			<div style="padding:0 10px 0 10px;">
				<div style="height:28px; background-color:#f4f4f4; border-width: 1px 0 1px 0; border-color:#CFCFCF; border-style: solid; text-align:center; padding-top:7px;">
					검색할 계정과목 명칭을 선택하여 주십시요.
				</div>
				<form name="form1" method="post">
				<div style="float:left; height:28px; text-align:center; padding:7px 0 0 10px; ;">
					계정과목 [대분류] :
					<select name="acc_d1" class="inputstyle2" style="width:80px; height:22px;" onChange = "acc_d1_sub();">
						<option value="0"> 전 체
						<option value="1" <?php echo set_select('acc_d1', '1');?>> 자 산
						<option value="2" <?php echo set_select('acc_d1', '2');?>> 부 채
						<option value="3" <?php echo set_select('acc_d1', '3');?>> 자 본
						<option value="4" <?php echo set_select('acc_d1', '4');?>> 수 익
						<option value="5" <?php echo set_select('acc_d1', '5');?>> 비 용
					</select>
				</div>
				<div style="float:left; height:28px; text-align:center; padding:7px 0 0 10px;">
					계정과목 [중분류] :
					<select name="acc_d2" class="inputstyle2" style="width:150px; height:22px;" onChange = "d2_show(this);">
						<option value=""> 전 체
<?php foreach($d2_acc as $lt) : ?>
						<option value="<?php echo $lt->d2_code; ?>" <?php echo set_select('acc_d2'); ?>> <?php echo $lt->d2_acc_name; ?>
<?php endforeach; ?>
					</select>
				</div>
				<div style="float:left; height:28px; text-align:center; padding:7px 0 0 10px;">
					희귀 계정과목 표시 <input type="checkbox" name="is_sp" value="1" <?php echo set_checkbox('is_sp', '1'); ?> onClick="submit();">
				</div>

				<div style="clear:left; height:30px; background-color:#e0e3e9; border-width: 1px 0 1px 0; border-color:#CFCFCF; border-style: solid;">
					<div style="float:left; padding:6px 0 0 10px; cursor:pointer;" onClick="show_hide('acc1');">
						<strong>자산 계정</strong>
					</div>
				</div>
				<div id="acc1" style="display:<?if($this->input->post('acc_d1')&&$this->input->post('acc_d1') !=1) echo 'none';?>">
					<?
						$qry = " SELECT d2_code, d1_code, d2_acc_name FROM cms_capital_account_d2  WHERE d1_code='1' ORDER BY d2_code ASC";
						$rlt = mysql_query($qry, $connect);
						while($rows = mysql_fetch_array($rlt)){ // d2 계정 나열 시작
							$show_hide = "show_hide('".$rows[d2_code]."')";
					?>
					<div style="clear:left; height:30px; background-color:#f9faf5; border-width: 0 0 1px 0; border-color:#CFCFCF; border-style: solid;">
						<div style="float:left; padding:6px 0 0 20px; cursor:pointer;" onClick="<?=$show_hide?>"><?=$rows[d2_acc_name]?></div>
					</div>
					<div id="<?=$rows[d2_code]?>">
					<?
							$add_w = " WHERE d1_code = '1' AND d2_code = '$rows[d2_code]' ";
							if($is_sp==0) $add_w .= " AND is_sp_acc='0' "; else $add_w .= "";
							$d3_qry = " SELECT d3_code, d3_acc_name, note FROM cms_capital_account_d3 $add_w ORDER BY d3_code ASC";
							$d3_rlt = mysql_query($d3_qry, $connect);
							while($d3_rows = mysql_fetch_array($d3_rlt)){ // d3 계정 나열 시작
					?>

						<div style="height:30px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
							<div style="float:left; padding:6px 0 0 30px; <?if($d3_rows[is_sp_acc]==0)echo "color:#003366;"; else echo "color:#a8a8a8;";?> width:120px; cursor:pointer;"  title="<?=$d3_rows[note]?>"><?=$d3_rows[d3_acc_name]?></div>
							<div style="float:left; padding:6px 0 0 15px; color:#737373; cursor:pointer;" title="<?=$d3_rows[note]?>"><?=rg_cut_string($d3_rows[note],40,"...")?></div>
						</div>
					<?
							} // d3 계정 나열 종료
					?>
					</div>
					<?
						}//d2 계정 나열 종료
						//mysqli_free_result($d3_rlt);
					?>
				</div>

				<div style="clear:left; height:30px; background-color:#e0e3e9; border-width: 1px 0 1px 0; border-color:#CFCFCF; border-style: solid;">
					<div style="float:left; padding:6px 0 0 10px; cursor:pointer;" onClick="show_hide('acc2');">
						<strong>부채 계정</strong>
					</div>
				</div>
				<div id="acc2" style="display:<?if($this->input->post('acc_d1')&&$this->input->post('acc_d1')!=2) echo 'none';?>">
					<?
						// $qry = " SELECT d2_code, d1_code, d2_acc_name FROM cms_capital_account_d2  WHERE d1_code='2' ORDER BY d2_code ASC";
						// $rlt = mysql_query($qry, $connect);
						// while($rows = mysql_fetch_array($rlt)){ // d2 계정 나열 시작
						// 	$show_hide = "show_hide('".$rows[d2_code]."')";
					?>
					<div style="clear:left; height:30px; background-color:#f9faf5; border-width: 0 0 1px 0; border-color:#CFCFCF; border-style: solid;">
						<div style="float:left; padding:6px 0 0 20px; cursor:pointer;" onClick="<?=$show_hide?>"><?=$rows[d2_acc_name]?></div>
					</div>
					<div id="<?=$rows[d2_code]?>">
					<?
							$add_w = " WHERE d1_code = '2' AND d2_code = '$rows[d2_code]' ";
							if($is_sp==0) $add_w .= " AND is_sp_acc='0' "; else $add_w .= "";
							$d3_qry = " SELECT d3_code, d3_acc_name, note FROM cms_capital_account_d3 $add_w ORDER BY d3_code ASC";
							$d3_rlt = mysql_query($d3_qry, $connect);
							while($d3_rows = mysql_fetch_array($d3_rlt)){ // d3 계정 나열 시작
					?>
						<div style="height:30px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
							<div style="float:left; padding:6px 0 0 30px; <?if($d3_rows[is_sp_acc]==0)echo "color:#003366;"; else echo "color:#a8a8a8;";?> width:120px; cursor:pointer;"  title="<?=$d3_rows[note]?>"><?=$d3_rows[d3_acc_name]?></div>
							<div style="float:left; padding:6px 0 0 15px; color:#737373; cursor:pointer;" title="<?=$d3_rows[note]?>"><?=rg_cut_string($d3_rows[note],40,"...")?></div>
						</div>
					<?
							} // d3 계정 나열 종료
					?>
					</div>
					<?
						//}//d2 계정 나열 종료
						//mysqli_free_result($d3_rlt);
					?>
				</div>

				<div style="clear:left; height:30px; background-color:#e0e3e9; border-width: 1px 0 1px 0; border-color:#CFCFCF; border-style: solid;">
					<div style="float:left; padding:6px 0 0 10px; cursor:pointer;" onClick="show_hide('acc3');">
						<strong>자본 계정</strong>
					</div>
				</div>
				<div id="acc3" style="display:<?if($acc_d1&&$acc_d1!=3) echo 'none';?>">
					<?
						$qry = " SELECT d2_code, d1_code, d2_acc_name FROM cms_capital_account_d2  WHERE d1_code='3' ORDER BY d2_code ASC";
						$rlt = mysql_query($qry, $connect);
						while($rows = mysql_fetch_array($rlt)){ // d2 계정 나열 시작
							$show_hide = "show_hide('".$rows[d2_code]."')";
					?>
					<div style="clear:left; height:30px; background-color:#f9faf5; border-width: 0 0 1px 0; border-color:#CFCFCF; border-style: solid;">
						<div style="float:left; padding:6px 0 0 20px; cursor:pointer;" onClick="<?=$show_hide?>"><?=$rows[d2_acc_name]?></div>
					</div>
					<div id="<?=$rows[d2_code]?>">
					<?
							$add_w = " WHERE d1_code = '3' AND d2_code = '$rows[d2_code]' ";
							if($is_sp==0) $add_w .= " AND is_sp_acc='0' "; else $add_w .= "";
							$d3_qry = " SELECT d3_code, d3_acc_name, note FROM cms_capital_account_d3 $add_w ORDER BY d3_code ASC";
							$d3_rlt = mysql_query($d3_qry, $connect);

							while($d3_rows = mysql_fetch_array($d3_rlt)){ // d3 계정 나열 시작
					?>

						<div style="height:30px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
							<div style="float:left; padding:6px 0 0 30px; <?if($d3_rows[is_sp_acc]==0)echo "color:#003366;"; else echo "color:#a8a8a8;";?> width:120px; cursor:pointer;"  title="<?=$d3_rows[note]?>"><?=$d3_rows[d3_acc_name]?></div>
							<div style="float:left; padding:6px 0 0 15px; color:#737373; cursor:pointer;" title="<?=$d3_rows[note]?>"><?=rg_cut_string($d3_rows[note],40,"...")?></div>
						</div>
					<?
							} // d3 계정 나열 종료
					?>
					</div>
					<?
						}//d2 계정 나열 종료
						mysqli_free_result($d3_rlt);
					?>
				</div>

				<div style="clear:left; height:30px; background-color:#e0e3e9; border-width: 1px 0 1px 0; border-color:#CFCFCF; border-style: solid;">
					<div style="float:left; padding:6px 0 0 10px; cursor:pointer;" onClick="show_hide('acc4');">
						<strong>수익 계정</strong>
					</div>
				</div>
				<div id="acc4" style="display:<?if($acc_d1&&$acc_d1!=4) echo 'none';?>">
					<?
						$qry = " SELECT d2_code, d1_code, d2_acc_name FROM cms_capital_account_d2  WHERE d1_code='4' ORDER BY d2_code ASC";
						$rlt = mysql_query($qry, $connect);
						while($rows = mysql_fetch_array($rlt)){ // d2 계정 나열 시작
							$show_hide = "show_hide('".$rows[d2_code]."')";
					?>
					<div style="clear:left; height:30px; background-color:#f9faf5; border-width: 0 0 1px 0; border-color:#CFCFCF; border-style: solid;">
						<div style="float:left; padding:6px 0 0 20px; cursor:pointer;" onClick="<?=$show_hide?>"><?=$rows[d2_acc_name]?></div>
					</div>
					<div id="<?=$rows[d2_code]?>">
					<?
							$add_w = " WHERE d1_code = '4' AND d2_code = '$rows[d2_code]' ";
							if($is_sp==0) $add_w .= " AND is_sp_acc='0' "; else $add_w .= "";
							$d3_qry = " SELECT d3_code, d3_acc_name, note FROM cms_capital_account_d3 $add_w ORDER BY d3_code ASC";
							$d3_rlt = mysql_query($d3_qry, $connect);

							while($d3_rows = mysql_fetch_array($d3_rlt)){ // d3 계정 나열 시작
					?>

						<div style="height:30px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
							<div style="float:left; padding:6px 0 0 30px; <?if($d3_rows[is_sp_acc]==0)echo "color:#003366;"; else echo "color:#a8a8a8;";?> width:120px; cursor:pointer;"  title="<?=$d3_rows[note]?>"><?=$d3_rows[d3_acc_name]?></div>
							<div style="float:left; padding:6px 0 0 15px; color:#737373; cursor:pointer;" title="<?=$d3_rows[note]?>"><?=rg_cut_string($d3_rows[note],40,"...")?></div>
						</div>
					<?
							} // d3 계정 나열 종료
					?>
					</div>
					<?
						}//d2 계정 나열 종료
						mysqli_free_result($d3_rlt);
					?>
				</div>

				<div style="clear:left; height:30px; background-color:#e0e3e9; border-width: 1px 0 1px 0; border-color:#CFCFCF; border-style: solid;">
					<div style="float:left; padding:6px 0 0 10px; cursor:pointer;" onClick="show_hide('acc5');">
						<strong>비용 계정</strong>
					</div>
				</div>
				<div id="acc5" style="display:<?if($acc_d1&&$acc_d1!=5) echo 'none';?>">
					<?
						$qry = " SELECT d2_code, d1_code, d2_acc_name FROM cms_capital_account_d2  WHERE d1_code='5' ORDER BY d2_code ASC";
						$rlt = mysql_query($qry, $connect);
						while($rows = mysql_fetch_array($rlt)){ // d2 계정 나열 시작
							$show_hide = "show_hide('".$rows[d2_code]."')";
					?>
					<div style="clear:left; height:30px; background-color:#f9faf5; border-width: 0 0 1px 0; border-color:#CFCFCF; border-style: solid;">
						<div style="float:left; padding:6px 0 0 20px; cursor:pointer;" onClick="<?=$show_hide?>"><?=$rows[d2_acc_name]?></div>
					</div>
					<div id="<?=$rows[d2_code]?>">
					<?
							$add_w = " WHERE d1_code = '5' AND d2_code = '$rows[d2_code]' ";
							if($is_sp==0) $add_w .= " AND is_sp_acc='0' "; else $add_w .= "";
							$d3_qry = " SELECT d3_code, d3_acc_name, note FROM cms_capital_account_d3 $add_w ORDER BY d3_code ASC";
							$d3_rlt = mysql_query($d3_qry, $connect);

							while($d3_rows = mysql_fetch_array($d3_rlt)){ // d3 계정 나열 시작
					?>
						<div style="height:30px; border-width: 0 0 1px 0; border-color:#eaeaea; border-style: solid;">
							<div style="float:left; padding:6px 0 0 30px; <?if($d3_rows[is_sp_acc]==0)echo "color:#003366;"; else echo "color:#a8a8a8;";?> width:120px; cursor:pointer;"  title="<?=$d3_rows[note]?>"><?=$d3_rows[d3_acc_name]?></div>
							<div style="float:left; padding:6px 0 0 15px; color:#737373; cursor:pointer;" title="<?=$d3_rows[note]?>"><?=rg_cut_string($d3_rows[note],40,"...")?></div>
						</div>
					<?
							} // d3 계정 나열 종료
					?>
					</div>
					<?
						}//d2 계정 나열 종료
						mysqli_free_result($d3_rlt);
					?>
				</div>
				</form>
			</div>
		</td>
	</tr>
	</table>
	</div>
</div>
