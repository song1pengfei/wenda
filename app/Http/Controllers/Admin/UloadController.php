<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;
class UploadController extends Controller
{
    /**
      *上传文件到七牛
      */
    public function uploadFile(Request $request)
    {
        //判断是否有文件上传
        if($request->hasFile('file')){
            //获取文件，file对应的是前端表上传input的name
            $file = $request->file('file');
            //$file = $request->file;
            //初始化
            $disk = QiniuStorage::disk('qiniu');
            //重命名文件
            $fileName =md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            //上传到七牛
            $bool=$disk->put('iwam/image_'.$fileName,file_get_comtents($file->getRealpath()));
            //判断是否上传成功
            if($bool){
                $path=$disk->downloadUrl('iwanli/image_',$fileName);
                return "上传成功,图片url:".$path;
            }
            return "上传失败";
        }
        return "没有文件";
    }
}