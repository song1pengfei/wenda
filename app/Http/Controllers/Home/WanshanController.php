<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;

use \DB;
use zgldh\QiniuStorage\QiniuStorage;

class WanshanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function ob($object)
    {
        if(!empty($object)){
            foreach($object as $key=>$value) {
                $array[$key] = $value;
            }
         
         return $array;
        }
         
     }
     
    public function index()
    {
        $name = session("homeuser");
        //dump($name);
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $login_id = $sname['id'];
        return view('home.wanshan.wanshan',compact('login_id'));
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
        $InsertUser=new user;
        $InsertUser ->login_id=$request->login_id;
		$InsertUser ->user_name= $request ->user_name;
		$InsertUser ->user_sex =$request->user_sex;
         if ($request->file('user_img') && $request->file('user_img')->isValid()) {
            //获取上传文件信息
            $file = $request->file('user_img');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./UserUpload/",$filename);
        }else{
            //闪存信息
            return redirect('admin/useradd')->with('status', '请选择上传文件!');
        }
		$InsertUser ->user_img =$filename;
		$InsertUser ->user_address =$request->user_address;
		$InsertUser ->user_age =$request->user_age;
		$InsertUser->save();
		return redirect("home/geren");
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
        $user = \DB::table('user')->where('login_id',$id)->first();
        //dd($user);
        return view('home.wanshan.wanshan',compact('user'));
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
       $data = $request->only('user_name','user_address','user_img','user_age','user_sex');
        
        if($request->hasfile('user_img')){
            //
            $file=$request->file('user_img');
            $disk = QiniuStorage::disk('qiniu');
            $fileName=md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            $bool=$disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));
        }
        $data['user_img'] = $fileName;
        /*
		if ($request->file('user_img') && $request->file('user_img')->isValid()) {
            //获取上传文件信息
            $file = $request->file('user_img');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./UserUpload/",$filename);
        }
        */
        $res = \DB::table('user')->where('login_id',$id)->update($data);
        //dd($res);
        if($res>0){
            return redirect("home/geren");
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
        //
    }
}
