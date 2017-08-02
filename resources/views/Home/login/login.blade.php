<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="{{asset('home/images/favicon.ico')}}">
	<link rel="stylesheet" href="{{asset('home/css/login.css')}}">
	<title>微博知道-欢迎登录</title>
</head>
<body>
	<div class="header">
		<div class="center">
			<div class="logo fl">
				<img src="{{asset('home/images/logo-zhidao.png')}}" alt="百度知道logo" class="fl">
				<div class="wel fl">欢迎登陆</div>
			</div>
			<div class="research fr">
				<a href="#" class="dp">登陆页面,问卷调查</a>
			</div>
		</div>
	</div>
	<div class="main">
		<div class="center">
			<div class="window fr" id="window">
				<div class="title" id="title">
					<div class="bor fl"></div>
					<div class="tit fl" style="color:red">
						登录百度知道
					</div>
				</div>
				<div class="item"></div>
             <form action="{{url('home/doLogin')}}" method="post">
				{{ csrf_field() }}
                <div class="item user" style="display:block">
					<div class="cen">
						<div class="col name">
							<div class="nameImg img fl"></div>
							<input type="text" class="fl" id="login_email" name="login_email" placeholder="邮箱"> <span id="nameInfo"></span>
						</div>
						<div class="col pwd">
							<div class="pwdImg img fl"></div>
							<input type="password" class="fl" id="login_password" name="login_password" placeholder="密码"> <span id="pwdInfo"></span>
						</div>
						<p class="fr">忘记密码</p>
						<button>登陆</button>
					</div>
				</div>
              </form>
				<div class="footer">
					<a href="#" class="ige qq dp">QQ</a>
					<!-- <div class="bor fl"></div> -->
					<a href="#" class="ige dp weixin">微信</a>
					<a href="{{url('home/register')}}" class="reg fr">立即注册</a>
				</div>
			</div>
		</div>
	</div>
    <br/><br/>
	<div class="footer">
		<div class="link">
			<a href="">网站声明</a><span>|</span><a href="">投诉中心</a><span>|</span><a href="">百度首页</a><span>|</span><a href="">网站声明</a><span>|</span><a href="">投诉中心</a><span>|</span><a href="">百度知道首页</a><span>|</span><a href="">网站声明</a><span>|</span><a href="">投诉中心</a><span>|</span><a href="">百度社区</a><span>|</span><a href="">百度公益</a><span>|</span><a href="">Baidu</a>
		</div>
		<div class="copyright">
			   Copyright © 1996-2017 Baidu Corporation
		</div>
	</div>
	<script src="{{asset('home/js/jquery-1.11.1/jquery.min.js')}}"></script>
	<script>
		$('#window .tit').click(function(){
			$('#window .tit').css('color','#656E6E');
			$(this).css('color','red');
			$('#window .item').hide();
			$('#window .item').eq($(this).index()).show();
		})
	</script>
	<script>
		var name = document.getElementById('name');
		var pwd = document.getElementById('pwd');
		var nameInfo = document.getElementById('nameInfo');
		var pwdInfo = document.getElementById('pwdInfo');
		name.onfocus = function(){
			alert(1);
		}
		name.onblur = function(){
			alert(1);
			if(name.value.match(/^[a-z0-9_-]{3,16}$/) || name.value.match(/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/) ){
				nameInfo.innerHTML = '用户名正确';
				nameInfo.className = 'ok';
			}else{
				nameInfo.innerHTML = '用户名格式错误';
				nameInfo.className = 'no';
			}
			}
	</script>
</body>
</html>