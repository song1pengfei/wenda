<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Login;
use App\Http\Controllers\Home\DB;
use Carbon\Carbon;
use App\Models\Admin\Log;
//use App\Models\Admin\Login;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$request->session()->put('first_url',$request->session()->get('_previous')['url']);
        return view('Home.login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     public function ob($object)
     {
         foreach($object as $key=>$value) {
             $array[$key] = $value;
         }
         
         return $array;
     }
     
    public function doLogin(Request $request)
    {
		//dd($request);
        
        //验证用户名与密码
		$email = $request ->input('login_email');
		$password = $request ->input('login_password');
		//从数据库查询信息
		$user = \DB::table("login")->where("login_email",$email)->get();
        //dump($user);
        //if($user['login_phone']==""){        
        $arr = $this->ob($user[0]);   
		$pas=$arr['login_password'];
        //}else{
            
        //}
        //dump($arr);
        //获取登录用户的id查询
        $id=$arr['id'];
        //$can = \DB::table("user")->where('id' , $id)->get();
        $logins=\DB::table("login")->where('id' , $id)->get();
        //echo Carbon::now();
        $far=$this->ob($logins[0]);
        $meng=$far['login_ip'];
        
        //dump($far);
        $LogAdmin = new Log;
        $LogAdmin->user_id = $id ;
        $LogAdmin->log_time = Carbon::now();
        $LogAdmin->log_ip =$meng;
        $LogAdmin->save();
        
		if(!empty($user)){
			//验证密码
			if(md5($password) == $pas){
				//$request->session()->push("adminuser",$user);
				session()->put("homeuser",$user);
				$url = $request->session()->get('first_url');
				$request->session()->forget('first_url');			
				return redirect("/");			
				//return redirect($url);			
			}
		}
   
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
    public function destroy($id)
    {
        //
    }
     public function logout(Request $request)
   {
       $data['logoff_time']=time();
       $data['user_id'] = 3;
       $data['log_ip'] = $_SERVER['REMOTE_ADDR']; 
       $id = \DB::table('log')->insertGetId($data);
        if($id>0){
       $request->session()->forget('homeuser');
        }
       return redirect("/");
   }
}
