function isSingleInstanceProd(s){var n=["mn","ma","im_hi"];return("|"+n.join("|")+"|").indexOf("|"+s+"|")>-1}function isLoginInstance(s){var s=s||"login";return"login"==s}function saveInitInstance(s){window._pass_popinit_instance=s}function getInitInstance(){return window._pass_popinit_instance}var passport=passport||window.passport||{};passport._modulePool=passport._modulePool||{},passport._define=passport._define||function(s,n){passport._modulePool[s]=n&&n()},passport._getModule=passport._getModule||function(s){return passport._modulePool[s]},passport.pop=passport.pop||{},passport.pop.insertScript=passport.pop.insertScript||function(s,n){var i=document,a=i.createElement("SCRIPT");a.type="text/javascript",a.charset="UTF-8",a.readyState?a.onreadystatechange=function(){("loaded"==a.readyState||"complete"==a.readyState)&&(a.onreadystatechange=null,n&&n())}:a.onload=function(){n&&n()},a.src=s,i.getElementsByTagName("head")[0].appendChild(a)},passport.pop.init=passport.pop.init||function(s){var n={"http:":"http://passport.bdimg.com","https:":"https://ss0.bdstatic.com/5LMZfyabBhJ3otebn9fN2DJv"};if(isSingleInstanceProd(s.apiOpt.product)&&isLoginInstance(s.type)&&getInitInstance())return getInitInstance();if(s&&"https"==s.protocol)var i="https:";else var i=window.location?window.location.protocol.toLowerCase():document.location.protocol.toLowerCase();var a={uni_login:"/passApi/js/uni_login_2ed2c6a.js",uni_login_tangram:"/passApi/js/uni_login_tangram_cc80ed7.js",uni_loginPad:"/passApi/js/uni_loginPad_0a49027.js",uni_loginPad_tangram:"/passApi/js/uni_loginPad_tangram_a537d34.js",uni_smsloginEn:"/passApi/js/uni_smsloginEn_425679b.js",uni_smsloginEn_tangram:"/passApi/js/uni_smsloginEn_tangram_1b951c7.js",uni_loginWap:"/passApi/js/uni_loginWap_a3bcace.js",uni_loginWap_tangram:"/passApi/js/uni_loginWap_a3bcace.js",uni_accConnect:"/passApi/js/uni_accConnect_6ee1d14.js",uni_accConnect_tangram:"/passApi/js/uni_accConnect_tangram_77ce786.js",uni_accRealName:"/passApi/js/uni_accRealName_eeb7a69.js",uni_accRealName_tangram:"/passApi/js/uni_accRealName_tangram_d2fde30.js",uni_checkPhone:"/passApi/js/uni_checkPhone_33dfe2d.js",uni_checkPhone_tangram:"/passApi/js/uni_checkPhone_tangram_5897c58.js",uni_checkIDcard:"/passApi/js/uni_checkIDcard_5f939dd.js",uni_checkIDcard_tangram:"/passApi/js/uni_checkIDcard_tangram_9a79e52.js",uni_accSetPwd:"/passApi/js/uni_accSetPwd_c0684ac.js",uni_accSetPwd_tangram:"/passApi/js/uni_accSetPwd_tangram_6e119ea.js",uni_IDCertify:"/passApi/js/uni_IDCertify_e00fb22.js",uni_IDCertify_tangram:"/passApi/js/uni_IDCertify_tangram_05fc271.js",uni_loadingApi:"/passApi/js/uni_loadingApi_a9fde81.js",uni_loadingApi_tangram:"/passApi/js/uni_loadingApi_tangram_97a69be.js",uni_multiBind:"/passApi/js/uni_multiBind_1cd95ca.js",uni_multiBind_tangram:"/passApi/js/uni_multiBind_tangram_a0d5032.js",uni_multiUnbind:"/passApi/js/uni_multiUnbind_1252597.js",uni_multiUnbind_tangram:"/passApi/js/uni_multiUnbind_tangram_e95c311.js",uni_changeUser:"/passApi/js/uni_changeUser_97f4b6b.js",uni_changeUser_tangram:"/passApi/js/uni_changeUser_tangram_4e848d3.js",uni_loginMultichoice:"/passApi/js/uni_loginMultichoice_7441743.js",uni_loginMultichoice_tangram:"/passApi/js/uni_loginMultichoice_tangram_e652e30.js",uni_confirmWidget:"/passApi/js/uni_confirmWidget_d97468e.js",uni_confirmWidget_tangram:"/passApi/js/uni_confirmWidget_tangram_712bda2.js"},e={login:"/passApi/css/uni_login_new_169cd58.css",loginWap:"/passApi/css/uni_loginWap_f57424a.css",smsloginEn:"/passApi/css/uni_smsloginEn_a05707e.css",accConnect:"/passApi/css/uni_accConnect_ab6dda9.css",accRealName:"/passApi/css/uni_accRealName_72e7190.css",checkPhone:"/passApi/css/uni_checkPhone_cd7c7a0.css",checkIDcard:"/passApi/css/uni_checkIDcard_be79680.css",accSetPwd:"/passApi/css/uni_accSetPwd_29f7784.css",IDCertify:"/passApi/css/uni_IDCertify_7650818.css",loadingApi:"/passApi/css/uni_loadingApi_f8732c0.css",loginPad:"/passApi/css/uni_loginPad_af389a4.css",multiBind:"/passApi/css/uni_multiBind_e8d24e4.css",multiUnbind:"/passApi/css/uni_multiUnbind_21428a6.css",changeUser:"/passApi/css/uni_changeUser_c7ae7b4.css",loginMultichoice:"/passApi/css/uni_loginMultichoice_289d3a0.css",confirmWidget:"/passApi/css/uni_confirmWidget_7833808.css",uni_rebindGuide:"/passApi/css/uni_rebindGuide_347ecf2.css"},t=n[i]||n["https:"],s=s||{};s.type=s.type||"login";var p,c=document,s=s||{},o=("_PassUni"+(new Date).getTime(),t+e[s.type]);s.cssUrlWrapper&&(o=cssUrlWrapper.join("uni_login.css")),p={show:function(){return p.loadPass(s.apiOpt),p.willShow=!0,p},setSubpro:function(n){return s.apiOpt&&(s.apiOpt.subpro=n),p},setMakeText:function(n){return s.apiOpt&&(s.apiOpt.makeText=n),p},loadPass:function(){var n=c.createElement("link");n.rel="stylesheet",n.type="text/css",n.href=o,n.disabled=!1,n.setAttribute("data-for","result"),c.getElementsByTagName("head")[0].appendChild(n),p.show=function(){return p.willShow=!0,p},s.plugCss&&(n=c.createElement("link"),n.rel="stylesheet",n.type="text/css",n.href=s.plugCss,n.disabled=!1,n.setAttribute("data-for","result"),c.getElementsByTagName("head")[0].appendChild(n)),p.passCallback(),delete p.loadPass},passCallback:function(){p.components.length>0?passport.pop.insertScript(p.components.shift(),p.passCallback):(passport.pop[s.type](s,p,function(){p.willShow&&p.show(),s&&s.onRender&&s.onRender()}),delete p.passCallback,delete p.components)},components:[]};var _="uni_"+s.type;return s.tangram&&(_+="_tangram"),s.apiOpt&&"ik"==s.apiOpt.product&&Math.random()<.3&&(p.components.push(t+"/passApi/js/uni/passhunt.js"),s.hunter=!0),p.components.push(t+a[_]),s.cache&&p.loadPass(s.apiOpt),s.id&&c.getElementById(s.id)&&(c.getElementById(s.id).onclick=function(){p.show()}),isSingleInstanceProd(s.apiOpt.product)&&isLoginInstance(s.type)&&saveInitInstance(p),p};