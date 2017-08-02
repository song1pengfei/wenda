<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	  public function index()
    {
        return view("index");
    }
	public function uploadFile(Request $request)
   {
	   if($request->hasFile('file')){
		   $file = $request->file('file');
		   $disk = QiniuStorage::disk('qiniu');
		   $fileName = md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
		   $bool = $disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));
		   if($bool){
			   $path = $disk->downloadUrl('iwanli/image_'.$fileName);
			   return '上传成功，图片url:'.$path;
		   }
		   return '上传失败';
	   }
	   return '没有文件';
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
    public function destroy($id)
    {
        //
    }
}
