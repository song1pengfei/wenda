@extends('home.base')

@section('content')
    <div class="layout-wrap">
                                              
        <section class="line qb-section qb-content-replyer del-qb-section">
            <article class="grid qb-content del-qb-content" id="qb-content">
                <div class="wgt-ask accuse-response line mod-shadow" id="wgt-ask">
                    <h1 accuse="qTitle">
                        <i class="iknow-qb_home_icons i-status-being grid mr-10"></i>
                        <span class="ask-title ">{{$QuestionList->ques_title}}</span>
                    </h1>
                    <div class="line mt-5 q-content" accuse="qContent">
                        <span class="con">{{$QuestionList->ques_details}}</span>
                    </div>
					<div class="line f-aid ask-info ff-arial" id="ask-info">
<span class="grid-r ask-time">
<ins class="share-area"><div class="others-share"><a href="javascript:void(0)" target="_blank"
                                                     class="others-share-item weixin iknow-qb_share_icons"
                                                     data-type="weixin-click"><span class="logo"></span></a><a
                href="http://v.t.sina.com.cn/share/share.php?url=http%3A%2F%2Fzhidao.baidu.com%2Fquestion%2F1737982041688527547%3Fsharesource%3Dweibo&amp;title=%E4%BB%96%E4%B8%BA%E4%BB%80%E4%B9%88%E8%BF%99%E6%A0%B7%E5%81%9A%EF%BC%9F%EF%BC%9F_%E7%99%BE%E5%BA%A6%E7%9F%A5%E9%81%93&amp;pic=https%3A%2F%2Fgss0.bdstatic.com%2F70cFsjip0QIZ8tyhnq%2Fimg%2Fiknow%2Fzhidaologo.png"
                target="_blank" class="others-share-item weibo iknow-qb_share_icons" data-type="weibo-click"><span
                    class="logo"></span></a><a
                href="http://connect.qq.com/widget/shareqq/index.html?url=http%3A%2F%2Fzhidao.baidu.com%2Fquestion%2F1737982041688527547%3Fsharesource%3Dqq&amp;title=%E4%BB%96%E4%B8%BA%E4%BB%80%E4%B9%88%E8%BF%99%E6%A0%B7%E5%81%9A%EF%BC%9F%EF%BC%9F_%E7%99%BE%E5%BA%A6%E7%9F%A5%E9%81%93&amp;pics=https%3A%2F%2Fgss0.bdstatic.com%2F70cFsjip0QIZ8tyhnq%2Fimg%2Fiknow%2Fzhidaologo.png"
                target="_blank" class="others-share-item qq iknow-qb_share_icons" data-type="qq-click"><span
                    class="logo"></span></a><a
                href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http%3A%2F%2Fzhidao.baidu.com%2Fquestion%2F1737982041688527547%3Fsharesource%3Dqzone&amp;title=%E4%BB%96%E4%B8%BA%E4%BB%80%E4%B9%88%E8%BF%99%E6%A0%B7%E5%81%9A%EF%BC%9F%EF%BC%9F_%E7%99%BE%E5%BA%A6%E7%9F%A5%E9%81%93&amp;pics=https%3A%2F%2Fgss0.bdstatic.com%2F70cFsjip0QIZ8tyhnq%2Fimg%2Fiknow%2Fzhidaologo.png"
                target="_blank" class="others-share-item qzone iknow-qb_share_icons" data-type="qzone-click"><span
                    class="logo"></span></a></div></ins>
</span>
                        <a class="" alog-action="qb-ask-uname" rel="nofollow"
                           href="http://zhidao.baidu.com/usercenter?uid=2b024069236f25705e7900a8"
                           target="_blank">
						                       @foreach($QuestionUserName as $Questionuser)
											      {{$Questionuser->user_name}}
											   @endforeach</a>
                        <span class="f-pipe"></span>
                        <span>{{$QuestionList->updated_at}}</span>
                        <span id="v-times" class="f-pipe" style="">|</span><span class="browse-times"> 浏览 7 次</span>
                        <span class="f-pipe"></span>
                        <div class="f-aid ask-tags">
                            <i class="iknow-qb_replyer_icons i-ask-tags"></i>
                            <span class="question-list-item-tag">
<a href="https://zhidao.baidu.com/list?tag=%B7%B3%C4%D5" target="_blank" class="question-tag-link">烦恼</a><a
                                        href="https://zhidao.baidu.com/list?tag=%B8%D0%C7%E9" target="_blank"
                                        class="question-tag-link">感情</a><a
                                        href="https://zhidao.baidu.com/list?tag=%C1%B5%B0%AE" target="_blank"
                                        class="question-tag-link">恋爱</a></span>
                        </div>
                        <ins class="accuse-area" style="display: none;"></ins>
                    </div>
                    <div class="guide-tip mt-10 f-gray" id="count-down-tip">
                        <div class="guide-tip-arrow">
                            <em></em>
                            <span></span>
                        </div>
                        <ul class="guide-count-down f-pening">
                            <li>您的回答被采纳后将获得：系统奖励<i class="iknow-qb_home_icons i-new-wealth ml-5"></i><span
                                        class="f-orange ml-5">20</span>（财富值+经验值）
                            </li>
                        </ul>
                    </div>
                    <div class="line">
                        <a class="mb-5 mt-15 search-relate"
                           href="" target="_blank" style=""><span></span>搜索相关资料</a><span
                                class="mt-20 f-14 f-blue inline-block more-answers" alog-alias="qb-answer-bar"
                                id="answer-bar">我有更好的答案 ↓</span>
                    </div>
                    <div id="answer-editor">
                        <form action="" class="form-horizontal" enctype="multipart/form-data" onsubmit="return doaction()" id="answerid">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="ques_id" value="{{$QuestionList->ques_id}}"/>
                            <textarea cols="90" rows="10" name="answer_content"></textarea><br/>
                            <!--<input type="file" name="answer_img">-->
							<input type="submit" class="btn-32-green grid-r new-editor-deliver-btn" value="提交回答"/>
                        </form>
                    </div>
                </div>
			   <script>
			   function doaction(){	
						
					 $("#answertable").show();
						
						 $.ajax({
						  url:"{{URL('/home/detail/store')}}",
						  type:'post',
						  data:$("#answerid").serialize(),
						  dataType:'json',
						  async:true,
						  success:function(data){
							  for(var i in data){
								   $("#answer-editor").hide();
								         for(var j in data[i]){
									     $("#answertable").append(data[i][j]+"　");
								  }
								 
							   }
						},
						  error:function() {
							  window.location = "/home/login";
						  },
					 
						  });
					 return false;
				 }
				  
				</script>
                <script>
                    $('#answer-editor').hide();
                    $(function () {
                        $("#answer-bar").click(function () {
                            $(this).text($("#answer-editor").is(":hidden") ? "我有更好的答案 ↑" : "我有更好的答案 ↓");
                            $("#answer-editor").slideToggle();
                        });
                    });
                </script>
                <div class="wgt-answers" id="wgt-answers">
                    <div class="hd line other-hd ">
                        <h2>4条回答</h2>
                    </div>
					<div style="display:none;width:600px;height:30px;border:0px" id="answertable"></div>
					<div class="bd-wrap">
						@for($i=0;$i<count($AnswerList);$i++)
                        <div class="bd answer answer-first answer-fold" id="answer-2781724496">
                            <div class="line">
                                <a id="here" name="here"></a>
                                <div class="line content">
                                    <div id="answer-content-2781724496" accuse="aContent" class="answer-text line">
											<span class="con" >
											{{$AnswerList[$i]['answer_content']}}
											</span>
                                    </div>
                                    <div class="line info f-light-gray mt-10 mb-5 f-12">
                                        <div class="grid pt-5">
                                            <a alog-action="qb-username" class="user-name" rel="nofollow"
                                               href="http://zhidao.baidu.com/usercenter?uid=4bc04069236f25705e790f52"
                                               target="_blank">
											  {{$UserList[$i]}}
											</a>
						                    <span class="i-gradeIndex i-gradeIndex-6"></span>
                                            <span class="f-pipe">|</span>
                                            <span class="pos-time">
											{{$AnswerList[$i]['answer_time']}}
											</span><br/>
											  			<script>
															function showAdd(){
																//$("#addid form input[type='reset']").trigger('click');
																$("#addid form input[type='reset']").trigger('click');
																$("#addid").show();
															}
														</script>
														
														 
														<script>
														  function DoSubmit()
														  {
													            $.ajax({
																 url:"{{URL('home/comment/insert')}}",
                                                                 type:'post',
																 data:$("#fid").serialize(),
																 dataType:'json',
																 async:true,
																 success:function(data){
																	 //alert(data);
																	 for(var i in data){
																		 //alert(data[i]);
																		 for(var j in data[i]){
																			 //alert(data[i][j]);
																			 $("<b>"+data[i][j]+"</b>").css({left:10+"px"}).insertBefore("#addid{{$i}}");
																		 }
																	 }
																	//$("#addid").hide();
																	//$("<li><h2><b>"+data+"</b></h2></li>").css({left:10+"px"}).insertBefore("#fid");
																	$("#fid input[type='reset']").trigger('click');
																	//$("#fid").hide();
																},
																error:function(){
																	//alert('a');
																	window.location='/home/login';
																}
															});
															  return false;
														  }
														</script>													
											
                                        </div><br/><br/>
                                        <div class="grid-r f-aid pos-relative" >
                                            <div id="pinglun{{$i}}" style="float:left;>
                                            <ins class="accuse-area" alog-action="qb-accuse-link" style="display: none;"></ins>
                                            <a alog-action="qb-comment-btn" class="comment" ><i class="iknow-qb_home_icons i-icon-comment mr-5" ></i>评论</a>　　
                                            </div>
											
											
											
                                            <div id="ckpl{{$i}}" style="float:left;">
                                            <!--<a href="javascript:void(0)" onclick="opendiv({{$AnswerList[$i]['answer_id']}})" id="aaa">查看已有评论</a>-->
                                            <a href="javascript:void(0)" onclick="opendiv()" id="aaa{{$i}}">查看已有评论</a>
                                            <!--<a href="{{URL('/comment/show')}}/{{$AnswerList[$i]['answer_id']}}">查看已有评论</a>-->
                                            </div>
                                        <div class="qb-zan-eva" id="dianzan">
                                            <a id="zan" href="javascript:void(0)">点赞</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="commentdiv{{$i}}" style="display:none;border:1px solid silver;height:250px;width:690px;"></div>
                            <script>
                            $(function($) {
                                var event = $("#dianzan").click(function () {
                                $.ajax({
                                    url : "/praise/islike/"+{{$AnswerList[$i]['answer_id']}}
                                    }).success(function (data1) {
                                if(data1.status) {
                                    //alert("点赞成功");
                                    //$("#zan").text('');
                                    $("#zan").text("点赞"+data1.count);
                                } else {
                                    //alert("取消点赞");
                                    //$("#zan").text('');
                                    $("#zan").text("点赞"+data1.count);
                                }
                                });
                                });
                            })
                            </script>
                            <script>
                                function opendiv(){
									//alert('a');die();
									
								  $.ajax({
                                        url:"/comment/show/"+{{$AnswerList[$i]['answer_id']}},
                                        type:'get',
                                        dataType:'json',
                                        async:true,
                                        success:function(data){
											//alert(data);
											for(var i in data){
                                                for(var j in data[i]){
                                                   for(var k in data[i][j]){
														    $("#commentdiv{{$i}}").append(data[i][j][k]+"<br/>");
															
													}
                                                }
                                            }
											//$("#ckpl{{$i}}").off("click");
											
                                        },
                                        error:function(){
                                            alert('请求失败！');
                                        }
                                    });
                                }
                            </script>
                            <div id="addid{{$i}}" style="display:none;width:600px;">
											   <form  action="" method="post" onsubmit="return DoSubmit()" id="fid">
												<table border="0">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="ques_id" value="{{$QuestionList->id}}"/>
													<input type="hidden" name="answer_id" value="{{$AnswerList[$i]['answer_id']}}"/>
													<textarea name="comment_content" cols="95" rows="5" id='textarea'></textarea>
													<tr>
														<td align="right">
															<input type="submit" value="提交"/>
															<input type="reset" value="重置"/>
														</td>
													</tr>
												</table>
												</form>
							</div>
										<script>
										 //$('#addid').hide();
										 $(function () {
											 $("#pinglun{{$i}}").click(function () {
												 $("#addid{{$i}}").slideToggle();
											 });
										 });
										//$("#commentdiv").hide();
										$(function () {
											$("#ckpl{{$i}}").click(function () {
												$("#commentdiv{{$i}}").slideToggle();
												
											});
										});
							     </script>
                        </div>
						 @endfor
					</div>
                </div>
                
                <div class="wgt-silder-push mod-shadow">
                    <h2 class="hd line">
                        等您来答<a alog-alias="qb-silder-push-change" class="grid-r btn-silder-push ff-arial"
                               href="javascript:void(0);" id="silder-push-change">换一换</a>
                    </h2>
                    <ul alog-group="qb-push-que" class="bd list-34 line push-ul">
                        <li><span class="creat-time grid-r f-aid f-pening">1分钟前</span><a
                                    log="pms:newqb,pos:pushlist,page:qb-new,isRepler:replyNum,page_source:silder-push,index:0"
                                    href="https://zhidao.baidu.com/question/1737982105949360147.html?push=4&amp;group=0&amp;rpRecommand=c&amp;entry=qb_qb_answer"
                                    target="_blank" title="什么样的人不能考取机动车驾驶证？">什么样的人不能考取机动车驾驶证？...</a></li>
                    </ul>
                </div>
            </article>
            <aside class="grid-r qb-side del-qb-side">
                <div class="wgt-user-safe mod-shadow">
                    <div class="percent"><strong>59</strong>分</div>
                    <div class="explain">
                        你的账号安全评分低于<em>59%</em>的网友，可能有被盗号的风险。<a href="http://passport.baidu.com/center" target="_blank">点击查看&gt;&gt;</a>
                    </div>
                </div>
                <div class="wgt-newer-7days mod-shadow">
                    <div class="newer-bonus-wp wgt-newer-7days-box">
                        <div class="newer-bonus-wp-i">
                            <div class="newer-greet">
                                <p><em>2017年06月28日</em>，你首次在知道答题。每日答题，获取丰厚财富值奖励吧！</p>
                            </div>
                            <div class="newer-bonus-now clearfix">
                                <div class="newer-bonus grid">
                                    <div class="bonus-icon grid"></div>
                                    <div class="bonus-txt grid">
                                        <em data-bonus="250">250</em>
                                        <span>财富值</span>
                                    </div>
                                </div>
                                <div class="newer-bonus-btn grid-r">
                                    <a class="bonus-btn btn-32-disabled">答题后领取</a>
                                    <div class="bonus-bubble" style="display: none;">
                                        <p>恭喜你成功领取250财富值！</p>
                                        <p><a href="https://zhidao.baidu.com/shop/category?wealth=1" target="_blank">立即去财富商城消费&gt;&gt;</a>
                                        </p>
                                        <i class="ope-arrow-down"><em></em></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="desktop-save mod-shadow wgt-newer-7days-box clearfix">
                    <div class="grid">将<span class="zd-icon"></span>保存到桌面</div>
                    <a class="save-icon grid-r" href="http://img.iknow.bdimg.com/uhome/%E7%9F%A5%E9%81%93.url"
                       log="pid:102,type:2014,action:click,area:desktop,page:newer-7days"></a>
                </div>
                <div class="wgt-newer-guide">
                    <dl class="newer-guide">
                        <dt>新手上路</dt>
                        <dd>
                            <i class="iknow-qb_replyer_icons i-status-ask mr-5"></i>
                            <a href="http://tieba.baidu.com/p/3629741633" target="_blank"
                               log="pid:102,type:2014,action:click,area:guide,page:newer-guide">如何在百度知道答题</a>
                        </dd>
                        <dd>
                            <i class="iknow-qb_replyer_icons i-status-adopt mr-5"></i>
                            <a href="http://tieba.baidu.com/p/3615829242?pid=65420615204&amp;cid=0#65420615204"
                               target="_blank"
                               log="pid:102,type:2014,action:click,area:guide,page:newer-guide">如何获得用户采纳</a>
                        </dd>
                        <dd>
                            <i class="iknow-qb_replyer_icons i-status-wealth mr-5"></i>
                            <a href="http://tieba.baidu.com/p/3615827221?pid=65372921312&amp;cid=0#65372921312"
                               target="_blank" log="pid:102,type:2014,action:click,area:guide,page:newer-guide">知道财富值有什么用</a>
                        </dd>
                        <dd>
                            <i class="iknow-qb_replyer_icons i-status-friend mr-5"></i>
                            <a href="http://tieba.baidu.com/p/3615827221?pid=65372921312&amp;cid=0#65372921312"
                               target="_blank" log="pid:102,type:2014,action:click,area:guide,page:newer-guide">去哪里寻找一起答题的朋友</a>
                        </dd>
                    </dl>
                </div>
            </aside>
        </section>
    </div>
@endsection