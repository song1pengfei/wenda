<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Register;
use App\Http\Controllers\Home\DB;
use Gregwar\Captcha\CaptchaBuilder;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Home.register.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
         //执行验证码判断
        $mycode = $request->input("code");
        $yanzhengma = $request->session()->get('phrase');
        if($mycode !== $yanzhengma){
            return back()->with("msg","验证码错误！".$mycode.":".$yanzhengma);
        }
        
        //获取注册页面的值
        $input=$request->only(['login_name','login_email','login_phone']);
        $input['login_time'] = date("Y-m-d H:i:s", time());
        $input['login_ip']=$request->getClientIp();        
        $password=$request->input('login_password');
        $input['login_password']=md5($password);
        $aa=\DB::table('login')->insertGetId($input);
        $data['login_id']=$aa;
        $id=\DB::table('user')->insertGetId($data);
        //dump($aa);die();
        if($aa>0){
            $info="注册成功！！";
        }else{
            $info="注册失败！！";
        }
        //return "ss";
        return redirect("home/login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCode()
    {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);	
        \Session::put('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
    }
    public function destroy($id)
    {
        //
    }
}
