@extends('home.base')

        @section('content')

<script type="text/javascript">
        F.context('curClass', {"cid":"101","name":"\u7ecf\u6d4e\u91d1\u878d","isDelete":"0","level":"1","picUrl":"https:\/\/gss0.bdstatic.com\/70cFsjip0QIZ8tyhnq\/img\/iknow\/%E4%B8%8B%E9%9D%A2%E9%85%8D%E5%9B%BE_15.png","parentCid":"0","id":"101"});
    </script>
<section class="crumbs-widget-wp container">
<div class="crumbs-list-wgt">
<ul class="crumbs-list">
<li class="crumbs-item">

<span class="cur-crumbs ">
<span class="crumbs-border"></span>
<a class="crumbs-name">
全部问题</a>
<span class="open-crumbs"></span>
<span class="crumbs-border"></span>
<span class="cur-crumbs-cover" style="width: 90px;"></span>
</span>
</li>
<li class="crumbs-item">
<span class="crumbs-direction"></span>

<span class="cur-crumbs ">
<span class="crumbs-border"></span>
	
	@foreach ($arr as $vo)
		<span class="crumbs-name">    {{ $vo->column_type }}    </span>
	@endforeach

<span class="open-crumbs"></span>
<span class="crumbs-border"></span>
<span class="cur-crumbs-cover" style="width: 90px;"></span>
</span>
</li>
</ul>
<p class="question-count">
共<span class="count-num">760</span>个问题</p>
</div>
</section>
<section class="tag-all-view-widget-wp container">
</section>
<section class="interest-widget-wp container">
&nbsp;</section>
<script>
        // 首屏时间打点
        void function(e,t){for(var n=t.getElementsByTagName("img"),a=+new Date,i=[],o=function(){this.removeEventListener&&this.removeEventListener("load",o,!1),i.push({img:this,time:+new Date})},s=0;s< n.length;s++)!function(){var e=n[s];e.addEventListener?!e.complete&&e.addEventListener("load",o,!1):e.attachEvent&&e.attachEvent("onreadystatechange",function(){"complete"==e.readyState&&o.call(e,o)})}();alog("speed.set",{fsItems:i,fs:a})}(window,document);
    </script>
<section class="list-section-widget-wp container">
<div class="question-list-wgt">
<div class="question-list-nav">
@foreach ($arr as $vv)
<ul class="nav-list">
<li class="nav-item ">
<a href="{{ url('/list') }}/{{ $vv->id }}" class="nav-link nav-pjax-btn" data-type="default">
新提问</a>
</li>
<li class="nav-item ">
<a href="{{ url('/list/highscore') }}/{{ $vv->id }}" class="nav-link nav-pjax-btn" data-type="highScore">
高悬赏</a>
</li>
<li class="nav-item cur ">
<a href="{{ url('/list/hot') }}/{{ $vv->id }}" class="nav-link nav-pjax-btn" data-type="hot">
热门提问</a>
<span class="hot">
</span>
</li>
<li class="nav-item ">
<a href="{{ url('/list/feed') }}/{{ $vv->id }}" class="nav-link nav-pjax-btn" data-type="feed">
神讨论</a>
<span class="hot">
</span>
</li>
</ul>
@endforeach
<div class="extra-nav">
<a href="http://zhidao.baidu.com/team" target="_blank" class="extra-item">
<span class="item-logo">
</span>
团队答题</a>
</div>
</div><div class="question-list-update">
<div class="update-operate-sec">
<div class="search-operate">
<input type="text" placeholder="按关键词筛选" class="search-text">
<a href="javascript:;" class="goto-search">筛选</a>
</div>
<div class="refresh-operate" style="float: right;">
<a href="javascript:;" class="refresh-btn">
<span class="refresh-logo"></span>
刷新</a>
</div>
</div>
</div>
<div id="j-question-list-pjax-container">
<div class="question-list-content">
<ul class="question-list-ul">
@foreach ($arr3 as $v3)
		<li class="question-list-item" data-qid="1180072488705628659" data-cid="74">
		<div class="question-title-section">
		<div class="question-title">
		<span class="coin-logo"></span>
		<span class="coin-count">{{ $v3['ques_inte'] }}</span>
		<a href="{{URL('detail')}}/{{ $v3['ques_id'] }}" target="_blank">
			{{ $v3['ques_title'] }}
		</a>
		</div>
		<div class="question-tags">
		<span class="tag-logo">
		</span>
		<a class="tag-item" target="_blank" href="https://zhidao.baidu.com/list?tag=%BB%F9%BD%F0">
		基金
		</a>
		<a class="tag-item" target="_blank" href="https://zhidao.baidu.com/list?tag=%BB%F5%B1%D2">
		货币
		</a>
		</div>
		<div class="question-info">
		<div class="answer-num">
		0
		回答</div>
		<div class="question-time">
		14
		秒钟前</div>
		</div>
		</div>
		<div class="question-content-section"></div>
		<div class="question-answer-section">
		<textarea class="answer-question-content" placeholder="如需编辑回答或插入图片，请点击标题到问题详情页"></textarea>
		<div class="question-operate-section">
		<span class="close-question">
		收起<span class="close-logo"></span>
		</span>
		<button class="question-answer-submit btn-green-darker">
		提交回答</button>
		<label class="anoy-check">
		<input type="checkbox" class="anoy-check-btn"><span class="anoy-check-text">匿名</span>
		</label>
		</div>
		<div class="question-answer-show">
		</div>
		</div>
		</li>
@endforeach

</ul>
</div>
<script type="text/javascript">
    F.context('questionListInfo', {
        totalCount: '760',
        pn: '',
        rn: ''
    });
</script></div>

<div>
<center>
	<li></li>
</center>
</div>



</div>
<script type="text/template" id="j-question-answers-template">
    <div class="answer-section-title">
        <span class="title-logo">
        </span>
        <span class="title-text">
            ${count}条回答
        </span>
    </div>
    <ul class="answer-section-list">
        
            <li class="answer-item answer-item-${answer.sortIndex}">
                <div class="answer-info">
                    <a class="answer-info-item answer-user" href="http://www.baidu.com/p/${answer.user.name}?from=zhidao">
                        ${answer.user.name}
                    </a>
                    
                        <span class="answer-info-item answer-from">
                            来自手机知道
                        </span>
                    

                    <span class="answer-info-item answer-info-time">
                        ${answer.createTime}
                    </span>
                </div>
                <div class="answer-content">
                    ${answer.contentText}
                </div>
            </li>
        
    </ul>
</script>
</section>

<script type="javascript/template" id="j-char-sort-tag">
    <div class="char-sort-wp ${className}">
        <div class="top-nav">
            <ul class="nav-list">
                
                    <li class="nav-list-item  ${key == '0' ? 'cur' : ''}" data-key="${key}">${key == '0' ? '全部' : (key == 'other' ? '其它' : key)}
                    </li>
                
            </ul>
        </div>
        <div class="bottom-content">
            <ul class="content-list">
                
                    <li class="content-list-item content-list-item-${key} ${key == '0' ? 'cur' : ''}">
                        <div class="content-list-item-tags">
                        
                            <a class="tag-item" href="/list?cid=101&tag=${itemTag}">
                                <span class="tag-text">
                                    ${itemTag}
                                </span>
                            </a>
                        
                        </div>
                    </li>
                
            </ul>
        </div>
    </div>
</script>

</div>


@endsection		
