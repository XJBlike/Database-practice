var SU = SU || {};
SU = {
    /**
     * 版本
     */
    version : 1.0,
    /**
     * 默认登录地址
     */
    DEFURL_LOGIN : "/dqmh/login/loginJT.jsp",
    /**
     * 默认生成订单地址
     */
    DEFURL_ORDER_CREATE : "/dqmh/tianyiMall/createOrder.do",
    /**
     * 店铺类型 试点省
     */
    SHOP_TYPE_SD : 1 ,
    /**
     * 店铺类型 非试点省
     */
    SHOP_TYPE_FSD : 0 ,
    
    /**
     * 默认店铺shopId
     */
    DEFSHOPID_SEARCH : "10001",
   
    /**
     * 默认COOKIE域名
     */
    COOKIE_DOMAIN : ".189.cn",
    
    /**
     * COOKIE PATH
     */
    COOKIE_PATH   : "/",
     /**
     * 默认COOKIE时效
     */
    COOKIE_EXPIRES_CITYCODE   : 720,
    /**
     * 宽带登陆，自动，一键区分参数
     */
    LOGINBYKUANDAI_YIJIAN : "10019|10013",//hn:10019  ah:10013

	LOGINBYKUANDAI_ZIDONG :"10013",

	LOGINBYKUANDAI_BOTH :"10013",
	/**
	 * 山西分期付款
	 */
	SX_PAYMETHED :"40|41|43",
	

    /**
     * 根据shopId返回cityCode
     * @param shopId
     * @param shop_type  可缺省，缺省认为查询范围为全部
     * @returns {*} 未查询到返回 ""
     */
    getCityCodeByShopId : function(shopId,shop_type){
        if(this.isEmpty(shopId)) return "";
        for(var i in _SHOPS){
            if(_SHOPS[i].shopId==shopId&&(this.isEmpty(shop_type)
                ||_SHOPS[i].shop_type==shop_type)){
                return _SHOPS[i].cityCode;
            }
        }
        return "";
    },
    
    /**
     * 根据shopId返回跳转省用户中心地址
     * @param shopId
     * @returns {*} 未查询到返回 ""
     */
    getUserUrlto : function(shopId){
        if(this.isEmpty(shopId)) return "";
        for(var i in _SHOPSTOURL){
            if(_SHOPSTOURL[i].shopId==shopId){
                return _SHOPSTOURL[i].toUrl;
            }
        }
        return "";
    },
    
    /**
     * 根据shopId返回跳转省用户中心 uam用户登录是否支持跳转
     * @param shopId
     * @returns {*} 未查询到返回 ""
     */
    getUserUrltoUAM : function(shopId){
        if(this.isEmpty(shopId)) return false;
        for(var i in _SHOPSTOURL){
            if(_SHOPSTOURL[i].shopId==shopId){
            	if(_SHOPSTOURL[i].uam == 0){
            		return true;
            	}
                return false;
            }
        }
        return false;
    },
    
    /**
     * 根据shopId返回跳转省用户中心 注册用户登录是否支持跳转
     * @param shopId
     * @returns {*} 未查询到返回 ""
     */
    getUserUrltoZC : function(shopId){
        if(this.isEmpty(shopId)) return false;
        for(var i in _SHOPSTOURL){
            if(_SHOPSTOURL[i].shopId==shopId){
            	if(_SHOPSTOURL[i].zc == 0){
            		return true;
            	}
                return false;
            }
        }
        return false;
    },
    
    /**
     * 根据channelId 获取cityCode
     * @param channelId
     * @returns {*}
     */
    getCityCodeByChannelId : function(channelId){
        if(this.isEmpty(channelId)) return "";
        for(var i in _SHOPS){
            if(_SHOPS[i].channelId==channelId){
                return _SHOPS[i].cityCode;
            }
        }
        return "";
    },
     /**
     * 根据cityCode获得shopId
     * @param cityCode
     * @returns {*}
     */
    getShopIdByCityCode : function(cityCode){
        if(this.isEmpty(cityCode)) return "";
        for(var i in _SHOPS){
            if(_SHOPS[i].cityCode==cityCode){
                return _SHOPS[i].shopId;
            }
        }
        return "";
    }
    ,
    /**
     * 根据导航栏中的省份名称获取shopId
     * @param theName
     * @returns {*}
     */
    getShopIdByTheName : function(theName){
        if(this.isEmpty(theName)) return "";
        for(var i in _SHOPS){
            if(_SHOPS[i].theName==theName){
                return _SHOPS[i].shopId;
            }
        }
        return "";
    },
    /**
     * 根据shopId返回立即购买的url
     * @param shopId
     * @returns {*}
     */
    getCreateOrderUrl : function(shopId){
        if(this.isEmpty(shopId)) return "";
        for(var i in _RESOURCES){
            if(_RESOURCES[i].shopId==shopId
                &&!this.isEmpty(_RESOURCES[i].createOrderUrl)){
                return _RESOURCES[i].createOrderUrl;
            }
        }
        return this.DEFURL_ORDER_CREATE;
    },
    /**
     * 根据shopId返回登录地址
     * @param shopId
     * @returns {*}
     */
    getLoginUrl : function(shopId){
        if(this.isEmpty(shopId)) return "";
        for(var i in _RESOURCES){
            if(_RESOURCES[i].shopId==shopId
                &&!this.isEmpty(_RESOURCES[i].loginUrl)){
                return _RESOURCES[i].loginUrl;
            }
        }
        return "";
    },
    /**
     * 根据shopId返回在线客服的地址
     * @param shopId
     * @returns {*}
     */
    getOnlineServiceUrl : function(shopId){
        if(this.isEmpty(shopId)) return "";
        for(var i in _RESOURCES){
            if(_RESOURCES[i].shopId==shopId
                &&!this.isEmpty(_RESOURCES[i].onLineServiceUrl)){
                return _RESOURCES[i].onLineServiceUrl;
            }
        }
        return "";
    },
    /**
     * 字符串非空判断
     * @param str
     * @returns {boolean}
     */
    isEmpty : function(str){
        return null==str||undefined==str||""==str;
    },
    /**
     * 根据shopId->“其他”链接
     * @param theName
     * @returns {*}
     */
    getQitaUrlByShopId : function(shopId){
        if(this.isEmpty(shopId)) return "";
        for(var i in _QITAURLlIST){
            if(_QITAURLlIST[i].shopId==shopId){
                return _QITAURLlIST[i].qitaurl;
            }
        }
        return "";
    },
    /**
     * 根据shopId->登陆方式
     * @param shopId
     * @returns {*}
     */
    getLoginWayByShopId : function(shopId){
        if(this.isEmpty(shopId)) return "";
        for(var i in _LOGINWAYLIST){
            if(_LOGINWAYLIST[i].shopId==shopId){
                return _LOGINWAYLIST[i].wayCode;
            }
        }
        return "";
    }
    
}

/**
 * 店铺信息集合
 * @type {Array}
 */
var _SHOPS =[
    new _shop("10000","集团","","",0),
    new _shop("10013","安徽","ah","1001",0),
    new _shop("10014","福建","fj","1002",0),
    new _shop("10028","甘肃","gs","1003",0),
    new _shop("10020","广东","gd","1004",0),
    new _shop("10021","广西","gx","1005",0),
    new _shop("10024","贵州","gz","1006",0),
    new _shop("10022","海南","hi","1007",0),
    new _shop("10017","河南","ha","1008",0),
    new _shop("10018","湖北","hb","1009",0),
    new _shop("10019","湖南","hn","1010",0),
    new _shop("10030","吉林","jl","1011",0),
    new _shop("10011","江苏","js2","1012",0),
    new _shop("10015","江西","jx","1013",0),
    new _shop("10029","青海","qh","1014",0),
    new _shop("10016","山东","sd","1015",0),
    new _shop("10027","陕西","sn","1016",0),
    new _shop("10003","上海","sh","1017",0),
    new _shop("10023","四川","sc","1018",0),
    new _shop("10026","西藏","xz","1019",0),
    new _shop("10031","新疆","xj","1020",0),
    new _shop("10025","云南","yn","1021",0),
    new _shop("10012","浙江","zj","1022",0),
    new _shop("10004","重庆","cq","1023",0),
    new _shop("10001","北京","bj","1024",1),
    new _shop("10002","天津","tj","1025",1),
    new _shop("10005","辽宁","ln","1026",1),
    new _shop("10010","黑龙江","hl","1027",1),
    new _shop("10007","山西","sx","1028",1),
    new _shop("10009","宁夏","nx","1029",1),
    new _shop("10008","内蒙古","nm","1030",1),
    new _shop("10006","河北","he","1031",1)
];
/**
 * 资源集合
 * @type {Array}
 * @private
 */
var _RESOURCES = [
    new _resource("10001","/dqmh/UnifiedLogin.do?method=unifiedTicketCallBack&backUrl=http://bj.189.cn/service/account/customerHome.action","",""),
    new _resource("10002","","","http://im.ct10000.com/webclient/index.html?cityId=8006&manid=739"),
    new _resource("10005","","","http://im.ct10000.com/webclient/index.html?cityId=2101"),
    new _resource("10006","","","http://im.ct10000.com/webclient/index.html?cityId=1300"),
    new _resource("10007","","","http://im.ct10000.com/webclient/index.html?cityId=1400"),
    new _resource("10008","","","http://im.ct10000.com/webclient/index.html?cityId=1501"),
    new _resource("10009","","","http://im.ct10000.com/webclient/index.html?cityId=6400"),
    new _resource("10010","/dqmh/frontLink.do?method=linkTo&toStUrl=http://hl.189.cn/service/uiss_loginmobile.do","","http://im.189.cn/webclient/index.html?cityId=8016"),
    new _resource("10000","","/dqmh/virtualStation/virtualCreateOrder.do",""),
    new _resource("10036","","/dqmh/virtualStation/virtualCreateOrder.do","")

];
/**
 * 其他链接集合
 * @type{array}
 * @param {String} shopId
 */
var _QITAURLlIST = [
   	new _qitaurllist("10003","http://sh.189.cn/service/postUissAction.do?c=jy"),
    new _qitaurllist("10027","http://sn.189.cn/sso/login?returnUrl=%2Fservice%2Faccount%2Finit.action")
];
/**
 * 根据shopId 判别具有的登陆方式 
 * @type{array}
 * @param {Object} shopId
 * @param {Object} qitaURL
 * @param {Object} way:天翼宽带一点登陆(0) ,‘其他’登陆方式(2) ,都没有(1),都有(3=0+4),自动(4)
 */
var _LOGINWAYLIST = [
	new _loginwaylist("10003",2),//上海
	new _loginwaylist("10027",2),//陕西
	new _loginwaylist("10013",3),//安徽
	new _loginwaylist("10019",0),//湖南
	];
/**
 * 店铺信息集合,登录后跳转到省用户中心
 * @type {Array}
 * 店铺id
 * 省份名称
 * uam用户  0跳转，1不跳转
 * 注册用户  0跳转，1不跳转
 * 跳转地址
 */
var _SHOPSTOURL =[
    new _shopstourl("10000","集团",1,1,""),
    new _shopstourl("10013","安徽",0,0,"http://ah.189.cn/service/account/init.action"),
    new _shopstourl("10014","福建",1,1,""),
    new _shopstourl("10028","甘肃",0,0,"http://www.189.cn/dqmh/my189/initMy189home.do"),
    new _shopstourl("10020","广东",1,1,""),
    new _shopstourl("10021","广西",0,1,"http://gx.189.cn/public/login_uam_sso.jsp?VISIT_URL=/service/account/"),
    new _shopstourl("10024","贵州",1,1,""),
    new _shopstourl("10022","海南",1,1,""),
    new _shopstourl("10017","河南",1,1,""),
    new _shopstourl("10018","湖北",0,0,"http://hb.189.cn/SSOtoWSS?toWssUrl=/hbuserCenter.action"),
    new _shopstourl("10019","湖南",0,1,"http://hn.189.cn:80/hnselfservice/uamlogin/uam-login!uamLoginRet.action?rUrl=/hnselfservice/usercenter/user-center!userCenterIndex.action?_z=1"),
    new _shopstourl("10030","吉林",1,1,""),
    new _shopstourl("10011","江苏",1,1,""),
    new _shopstourl("10015","江西",1,1,""),
    new _shopstourl("10029","青海",1,1,""),
    new _shopstourl("10016","山东",0,0,"http://sd.189.cn/selfservice/account/returnwt?columnId=00"),
    new _shopstourl("10027","陕西",1,1,""),
    new _shopstourl("10003","上海",1,1,""),
    new _shopstourl("10023","四川",1,1,""),
    new _shopstourl("10026","西藏",1,1,""),
    new _shopstourl("10031","新疆",0,0,"http://xj.189.cn/service/account/index.jsp"),
    new _shopstourl("10025","云南",1,1,""),
    new _shopstourl("10012","浙江",1,1,""),
    new _shopstourl("10004","重庆",0,0,"http://cq.189.cn/users/getTicket.htm?sendredirect=http://cq.189.cn/account/index.htm"),
    new _shopstourl("10001","北京",1,1,""),
    new _shopstourl("10002","天津",1,1,""),
    new _shopstourl("10005","辽宁",1,1,""),
    new _shopstourl("10010","黑龙江",1,1,""),
    new _shopstourl("10007","山西",1,1,""),
    new _shopstourl("10009","宁夏",1,1,""),
    new _shopstourl("10008","内蒙古",1,1,""),
    new _shopstourl("10006","河北",1,1,"")
];
/**
 * 店铺对象
 * @param shopId
 * @param theName
 * @param cityCode
 * @param channelId
 * @param shop_type
 * @private
 */
function _shop(shopId,theName,cityCode,channelId,shop_type){
    this.shopId = shopId;
    this.cityCode = cityCode;
    this.theName = theName;
    this.channelId = channelId;
    this.shop_type = shop_type;
}
/**
 * 资源对象
 * @param shopId 店铺ID
 * @param loginUrl 自定义登录地址
 * @private
 */
function _resource(shopId,loginUrl,createOrderUrl,onLineServiceUrl){
    this.shopId = shopId;
    this.loginUrl = loginUrl;
    this.createOrderUrl = createOrderUrl;
    this.onLineServiceUrl = onLineServiceUrl;
}
/**
 * “其他”对象
 * @param shopId
 */
function _qitaurllist(shopId,qitaurl){
    this.shopId = shopId;
    this.qitaurl = qitaurl;
}
/**
 * “登录方式”对象
 * @param shopId
 */
function _loginwaylist(shopId,wayCode){
    this.shopId = shopId;
    this.wayCode = wayCode;
}
/**
 * 店铺对象  跳转
 * @param shopId
 * @param theName
 * @param uam
 * @param zc
 * @param toUrl
 */
function _shopstourl(shopId,theName,uam,zc,toUrl){
    this.shopId = shopId;
    this.theName = theName;
    this.uam = uam;
    this.zc = zc;
    this.toUrl = toUrl;
}


