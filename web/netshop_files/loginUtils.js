var url = "";

var urlReg = [
	"/products/",
	".html",
	"/dqmh/tianyiMall/goodNumOrderAction.do?method=getBuyNum",
	"/dqmh/eSurfing/buyNumber.do?method=getBuyLoveNum&phoneNumber"
];

function filterUrl(url){
	var flag = false;
	for(var i= 0;i<urlReg.length;i++){
		var num = url.lastIndexOf(urlReg[i]);
		if((num>-1)){
			flag = true;
			break;
		}
	}	
	return flag;
}

function getPageUrl(url){
	var pageUrl = "";
	if(url.indexOf('buyPageUrl')>-1){
		pageUrl = url.substring(url.indexOf('buyPageUrl')+11,url.length);
	}
	return pageUrl;
}