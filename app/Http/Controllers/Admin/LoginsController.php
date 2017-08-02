<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Models\Admin\Login;

//use App\Http\Controllers;

class LoginsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=Login::all();
        $list = Login::paginate(5); 
        return view("admin/logins",["list" => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/loginadd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump($request->getClientIp());
        die;
        $InsertLogin = new Login;
		$InsertLogin->login_name =$request->login_name;
		$InsertLogin ->login_email= $request ->login_email;
		$InsertLogin ->login_phone =$request->login_phone;
		$InsertLogin ->login_password =$request->login_password;
		$InsertLogin ->login_time =$request->Login_time;
		$InsertLogin->login_ip =$request->getClientIp();
        //var_dump($_SERVER["REMOTE_ADDR"]);
		$InsertLogin->save();
		//return redirect("admin/logins");
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
        //$vo = \DB::table("Login")->where("id",$id)->first(); //获取要编辑的信息
        $vo =Login::where("id",$id)->first(); //获取要编辑的信息
        //var_dump($loginedit);
       return view("admin/loginedit",["vo"=>$vo]);
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
        $input = $request ->only(["login_name","login_email","login_phone","login_password","login_ip"]);
        Login::where("id","=",$id)->update($input);
        return redirect("admin/logins");
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
}
