
	//腾讯退出登录
	function tencentLogout(){
		//调用腾讯API的注销方法
		//QC.Login.signOut();
		
        $.ajax({
            type: "POST",
            url: path_ + "/userCenter/tencentLogin.do?method=logout",	    
            dataType: "text",
            async:false,
            success: function(msg){
            },
			error:function(msg){
				alert("腾讯用户退出失败，请检查网络连接...");
				return false;
			}
        });
	}
	
	//新浪退出登录
	function sinaLogout(){
		//WB2.logout();
		
		$.ajax({
			type: "POST",
			url: path_ + "/userCenter/sinaLogin.do?method=logout",
			dataType: "text",
			async:false,
			success: function(msg){
			},
			error:function(msg){
				alert("新浪用户退出失败，请检查网络连接...");
				return false;
			}
		});
	}
	
	//普通用户退出登录
	function commonLogout(){
		$.ajax({
			type: "POST",
			url: path_ + "/userCenter/sinaLogin.do?method=commonUserlogout",   //第三方退出的action中的方法同样适用于普通用户
			dataType: "text",
			async:false,
			success: function(msg){
			},
			error:function(msg){
				alert("网厅用户退出失败，请检查网络连接...");
				return false;
			}
		});
	}
	//ecs联动退出
	function ecsUserLogout(){
		var contextPath = getLoginPage();
		var shopId = $.cookie('SHOPID_COOKIEID');
		var ecstt = document.getElementById('ecslogout') ;
		document.getElementById('shopId').value = shopId;
		document.getElementById('DestURL').value = contextPath;
		ecstt.submit();
		return true ;
	}
	//跳转登录页面的方法
	function getLoginPage(){
		var backLoginUrl = "";
		var shopId = $.cookie('SHOPID_COOKIEID');
		if(shopId == '10001'){
			backLoginUrl = "/dqmh/ssoLink.do?method=linkTo&platNo=10001&toStUrl=http://bj.189.cn/service/account/customerHome.action";
			}else if(shopId == '10010'){
			 if(buyPageUrl!=null&&buyPageUrl!=""){
				 backLoginUrl = "/dqmh/frontLink.do?method=linkTo&toStUrl="+buyPageUrl;
			}else{
				backLoginUrl = "/dqmh/frontLink.do?method=linkTo&toStUrl=http://hl.189.cn/service/uiss_loginmobile.do";
			}
		}else if(shopId == '10002' || shopId == '10015' || shopId == '10025' || shopId == '10026' || shopId == '10029'||shopId == '10014'||shopId == '10027'||shopId == '10007'||shopId == '10005'||shopId == '10006'||shopId == '10023'){
			backLoginUrl = "/dqmh/UamTO.do?method=loginSend";
			}else if(shopId == '10028'){
				backLoginUrl = "/dqmh/ssoLink.do?method=linkTo&platNo=10028&toStUrl=http://www.189.cn/dqmh/my189/initMy189home.do";
			}else if(shopId == '10031'){
				backLoginUrl = "/dqmh/ssoLink.do?method=linkTo&platNo=10031&toStUrl=http://xj.189.cn/service/account/index.jsp";
			}else if(shopId == '10004'){
				backLoginUrl = "/dqmh/ssoLink.do?method=linkTo&platNo=10004&toStUrl=http://cq.189.cn/account/index.htm";
			}else if(shopId == '10019'){
				backLoginUrl = "http://hn.189.cn/grouplogin";
			}else{
			 if(buyPageUrl!=null&&buyPageUrl!=""){
				 backLoginUrl = "/dqmh/login/loginJT.jsp?buyPageUrl="+buyPageUrl;
			}else{
			 var loginId_logo = getURLOfLoginId("loginId");
		 	 if(loginId_logo!="" && loginId_logo=="factory"){
		 		backLoginUrl = "/dqmh/login/loginJT.jsp?loginId=factory";
			 }else{
				 backLoginUrl = "/dqmh/login/loginJT.jsp";
			 }
			}
		}
		return backLoginUrl;
	}