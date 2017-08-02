<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Adu;
use App\Org\Image;
use zgldh\QiniuStorage\QiniuStorage;
class AduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Adu::all();
		$list = Adu::paginate(5); //5条每页浏览
		return view("admin.adu",['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.addadu");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $InsertAdu = new Adu;
		$InsertAdu ->adu_title =$request->adu_title;
		//判断是否是一个有效上传文件
        /*if ($request->file('ufile') && $request->file('ufile')->isValid()) {
            //获取上传文件信息
            $file = $request->file('ufile');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
			//移动上传文件
            $file->move("./AduUpload/",$filename);
			//进行图片缩放
			$sfilename=Image::imageResize($filename,"./AduUpload/",100,100,"s_");
        }else{
            //闪存信息
            return redirect('admin/addadu')->with('status', '请选择上传文件!');
        }*/
		if($request->hasfile('ufile')){
			//接收的图片名
			$file=$request->file('ufile');
			//接入七牛云
			$disk = QiniuStorage::disk('qiniu');
			//获取图片名
            $fileName=md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
			//图片推入七牛云
            $bool=$disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));
			if($bool){
				//获取存储路径
                $path=$disk->downloadUrl('iwanli/image_'.$fileName);
				//插入数据库
				$InsertAdu->adu_img=$fileName;
		        //var_dump($InsertAdu->adu_img);die();
				//保存或更新
		        $InsertAdu->save();
		        return redirect("admin/adu");
                //return "上传成功，图片url:$path";

            }else{
				return redirect('admin/addadu')->with('status', '请选择上传文件!');
			}
            
	}
		/* $InsertAdu->adu_img=$filename;
		//var_dump($InsertAdu->adu_img);die();
		$InsertAdu->save();
		return redirect("admin/adu"); */
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $AduBigImage = Adu::find($id);
		return view('Admin.AduBigImage',['list'=>$AduBigImage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Adu::where("id",$id)->first();
		return view("admin.editadu",['list'=>$list]);
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
		//$UpDateAdu = new Adu;
		$UpDateAdu=Adu::find($id);
		$UpDateAdu ->adu_title =$request->adu_title;
		//var_dump($UpDateAdu ->adu_title);die();
		if ($request->file('UploadImg') && $request->file('UploadImg')->isValid()) {
            //获取上传文件信息
            $file = $request->file('UploadImg');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./AduUpload/",$filename);
        }else{
            //闪存信息
            return redirect('admin/addadu')->with('status', '请选择上传文件!');
        }
        $UpDateAdu->adu_img=$filename;
		//var_dump($bb);die();
		//$UpDateAdu->save();
	    //$input = $request ->only(["{$aa}","{$bb}"]);
		$UpDateAdu->update();
		return redirect("admin/adu");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //var_dump($id);
        Adu::where("id","=",$id)->delete();
		return redirect('admin/adu');
    }
}
