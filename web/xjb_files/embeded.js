(window.constructQzoneAppLib=function(e,f){function h(){b=e;do try{if(b=b.parent,b.QZONE&&b.QZONE.FrontPage)return k=b.g_version||8,!0}catch(a){}while(b!=top);throw Error("");}function r(){var a=location.host;if(0<=a.indexOf("qzone.qq.com"))try{f.domain="qzone.qq.com";h();return}catch(b){}if(0<=a.indexOf("qq.com"))try{f.domain="qq.com";h();return}catch(d){}if(0<=a.indexOf("qzone.com"))try{f.domain="qzone.com",h()}catch(c){}}function l(a,b){for(var d in a)"_"!=d.charAt(0)&&"function"==typeof a[d]&&
(b[d]=a[d])}function n(a){a=a||window.event;a=a.target||a.srcElement;for(var b=3,d,g;a&&-1<b;){b--;d=a.nodeName;if(!a.getAttribute)break;g=a.getAttribute("href");if(s(g))a.hrefbak=g,a.href=g+"/profile",setTimeout(function(a){return function(){a.href=a.hrefbak}}(a),50);else if("A"==d&&!a.onclick){if((g=a.getAttribute("href"))&&"http"==g.slice(0,4)&&(!t(g)||g.slice(0,60)==p)){a.hrefbak=g;window.ActiveXObject&&-1==a.innerHTML.indexOf("<")&&(b=document.createComment(""),a.appendChild(b));b="";c.FP._t.ownermode||
"1"==c.FP._t.g_isBrandQzone||(b="&mj=1");d=QZONE.FP.getCurrApp();var e=QZFL&&QZFL.dom&&QZFL.dom.searchElementByClassName&&QZFL.dom.searchElementByClassName(a,"f_single");if(e)try{d=e.getAttribute("id").split("_")[2]}catch(f){}a.href=p+"?url="+encodeURIComponent(g)+"&where=1"+b+"&appid="+d+"&luin="+c.FP._t.checkLogin()+"&lpos="+u(c.FP._t.QZONE.FP.getCurrApp()[0])+"&lsource="+({311:1,2:2,4:3,202:4,334:5,1:6}[d]||1);setTimeout(function(a){return function(){a.href=a.hrefbak}}(a),50)}break}if(v[d])break;
a=a.parentNode}}function u(a){a={0:0,311:3,2:4,4:5,202:6,334:7,1:8}[a];0==a&&(a=b&&"1"==b.g_isOFP?2:1);return a||1}function t(a){a=a.split("://");if(a[1])return a=a[1].split("/")[0],m.test(a)}function s(a){if(!a)return!1;a=a.split("://");if(a[1])return w.test(a[1])}function x(a){var b={};a=a.split(",");for(var d=0,c=a.length;d<c;d++)b[a[d]]=!0;return b}var b,k=0,m="(?:^|.)(?:"+"qq.com".replace(/\./g,"\\.")+"|qzonestyle.gtimg.cn)$",p="http://www.urlshare.cn/umirror_url_check",w=/(?:^|\.)(?:user\.qzone\.qq\.com\/\d+)$/i,
y=location.hostname,m=RegExp(m,"i");if(/pengyou.com$/i.test(y))f.domain="pengyou.com",h();else try{f.domain="qzone.qq.com",h()}catch(z){try{f.domain="qq.com",h()}catch(A){try{f.domain="qzone.com",h()}catch(B){r()}}}(function(a){return(a=e.location.href.match(RegExp("(\\?|#|&)"+a+"=([^&#]*)(&|#|$)")))?a[2]:""})("qz_fl");var c;c=e.QZONE=e.QZONE||{};c.FP=c.FP||{};c.AP=c.AP||{};if(k){c.FP._t=b;e.checkLogin=e.checkLogin||c.FP._t.checkLogin;if(!e.TCISD&&c.FP._t.TCISD){e.TCISD={};for(var q in c.FP._t.TCISD)e.TCISD[q]=
c.FP._t.TCISD[q]}window.imgcacheDomain=b.imgcacheDomain;window.siDomain=b.siDomain;6>k&&b.QZONE.space.getCurrApp();b.QZONE.OFP&&l(b.QZONE.OFP,c.FP);b.QZONE.appPlatform&&l(b.QZONE.appPlatform,QZONE.AP);l(b.QZONE.FrontPage,c.FP);c.FP.activateOFPIframe=function(){frameElement&&"function"==typeof frameElement.activate&&frameElement.activate()};c.FP.includeQZFL=function(a){a="";var c;if(b.constructQZFL)eval("("+(b.constructQZFL._string||(b.constructQZFL._string=b.constructQZFL.toString()))+")();");else if(c=
b.document.getElementsByTagName("script")){for(var d=0,e=c.length;d<e;++d)if(c[d]&&c[d].src&&-1<c[d].src.toLowerCase().indexOf("/qzfl/qzfl")){a=c[d].src;break}f.write('<script type="text/javascript" charset="utf-8" src='+(a||"http://"+(b.siDomain||"qzonestyle.gtimg.cn")+"/ac/qzfl/release/qzfl_for_qzone.js")+">\x3c/script>")}};c.FP.includeNamecard=function(){b.constructNamecard?eval("("+(b.constructNamecard._string||(b.constructNamecard._string=b.constructNamecard.toString()))+")();"):f.write('<script type="text/javascript" defer="defer" src="http://'+
(b.siDomain||"qzonestyle.gtimg.cn")+'/qzone/v5/namecard.js">\x3c/script>')};var v=x("ADDRESS,APPLET,BLOCKQUOTE,BODY,BUTTON,CENTER,DD,DEL,DIR,DIV,DL,DT,FIELDSET,FORM,FRAMESET,HR,IFRAME,INS,ISINDEX,LI,MAP,MENU,NOFRAMES,NOSCRIPT,OBJECT,OL,P,PRE,SCRIPT,TABLE,TBODY,TD,TFOOT,TH,THEAD,TR,UL");document.addEventListener?document.addEventListener("click",n,!1):document.attachEvent&&document.attachEvent("onclick",n);try{e.top=b}catch(C){}}})(window,document);
