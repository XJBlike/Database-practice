define("common:widget/ui/genericRequest/GenericRequest.js",function(e,n,t){function i(){T.lang.Class.call(this),this.json=null,this.gInfo={},this.qWord="",this.qCity=-1,this.listeners={},this.isGRequest=!1,this.isableGenUIRequest=!0,this.isableGRequestByMapChanged=!0,this.isableGenMDRequest=!1,this.GRCircleRadius=1e3,this.isGRCircleShow=!0,this.isClearBeforeSend=!0,this.queryStr="",this.uiPermit=1e3,this.openedMarker=null,this.curSearchCPt=null,this.types={36:{t:1},37:{t:2},38:{t:1},39:{t:1},40:{t:2}},this.disabledGR=!1,this.initialize(),this.xhrs=[],this.resCache=[],this.duplicate=0,this.xhrComplete=0}var s=e("common:widget/ui/util/util.js"),o=e("common:widget/ui/config/config.js"),r=e("common:widget/ui/constant/Constant.js"),a=e("common:widget/ui/mapInfo/mapInfo.js"),c=e("common:widget/com/componentManager.js"),d=e("common:widget/ui/fullScreen/fullScreen.js"),u=(e("common:widget/ui/indexUtil/IndexUtil.js"),e("common:widget/ui/searchData/searchData.js")),l=e("common:widget/ui/mapShare/MapShare.js"),p=(e("pano:widget/PanoUtil/PanoUtil.js"),o.modelConfig),h=(o.MapConfig,e("common:widget/search/SearchUrlParam.js")),m=e("common:widget/ui/FilterStatus/FilterStatus.js"),f=new BMap.Icon(r.A_J_MARKER_IMG_NEW,new BMap.Size(10,10),{imageOffset:new BMap.Size(-107,-232),offset:new BMap.Size(5,5),infoWindowOffset:new BMap.Size(5,0),imageSize:new BMap.Size(r.A_J_MARKER_IMG_NEW_WIDTH,r.A_J_MARKER_IMG_NEW_HEIGHT),srcSet:r.A_J_MARKER_IMG_NEW2X_SRCSET}),g=new BMap.Icon(r.A_J_MARKER_IMG_NEW,new BMap.Size(10,10),{imageOffset:new BMap.Size(-107,-242),offset:new BMap.Size(5,5),infoWindowOffset:new BMap.Size(5,0),imageSize:new BMap.Size(r.A_J_MARKER_IMG_NEW_WIDTH,r.A_J_MARKER_IMG_NEW_HEIGHT),srcSet:r.A_J_MARKER_IMG_NEW2X_SRCSET}),R=[],v=[],G=50,_=50;T.extend(i.prototype,{initialize:function(e){try{for(var n in e)"undefined"!=typeof e[n]&&(this[n]=e[n]);this.clearCache()}catch(t){"undefined"!=typeof alog&&alog("exception.fire","catch",{msg:t.message||t.description,path:"common:widget/ui/genericRequest/GenericRequest.js",ln:128})}},setGRData:function(e,n){return this.disabledGR?(this.clearCache(),void this.clearGRMap()):void(e&&(this.json=e,this.gInfo=n||{},this.clearListener(),this.resetStatus(),addStat("poisearch.gr.show","show",{da_e_name:"pcmap3",da_trd:"new"})))},resetStatus:function(){var e=this.json.result.type.toString(),n=this.json.content;this.types[e]&&(this.isGRequest=!0,1==this.types[e].t?n&&0!=n.length?this.addGRMap():(this.clearGRMap(),this.clearListener()):2==this.types[e].t&&(this.clearGRMap(),this.clearListener()),this.addMDEvent(),this.curSearchCPt=map.getCenter())},clearBeforeSendAtBase:function(){this.isClearBeforeSend?this.clearListener():this.isClearBeforeSend=!0},clearAfterGetAtBase:function(e){var n={36:"poiSearch",38:"circleSearch",39:"searchInView"},t={18:"busLine",6:"busLineStop",27:"rightClick"},i=e.result.type;if(i&&(2!=i||!e.content||0!=e.content.error)&&!n[i]){if(t[i])return;{e.result.return_query||"",e.result.wd2||""}this.qWord="",this.qCity=-1,this.clearGRMap(),this.openedMarker=null}},clearCache:function(){var e=this;e.isableGenUIRequest=!0,e.isableGRequestByMapChanged=!0,e.isGRequest=!1,e.isableGenMDRequest=!1,e.clearListener(),this.clearXHRCache()},clearXHRCache:function(){if(this.xhrs&&this.xhrs.length)for(var e=0;e<this.xhrs.length;e++){var n=this.xhrs[e];n.abort()}this.xhrs=[],this.resCache=[]},checkEventBind:function(e,n,t,i){return e?n[t]&&n[t]==i?!1:(n[t]=i,!0):n[t]&&n[t]==i?(n[t]="",delete n[t],!0):!1},clearListener:function(e){var n=this;e&&"ui"!=e||(n.checkEventBind(!1,n.listeners,"map_load","bindGenResLoad")&&map.removeEventListener("load",n.bindGenResLoad),n.checkEventBind(!1,n.listeners,"map_moveend","bindGenResMove")&&map.removeEventListener("moveend",n.bindGenResMove),n.checkEventBind(!1,n.listeners,"map_zoomend","bindGenResZoom")&&map.removeEventListener("zoomend",n.bindGenResZoom),n.checkEventBind(!1,n.listeners,"map_mapcontainerresize","bindGenResResize")&&map.removeEventListener("mapcontainerresize",n.bindGenResResize))},clearGRMap:function(){for(var e=0;e<R.length;e++)map.removeOverlay(R[e]);R=[],this.resCache=[]},clearLastMarkers:function(){for(var e=0;e<v.length;e++)map.removeOverlay(v[e]);v=[]},addGRMap:function(){if(map.getMapType()!==BMAP_EARTH_MAP){var e=this;if(e.json&&("&gr=2"===e.gInfo.cinfo.genRequestKey&&(v=R,R=[]),e.clearGRMap(),!(38===e.json.result.type&&map.zoomLevel<11))){this.duplicate=0,this.xhrComplete=0,this.clearXHRCache();var n=Math.min(G,this.json.result.total),t=Math.ceil(n/_),i=T.Deferred();listener.once("search.poi."+this.gInfo.guid,"lastanimationend",function(){i.resolve()});for(var s=0;t>s;s++)e.xhrs.push(e.fetchSpot(e.gInfo.pageReq+"&rn="+_,s,t,i))}}},fetchSpot:function(e,n,t,i){e=e.replace(/pn=(\d+)/,"pn="+n),e=e.replace(/nn=(\d+)/,"nn="+n*_),0===e.indexOf("con")?e=e.replace("con","spot"):0===e.indexOf("nb")&&(e=e.replace("nb","spot"));var s=this;return u.fetch(e,function(e){s.xhrComplete++,s.resCache.push(e),s.xhrComplete===t&&i.done(function(){s.renderSpots()})})},renderSpots:function(){try{for(var e=this,n=this.json.content,t=0;t<this.resCache.length;t++){var i=this.resCache[t];if(i&&i.content)for(var o=0;o<i.content.length;o++){var r=!1;if(this.duplicate<n.length)for(var a=0;a<n.length;a++)if(n[a].uid===i.content[o].uid){this.duplicate++,r=!0;break}if(!r){var c=s.parseGeo(i.content[o].geo),d=s.getPointByStr(c.points),u=new BMap.Marker(d,{icon:f,title:i.content[o].name,startAnimation:"marker-fadein"});u.uid=i.content[o].uid,R.push(u),u.addEventListener("mouseover",function(){this.setIcon(g),this.setTop(!0,27e7)}),u.addEventListener("mouseout",function(){e.onMarker!==this&&(this.setIcon(f),this.setTop(!1))}),u.addEventListener("click",function(){addStat("poisearch.gr.click","click",{da_e_name:"pcmap3",da_trd:"new"});var n=this;e.onMarker=n,s.loadSearchInfo(function(t){e.sendInfoRequest(n.uid,t)})}),map.addOverlay(u)}}}R.length&&v.length&&s.vendorEvent(R[0].iconDom,"animationend",function(){e.clearLastMarkers()})}catch(l){"undefined"!=typeof alog&&alog("exception.fire","catch",{msg:l.message||l.description,path:"common:widget/ui/genericRequest/GenericRequest.js",ln:416})}},sendInfoRequest:function(e,n){if(e){var t=this;l.listIndex="uid,"+e;var i="inf&uid="+e+"&ie=utf-8&t="+(new Date).getTime();u.fetch(i,function(e){t.getInfData(e,n)},function(e){console.log("sendInfoRequest:",e)})}},getInfData:function(e,n){var t=this,i=e.content,o=s.getPointByStr(s.parseGeo(i.geo).points);if(!a)var a={};var c=i.addr;(i.poiType==r.POI_TYPE_BUSSTOP||i.poiType==r.POI_TYPE_SUBSTOP)&&(c=T.array.unique(c.split(";")).join("; "));var d=i.tel;d&&(d=d.replace(/,/g,", "));var u=t._getCateInfo(i.cla),p={};i.ext&&i.ext.detail_info&&i.ext.detail_info.origin_id&&(p=i.ext.detail_info.origin_id);var h=n.createSearchInfoWnd({title:i.name,addr:c,tel:d,uid:i.uid,cate:u,ext_type:i.ext_type,detail:i.detail,poiType:i.poiType,hasDetail:i.detail&&i.ty==r.GEO_TYPE_POINT||i.poiType==r.POI_TYPE_BUSLINE||i.poiType==r.POI_TYPE_SUBLINE,ext:i.ext,cp:i.cp,cla:i.cla,origin_id:p,pano:i.pano||0,indoor_pano:i.indoor_pano||0,catId:i.new_catalog_id},{cityCode:t.sCityCode,x:o.lng,y:o.lat});h&&(t.openedMarker={uid:i.uid,geo:i.geo,name:i.name},h.addEventListener("open",function(){var e=this.overlay;try{e.setIcon(g),e.setTop(!0,27e7)}catch(n){}window.spotInfoWnd=!0,t.setGRequestFlg(1500),h.removeEventListener("open",arguments.callee)}),h.addEventListener("close",function(){window.spotInfoWnd=!1,l.listIndex="",this.overlay.setIcon(f),this.overlay.setTop(!1),t.openedMarker=null,h.removeEventListener("close",arguments.callee)}),t.onMarker&&(a.from="gr",n.openSearchInfoWnd(h,t.onMarker,a)))},setGRequestFlg:function(e){var n=this;n.isableGRequestByMapChanged=!1,setTimeout(function(){n.isableGRequestByMapChanged=!0},e)},ifChangeMap:function(){if(!this.json)return{f:0};if(1==this.json.result.op_gel){var e=new BMap.Point(this.json.result.res_x,this.json.result.res_y);return{f:1,p:e,l:this.json.result.res_l}}return{f:2}},checkMove:function(){var e=this;if(!e.curSearchCPt||a&&a.isGoing||d&&d.isGoing)return!1;var n=map.pointToPixel(e.curSearchCPt),t=map.pointToPixel(map.getCenter()),i=Math.abs(n.x-t.x),s=Math.abs(n.y-t.y);return i>=.2*map.width||s>=.2*map.height?!0:!1},addMDEvent:function(){var e=this;e.clearListener(),e.bindGenResLoad||(e.bindGenResLoad=function(){e.sendGenRequest()}),e.bindGenResDrag||(e.bindGenResDrag=function(){1==e.checkMove()&&e.sendGenRequest("&gr=2")}),e.bindGenResMove||(e.bindGenResMove=function(){1==e.checkMove()&&e.sendGenRequest("&gr=2")}),e.bindGenResZoom||(e.bindGenResZoom=function(){e.sendGenRequest("&gr=1")}),e.bindGenResResize||(e.bindGenResResize=function(){e.sendGenRequest()}),e.checkEventBind(!0,e.listeners,"map_load","bindGenResLoad")&&map.addEventListener("load",e.bindGenResLoad),e.checkEventBind(!0,e.listeners,"map_moveend","bindGenResMove")&&map.addEventListener("moveend",e.bindGenResMove),e.checkEventBind(!0,e.listeners,"map_zoomend","bindGenResZoom")&&map.addEventListener("zoomend",e.bindGenResZoom),e.checkEventBind(!0,e.listeners,"map_mapcontainerresize","bindGenResResize")&&map.addEventListener("mapcontainerresize",e.bindGenResResize)},sendGenRequest:function(e){var n=this,t=window;if(n.curSearchCPt=map.getCenter(),n.json){if(38==n.json.result.type&&map.getZoom()<11)return n.clearGRMap(),void listener.trigger("generequest","poisearch",{type:""});if(n.isableGenUIRequest&&n.isableGRequestByMapChanged){n.clearListener(),e||(e="");var i=n.json.result.return_query,o="&c="+p.cityCode+"&wd="+encodeURIComponent(i)+"&da_src=pcmappg.map&on_gel=1&l="+map.getZoom()+e;n.json.result.wd2&&(o+="&wd2="+n.json.result.wd2);var r=map.getBounds();o+="&b=("+r.minX+","+r.minY+";"+r.maxX+","+r.maxY+")",n.isableGenUIRequest=!1;var a=h.getParams(),d=baidu.url.jsonToQuery(a,encodeURIComponent)||"",u=n.json.result.type;switch(u){case 36:listener.trigger("generequest","poisearch",{type:u,logstr:e}),setTimeout(function(){n.isableGenUIRequest=!0},n.uiPermit);var l=n.judgeFilter();l!==!1?(o=o.replace("&on_gel=1","").replace("&gr=2",""),n.queryStr="s"+o+"&"+d,n.queryStr+="&district_name="+encodeURIComponent(l.districtName)+"&business_name="+encodeURIComponent(l.businessName),t.currentComponent.modelQuery=n.queryStr,c.go(n.queryStr,{dom:T.G("MapInfo"),cinfo:{genRequestKey:e,noChangeMap:!0,isFilter:!0},isMainRequest:"no"})):(n.queryStr="s"+o+"&"+d,t.currentComponent.modelQuery=n.queryStr,c.go(n.queryStr,{dom:T.G("MapInfo"),cinfo:{genRequestKey:e},isMainRequest:"no"}));break;case 37:listener.trigger("generequest","poisearch",{type:u,logstr:e}),setTimeout(function(){n.isableGenUIRequest=!0},n.uiPermit),n.queryStr="s"+o,c.go(n.queryStr,{dom:T.G("MapInfo"),isMainRequest:"no"});break;case 38:var m="";if(listener.trigger("generequest","poisearch",{type:u,logstr:e}),n.json.center&&n.json.center.poi){m+="&uid="+n.json.center.poi[0].uid;var f=s.getPointByStr(s.parseGeo(n.json.center.poi[0].geo).points);m+="&nb_x="+f.lng,m+="&nb_y="+f.lat}else n.gInfo.cinfo.centerPoint&&(m+="&nb_x="+n.gInfo.cinfo.centerPoint.lng,m+="&nb_y="+n.gInfo.cinfo.centerPoint.lat);n.GRCircleRadius&&(m+="&gr_radius="+n.GRCircleRadius),setTimeout(function(){n.isableGenUIRequest=!0},n.uiPermit),t.currentComponent.modelQuery="nb"+o+m,n.gInfo.cinfo?c.go("nb"+o+"&"+d+m,{dom:T.G("MapInfo"),cinfo:n.gInfo.cinfo,isMainRequest:"no"}):c.go("nb"+o+"&"+d+m,{dom:T.G("MapInfo"),isMainRequest:"no"});break;case 39:listener.trigger("generequest","searchinview",{type:u,logstr:e}),setTimeout(function(){n.isableGenUIRequest=!0},n.uiPermit),t.currentComponent.modelQuery="bd"+o,c.go("bd"+o+"&"+d,{dom:T.G("MapInfo"),cinfo:{genRequestKey:e},isMainRequest:"no"});break;case 40:listener.trigger("generequest","searchinview",{type:u,logstr:e}),setTimeout(function(){n.isableGenUIRequest=!0},n.uiPermit),c.go("bd"+o,{dom:T.G("MapInfo"),isMainRequest:"no"})}}}},_getCateInfo:function(e){for(var n=[],t=0,i=e.length;i>t;t++)n.push(e[t][1]),i-1>t&&n.push(", ");return n.join("")},getDataForSnap:function(){if(this.isGRequest&&this.json){var e=this.json.result.return_query||"",n=this.json.result.wd2||"",t="bkg_png",i=p.cityCode;return{wd:e,wd2:n,qt:t,c:i}}return!1},judgeFilter:function(){return m.active?{districtName:m.districtName,businessName:m.businessName}:!1}}),t.exports=i});