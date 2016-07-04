//ҳ�����ʾ���� start
function secBoard(elementID, listName, elementname, n) {
	var elem = document.getElementById(elementID);
	var elemlist = elem.getElementsByTagName(elementname);
	for (var i = 0; i < elemlist.length; i++) {
		elemlist[i].className = "li02";
		var m = i + 1;
		document.getElementById(listName + "_" + m).style.display = "none";
	}
	elemlist[n - 1].className = "li01";
	document.getElementById(listName + "_" + n).style.display = "block";
}
//ҳ�����ʾ���� end

//����� start
function showCheckRand(formName, labelName, newImg){
	var $randLabel = jQuery("#"+formName).find("#"+labelName);
	$randLabel.css("display","");
	if(!$randLabel.html() || "" == $randLabel.html()){
		$randLabel.html("<img id=\""+newImg+"\" src=\"/checkcode?"+Math.floor(Math.random() * 100)+"\" onclick=\"_changeCode(this.id);\" alt=\"�������ʽ,������.������,����ͼƬ\" title=\"�������ʽ,������.������,����ͼƬ\" style=\"width:76px;height:22px;\"/>");
	}
}

function _changeCode(id) {
	jQuery("#"+id).attr("src","/checkcode?"+Math.floor(Math.random() * 100));
}
//����� end

//ҳ����ύ start
function sppay_submit(form_num, opera_type) {
	var flag = sypay_validate(form_num);
	if (!flag) return flag;
	
	var formName, checkRand;
	var newImg;
	switch(form_num) {
	case 1:
		formName = "form_mobile_bank";
		newImg = "checkImg1";
		checkRand = jQuery("#mobile_bank_code").val();
		break;
	case 2:
		formName = "form_mobile_card";
		newImg = "checkImg2";
		checkRand = jQuery("#mobile_card_code").val();
		break;
	case 3:
		formName = "form_liu_bank";
		newImg = "checkImg3";
		checkRand = jQuery("#liu_bank_code").val();
		break;
	case 4:
		formName = "form_liu_card";
		newImg = "checkImg4";
		checkRand = jQuery("#liu_card_code").val();
		break;
	case 5:
		formName = "form_adsl";
		newImg = "checkImg5";
		checkRand = jQuery("#adsl_code").val();
		break;
	case 6:
		formName = "form_phone";
		newImg = "checkImg6";
		checkRand = jQuery("#phone_code").val();
		break;
	default:
		return false;
	}
	jQuery.ajax({
		url : "/pages/selfservice/payment/validata.action",
		type : "post", 
		async : false, 
		data : {'checkRand':checkRand},
		dataType : "html",
		success : function(data) {
			if (null != data && "ok" == data) {
				document.getElementById(formName).submit();
			} else {
				alert(data);
				_changeCode(newImg);
			}
		},
		error : function(data) {
			_changeCode(newImg);
		}
	});
	return true;
}

function sypay_validate(form_num){
	switch(form_num) {
	case 1:
		if (/^[0-9]{3,11}$/.test(jQuery("#accountNumbersjyh").val())) {
			var code = jQuery("#mobile_bank_code").val();
			if (null == code || "" == code || "�����ȡ" == code) {
				alert("��������֤��");
				return false;
			} 
			return true;
		} else {
			alert("��������ȷ�ֻ���");
			return false;
		}
	case 2:
		if (/^[0-9]{3,11}$/.test(jQuery("#accountNumbersjkm").val())) {
			if(!/^[0-9]{18}$/.test(jQuery("#cradPin0SJ").val())){
				alert("��������ȷ�Ŀ���");
				return false;
			}
			
			var code = jQuery("#mobile_card_code").val();
			if (null == code || "" == code || "�����ȡ" == code) {
				alert("��������֤��");
				return false;
			} 
			return true;
		} else {
			alert("��������ȷ�ֻ���");
			return false;
		}
	case 3:
		if (/^[0-9]{3,11}$/.test(jQuery("#accountNumberllyh").val())) {
			var code = jQuery("#liu_bank_code").val();
			if (null == code || "" == code || "�����ȡ" == code) {
				alert("��������֤��");
				return false;
			} 
			return true;
		} else {
			alert("��������ȷ�ֻ���");
			return false;
		}
	case 4:
		if (/^[0-9]{3,11}$/.test(jQuery("#accountNumberllkm").val())) {
			if(!/^[0-9]{18}$/.test(jQuery("#cradPin0LL").val())){
				alert("��������ȷ�Ŀ���");
				return false;
			}
			
			var code = jQuery("#liu_card_code").val();
			if (null == code || "" == code || "�����ȡ" == code) {
				alert("��������֤��");
				return false;
			} 
			return true;
		} else {
			alert("��������ȷ�ֻ���");
			return false;
		}
	case 5:
		if (/^[0-9]+|[a-zA-Z0-9]+|[0-9]+@?[a-zA-Z]+$/.test(jQuery("#areaCodeKD").val())) {
			var code = jQuery("#adsl_code").val();
			if (null == code || "" == code || "�����ȡ" == code) {
				alert("��������֤��");
				return false;
			}
			return true;
		} else {
			alert("����д����˺�");
			return false;
		}
	case 6:
		if (/^[0-9]{3,11}$/.test(jQuery("#accountNumberGH").val())) {
			var code = jQuery("#phone_code").val();
			if (null == code || "" == code || "�����ȡ" == code) {
				alert("��������֤��");
				return false;
			}
			return true;
		} else {
			alert("����д�̻�����");
			return false;
		}
	default:
		return false;
	}
}

//����ת��
function transCitycode(areacode){
	if(areacode==027){
		return 0127;
	}else{
		return areacode;
	}
}

//ҳ����ύ end