(function(){var B=new Date().getTime();if(window.BDWidget){return;}var _=window;do{try{_=_.parent;if(_.document.domain==document.domain){if(_.BDWidget){window.BDWidget=_.BDWidget;window.BDWidgetInheritFrom=_;return;}continue;}}catch(A){}break;}while(_!=top);window.BDWidget={};window.BDWidgetLoaderStartTime=B;})();!window.BDWidgetInheritFrom&&(function(){var _=window.BDWidget,B=_.LIB=_.LIB||{};B.getParam=function(C,B){var A=new RegExp("(?:^|\\?|#|&)"+C+"=([^&#]*)(?:$|&|#)","i"),_=A.exec(B||location.href);return _?_[1]:"";};var A=_.INFO=_.INFO||{};A.platform="disk";A.path="https://pan.baidu.com";A.OAUTH_URL="https://openapi.baidu.com/oauth/2.0/authorize?response_type=token&scope=basic netdisk&display=dialog&callback=js";A.inited=false;A.version=20120605;A.api={"dialog.transfer":{src:A.path+"/disk/widget",widget_type:"transfer"},"dialog.open":{src:A.path+"/disk/widget",widget_type:"open"},"dialog.insertfrom":{src:A.path+"/disk/widget",widget_type:"insertfrom"}};A.scripts={"conf.js":{path:A.path+"/res/static/thirdparty/widget/conf.js?r="+A.version},"lib.js":{path:A.path+"/res/static/thirdparty/widget/lib.js?r="+A.version},"dialog.js":{path:A.path+"/res/static/thirdparty/widget/dialog.js?r="+A.version}};})();(function(){var A=window.BDWidget=window.BDWidget||{},C=A.INFO=A.INFO||{},E=A.LIB=A.LIB||{};E.loadScript=function(F,G,B){var C=document.getElementsByTagName("head")[0],_=!!window.ActiveXObject,A=document.createElement("script");function D(){if(!A||(_&&!(A.readyState=="loaded"||A.readyState=="complete"))){return;}E.purgeEvent(A,_?"readystatechange":"load");!_&&E.purgeEvent(A,"error");A.src="";C.removeChild(A);A=null;G&&G(B);}E.attachEvent(A,_?"readystatechange":"load",D);!_&&E.attachEvent(A,"error",D);A.src=F;C.appendChild(A);};E.loadScriptsAsyn=function(A,C,B){var _=0;fn=function(_){if(_<A.length-1){_++;E.loadScript(A[_],fn,_);}else{C&&C(B);}};E.loadScript(A[_],fn,_);};E.loadScriptsSyn=function(A,F,B){var _,D,C,_=D=0,C=A.length;fn=function(){D++;if(D==C){F&&F(B);}};for(;_<C;_++){E.loadScript(A[_],fn);}};var B=[];function D(){var C;for(var A=0,_=B.length;A<_;A++){C=B[A];if(C&&(!("parentNode"in C)||C.parentNode)&&C.__FEL){E.purgeEvent(C);C.__FEL=null;}}}E.attachEvent=function(C,_,G){if(!C||typeof G!="function"){return;}if(!C.__FEL){if(B.length==0){if(window.addEventListener){window.addEventListener("beforeunload",D,false);}else{if(window.attachEvent){window.attachEvent("onbeforeunload",D);}}}B.push(C);}var F=C.__FEL=C.__FEL||{},E=(F[_]=F[_]||[null]).length;G.__FEID=E;var A=F[_][E]=function(_){G(_||window.event);};if(C.addEventListener){C.addEventListener(_,A,false);}else{if(C.attachEvent){C.attachEvent("on"+_,A);}}};E.detachEvent=function(C,A,F){if(!C||typeof F!="function"){return;}var D=F.__FEID,E=C.__FEL,_,B;if(!(D&&E&&(_=E[A])&&(B=_[D]))){_[D]=null;B=F;}if(C.removeEventListener){C.removeEventListener(A,B,false);}else{if(C.detachEvent){C.detachEvent("on"+A,B);}}};function _(D,B,E){if(!D||!E){return;}var C;for(var A=1,_=E.length;A<_;A++){if(C=E[A]){if(D.removeEventListener){D.removeEventListener(B,C,false);}else{if(D.detachEvent){D.detachEvent("on"+B,C);}}E[A]=null;}}}E.purgeEvent=function(B,A){var D;if(!B||!(D=B.__FEL)){return;}if(A){_(B,A,D[A]);}else{for(var C in D){_(B,A,D[C]);}}};A.init=function(_,B){var A=this;C.appid=_;if(!C.inited){E.loadScriptsAsyn([C.scripts["lib.js"].path,C.scripts["dialog.js"].path,"http://openapi.baidu.com/connect/js/v2.0/featureloader"],function(){C.inited=true;(typeof B=="function")&&B.call(A);});}else{(typeof B=="function")&&B.call(A);}return this;};})();