<!DOCTYPE html>
<!--STATUS OK-->
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta http-equiv="content-type" content="text/html;charset=gbk"/>
    <meta property="wb:webmaster" content="3aababe5ed22e23c"/>
    <meta name="referrer" content="always"/>
    <title>提问_百度知道</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" sizes="any" mask href="//www.baidu.com/img/baidu.svg"/>

    
    <script>
        window.alogObjectConfig = {
            product: '102',
            page: '102_8',
            monkey_page: '',
            speed_page: '',
            speed: {
                sample: '1'
            },
            monkey: {
                sample: '1'
            },
            exception: {
                sample: '1'
            },
            feature: {
                sample: '1'
            },
            cus: {
                sample: '1',
                custom_metrics: []
            },
            csp: {
                sample: '1',
                'default-src': [
                    {match: '*bae.baidu.com', target: 'Accept,Warn'},
                    {
                        match: '*.baidu.com,*.bdstatic.com,*.bdimg.com,localhost,*.hao123.com,*.hao123img.com',
                        target: 'Accept'
                    },
                    {match: /^(127|172|192|10)(\.\d+){3}$/, target: 'Accept'},
                    {match: '*', target: 'Accept,Warn'}
                ]
            }
        };

        void function (a, b, c, d, e, f, g) {
            a.alogObjectName = e, a[e] = a[e] || function () {
                    (a[e].q = a[e].q || []).push(arguments)
                }, a[e].l = a[e].l || +new Date, d = "https:" === a.location.protocol ? "https://fex.bdstatic.com" + d : "http://fex.bdstatic.com" + d;
            var h = !0;
            if (a.alogObjectConfig && a.alogObjectConfig.sample) {
                var i = Math.random();
                a.alogObjectConfig.rand = i, i > a.alogObjectConfig.sample && (h = !1)
            }
            h && (f = b.createElement(c), f.async = !0, f.src = d + "?v=" + ~(new Date / 864e5) + ~(new Date / 864e5), g = b.getElementsByTagName(c)[0], g.parentNode.insertBefore(f, g))
        }(window, document, "script", "/hunter/alog/alog.min.js", "alog"), void function () {
            function a() {
            }

            window.PDC = {
                mark: function (a, b) {
                    alog("speed.set", a, b || +new Date), alog.fire && alog.fire("mark")
                }, init: function (a) {
                    alog("speed.set", "options", a)
                }, view_start: a, tti: a, page_ready: a
            }
        }();
        void function (n) {
            var o = !1;
            n.onerror = function (n, e, t, c) {
                var i = !0;
                return !e && /^script error/i.test(n) && (o ? i = !1 : o = !0), i && alog("exception.send", "exception", {
                    msg: n,
                    js: e,
                    ln: t,
                    col: c
                }), !1
            }, alog("exception.on", "catch", function (n) {
                alog("exception.send", "exception", {msg: n.msg, js: n.path, ln: n.ln, method: n.method, flag: "catch"})
            })
        }(window);
    </script>

    <script type="text/javascript">
        !function () {
            var n = {}, t = {};
            n.context = function (n, e) {
                var i = arguments.length;
                if (i > 1) t[n] = e; else if (1 == i) {
                    if ("object" != typeof n)return t[n];
                    for (var o in n)n.hasOwnProperty(o) && (t[o] = n[o])
                }
            }, "F" in window || (window.F = n)
        }();
        ;


        F.context('user', {
            "isLogin": "",
            "isRealName": "",
            "stoken": "",
            "name": "",
            "imId": "",
            "id": "",
            "wealth": "",
            "gradeIndex": "",
            "isMavin": ""
        });
        F.context('user')['internalAdmin'] = null;


        F.context('productsDomain', {
            'zuoye': 'http://zuoye.baidu.com',
            'baobao': 'http://baobao.baidu.com',
            'doctor': 'http://muzhi.baidu.com'
        });
        F.context('isQuality', false);
        F.context('now', 1498459612);
    </script>
    <script>F.context('sysTaskAutoInit', 1);</script>


    <!--[if lte IE 8]>
    <script>
        (function () {
            var e = "abbr,article,aside,audio,canvas,datalist,details,dialog,eventsource,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video".split(","),
                    i = e.length;
            while (i--) {
                document.createElement(e[i])
            }
        })();
    </script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/common_83ca64f.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/userbar-renew_905cdc2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/search-box-new_dfc280b.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/ask_c1fea9d.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/question-description_9bb596a.css')}}"/>
	
	<link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css')}}" />
	<script  src="{{ asset('home/js/bootstrap.min.js')}}"></script>
	<script  src="{{ asset('home/js/jquery.min.js')}}"></script>
</head>


<script> alog('speed.set', 'ht', +new Date); </script>


<body class="layout-center ask-new-layout">


<div id="userbar" class="userbar userbar-renew" data="">
    <ul class="aside-list">
        <li>
            <a href="http://www.baidu.com/" class="toindex">百度首页</a>
        </li>
        <li><a rel="nofollow" alog-alias="usrbar-login" href="javascript:;" id="userbar-login"
               log="type:2026,pname:account,mod:login,action:show,pos:pop">{{ $sessioninfo[0]->login_name}}</a></li>
        <li><a rel="nofollow" alog-alias="usrbar-reg" href="/home/register" target="_blank">注册</a></li>
        <li class="shop-entrance">
            <a href="/shop" title="知道商城" log="type:2026,pos:top-right,target:shop-entrance">商城<i class="i-house"
                                                                                                 style="display: none;"></i></a>
            <span class="lucky-try"></span>
        </li>
    </ul>
</div>


<div class="head-wrap">
    <header id="header" class="container">

        <div id="search-box" class="search-box-new line">

            <div class="search-block clearfix">
                <div class="search-cont clearfix">
                    <a class="logo" href="/" title="百度知道"></a>
                </div>
            </div>
        </div>
    </header>
</div>
<div id="body" class="container">



    <div class="ask-wrapper">
        <div class="ask-main-box">
            <div class="question-description f-pening" id="question-description">
                <form action="{{url('home/question')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="qb-layout-tit">
                        <i class="iknow-ask_icons i-status-being grid mr-10"></i>
                        <span class="ask-title f-pening">提问</span>
                    </div>
                    <div class="qd-layout">
                        <div class="qd-content">
                            <div class="qd-ct qd-title">
                                <textarea id="title-area" name="ques_title" placeholder="标题：写下你的问题"></textarea>
                                <span id="title-count" class="count"><b>0</b>/49</span>
                            </div>
                        </div>
                        <div id="title-error-tip" class="f-12"></div>
                        <ul class="qd-content-suggestion">
                        </ul>
                        <div class="qd-content qd-content-desc">
                            <div class="qd-ct qd-desc">
                                <textarea id="content-area" name="ques_details" placeholder="选填，详细说明您的问题，以便获得更好的答案"></textarea>
                            </div>
                            <div class="qd-plus" id="qd-plus-btn">
                                <ul class="qd-plus-stuff clearfix">
                                    <input type="file" class="iknow-ask_icons i-add-img" name="ufile" /> 
                                    
                                </ul>
                                <ul id="qd-img-list" class="qd-img-list clearfix" style="display: none"></ul>
                            </div>
                            
                        </div>
                        <div id="content-error-tip" class="f-12"></div>
						
                        <div id="tag-wrapper" data-hide="doctor">
                            <div id="tag-info" class="widget-tag">
                                <div class="tag-container clearfix">
                                    <span class="tag-lb">问题类型：</span>
                                    <div class="tag-list"></div>
									
									<div class="form-group">
										<select class="form-control" style="width:120px;" name="lanmu_id" > 
											<option value="0" selected >--请选择--</option>
											@foreach ($lan as $v)												
												<option value="{{ $v->id }}">{{ $v->column_type}}</option> 											
											@endforeach
										</select>
									</div>	
										
                                </div>
                            </div>
                        </div>
						
                    </div>
                    <div class="wgt-submit">
                        <div id="normail-submit-panel">
                            <div class="clearfix" id="submit-panel" data-hide="doctor">
                                <div id="ik-authcode-outer" style="display: none;"></div>
                                <div class="submit-question">
                                    <button type="submit" class="submit-btn disabled" id="submit-btn">提交</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <div id="anttongji"></div>


</div>


<footer id="footer" class="wgt-footer">
    <p>
        <a target="_blank" rel="nofollow" href="http://www.baidu.com/search/zhidao_help.html">帮助</a>
        &nbsp;|&nbsp;
        <a target="_blank" rel="nofollow" href="http://zhidao.baidu.com/feedback">意见反馈</a>
        &nbsp;|&nbsp;
        <a target="_blank" rel="nofollow" href="http://tousu.baidu.com/zhidao">投诉举报</a>
        &nbsp;|&nbsp;
        <a target="_blank" rel="nofollow" href="http://zhidao.baidu.com/misc/more/joinus">加入我们</a>
    </p>
    <p>
        京ICP证030173号-1&nbsp;&nbsp;&nbsp;京网文【2013】0934-983号&nbsp;&nbsp;&nbsp;&nbsp;
        &copy;2017 Baidu&nbsp;&nbsp; <a rel="nofollow" href="http://www.baidu.com/duty/" target="_blank">使用百度前必读</a>&nbsp;|&nbsp;<a
                rel="nofollow" href="http://help.baidu.com/question?prod_en=zhidao&class=597&id=1001104"
                target="_blank">知道协议</a>&nbsp;|&nbsp;<a rel="nofollow" href="/special/view/cooperation" target="_blank">百度知道品牌合作</a>
    </p>
</footer>


<script type="text/javascript">
    F.context('new20perTest', 0);
</script>


<script>
    void function (a, b, c, d, e, f) {
        function g(b) {
            a.attachEvent ? a.attachEvent("onload", b, !1) : a.addEventListener && a.addEventListener("load", b)
        }

        function h(a, c, d) {
            d = d || 15;
            var e = new Date;
            e.setTime((new Date).getTime() + 1e3 * d), b.cookie = a + "=" + escape(c) + ";path=/;expires=" + e.toGMTString()
        }

        function i(a) {
            var c = b.cookie.match(new RegExp("(^| )" + a + "=([^;]*)(;|$)"));
            return null != c ? unescape(c[2]) : null
        }

        function j() {
            var a = i("PMS_JT");
            if (a) {
                h("PMS_JT", "", -1);
                try {
                    a = a.match(/{["']s["']:(\d+),["']r["']:["']([\s\S]+)["']}/), a = a && a[1] && a[2] ? {
                        s: parseInt(a[1]),
                        r: a[2]
                    } : {}
                } catch (c) {
                    a = {}
                }
                a.r && b.referrer.replace(/#.*/, "") != a.r || alog("speed.set", "wt", a.s)
            }
        }

        if (a.alogObjectConfig) {
            var k = a.alogObjectConfig.sample, l = a.alogObjectConfig.rand;
            d = "https:" === a.location.protocol ? "https://fex.bdstatic.com" + d : "http://fex.bdstatic.com" + d, k && l && l > k || (g(function () {
                alog("speed.set", "lt", +new Date), e = b.createElement(c), e.async = !0, e.src = d + "?v=" + ~(new Date / 864e5) + ~(new Date / 864e5), f = b.getElementsByTagName(c)[0], f.parentNode.insertBefore(e, f)
            }), j())
        }
    }(window, document, "script", "/hunter/alog/dp.min.js");
</script>

<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?6859ce5aaf00fb00387e6434e4fcc925";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>


</body>
<script type="text/javascript" src="{{ asset('home/js/mod_96dd55b.js')}}"></script>
<script type="text/javascript">require.resourceMap({
        "res": {
            "common:widget\/lib\/jquery\/jquery.origin.js": {"pkg": "common:p0"},
            "common:widget\/lib\/swfupload\/swfupload.js": {"url": "http:\/\/iknowpc.bdimg.com\/static\/common\/widget\/lib\/swfupload\/swfupload_b24a26d.js"},
            "common:widget\/js\/ui\/scrollbar\/scrollbar.js": {
                "pkg": "common:p2",
                "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/ui\/base\/base.js", "common:widget\/lib\/jquery.ui\/jquery.ui.mousewheel.js"]
            },
            "common:widget\/lib\/jquery.validate\/jquery.validate.js": {
                "pkg": "common:p5",
                "deps": ["common:widget\/js\/util\/tangram\/tangram.js"]
            },
            "common:widget\/js\/util\/event\/event.js": {
                "pkg": "common:p1",
                "deps": ["common:widget\/lib\/jquery\/jquery.js"]
            },
            "common:widget\/js\/ui\/suggestion-new\/suggestion-new.js": {
                "url": "http:\/\/iknowpc.bdimg.com\/static\/common\/widget\/js\/ui\/suggestion-new\/suggestion-new_0d26480.js",
                "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/lib\/jquery.ui\/jquery.ui.autocomplete.js", "common:widget\/js\/ui\/base\/base.js"]
            },
            "common:widget\/js\/logic\/search-box-new\/search-box-new.js": {
                "url": "http:\/\/iknowpc.bdimg.com\/static\/common\/widget\/js\/logic\/search-box-new\/search-box-new_c6b0786.js",
                "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/ui\/suggestion-new\/suggestion-new.js", "common:widget\/js\/util\/event\/event.js", "common:widget\/js\/util\/form\/form.js", "common:widget\/js\/util\/log\/log.js", "common:widget\/js\/ui\/dialog\/dialog.js", "common:widget\/lib\/jquery.placeholder\/jquery.placeholder.js"]
            }
        }, "pkg": []
    });</script>
<script type="text/javascript" src="{{ asset('home/js/framework_35930a1.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/module_ec57337.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/more_01242af.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/qianbao-dialog_a3c13c6.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/validate_d964132.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/userbar-renew_5f2e977.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/ask_8427534.js')}}"></script>
<script type="text/javascript" src="{{ asset('home/js/question-description_f5977bf.js')}}"></script>
<script type="text/javascript">
    !function () {        // 接入dp平台打点domready时间
        alog('speed.set', 'drt', +new Date);
    }();

    !function () {
        require.async('common:widget/userbar-renew/userbar-renew.js');
    }();
    !function () {
        require.async('common:widget/js/logic/search-box-new/search-box-new.js');
    }();
    !function () {
        require.async('new:widget/tag/tag.js');
    }();
    !function () {
        require.async('new:widget/submit/submit.js');
    }();
    !function () {
        require.async('new:widget/question-description/question-description.js', function (qd) {
            qd.init();
        });
    }();
    !function () {
        require('common:widget/js/logic/ie-prompt/ie-prompt.js');
    }();
    !function () {
        require.async("new:widget/js/page/ask.js");
    }();
    !function () {
        require.async('common:widget/js/logic/dom-ready/dom-ready.js', function (D) {
            D.init([])
        });
    }();
</script>

<script>
    var DV_ARG = {};
    DV_ARG.Token = 'tk' + Math.random() + new Date().getTime(); //建议由后端生成
    DV_ARG.tpl = 'iknow';
    DV_ARG.scene = 'iknowpc';//scene
    DV_ARG.trans = '';//透传参数 ,扩展使用
</script>
<script src="{{ asset('home/js/ld.min.js')}}"></script>

</html>
