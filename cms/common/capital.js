// 구분목록상자 선택 (capital2.php)
function inoutSel_(form){
	if(form.class1.value==1){
		form.class2.length=3;
		form.class2.options[0].text = '수 익';
		form.class2.options[0].value = '1';
		//form.class2.options[0].selected =1;
		form.class2.options[1].text = '차 용';
		form.class2.options[1].value = '2';
		form.class2.options[2].text = '회 수';
		form.class2.options[2].value = '3';
	}else if(form.class1.value==2){
		form.class2.length=3;								
		form.class2.options[0].text = '비 용'
		form.class2.options[0].value = '4';
		//form.class2.options[0].selected =1;
		form.class2.options[1].text = '상 환';
		form.class2.options[1].value = '5';
		form.class2.options[2].text = '대 여';
		form.class2.options[2].value = '6';
	}else if(form.class1.value==3){
		form.class2.length=2;
		form.class2.options[0].text = '본 사'
		form.class2.options[0].value = '7';
		form.class2.options[1].text = '현 장'
		form.class2.options[1].value = '8';
	}else{
		form.class2.length=9;
		form.class2.options[0].text = '선 택';
		form.class2.options[0].value = '';
		form.class2.options[1].text = '수 익';
		form.class2.options[1].value = '1';
		form.class2.options[2].text = '차 용';
		form.class2.options[2].value = '2';
		form.class2.options[3].text = '회 수';
		form.class2.options[3].value = '3';
		form.class2.options[4].text = '비 용';
		form.class2.options[4].value = '4';
		form.class2.options[5].text = '상 환';
		form.class2.options[5].value = '5';
		form.class2.options[6].text = '대 여';
		form.class2.options[6].value = '6';
		form.class2.options[7].text = '본 사';
		form.class2.options[7].value = '7';
		form.class2.options[8].text = '현 장';
		form.class2.options[8].value = '8';
	}
}
// 구분목록 상자선택2 (capital2.php)
function inoutSel2_(form){	
	if(form.class2.value==0) {form.class1.options[0].selected=1;}
	if(form.class2.value>0&&form.class2.value<=3) {form.class1.options[1].selected=1;}
	if(form.class2.value>3&&form.class2.value<=6) {form.class1.options[2].selected=1;}
	if(form.class2.value>6){form.class1.options[3].selected=1;}
}

// 구분 목록상자 선택2 (capital3.php)
function inoutSel(no, pj){

	var class1_str = "class1_";
	var class1 = class1_str+no;
	var class2_str = "class2_";
	var class2 = class2_str+no;
	var in_str = "in_";
	var iin = in_str+no;
	var inc_str = "inc_";
	var inc = inc_str+no;
	var out_str = "out_";
	var out = out_str+no;
	var exp_str = "exp_";
	var exp = exp_str+no;

	var class1_id = document.getElementById(class1);
	var class2_id = document.getElementById(class2);
	var in_id = document.getElementById(iin);
	var inc_id = document.getElementById(inc);
	var out_id = document.getElementById(out);
	var exp_id = document.getElementById(exp);

	if(class1_id.value==1){
		class2_id.length=3;
		class2_id.options[0].text = '수 익';
		class2_id.options[0].value = '1';
		//class2_id.options[0].selected =1;
		class2_id.options[1].text = '차 용';
		class2_id.options[1].value = '2';
		class2_id.options[2].text = '회 수';
		class2_id.options[2].value = '3';
		in_id.disabled=false;
		inc_id.disabled=false;
		out_id.disabled=true;
		exp_id.disabled=true;		
	}else if(class1_id.value==2){
		class2_id.length=3;								
		class2_id.options[0].text = '비 용'
		class2_id.options[0].value = '4';
		//class2_id.options[0].selected =1;
		class2_id.options[1].text = '상 환';
		class2_id.options[1].value = '5';
		class2_id.options[2].text = '대 여';
		class2_id.options[2].value = '6';
		in_id.disabled=1;
		inc_id.disabled=1;
		out_id.disabled=0;
		exp_id.disabled=0;
	}else if(class1_id.value==3){
		class2_id.length=2;
		if(pj=='pj'){
			class2_id.options[0].text = '현 장'
			class2_id.options[0].value = '8';
			class2_id.options[1].text = '본 사'
			class2_id.options[1].value = '7';
		}else{
			class2_id.options[0].text = '본 사'
			class2_id.options[0].value = '7';
			class2_id.options[1].text = '현 장'
			class2_id.options[1].value = '8';
		}
		in_id.disabled=0;
		inc_id.disabled=0;
		out_id.disabled=0;
		exp_id.disabled=0;		
	}else{
		class2_id.length=9;
		class2_id.options[0].text = '선 택';
		class2_id.options[0].value = '';
		//class2_id.options[0].selected =1;
		class2_id.options[1].text = '수 익';
		class2_id.options[1].value = '1';
		class2_id.options[2].text = '차 용';
		class2_id.options[2].value = '2';
		class2_id.options[3].text = '회 수';
		class2_id.options[3].value = '3';
		class2_id.options[4].text = '비 용';
		class2_id.options[4].value = '4';
		class2_id.options[5].text = '상 환';
		class2_id.options[5].value = '5';
		class2_id.options[6].text = '대 여';
		class2_id.options[6].value = '6';
		if(pj=='pj'){
			class2_id.options[7].text = '현 장';
			class2_id.options[7].value = '8';
			class2_id.options[8].text = '본 사';
			class2_id.options[8].value = '7';
		}else{
			class2_id.options[7].text = '본 사';
			class2_id.options[7].value = '7';
			class2_id.options[8].text = '현 장';
			class2_id.options[8].value = '8';
		}
		in_id.disabled=0; // 입금계정
		inc_id.disabled=0; // 입금금액
		out_id.disabled=0; // 출금계정
		exp_id.disabled=0; // 출금금액
	}
}
// 구분목록 상자선택2 (capital3.php)
function inoutSel2(no){
	var class1_str = "class1_";
	var class1 = class1_str+no;
	var class2_str = "class2_";
	var class2 = class2_str+no;
	var pj_seq_str = "pj_seq_";
	var pj_seq = pj_seq_str+no;

	var class1_id = document.getElementById(class1);
	var class2_id = document.getElementById(class2);
	var pj_seq_id = document.getElementById(pj_seq);
	
	if(class2_id.value==0) {class1_id.options[0].selected=1;}
	if(class2_id.value>0&&class2_id.value<=3) {class1_id.options[1].selected=1;}
	if(class2_id.value>3&&class2_id.value<=6) {class1_id.options[2].selected=1;}
	if(class2_id.value>6){class1_id.options[3].selected=1;}
	if(class2_id.value==8){
		pj_seq_id.disabled=false;
	}else{
		pj_seq_id.disabled=true;
	}
}

// 서브밋 체크
function inout_frm_chk(com){
	var form=document.inout_frm;
	if(!form.deal_date.value){
		alert('거래일자를 입력하세요!');
		form.deal_date.focus();
		return;
	}
	if(!form.class1_1.value&&!form.class1_2.value&&!form.class1_3.value&&!form.class1_4.value&&!form.class1_5.value&&!form.class1_6.value&&!form.class1_7.value&&!form.class1_8.value&&!form.class1_9.value&&!form.class1_10.value){
		alert('하나 이상의 거래를 입력하세요!');
		form.class1_1.focus();
		return;
	}
	
	if(form.class1_1.value){
		if(com=='com'){
			if(form.class2_1.value=='8'){
				if(!form.pj_seq_1.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_1.focus();
					return;
				}
			}
		}
		if(!form.cont_1.value){
			alert('적요 항목을 입력하세요!');
			form.cont_1.focus();
			return;
		}
		if(form.class1_1.value==1){
			if(!form.in_1.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_1.focus();
				return;
			}
			if(!form.inc_1.value){
				alert('입금 금액을 입력하세요!');
				form.inc_1.focus();
				return;
			}
		}
		if(form.class1_1.value==2){
			if(!form.out_1.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_1.focus();
				return;
			}
			if(!form.exp_1.value){
				alert('출금 금액을 입력하세요!');
				form.exp_1.focus();
				return;												
			}
		}
		if(form.class1_1.value==3){

			if(!form.in_1.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_1.focus();
				return;
			}
			if(!form.inc_1.value){
				alert('입금 금액을 입력하세요!');
				form.inc_1.focus();
				return;
			}
			if(!form.out_1.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_1.focus();
				return;
			}
			var out_val = form.out_1.value.split("-");
			if(form.in_1.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_1.focus();
				return;
			}
			if(!form.exp_1.value){
				alert('출금 금액을 입력하세요!');
				form.exp_1.focus();
				return;
			}
		}
	}

	if(form.class1_2.value){
		if(com=='com'){
			if(form.class2_2.value=='8'){
				if(!form.pj_seq_2.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_2.focus();
					return;
				}
			}
		}
		if(!form.cont_2.value){
			alert('적요 항목을 입력하세요!');
			form.cont_2.focus();
			return;
		}
		if(form.class1_2.value==1){
			if(!form.in_2.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_2.focus();
				return;
			}
			if(!form.inc_2.value){
				alert('입금 금액을 입력하세요!');
				form.inc_2.focus();
				return;
			}
		}
		if(form.class1_2.value==2){
			if(!form.out_2.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_2.focus();
				return;
			}
			if(!form.exp_2.value){
				alert('출금 금액을 입력하세요!');
				form.exp_2.focus();
				return;
			}
		}
		if(form.class1_2.value==3){
			if(!form.in_2.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_2.focus();
				return;
			}
			if(!form.inc_2.value){
				alert('입금 금액을 입력하세요!');
				form.inc_2.focus();
				return;
			}
			if(!form.out_2.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_2.focus();
				return;
			}
			var out_val = form.out_2.value.split("-");
			if(form.in_2.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_2.focus();
				return;
			}
			if(!form.exp_2.value){
				alert('출금 금액을 입력하세요!');
				form.exp_2.focus();
				return;
			}
		}
	}
	if(form.class1_3.value){
		if(com=='com'){
			if(form.class2_3.value=='8'){
				if(!form.pj_seq_3.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_3.focus();
					return;
				}
			}
		}
		if(!form.cont_3.value){	
			alert('적요 항목을 입력하세요!');
			form.cont_3.focus();
			return;
		}
		if(form.class1_3.value==1){
			if(!form.in_3.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_3.focus();
				return;
			}
			if(!form.inc_3.value){
				alert('입금 금액을 입력하세요!');
				form.inc_3.focus();
				return;
			}
		}
		if(form.class1_3.value==2){
			if(!form.out_3.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_3.focus();
				return;
			}
			if(!form.exp_3.value){
				alert('출금 금액을 입력하세요!');
				form.exp_3.focus();
				return;
			}
		}
		if(form.class1_3.value==3){
			if(!form.in_3.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_3.focus();
				return;
			}
			if(!form.inc_3.value){
				alert('입금 금액을 입력하세요!');
				form.inc_3.focus();
				return;
			}
			if(!form.out_3.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_3.focus();
				return;
			}
			var out_val = form.out_3.value.split("-");
			if(form.in_3.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_3.focus();
				return;
			}
			if(!form.exp_3.value){
				alert('출금 금액을 입력하세요!');
				form.exp_3.focus();
				return;
			}
		}
	}
	if(form.class1_4.value){
		if(com=='com'){
			if(form.class2_4.value=='8'){
				if(!form.pj_seq_4.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_4.focus();
					return;
				}
			}
		}
		if(!form.cont_4.value){
			alert('적요 항목을 입력하세요!');
			form.cont_4.focus();
			return;
		}
		if(form.class1_4.value==1){
			if(!form.in_4.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_4.focus();
				return;
			}
			if(!form.inc_4.value){
				alert('입금 금액을 입력하세요!');
				form.inc_4.focus();
				return;
			}
		}
		if(form.class1_4.value==2){
			if(!form.out_4.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_4.focus();
				return;
			}
			if(!form.exp_4.value){
				alert('출금 금액을 입력하세요!');
				form.exp_4.focus();
				return;
			}
		}
		if(form.class1_4.value==3){
			if(!form.in_4.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_4.focus();
				return;
			}
			if(!form.inc_4.value){
				alert('입금 금액을 입력하세요!');
				form.inc_4.focus();
				return;
			}
			if(!form.out_4.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_4.focus();
				return;
			}
			var out_val = form.out_4.value.split("-");
			if(form.in_4.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_4.focus();
				return;
			}
			if(!form.exp_4.value){
				alert('출금 금액을 입력하세요!');
				form.exp_4.focus();
				return;
			}
		}
	}
	if(form.class1_5.value){
		if(com=='com'){
			if(form.class2_5.value=='8'){
				if(!form.pj_seq_5.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_5.focus();
					return;
				}
			}
		}
		if(!form.cont_5.value){
			alert('적요 항목을 입력하세요!');
			form.cont_5.focus();
			return;
		}
		if(form.class1_5.value==1){
			if(!form.in_5.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_5.focus();
				return;
			}
			if(!form.inc_5.value){
				alert('입금 금액을 입력하세요!');
				form.inc_5.focus();
				return;
			}
		}
		if(form.class1_5.value==2){
			if(!form.out_5.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_5.focus();
				return;
			}
			if(!form.exp_5.value){
				alert('출금 금액을 입력하세요!');
				form.exp_5.focus();
				return;
			}
		}
		if(form.class1_5.value==3){
			if(!form.in_5.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_5.focus();
				return;
			}
			if(!form.inc_5.value){
				alert('입금 금액을 입력하세요!');
				form.inc_5.focus();
				return;
			}
			if(!form.out_5.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_5.focus();
				return;	
			}
			var out_val = form.out_5.value.split("-");
			if(form.in_5.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_5.focus();
				return;
			}
			if(!form.exp_5.value){
				alert('출금 금액을 입력하세요!');
				form.exp_5.focus();
				return;
			}
		}
	}
	if(form.class1_6.value){
		if(com=='com'){
			if(form.class2_6.value=='8'){
				if(!form.pj_seq_6.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_6.focus();
					return;
				}
			}
		}
		if(!form.cont_6.value){
			alert('적요 항목을 입력하세요!');
			form.cont_6.focus();
			return;
		}
		if(form.class1_6.value==1){
			if(!form.in_6.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_6.focus();
				return;
			}
			if(!form.inc_6.value){
				alert('입금 금액을 입력하세요!');
				form.inc_6.focus();
				return;
			}
		}
		if(form.class1_6.value==2){
			if(!form.out_6.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_6.focus();
				return;
			}
			if(!form.exp_6.value){
				alert('출금 금액을 입력하세요!');
				form.exp_6.focus();
				return;
			}
		}
		if(form.class1_6.value==3){
			if(!form.in_6.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_6.focus();
				return;
			}
			if(!form.inc_6.value){
				alert('입금 금액을 입력하세요!');
				form.inc_6.focus();
				return;
			}
			if(!form.out_6.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_6.focus();
				return;
			}
			var out_val = form.out_6.value.split("-");
			if(form.in_6.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_6.focus();
				return;
			}
			if(!form.exp_6.value){
				alert('출금 금액을 입력하세요!');
				form.exp_6.focus();
				return;
			}
		}
	}
	if(form.class1_7.value){
		if(com=='com'){
			if(form.class2_7.value=='8'){
				if(!form.pj_seq_7.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_7.focus();
					return;
				}
			}
		}
		if(!form.cont_7.value){
			alert('적요 항목을 입력하세요!');
			form.cont_7.focus();
			return;
		}
		if(form.class1_7.value==1){
			if(!form.in_7.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_7.focus();
				return;
			}
			if(!form.inc_7.value){
				alert('입금 금액을 입력하세요!');
				form.inc_7.focus();
				return;
			}
		}
		if(form.class1_7.value==2){
			if(!form.out_7.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_7.focus();
				return;
			}
			if(!form.exp_7.value){
				alert('출금 금액을 입력하세요!');
				form.exp_7.focus();
				return;
			}
		}
		if(form.class1_7.value==3){
			if(!form.in_7.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_7.focus();
				return;
			}	
			if(!form.inc_7.value){
				alert('입금 금액을 입력하세요!');
				form.inc_7.focus();
				return;
			}
			if(!form.out_7.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_7.focus();
				return;
			}
			var out_val = form.out_7.value.split("-");
			if(form.in_7.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_7.focus();
				return;
			}
			if(!form.exp_7.value){
				alert('출금 금액을 입력하세요!');
				form.exp_7.focus();
				return;
			}
		}
	}
	if(form.class1_8.value){
		if(com=='com'){
			if(form.class2_8.value=='8'){
				if(!form.pj_seq_8.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_8.focus();
					return;
				}
			}
		}
		if(!form.cont_8.value){
			alert('적요 항목을 입력하세요!');
			form.cont_8.focus();
			return;
		}
		if(form.class1_8.value==1){
			if(!form.in_8.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_8.focus();
				return;
			}
			if(!form.inc_8.value){
				alert('입금 금액을 입력하세요!');
				form.inc_8.focus();
				return;
			}
		}
		if(form.class1_8.value==2){
			if(!form.out_8.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_8.focus();
				return;
			}
			if(!form.exp_8.value){
				alert('출금 금액을 입력하세요!');
				form.exp_8.focus();
				return;
			}
		}
		if(form.class1_8.value==3){
			if(!form.in_8.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_8.focus();
				return;
			}
			if(!form.inc_8.value){
				alert('입금 금액을 입력하세요!');
				form.inc_8.focus();
				return;
			}
			if(!form.out_8.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_8.focus();
				return;
			}
			var out_val = form.out_8.value.split("-");
			if(form.in_8.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_8.focus();
				return;
			}
			if(!form.exp_8.value){
				alert('출금 금액을 입력하세요!');
				form.exp_8.focus();
				return;
			}
		}
	}
	if(form.class1_9.value){
		if(com=='com'){
			if(form.class2_9.value=='8'){
				if(!form.pj_seq_9.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_9.focus();
					return;
				}
			}
		}
		if(!form.cont_9.value){
			alert('적요 항목을 입력하세요!');
			form.cont_9.focus();
			return;
		}
		if(form.class1_9.value==1){
			if(!form.in_9.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_9.focus();
				return;
			}
			if(!form.inc_9.value){
				alert('입금 금액을 입력하세요!');
				form.inc_9.focus();
				return;
			}
		}
		if(form.class1_9.value==2){
			if(!form.out_9.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_9.focus();
				return;
			}
			if(!form.exp_9.value){
				alert('출금 금액을 입력하세요!');
				form.exp_9.focus();
				return;
			}
		}
		if(form.class1_9.value==3){
			if(!form.in_9.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_9.focus();
				return;
			}
			if(!form.inc_9.value){
				alert('입금 금액을 입력하세요!');
				form.inc_9.focus();
				return;
			}
			if(!form.out_9.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_9.focus();
				return;
			}
			var out_val = form.out_9.value.split("-");
			if(form.in_9.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_9.focus();
				return;
			}
			if(!form.exp_9.value){
				alert('출금 금액을 입력하세요!');
				form.exp_9.focus();
				return;
			}
		}
	}
	if(form.class1_10.value){
		if(com=='com'){
			if(form.class2_10.value=='8'){
				if(!form.pj_seq_10.value){
					alert('전도금을 대체(이체)할 현장을 선택하여 주십시요!');
					form.pj_seq_10.focus();
					return;
				}
			}
		}
		if(!form.cont_10.value){
			alert('적요 항목을 입력하세요!');
			form.cont_10.focus();
			return;
		}
		if(form.class1_10.value==1){
			if(!form.in_10.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_10.focus();
				return;
			}
			if(!form.inc_10.value){
				alert('입금 금액을 입력하세요!');
				form.inc_10.focus();
				return;
			}
		}
		if(form.class1_10.value==2){
			if(!form.out_10.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_10.focus();
				return;
			}
			if(!form.exp_10.value){
				alert('출금 금액을 입력하세요!');
				form.exp_10.focus();
				return;
			}
		}
		if(form.class1_10.value==3){
			if(!form.in_10.value){
				alert('입금 계정 항목을 선택하세요!');
				form.in_10.focus();
				return;
			}
			if(!form.inc_10.value){
				alert('입금 금액을 입력하세요!');
				form.inc_10.focus();
				return;
			}
			if(!form.out_10.value){
				alert('출금 계정 항목을 선택하세요!');
				form.out_10.focus();
				return;
			}
			var out_val = form.out_10.value.split("-");
			if(form.in_10.value==out_val[0]){
				alert('대체 거래인 경우 입금계정과 출금계정을 다르게 선택하여 주십시요!');
				form.out_10.focus();
				return;
			}
			if(!form.exp_10.value){
				alert('출금 금액을 입력하세요!');
				form.exp_10.focus();
				return;
			}
		}
	}
	var aaa=confirm('거래내용을 등록하시겠습니까?');
	if(aaa==true){
		form.submit();
	}else{
		return;
	}
}

// 현장 서브밋
function pj_inout_frm_chk(){
	var form=document.form1;
	if(!form.pj_list.value){
		alert('프로젝트를 선택하여 주십시요!');
		form.pj_list.focus();
		return;
	}	
	inout_frm_chk();
}


// 대체시 체크 
function transfer(frm1,frm2,frm3){	 
	if(frm1.value==3) frm3.value=frm2.value;
}

// 카테첵 윈도오픈
function cate_chk(ref,name) {
	var window_left = (screen.width-640)/2;
	var window_top = (screen.height-480)/2;
	window.open(ref,name,'width=420,height=460,scrollbars=no,status=no,top=' + window_top + ',left=' + window_left + '');
}

//수수료 관련 체크박스 활성화
function charge(no,obj){
	var form=document.inout_frm;
	var nobj = obj.split("-");
	
	if(no==1){	if(nobj[0]==1||!obj){	form.char1_1.disabled=1;	}else{	form.char1_1.disabled=0;	}	}
	if(no==2){	if(nobj[0]==1||!obj){	form.char1_2.disabled=1;	}else{	form.char1_2.disabled=0;	}	}
	if(no==3){	if(nobj[0]==1||!obj){	form.char1_3.disabled=1;	}else{	form.char1_3.disabled=0;	}	}
	if(no==4){	if(nobj[0]==1||!obj){	form.char1_4.disabled=1;	}else{	form.char1_4.disabled=0;	}	}
	if(no==5){	if(nobj[0]==1||!obj){	form.char1_5.disabled=1;	}else{	form.char1_5.disabled=0;	}	}
	if(no==6){	if(nobj[0]==1||!obj){	form.char1_6.disabled=1;	}else{	form.char1_6.disabled=0;	}	}
	if(no==7){	if(nobj[0]==1||!obj){	form.char1_7.disabled=1;	}else{	form.char1_7.disabled=0;	}	}
	if(no==8){	if(nobj[0]==1||!obj){	form.char1_8.disabled=1;	}else{	form.char1_8.disabled=0;	}	}
	if(no==9){	if(nobj[0]==1||!obj){	form.char1_9.disabled=1;	}else{	form.char1_9.disabled=0;	}	}
	if(no==10){	if(nobj[0]==1||!obj){	form.char1_10.disabled=1; }else{	form.char1_10.disabled=0; } }
}

// 수수료 체크박스
function char2_chk(frm, no){
	var form=document.inout_frm;
	if(frm.disabled==true) {frm.disabled=false; frm.value=500;}else{frm.disabled=true; frm.value="";}
	if(no==1){form.cont_1_h.value=form.cont_1.value;}
	if(no==2){form.cont_2_h.value=form.cont_2.value;}
	if(no==3){form.cont_3_h.value=form.cont_3.value;}
	if(no==4){form.cont_4_h.value=form.cont_4.value;}
	if(no==5){form.cont_5_h.value=form.cont_5.value;}
	if(no==6){form.cont_6_h.value=form.cont_6.value;}
	if(no==7){form.cont_7_h.value=form.cont_7.value;}
	if(no==8){form.cont_8_h.value=form.cont_8.value;}
	if(no==9){form.cont_9_h.value=form.cont_9.value;}
	if(no==10){form.cont_10_h.value=form.cont_10.value;}
}