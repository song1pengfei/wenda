<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Http\Controllers\Home\DB;
use zgldh\QiniuStorage\QiniuStorage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=User::all();
         $list = User::paginate(5); 
         return view("admin/user",["list" => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/useradd");
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vo=User::where("id",$id)->first();
        return view("admin/useredit",["vo"=>$vo]);
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
       $UpDateUser=User::find($id);
        $UpDateUser->user_name =$request->user_name;
		$UpDateUser ->user_sex= $request ->user_sex;
        if($request->hasfile('user_img')){
            //
            $file=$request->file('user_img');
            $disk = QiniuStorage::disk('qiniu');
            $fileName=md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            $bool=$disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));
        }
		//if ($request->file('user_img') && $request->file('user_img')->isValid()) {
            //获取上传文件信息
            //$file = $request->file('user_img');
            //$ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            //$filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
          //  $file->move("./UserUpload/",$filename);
        //}
        //$unfile=$fileName;
        $UpDateUser ->user_img=$fileName;
        $UpDateUser ->user_address =$request->user_address;
		$UpDateUser ->user_age=$request->user_age;
		$UpDateUser->update();
		return redirect("admin/user");
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
