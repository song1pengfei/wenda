<!DOCTYPE html>
<!-- saved from url=(0040)https://zhidao.baidu.com/ihome/ask?tab=1 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=GBK">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		
		<meta property="wb:webmaster" content="3aababe5ed22e23c">
		<meta name="referrer" content="always">
		<title>个人中心_百度知道</title>
		<link rel="shortcut icon" href="https://zhidao.baidu.com/favicon.ico" type="image/x-icon">
		<link rel="icon" sizes="any" mask="" href="https://www.baidu.com/img/baidu.svg">
      			
<script async="" src="{{asset('home/js/feature.min.js')}}"></script>
<script async="" src="{{asset('home/js/dp.min.js')}}"></script>
<script async="" src="{{asset('home/js/6.min.js')}}" id="dv_new_FIAOWNBFDIQIL"></script>
<script src="{{asset('home/js/hm.js')}}"></script>
<script async="" src="{{asset('home/js/alog.min.js')}}"></script>
<script async="" src="{{asset('home/js/jquery-1.8.3.min.js')}}"></script>
<script>
    window.alogObjectConfig = {
        product: '102',
        page: '102_7', 
        monkey_page: 'zhidao-q',
        speed_page: '7',
        speed: {
            sample: '0.2'
        },
        monkey: {
            sample: '0.1'
        },
        exception: { 
            sample: '0.1'
        },
        feature: {
            sample: '0.1'
        },
        cus: {
            sample: '0.1',
            custom_metrics: ["c_sbox","c_menu"]
        },
        csp: {
            sample: '0.2',
            'default-src': [
                {match: '*bae.baidu.com', target: 'Accept,Warn'},
                {match: '*.baidu.com,*.bdstatic.com,*.bdimg.com,localhost,*.hao123.com,*.hao123img.com', target: 'Accept'},
                {match: /^(127|172|192|10)(\.\d+){3}$/, target: 'Accept'},
                {match: '*', target: 'Accept,Warn'}
            ]
        }
    };
 
    void function(a,b,c,d,e,f,g){a.alogObjectName=e,a[e]=a[e]||function(){(a[e].q=a[e].q||[]).push(arguments)},a[e].l=a[e].l||+new Date,d="https:"===a.location.protocol?"https://fex.bdstatic.com"+d:"http://fex.bdstatic.com"+d;var h=!0;if(a.alogObjectConfig&&a.alogObjectConfig.sample){var i=Math.random();a.alogObjectConfig.rand=i,i>a.alogObjectConfig.sample&&(h=!1)}h&&(f=b.createElement(c),f.async=!0,f.src=d+"?v="+~(new Date/864e5)+~(new Date/864e5),g=b.getElementsByTagName(c)[0],g.parentNode.insertBefore(f,g))}(window,document,"script","/hunter/alog/alog.min.js","alog"),void function(){function a(){}window.PDC={mark:function(a,b){alog("speed.set",a,b||+new Date),alog.fire&&alog.fire("mark")},init:function(a){alog("speed.set","options",a)},view_start:a,tti:a,page_ready:a}}();
    void function(n){var o=!1;n.onerror=function(n,e,t,c){var i=!0;return!e&&/^script error/i.test(n)&&(o?i=!1:o=!0),i&&alog("exception.send","exception",{msg:n,js:e,ln:t,col:c}),!1},alog("exception.on","catch",function(n){alog("exception.send","exception",{msg:n.msg,js:n.path,ln:n.ln,method:n.method,flag:"catch"})})}(window);
</script>

		
<script>
	!function(document, window){
		var log = {
			list: [],
			host: 'https://' + location.host + '/api/httpscheck',
			log: function(param) {
				var a = [];
		    	for(var k in param) {
		    		a.push(k + '=' + param[k]);
		    	}
		    	var msg = a.join('&');
		    	if(~this.list.indexOf(msg)){
		    		return;
		    	}
		    	this.list.push(msg);
		  		var img = new Image();
		    	var key = '_ik_log_' + (Math.random()*2147483648 ^ 0).toString(36);
		    	window[key] = img;
		    		img.onload = img.onerror = img.onabort = function() {
		        		img.onload = img.onerror = img.onabort = null;
		        		window[key] = null;
			    		img = null;
		    	};
		  		img.src = this.host + '?' + msg;
			}
		};

		function HTTPSWarningLog(){
			this.selector = [
				'link',
				'script',
				'img',
				'embed',
				'iframe'
			];
			this.warningCounter = 0;
			this.init();
		};

		HTTPSWarningLog.prototype = {
			init: function(){
				this.fetch();
			},

			fetch: function(){
				for(var tags = this.selector, i =0, len = tags.length; i < len;i++) {
					this.getTag(tags[i]);
				}
			},

			getTag: function(tag) {
				var domList = document.getElementsByTagName(tag);
				if(!domList.length) {
					return;
				}
				for(var i = 0,len = domList.length;i<len;i++) {
					var el = domList[i];
					var url = el.getAttribute(el.tagName==='LINK' ? 'href' : 'src');
                    if(el.getAttribute('rel') === 'canonical') {
                        continue;
                    }
					if(url && 'https:' === location.protocol && !url.indexOf('http:')){
						this.sendLog(el, el.tagName.toLowerCase(),url);
						this.warningCounter++;
					}
				}
			},
			
			sendLog: function(el, type, url){
				log.log({
					url: location.href,
					wtype: type,
					wurl: url
				});
			}
		};

		function domReady(fn){
		    if(document.addEventListener) {
		        document.addEventListener('DOMContentLoaded', function() {
		            document.removeEventListener('DOMContentLoaded',arguments.callee, false);
		            fn();
		        }, false);
		    }else if(document.attachEvent) {
		        document.attachEvent('onreadystatechange', function() {
		            if(document.readyState == 'complete') {
		                document.detachEvent('onreadystatechange', arguments.callee);
		                fn();
		            }
		        });
		    }
		};

		domReady(function(){
			new HTTPSWarningLog();
			for(var i=1; i<6; i++) {
				!function(i){
					setTimeout(function(){
						new HTTPSWarningLog();
					}, i*i*i*1000);
				}(i);
			}
		});
	}(document, window);
</script>
		        



		<script type="text/javascript">
			!function(){var n={},t={};n.context=function(n,e){var i=arguments.length;if(i>1)t[n]=e;else if(1==i){if("object"!=typeof n)return t[n];for(var o in n)n.hasOwnProperty(o)&&(t[o]=n[o])}},"F"in window||(window.F=n)}();;
			
            
																																																					
			F.context('user', {"isLogin":"1","isRealName":"2","stoken":"5c88df5694935015c2e8d40ccc63cf0e","name":"sunny\u845b\u5b89\u6c11","imId":"ed7a73756e6e79e8919be5ae89e6b091a69c","id":"","wealth":"","gradeIndex":"1","isMavin":"0","encryptedBDUSS":"7438fvSjD4Fq6zfTK+YZNQGvlpVZD0ALLfUQ+2Wp9DL9l8iwOOK05ND6YC9tyl0T\/4n4Ug4U4\/Gpx763Yy8lcBCZyDyAseW7QrIF81sH\/czvVoqu3ISG+TYiYvPhD9samsglbW2nAFDrJeALIEgGkekbIRE77\/0s\/JSoDqA10tvgOWGI0H1t0AYq6cXaHVbu45EDJLzFgLLGDAt8ARd9Mnc8XgAEjYszltUYQlo278pCEtvARZcPJwSIWfG44LkLiXWrfT1RM3y2mPVlCmM92ceXGh6BhwllOMV1aIA","ECBD":"eC41S2voibARAC7ae001K0M6VKhxSNnd3kU1KlNf8Jmny+clSXW4ykb83XAsVC+ZKC9+ZgbpF+QGTZXwaBQ8xT5yZqa6ou1Fpzmu9bA1ntzZLCKfRgZhVSh90HL9y+O04FCzZjFrvO7J3NIbl992SBkBgYbDiK4bY9KQZwXuQg4Fku14+DpUjzReJJs+4xt1Qg2OzxBvFqSzb5uXCU\/hRfMtgCvtgbmh1JP5kAoiB2MJg9JANqNg3Jd4ChW8AJQHQBQu233V+FxfxUA+GCcX0Q=="});
			F.context('user')['internalAdmin'] = [];

									
					        		        		            		        		            		        		        
		        F.context({
		            'sign-in' : {
		                'isSignIn' : '0',
		                'signinDays' : '[]',
		                'speedToday': '0',
		                'dayNum': '0',
		                'wealth': '',
		                // 'newDayNum': '0' % 60,
		                'signCardCanUsed': '2',
		                'reSignItemId': '70',
		                'noSignDays': '',
		                'maybeSignNum': '',
                        'signBoxId': '0',
                        'futureSignBoxId': '128',
                        'futureBoxDay': '7',
                        'monthSpeedToday': '0'
		            } 
		        });
		                
                                                F.context('productsDomain', {
                'zuoye': 'http://zuoye.baidu.com',
                'baobao': 'http://baobao.baidu.com',
                'doctor': 'http://muzhi.baidu.com'
            });
            F.context('isQuality', false);
            F.context('now', 1499675676);
		</script>
        <script>F.context('sysTaskAutoInit', 1);</script>

		

        <!--[if lte IE 8]>
            <script>
                (function(){
                    var e="abbr,article,aside,audio,canvas,datalist,details,dialog,eventsource,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video".split(","),
                    i=e.length;
                    while(i--){document.createElement(e[i])}
                 })();
            </script>
        <![endif]-->
	<link rel="stylesheet" type="text/css" href="{{asset('home/css/common_36d8bc3.css')}}"><link rel="stylesheet" type="text/css" href="{{asset('home/css/module_e8bed3d.css')}}"><link rel="stylesheet" type="text/css" href="{{asset('home/css/ihome-header_23b36b4.css')}}"><script>
        // dp白屏时间打点
        alog('speed.set', 'ht', +new Date);
    </script><script type="text/javascript">
    if ( F && F.context && F.context('user').isLogin == 1 ) {
        F.context('user').experience = '105';
        F.context('user').adoptNum = '0';
        F.context('user').answerNumber = '2';
        F.context('user')['pubExp'] = [0,80,400,800,2000,4000,7000,10000,14000,18000,22000,32000,45000,60000,100000,150000,250000,400000,700000,1000000];
        F.context('user')['pubBst'] = [0,2,5,10,30,70,120,200,300,450,650,900,1300,1800,2500,3500,5000,7000,10000,15000];
    }
    if ( F && F.context && F.context('user').isUserAdmin == '1' ) {
        F.context('user')['uadmin'] = {};
        F.context('user')['uadmin'].grade = '';
        F.context('user')['uadmin'].type = ''; //1=初级 2=中级 3=高级 4=超级
        F.context('user')['uadmin'].finishScore = '';
        F.context('user')['uadmin'].needScore = '';
    }
    </script><script type="text/javascript" src="{{asset('home/js/fingerload.js')}}"></script><script type="text/javascript" charset="utf-8" src="{{asset('home/js/fingerprint.min.js')}}"></script></head>
    
    




	<body class="layout-ihome">
		

        
		

<header id="ihome-header">
	<div class="search-box">
		<div class="search-box-main container line">
			<a href="https://zhidao.baidu.com/" class="zhidao-logo grid" title="百度知道"></a>
			<a class="zhidao-title grid" href="https://zhidao.baidu.com/ihome">个人中心</a>
			<form action="https://zhidao.baidu.com/search" name="search-form" method="get" id="search-form" class="search-form grid">
				<input class="hdi" id="kw" maxlength="256" tabindex="1" size="46" name="word" value="" autocomplete="off" placeholder="请在此输入问题">
				<input type="submit" id="search-btn" hidefocus="true" tabindex="2" value="搜索答案" class="btn-global">
				<a href="https://zhidao.baidu.com/ihome/ask?tab=1#" id="ask-btn" class="ask-btn">我要提问</a>
			</form>
			
<div id="userbar" class="userbar userbar-new" data="">
           <ul class="aside-list">
        <li>
            <a href="{{url('home/wanshan')}}/{{ $user['id'] }}/edit" class="toindex">完善个人信息</a>
        </li>
        @if($user['login_name'] == "")
        <li><a rel="nofollow" alog-alias="usrbar-login" href="{{ url('home/login') }}"
               log="type:2026,pname:account,mod:login,action:show,pos:pop">登录</a></li>
        <li><a rel="nofollow" alog-alias="usrbar-reg" href="{{ url('home/register') }}" target="_blank">注册</a></li>
        @else
        <li>
            <a href="{{url('home/geren')}}" style="margin-left:35px;" class="user-name" id="user-name">{{$user['login_name']}}</a>
        </li>
        @endif
        <li class="shop-entrance">
            <a href="https://zhidao.baidu.com/shop" title="知道商城" log="type:2026,pos:top-right,target:shop-entrance">商城<i
                        class="i-house" style="display: none;"></i></a>
            <span class="lucky-try"></span>
        </li>
    </ul>
    </div>



		</div>
	</div>
</header>



<div class="wgt-banner">
<div class="wgt-banner-wp">
<div class="wgt-banner-bg" style="left: 50.599%;"></div>
<div class="wgt-banner-container">
<div class="circle-wp">
<div class="circle circle-t noAnimation">
<div class="circle-txt line">
<div class="transform grid">
<span class="title">回答数</span>
<br>
<span class="number">2</span>
</div>
<div class="grid-r bannerActiveDays transform-l">
<span class="title">活跃天数</span>
<br>
<span class="number sign-in-day-num">0天</span>
<div class="signInTip go-sign-in iknow_ihome_icons i-signInTip signInTipAnimation">
<span>
点击签到</span>
</div>
</div>
</div>
</div>
<div class="circle circle-s noAnimation">
<div class="circle-txt line">
<div class="grid transform">
<span class="title">采纳率</span>
<br>
<span class="number">0%</span>
</div>
<div class="grid-r transform-l">
<span class="title">称赞我</span>
<br>
<span class="number">0</span>
</div>
</div>
</div>
<div class="circle circle-f noAnimation">
<div class="circle-txt line">
<div class="grid transform">
<span class="title">财富值</span>
<br>
<span class="number">10</span>
</div>
<div class="grid-r transform-l">
<span class="title">我帮助的人</span>
<br>
<span class="number">43</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="user-avatar-wp">
<div class="user-avatar noAnimation">
 <img src="{{env('QINIU_MODA')}}{{$meng['user_img']}}" width="130pxs" height="130px">
<i class="avatar-mask noAnimation"></i>
</div>
<div class="user-name noAnimation">
{{$user['login_name']}}
</div>
<div class="user-rank noAnimation">
<div class="level-bar">
<div class="level-num">LV1</div>
<div class="level-rate" style="width: 0%;"></div>
</div>
</div>
<div class="top-hq-auth-num">高质量认证数<span class="big-num">0</span></div>
</div>
</div>

<section id="body" class="container line">

<article class="ihome-atricle grid">
<div class="ihome-menu">
	<ul class="ihome-menu-tab line">
		<li class="tab-index"><a href="https://zhidao.baidu.com/ihome?tab=1" target="_self"><span>等我答</span></a></li>
		<li class="tab-answer"><a href="https://zhidao.baidu.com/ihome/answer?tab=1" class="active" target="_self"><span>我的问答</span></a></li>
		<li class="tab-team"><a href="https://zhidao.baidu.com/ihome/team/myteam" target="_self"><span>我的团队</span></a></li>
		<li class="tab-task"><a href="https://zhidao.baidu.com/ihome/task/index" target="_self"><span>我的任务</span></a></li>
	</ul>
<div id="did">
	<script>
			 $(function(){
				 var li=$("#did ul li");
				 li.mouseover(function(){
					 //$(this).addClass("selected");
					 var index=li.index(this);
					 $("#did > div").eq(index).show().siblings("div").hide();
				 }).mouseout(function(){
					 //$(this).removeClass("selected");
				 });
			 });
	</script>
	<ul class="ihome-subMenu-tab line">
			<li><a href="https://zhidao.baidu.com/ihome/ask?tab=1" class="active">我的提问</a></li><span class="separate"></span>
			<li><a href="https://zhidao.baidu.com/ihome/answer?tab=1">我的回答</a></li>
	</ul>
<!--提问-->
<div class="wgt-myanswer-list-wp" style="display:block">
<!--
	   <ul class="myanswer-list">            
	   <li class="">           
	   <div class="myanswer-cont clearfix">                
		 <div class="myanswer-cont-main grid">                    
			 <div class="myanswer-title"><a href="https://zhidao.baidu.com/question/1545918882611519427.html" target="_blank">技术哪家强</a></div>                    
			 <div class="myanswer-info">                        
				<span>2017-07-07 14:19</span>                        
				<span>回答：2</span>                        
				<span>13人看过</span>                                                
				<span><i class="i-tag iknow_ihome_icons"></i><em>教育</em></span>                                            
			</div>                
		</div>                
		            
	 </div>        
 </li>                         
 </ul>-->
	<ul class="myanswer-list"> 
		@for ($j=0;$j<count($quesinfo);$j++)          
	    <li class="">           
		    <div class="myanswer-cont clearfix">                
			 	<div class="myanswer-cont-main grid">问题：                   
					 <div class="myanswer-title"><a href="{{URL('home/question')}}/{{$quesinfo[$j]['ques_id']}}" target="_blank">{{$quesinfo[$j]['ques_details']}}</a>
					 </div> 
					@if($j<count($QuesAnswer))
                     回答：<div class="myanswer-title"><a href="{{URL('home/question')}}/{{$quesinfo[$j]['ques_id']}}" target="_blank">{{$QuesAnswer[$j]['answer_content']}}</a>
					 </div>	
                    @endif				 
					<div class="myanswer-info">                        
						<span>{{$quesinfo[$j]['updated_at']}}</span>                        
						<span>回答：2</span>                        
						<span>13人看过</span>                                                
						<span><i class="i-tag iknow_ihome_icons"></i><em>教育</em></span>                                            
					</div>                
			 	</div>
			 	         
		 	</div>        
 		</li> 
 		@endfor                       
    </ul>
	<div class="pager h-center mt-20">
		<div id="pager"></div>
	</div>
</div>
<!--提问结束-->
<!--回答开始-->
@if($Questionarray!=="")
<div class="wgt-myanswer-list-wp" style="display:none">
	<ul class="myanswer-list">
        @for ($j=0;$j<count($Questionarray);$j++)          
	    <li class="">           
		    <div class="myanswer-cont clearfix">                
			 	<div class="myanswer-cont-main grid">问题：{{$Questionarray[$j]['ques_title']}}                   
					 <div class="myanswer-title">
					   <a href="{{URL('home/AgainAnswer')}}/{{$Answer[$j]['id']}}" target="_blank">
					     {{$Questionarray[$j]['ques_details']}}
					   </a>
					 </div> 
					 <div class="myanswer-info">                        
						<span>{{$Questionarray[$j]['updated_at']}}</span>                                              
					</div>  
					@if($j<count($QuesAnswer))
                     回答：<div class="myanswer-title">
							   <a href="{{URL('home/AgainAnswer')}}/{{$Answer[$j]['id']}}" target="_blank">
								  {{$Answer[$j]['answer_content']}}
							   </a>
					       </div>	
                    @endif				 
					<div class="myanswer-info">                        
						<span>{{$Answer[$j]['answer_time']}}</span>                        
						<span>回答：2</span>                        
						<span>13人看过</span>                                                
						<span><i class="i-tag iknow_ihome_icons"></i><em>教育</em></span>                                            
					</div>                
			 	</div>
			 	         
		 	</div>        
 		</li> 
 		@endfor   
        		
    </ul>
	<div class="pager h-center mt-20">
		<div id="pager"></div>
	</div>
</div>
@endif
<!--回答结束-->
</div>
</div>

<script type="text/html" id="t:myanswer-list">
    <#for(var i = 0; i < count($quesinfo); i++){
        var urlPart = '';
        var isDoctor = $quesinfo[i].isDoctor && $quesinfo[i].isDoctor == 1;
        if(isDoctor) {
            urlPart = F.context('productsDomain').doctor;
        }
        var link = urlPart + '/question/' + $quesinfo[i].qid + '.html';
    #>
        <li>
            <div class="myanswer-cont clearfix">
                <div class="myanswer-cont-main grid">
                    <div class="myanswer-title"><#if(isDoctor){#><span>拇指医生</span><#}#><a href="<#=link#>" target="_blank"><#:=$quesinfo[i].ques_title#></a></div>
                    <div class="myanswer-info">
                        <span><#=$quesinfo[i].updated_at#></span>
                        <span>回答：<#=$quesinfo[i].answerCount#></span>
                        <span><#=$quesinfo[i].qid_pv#>人看过</span>
                        <#if($quesinfo[i].tags.length > 0){#>
                        <span><i class="i-tag iknow_ihome_icons"></i><#for(var j = 0; j < $quesinfo[i].tags.length; j++){#><em><#=$quesinfo[i].tags[j]#></em><#}#></span>
                        <#}#>
                    </div>
                </div>

                


                <!--
                <div class="myanswer-cont-aside pt-10 grid-r">
                    <#if(!isDoctor) {#>
                        <#if(list[i].qFilter == 1){#>
                            <#if(list[i].qStatus == 2){#>
                                <div class="myanswer-opt myanswer-opt-green" tipsName="问题已解决"><i class="i-adopt iknow_ihome_icons"></i></div>
                            <#}else if(list[i].qStatus == 0){#>
                                <#if(list[i].unsatisfied != 0){#>
                                    <div class="myanswer-opt myanswer-opt-grey" tipsName="问题已关闭"><i class="i-close iknow_ihome_icons"></i></div>
                                <#}else if(list[i].answerCount == 0){#>
                                    <div class="myanswer-opt myanswer-opt-grey" tipsName="等待解答"><i class="i-wait-adopt iknow_ihome_icons"></i></div>
                                <#}else if(list[i].answerCount > 0){#>
                                    <div class="myanswer-opt"><a class="btn-32-black" href="<#=link#>" target="_blank">查看并处理</a></div>
                                <#}#>
                            <#}#>
                        <#}else if(list[i].qFilter == 2){#>
                            <div class="myanswer-opt myanswer-opt-grey" tipsName="等待解答"><i class="i-wait-adopt iknow_ihome_icons"></i></div>
                        <#}else if(list[i].qFilter == 3 || list[i].qFilter == 4){#>
                            <#if(list[i].appeal_time > 0){#>
                                <div class="myanswer-opt myanswer-opt-grey" tipsName="审核中"><i class="i-audit"></i></div>
                            <#}else{#>
                                <#if(list[i].qFilter == 3 || (list[i].qFilter == 4 && list[i].deleted_by_self != 1)){#>
                                    <div class="myanswer-opt myanswer-opt-red" tipsName="违反规范"><i class="i-delete iknow_ihome_icons"></i></div>
                                <#}else if(list[i].qFilter == 4 && list[i].deleted_by_self == 1){#>
                                    <div class="myanswer-opt myanswer-opt-red" tipsName="本人删除"><i class="i-delete iknow_ihome_icons"></i></div>
                                <#}#>
                            <#}#>   
                        <#}#>
                    <#}#>                  
                </div>
                -->

            </div>
        </li>
    <#}#>
</script>

</article>
<aside class="ihome-aside grid-r">
<div class="wgt-userinfo">
<div class="banner-shrink-btn"><a href="javascript:;"><i class="i-incline-down"></i><span>收起</span></a></div>
<div id="user-info" class="user-info" style="display:none;">
<div class="user">
<a href="https://zhidao.baidu.com/ihome/set/profile" class="avatar-img" style="visibility:hidden;">
<img src="{{asset('home/images/r6s1g1.gif')}}" width="130">
<i class="avatar-mask"></i>
</a>
<p class="user-name">
sunny葛安民
</p>
<div class="level-bar mb-15">
<div class="level-num">LV1</div>
<div class="level-rate" style="width: 0%;"></div>
</div>
<div class="top-hq-auth-num">高质量认证数<span class="big-num">0</span></div>
</div>
<div class="user-fields">
<div class="user-border-line">
<div class="user-item">
<p>2</p>
<p class="f-aid">回答数</p>
</div><span class="f-pipe">|</span><div class="user-item">
<p>0%</p>
<p class="f-aid">采纳率</p>
</div><span class="f-pipe">|</span><div class="user-item">
<p>10</p>
<p class="f-aid">财富值</p>
</div>
</div>
<div class="user-item">
<p>43</p>
<p class="f-aid">我帮助的人</p>
</div><span class="f-pipe">|</span><div class="user-item">
<p>0</p>
<p class="f-aid">称赞我</p>
</div><span class="f-pipe">|</span><div class="user-item activeDays">
<p class="sign-in-day-num">0</p>
<p class="f-aid">活跃天数</p>
<div class="signInTip go-sign-in iknow_ihome_icons i-signInTip signInTipAnimation">
<span>点击签到</span>
</div>
</div>
</div>
</div>
<div class="wgt-achievement">
<div class="user-goto line">
<a href="https://zhidao.baidu.com/shop" class="btn-36-green-new grid" target="_blank">财富商城</a>
<a href="https://zhidao.baidu.com/ihome/myitem/index" class="btn-36-green-new ml-10 grid-r" target="_blank">我的物品</a>
</div>
<h1 class="mb-15">我的荣誉</h1>
<div class="achievement-list">
<span>您暂时还没有荣誉勋章哦~</span>
</div>
</div>
</div>
<div class="wgt-team mt-14 none">
<h1>我的贡献</h1>
<div class="team-main"></div>
</div>
<div class="wgt-myhistory mt-14 no-scroll">
<div class="aside-title">我的历程</div>
<div class="myhistory-wp">     
		<ul class="myhistory-list">
             @for($i=0;$i<count($AnswerProgress);$i++)		
				<li>             
					<div class="history-time-wp line">                 
					  <div class="history-dot grid"></div>                 
						<div class="bubble-gray grid">                     
						<em class="l"></em>                     
						<span>{{$AnswerProgress[$i]['answer_time']}}</span>                     
						<em class="r"></em>                 
						</div>             
					</div>             
					<div class="history-cont">                 
					  <div>回答一个问题</div>                 
						<div class="count-change"><em>经验值<span class="em-txt">+2</span>&nbsp;</em>
						</div>             
					</div>         
				</li>  
				<li>
                    @if($i<count($CommentProgress))				
					<div class="history-time-wp line">                 
					  <div class="history-dot grid"></div>                 
						<div class="bubble-gray grid">                     
						<em class="l"></em>                     
						<span>{{$CommentProgress[$i]['comment_time']}}</span>                     
						<em class="r"></em>                 
						</div>             
					</div>             
					<div class="history-cont">                 
					  <div>评论一个问题</div>                 
						<div class="count-change"><em>经验值<span class="em-txt">+2</span>&nbsp;</em>
						</div>             
					</div> 
                    @endif					
				</li>  
             @endfor				
		</ul> 
</div>
</div>
</aside>
</section>



		
<div class="wgt-footer-new">
    <div class="footer-wp">
        <ul class="footer-list clearfix">
            <li class="footer-list-item footer-list-guide">
                <div class="footer-title"><span class="icon-guide"></span>新手帮助</div>
                <ul class="footer-link clearfix">
                    <li><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=241&amp;id=1521" target="_blank">如何答题</a></li>
                    <li><a href="http://help.baidu.com/question?prod_id=9&amp;class=531" target="_blank">获取采纳</a></li>
                    <li><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=531" target="_blank">使用财富值</a></li>
                </ul>
            </li>  
            <li class="footer-list-item footer-list-intro">
                <div class="footer-title"><span class="icon-intro"></span>玩法介绍</div>
                <ul class="footer-link clearfix">
                    <li><a href="https://zhidao.baidu.com/shop" target="_blank">知道商城</a></li>
                    <li><a href="http://zhidao.baidu.com/pcs/zhimatuan/index.html" target="_blank">知道团队</a></li>
                    <li><a href="https://zhidao.baidu.com/hangjia" target="_blank">行家认证</a></li>
                    <li><a href="http://zhidao.baidu.com/s/hi-quality/index.html" target="_blank">高质量问答</a></li>
                </ul>
            </li>  
            <li class="footer-list-item footer-list-sug">
                <div class="footer-title"><span class="icon-sug"></span>投诉建议</div>
                <ul class="footer-link clearfix">
                    <li><a href="http://tousu.baidu.com/zhidao" target="_blank">举报不良信息</a></li>
                    <li><a href="http://ikefu.baidu.com/web/zhishisousuo#" target="_blank">意见反馈</a></li>
                    <li><a href="http://tousu.baidu.com/zhidao#3" target="_blank">投诉侵权信息</a></li>
                    <!-- <li><a href="http://ikefu.baidu.com/web/zhishisousuo#" target="_blank">机器人道道</a></li>-->
                </ul>
            </li> 
        </ul>
    </div>
    <div class="footer-new">
        <p class="jt1128">
        京ICP证030173号-1&nbsp;&nbsp;&nbsp;京网文【2013】0934-983号&nbsp;&nbsp;&nbsp;&nbsp;
        &#169;2017 Baidu&nbsp;&nbsp; <a rel="nofollow" href="http://www.baidu.com/duty/" target="_blank">使用百度前必读</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a rel="nofollow" href="http://help.baidu.com/question?prod_en=zhidao&amp;class=597&amp;id=1001104" target="_blank">知道协议</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a rel="nofollow" href="http://zhidao.baidu.com/special/view/cooperation" target="_blank">百度知道品牌合作</a>
        </p>
    </div>
</div>


	    
        

        
                    

        
    <script>
    void function(a,b,c,d,e,f){function g(b){a.attachEvent?a.attachEvent("onload",b,!1):a.addEventListener&&a.addEventListener("load",b)}function h(a,c,d){d=d||15;var e=new Date;e.setTime((new Date).getTime()+1e3*d),b.cookie=a+"="+escape(c)+";path=/;expires="+e.toGMTString()}function i(a){var c=b.cookie.match(new RegExp("(^| )"+a+"=([^;]*)(;|$)"));return null!=c?unescape(c[2]):null}function j(){var a=i("PMS_JT");if(a){h("PMS_JT","",-1);try{a=a.match(/{["']s["']:(\d+),["']r["']:["']([\s\S]+)["']}/),a=a&&a[1]&&a[2]?{s:parseInt(a[1]),r:a[2]}:{}}catch(c){a={}}a.r&&b.referrer.replace(/#.*/,"")!=a.r||alog("speed.set","wt",a.s)}}if(a.alogObjectConfig){var k=a.alogObjectConfig.sample,l=a.alogObjectConfig.rand;d="https:"===a.location.protocol?"https://fex.bdstatic.com"+d:"http://fex.bdstatic.com"+d,k&&l&&l>k||(g(function(){alog("speed.set","lt",+new Date),e=b.createElement(c),e.async=!0,e.src=d+"?v="+~(new Date/864e5)+~(new Date/864e5),f=b.getElementsByTagName(c)[0],f.parentNode.insertBefore(e,f)}),j())}}(window,document,"script","/hunter/alog/dp.min.js");
    </script>
		
			<script>
				var _hmt = _hmt || [];
				(function() {
					var hm = document.createElement("script");
					hm.src = "https://hm.baidu.com/hm.js?6859ce5aaf00fb00387e6434e4fcc925";
					var s = document.getElementsByTagName("script")[0];
					s.parentNode.insertBefore(hm, s);
				})();
			</script>
		

	<script type="text/javascript" src="{{asset('home/js/mod_96dd55b.js')}}"></script><script type="text/javascript">require.resourceMap({"res":[],"pkg":[]});</script><script type="text/javascript" src="{{asset('home/js/framework_35930a1.js')}}"></script><script type="text/javascript" src="{{asset('home/js/more_fc10a72.js')}}"></script><script type="text/javascript" src="{{asset('home/js/qianbao-dialog_a3c13c6.js')}}"></script><script type="text/javascript" src="{{asset('home/js/validate_d964132.js')}}"></script><script type="text/javascript" src="{{asset('home/js/module_bfc2c1a.js')}}"></script><script type="text/javascript" src="{{asset('home/js/ihome-header_6ab9969.js')}}"></script><script type="text/javascript" src="{{asset('home/js/swfupload_b24a26d.js')}}"></script><script type="text/javascript" src="{{asset('home/js/editor_f72e2fa.js')}}"></script><script type="text/javascript" src="{{asset('home/js/pagerBase_025e04c.js')}}"></script><script type="text/javascript" src="{{asset('home/js/normalPager_4234b94.js')}}"></script><script type="text/javascript" src="{{asset('home/js/bubblePanel_769c16d.js')}}"></script><script type="text/javascript" src="{{asset('home/js/datePicker_8269d97.js')}}"></script><script type="text/javascript" src="{{asset('home/js/module_94beca9.js')}}"></script><script type="text/javascript">
!function(){    require.async('common:widget/userbar-new/userbar-new.js');
}();
!function(){
	require.async('common:widget/ihome-header/ihome-header.js');
}();
!function(){    require.async(['common:widget/js/util/tangram/tangram.js', 'common:widget/js/logic/sign-in/sign-in.js', 'common:widget/js/util/log/log.js', 'ihome:widget/banner/banner.js'], function($, SignIn, Log){
                    $(document).on('click','.go-sign-in',function(e){
                e.preventDefault();

                new SignIn({
                    year: '2017',
                    month: '07',
                    day: '10'
                });

                Log.send({
                    'action': 'click',
                    'fr': 'ihome',
                    'pos': F.context('sign-in').isSignIn == '1' ? 'already-sign-in' : 'sign-in'
                });
            });
            });
}();
!function(){    F.context('push', {
        'listType':'ask'
    });
    require.async('ihome:widget/myanswer/js/list.js', function(List){
        List.init({"pn":"0","rn":"25","filter":"0","type":"","retNum":"4","dispNum":"4","listNum":"4","limit":"0","list":[{"qid":"1545918882611519427","oldQid":"1558224809","title":"\u6280\u672f\u54ea\u5bb6\u5f3a","createTime":"2017-07-07 14:19","qStatus":"0","unsatisfied":"0","answerCount":"2","followTime":"","hasUpdate":"0","voteType":"0","actType":"","actCount":"","qFilter":"1","deleted_by_self":"0","hasPic":"0","tags":["\u6559\u80b2"],"isDoctor":"0","appeal_time":"0","pgc_status":"1","qid_pv":"13"},{"qid":"1515830897760696260","oldQid":"1556070583","title":"\u8fdb\u53e3\u91cf\u6765\u770b\u5566\u5566\u5566","createTime":"2017-06-30 21:02","qStatus":"0","unsatisfied":"0","answerCount":"0","followTime":"","hasUpdate":"0","voteType":"0","actType":"","actCount":"","qFilter":"4","deleted_by_self":"0","hasPic":"0","tags":["\u8fdb\u53e3"],"isDoctor":"0","appeal_time":"0","pgc_status":"0","qid_pv":"3"},{"qid":"494176639324782212","oldQid":"1552823191","title":"\u54ea\u4e2aphp\u7f16\u8f91\u5668\u6700\u9002\u5408\u521d\u7ea7\u5f00\u53d1\u8005","createTime":"2017-06-22 18:56","qStatus":"2","unsatisfied":"1","answerCount":"1","followTime":"","hasUpdate":"0","voteType":"0","actType":"","actCount":"","qFilter":"1","deleted_by_self":"0","hasPic":"0","tags":["PHP","\u7f16\u7a0b\u8bed\u8a00"],"isDoctor":"0","appeal_time":"0","pgc_status":"1","qid_pv":"31"},{"qid":"1642392392199628340","oldQid":"1309426605","title":"editplus\u6253\u5f00\u4e86\u4e24\u4e2a,\u5982\u4f55\u8fd4\u56de\u7b2c\u4e00\u4e2a","createTime":"2016-08-23 17:37","qStatus":"0","unsatisfied":"0","answerCount":"0","followTime":"","hasUpdate":"0","voteType":"0","actType":"","actCount":"","qFilter":"1","deleted_by_self":"0","hasPic":"0","tags":["\u8f6f\u4ef6","\u64cd\u4f5c\u7cfb\u7edf"],"isDoctor":"0","appeal_time":"0","pgc_status":"0","qid_pv":"4"}]});
    });
}();
!function(){	require.async('ihome:widget/userinfo/userinfo.js');
}();
!function(){    require.async('ihome:widget/team/team.js', function(T){
        new T();
    });
}();
!function(){    require.async('ihome:widget/myhistory/myhistory.js', function(M){
        new M();
    });
}();
!function(){    require('common:widget/js/logic/ie-prompt/ie-prompt.js');
}();
!function(){require.async(['common:widget/js/util/tangram/tangram.js', 'ihome:widget/js/card/card.js', 'common:widget/js/util/event/event.js', 'common:widget/js/logic/login/login.js', 'ihome:widget/js/custom-style/custom-style.js', 'common:widget/js/util/log/log.js'], function($, card, ec, Login, custom, log){
    // 接入dp平台打点domready时间
    alog('speed.set', 'drt', +new Date);

			$('.level-bar').each(function(){
			new card({
				target: this
			});
		});
	
    //自定义单选按钮
    $('input[type="radio"]').customStyle('radio');

    //自定义多选按钮
    $('input[type="checkbox"]').customStyle('checkbox');

    // 初始化页面标签中的统计
    log.init({
        module: 'ihome',
        action: 'click',
        query: 'body'
    });

    var entryTime = new Date;
    if($.url.getQueryValue(location.href,'referSrc') == 'qb' || $.url.getQueryValue(location.href,'referSrc') == 'imsg'){
        $(window).on('beforeunload', function(event) {
            log.send({
                type: 2072,
                page: 'ihome',
                from: 'custom-box',
                action: 'stay-time',
                time: Math.round((new Date - entryTime)/1000)
            });
        });
    }
});
}();
!function(){								                				require.async('common:widget/js/logic/dom-ready/dom-ready.js', function(D){ D.init([]) });
            }();
</script><div id="itips" class="itips"></div>    
<script type="text/javascript">
    require.async('common:widget/lib/jquery/jquery.js', function ($) {
        //  var ie = /msie (\d+\.\d+)/i.test(navigator.userAgent) ? (document.documentMode || +RegExp['$1']) : undefined;
        if (!/chrome|firefox|safari|msie 10|rsv:11|msie [89]/i.test(navigator.userAgent)) {
            return;
        }

        window.BaiduHttps = window.BaiduHttps || {};
        window.BaiduHttps.callbacks = function (data) {
            if (data && data.s === 0) {
                window.supportHttps = 1;
                setTimeout(function () {
                    $('a[href^="http://www.baidu.com/s?"]').each(function (index, item) {
                        var link = $(item).attr('href');
                        if (~link.indexOf('?wd=') || ~link.indexOf('&wd=')) {
                            link = link.replace(/^http/, 'https');
                            $(item).attr('href', link);
                        }
                    });
                }, 2000);
            }
        };

        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://www.baidu.com/con?from=zhidao';
        document.body.appendChild(script);
    });
</script><script type="text/javascript" src="{{asset('home/_con')}}"></script>

    
        <script>
            var DV_ARG = {};
            DV_ARG.Token = 'tk' + Math.random() + new Date().getTime(); //建议由后端生成
            DV_ARG.tpl = 'iknow';
            DV_ARG.scene = 'iknowpc';//scene
            DV_ARG.trans = '';//透传参数 ,扩展使用
        </script>
        <script src="{{asset('home/js/ld.min.js')}}"></script>
    

<div class="jump-top-box" style="right: 5px; top: 454px;"><div class="jump-top" style="visibility: hidden;"><a href="https://zhidao.baidu.com/ihome/ask?tab=1#" target="_self">返回顶部</a></div><div class="jump-task-list"><a class="open-task-list" data-action="open-task-list">任务列表</a><div class="ik-task-award-count">1</div></div></div><div id="FP_USERDATA" fp_uid="6cc17a7119ac8304b749cf7dd151136d" style="visibility: hidden; position: absolute;"></div></body></html>