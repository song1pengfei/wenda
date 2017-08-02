<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
    //加载登陆界面
    public function login()
    {
        return view('admin.login');
    }
    
    //执行登陆判断
    public function doLogin(Request $request)
	{
		//先验证验证码
		//获取验证码
		$mycode = $request ->input('mycode');
		$code = $request -> session() ->get('phrase');
		
		if($mycode !== $code){
			return back()->with("msg","验证码错误!");
		}
		//验证用户名与密码
		$email = $request ->input('email');
		$password = $request ->input('password');
		//从数据库查询信息
		$user = \DB::table("admin")->where("admin_email",$email)->first();
		//var_dump($user);die;
		if(!empty($user)){
			//验证密码
			if(md5($password) == $user->admin_password){
				//$request->session()->push("adminuser",$user);
				session()->put("adminuser",$user);
				//var_dump(session());
				return redirect("admin");
			}
		}
	   return back() -> with("msg","用户名或密码错误！");	
	}
    
    //执行退出
    
    
    //验证码加载
    public function getCode()
	{
		$builder = new CaptchaBuilder();
        $builder->build(150,32);	
        \Session::put('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
	}
     public function logout(Request $request)
   {
       $request->session()->forget('adminuser');
       return redirect("admin/login");
   }
    

}



