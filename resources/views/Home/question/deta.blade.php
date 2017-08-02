<!DOCTYPE html>
<!--STATUS OK-->
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta http-equiv="content-type" content="text/html;charset=gbk"/>
    <meta property="wb:webmaster" content="3aababe5ed22e23c"/>
    <meta name="referrer" content="always"/>
    <title>百度知道</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" sizes="any" mask href="//www.baidu.com/img/baidu.svg"/>

    <script>
        window.alogObjectConfig = {
            product: '102',
            page: '102_3',
            monkey_page: 'zhidao-ques',
            speed_page: '3',
            speed: {
                sample: '0.02'
            },
            monkey: {
                sample: '0.01'
            },
            exception: {
                sample: '0.01'
            },
            feature: {
                sample: '0.01'
            },
            cus: {
                sample: '0.01',
                custom_metrics: ['c_sbox', 'c_menu', 'c_ask', 'c_best']
            },
            csp: {
                sample: '0.02',
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


    <script>
        !function (document, window) {
            var log = {
                list: [],
                host: 'https://' + location.host + '/api/httpscheck',
                log: function (param) {
                    var a = [];
                    for (var k in param) {
                        a.push(k + '=' + param[k]);
                    }
                    var msg = a.join('&');
                    if (~this.list.indexOf(msg)) {
                        return;
                    }
                    this.list.push(msg);
                    var img = new Image();
                    var key = '_ik_log_' + (Math.random() * 2147483648 ^ 0).toString(36);
                    window[key] = img;
                    img.onload = img.onerror = img.onabort = function () {
                        img.onload = img.onerror = img.onabort = null;
                        window[key] = null;
                        img = null;
                    };
                    img.src = this.host + '?' + msg;
                }
            };

            function HTTPSWarningLog() {
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
                init: function () {
                    this.fetch();
                },

                fetch: function () {
                    for (var tags = this.selector, i = 0, len = tags.length; i < len; i++) {
                        this.getTag(tags[i]);
                    }
                },

                getTag: function (tag) {
                    var domList = document.getElementsByTagName(tag);
                    if (!domList.length) {
                        return;
                    }
                    for (var i = 0, len = domList.length; i < len; i++) {
                        var el = domList[i];
                        var url = el.getAttribute(el.tagName === 'LINK' ? 'href' : 'src');
                        if (el.getAttribute('rel') === 'canonical') {
                            continue;
                        }
                        if (url && 'https:' === location.protocol && !url.indexOf('http:')) {
                            this.sendLog(el, el.tagName.toLowerCase(), url);
                            this.warningCounter++;
                        }
                    }
                },

                sendLog: function (el, type, url) {
                    log.log({
                        url: location.href,
                        wtype: type,
                        wurl: url
                    });
                }
            };

            function domReady(fn) {
                if (document.addEventListener) {
                    document.addEventListener('DOMContentLoaded', function () {
                        document.removeEventListener('DOMContentLoaded', arguments.callee, false);
                        fn();
                    }, false);
                } else if (document.attachEvent) {
                    document.attachEvent('onreadystatechange', function () {
                        if (document.readyState == 'complete') {
                            document.detachEvent('onreadystatechange', arguments.callee);
                            fn();
                        }
                    });
                }
            };

            domReady(function () {
                new HTTPSWarningLog();
                for (var i = 1; i < 6; i++) {
                    !function (i) {
                        setTimeout(function () {
                            new HTTPSWarningLog();
                        }, i * i * i * 1000);
                    }(i);
                }
            });
        }(document, window);
    </script>

    <meta name="keywords" content="php"/>
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
            "isLogin": "1",
            "isRealName": "2",
            "stoken": "2abba60e59c26d81b106fff9d9ef1975",
            "name": "\u5bab\u5c0f\u4fca_",
            "imId": "ca74e5aeabe5b08fe4bf8a5fa52e",
            "id": "782595274",
            "wealth": "16",
            "gradeIndex": "1",
            "isMavin": "",
            "encryptedBDUSS": "3b28oqYgMY9mCqeGSPhBMtCgIqmsvaFqExY2mVjgTTLwUyJLJK1ShxbRvO07v5OtJY5PNhFGFmiyKdtQSWXApVTkS5wVxPMo6LHRvpUMSxx+84JptWVWtXzPpY\/TvcZJ3nzyF3am9\/Gg\/OEuJcn49JBmGY8W5uhBnb306\/oNmWxIr6C9MJlHc08x6tEB9gJphh4urEFVrOHi4Hd2+DCXYe4hwme9OGn+8QLeLNSoYf0hPlkUDqfLlPCEwu4Z4M2SE55pl+IvsGkGqfSm9kU41EF7bIcLMb9GZmIuUHI",
            "ECBD": "vo+nYyQpqczrpz0HdRc6FXc9YK4idNYUjcyS3cfef0GSZ5vQCtArwAjnFOp7KHzd34Nb6Yd6Oqf+hRwR7yFRHme5v\/nS7YnIdzprC8H2IW7tVdCfnFKC5bmGfN48zE5WMg\/k+1QMIRGqNBapmtuvgnP1Z2q22YEdCo60SVKJedT8odRigCtwbjNslx30c7j52Eukg75DcqOtn2CPuM16f1xogWhHEcLDioLgBeKZnn4JDY2AtLRdHkGPREDT74wxu6E0mS92\/gU30uObnTAY5Q==",
            "experience": "246"
        });
        F.context('user')['internalAdmin'] = null;

        F.context('defaultQuery', '{"title":"","value":""}');


        F.context({
            'sign-in': {
                'isSignIn': '0',
                'signinDays': '["2017\/6\/22","2017\/6\/23","2017\/6\/24"]',
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
        F.context('now', 1498810412);
    </script>
    <script>F.context('sysTaskAutoInit', 1);</script>


    <script type="text/javascript">
        var dontTriggerPrompt = true;

        F.context('page', {
            isAdopted: '0'
            , misAsk: '0'
            , delAsk: '0'
            , isLocked: '0'
            , isReplyLocked: '0'
            , isFromWap: "0"
            , cid: '1073'
            , cidTop: '74'
            , cidMid: '1073'
            , giveScore: '0'
            , encodeUid: 'ca744069236f25705e79a52e'
            , uid: '782595274'
            , imId: 'ca74b9acd0a1bfa15fa52e'
            , passPhoto: '0'
            , qb_test_case: '12'
            , rpRecommand: 'false', rankFile: '0'
            , user: {
                sex: '1'
                , iconType: '6'
                , gradeIndex: '1'
                , gradeIndexC: '一'
            }
            , con: ''
            , answerNum: '2'
            , isView: '1'
            , isGetWealth: '0'
            , pgcArr: [790, 791, 792, 794, 795]
            , isCompanyIask: '0'
            , bdplayer: 'mozilla\/5.0 (windows nt 10.0; wow64; rv:54.0) gecko\/20100101 firefox\/54.0'
        });

        F.context('user')['internalAdmin'] = null;

        
        F.context('answers', {});
        F.context('relateWords', {});
        
        F.context('isForAnswerHq', '0');
        F.context('isForceAnswer', '0');



    </script>

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
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/common_ad30a18.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/aio_5b1c2db.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/userbar-renew_55ab471.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/search-box-new_4de721e.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/push-mavin_357ef96.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/preview_c4405d5.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/question-description_9bb596a.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/question-description_9bb596a.css')}}"/>
    <script type="text/javascript" src="{{asset('home/js/jquery-1.8.3.min.js')}}"></script>
</head>


<script> alog('speed.set', 'ht', +new Date); </script>


<body class="layout-center has-menu">


<div id="userbar" class="userbar userbar-renew" data="">
    <ul class="aside-list">
        <li>
            <a href="http://www.baidu.com/" class="toindex">百度首页</a>
        </li>
        <li>
            <a href="{{url('home/geren')}}" class="user-name" target="_blank" id="user-name">{{ $sessioninfo[0]->login_name}}<i class="i-arrow-down"></i></a>
        </li>
        </li>
        <li alog-alias="userbar-msg" id="userbar-msg"><a href="/ihome/notice/all" target="_blank" target="_self">消息<span
                class="orange-num"><i></i></span></a></li>
        <li alog-alias="baidu-msg" id="baidu-msg"><a href="/ichat/chatlist">私信<i class="bd-msg"></i></a></li>
        <li class="shop-entrance">
            <a href="/shop" title="知道商城">商城<i class="i-house" style="display: none;"></i></a>
            <span class="lucky-try"></span>
        </li>
    </ul>
    <div class="sublist-container username-sublist" style="display:none" id="username-sublist">
        <div class="sublist-arrow-up"></div>
        <ul class="sub-list">
            <li><a id="userbar-myinfo" href="/home/geren" target="_blank">我的主页</a></li>
            <li><a id="userbar-my-ask" href="http://zhidao.baidu.com/ihome/ask?tab=1" target="_blank">我的提问</a></li>
            <li><a id="userbar-my-answer" href="http://zhidao.baidu.com/ihome/answer?tab=1" target="_blank">我的回答</a>
            </li>
            <li class="last"><a href="/home/logout">退出帐号</a></li>
        </ul>
    </div>
</div>


<div class="head-wrap">
    <hr class="divider">
    <header id="header" class="container">

        <div id="search-box" class="search-box-new line">
            <ul class="channel grid">
                <li><a log="sc_pos:c_baidu" rel="nofollow" href="http://www.baidu.com/">网页</a></li>
                <li><a log="sc_pos:c_news" rel="nofollow" href="http://news.baidu.com/">新闻</a></li>
                <li><a log="sc_pos:c_tieba" rel="nofollow" href="http://tieba.baidu.com/">贴吧</a></li>
                <li><strong>知道</strong></li>
                <li><a log="sc_pos:c_mp3" rel="nofollow" href="http://music.baidu.com/">音乐</a></li>
                <li><a log="sc_pos:c_pic" rel="nofollow" href="http://image.baidu.com/">图片</a></li>
                <li><a log="sc_pos:c_video" rel="nofollow" href="http://v.baidu.com/">视频</a></li>
                <li><a log="sc_pos:c_map" rel="nofollow" href="http://map.baidu.com/">地图</a></li>
                <li><a log="sc_pos:c_doc" rel="nofollow" href="http://wenku.baidu.com/">文库</a></li>
                <li><a log="sc_pos:c_more" href="http://www.baidu.com/more/">更多&raquo;</a></li>
            </ul>
            <div class="search-block clearfix">
                <div class="search-cont clearfix">
                    <a class="logo" href="/" title="百度知道"></a>
                    <form action="/search" name="search-form" method="get" id="search-form-new" class="search-form">
                        <input class="hdi" id="kw" maxlength="256" tabindex="1" size="46" name="word" value=""
                               autocomplete="off"/>
                        <button alog-action="g-search-anwser" type="submit" id="search-btn" hidefocus="true"
                                tabindex="2" class="btn-global">搜索答案
                        </button>
                        <a href="/home/question" alog-action="g-i-ask" class="i-ask-link" id="ask-btn-new">我要提问</a>
                    </form>
                </div>
            </div>
        </div>
        <script>
            // 搜索框可用时间打点
            alog && alog('speed.set', 'c_sbox', +new Date);
            alog.fire && alog.fire("mark");
        </script>

    </header>
</div>

<div class="nav-menu-container" id="j-nav-menu-container">
    <div class="nav-show-control">
        <div class="nav-menu-layout">
            <div class="nav-menu line">
                <div class="nav-menu-content container">
                    <div class="content-box">
                        <div class="menu-item menu-item-index">
                            <a class="menu-title " href="/">
                                首页
                            </a>
                        </div>
                        <div class="menu-item-box">
                            <div class="menu-item menu-item-cat">
                                <a class="menu-title " href="/list?fr=daohang" target="_blank">
                                    问题
                                </a>
                                <div class="menu-content">
                                    <ul class="menu-sub-list">
                                    
                                    @foreach ($list as $vv)
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="{{URL('/list/jingji')}}/{{ $vv->id }}" target="_blank">
                                                {{ $vv->column_type }}
                                            </a>
                                        </li>
                                    @endforeach 
                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="menu-item menu-item-lanmu">
                                <a class="menu-title" href="javascript:;">
                                    专栏
                                </a>
                                <div class="menu-content">
                                    <ul class="menu-sub-list">
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/daily?fr=daohang" target="_blank">
                                                知道日报
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/liuyan?fr=daohang" target="_blank">
                                                真相问答机
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/bigdata/view" target="_blank">
                                                知道大数据
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/special/home?fr=daohang" target="_blank">
                                                知道多世界
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/culture/index?fr=daohang" target="_blank">
                                                知道非遗
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu-item menu-item-user">
                                <a class="menu-title" href="javascript:;">
                                    用户
                                </a>
                                <div class="menu-content">
                                    <ul class="menu-sub-list">
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/zhima/" target="_blank">
                                                知道芝麻
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/misc/nowshowstar?fr=daohang"
                                               target="_blank">
                                                知道之星
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/user/admin?fr=daohang" target="_blank">
                                                芝麻将
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/uteam?fr=daohang" target="_blank">
                                                芝麻团
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/hangjia?fr=daohang" target="_blank">
                                                知道行家
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/daily/authorcenter?fr=daohang"
                                               target="_blank">
                                                日报作者
                                            </a>
                                        </li>
                                        <div class="menu-item-user-list">机构合作
                                            <div class="line-bar"></div>
                                        </div>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/hangjia?fr=daohang" target="_blank">
                                                机构行家
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/opendev?fr=daohang" target="_blank">
                                                开放平台
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/special/view/cooperation?fr=daohang"
                                               target="_blank">
                                                品牌合作
                                            </a>
                                        </li>
                                        <div class="menu-item-user-list">知道福利
                                            <div class="line-bar"></div>
                                        </div>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/shop?fr=daohang" target="_blank">
                                                财富商城
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/s/activity/index.html?fr=daohang"
                                               target="_blank">
                                                知道活动
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu-item menu-item-expert">
                                <a class="menu-title" href="javascript:;">
                                    特色
                                </a>
                                <div class="menu-content">
                                    <ul class="menu-sub-list">
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item menu-sub-item-expert"
                                               href="http://jingyan.baidu.com/" target="_blank">
                                                <span class="expert-icon expert-icon-jy"></span>
                                                <span>经验</span>
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item menu-sub-item-expert" href="https://p.baidu.com"
                                               target="_blank">
                                                <span class="expert-icon expert-icon-pi"></span>
                                                <span>百度派</span>
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item menu-sub-item-expert" href="http://baobao.baidu.com"
                                               target="_blank">
                                                <span class="expert-icon expert-icon-baby"></span>
                                                <span>宝宝知道</span>
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item menu-sub-item-expert" href="http://zuoye.baidu.com"
                                               target="_blank">
                                                <span class="expert-icon expert-icon-zuoye"></span>
                                                <span>作业帮</span>
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item menu-sub-item-expert"
                                               href="http://ciyuanfan.baidu.com/?ref=pcsyts" target="_blank">
                                                <span class="expert-icon expert-icon-ciyuanfan"></span>
                                                <span>次元饭</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="menu-right-section">
                            <ul class="menu-right-list">
                                <li class="menu-right-list-item zhidao-app">
                                    <a href="/zt/ikapp/index.html?fr=home" class="menu-right-list-link" target="_blank">
                                        <span class="item-icon">
                                            
                                        </span>
                                        <span class="item-name">
                                            手机版
                                        </span>
                                    </a>
                                    <span class="right-list-item-devide">
                                        
                                    </span>
                                </li>
                                <li class="menu-right-list-item user-center">
                                    <a href="/ihome" class="menu-right-list-link" target="_blank">
                                        <span class="item-icon">
                                            
                                        </span>
                                        <span class="item-name">
                                            我的知道
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // 导航可用时间
    alog && alog('speed.set', 'c_menu', +new Date);
    alog.fire && alog.fire("mark");
</script>

<div id="body" class="container">

    <div class="layout-wrap">
        <div style="display:none">
            <nav class="wgt-nav f-12" alog-group="qb-cate-nav">
                <a href="/">百度知道</a>
            </nav>
        </div>
        <section class="line qb-section qb-content-replyer">
        <article class="grid qb-content " id="qb-content">
		@for($i=0;$i<count($data);$i++)
        <div class="wgt-ask accuse-response line mod-shadow " id="wgt-ask">
            <h1 accuse="qTitle">
                <i class="iknow-qb_home_icons i-status-being grid mr-10"></i>
                <span class="ask-title ">{{ $data[$i]['ques_title'] }}</span>
            </h1>

            <div class="line mt-5 q-content" accuse="qContent" style="display:{{isset($data[$i]['ques_details'])?'block':'none'}}">
				<span class="con" id="deta">{{$data[$i]['ques_details']}}<br /><br /></span>
			</div>
			<div class="q-img-wp" style="display:{{isset($data[$i]['ques_img'])?'block':'none'}}">
				<div class="q-img-con">
				<ul class="q-img-ul">
				<li class="q-img-li" data-src="{{asset('upload')}}/{{$data[$i]['ques_img'] }}">
				<img class="q-img-item" src="{{asset('upload')}}/{{$data[$i]['ques_img'] }}">
				</li>
				</ul>
				</div>
			</div>

            <div class="line f-aid ask-info ff-arial" id="ask-info">
                <span>{{ $data[$i]['updated_at'] }}</span>
                <span id="v-times" class="f-pipe" style="display: none"></span>
                <span class="f-pipe"></span>
                <ins class="accuse-area"></ins>
            </div>
 <div class="q-operation mt-10 mb-5 f-pening" id="q-operation">
            <div id="ope-action" class="asker-op-btn">
                    <a href="#" class="mr-5 asker-op-buttons" alog-alias="qb-ask-addit">
                        补充问题<i class="ml-5 i-incline-down"></i>
                    </a>

                    <!--
                    <a href="#" class="mr-5 asker-op-buttons" alog-alias="qb-add-reward">
                        提高悬赏<i class="ml-5 i-incline-down"></i>
                    </a>
                    -->
                </div>
    <div class="ope-action-show show-added" style="display: none;">
                    <div>

                    <div class="ask-wrapper">
               <div class="ask-main-box">
                    <div class="question-description f-pening" id="question-description">
                        <form action="{{url('home/question')}}/{{ $data[$i]['id'] }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                           <input type="hidden" name="_method" value="put">
                            <div class="qd-layout">
                                
                                <div class="qd-content qd-content-desc">
                                    <div class="qd-ct qd-desc">
                                        <textarea id="content-area" name="ques_details" placeholder="选填，详细说明您的问题，以便获得更好的答案">{{isset($data[$i]['ques_details'])? $data[$i]['ques_details'] :''}}
                                        </textarea>
                                    </div>
                                    <div class="qd-plus" id="qd-plus-btn">
                                        <ul class="qd-plus-stuff clearfix">
                                            <input type="file" class="iknow-ask_icons i-add-img" name="ufile" /> 
                                            
                                        </ul>
                                        <ul id="qd-img-list" class="qd-img-list clearfix" style="display: none"></ul>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="wgt-submit">
                                <div id="normail-submit-panel">
                                    <div class="clearfix" id="submit-panel" data-hide="doctor">
                                        
                                        <div class="submit-question"  style="float: right;padding-top: 25px ">
                                            <button type="submit" class="submit-btn disabled" id="submit-btn">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>    
            

			<div class="ope-action-show show-enhance" style="display: none;">
				<i class="ope-arrow-up arrow-up-left-1"><em></em></i>
				<div class="wgt-enhance-score">
					<p>
						<a class="enhance-score" data-score="5"><em>5</em>财富值</a>
						<span class="f-line"></span>
						<a class="enhance-score" data-score="10"><em>10</em>财富值</a>
						<span class="f-line"></span>
						<a class="enhance-score" data-score="20"><em>20</em>财富值</a>
						<span class="f-line"></span>
						<a class="enhance-score" data-score="30"><em>30</em>财富值</a>
						<span class="f-line"></span>
						<a class="enhance-score" data-score="50"><em>50</em>财富值</a>
					</p>
					<p>
						<span class="enhance-other-score">
							<span class="other-score-left">或</span>
							<input type="text" class="other-score">
							<span class="other-score-right">财富值</span>
						</span>
						<span class="enhance-other-tips"></span>
					</p>
				</div>
				<p class="act-buttons line mt-15">
					您有<i class="iknow-qb_home_icons i-new-wealth ml-5"></i><em class="f-14 mr-5">16</em>财富值
					<a href="#" class="btn-32-green grid-r mr-5" id="enhance-submit">确定</a>
				</p>
			</div>
</div>

                <script>
                    // 提问区域可用时间
                    alog && alog('speed.set', 'c_ask', +new Date);
                    alog.fire && alog.fire("mark");
                </script>
                <script>
                    // 首屏时间打点
                    void function (e, t) {
                        for (var n = t.getElementsByTagName("img"), a = +new Date, i = [], o = function () {
                            this.removeEventListener && this.removeEventListener("load", o, !1), i.push({
                                img: this,
                                time: +new Date
                            })
                        }, s = 0; s < n.length; s++)!function () {
                            var e = n[s];
                            e.addEventListener ? !e.complete && e.addEventListener("load", o, !1) : e.attachEvent && e.attachEvent("onreadystatechange", function () {
                                    "complete" == e.readyState && o.call(e, o)
                                })
                        }();
                        alog("speed.set", {fsItems: i, fs: a})
                    }(window, document);
                </script>
                <div class="wgt-answers   " id="wgt-answers">
                    <div class="hd line ">
                        <h2>{{ count($answerinfo) }}条回答</h2>
                    </div>
                    <div class="bd-wrap">

                      @if($i<count($answerinfo))
                        <div class="bd answer answer-first    " id="answer-2779366022">
                            <div class="line">
                                <a id="here" name="here"></a>
                                <div class="line content content-new">
                                    <div id="answer-content-2779366022" accuse="aContent" class="answer-text line">
                                        <span class="con">
                                       {{ $answerinfo[$i]['answer_content'] }}
                                        </span>
                                    </div>
                                    <div class="line f-light-gray f-12 mt-10 ff-arial">
                                        <i class="i-quality-icon"></i>
                                        本回答被网友采纳
                                    </div>
                                    <div class="line info f-light-gray mt-10 mb-5 f-12">
                                        <div class="grid pt-5">
                                            <a alog-action="qb-username" class="user-name" rel="nofollow"
                                               href="/usercenter?uid=69324069236f25705e791986" target="_blank">
                                                <!--回答用户-->
                                            </a>
                                            <span class="f-pipe">|</span>
                                            <span class="pos-time">
                                            发布于{{ $answerinfo[$i]['answer_time'] }}
                                            </span>
                                        </div>
                                        <div class="grid-r f-aid pos-relative">
                                        </div>
                                    </div>
                                    <div class="asker-adopt asker-operations-e mt-10">
                                        <p class="line pos-relative f-aid">
                                            <ins class="accuse-area" alog-action="qb-accuse-link"></ins>
                                            <a href="#" hidefocus="true" data-info="0"
                                               class="asker-btn cancel-recommend-btn f-black mr-15"
                                               id="cancel-recommend-2779366022"><i class="iknow-qb_replyer_icons i-ask-close mr-5"></i>取消推荐
                                            </a>
                                        <!--    <span alog-action="qb-comment-btn" class="comment f-black cursor asker-btn"
                                                  id="comment-2779366022"><i
                                                    class="iknow-qb_home_icons i-icon-comment mr-5"></i>评论
                                            </span>-->
                                            <!--<a href="#" alog-action="qb-pump-ask" hidefocus="true"
                                               class="asker-btn asker-pump-btn goon-ask ml-15" id="pump-ask-2779366022">追问</a>-->
											    <a href="JavaScript:void(0)" alog-action="qb-pump-ask" hidefocus="true"
                                               class="asker-btn asker-pump-btn goon-ask ml-15" id="uniqueask">追问</a>
                                                <a href="#" alog-action="qb-adopt-ask" hidefocus="true"
                                               class="btn-adopt-ask ml-5" id="adopt-ask-2779366022"
                                               data-log="type:2060,action:click,area:adopt-ask,page:qb">
                                                采纳答案</a>
                                        </p>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
						@endif
						<div id="zhuiwen">
						</div>
				<div class="ask-main-box" id="answer-editor">
                    <div class="question-description f-pening" id="question-description">
                        <form id="fid" onsubmit="return DoSubmit()">
						<input type="hidden" name="ques_id" value="{{$data[$i]['id']}}"/>
						<input type="hidden" name="lanmu_id" value="{{$data[$i]['lanmu_id']}}"/>
                        <div class="qd-layout">
                            <div class="qd-content qd-content-desc">
                                    <div class="qd-ct qd-desc">
                                        <textarea name="asktext"></textarea>
                                    </div>
                            </div>
                        </div>

						<div class="wgt-submit">
							<div id="normail-submit-panel">
								<div class="clearfix" id="submit-panel" data-hide="doctor">
									
									<div class="submit-question"  style="float: right;padding-top: 25px ">
										<button type="submit" class="submit-btn disabled" id="submit-btn">提交</button>
									</div>
								</div>
							</div>
						</div>
                        </form>
                    </div>
                </div>
				<script>
				  function DoSubmit()
				  {
					  $.ajax({
						 url:"{{URL('question/askagain')}}",
						 type:'get',
						 data:$("#fid").serialize(),
						 dataType:'json',
						 async:true,
						 success:function(data){
							 //alert(data);
							 for(var i in data){
								 for(var j in data[i]){
									 //alert(data[i][j]);
									  //$("追问："+data[i][j]).append("#zhuiwen");
									  $("#zhuiwen").append("追问"+"　"+data[i][j]+"<br/>");
								 }
							 }
						},
						error:function(){
							window.location='/home/login';
						}
					});
					  return false;
				  }
				</script>
                @endfor
					
					
                    </div>
                </div>
                
               
                
                
            </article>
            <aside class="grid-r qb-side">
                <div class="wgt-user mod-shadow mb-5" id="wgt-user">
                    <div class="line user-info">
                        <div id="user-avarta" class="avarta grid mr-10">
                            <a alog-action="qb-enter-uc" href="/ihome/" target="_blank"><img class="user-head-img">
                        </div>
                        <div class="info grid f-12">
                            <p class="line">
                                <a href="http://zhidao.baidu.com/ihome" target="_blank" class="user-name">{{ $sessioninfo[0]->login_name}}</a>
                            </p>
                            <p">
                            <a class="f-aid iknow-qb_grade_icons i-gradeIndex-1" title="采纳率：0%" target="_blank"
                               href="http://help.baidu.com/question?prod_en=zhidao&class=242&id=1000776"></a>
                            </p>
                        </div>
                    </div>
                    <div class="qbside-top-line"></div>

                    <!--

                    <div class="wgt-user-nums f-pening">
                        <span>
                        <a href="/ihome/ask" class="f-gray untreated-count" target="_blank">未采纳提问</a>
                        <em class="f-yahei f-red f-22">2</em>
                        </span>
                        <span class="f-pipe">|</span>
                        <span>
                        <a href="/ihome" class="f-gray untreated-count" target="_blank">我的财富值</a>
                        <em class="f-yahei f-red f-22">16</em>
                        </span>
                    </div>

                    -->

                    <div class="wgt-untreated-ask">
                        <h2 class="f-gray f-14 pl-10 f-pening">您有以下提问尚未采纳：<i></i></h2>
                        <div class="untreated-ask-list line">
                            <div class="untreated-ask-item line">
                                <a class="grid" log="pos:untreated_ask,action:click,index:0"
                                   href="/question/373677019765643484.html?fr=qb_unadt" target="_blank">php学哪些内容</a>
                                <em class="grid-r f-aid ff-arial">2回答</em>
                            </div>
                            <div class="untreated-ask-item line">
                                <a class="grid" log="pos:untreated_ask,action:click,index:1"
                                   href="/question/1515828449551308780.html?fr=qb_unadt" target="_blank">斯蒂芬是否</a>
                                <em class="grid-r f-aid ff-arial">1回答</em>
                            </div>
                        </div>
                        <a log="pos:untreated_ask_more,action:click" href="/ihome/ask" target="_blank"
                           class="btn-24-white untreated-ask-button ff-arial mt-10">处理全部问题</a>
                    </div>
                </div>
            </aside>
        </section>
    </div>
</div>


<div class="wgt-footer-new">
    <div class="footer-wp">
        <ul class="footer-list clearfix">
            <li class="footer-list-item footer-list-guide">
                <div class="footer-title"><span class="icon-guide"></span>新手帮助</div>
                <ul class="footer-link clearfix">
                    <li><a href="http://help.baidu.com/question?prod_en=zhidao&class=241&id=1521"
                           target="_blank">如何答题</a></li>
                    <li><a href="http://help.baidu.com/question?prod_id=9&class=531" target="_blank">获取采纳</a></li>
                    <li><a href="http://help.baidu.com/question?prod_en=zhidao&class=531" target="_blank">使用财富值</a></li>
                </ul>
            </li>
            <li class="footer-list-item footer-list-intro">
                <div class="footer-title"><span class="icon-intro"></span>玩法介绍</div>
                <ul class="footer-link clearfix">
                    <li><a href="/shop" target="_blank">知道商城</a></li>
                    <li><a href="http://zhidao.baidu.com/pcs/zhimatuan/index.html" target="_blank">知道团队</a></li>
                    <li><a href="/hangjia" target="_blank">行家认证</a></li>
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
            &copy;2017 Baidu&nbsp;&nbsp; <a rel="nofollow" href="http://www.baidu.com/duty/" target="_blank">使用百度前必读</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                rel="nofollow" href="http://help.baidu.com/question?prod_en=zhidao&class=597&id=1001104"
                target="_blank">知道协议</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a rel="nofollow" href="/special/view/cooperation"
                                                                    target="_blank">百度知道品牌合作</a>
        </p>
    </div>
</div>



<div id="anttongji"></div>

<script type="text/javascript">
    try {
        (function () {
            var param_a = 218;
            var param_b = 164;
            var param_c = 228;
            var param_d = 205;
            var string_a = param_a.toString();
            var string_b = param_b.toString();
            var string_c = param_c.toString();
            var string_d = param_d.toString();
            var result = "";
            var str_all = string_a + "412" + string_b + "1234" + string_c + "43" + string_d;
            for (var i = 0; i < str_all.length; i++) {
                result += String.fromCharCode(parseInt(str_all[i]) + 97);
            }
            var xhr = null;
            if (window.XMLHttpRequest) {
                xhr = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            if (xhr) {
                xhr.open("POST", "/question/api/replynum?t=" + new Date().getTime(), true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function () {
                };
                var qid = "373677019765643484";
                var logid = 0811798743;
                xhr.send("qid=" + qid + "&replyT=" + result + "&logid=" + logid);
            }
        })();
    } catch (e) {
        //...
    }
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
<script type="text/javascript" src="{{asset('home/js/mod_96dd55b.js')}}"></script>
<script type="text/javascript">require.resourceMap({
    "res": {
        "common:widget\/js\/ui\/suggestion-new\/suggestion-new.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/common\/widget\/js\/ui\/suggestion-new\/suggestion-new_0d26480.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/lib\/jquery.ui\/jquery.ui.autocomplete.js", "common:widget\/js\/ui\/base\/base.js"]
        },
        "common:widget\/js\/logic\/search-box-new\/search-box-new.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/common\/widget\/js\/logic\/search-box-new\/search-box-new_c6b0786.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/ui\/suggestion-new\/suggestion-new.js", "common:widget\/js\/util\/event\/event.js", "common:widget\/js\/util\/form\/form.js", "common:widget\/js\/util\/log\/log.js", "common:widget\/js\/ui\/dialog\/dialog.js", "common:widget\/lib\/jquery.placeholder\/jquery.placeholder.js"]
        },
        "common:widget\/js\/ui\/clipboard\/clipboard.js": {"url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/common\/widget\/js\/ui\/clipboard\/clipboard_581e531.js"},
        "question:widget\/read-opt\/img-preview\/preview.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/read-opt\/img-preview\/preview_22279e0.js",
            "deps": ["common:widget\/lib\/jquery\/jquery.js", "common:widget\/js\/ui\/dialog\/dialog.js", "common:widget\/js\/logic\/category\/category.js", "common:widget\/js\/util\/log\/log.js"]
        },
        "question:widget\/ask\/pc-exp\/ask-img.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/ask\/pc-exp\/ask-img_2de3204.js",
            "deps": ["common:widget\/lib\/jquery\/jquery.js", "common:widget\/js\/ui\/dialog\/dialog.js", "common:widget\/js\/logic\/category\/category.js", "common:widget\/js\/util\/log\/log.js", "question:widget\/read-opt\/img-preview\/preview.js"]
        },
        "question:widget\/js\/video\/video.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/js\/video\/video_00854c0.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/util\/suffix-str\/suffix-str.js", "common:widget\/js\/util\/log\/log.js"]
        },
        "question:widget\/js\/psask-bindsms\/psask-bindsms.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/js\/psask-bindsms\/psask-bindsms_8c99828.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/util\/log\/log.js", "common:widget\/js\/util\/event\/event.js", "common:widget\/js\/ui\/dialog\/dialog.js", "common:widget\/js\/logic\/phone-bind\/phone-bind.js"]
        },
        "question:widget\/js\/admin\/officialAdmin\/officialAdmin.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/js\/admin\/officialAdmin\/officialAdmin_b633bc6.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/ui\/dialog\/dialog.js", "common:widget\/js\/logic\/category\/category.js", "common:widget\/js\/util\/event\/event.js"]
        },
        "question:widget\/js\/admin\/userAdmin\/userAdmin.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/js\/admin\/userAdmin\/userAdmin_defc53f.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/util\/event\/event.js", "common:widget\/js\/ui\/dialog\/dialog.js", "common:widget\/js\/logic\/category\/category.js", "question:widget\/js\/set-tag\/set-tag.js", "common:widget\/lib\/jquery.placeholder\/jquery.placeholder.js"]
        },
        "question:widget\/js\/unloginask-bindsms\/unloginask-bindsms.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/js\/unloginask-bindsms\/unloginask-bindsms_9960dc1.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/util\/log\/log.js", "common:widget\/js\/util\/event\/event.js", "common:widget\/js\/ui\/dialog\/dialog.js"]
        },
        "question:widget\/js\/audio\/jplayer\/jplayer.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/js\/audio\/jplayer\/jplayer_058fa6c.js",
            "deps": ["common:widget\/lib\/jquery\/jquery.js"]
        },
        "question:widget\/js\/audio\/audio.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/js\/audio\/audio_cae7476.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/util\/log\/log.js", "question:widget\/js\/audio\/jplayer\/jplayer.js"]
        },
        "question:widget\/js\/mavin-msg\/mavin-msg.js": {
            "pkg": "question:p6",
            "deps": ["common:widget\/lib\/jquery\/jquery.js", "common:widget\/js\/util\/event\/event.js", "common:widget\/js\/ui\/base\/base.js", "common:widget\/js\/logic\/msg\/msg.js"]
        },
        "question:widget\/user\/mavin\/mavin.js": {
            "pkg": "question:p6",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/util\/log\/log.js", "common:widget\/js\/ui\/carousel\/carousel.js"]
        },
        "question:widget\/js\/weather\/weather.js": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/widget\/js\/weather\/weather_48530fb.js",
            "deps": ["common:widget\/js\/util\/tangram\/tangram.js", "common:widget\/js\/util\/log\/log.js", "common:widget\/lib\/jquery.placeholder\/jquery.placeholder.js"]
        }
    },
    "pkg": {
        "question:p6": {
            "url": "https:\/\/gss0.bdstatic.com\/7051cy792sgCpNKfpU_Y_D3\/static\/question\/pkg\/mavin_3a61af0.js",
            "has": ["question:widget\/js\/mavin-msg\/mavin-msg.js", "question:widget\/user\/mavin\/mavin.js"]
        }
    }
});</script>
<script type="text/javascript"
        src="{{asset('home/js/framework_35930a1.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/more_fc10a72.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/qianbao-dialog_a3c13c6.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/validate_d964132.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/module_05324fc.js')}}"></script>    
<script type="text/javascript"
        src="{{asset('home/js/userbar-renew_5f2e977.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/set-tag_bcfade4.js')}}"></script> 
<script type="text/javascript"
        src="{{asset('home/js/tag_951bc8a.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/swfupload_b24a26d.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/editor_f72e2fa.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/app-guide_e973e23.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/editor_50d018d.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/asker_3914531.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/asker-banner_1992c63.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/business_546d2ae.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/share_e1dc32b.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/ck_8e1d0e9.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/module_ff13383.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/push-mavin_bf51276.js')}}"></script>
<script type="text/javascript"
        src="{{asset('home/js/login_921e1c2.js')}}"></script>
<script type="text/javascript">
    !function () {
        require.async('common:widget/userbar-renew/userbar-renew.js');
    }();
    !function () {
        require.async('common:widget/js/logic/search-box-new/search-box-new.js');
    }();
    !function () {
        require.async('common:widget/menu/menu.js', function (menu) {
            menu.init();
        });
        // 导航menu可用时间打点
        alog && alog('speed.set', 'c_menu', +new Date);
        alog.fire && alog.fire("mark");
    }();
    !function () {
        require.async('question:widget/ask/tag/tag.js', function (tagEvent) {
            new tagEvent();
        });
    }();
    !function () {
        require.async('question:widget/ask/asker/asker.js', function (asker) {
            asker.init('0');
        });
    }();
    !function () {
        require.async('question:widget/ask/ask.js');
        require.async('question:widget/ask/pc-exp/ask-img.js');
    }();
    !function () {
        require.async('question:widget/value-comment/value-comment.js', function (vc) {
            vc.init('2779366022');
        });
    }();
    !function () {
        require.async('question:widget/answer-deal/asker/asker.js', function (deal) {
            deal.init("2779366022");
        });
    }();
    !function () {
        require.async('question:widget/value-comment/value-comment.js', function (vc) {
            vc.init('2779072143');
        });
    }();
    !function () {
        require.async('question:widget/answer-deal/asker/asker.js', function (deal) {
            deal.init("2779072143");
        });
    }();
    !function () {
        require.async('question:widget/answers/answers.js', function (ans) {
        });
    }();
    !function () {
        require.async('question:widget/asker-push/asker-push.js', function (ap) {
            ap.init('1498638546');
        });
    }();
    !function () {
        require.async('question:widget/user/info/basic/basic.js');

        require.async(['common:widget/js/util/tangram/tangram.js', 'common:widget/js/logic/sign-in/sign-in.js', 'common:widget/js/util/log/log.js'], function ($, SignIn, Log) {
            Log.send({
                'type': 2014,
                'action': 'pv',
                'fr': 'qb',
                'pos': 'signin-entrance'
            });

            $('.go-sign-in').click(function (e) {
                e.preventDefault();

                Log.send({
                    'type': 2014,
                    'action': 'click',
                    'fr': 'qb',
                    'pos': 'signin-entrance'
                });

                new SignIn({
                    year: '2017',
                    month: '06',
                    day: '30'
                });
            });
        });
    }();
    !function () {
        require('common:widget/js/logic/ie-prompt/ie-prompt.js');
    }();
    !function () {
        require.async(['common:widget/js/util/tangram/tangram.js', 'common:widget/js/util/log/log.js', 'common:widget/js/util/event/event.js', 'common:widget/js/logic/submit/submit.js', 'common:widget/js/ui/dialog/dialog.js', 'question:widget/js/file/file.js', 'question:widget/js/left-promotion/left-promotion.js', 'question:widget/js/video/video.js', 'common:widget/js/ui/tip/tip.js', 'question:widget/ask/share/share.js', 'common:widget/js/util/https/https.js'], function ($, log, ec, Submit, Dialog, File, LeftPromotion, Video, Tip, share, https) {

            // 打点QB页用户可操作时间
            alog('speed.set', 'drt', +new Date);
            // F.context('new_qb_fr', 'new_qb_' + 0);

            $(function () {
                require.async('question:widget/js/submitjump/submitjump.js', function (submitjump) {
                    submitjump.init();
                });
                require.async('question:widget/js/accuse/accuse.js', function (accuse) {
                    accuse.init({response: 'wgt-ask', target: '#wgt-ask .accuse-area'});
                    if (!$.isEmptyObject(F.context('answers'))) {

                        accuse.init({target: '.wgt-best .accuse-area', response: 'wgt-best'});

                        // accuse.init({ target: '.wgt-recommend .accuse-area', response: 'wgt-recommend' });

                        // accuse.init({ target: '.wgt-special .accuse-area', response: 'wgt-special' });

                        accuse.init({response: 'answer', target: '#wgt-answers .accuse-area'});
                    }
                });
                if (F.context('user')['internalAdmin']) {
                    require.async('question:widget/js/admin/officialAdmin/officialAdmin.js', function (A) {
                        A.init();
                    });
                }
                if (F.context('user')['isUserAdmin'] == '1') {
                    require.async('question:widget/js/admin/userAdmin/userAdmin.js', function (A) {
                        A.init();
                    });
                }
                require.async('common:widget/js/logic/complain/complain.js', function (complain) {
                    $('.complain-deleted').click(function (ev) {
                        ev.preventDefault();
                        complain(F.context('page')['qid'], $(this).attr('data'));
                    });
                });


                log.addKey({
                    qbleftdown: $('.qbleftdown').find('li').size(),
                    qbrightdown: $('.qbrightdown').find('.r').size()
                });
                if ($('.qbleftdown a').size()) {
                    log.addKey({
                        ec_ads: '2',
                        ec_ads_count: $('.qbleftdown').find('a.ec_ad_title, span.ec_qad_title, a.EC_ad_title').size()
                    });
                    $('.qbleftdown a').click(function () {
                        var $parent = $(this).parent();
                        if (this.id || this.className == 'EC_ad_title'
                            || $(this).hasClass('ec_ik220_adtitle')
                            || $(this).hasClass('ec_ik220_desc')
                            || $parent.hasClass('EC_ads_answer')
                            || this.className == 'EC_ads_listurl'
                            || this.className == 'ec_ad_title'
                            || $parent.hasClass('ec_qad_title')
                            || $parent.hasClass('ec_qad_answerer')) {
                            log.send({
                                type: 2014,
                                evtType: 'click',
                                pos: 'ec_ads'
                            });
                        }
                    });
                }
                require.async('question:widget/js/card/card.js', function (card) {
                    $('.user-name').each(function (index, item) {
                        new card({target: item, type: 'normal'});
                    });
                    $('.mavin-name').each(function (index, item) {
                        new card({target: item, type: 'mavin'});
                    });
                    $('.opendev-name').each(function (index, item) {
                        new card({target: item, type: 'opendev'});
                    });
                    $('.uadmin-a').each(function (index, item) {
                        new card({target: item, type: 'uadminIcon'});
                    });
                    $('.business-name').each(function (index, item) {
                        new card({target: item, type: 'business'});
                    });
                    $('.quality-business-name').each(function (index, item) {
                        new card({target: item, type: 'qbusiness'});
                    });
                });
                $('.fixed-ask-e').click(function (e) {
                    e.preventDefault();
                    var username = $(this).attr('username');
                    require.async('common:widget/js/logic/iask/iask.js', function (fixedAsk) {
                        fixedAsk(username);
                    });
                });
                $('.replyask-shrink a').click(function (e) {
                    e.preventDefault();
                    var flag = this.innerHTML.indexOf('更多追问') != -1;

                    var dl = $(this).html(flag ? '<i class="i-incline-up"></i>收起追问' : '<i class="i-incline-down"></i>更多追问').parent().prevAll('.replyask');
                    $($.makeArray(dl).reverse().slice(flag ? 0 : 3, dl.length)).css('display', flag ? 'block' : 'none');
                });
                $('.replyask-box').each(function (index, item) {
                    if ($(item).find('.replyask-shrink').size() == 0) {
                        if ($(item).find('.ask-supply').size() == 2) {
                            // $(item).find('.replyask').last().find('.ask-supply-line').hide();
                        }
                        if ($(item).find('.ask-supply').size() == 1) {
                            // $(item).find('.ask-supply-line').hide();
                        }
                        // $(item).find('.ask-supply-line').last().hide();
                    }
                });
                if ($('.thunder-wrap').size()) {
                    require.async('question:widget/js/thunder/thunder.js', function (thunder) {
                        $(function () {
                            thunder.init();
                        });
                    });
                }
                $.each(F.context('answers'), function (index, item) {
                    if (item.user) {
                        if (item.user.isFromBusiness > 0) {
                            $.ajax({
                                url: '/business/submit/onbusinessbrowse',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    businessId: item.user.business.businessId,
                                    page: '1',
                                    token: F.context('businessToken')
                                }
                            })
                                .done(function () {
                                })
                                .fail(function () {
                                });
                        }
                    }
                });

                if ($('.newbest-mavin-prolink').size()) {
                    var uidArr = [];
                    $('.newbest-mavin-prolink').each(function (index, item) {
                        var $item = $(item);
                        var $answer = $item.parents('.wgt-replyer-best').eq(0).prev();
                        // 获得问题ID，进而获得用户ID
                        var rid = $answer.get(0).id.replace(/[^\d]/g, '');
                        var replyInfo = F.context('answers')[rid];
                        var uid = replyInfo.uid;
                        var uname = replyInfo.userName;
                        var cid = $item.data('cid');
                        uidArr.push(uid);
                        log.send({
                            type: 2014,
                            pos: 'newbest-mavin-prolink',
                            action: 'pv',
                            page: 'question',
                            qid: F.context('page')['qid'],
                            cid: cid.toString().substr(0, 3),
                            uname: uname,
                            mark: uid
                        })
                    });
                    $.ajax({
                        url: '/mavin/api/mavinpv',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            isShowProLink: 1,
                            uids: uidArr.join(','),
                            qid: F.context('page')['qid']
                        }
                    })
                        .done(function () {
                        })
                        .fail(function () {
                        });
                }
                else {
                }
                $(document).on('click', '.ikqb_img', function () {
                    log.send({
                        type: 2014,
                        bigimg: 'click'
                    });
                });
                $('a.optimus').on('click', function () {
                    log.send({
                        type: 2014,
                        area: 'ad-right-optimus',
                        action: 'click',
                        cid: F.context('page')['cid'],
                        cidTop: F.context('page')['cidTop'],
                        cidMid: F.context('page')['cidMid']
                    });
                });

                $('#wgt-nologin-daily').click(function (e) {
                    e.stopPropagation();

                    if ($(e.target).closest('#daily-carousel').size() && !$(e.target).closest('.carousel-control').size()) {
                        log.send({
                            type: 2014,
                            page: 'question',
                            pos: 'no-login-daily',
                            action: 'click'
                        });
                    }
                });

                $('.wgt-daily').on('click', 'a', function () {
                    log.send({
                        type: 2014,
                        page: 'question',
                        pos: 'login-daily',
                        action: 'click'
                    });
                });
                $('.qbrightdown a').click(function () {
                    log.send({
                        type: 2014,
                        qid: F.context('page')['qid'],
                        area: 'medical-right-txt-ads',
                        action: 'click'
                    });
                });
                if ($('ikaudio').size()) {
                    log.addKey({
                        'audio': 1
                    });

                    require.async('question:widget/js/audio/audio.js', function (audio) {
                        audio.init();
                    });
                }
                require.async('question:widget/js/comment/comment.js', function (comm) {
                    comm.getCount();
                });
                $('.recommend-text, .best-text, .answer-text, .replyask-content').each(function (i, answerText) {
                    $(answerText).find('pre[t="code"]').each(function (i, pre) {
                        var loadSyntax = function () {
                            SyntaxHighlighter(pre);
                        };

                        $(pre).text($(pre).html($(pre).html().replace(/<br\s*\/?>/ig, '##IK_LINEBREAK##')).text().split('##IK_LINEBREAK##').join('\n'));

                        $(pre).addClass('brush:' + $(pre).attr('l') + ';toolbar:false;');
                        if (window.SyntaxHighlighter) {
                            SyntaxHighlighter.highlight(pre);
                            $(answerText).find('.syntaxhighlighter .code .line').each(function (index, line) {
                                $(answerText).find('.syntaxhighlighter .gutter .line').eq(index).height($(line).height());
                            });
                        } else {
                            var sioUrl = https.autoTrans('http://img.iknow.bdimg.com/libs/SyntaxHighlighter/shCore.min.js');
                            $.sio(sioUrl).callByBrowser(function () {
                                SyntaxHighlighter.defaults['quick-code'] = false;
                                SyntaxHighlighter.config.stripBrs = true;
                                SyntaxHighlighter.highlight(pre);
                                $(answerText).find('.syntaxhighlighter .code .line').each(function (index, line) {
                                    $(answerText).find('.syntaxhighlighter .gutter .line').eq(index).height($(line).height());
                                });
                            });
                        }
                    });

                    $(answerText).find('ikvideo').each(function (i, video) {
                        var id = 'VIDEO_' + $.id(),
                            src = $(video).attr('src'),
                            sid;

                        var container = $('<div/>').attr('id', id).insertBefore($(video));
                        if (src.indexOf('v.baidu.com') > -1) {
                            container.html('<iframe src="' + src + '" frameborder=0 scrolling="no" width="' + $(video).attr('width') + '" height="' + $(video).attr('height') + '" class="' + $(video).attr('class') + '"></iframe>');
                            return;
                        }
                        if (src.indexOf('youku') > -1 && (sid = src.match(/sid\/(.*?)[\?\/]/))) {
                            if (sid[1]) {
                                src = 'http://player.youku.com/player.php/sid/' + sid[1] + '/v.swf';
                            }
                        }

                        container.html('<embed src="' + src + '" allowFullScreen="true" quality="high" width="' + $(video).attr('width') + '" height="' + $(video).attr('height') + '" align="' + $(video).attr('align') + '" allowScriptAccess="never" type="application/x-shockwave-flash"></embed>');
                    });
                });

                require.async('common:widget/js/ui/lazyload/lazyload.js', function (lazyload) {
                    $('.wgt-replyer-best .avatar-48 a, .wgt-replyer-best .avatar-66 a, .wgt-replyer-special .avatar-66 a,.wgt-replyer-best .avatar-69 a, .wgt-replyer-best .avatar-70 a, .wgt-replyer-best .avatar-66 a, #cms-company a').lazyload();
                });
                $('.ikqb-map').each(function (index, item) {
                    var ifreamObj = $("<iframe/>").attr({
                            frameborder: '0'
                            , width: "430"
                            , height: "310"
                            , style: 'display:none;'
                            , className: 'answer-map'
                        }),
                        tmpsrc = $(item).attr("map") || $(item).attr("src");
                    ifreamObj.attr('src', "//zhidao.baidu.com/html/map" + tmpsrc.replace(/^iknow/i, ''));

                    $(item).before(ifreamObj).remove();
                    ifreamObj.after(
                        $("<p/>").addClass('f-aid').html("本数据来源于百度地图，最终结果以百度地图最新数据为准。")
                    ).show();
                });
                var mavinUidAry = [];
                $.object.each(F.context('answers'), function (item, key) {
                    if (item.user && item.user.mavinName) {
                        mavinUidAry.push(item.uid);
                    }
                });

                if (mavinUidAry.length) {
                    var options = {
                        uids: mavinUidAry.join(',')
                    };

                    $.post('/mavin/api/getmavinpv', options);
                }


                log.addKey({
                    nsma: "2"
                });


                if ($('video.edui-faked-video').size() > 0) {
                    Video.init();
                }

                require.async('common:widget/js/logic/ut/ut.js', function (UT) {
                    UT.start(['userbar', 'header', 'wgt-ask', 'answer-editor', 'wgt-answers']);
                });

                if ($('file').size() == 0) {
                    logPV();
                } else {
                    File.init(logPV);
                }

                if (F.context('user')['isUserAdmin'] != '1') {
                    require.async('question:widget/js/select-search/select-search.js', function (A) {
                        A.init();
                    });
                }
                var adTopImg = $('.adTopImg');
                if (adTopImg.length && adTopImg.css('display') != 'none') {
                    log.addKey({
                        adTopImg_new: 1
                    });
                    adTopImg.on('click', function () {
                        log.send({
                            page: 'question',
                            pos: 'adTopImg_new',
                            action: 'click',
                            type: 2014
                        });
                    });
                }

                log.init({key: 2014, query: 'body', action: 'click'});
                function logPV() {
                    var logOptions = {
                        type: 2014,
                        page: 'question',
                        action: 'entrance',
                        screen: parseInt($('body').height() / $(window).height()),
                        qid: F.context('page')['qid'],
                        cid: F.context('page')['cid'],
                        view: F.context('page').isView,
                        cidTop: F.context('page')['cidTop'],
                        cidMid: F.context('page')['cidMid'],
                        refer: document.referrer
                    };
                    log.addKey({
                        sample_new_qb: 0
                    });
                    log.addKey({
                        evaSampling: 592
                    });


                    log.addKey({
                        sample_qb_50per: "2"
                    });

                    log.addKey({
                        qid: F.context('page')['qid']
                    });

                    if (F.context('page').relateQids) {
                        logOptions.relateQids = F.context('page').relateQids;
                    }

                    if (F.context('page').relateTopicQids) {
                        logOptions.relateTopicQids = F.context('page').relateTopicQids;
                    }
                    if ($('a.optimus').length) {
                        log.addKey({'optimus': 1});
                    }
                    if ($('.classinfo').length) {
                        log.addKey({'classinfo': 1});
                    }
                    var uadminIcon = $('.uadmin-a');
                    var uadminIconSize = uadminIcon.length;
                    if (uadminIconSize) {
                        logOptions.uadminIconNum = uadminIconSize;
                    }

                    setTimeout(function () {
                        log.send(logOptions, true);
                    }, 100);
                }

                log.addKey({'qb_test_case': '12'});
                var loc_ans = $.url.getQueryValue(location.href, 'loc_ans');
                if (!loc_ans) {
                    var myAnswerList = $('.wgt-best .answer-mine, .wgt-recommend .answer-mine, .wgt-special .answer-mine'),
                        myAnswer = null;
                    if (myAnswerList.size()) {
                        myAnswer = myAnswerList.first();
                        setTimeout(function () {
                            $(document).scrollTop(myAnswer.offset().top - 10);
                        }, 200);
                    }
                } else {
                    var locAnswerList = $('.wgt-best .answer, .wgt-recommend .answer, .wgt-special .answer'),
                        locAnswer = null;
                    locAnswerList.each(function (index, item) {
                        if ($(item).attr("id").indexOf(loc_ans) != -1) {
                            locAnswer = $(item);
                        }
                    });
                    if (locAnswer) {
                        setTimeout(function () {
                            $(document).scrollTop(locAnswer.parent().offset().top - 10);
                        }, 200);
                    }
                }
                if (F.context('egg')) {
                    require.async('question:widget/js/egg/egg.js', function (egg) {
                        $(function () {
                            egg.init(F.context('egg'));
                        });
                    });
                }
                var grid68 = $('.qb-content'),
                    qid = F.context('page')['qid'];
                $.each({
                    'qb-content': '.q-content a@',
                    'qb-supply-content': '.q-supply-content a@',
                    'qb-best-text': '.wgt-best .best-text a@',
                    'qb-special-bast-text': '.wgt-special .best-text a@',
                    'qb-recommend-text': '.wgt-recommend .recommend-text a@',
                    'qb-answer-text': '.answer-text a@',
                    'qb-replyask-ask': '.ask+dd a',
                    'qb-replyask-reply': '.reply+dd a',
                    'qb-best-thank': '.thank pre a',
                    'qb-answer-refer': '.answer-refer a'
                }, function (key, val) {
                    var aLink = grid68.find(val.replace(/\@$/, '[title!="点击查看大图"]'))
                        .not('.app-keyword,.inner-link')
                        .filter(function () {
                            return this.getAttribute('href').match(/^http/i) && this.innerHTML != '' && !$(this).closest('.ed2k-wrap').size() && !$(this).closest('.thunder-wrap').size()
                        });
                    if (aLink.length > 0) {
                        $(aLink).each(function (i, item) {
                            log.send({
                                'type': 2014,
                                'page': 'question',
                                'qid': qid,
                                'area': key,
                                'action': 'linkPv',
                                'text': item.getAttribute('href'),
                                'host': item.getAttribute('href').split('/')[2]
                            });
                        });
                    }
                    aLink.click(function () {
                        log.send({
                            'type': 2014,
                            'page': 'question',
                            'qid': qid,
                            'area': key,
                            'action': 'linkClick',
                            'text': this.getAttribute('href'),
                            'host': this.getAttribute('href').split('/')[2]
                        });
                    });
                    grid68.find(val.replace(/\@$/, '')).attr('rel', 'nofollow');
                });
                $(document).keydown(function (e) {
                    if (e.ctrlKey && e.keyCode == 67) {
                        var isStandard = Boolean(window.getSelection),
                            selection = isStandard ? window.getSelection() : document.selection.createRange(),
                            text = (isStandard ? selection + '' : selection.text).replace(/\n+/g, ''),
                            textLen = text.length;
                        log.send({
                            type: 2014,
                            page: 'question',
                            qid: F.context('page')['qid'],
                            uid: F.context('user')['id'],
                            action: 'ctrl+c',
                            text: (textLen > 0 && textLen < 50) ? text : ''
                        });
                    }
                });
                var BAIDUID = $.cookie.get('BAIDUID') ? $.cookie.get('BAIDUID') : '0',
                    recordkey = 'IK_' + BAIDUID.split(':')[0],
                    recordCookie = $.cookie.get(recordkey) || 0,
                    recordCidKey = 'IK_CID_' + F.context('page').cidTop,
                    recordCidCookie = $.cookie.get(recordCidKey) || 0,
                    cookieOpt = {
                        expires: 1000 * 60 * 60 * 24 * 365,
                        path: '/'
                    };
                $.cookie.set(recordkey, parseInt(recordCookie) + 1, cookieOpt);
                $.cookie.set(recordCidKey, parseInt(recordCidCookie) + 1, cookieOpt);
                $.cookie.remove(recordkey, {
                    path: '/question'
                });
                var cookieArr = document.cookie && document.cookie.split('; ');
                if (cookieArr.length) {
                    $.each(cookieArr, function (i, item) {
                        var cookieKey = item.split('=')[0];
                        if (cookieKey != recordkey && cookieKey.match(/IK_[0-9A-Z]{32}/)) {
                            $.cookie.remove(cookieKey, {path: '/'});
                        }
                    });
                }
                if ($.cookie.get('IK_REFER_QID')) {
                    $.cookie.remove('IK_REFER_QID', {path: '/'});
                }
                $(document).on('click', 'a[href*="/question/"]', function () {
                    $.cookie.set('IK_REFER_QID', F.context('page').qid, {
                        expires: 20000,
                        path: '/'
                    });
                });

                $(document).on('click', '.ikqb_img_alink', function (evt) {
                    if ($.browser.msie && $.browser.version == 6) {
                        return false;
                    }
                    var imgTarget = $(this).find('img'),
                        imgBigSrc = $(this).attr('href'),
                        maxWidth = $(this).parent('p').outerWidth(),
                        imgSmallSrc = imgTarget.attr('esrc'),
                        sourceWidth = imgTarget.width(),
                        sourceHeight = imgTarget.height();

                    if (imgTarget.hasClass('img_show')) {
                        imgTarget.attr('src', imgBigSrc);
                        if (!imgTarget.hasClass('ikqb_img')) {
                            imgTarget.removeClass('ikqb_img');
                            imgTarget.animate({
                                'width': '100%'
                            }, 500);
                        } else {
                            imgTarget.animate({
                                'maxWidth': '500px',
                                'maxHeight': '340px'
                            }, 500);
                        }
                        imgTarget.removeClass('img_show');
                    } else {
                        $(this).append('<i class="ikqb_img_loading"></i>');
                        var bigImg = new Image();
                        bigImg.onload = function () {
                            imgTarget.attr('src', imgBigSrc);
                            if (sourceWidth == bigImg.width) {
                                imgTarget.removeClass('ikqb_img');
                                imgTarget.animate({
                                    'width': '120%'
                                }, 500);
                            } else {
                                imgTarget.animate({
                                    'maxWidth': bigImg.width > maxWidth ? maxWidth : bigImg.width,
                                    'maxHeight': bigImg.height
                                }, 500);
                            }
                            imgTarget.addClass('img_show');
                            $('.ikqb_img_loading').remove();
                        }
                        bigImg.src = imgBigSrc;
                    }
                    evt.preventDefault();
                });
                $('#search-form').submit(function (e) {
                    log.send({
                        type: 2014,
                        page: 'question',
                        position: 'searchbtn',
                        action: 'click'
                    });
                    e.preventDefault();
                });
            });

            //统计QB页用户名片的展现量、查看QB页用户名片的用户数
            $('.user-name').on('mouseenter', function (e) {
                log.send({
                    'page': 'qb',
                    'type': 2060,
                    'action': 'hover',
                    'area': 'user-name'
                });
            }).on('click', function (e) {
                log.send({
                    'page': 'qb',
                    'type': 2060,
                    'action': 'click',
                    'area': 'user-name'
                });
            });
            //“向TA求助”的点击量、点击用户数
            $('body').on('click', '.fixed-ask, .fixed-ask-e', function (e) {
                log.send({
                    'page': 'qb',
                    'type': 2060,
                    'action': 'click',
                    'area': 'fixed-ask'
                });
            });
            // “举报“下“描述不清”等三项的展现量（PV）、  “描述不清”等三项的点击总量、 “描述不清”等三项的点击用户数
            $('body').on('mouseenter', '.wgt-accuse .accuse-enter', function (e) {
                log.send({
                    'page': 'qb',
                    'type': 2060,
                    'action': 'hover',
                    'area': 'accuse-enter'
                });
            }).on('click', '.wgt-accuse a', function (e) {
                log.send({
                    'page': 'qb',
                    'type': 2060,
                    'action': 'click',
                    'area': 'wgt-accuse-a'
                });
            });

            // 新增分享打点统计
            if ($.url.getQueryValue(location.href, 'sharesource')) {
                log.send({
                    module: 'question',
                    page: 'qb',
                    project: 'new-qb-share',
                    postion: 'new-share',
                    action: 'view-by-share-' + $.url.getQueryValue(location.href, 'sharesource')
                });
            }

            // 个人行家回答特型tooltip
            var mavinTips = [];
            var mavinTimeout = [];
            $('.mavin-reply-icon').each(function (index) {
                var me = this;
                var mavinLevelTitle = $(this).attr('data-title');
                var mavinMajor = $(this).attr('data-major');
                var content = '<p class="mavin-reply-tip"><span class="mr-5">[' + mavinLevelTitle + ']</span>已完成<span class="enhance">实名认证</span>+<span class="enhance">行业认证</span>';
                if (mavinMajor == 1) {
                    content += '+<span class="enhance">专业认证</span>';
                }
                content += '</p>';

                $(this).mouseenter(function (e) {
                    $('div[role="tooltip"]').hide();
                    clearTimeout(mavinTimeout[index]);
                    mavinTimeout[index] = setTimeout(function () {

                        if (!mavinTips[index]) {
                            mavinTips[index] = new Tip({
                                'target': me,
                                'tooltipClass': 'tip-white',
                                'autoDispose': false,
                                'direction': 'top',
                                'content': content,
                                'position': {
                                    my: 'left-20 top'
                                }
                            });
                        }
                        mavinTips[index].show();
                    }, 70);

                }).mouseleave(function (e) {
                    mavinTimeout[index] = setTimeout(function () {
                        mavinTips[index] && mavinTips[index].hide();
                    }, 70);
                });
            });
            window.onload = function () {

                var sendLog = function () {
                    var is_topads_truely_show = null;           // 顶部网盟
                    var is_bottomwangmeng_truely_show = null;   // 底部网盟为你推荐
                    var is_leftads_truely_show = null;          // 实际展示左下广告
                    var is_rightads_truely_show = null;         // 实际展示左下广告

                    // 顶部网盟广告 -- 从元素高度判断
                    if (F.context('ads_log_toprequest')) {
                        if ($('.left-top-ads').height() == 0
                            || $('.left-top-ads').width() == 0) {
                            is_topads_truely_show = 0;
                        } else {
                            is_topads_truely_show = 1;
                        }
                    } else {
                        is_topads_truely_show = 0;
                    }

                    // 底部为你推荐网盟广告 -- 从iframe判断
                    if (F.context('ads_log_bottomrequest')) {
                        if ($('.wgt-bottom-union').find('iframe').size() == 0) {
                            is_bottomwangmeng_truely_show = 0;
                        } else {
                            is_bottomwangmeng_truely_show = 1;
                        }
                    } else {
                        is_bottomwangmeng_truely_show = 0;
                    }

                    // 同步凤巢广告 -- 从元素高度判断
                    if (F.context('ads_log_leftdown')) {
                        if ($('#qbleftdown-container').height() == 0
                            || $('#qbleftdown-container').width() == 0) {
                            is_leftads_truely_show = 0;
                        } else {
                            is_leftads_truely_show = 1;
                        }
                    } else {
                        is_leftads_truely_show = 0;
                    }

                    // 同步右侧广告，看是否存在dom以及是否展示
                    if (F.context('ads_log_right')) {
                        if ($('.widget-sma').height() == 0
                            || $('.widget-sma').width() == 0) {
                            is_rightads_truely_show = 0;
                        } else {
                            is_rightads_truely_show = 1;
                        }
                    } else {
                        is_rightads_truely_show = 0;
                    }

                    // 得到浏览器信息
                    function getBrowserType() {
                        if (navigator.userAgent.toLowerCase().indexOf('se 2.x') > -1) {
                            return 'Sougo';
                        } else if (navigator.userAgent.toLowerCase().indexOf('maxthon') > -1) {
                            return 'maxthon';
                        } else if (navigator.userAgent.toLowerCase().indexOf('qqbrowser') > -1) {
                            return 'qqbrowser';
                        } else if (navigator.userAgent.toLowerCase().indexOf('msie') > -1) {
                            return 'IE';
                        } else if (/chrome\/(\d+\.\d+)/i.test(navigator.userAgent)) {
                            return 'Chrome';
                        } else if (/firefox\/(\d+\.\d+)/i.test(navigator.userAgent)) {
                            return 'Firefox';
                        } else {
                            return 'other';
                        }
                    }

                    var browsert_type = getBrowserType();

                    var adsLogParams = {
                        type: 2014,
                        page: 'question',
                        action: 'ads_block_info_hour',
                        is_topwangmeng_should_show: F.context('ads_log_toprequest') || 0,
                        is_topwangmeng_truely_show: is_topads_truely_show,
                        is_bottomwangmeng_should_show: F.context('ads_log_bottomrequest') || 0,
                        is_bottomwangmeng_truely_show: is_bottomwangmeng_truely_show,
                        is_leftads_should_show: F.context('ads_log_leftdown') || 0,
                        is_leftads_truely_show: is_leftads_truely_show,
                        is_rightads_should_show: F.context('ads_log_right') || 0,
                        is_rightads_truely_show: is_rightads_truely_show,
                        browser_type: browsert_type
                    };

                    log.send(adsLogParams);
                };

                setTimeout(sendLog, 1000);
            };
            /*
             * 设置hunter用户体验报告
             * @FE-hanzonge @PM-liulin04
             * @date 2016-01-05
             *
             * 模糊匹配：mid=73716，取一定量pv
             * 非模糊匹配：mid-qid映射关系为，
             *      73707->124553427
             *      73708->258966527
             *      73709->145354616
             *      73710->1509811702495467100
             *      73711->334249256
             */
            window.Hunter = window.Hunter || {};
            Hunter.userConfig = Hunter.userConfig || [];
            var tempHid = null;
            var pageQid = F.context('page').qid;

            if (pageQid == 124553427) {
                tempHid = 73707;
            } else if (pageQid == 258966527) {
                tempHid = 73708;
            } else if (pageQid == 145354616) {
                tempHid = 73709;
            } else if (pageQid == 1509811702495467100) {
                tempHid = 73710;
            } else if (pageQid == 334249256) {
                tempHid = 73711;
            } else {
                if (parseInt(Math.random() * 100) < 5) {
                    tempHid = 73716;
                }
            }

            if (tempHid) {
                Hunter.userConfig.push({
                    hid: tempHid
                });
            }
            function jumpShare() {

                if ($('.jump-top-box').size() != 0) {
                    // 调整返回顶部和任务列表的顺序
                    $('.jump-top-box').find('.jump-top').before($('.jump-top-box').find('.jump-task-list'));

                    // 加入分享功能
                    var jumpShare = [
                        '<div class="jump-share">',
                        '<div class="jump-share-tit">分享</div>',
                        '<div class="share-area"></div>',
                        '</div>'
                    ].join('');

                    $('.jump-top-box').find('.jump-task-list').before(jumpShare);

                    share.init({
                        target: $('.jump-share .share-area'),
                        pageUrl: 'http://zhidao.baidu.com/question/' + F.context('page').qid,
                        title: document.title,
                        pos: 'rightSilde',
                        logOpt: {
                            module: 'question',
                            page: 'qb',
                            project: 'new-qb-share',
                            postion: 'new-share-right'
                        }
                    });
                    // 如果有行家工作室，放在最顶部
                    if ($('.jump-top-box').find('.jump-goto-mavin').size()) {
                        $('.jump-top-box').find('.jump-share').before($('.jump-top-box').find('.jump-goto-mavin'));
                    }

                    jumpTimer && clearInterval(jumpTimer);
                }
            }

            var jumpTimer = setInterval(function () {
                jumpShare();
            }, 1000)


        });

    }();
    !function () {
        require.async('common:widget/js/logic/dom-ready/dom-ready.js', function (D) {
            D.init([])
        });
    }();
</script>
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
</script>


<script>
    var DV_ARG = {};
    DV_ARG.Token = 'tk' + Math.random() + new Date().getTime(); //建议由后端生成
    DV_ARG.tpl = 'iknow';
    DV_ARG.scene = 'iknowpc';//scene
    DV_ARG.trans = '';//透传参数 ,扩展使用
</script>
<script src="{{asset('home/js/ld.min.js')}}"></script>

</html>
