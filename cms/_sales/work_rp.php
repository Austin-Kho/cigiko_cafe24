				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="center" width="162" class="d2_sub1">
							<a href="<?=$_SERVER['PHP_SELF']?>?m_di=1"><img src="../images/sub_menu_sales1.png" border="0" alt="" /><!-- <font size="2" color=""><b>업무현황</b></font> --></a></td>
						<td align="center" width="162" class="d2_sub2">
							<a href="<?=$_SERVER['PHP_SELF']?>?m_di=2"><img src="../images/sub_menu_sales2_.png" border="0" alt="" /><!-- <font size="2" color=""><b>계약현황</b></font> --></a></td>
						<td width="70%" class="d2_sub2"></td>
					</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td class="main_content" valign="top">
					<!-- ============================= template start ============================= -->
					<div style="height:25px; padding-top:9px;" class="bottom">
						<div style="float:left; text-align:center; width:120px;">
							<b><a href="<?=$_SERVER['PHP_SELF']?>?m_di=<?=$m_di?>&amp;s_di=1" class="menu1"><?=$s_di_1="고객 상담일지";?></a></b>
						</div>
						<div style="float:left;">|</div>
						<div style="float:left; text-align:center; width:120px;">
							<b><a href="<?=$_SERVER['PHP_SELF']?>?m_di=<?=$m_di?>&amp;s_di=2" class="menu1"><?=$s_di_2="업무일지";?></a></b>
						</div>
						<div style="float:left;">|</div>
						<div style="float:left; text-align:center; width:120px;">
							<b><a href="<?=$_SERVER['PHP_SELF']?>?m_di=<?=$m_di?>&amp;s_di=3" class="menu1"><?=$s_di_3="업무보고";?></a></b>
						</div>
					</div>
					<!-- ============================= sub menu end ============================= -->					
					<div>
						<?
							if(!$s_di||$s_di==1) include "work_rp1.php";
							if($s_di==2) include "work_rp2.php";
							if($s_di==3) include "work_rp3.php";
						?>
					</div>						
					<!-- ============================= template end ============================= -->
					</td>
				</tr>
				</table>
