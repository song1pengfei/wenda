@extends('home.base')
   @section('content')
   
				
<body>

<div class="banner-title" style="margin-bottom: 40px">
    <div class="main">
        <a class="tit" href="http://help.baidu.com/index">服务中心</a><span class="tit">&gt;</span><span
                class="tit">知道</span>
    </div>
</div>

<div class="main-b">
    <div class="side-bar" id="sideBar">
        <div>
            <div class="side-tit">
                <div>
                    <img src="{{asset('home/images/zhidao_72.png')}}" class="icon-img fl">
                    <div class="icon-text fl">知道</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="gray" style="border: 0;">
                <div class="ques-tit-icon fl">
                    <img src="{{asset('home/images/wenhao.png')}}">
                </div>
                <div class="ques-tit-desc fl">问题帮助</div>
            </div>
            <ul>
                <li style="border: 0"><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=154" class="">
                        知道协议及检举原则 </a></li>
                <li><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=240" class="">
                        我要提问 </a></li>
                <li><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=241" class="">
                        我要回答 </a></li>

                <li class="show-hid" id="show_li" style="border: 0"><span>展开全部<img
                                src="{{asset('home/images/show_pixel.png')}}"></span></li>
                <li style="display: none;"><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=661"
                                              class="">
                        知道高质量问答
                    </a></li>
                <li style="display: none;"><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=672"
                                              class="">
                        知道品牌合作
                    </a></li>
                <li style="display: none;"><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=680"
                                              class="">
                        知道举报
                    </a></li>
                <li style="display: none;"><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=682"
                                              class="">
                        知道开放平台
                    </a></li>
                <li style="display: none;"><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=684"
                                              class="">
                        真相问答机
                    </a></li>
                <li class="show-hid" id="hidden_li" style="border: 0px; display: none;"><span>收起<img
                                src="{{asset('home/images/hid_pixel.png')}}"></span>
                </li>
            </ul>
            <div>
                <div class="gray" style="border: 0">
                    <div class="ques-tit-icon fl"><img src="{{asset('home/images/erji.png')}}"></div>
                    <div class="ques-tit-desc fl">意见反馈</div>
                </div>
                <div class="list-tab" style="border: 0">
                    <div>
                        <a class="js-link-change" prodid="9" hashid="1" href="http://help.baidu.com/add?prod_id=9#1"
                           target="_blank">举报不良信息</a>
                    </div>
                    <div>
                        <a class="js-link-change" prodid="9" hashid="2" href="http://help.baidu.com/add?prod_id=9#2"
                           target="_blank">找回失效问答</a>
                    </div>
                </div>
                <div class="list-tab">
                    <div>
                        <a class="js-link-change" prodid="9" hashid="3" href="http://help.baidu.com/add?prod_id=9#3"
                           target="_blank">反馈侵权信息</a>
                    </div>
                    <div>
                        <a class="js-link-change" prodid="9" hashid="4" href="http://help.baidu.com/add?prod_id=9#4"
                           target="_blank">意见建议反馈</a>
                    </div>
                </div>
            </div>
            <input type="hidden" id="on-bar" value="0">
        </div>
    </div>
    <script type="text/javascript" src="{{asset('home/js/list-detail.js')}}"></script>
    <script type="text/javascript">
        baidu(function () {
                var one = $('#on-bar').val();
                initList();
                initClick();
                initSide(one);
            }
        );

        //  左侧菜单栏 展开收起
        $('#hidden_li').click(function () {
            // $('.show-hid ~ li ').hide();
            // $('#hidden_li ~ li ').show();
            // $('#show_li').show();
            initSide('0');
        });

        $('#show_li').click(function () {
            // $('#show_li').hide();
            // $('.show-hid ~ li ').show();
            initSide('1');
        });


    </script>
    <div class="content" id="mainContent">
        <div class="tit tit-b">
            <span class="tname">公告</span>
        </div>
        <ul class="txtlist txtlist-a q-list">
            <li class="art" help_id="1000774">
                <div class="js-ques-show ques-show" data-id="1" on-show="1" id="title_1" help_id="1000774">
                    <h1>公告标题<h1></br>
					<p>{{$single->notice_title}}</p>
                </div>
                <div class="article" id="article_1" style="display: block">
                   
                    <p><br></p>
                    <p>{{$single->notice_content}}</p>
                    <p><br></p>
                    <p style="float:right">{{$single->notice_time}}</p><br/><br/><br/>
                    <p><span style="font-size:18px;"><strong>知道协议及检举原则</strong></span></p>
                    <p><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=154&amp;id=851" target="_blank">百度知道协议</a>
                    </p>
                    <p><a href="http://help.baidu.com/question?prod_en=zhidao&amp;class=154&amp;id=851" target="_blank">百度知道的检举原则</a>
                    </p>
                    <p><br></p>
                    <div class="go-list">还有疑问 , 询问请到<a href="http://help.baidu.com/add?prod_id=9" target="_blank"
                                                       class="js-link-change" prodid="9" hashid="10">意见反馈</a></div>
                </div>
            </li>
            <li class="art" help_id="1001712">
                <div class="js-ques-show ques-hide" data-id="2" on-show="0" id="title_2" help_id="1001712">
                    财富值有什么用？
                </div>

                <div class="article" id="article_2" style="display: none">
                    
                    
                    <div class="go-list">还有疑问 , 询问请到<a href="http://help.baidu.com/add?prod_id=9" target="_blank"
                                                       class="js-link-change" prodid="9" hashid="10">意见反馈</a></div>
                </div>
            </li>
            <li class="art" help_id="1001713">
                <div class="js-ques-show ques-hide" data-id="3" on-show="0" id="title_3" help_id="1001713">
                    如何提高采纳？
                </div>

                <div class="article" id="article_3" style="display: none">
                    <p style="white-space: normal;"><span
                                style="color: rgb(51, 51, 51); background-color: rgb(255, 255, 255); font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">采纳是对普通问题回答后的一个反馈或是认可。解决了问题，内容也规范，即会被提问者或是网友（管理员）进行采纳。采纳后，会给用户相应的财富值奖励</span><span
                                style="font-size: 12px; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255); font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">。</span>
                    </p>
                    <p style="white-space: normal;"><span
                                style="background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">1、尽量选择自己擅长的领域来回答； &nbsp;</span><br>
                    </p>
                    <p style="white-space: normal;"><span
                                style="color: rgb(51, 51, 51); background-color: rgb(255, 255, 255); font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">2、回答问题要实事求是 严肃认真，不可以抄袭灌水；</span>
                    </p>
                    <p style="white-space: normal;"><span
                                style="color: rgb(51, 51, 51); background-color: rgb(255, 255, 255); font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">3、尽量抢在别人前面回答，因为很多提问者很迫切地希望马上就能的得到答案，如果你回答的够快的话，你的答案被采纳的希望会很大；&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br></span>
                    </p>
                    <p style="white-space: normal;"><span
                                style="color: rgb(51, 51, 51); background-color: rgb(255, 255, 255); font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;">4、注意礼貌，比如在回答问题之前加上“你好”，“很高兴回答你的问题”，在回答结束后说声"谢谢"等等。</span>
                    </p>
                    <p><br></p>
                    <div class="go-list">还有疑问 , 询问请到<a href="http://help.baidu.com/add?prod_id=9" target="_blank"
                                                       class="js-link-change" prodid="9" hashid="10">意见反馈</a></div>
                </div>
            </li>

        </ul>
    </div>
</div>

@endsection