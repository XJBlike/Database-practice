window._biq=window._biq||[];var _abbi=function(t,v){var a=["zone","index","label","value","params","bidlist","hotbidlist","alsolike","rzsh"];var j=[];j._traceEvent=u;j._tracePage=z;var o=[];var c=[];if(typeof v==="undefined"){v="http://hunt.aibang.com/__abbi.gif";}if(typeof t==="undefined"||t===null){t="";}var m=function(C){return(typeof C=="string");};var f=function(C){return(typeof C=="string"&&C);};var k=function(C){return(typeof C!="undefined"&&Object.prototype.toString.call(C)=="[object Array]");};var l=function(C){return(typeof C!="undefined"&&Object.prototype.toString.call(C)=="[object Array]"&&C.length>0);};var s=function(C){for(var D=o.length-1;D>=0;--D){if(C===o[D]){return D;}}return -1;};var n=function(D,E){if(f(D)&&f(E)){var C=s(D);if(C>=0){c[C]=E;}else{o.push(D);c.push(E);}}};n("__id",t);var g=function(){var D=parseInt(Math.random()*1000000000).toString(36);var C=new Date().getTime().toString(36);var E=D+C;document.cookie="__biuid="+E+"; max-age="+(60*60*24*365*2)+"; path=/; domain=.aibang.com";};var e=function(){var E="";var D=document.cookie;var G=D.indexOf("__biuid=");if(G!=-1){var F=G+8;var C=D.indexOf(";",F);if(C==-1){C=D.length;}E=D.substring(F,C);}return E;};var A=function(C){for(var D=0;D<o.length;++D){if(o[D]===C){return c[D];}}return null;};var y=function(){for(var C=0;C<arguments.length;++C){if(arguments[C].constructor===Array&&arguments[C].length>=2){n(arguments[C][0],arguments[C][1]);}}};var w=function(){var D=[];for(var C=0;C<o.length;++C){D.push(encodeURIComponent(o[C])+"="+encodeURIComponent(c[C]));}return v+"?"+D.join("&");};var d=function(){var C="";try{C=window.top.document.referrer;}catch(E){if(window.parent){try{C=window.parent.document.referrer;}catch(D){C="";}}}if(C===""){C=document.referrer;}return C;};var z=function(C){n("__type","page");x(C);};var u=function(){n("__type","event");x();};var x=function(D){n("__r",""+Math.random());n("__referer",d());n("__path",D||location.pathname);n("__search",typeof(location.search)==="string"?location.search:"");
n("__hash",typeof(location.hash)==="string"?location.hash:"");n("__host",typeof(location.hostname)==="string"?location.hostname:"");if(e()===""){g();}var C=w();h(C);B();};var h=function(D){var C=new Image;var E="imgtag_for_bilog_"+Math.floor(Math.random()*2147483648).toString(36);window[E]=C;C.onload=C.onerror=C.onabort=function(){C.onload=C.onerror=C.onabort=null;C=window[E]=null;};C.src=D;};var B=function(){return;var C=e();var D="http://p-cn.acxiom-online.com/pixel/sci?pid=3039&uid="+C+"&redir=http%3A%2F%2Faibang.com%2Facxiom.php%3Facxid%3D%23COOKIEID%23";var E='<iframe id="p-cn-acxiom-trace" height="0" width="0" frameborder="0" src="'+D+'" stype="display:none;"> </iframe>';if(!jQuery("#p-cn-acxiom-trace").length){jQuery("body").append(E);}};var r=function(){try{for(var D=a.length-1;D>=0;--D){var C=s(a[D]);if(C>=0){o.splice(C,1);c.splice(C,1);}}}catch(E){return false;}return true;};var q=function(C){if(l(C)&&l(C[0])){return C[0][0];}return null;};var b=function(C){if(k(C)&&C.length==2){n(C[0],C[1]);}};var i=function(D,C){for(var F=0;F<D.length;++F){var G=D[F];if(C===q(G)){for(var E=1;E<G.length;++E){b(G[E]);}if(C==="_tracePage"){z();}else{if(C==="_traceEvent"){u();}else{}}r();}}};var p=function(){var C=window._biq;window._biq=[];if(l(C)){i(C,"_tracePage");i(C,"_traceEvent");return true;}else{return false;}};return{get:A,set:n,setValues:y,tracePage:z,traceEvent:u,run:p};};function dealBIEvent(n,a){var d="",h="",p="";var g=n.parents("[bi]");if(typeof g!="undefined"&&g&&jQuery.trim(g.attr("bi"))){var b=jQuery.trim(g.attr("bi"));var f=b.split("|");var i=f.length;var d=jQuery.trim(f[0]);if(i>1){h=jQuery.trim(f[1]);}}if(p==""&&n.get(0).nodeName=="A"){p=jQuery.trim(n.text());var l=n.find("img");if(l&&l.attr("alt")){p=l.attr("alt");}}var k="";var q="",j="click";if(typeof n.attr("bi")!="undefined"&&jQuery.trim(n.attr("bi"))){var o=jQuery.trim(n.attr("bi"));var c=o.split("|");if(Object.prototype.toString.call(c)!="[object Array]"||c.length<=0){return false;}var e=c.length;if(jQuery.trim(c[0])!=""){d=jQuery.trim(c[0]);
}if(e>1&&c[1]){h=jQuery.trim(c[1]);}if(e>2&&c[2]){p=jQuery.trim(c[2]);}if(e>3&&c[3]){j=jQuery.trim(c[3]);}if(e>4){k=jQuery.trim(c[4]);}if(e>5){q=jQuery.trim(c[5]);}}if(h==""){var m=n.parent("li");if(m&&g&&m!==g){h=g.children("li").index(m);}if(h==-1){h="";}}if(d==""||p==""){return false;}if(a==true){window._biq.push([["_traceEvent"],["zone",""+d],["index",""+h],["label",""+p],["action","click"],["params",""+k],["value",""+q]]);}else{window._biq.push([["_traceEvent"],["zone",""+d],["index",""+h],["label",""+p],["action","load"],["params",""+k],["value",""+q]]);}if(typeof window._bie!="undefined"){window._bie.run();}}function bindDivBIEvent(){jQuery("div[bi] a,ul[bi] li>a").mousedown(function(){dealBIEvent(jQuery(this),true);jQuery(this).data("_bi",true);});jQuery("a[bi*=__load__]").each(function(){dealBIEvent(jQuery(this),false);});jQuery("div[bi],img[bi],input[bi],ul[bi],span[bi],a[bi]").mousedown(function(){if(typeof jQuery(this).data("_bi")=="undefined"){dealBIEvent(jQuery(this),true);}});}bindDivBIEvent();window._bie=new _abbi("");window._bie.run();