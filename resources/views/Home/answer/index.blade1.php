`<!DOCTYPE html>
<!-- saved from url=(0109)https://zhidao.baidu.com/question/1243624077760850579.html?fr=qlquick&entry=qb_list_default&is_force_answer=0 -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta property="wb:webmaster" content="3aababe5ed22e23c">
    <meta name="referrer" content="always">
    <title>个人中心_百度知道</title>
    <link rel="shortcut icon" href="https://zhidao.baidu.com/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="any" mask="" href="https://www.baidu.com/img/baidu.svg">

    <script async="" src="{{asset('home/js/dp.min.js')}}"></script>
    <script async="" src="{{asset('home/js/6.min.js')}}" id="dv_new_FIAOWNBFDIQIL"></script>
    <script src="{{asset('home/js/hm.js')}}"></script>
    <script async="" src="{{asset('home/js/alog.min.js')}}"></script>

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

    <meta name="keywords" content="普通话">
    <meta name="description" content="请问现在可以报名普通话了吗？">
    <link rel="canonical" href="http://zhidao.baidu.com/question/1243624077760850579.html">
    <meta name="robots" content="noindex,follow">
    <script>
        if (location.hash && location.hash.indexOf('bdres2exe=') > -1) {
            document.write('<script src="//m.baidu.com/static/as/res2exe/js/res2exe_1.0.3.min.js?v=091818"></' + 'script>');
        }
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
            "isLogin": "0",
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

        F.context('defaultQuery', '{"title":"","value":""}');


        F.context('productsDomain', {
            'zuoye': 'http://zuoye.baidu.com',
            'baobao': 'http://baobao.baidu.com',
            'doctor': 'http://muzhi.baidu.com'
        });
        F.context('isQuality', false);
        F.context('now', 1498650328);
    </script>
    <script>F.context('sysTaskAutoInit', 1);</script>

    <link rel="shortcut icon" href="https://zhidao.baidu.com/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="any" mask="" href="https://www.baidu.com/img/baidu.svg">

    <script async="" src="{{ url('home/js/dp.min.js')}}"></script>
    <script async="" src="{{ url('home/js/6.min.js')}}" id="dv_new_FIAOWNBFDIQIL"></script>
    <script src="{{ url('home/js/hm.js')}}"></script>
    <script async="" src="{{ url('home/js/alog.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('home/css/common_ad30a18.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('home/css/module_e8bed3d.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('home/css/ihome-header_23b36b4.css') }}">



    <script type="text/javascript">
        var dontTriggerPrompt = true;

        F.context('page', {
            isAdopted: '0'
            ,
            misAsk: '0'
            ,
            delAsk: '0'
            ,
            isLocked: '0'
            ,
            isReplyLocked: '0'
            ,
            isFromWap: "1"
            ,
            cid: '74'
            ,
            cidTop: '74'
            ,
            cidMid: ''
            ,
            qid: '1243624077760850579'
            ,
            tags: '普通话_职业教育'
            ,
            title: '请问现在可以报名普通话了吗？'
            ,
            giveScore: '0'
            ,
            encodeUid: 'd0f94069236f25705e79094d'
            ,
            uid: '1292499408'
            ,
            imId: 'd0f9636e2342515156667070614c4c094d'
            ,
            passPhoto: '0'
            ,
            qb_test_case: '2'
            ,
            rpRecommand: 'false',
            rankFile: '0'
            ,
            con: ''
            ,
            answerNum: ''
            ,
            isView: ''
            ,
            isGetWealth: '0'
            ,
            pgcArr: [790, 791, 792, 794, 795]
            ,
            isCompanyIask: '0'
            ,
            bdplayer: 'mozilla\/5.0 (windows nt 6.1; wow64) applewebkit\/537.36 (khtml, like gecko) chrome\/58.0.3029.110 safari\/537.36'
        });

        F.context('user')['internalAdmin'] = null;

        F.context('answers', {});
        F.context('relateWords', {});
        F.context('egg', {
            id: '8'
            , flashUrl: 'http:\/\/img.iknow.bdimg.com\/gglft\/gglft_flash.swf'
            , onlineTime: '2013-11-15'
            , offlineTime: '2013-12-01'
            , loginRate: '0.7'
            , notLoginRate: '0.3'
            , targetUrl: 'http:\/\/zhidao.baidu.com\/s\/gglft\/index.html?isegg=1'
            , btnText: '确定'
            , dialogText: '恭喜你捡到一张刮刮卡，立刻参与刮刮乐翻天活动，拍立得、iPad mini、iPhone 5手机等超多大奖等你刮出来~'
            , dialogBackground: ''
            , dialogTextMargin: '0'
            , active: '0'
            , activeUrl: ''
            , activeStatus: ''
            , guideLogin: '1'
            , dialogTextLogin: ''
            , btnTextLogin: ''
            , dialogTextActive: ''
            , btnTextActive: ''
            , dialogBackground: ''
            , limitGrade: '0'
            , limitGoodRate: '0'
        });
        F.context('cmsTopic', [
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/qinliugan.html',
                'title': 'H7N9禽流感病毒问题解答',
                'qid': '538944731,538944974,538945159,538945410,538945640,538945806,538946023,538947972,538948119,538948841,538948985,538949170,538949278,538949607,538951811,538952044,538952289,539260208,539271130,539272340,539272652,539272848,539273004,538758680,537145971,537481975,537482138,537491741,537496345,537145971,539271582,539310838,96016332,16608956,16608956,534580619',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen18.html',
                'title': '传统医学解读人体奥秘',
                'qid': '',
                'expert': '正安中医梁冬,薄化君大夫,罗炳翔大夫'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen17.html',
                'title': '我们有文化，遇见“流氓”也不怕！',
                'qid': '',
                'expert': '打假第一人王海'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/zhichangtiaocao\/index.html',
                'title': '跳槽前必读8大问题',
                'qid': '530550652,530550695,530550746,530550777,530550821,530550859,530550898,530550937',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/zhichangmianshi\/index.html',
                'title': 'HR不懂爱，他的提问你答不来！',
                'qid': '529252350,529252523,529252831,529253040,529253301,529253429,529256645,529256979,529257198,529257285',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen16.html',
                'title': '孙云晓解答青春叛逆期教育',
                'qid': '',
                'expert': '青研中心孙云晓'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen16.html',
                'title': '孙宏艳解答青春叛逆期教育',
                'qid': '',
                'expert': '青研中心孙宏艳'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen15.html?fr=qbzt',
                'title': '雷明解答职场中的跳槽疑惑',
                'qid': '',
                'expert': '心理咨询雷明'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen15.html?fr=qbzt',
                'title': '唐宁解答女性职场疑惑',
                'qid': '',
                'expert': '职场唐宁'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen14.html?fr=qbzt',
                'title': '北大售票帝裴济洋教你买票回家！',
                'qid': '',
                'expert': 'peijiyang_pku'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/jiaogui.html?fr=qbzt',
                'title': '权威解读2013驾考新规',
                'qid': '496005611,105728210',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/shi\/index.html?fr=qbzt',
                'title': '被误读最深的名言锦句',
                'qid': '510380393,510380025,510380524,510380639,510380685,510380918,510381072,510380301',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen13.html?fr=qbzt',
                'title': '交管局李晓东处长解答驾考新规',
                'qid': '',
                'expert': '交管局李晓东'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen13.html?fr=qbzt',
                'title': '交管局李勤处长解读新交规',
                'qid': '',
                'expert': '交管局李勤'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen12.html?fr=qbzt',
                'title': '胡柳解答保险理财',
                'qid': '',
                'expert': '保险理财胡柳'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen12.html?fr=qbzt',
                'title': '魏德善解答证券投资',
                'qid': '',
                'expert': '证券专家魏德善'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen06.html?fr=qbzt',
                'title': '金韵蓉老师教你精油护肤',
                'qid': '',
                'expert': 'lafasojyr'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/kuaidu\/suhuaji\/index.html?fr=qbzt',
                'title': '你的食物含塑化剂吗',
                'qid': '499771676,274675532,273938276,275181078,274282140,499772730,275226786,274536152,282757232,274210910,275395808,499772593,275355018,274093929',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/kuaidu\/youjia\/index.html?fr=qbzt',
                'title': '油价是升还是降',
                'qid': '7701062,7720360,23590745,239386624,302573038,218721231,337321559',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/kuaidu\/2012usa\/index.html?fr=qbzt',
                'title': '美国总统是如何选出来的',
                'qid': '494863184,494863014,494869926,494869853,494868987',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/Chicken\/index.html?fr=qbzt',
                'title': '45天鸡能不能吃',
                'qid': '503005578,503006139,503006460,503006854,503007374,503007374',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/1942\/index.html?fr=qbzt',
                'title': '你知道1942吗？',
                'qid': '502766042,502766042,502647814,502647814,502777253,502776800,502650170,502650170',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/jiehuo\/jiankangyaoyan\/index.html?fr=qbzt',
                'title': '健康流言知真假',
                'qid': '178807906,334055366,498402753,291937633,209426382,414548424,7540625,222613405,498406267,498408474,109760622,388525641',
                'expert': ''
            },
            {
                'url': 'http:\/\/www.baidu.com\/search\/zhidao\/jingshenbing\/index.html?fr=qbzt',
                'title': '大家都有病',
                'qid': '492345830,491605430,492350128,492350240,492350299,281444990,492440880,489745109,492443590,492443722',
                'expert': ''
            },
            {
                'url': 'http:\/\/www.baidu.com\/search\/zhidao\/gangnamstyle\/index.html?fr=qbzt',
                'title': '江南Style红的很科学',
                'qid': '478958350,487057430,483904315,485109741,487057528,485109517,487057485,487057395,487057395,487057363,480719567',
                'expert': ''
            },
            {
                'url': 'http:\/\/www.baidu.com\/search\/zhidao\/bing\/index.html?fr=qbzt',
                'title': '其实这都不是病',
                'qid': '480816980,480792024,481137959,480812943,480813792',
                'expert': ''
            },
            {
                'url': 'http:\/\/www.baidu.com\/search\/zhidao\/aizheng\/index.html?fr=qbzt',
                'title': '吃也会得癌症！',
                'qid': '328576004,480213867,480213973,480218158,480232828',
                'expert': ''
            },
            {
                'url': 'http:\/\/www.baidu.com\/search\/zhidao\/2012gongfu\/index.html?fr=qbzt',
                'title': '江湖神功知多少',
                'qid': '475780308,473798866,475780429,473806239,475780510,473800706,475780712,475782468,475780619,473801366',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen11.html?fr=qbzt',
                'title': '姚海峰医生解答宠物健康',
                'qid': '',
                'expert': '姚海峰博士'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen11.html?fr=qbzt',
                'title': '王天明专业解答宠物营养',
                'qid': '',
                'expert': '宠物营养'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen10.html?fr=qbzt',
                'title': '苏芩谈远离爱留下的伤',
                'qid': '',
                'expert': '知名作家苏芩'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen08.html?fr=qbzt',
                'title': '张国庆分析中日关系',
                'qid': '',
                'expert': '社科院张国庆'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen06.html?fr=qbzt',
                'title': '小P老师教你彩妆造型',
                'qid': '',
                'expert': 'yoka小P老师'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen06.html?fr=qbzt',
                'title': '梅琳老师教你美肌护肤',
                'qid': '',
                'expert': 'lafasoml'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen06.html?fr=qbzt',
                'title': '美丽主持人李静的美容问答',
                'qid': '',
                'expert': 'lafasolj'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen05.html?fr=qbzt',
                'title': '伊能静解答如何演电影',
                'qid': '',
                'expert': 'yinengjing2013'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen05.html?fr=qbzt',
                'title': '导演赵林山揭秘电影',
                'qid': '',
                'expert': 'daoyanzls'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen05.html?fr=qbzt',
                'title': '五岳散人谈美食',
                'qid': '',
                'expert': 'wysr2012'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen04.html?fr=qbzt',
                'title': '早教专家李跃儿谈早教',
                'qid': '',
                'expert': 'lyer2013bd'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen04.html?fr=qbzt',
                'title': '产科主任余梅教孕产',
                'qid': '',
                'expert': 'ym2013bd'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/topic\/muru\/index.html?fr=qbzt',
                'title': '妈妈最关心的8个问题',
                'qid': '526309070,526865300,526865300,526308815,526865218,526865157,526865101,526865101,526309710,526865031',
                'expert': ''
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen03.html?fr=qbzt',
                'title': '健身专家王友松教健身',
                'qid': '',
                'expert': 'wangyousong7'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen03.html?fr=qbzt',
                'title': '顾中一教你健康营养',
                'qid': '',
                'expert': 'guzhongyi'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen03.html?fr=qbzt',
                'title': '李湘教你减肥秘诀',
                'qid': '',
                'expert': 'lixiangzslx'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/zhishilingxiu02.html?fr=qbzt',
                'title': '心血管病专家贾玉和谈病痛',
                'qid': '',
                'expert': 'jiayuhe7'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/zhishilingxiu02.html?fr=qbzt',
                'title': '糖尿病专家向红丁谈病痛',
                'qid': '',
                'expert': 'xianghongd3'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/zhishilingxiu01.html?fr=qbzt',
                'title': '金领小V谈职场生存学',
                'qid': '',
                'expert': '小V2013'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/zhishilingxiu01.html?fr=qbzt',
                'title': '杜子建说创业',
                'qid': '',
                'expert': '杜子建2012'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen08.html?fr=qbzt',
                'title': '张召忠谈钓鱼岛争端',
                'qid': '',
                'expert': 'zshaozhong2012'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen07.html?fr=qbgl',
                'title': '崔玉涛谈婴幼儿护理',
                'qid': '',
                'expert': '儿科医生崔玉涛'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/zhishilingxiu02.html?fr=qbzt',
                'title': '急诊女超人于莺谈病痛',
                'qid': '',
                'expert': 'yuyingjzk'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/zhishilingxiu01.html?fr=qbzt',
                'title': '薛蛮子谈天使投资',
                'qid': '',
                'expert': '薛蛮子2012'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/wowen09.html?fr=qbgl',
                'title': '郑渊洁让童年如童话',
                'qid': '',
                'expert': '作家郑渊洁'
            },
            {
                'url': 'http:\/\/zhidao.baidu.com\/s\/maya.html?fr=qbgl',
                'title': '2012世界末日真相',
                'qid': '384640140,193245477,62563072,306563588,158114723,409478947,12992979,129335529,84523086,13774477,161887534',
                'expert': ''
            }
        ]);


        F.context('isForAnswerHq', '0');
        F.context('isForceAnswer', '0');

        F.context({
            'itopicSyncAdminStr': '["553869863","408584470","663150510","1601193224","1305370811","1253985996","240173754","2421480383","282555480","617337308","703281543","1824698773","2560348928","49725318","220659661","161331174","1372601133","1969665018","837552203","365536315","331452762"]'
        });

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
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/common_ad30a18.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/aio_292cd46.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/userbar-renew_55ab471.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/search-box-new_4de721e.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/preview_c4405d5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/silder-push_07961bd.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/common_ad30a18.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/module_e8bed3d.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/ihome-header_23b36b4.css')}}">
    <script> alog('speed.set', 'ht', +new Date); </script>
    <script type="text/javascript" src="{{asset('home/js/search-box-new_c6b0786.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/suggestion-new_0d26480.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/ask-img_2de3204.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/preview_22279e0.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/video_00854c0.js')}}"></script>
    <script src="{{asset('home/js/widget_loader.js')}}" type="text/javascript" defer="defer"></script>
    <script type="text/javascript" src="{{asset('home/js/fingerload.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('home/js/fingerprint.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('home/js/fingerload.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ url('home/js/fingerprint.min.js')}}"></script>
</head>
<body class="layout-center has-menu">
<div id="userbar" class="userbar userbar-renew" data="" style="width: auto; left: auto; right: 13px; display: block;">
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
                <li><a log="sc_pos:c_more" href="http://www.baidu.com/more/">更多&#187;</a></li>
            </ul>
            <div class="search-block clearfix under-shadow" mark="on">
                <div class="search-cont clearfix">
                    <a class="logo" href="https://zhidao.baidu.com/" title="百度知道"></a>
                    <form action="https://zhidao.baidu.com/search" name="search-form" method="get" id="search-form-new"
                          class="search-form">
                        <input class="hdi" id="kw" maxlength="256" tabindex="1" size="46" name="word" value=""
                               autocomplete="off">
                        <button alog-action="g-search-anwser" type="submit" id="search-btn" hidefocus="true"
                                tabindex="2" class="btn-global">搜索答案
                        </button>
                        <a href="https://zhidao.baidu.com/question/1243624077760850579.html?fr=qlquick&amp;entry=qb_list_default&amp;is_force_answer=0#"
                           alog-action="g-i-ask" class="i-ask-link" id="ask-btn-new">我要提问</a>
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
                            <a class="menu-title " href="{{ url('/') }}">
                                首页
                            </a>
                        </div>
                        <div class="menu-item-box">
                            <div class="menu-item menu-item-cat">
                                <a class="menu-title " href="https://zhidao.baidu.com/list?fr=daohang" target="_blank">
                                    问题
                                </a>
                                <div class="menu-content">
                                    <ul class="menu-sub-list">
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/list?fr=daohang"
                                               target="_blank">
                                                全部问题
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=101?fr=daohang" target="_blank">
                                                经济金融
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=102?fr=daohang" target="_blank">
                                                企业管理
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=103?fr=daohang" target="_blank">
                                                法律法规
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=104?fr=daohang" target="_blank">
                                                社会民生
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=105?fr=daohang" target="_blank">
                                                科学教育
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=106?fr=daohang" target="_blank">
                                                健康生活
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=107?fr=daohang" target="_blank">
                                                体育运动
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=108?fr=daohang" target="_blank">
                                                文化艺术
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=109?fr=daohang" target="_blank">
                                                电子数码
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/list?cid=110"
                                               target="_blank">
                                                电脑网络
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=111?fr=daohang" target="_blank">
                                                娱乐休闲
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=113?fr=daohang" target="_blank">
                                                行政地区
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=114?fr=daohang" target="_blank">
                                                心理分析
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/list?cid=115?fr=daohang" target="_blank">
                                                医疗卫生
                                            </a>
                                        </li>
                                        <!-- <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="/list?cid=116?fr=daohang" target="_blank" target="_blank">
                                                资源共享
                                            </a>
                                        </li> -->
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
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/daily?fr=daohang"
                                               target="_blank">
                                                知道日报
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/liuyan?fr=daohang"
                                               target="_blank">
                                                真相问答机
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/bigdata/view"
                                               target="_blank">
                                                知道大数据
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="http://zhidao.baidu.com/special/home?fr=daohang" target="_blank">
                                                知道多世界
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/culture/index?fr=daohang" target="_blank">
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
                                            <a class="menu-sub-item" href="http://zhidao.baidu.com/zhima/"
                                               target="_blank">
                                                知道芝麻
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/misc/nowshowstar?fr=daohang"
                                               target="_blank">
                                                知道之星
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/user/admin?fr=daohang" target="_blank">
                                                芝麻将
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/uteam?fr=daohang"
                                               target="_blank">
                                                芝麻团
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/hangjia?fr=daohang"
                                               target="_blank">
                                                知道行家
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="https://zhidao.baidu.com/daily/authorcenter?fr=daohang"
                                               target="_blank">
                                                日报作者
                                            </a>
                                        </li>
                                        <div class="menu-item-user-list">机构合作
                                            <div class="line-bar"></div>
                                        </div>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/hangjia?fr=daohang"
                                               target="_blank">
                                                机构行家
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/opendev?fr=daohang"
                                               target="_blank">
                                                开放平台
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="http://zhidao.baidu.com/special/view/cooperation?fr=daohang"
                                               target="_blank">
                                                品牌合作
                                            </a>
                                        </li>
                                        <div class="menu-item-user-list">知道福利
                                            <div class="line-bar"></div>
                                        </div>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item" href="https://zhidao.baidu.com/shop?fr=daohang"
                                               target="_blank">
                                                财富商城
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item"
                                               href="http://zhidao.baidu.com/s/activity/index.html?fr=daohang"
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
                                            <a class="menu-sub-item menu-sub-item-expert" href="https://p.baidu.com/"
                                               target="_blank">
                                                <span class="expert-icon expert-icon-pi"></span>
                                                <span>百度派</span>
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item menu-sub-item-expert"
                                               href="http://baobao.baidu.com/" target="_blank">
                                                <span class="expert-icon expert-icon-baby"></span>
                                                <span>宝宝知道</span>
                                            </a>
                                        </li>
                                        <li class="menu-sub-item-wp">
                                            <a class="menu-sub-item menu-sub-item-expert" href="http://zuoye.baidu.com/"
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
                                    <a href="http://zhidao.baidu.com/zt/ikapp/index.html?fr=home"
                                       class="menu-right-list-link" target="_blank">
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
                                    <a href="https://zhidao.baidu.com/ihome" class="menu-right-list-link"
                                       target="_blank">
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
<br/>


<div class="wgt-banner">
    <div class="wgt-banner-wp">
        <div class="wgt-banner-bg" style="left: 49.5207%;"></div>
        <div class="wgt-banner-container">
            <div class="circle-wp">
                <div class="circle circle-t noAnimation">
                    <div class="circle-txt line">
                        <div class="grid transform">
                            <span class="title">回答数</span>
                            <br>
                            <span class="number">1</span>
                        </div>
                        <div class="grid-r bannerActiveDays transform-l">
                            <span class="title">活跃天数</span>
                            <br>
                            <span class="number sign-in-day-num">1天</span>
                            <div class="signInTip go-sign-in iknow_ihome_icons i-signInTip signInTipAnimation">
<span>
点击签到</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="circle circle-s noAnimation circle-shadow-r">
                    <div class="circle-txt line">
                        <div class="grid transform">
                            <span class="title">采纳率</span>
                            <br>
                            <span class="number">0%</span>
                        </div>
                        <div class="grid-r active">
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
                            <span class="number">5</span>
                        </div>
                        <div class="grid-r transform-l">
                            <span class="title">我帮助的人</span>
                            <br>
                            <span class="number">36</span>
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








<center>
<article class="">
<div class="ihome-menu">
    <ul class="ihome-menu-tab line">
        <li class="tab-index"><a href="" class="active" target="_self"><span>等我答</span></a></li>
        <li class="tab-answer"><a href="" target="_self"><span>我的问答</span></a></li>
        <li class="tab-team"><a href="" target="_self"><span>我的团队</span></a></li>
        <li class="tab-task"><a href="" target="_self"><span>我的任务</span></a></li>
    </ul>
</div>
    <div class="ihome-content">
        <div class="wgt-ihome-filter">
            <div class="tag-operation">
                <form class="search-key">
                    <input class="search-key-input" id="search-key-input" maxlength="10" name="search-key" autocomplete="off" placeholder="请输入关键字">
                    <a href="" id="search-key-btn" class="search-key-btn filter-none-click">筛选</a>
                </form>
                <div class="tag-operate">
                    <a id="tag-choose-all" class="selected first-left" data-type="all" href="javascript:void(0);">
                        <i class="i-all iknow_ihome_icons"></i><span>我的兴趣</span></a>
                    <span class="separate"></span>
                    <a id="tag-choose-HQ" class="first-hq" data-type="HQ" href="javascript:void(0);">
                        <i class="i-HQ iknow_ihome_icons"></i><span>高质量</span><i class="i-point"></i></a>
                    <a href="javascript:void(0);" data-type="help"><i class="i-help iknow_ihome_icons"></i>
                        <span>向我求助</span></a>
                    <span class="separate hide"></span>
                </div>
            </div>
            <div class="wgt-ihome-tag-item" style="display: block;">
                <a class="tag-all" href="javascript:void(0);" data-type="alltag"><span>全部</span></a>
                <a class="tag-setting"><i class="i-pen iknow_ihome_icons"></i><span>设置兴趣</span></a>
                <a class="list-refresh"><i class="i-refresh-new iknow_ihome_icons"></i><span>刷新</span></a>
                <div class="button-misc">
                    <a href="javascript:void(0);" class="button-control button-control-left filter-none-click unable-left"></a>
                    <div class="tag-buttons" style="width: 530px;">
                        <div class="tag-button-container carousel-inner" style="left: 0px;">
                            <a class="tag-item" data-type="add"><span>添加+</span></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wgt-ihome-holder"></div>
        <script>
            void function(e,t){for(var n=t.getElementsByTagName("img"),a=+new Date,i=[],o=function(){this.removeEventListener&&this.removeEventListener("load",o,!1),i.push({img:this,time:+new Date})},s=0;s< n.length;s++)!function(){var e=n[s];e.addEventListener?!e.complete&&e.addEventListener("load",o,!1):e.attachEvent&&e.attachEvent("onreadystatechange",function(){"complete"==e.readyState&&o.call(e,o)})}();alog("speed.set",{fsItems:i,fs:a})}(window,document);
        </script>
        <div class="wgt-reply-qts-list-wp">
            <a class="answer-level" href="http://zhidao.baidu.com/s/answer-level/index.html?fr=ihome-ql" target="_blank">闯关活动入口</a>
            <div class="wgt-reply-qts-list df-reply-qts-box">
                <div class="df-reply-qts-list wgt-reply-qts-list-i">
<!--输出信息-->
                </div>
                <div class="loading"></div>
                <div class="pager h-center mt-20" style="display: block;">
                    <div id="pager"><a href="javascript:;" class="pTag prev disabled">上一页</a><a href="javascript:;" class="pTag cur">1</a><a href="javascript:;" class="pTag" pagerindex="2">2</a><a href="javascript:;" class="pTag" pagerindex="3">3</a><a href="javascript:;" class="pTag" pagerindex="4">4</a><a href="javascript:;" class="pTag" pagerindex="5">5</a><a href="javascript:;" class="pTag" pagerindex="6">6</a><span class="ellipsis">...</span><a href="javascript:;" class="pTag" pagerindex="10">10</a><a href="javascript:;" class="pTag next" pagerindex="2">下一页</a></div>
                </div>
            </div>
        </div>
        <script type="text/html" id="t:reply-qts-list">
            <#for(var i = 0; i < detail.length; i++){#>
            <li class="reply-qts-item <#if (viewedList.indexOf(detail[i].qid) >= 0){#> viewed<#}#> q-item-<#=detail[i].qid#><#if (isHQ) {#> is-hq-item<#}#>" data-index="<#=(curPn%3*25+i+1)#>">
                <div class="reply-qts-wp-outer">
                    <div class="reply-qts-wp line">
                        <div class="avatar grid">
                            <#if (detail[i].isAnonymous == 1 || detail[i].isNoUserName == 1){#>
                                <img src="<#-__2ssl__('http:\/\/himg.bdimg.com\/sys\/portrait\/item\/' + detail[i].imId + '.jpg')#>" width="46" />
                                <#}else{#>
                                    <a href="//zhidao.baidu.com/usercenter?uid=<#=detail[i].imId#>" target="_blank" title="<#=detail[i].uname#>">
                                        <img src="<#-__2ssl__('http:\/\/himg.bdimg.com\/sys\/portrait\/item\/' + detail[i].imId + '.jpg')#>" width="46" />
                                    </a>
                                    <#}#>
                        </div>
                        <div class="content-wp grid-r" data-qid="<#=detail[i].qid#>">
                            <div class="line title-area cur-pointer">
                                <div class="content grid">
                                    <div class="title line">
                                        <#if ( detail[i].hasPic == 1 ) {#>
                                            <i class="i-image iknow_ihome_icons"></i>
                                            <#}#>
                                                <a href="/question/<#=detail[i].qid#>.html?entry=<#:=entry#><#if
                                    (detail[i].isForceAnswer) {#>&is_force_answer=1<#}#><#if (isHQ) {#>&ishq=1<#}#>" target="_blank" class="question-title"><#-highlight(detail[i].title)#></a>
                                                <#if (isHQ ){#>

                                                    <#if ((typeof(assign)!='undefined')&&(assign==3)){#>
                                                        <span class="hq-reward">知道精选</span>
                                                        <#}else{#>
                                                            <span class="hq-reward">高质量</span>
                                                            <#}#>
                                                                <#}#>
                                    </div>
                                    <div class="info line">
                                        <#if (!isHQ) {#><div class="dateTime grid"><#=detail[i].createTime#></div><#}#>
                                                <div class="tag grid"><i class="i-tag iknow_ihome_icons"></i><#-(detail[i].tagName && detail[i].tagName.join('&nbsp;&nbsp;'))#><#-(detail[i].tag && detail[i].tag.join('&nbsp;&nbsp;'))#></div>
                                                <div class="delete-qt grid"><span class="devide-line grid"></span><span class="delete-qt-op">不想回答</span></div>
                                    </div>
                                </div>
                                <div class="status grid-r">
                                    <#if (detail[i].score > 0){#>
                                        <span class="s-reward"><i class="i-reward iknow_ihome_icons"></i><#=detail[i].score#></span>
                                        <#}#>
                                            <#if (!isHQ) {#>
                                                <span class="s-answer-count <#if (detail[i].replyNum == 0){#>no-answer<#}#>"><#if (isHQ && isMavin){#><#=detail[i].replyCount#><#}else{#><#=detail[i].replyNum#><#}#>&nbsp;回答</span>
                                                <#}#>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <#if (!isHQ && lowQualityList.indexOf(detail[i].qid) == -1 && lowQualityOperate){#>
                    <div class="low-quality-btn">
                    </div>
                    <#}#>
            </li>
            <#}#>
        </script>
        <script id="t:detailTmpl" type="text/html">
            <div class="detail" style="display:none;">
                <div class="qt-detail">
                    <#if (ask.contentRich) {#>
                        <#:=__2ssl__(ask.contentRich,1)#>
                            <#} else {#>
                                <#:=ask.content#>
                                    <#}#>
                </div>
                <#if ( user.isReplyer == 0 ) {#>
                    <div class="mini-editor" id="mini-editor-<#=qid#>"></div>
                    <div class="qt-detail-shrink grid">收起<i class="i-shrink"></i></div>
                    <!--div class="editor-opt clearfix">
                        <a class="btn-36-green-new grid-r" href="#">提交答案</a>
                        <label class="grid-r"><input type="checkbox" class="grid" />匿名</label>
                    </div-->
                    <#} else {#>
                        <br>
                        <#}#>
                            <#if ( answerList.length ) {#>
                                <div class="answer-wp">
                                    <div class="answer-num grid">回答 <#=answerList.length#>条<i class="i-tri-down"></i></div>
                                    <ul class="answer-list">
                                        <#for(var i=0;i<answerList.length;i++){#>
                                        <li class="clearfix">
                                            <div class="dateTime grid"><#=answerList[i].createTime#></div>
                                            <div class="i-circle grid"></div>
                                            <div class="avatar-a grid">
                                                <a href="http://www.baidu.com/p/<#=answerList[i].user.name#>?from=zhidao">
                                                    <img src="<#-__2ssl__('http:\/\/himg.bdimg.com\/sys\/portrait\/item\/' + answerList[i].user.imId + '.jpg')#>" width="40" />
                                                </a>
                                            </div>
                                            <div class="title-a grid">
                                                <#if (answerList[i].contentRich) {#>
                                                    <#:=answerList[i].contentRich#>
                                                        <#} else if ( answerList[i].content ) {#>
                                                            <#:=answerList[i].content#>
                                                                <#} else {#>
                                                                    该回答不包含文字内容
                                                                    <#}#>
                                                                        <#if (answerList[i].supplyRich) {#>
                                                                            <#:=answerList[i].supplyRich#>
                                                                                <#} else if ( answerList[i].supply ) {#>
                                                                                    <#:=answerList[i].supply#>
                                                                                        <#}#>
                                            </div>
                                        </li>
                                        <#}#>
                                    </ul>
                                </div>
                                <#}#>
            </div>
        </script>
    </div>
</article>
</center>

<div class="wgt-footer-new">
    <div class="footer-wp">
        <ul class="footer-list clearfix">
            <li class="footer-list-item footer-list-guide">
                <div class="footer-title"><span class="icon-guide"></span>新手帮助</div>
                <ul class="footer-link clearfix">
                    <li><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=241&amp;id=1521"
                           target="_blank">如何答题</a></li>
                    <li><a href="http://help.baidu.com/question?prod_id=9&amp;class=531" target="_blank">获取采纳</a></li>
                    <li><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=531" target="_blank">使用财富值</a>
                    </li>
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
            &#169;2017 Baidu&nbsp;&nbsp; <a rel="nofollow" href="http://www.baidu.com/duty/" target="_blank">使用百度前必读</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                    rel="nofollow" href="http://help.baidu.com/question?prod_en=zhidao&amp;class=597&amp;id=1001104"
                    target="_blank">知道协议</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a rel="nofollow" href="" target="_blank">百度知道品牌合作</a>
        </p>
    </div>
</div>
<div id="anttongji"></div>
<div id="FP_USERDATA" fp_uid="3373bf804abaa39f9f95fef7dfe5210f" style="visibility: hidden; position: absolute;"></div>
</body>
</html>