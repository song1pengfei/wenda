<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;
class UploadController extends Controller
{
    /**
      *�ϴ��ļ�����ţ
      */
    public function uploadFile(Request $request)
    {
        //�ж��Ƿ����ļ��ϴ�
        if($request->hasFile('file')){
            //��ȡ�ļ���file��Ӧ����ǰ�˱��ϴ�input��name
            $file = $request->file('file');
            //$file = $request->file;
            //��ʼ��
            $disk = QiniuStorage::disk('qiniu');
            //�������ļ�
            $fileName =md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            //�ϴ�����ţ
            $bool=$disk->put('iwam/image_'.$fileName,file_get_comtents($file->getRealpath()));
            //�ж��Ƿ��ϴ��ɹ�
            if($bool){
                $path=$disk->downloadUrl('iwanli/image_',$fileName);
                return "�ϴ��ɹ�,ͼƬurl:".$path;
            }
            return "�ϴ�ʧ��";
        }
        return "û���ļ�";
    }
}