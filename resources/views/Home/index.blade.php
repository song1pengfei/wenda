@extends('home.base')
    @section('content')

    <div class="banner-wp" style="background-color:#d7bd96;">
        <div class="banner container" data-href="https://zhidao.baidu.com/daily">
            <img src="{{asset('home/images/top.jpg')}}" class="banner-bg-img">
            <div class="banner-left-mask">
            </div>
            <div class="banner-right-mask">
            </div>
            <p class="iknow-daily-date">
                知道日报&nbsp;06月27日</p>
            <p class="banner-daily-info">
<span class="banner-title">
1个月共59天？这个六月有点特别！
</span>
                <span class="banner-author">
来自：科普中国网
</span>
            </p>
            <div class="iknow-daily-collection line">
                <ul class="daily-colletion-list line">
                    <li class="daily-colletion-item line daily-colletion-item-0">
                        <a class="colletion-item-link" href="https://zhidao.baidu.com/daily/view?id=66136"
                           target="_blank" log="page:home,pos:daily,area:img,index:0">
                            <img src="{{asset('home/images/s3.jpg')}}" class="colletion-item-pic">
                        </a>
                        <span class="item-title-layout">
<span class="colletion-item-title">
<a class="text-value" href="https://zhidao.baidu.com/daily/view?id=66136" target="_blank"
   log="page:home,pos:daily,area:title,index:0">在35度的室内，把空调设置成25度热风会不会凉快？</a>
</span>
</span>
                    </li>
                    <li class="daily-colletion-item line daily-colletion-item-1">
                        <a class="colletion-item-link" href="https://zhidao.baidu.com/daily/view?id=65320"
                           target="_blank" log="page:home,pos:daily,area:img,index:1">
                            <img src="{{asset('home/images/s2.jpg')}}" class="colletion-item-pic">
                        </a>
                        <span class="item-title-layout">
<span class="colletion-item-title">
<a class="text-value" href="https://zhidao.baidu.com/daily/view?id=65320" target="_blank"
   log="page:home,pos:daily,area:title,index:1">皇帝微服私巡是体恤民情？古装剧的桥段千万别当真</a>
</span>
</span>
                    </li>
                    <li class="daily-colletion-item line daily-colletion-item-2">
                        <a class="colletion-item-link" href="https://zhidao.baidu.com/daily/view?id=65958"
                           target="_blank" log="page:home,pos:daily,area:img,index:2">
                            <img src="{{asset('home/images/s1.jpg')}}" class="colletion-item-pic">
                        </a>
                        <span class="item-title-layout">
<span class="colletion-item-title">
<a class="text-value" href="https://zhidao.baidu.com/daily/view?id=65958" target="_blank"
   log="page:home,pos:daily,area:title,index:2">深度睡眠是什么？多久为最佳？</a>
</span>
</span>
                    </li>
                </ul>
                <a class="more-daily" href="https://zhidao.baidu.com/daily" target="_blank" title="进入日报首页"
                   log="page:home,pos:more-daily">
                </a>
            </div>
            <div class="slogan-widget">
                <div class="slogan-wp">
                    <h2 class="slogan-title">
                        <span class="title-content">百度知道</span>
                        <a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=%C8%EB%C3%C5&amp;id=1000774#知道协议"
                           class="iknow-need-know" target="_blank" title="知道须知"></a>
                    </h2>
                    <div class="slogan-devide-line">
                    </div>
                    <div class="slogan-content">
                        <div class="login-slogan">
                            <p class="slogan-text">
                                总有一个人知道你问题的答案</p>
                            <div class="avatar-container">
                               <img src="{{asset('home/images/r6s1g1.gif')}}" class="avatar-image">
                                <div class="avatar-mask"></div>
                            </div>
                            <div class="user-info">
                               @if($usname == "")
                                <div class="user-name">
                                    <a href="{{url('home/login')}}" class="user-name-link" title="攸攸浅亿0"
                                       target="_blank">登录</a>
                                </div>
                                <p class="user-info-devide-line">
                                </p>
                                <div class="user-grade">
                                    <a title="百度知道如何提升等级"
                                       href="{{url('home/register')}}"
                                       target="_blank" class="user-grade-link">注册</a>
                                </div>
                                @else
                                    <li>
                                    <a href="{{url('home/geren')}}"  class="user-name" id="user-name">{{$usname}}</a>
                                    </li>
                                @endif
                            </div>
                            <div class="help-people-count">
                                已经帮助了0人
                            </div>
                            <div class="sign-in-section">
                                <p class="sign-in-num-wp">
                                    已连续活跃&nbsp;<span class="sign-in-day-num">0</span>&nbsp;天</p>
                                <a href="https://zhidao.baidu.com/#" class="go-sign-in">去签到</a>
                            </div>
                            <div class="answer-question-section line">
                                <a href="https://zhidao.baidu.com/ihome/ask" target="_blank"
                                   class="user-button-item question-button">
                                    <span class="item-num">0</span>
                                    <span class="item-title">我的提问</span>
                                </a>
                                <a href="{{ url("detail") }}" target="_blank" class="user-button-item answer-button">
                                    <span class="item-num">1</span>
                                    <span class="item-title">我的回答</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // dp打点，顶部大头图可用时间
        alog && alog('speed.set', 'c_top', +new Date);
        alog.fire && alog.fire("mark");
    </script>
    <style type="text/css">
        .banner-left-mask {
            background: -moz-linear-gradient(left, rgba(215, 189, 150, 1) 0%, rgba(215, 189, 150, 0) 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(215, 189, 150, 1)), color-stop(100%, rgba(215, 189, 150, 0))); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(left, rgba(215, 189, 150, 1) 0%, rgba(215, 189, 150, 0) 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(left, rgba(215, 189, 150, 1) 0%, rgba(215, 189, 150, 0) 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(left, rgba(215, 189, 150, 1) 0%, rgba(215, 189, 150, 0) 100%); /* IE10+ */
            background: linear-gradient(to right, rgba(215, 189, 150, 1) 0%, rgba(215, 189, 150, 0) 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#d7bd96', endColorstr='#00d7bd96', GradientType=1); /* IE6-9 */
        }

        .banner-right-mask {
            background: -moz-linear-gradient(left, rgba(215, 189, 150, 0) 0%, rgba(215, 189, 150, 1) 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(215, 189, 150, 0)), color-stop(100%, rgba(215, 189, 150, 1))); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(left, rgba(215, 189, 150, 0) 0%, rgba(215, 189, 150, 1) 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(left, rgba(215, 189, 150, 0) 0%, rgba(215, 189, 150, 1) 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(left, rgba(215, 189, 150, 0) 0%, rgba(215, 189, 150, 1) 100%); /* IE10+ */
            background: linear-gradient(to right, rgba(215, 189, 150, 0) 0%, rgba(215, 189, 150, 1) 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00d7bd96', endColorstr='#d7bd96', GradientType=1); /* IE6-9 */
        }
    </style>
    <div class="new-three-parts-layout-wp">
        <div class="new-three-parts-layout line container">
            <div class="hotspot-container">
                <div class="hotspot">
                    <div class="hotspot-tit">
                        <img src="{{asset('home/images/logo-pi_44e5109.png')}}" alt="">
                    </div>
                    <div class="hotspot-pic">
                        <div class="hotspot-pic-img">
                            <a href="https://p.baidu.com/question/05fa6162633037376231350400/&amp;entry=home_new_content"
                               target="_blank" log="page:home,pos:hotspot,area:imgTit" title="听声音，猜神剧！"><img
                                        src="{{asset('home/images/wenzhanghuodong_350x250px_2X.png')}}" alt=""></a>
                        </div>
                        <div class="hotspot-text">
                            <a href="https://p.baidu.com/question/05fa6162633037376231350400/&amp;entry=home_new_content"
                               target="_blank" log="page:home,pos:hotspot,area:img">听声音，猜神剧！</a>
                        </div>
                    </div>
                    <ul class="hotspot-list">
                        <li class="hotspot-list-item">
                            <i class="hotspot-disc"></i>
                            <a target="_blank" class="hotspot-link"
                               href="https://p.baidu.com/question/5d456162636163336331660400/539542&amp;entry=home_new_content"
                               log="page:home,pos:hotspot,area:listTit,index:1" title="《楚乔传》与《醉玲珑》你更看好哪部剧？">《楚乔传》与《醉玲珑》你更看好哪部剧？</a>
                        </li>
                        <li class="hotspot-list-item">
                            <i class="hotspot-disc"></i>
                            <a target="_blank" class="hotspot-link"
                               href="https://p.baidu.com/question/581e6162636139376338300400/556977&amp;entry=home_new_content"
                               log="page:home,pos:hotspot,area:listTit,index:2" title="《普罗米修斯》挖的坑，《异形：契约》要怎么去填？">《普罗米修斯》挖的坑，《异形：契约》要怎...</a>
                        </li>
                        <li class="hotspot-list-item">
                            <i class="hotspot-disc"></i>
                            <a target="_blank" class="hotspot-link"
                               href="https://p.baidu.com/question/18b66162636338376166610400/558181&amp;entry=home_new_content"
                               log="page:home,pos:hotspot,area:listTit,index:3" title="《神探夏洛克》里夏洛克有哪些明显的性格特征？">《神探夏洛克》里夏洛克有哪些明显的性格特...</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="center-container">
                <div class="selected">
                    <div class="selected-title"><img src="{{asset('home/images/hot-title_036161d.jpg')}}" alt=""></div>
                    <dl class="selected-top">
                        <dt class="selected-pic f-18">
                            <a href="https://zhidao.baidu.com/question/1579765788437493540.html?entry=home_new_content"
                               target="_blank" log="page:home,pos:selected,area:img"><img
                                        src="{{asset('home/images/kt.jpg')}}" alt=""></a>
                        </dt>
                        <dd class="selected-con">
                            <div class="selected-tit f-18">
                                <a target="_blank"
                                   href="https://zhidao.baidu.com/question/1579765788437493540.html?entry=home_new_content"
                                   log="page:home,pos:selected,area:imgtitle" title="“6·24”特大山体滑坡灾害：茂县出现二次垮塌？">“6·24”特大山体滑坡灾害：茂县出现二次垮塌？</a>
                            </div>
                            <p class="selected-text">
                                6月27日11时02分，四川茂县叠溪镇新磨村部分山体出现二次垮塌，人员已经撤离。
                            </p>
                        </dd>
                    </dl>
                    <ul class="selected-list">
                        @foreach($wen as $wen)
                        <li class="selected-list-item">
                            <i class="selected-disc"></i>
                            <a target="_blank" class="selected-link"
                               href="https://zhidao.baidu.com/question/1579573338012027140.html?entry=home_new_content"
                               log="page:home,pos:selected,area:listtitle,index:1" title="{{$wen['ques_title']}}">{{$wen["ques_title"]}}</a>
                        </li>
                        @endforeach
                        <!--
                        <li class="selected-list-item">
                            <i class="selected-disc"></i>
                            <a target="_blank" class="selected-link"
                               href="https://zhidao.baidu.com/question/1929788719406215307.html?entry=home_new_content"
                               log="page:home,pos:selected,area:listtitle,index:2" title="101℃聚焦：过去24小时发生了哪些大事？">101℃聚焦：过去24小时发生了哪些大事？</a>
                        </li>
                        <li class="selected-list-item">
                            <i class="selected-disc"></i>
                            <a target="_blank" class="selected-link"
                               href="https://zhidao.baidu.com/question/332368385044096885.html?entry=home_new_content"
                               log="page:home,pos:selected,area:listtitle,index:3" title="NBA各奖项公布：威少夺MVP？">NBA各奖项公布：威少夺MVP？</a>
                        </li>
                        <li class="selected-list-item">
                            <i class="selected-disc"></i>
                            <a target="_blank" class="selected-link"
                               href="https://zhidao.baidu.com/question/373164406131595364.html?entry=home_new_content"
                               log="page:home,pos:selected,area:listtitle,index:4" title="保姆纵火案追踪：背后真相遭披露？">保姆纵火案追踪：背后真相遭披露？</a>
                        </li>
                        <li class="selected-list-item">
                            <i class="selected-disc"></i>
                            <a target="_blank" class="selected-link"
                               href="https://zhidao.baidu.com/question/493921716247703412.html?entry=home_new_content"
                               log="page:home,pos:selected,area:listtitle,index:5"
                               title="董明珠再跨界，建立格力学校？">董明珠再跨界，建立格力学校？</a>
                        </li>
                        <li class="selected-list-item">
                            <i class="selected-disc"></i>
                            <a target="_blank" class="selected-link"
                               href="https://zhidao.baidu.com/question/1180135561168169539.html?entry=home_new_content"
                               log="page:home,pos:selected,area:listtitle,index:6" title="哥伦比亚游轮沉没，现场照片曝光？">哥伦比亚游轮沉没，现场照片曝光？</a>
                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="announcement-container">
                <div class="announcement">
                    <h3 class="three-parts-layout-title">公告</h3>
                    <div class="three-parts-layout-content announcement-content line">
                       @foreach($Noticelist as $v)
                        <ul class="announcement-list">
                            <li class="announcement-list-item">
                                <i class="announcement-disc"></i>
                                <a target="_blank" class="announcement-link"
                                   href="{{URL('home/notice')}}/{{$v->id}}" title="{{$v->notice_title}}">{{$v->notice_title}}</a>
                            </li>
                        </ul>
                       @endforeach
                    </div>
                </div>
                <div class="shop">
                    <h3 class="three-parts-layout-title">广告租位</h3>
                    <div class="shop-content line">
					    @foreach($adulist as $v)
                        <img src="{{env('QINIU_URL')}}/iwanli/image_{{$v->adu_img}}?imageView2/1/w/280/h/149"/>
					    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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
    <div class="push-and-product-wp">
        <div class="push-and-product line container">
            <div class="push-question-container">
                <div class="login-push">
                    <div class="push-title-container line">
                        <h3 class="push-title">等你来回答</h3>
                        <p class="user-keyword">
<span class="need-set-tag">
您还没有<span class="set-my-tag">定制标签</span>，给您推荐了您可能感兴趣的问题</span>
                        </p>
                    </div>
                    <div class="daily-question">
                        <div class="daily-question-tit">
                            每日一题<a href="javascript:;" class="refresh-btn"></a>
                        </div>
                        <div class="daily-question-ask"><a
                                    href="https://zhidao.baidu.com/question/588689044884138525.html?push=asking&amp;entry=qb_home_new"
                                    target="_blank" log="page:home,pos:daily_qustion"> 有贝尔丰BFt12的卡刷刷机包吗？ </a>
                            <div class="daily-wealth"><span class="wealth-disc"></span>50</div>
                            <div class="daily-question-btn"><a href="{{ url("detail") }}" target="_blank"
                                                               log="page:home,pos:daily_qustion">立即抢答</a></div>
                        </div>
                    </div>
                    <script type="text/template" id="j-daily-question">
                        <a href="/question/${data.qid}.html?push=asking&entry=qb_home_new" target="_blank"
                           log="page:home,pos:daily_qustion">
                            ${data.title.length > 40 ? data.title.slice(0, 40) + '...' : data.title}
                        </a>
                        <div class="daily-wealth">
                            <span class="wealth-disc"></span>${data.score}
                        </div>
                        <div class="daily-question-btn">
                            <a href="/question/${data.qid}.html?push=asking&entry=qb_home_new" target="_blank"
                               log="page:home,pos:daily_qustion">立即抢答</a>
                        </div>
                    </script>
                    <div class="login-push-content">
                        <ul class="login-push-qustion-list" style="margin-top: 0px;">
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/2143916988293501668.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 腿细了好吗？ </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/1835958382419548220.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 感觉得罪室友了，和她道歉也没用，怎么办 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/2143916924548415388.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 100加200等于多少？ </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   title="女生体重快100斤，身高163，身材挺瘦，是不是胸大"
                                                                   href="https://zhidao.baidu.com/question/814242443773346412.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 女生体重快100斤，身高163，身材挺瘦，是不是胸大 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/588752980712638805.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 公司里面，很不熟悉的女孩，怎么聊天 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/629741132014516884.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 笔记本电脑能按电源键关机吗 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   title="工行信用卡已经在制卡了，我用手机银行查询审批额度是五万，是不是卡"
                                                                   href="https://zhidao.baidu.com/question/588752916966959725.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank">
                                        工行信用卡已经在制卡了，我用手机银行查询审批额度是五万，是不是卡 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   title="午夜将自己分给了黑夜和人,而人却想着月与整个黑夜"
                                                                   href="https://zhidao.baidu.com/question/1993981205767794227.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 午夜将自己分给了黑夜和人,而人却想着月与整个黑夜 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/2143916860482141908.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 三十多平米的房可以安装中央空调吗 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/2143916860481875748.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 推油起名字 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><span class="i-wealth question-score">10</span> <a
                                            class="question-link" title="昨天晚上给流浪猫喂食的时候被咬到 猫是小猫一个月大 牙齿插进我手指"
                                            href="https://zhidao.baidu.com/question/629741131692939484.html?push=asking&amp;entry=qb_home_new"
                                            target="_blank"> 昨天晚上给流浪猫喂食的时候被咬到 猫是小猫一个月大 牙齿插进我手指 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/1372200249162844259.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> ios11公测版下有哪些中国特色更新？ </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   title="QQ隐生了，不想让别人看见，但是我现在用着wf，他们应该看不到我QQ是否在线吧"
                                                                   href="https://zhidao.baidu.com/question/1372200248905738699.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank">
                                        QQ隐生了，不想让别人看见，但是我现在用着wf，他们应该看不到我QQ是否在线吧 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   title="把坏了的牙磨掉然后塞了点带药的棉花，隔天中午牙老是麻痹麻痹的，怎"
                                                                   href="https://zhidao.baidu.com/question/588752852580133125.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank">
                                        把坏了的牙磨掉然后塞了点带药的棉花，隔天中午牙老是麻痹麻痹的，怎 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/629741067562440564.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 2017山东高考全省146900能上什么大学 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><span class="i-wealth question-score">5</span> <a
                                            class="question-link"
                                            href="https://zhidao.baidu.com/question/629741003945314964.html?push=asking&amp;entry=qb_home_new"
                                            target="_blank"> 跪求人渣的本愿百度云 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   href="https://zhidao.baidu.com/question/2143916668796059668.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank"> 手机号码被禁用了还可以缴费使用吗 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><span class="i-wealth question-score">15</span> <a
                                            class="question-link" title="对一个男生占有欲特别强，然后还不知道喜不喜欢他"
                                            href="https://zhidao.baidu.com/question/1993981014018019147.html?push=asking&amp;entry=qb_home_new"
                                            target="_blank"> 对一个男生占有欲特别强，然后还不知道喜不喜欢他 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><a class="question-link"
                                                                   title="今天宝宝哭了一会有点呕吐的症状后来看着走路不稳，精神恍惚，这是怎么回事。他哭是因为淘气，我打他的屁"
                                                                   href="https://zhidao.baidu.com/question/1835958062858004820.html?push=asking&amp;entry=qb_home_new"
                                                                   target="_blank">
                                        今天宝宝哭了一会有点呕吐的症状后来看着走路不稳，精神恍惚，这是怎么回事。他哭是因为淘气，我打他的屁 </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                            <li class="qustion-item line">
                                <div class="question-body line"><span class="i-wealth question-score">10</span> <a
                                            class="question-link" title="我喜欢的人在理发店上班，可惜他不认识我我也不认识他，为了认识他我该不该也去他那理发店上班？"
                                            href="https://zhidao.baidu.com/question/1835958382676817620.html?push=asking&amp;entry=qb_home_new"
                                            target="_blank"> 我喜欢的人在理发店上班，可惜他不认识我我也不认识他，为了认识他我该不该也去他那理发店上班？ </a> <a
                                            href="http://zhidao.baidu.com/s/2011wapadv/index.html?fr=new_index"
                                            class="i-from-wap" title="来自手机知道"></a></div>
                                <div class="bottom-line"></div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="product-container">
                <div class="product-show">
                    <div class="product-layout line" style="left: 0px;">
                        <div class="product-collection-item">
                            <div class="product-item line product-zhidaoapp"
                                 data-href="http://zhidao.baidu.com/zt/ikapp/?from=new_home">
                                <div class="left-info">
                                    <p class="product-title">
                                        百度知道</p>
                                    <p class="product-sub-title">
                                        最大中文问答社区</p>
                                    <p class="product-type">
<span class="type-item apple">
</span>
                                        <span class="product-divide-line"></span>
                                        <span class="type-item android">
</span>
                                    </p>
                                </div>
                                <div class="right-info">
                                    <div class="product-icon"></div>
                                    <div class="product-icon-qr"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-collection-item">
                            <div class="product-item line product-baobaozhidao"
                                 data-href="http://baobao.baidu.com?from=new_home">
                                <div class="left-info">
                                    <p class="product-title">
                                        宝宝知道</p>
                                    <p class="product-sub-title">
                                        宝宝问题，妈妈知道</p>
                                    <p class="product-type">
<span class="type-item apple">
</span>
                                        <span class="product-divide-line"></span>
                                        <span class="type-item android">
</span>
                                    </p>
                                </div>
                                <div class="right-info">
                                    <div class="product-icon"></div>
                                    <div class="product-icon-qr"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-collection-item">
                            <div class="product-item line product-specialworld"
                                 data-href="http://zhidao.baidu.com/special/home">
                                <div class="left-info">
                                    <p class="product-title">
                                        知道多世界</p>
                                    <p class="product-sub-title">
                                        聚集一个主题<br>
                                        融合多元知识</p>
                                </div>
                                <div class="right-info">
                                    <div class="product-icon"></div>
                                    <div class="product-icon-qr"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-collection-item">
                            <div class="product-item line product-zuoyebang"
                                 data-href="http://zuoye.baidu.com?from=new_home">
                                <div class="left-info">
                                    <p class="product-title">
                                        作业帮</p>
                                    <p class="product-sub-title">
                                        千万学生都在用</p>
                                    <p class="product-type">
<span class="type-item apple">
</span>
                                        <span class="product-divide-line"></span>
                                        <span class="type-item android">
</span>
                                    </p>
                                </div>
                                <div class="right-info">
                                    <div class="product-icon"></div>
                                    <div class="product-icon-qr"></div>
                                </div>
                            </div>
                        </div>
                        <div class="product-collection-item">
                            <div class="product-item line product-ciyuanfan"
                                 data-href="http://ciyuanfan.baidu.com/?ref=pcsyxz">
                                <div class="left-info">
                                    <p class="product-title">
                                        次元饭</p>
                                    <p class="product-sub-title">
                                        二次元资讯大师</p>
                                </div>
                                <div class="right-info">
                                    <div class="product-icon"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-show-tab">
                        <span class="show-tab-item show-tab-item-current" data-index="0"></span>
                        <span class="show-tab-item" data-index="1"></span>
                        <span class="show-tab-item" data-index="2"></span>
                        <span class="show-tab-item" data-index="3"></span>
                        <span class="show-tab-item" data-index="4"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wgt-zd-user" id="wgt-zd-user">
        <div class="container line">
            <div class="wgt-zhima grid">
                <h2>知道用户</h2>
                <div class="info line">
                    <div class="card user" data-type="user">
                        <div class="zhima-star">
                        </div>
                        <a class="ask-to-me" href="https://zhidao.baidu.com/new?fix=%E5%8D%A2%E5%8F%AC843297658"
                           target="_blank">
                            向TA求助</a>
                        <div class="inner">
                            <div class="up">
                                <div class="n-section animate-text">
                                    <div class="innerBox animate-text">
                                        <p class="title">芝麻</p>
                                        <p class="desc">在百度知道中所有贡献知识的用户</p>
                                    </div>
                                </div>
                                <a class="portrait animate" rel="nofollow"
                                   href="http://zhidao.baidu.com/s/star/index.html" target="_blank">
                                    <img class="animate user-avatar"
                                         src="{{asset('home/images/36d3e58da2e58fac383433323937363538052a.jpg')}}">
                                    <div class="cover animate">
                                        <img class="animate" src="{{asset('home/images/up-large_935ea9f.png')}}">
                                    </div>
                                </a>
                                <a class="name" rel="nofollow" href="http://zhidao.baidu.com/s/star/index.html"
                                   target="_blank">卢召843297658</a>
                                <div class="h-section">
                                    <p class="help">Ta帮助的人<span class="">1,024,030</span></p>
                                    <p class="field">擅长<span>百度</span><span>网络运营</span><span>电子商务</span></p>
                                </div>
                            </div>
                            <div class="bottom">
                                <p class="info ">
                                    已有<span style="color:#ee5e0f;">9,468,518</span>个芝麻</p>
                                <div class="people">
                                    <div class="innderBox line">
                                        <div class="portrait selected" data-uname="卢召843297658" title="卢召843297658"
                                             data-helpnum="1,024,030" data-keyword="百度,网络运营,电子商务" data-index="0"
                                             data-encodeuid="36d34069236f25705e79052a">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/36d3e58da2e58fac383433323937363538052a.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="沙漠也长草" title="沙漠也长草" data-helpnum="24,299,958"
                                             data-keyword="时政,法律,军事" data-index="1"
                                             data-encodeuid="3a3d4069236f25705e793911">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/3a3de6b299e6bca0e4b99fe995bfe88d893911.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="kook636" title="kook636"
                                             data-helpnum="62,589,757" data-keyword="耳机,化妆,护肤" data-index="2"
                                             data-encodeuid="b5754069236f25705e79020a">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/b5756b6f6f6b363336020a.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="妙酒" title="妙酒" data-helpnum="980,238,986"
                                             data-keyword="理科" data-index="3" data-encodeuid="1f434069236f25705e799d01">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/1f43e5a699e985929d01.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="晓寒秋枫" title="晓寒秋枫" data-helpnum="158,935,322"
                                             data-keyword="文化艺术,电影" data-index="4"
                                             data-encodeuid="68694069236f25705e798409">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/6869e69993e5af92e7a78be69eab8409.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="宇宙外的三道题" title="宇宙外的三道题"
                                             data-helpnum="36,244,203" data-keyword="健身,宗教,减肥" data-index="5"
                                             data-encodeuid="24b84069236f25705e797e44">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/24b8e5ae87e5ae99e5a496e79a84e4b889e98193e9a2987e44.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-layout">
                                    <a class="button" target="_blank"
                                       href="http://zhidao.baidu.com/ihome#waitingMeAnswer">我要答题</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card team" data-type="team">
                        <div class="inner">
                            <div class="up">
                                <div class="n-section animate-text">
                                    <div class="innerBox animate-text">
                                        <p class="title">芝麻团</p>
                                        <p class="desc">由有共同专长、共同兴趣的芝麻组成的团队</p>
                                    </div>
                                </div>
                                <a class="portrait animate" rel="nofollow"
                                   href="https://zhidao.baidu.com/uteam/view?teamId=36134" target="_blank"
                                   log="page:home,pos:zhimateam,area:portrait">
                                    <img class="animate user-avatar"
                                         src="{{asset('home/images/17916a2c8621736c4fc226fc.jpg')}}">
                                    <div class="cover animate">
                                        <img class="animate" src="{{asset('home/images/team_5f59640.png')}}">
                                    </div>
                                </a>
                                <a class="name" rel="nofollow" href="https://zhidao.baidu.com/uteam/view?teamId=36134"
                                   target="_blank" log="page:home,pos:zhimateam,area:name">数学辅导团</a>
                                <div class="h-section">
                                    <p class="help">团队采纳数<span class="">2,199,480</span></p>
                                    <p class="field">擅长<span>数学</span><span>教育</span><span>外语学习</span></p>
                                </div>
                            </div>
                            <div class="bottom">
                                <p class="info ">
                                    已有<span style="color:#ee5e0f;">9,996</span>个芝麻团</p>
                                <div class="people">
                                    <div class="innderBox line">
                                        <div class="portrait selected" data-uname="数学辅导团" title="数学辅导团"
                                             data-helpnum="2,199,480" data-keyword="数学,教育,外语学习" data-team-id="36134">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/17916a2c8621736c4fc226fc.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="体育大百科" title="体育大百科" data-helpnum="183,534"
                                             data-keyword="篮球,NBA,足球" data-team-id="66199">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/359b033b5bb5c9eadcb4b1fdd239b6003af3b36d.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="马鸣风萧萧" title="马鸣风萧萧" data-helpnum="913,470"
                                             data-keyword="历史,文学,古诗词" data-team-id="53035">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/c9fcc3cec3fdfc0321dac3a8d03f8794a4c2267b.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="星之浩可" title="星之浩可" data-helpnum="1,771,113"
                                             data-keyword="歌词,电影,美食" data-team-id="73950">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/d8f9d72a6059252d5d0ee09f349b033b5bb5b914.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="百度知道顾问团" title="百度知道顾问团"
                                             data-helpnum="726,468" data-keyword="北京,地区,上海" data-team-id="39998">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/818e56a0de79ad9b1f17a2ff.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="萤火之光" title="萤火之光" data-helpnum="459,799"
                                             data-keyword="家庭关系,感情,爱情" data-team-id="82529">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/f636afc379310a55bc1002e0b54543a9822610e9.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-layout">
                                    <a class="button" target="_blank" href="https://zhidao.baidu.com/uteam/class"
                                       log="page:home,pos:zhimateam,area:button">加入团队</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card admin" data-type="admin">
                        <a class="ask-to-me" href="https://zhidao.baidu.com/new?fix=chengbaowai" target="_blank">
                            向TA求助</a>
                        <div class="inner">
                            <div class="up">
                                <div class="n-section animate-text">
                                    <div class="innerBox animate-text">
                                        <p class="title">芝麻将</p>
                                        <p class="desc">由热心用户组成，官方直接领导的平台管理团队</p>
                                    </div>
                                </div>
                                <a class="portrait animate" rel="nofollow"
                                   href="http://zhidao.baidu.com/usercenter?uid=28df4069236f25705e79a800"
                                   target="_blank">
                                    <img class="animate user-avatar"
                                         src="{{asset('home/images/28df6368656e6762616f776169a800.jpg')}}">
                                    <div class="cover animate">
                                        <img class="animate" src="{{asset('home/images/uadmin_6c4bd97.png')}}">
                                    </div>
                                </a>
                                <a class="name" rel="nofollow"
                                   href="http://zhidao.baidu.com/usercenter?uid=28df4069236f25705e79a800"
                                   target="_blank">chengbaowai</a>
                                <div class="h-section">
                                    <p class="help">推荐答案数<span class="">6,160</span></p>
                                    <p class="field">擅长<span>农业</span><span>生物学</span><span>理工学科</span></p>
                                </div>
                            </div>
                            <div class="bottom">
                                <p class="info ">
                                    已有<span style="color:#ee5e0f;">7,257</span>个芝麻将</p>
                                <div class="people">
                                    <div class="innderBox line">
                                        <div class="portrait selected" data-uname="chengbaowai" title="chengbaowai"
                                             data-helpnum="6,160" data-keyword="农业,生物学,理工学科"
                                             data-encodeuid="28df4069236f25705e79a800">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/28df6368656e6762616f776169a800.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="武府小道" title="武府小道" data-helpnum="225,462"
                                             data-keyword="天秤座,处女座,运势" data-encodeuid="71fd4069236f25705e798b06">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/71fdcee4b8aed0a1b5c08b06.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="WU292789" title="WU292789"
                                             data-helpnum="11,488" data-keyword="歌曲,音乐,华人明星"
                                             data-encodeuid="82d04069236f25705e79c014">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/82d05755323932373839c014.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="男儿踏浪" title="男儿踏浪" data-helpnum="827,370"
                                             data-keyword="生活技巧,生活常识,美食" data-encodeuid="0ab24069236f25705e793605">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/0ab2c4d0b6f9cca4c0cb3605.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="xiaomizishen" title="xiaomizishen"
                                             data-helpnum="1,765" data-keyword="视频,电影,资源共享"
                                             data-encodeuid="82b34069236f25705e79b940">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/82b37869616f6d697a697368656eb940.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                        <div class="portrait" data-uname="佐基游叶" title="佐基游叶" data-helpnum="14,380"
                                             data-keyword="资源共享,公务办理,百度识图" data-encodeuid="26b94069236f25705e792a01">
                                            <img class="user-avatar-small"
                                                 src="{{asset('home/images/26b9d7f4bbf9d3ced2b62a01.jpg')}}">
                                            <div class="cover"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-layout">
                                    <a class="button" target="_blank" href="https://zhidao.baidu.com/uadmin/apply"
                                       log="page:home,pos:zhimaadmin,area:button">申请芝麻将</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-r">
                <div class="wgt-promotions" id="wgt-promotions">
                    <div class="promotions-block carousel" id="imgs-block">
                        <div class="carousel-inner">
                            <div class="item active" index="0" style="width: 100%; top: 0px; left: 0%;"><a
                                        alog-action="ad-banner" log="page:home,pos:right_promotions,index:0"
                                        href="http://zhidao.baidu.com/activity/thousandteam?act=index" target="_blank"
                                        title=""><img class="promotion-img"
                                                      src="{{asset('home/images/xinshouyelunbo.jpg')}}" alt=""></a>
                            </div>
                            <div class="item" index="1" style="width: 100%; top: 0px; left: -100%;"><a
                                        alog-action="ad-banner" log="page:home,pos:right_promotions,index:1"
                                        href="http://dwz.cn/5Fv32H" target="_blank"
                                        data-img="https://gss0.bdstatic.com/7051cy89RsgCncy6lo7D0j9wexYrbOWh7c50/liuwei/%E9%87%8D%E9%87%91%E6%82%AC%E8%B5%8F%E5%8A%A8%E6%BC%AB%E8%BE%BE%E4%BA%BA_280x120px.png"
                                        title=""><img src="{{asset('home/images/重金悬赏动漫达人_280x120px.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="scroll-shadow"></div>
                        <div class="carousel-misc"><a class="carousel-control carousel-control-left"
                                                      style="left: 110px;"></a>
                            <ol class="carousel-indicators">
                                <li data-slide-to="0" class="first active"></li>
                                <li data-slide-to="1" class=""></li>
                            </ol>
                            <a class="carousel-control carousel-control-right"></a></div>
                    </div>
                    <div id="site-navigator-back">
                    </div>
                    <div id="site-navigator">
                    </div>
                </div>
                <div class="wgt-rank">
                    <div class="head line">
                        <div class="tab grid-r">
                            <a rel="nofollow" href="https://zhidao.baidu.com/misc/rank?type=0" class="select"
                               target="_blank">周积分</a>
                            <span class="split">|</span>
                            <a rel="nofollow" href="https://zhidao.baidu.com/misc/rank?type=1"
                               class="not-selected-total" target="_blank">周采纳</a>
                        </div>
                        排行榜
                    </div>
                    <div class="tabCnt">
                        <div class="rank-block week">
                            <dl>
							    @for($i=0;$i<count($userinte);$i++)
                                <dt class="rank rank0 line">
								  
                                <div class="grid-r">
                                    <span class="ansNum ">{{$userinte[$i]['user_inte']}}</span>
                                    <span class="trend-box"><span class="trend down"></span></span>
                                </div>
								@if($i<count($arr2))
                                <span class="sort ">{{$i+1}}</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=b0664069236f25705e79be64"
                                   target="_blank">{{$arr2[$i]['login_name']}}</a>
								@endif  
                                </dt>
                               @endfor
                            </dl>
                        </div>
                        <div class="rank-block total">
                            <dl>
                                <dt class="rank rank0 line">
                                <div class="grid-r">
                                    <span class="ansNum ">106577</span>
                                    <span class="trend-box"><span class="trend up"></span></span>
                                </div>
                                <span class="sort ">1</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=759d4069236f25705e798ba2"
                                   target="_blank">du小槑鸭</a>
                                </dt>
                                <dt class="rank rank1 line">
                                <div class="grid-r">
                                    <span class="ansNum ">82682</span>
                                    <span class="trend-box"><span class="trend remain"></span></span>
                                </div>
                                <span class="sort ">2</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=b0664069236f25705e79be64"
                                   target="_blank">病魔克星的春天</a>
                                </dt>
                                <dt class="rank rank2 line">
                                <div class="grid-r">
                                    <span class="ansNum ">56708</span>
                                    <span class="trend-box"><span class="trend remain"></span></span>
                                </div>
                                <span class="sort ">3</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=ddf84069236f25705e793214"
                                   target="_blank">houzheng1976</a>
                                </dt>
                                <dt class="rank rank3 line">
                                <div class="grid-r">
                                    <span class="ansNum ">42798</span>
                                    <span class="trend-box"><span class="trend up"></span></span>
                                </div>
                                <span class="sort ">4</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=01d04069236f25705e790d63"
                                   target="_blank">zjh_ch</a>
                                </dt>
                                <dt class="rank rank4 line">
                                <div class="grid-r">
                                    <span class="ansNum ">40827</span>
                                    <span class="trend-box"><span class="trend down"></span></span>
                                </div>
                                <span class="sort ">5</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=d1534069236f25705e796d36"
                                   target="_blank">abc曲线走路</a>
                                </dt>
                                <dt class="rank rank5 line">
                                <div class="grid-r">
                                    <span class="ansNum ">39795</span>
                                    <span class="trend-box"><span class="trend down"></span></span>
                                </div>
                                <span class="sort ">6</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=a5724069236f25705e794f4b"
                                   target="_blank">健康就幸福98</a>
                                </dt>
                                <dt class="rank rank6 line">
                                <div class="grid-r">
                                    <span class="ansNum ">35558</span>
                                    <span class="trend-box"><span class="trend down"></span></span>
                                </div>
                                <span class="sort ">7</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=3e294069236f25705e79809c"
                                   target="_blank">2017付</a>
                                </dt>
                                <dt class="rank rank7 line">
                                <div class="grid-r">
                                    <span class="ansNum ">33947</span>
                                    <span class="trend-box"><span class="trend down"></span></span>
                                </div>
                                <span class="sort ">8</span>
                                <a rel="nofollow" href="http://zhidao.baidu.com/usercenter?uid=4ca04069236f25705e79e062"
                                   target="_blank">爵帝少帅leo</a>
                                </dt>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wgt-pgc container line" id="wgt-pgc">
        <div class="wgt-mavin grid">
            <div class="head line">
                <div class="head-r grid-r">
<span class="number" id="mavin-refresh">
<i class="animate hide" style="display: none;">&nbsp;&nbsp;&nbsp;</i>
<i class="static">&nbsp;&nbsp;&nbsp;</i>
换一换</span>
                    <span class="home-split"></span>
                    <a href="https://zhidao.baidu.com/hangjia" target="_blank">更多</a></div>
                <span class="title">知道行家</span>
                <span class="number"><em>13</em>个领域</span>
                <span class="number"><em>11,114</em>个行家</span>
            </div>
            <div class="list carousel">
                <div class="carousel-inner">
                    <div class="item" index="0" style="width: 100%; top: 0px; left: -100%;">
                        <div class="mavin-item">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1519330884.html"
                                                target="_blank">怎样认定正当防卫？</a></div>
                            <a class="info"
                               href="https://zhidao.baidu.com/hangjia/profile/%E9%83%AD%E8%99%8E%E5%BE%8B%E5%B8%88"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/1.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">郭虎</p>
                                    <p class="field">擅长领域：法律</p></div>
                            </a></div>
                        <div class="mavin-item last">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1519323790.html"
                                                target="_blank">买纸黄金真的赚钱吗？</a></div>
                            <a class="info"
                               href="https://zhidao.baidu.com/hangjia/profile/%E5%B0%8F%E7%8B%BC%E5%A4%8F%E5%96%9C%E4%BF%8A"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/2.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">小狼夏喜俊</p>
                                    <p class="field">擅长领域：黄金</p></div>
                            </a></div>
                    </div>
                    <div class="item active" index="1" style="width: 100%; top: 0px; left: 0%;">
                        <div class="mavin-item">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1534027179.html"
                                                target="_blank">如何培养起强大的学习能力？</a></div>
                            <a class="info"
                               href="https://zhidao.baidu.com/hangjia/profile/%E7%BC%AA%E8%80%81%E5%B8%88%E5%A6%99%E7%AC%94%E7%94%9F%E8%8A%B1"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/4.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">缪老师妙笔生花</p>
                                    <p class="field">擅长领域：升学入学</p></div>
                            </a></div>
                        <div class="mavin-item last">
                            <div class="ask"><a
                                        href="https://zhidao.baidu.com/question/%E6%A2%81%E5%B0%8F%E6%B6%9B2016.html"
                                        target="_blank">网上买的火车票退票后，钱什么时间返回支付宝</a></div>
                            <a class="info"
                               href="https://zhidao.baidu.com/hangjia/profile/%E6%A2%81%E5%B0%8F%E6%B6%9B2016"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/5.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">梁小涛2016</p>
                                    <p class="field">擅长领域：交通</p></div>
                            </a></div>
                    </div>
                    <div class="item" index="2" style="width: 100%; top: 0px;">
                        <div class="mavin-item">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1689677107963609588.html"
                                                target="_blank">离职需要注意什么？</a></div>
                            <a class="info" href="https://zhidao.baidu.com/hangjia/profile/%E6%88%9A%E5%AE%B6%E4%BA%BA"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img
                                                src="{{asset('home/images/adaf2edda3cc7cd995b85e033b01213fb90e9156.jpg')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">戚家人</p>
                                    <p class="field">擅长领域：刑事案件</p></div>
                            </a></div>
                        <div class="mavin-item last">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1161767402.html"
                                                target="_blank">跑步的正确方法？</a></div>
                            <a class="info" href="https://zhidao.baidu.com/hangjia/profile/jiyitaiji" target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/8.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">jiyitaiji</p>
                                    <p class="field">擅长领域：武术</p></div>
                            </a></div>
                    </div>
                    <div class="item" index="3" style="width: 100%; top: 0px;">
                        <div class="mavin-item">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/104639138.html" target="_blank">增值税如何计算出来的？</a>
                            </div>
                            <a class="info" href="https://zhidao.baidu.com/hangjia/profile/mokai1981" target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/10.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">mokai1981</p>
                                    <p class="field">擅长领域：财务</p></div>
                            </a></div>
                        <div class="mavin-item last">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1354480208.html"
                                                target="_blank">Windows Media Player播放器出现错误怎么办？</a></div>
                            <a class="info"
                               href="https://zhidao.baidu.com/hangjia/profile/%E8%AF%A0%E9%87%8A%E4%B8%A8%E7%81%AC%E9%82%A3%E4%BB%BD%E7%88%B1"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/9.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">于通海</p>
                                    <p class="field">擅长领域：互联网</p></div>
                            </a></div>
                    </div>
                    <div class="item" index="4" style="width: 100%; top: 0px;">
                        <div class="mavin-item">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1530806231.html"
                                                target="_blank">劳动监察和劳动仲裁的区别是什么？</a></div>
                            <a class="info"
                               href="https://zhidao.baidu.com/hangjia/profile/%E4%B8%93%E4%B8%9A%E4%BB%B2%E8%A3%81%E5%91%98"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/111.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">专业仲裁员</p>
                                    <p class="field">擅长领域：劳动人事</p></div>
                            </a></div>
                        <div class="mavin-item last">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/337730622.html" target="_blank">金融中说的头寸是什么意思？</a>
                            </div>
                            <a class="info"
                               href="https://zhidao.baidu.com/hangjia/profile/%E4%BF%9D%E9%99%A9%E8%B4%BA%E6%B4%8B%E6%B4%8B"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/heyangyang.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">保险贺洋洋</p>
                                    <p class="field">擅长领域：保险</p></div>
                            </a></div>
                    </div>
                    <div class="item" index="5" style="width: 100%; top: 0px;">
                        <div class="mavin-item">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1534993221.html"
                                                target="_blank">车辆购置税具体怎样计算的？</a></div>
                            <a class="info" href="https://zhidao.baidu.com/hangjia/profile/sjz625626" target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/sjz.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">sjz625626</p>
                                    <p class="field">擅长领域：银行</p></div>
                            </a></div>
                        <div class="mavin-item last">
                            <div class="ask"><a href="https://zhidao.baidu.com/question/1530819788.html"
                                                target="_blank">房产契税怎样计算？</a></div>
                            <a class="info"
                               href="https://zhidao.baidu.com/hangjia/profile/%E4%BB%B0%E6%9C%9B%E5%A4%A9%E7%A9%BA2018"
                               target="_blank">
                                <div class="info-inner">
                                    <div class="portrait"><img src="{{asset('home/images/HUBAOCHAO.png')}}">
                                        <div class="cover"></div>
                                    </div>
                                    <p class="name">胡保朝</p>
                                    <p class="field">擅长领域：财务</p></div>
                            </a></div>
                    </div>
                </div>
                <div class="carousel-misc"></div>
            </div>
        </div>
        <style type="text/css">
            .mainQues .videoPic {
                background-image: url(https://gss0.bdstatic.com/7051cy89RcgCncy6lo7D0j9wexYrbOWh7c50/YXX/shipinzhuanqu/%E4%B8%80%E5%8A%A0%E6%89%8B%E6%9C%BA5_100k.jpg);
            }

            .questions .videoPic1 {
                background-image: url(https://gss0.bdstatic.com/7051cy89RcgCncy6lo7D0j9wexYrbOWh7c50/YXX/shipinzhuanqu/%E8%B7%AF%E4%BA%9A%E9%92%93%E6%B3%951.jpg);
            }

            .questions .videoPic2 {
                background-image: url(https://gss0.bdstatic.com/7051cy89RcgCncy6lo7D0j9wexYrbOWh7c50/YXX/shipinzhuanqu/%E6%8C%87%E7%BA%B9%E8%AF%86%E5%88%AB2_100k.jpg);
            }
        </style>
        <div class="wgt-videoQuesAsk grid">
            <div class="head line">
                <span class="title">视频专区</span>
            </div>
            <div class="list">
                <div class="videoQuesAsk-left">
                    <div class="askContainer">
                        <div class="mainQues">
                            <a href="javascript:void(0)" log="page:home,pos:videoQues,area:bigPicTit,index:1"
                               data-url="http://zhidao.baidu.com/feed/video/detail?vid=20075a246b6f6c500000">
                                <div class="videoPic"></div>
                                <div class="bg"></div>
                                <div class="askTitle">
                                    <span class="title">万众期待！一加手机5：骁龙835+8GB内存~强势来袭</span>
                                    <span class="time">01:55</span>
                                    <span class="detail">让体验不在受限的8GB大内存，对性能毫无保留的骁龙835处理器，64/128GB UFS2.1双通道闪存…...让你干什么，都无忧无虑。</span>
                                    <img src="{{asset('home/images/videoBtn_19d52b1.png')}}" class="btn">
                                </div>
                            </a>
                        </div>
                        <div class="question">
                            <a href="javascript:void(0)" log="page:home,pos:videoQues,area:textTit,index:2"
                               data-url="http://zhidao.baidu.com/feed/video/detail?vid=1e075a246b6f6c500000"
                               class="title">二维码拿正才能扫描成功？大部分人竟然都错了！</a>
                            <span class="time">01:08</span>
                        </div>
                        <div class="question">
                            <a href="javascript:void(0)" log="page:home,pos:videoQues,area:textTit,index:3"
                               data-url="http://zhidao.baidu.com/feed/video/detail?vid=5e075a246b6f6c500000"
                               class="title">不想当好男人的黄磊是怎样的一个人？</a>
                            <span class="time">04:01</span>
                        </div>
                    </div>
                </div>
                <div class="videoQuesAsk-right">
                    <div class="questions">
                        <a href="javascript:void(0)" log="page:home,pos:videoQues,area:smallPicTit,index:4"
                           data-url="http://zhidao.baidu.com/feed/video/detail?vid=22075a246b6f6c500000">
                            <div class="videoPic1"></div>
                            <div class="bg"></div>
                            <img src="{{asset('home/images/videoBtn_19d52b1.png')}}" class="btn">
                        </a>
                    </div>
                    <div class="small-title" style="display: block;">
                        <span class="title">你知道路亚钓法吗？</span>
                        <span class="time">05:37</span>
                    </div>
                    <div class="questions">
                        <a href="javascript:void(0)" log="page:home,pos:videoQues,area:smallPicTit,index:5"
                           data-url="http://zhidao.baidu.com/feed/video/detail?vid=36075a246b6f6c500000">
                            <div class="videoPic2"></div>
                            <div class="bg"></div>
                            <img src="{{asset('home/images/videoBtn_19d52b1.png')}}" class="btn">
                        </a>
                    </div>
                    <div class="small-title" style="display: block;">
                        <span class="title">除了iPhone8内置指纹识别外，下半年...</span>
                        <span class="time">03:02</span>
                    </div>
                </div>
            </div>
        </div>

@endsection