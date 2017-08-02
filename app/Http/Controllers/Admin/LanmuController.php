<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Lanmu;


class LanmuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$list = Lanmu::all();
        return view("admin.lanmu",["list"=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.lanmuadd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 //执行添加
    public function store(Request $request)
    {
		$lanmu = new Lanmu;
		$lanmu->column_type = $request->column_type;
		//var_dump($request->column_type);die();
		$res = $lanmu->save();
		if($res !== false){
			echo '数据添加成功！';
		}else{
			echo '数据添加失败！';
		}
		
		//return redirect("admin.lanmu");
		
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
		$a = Lanmu::where("id",$id)->first();
        return view("admin.lanmuedit",["vo" => $a]);
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
		$input = $request->only(["column_type"]);
		
		$res = Lanmu::where("id",$id)->update($input);
		
		//print_r($res);die();
		if($id>0){
			return redirect("admin/lanmu");
		}else{
			return back()->with("err","修改失败!");
		}
	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lanmu::where('id',$id)->delete($id);
		return redirect("admin/lanmu"); 
    }
}
