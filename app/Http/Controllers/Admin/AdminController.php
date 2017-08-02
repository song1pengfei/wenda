<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use zgldh\QiniuStorage\QiniuStorage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=Admin::all();
         $list = Admin::paginate(5); 
        return view("admin/admin",["list"=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/adminadd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $InsertAdmin = new admin;
		$InsertAdmin->admin_name =$request->admin_name;
        $password=$request->admin_password;
		$InsertAdmin ->admin_password= md5($password);
         if($request->hasfile('admin_img')){
            //
            $file=$request->file('admin_img');
            $disk = QiniuStorage::disk('qiniu');
            $fileName=md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            $bool=$disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));
           
        }
       // if ($request->file('admin_img') && $request->file('admin_img')->isValid()) {
            //获取上传文件信息
          //  $file = $request->file('admin_img');
            //$ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
           // $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
          //  $file->move("./AdminUpload/",$filename);
       // }else{
            //闪存信息
           // return redirect('admin/adminadd')->with('status', '请选择上传文件!');
        //}
        $InsertAdmin ->admin_img =$fileName;
		$InsertAdmin ->admin_email =$request->admin_email;
		$InsertAdmin ->admin_phone =$request->admin_phone;
		$InsertAdmin ->admin_power =$request->admin_power;
		$InsertAdmin ->admin_first_time =$request->admin_first_time;
		$InsertAdmin->save();
		return redirect("admin/admin");
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
        $vo=Admin::where("id",$id)->first();
        return view("admin/adminedit",["vo"=>$vo]);
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
         //$input = $request ->only(["admin_name","admin_password","admin_img","admin_email","admin_phone","admin_power"]);
         //Admin::where("id","=",$id)->update($input);
        //return redirect("admin/admin");
        //$UpDateAdu = new Adu;
		$UpDateAdmin=Admin::find($id);
        //dd($UpDateAdmin);
        //dd($_FILES);
        //var_dump($UpDateAdmin);die();
        $UpDateAdmin->admin_name =$request->admin_name;
		$UpDateAdmin ->admin_password= $request ->admin_password;
		//var_dump($UpDateAdu ->adu_title);die();
        //dd($request->file('admin_img'));
         if($request->hasfile('admin_img')){
            //
            $file=$request->file('admin_img');
            $disk = QiniuStorage::disk('qiniu');
            $fileName=md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            $bool=$disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));

        }
		//if ($request->file('admin_img') && $request->file('admin_img')->isValid()) {
            //获取上传文件信息
          //  $file = $request->file('admin_img');
            //dd($file);
           // $ext = $file->extension(); //获取文件的扩展名
            //dd($ext);
            //随机一个新的文件名
            //$filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            //dd($filename);
            //$file->move("./AdminUpload/",$filename);
            //dd($filename);
        //}/* else{
            //闪存信息
            //return redirect('admin/admin')->with('status', '请选择上传文件!');
               //return $filename;
        
        //dd($filename);
        $ufile=$fileName;
        $UpDateAdmin ->admin_img=$ufile;
        $UpDateAdmin ->admin_email =$request->admin_email;
		$UpDateAdmin ->admin_phone =$request->admin_phone;
		$UpDateAdmin ->admin_power =$request->admin_power;
		$UpDateAdmin ->admin_first_time =$request->admin_first_time;
		//var_dump($bb);die();
		//$UpDateAdu->save();
	    //$input = $request ->only(["{$aa}","{$bb}"]);
		$UpDateAdmin->update();
		return redirect("admin/admin");
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
