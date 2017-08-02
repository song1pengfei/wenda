<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Question;
use App\Models\Home\Lanmu;
use App\Models\Home\Answer;
use App\Models\Home\User;
use zgldh\QiniuStorage\QiniuStorage;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
		$lan = Lanmu::all();
        $data = $request->session()->get('homeuser');
        if($data==false){
            return view('home.login.login');
        }
        //echo "<pre>"; print_r($data);die;
        return view('home.question.index',['sessioninfo'=>$data],['lan'=>$lan]);
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
        
        $input=$request->all();
        unset($input['_token']);
        //unset($input['file']);
        unset($input['ufile']);
		
        /*
        //判断是否有文件上传
        if($request->hasfile('ufile')){
            //获取文件，file对应的是前端表单上传input的name
            $file=$request->file('ufile');
            //Laravel5.3中多了一个写法
            //$file=$request->file;
            
            //初始化
            $disk = QiniuStorage::disk('qiniu');
            //重命名文件
            $fileName=md5($file->getClientOriginalName().time().rand()).'.'.$file->getClientOriginalExtension();
            //上传到七牛
            $bool=$disk->put('iwanli/image_'.$fileName,file_get_contents($file->getRealPath()));
            //判断是否上传成功
            if($bool==false){
                //$input['ques_img']=$disk->downloadUrl('iwanli/image_'.$fileName);
                //return "上传成功，图片url:$path";
                return "上传失败";
            }
            $path=$disk->downloadUrl('iwanli/image_'.$fileName);
        }
        */
      
            //判断是否是一个有效上传文件
          if ($request->file('ufile') && $request->file('ufile')->isValid()) {
            //获取上传文件信息
            $file = $request->file('ufile');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./upload/",$filename);
                                
            $input['ques_img']=$filename;
           
        }
        
        $ques_ip=$_SERVER["REMOTE_ADDR"];
        $input['ques_ip']=$ques_ip;
        $data = $request->session()->get('homeuser');
        $input['user_id']=$data[0]->id;
		//var_dump($input['user_id']);die();
        $b=strlen($input['ques_title']);
        if($b<10 || $b>98 ){
            return redirect('#');
        }else{
        $ques_id = \DB::table('question')->insertGetId($input);
        $login_id=Question::where('id','=',$ques_id)->value('user_id');//登录表的id号
		$userinfo=User::where('login_id',$login_id)->get()->toArray();//user表的信息
		//$inte=User::where('login_id',$login_id)->value('user_inte');//数值
		$inte=$userinfo[0]['user_inte'];
		//$userinfo[0]['user_inte']=$inte++;
        $user_inte=$inte+1;
        $inputs['user_inte']=$user_inte;		
		//var_dump($user_inte);die();
		User::where('login_id',$login_id)->update($inputs);
        Question::where("id",$ques_id)->update(['ques_id' =>$ques_id]);

        //return "添加成功！ques_id号".$ques_id; 
        return redirect('/home/question/'.$ques_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {   
        $list = Lanmu::all();
        $sessioninfo = $request->session()->get('homeuser');
        //var_dump($id);die();
        $data=Question::where('ques_id','=',$id)->orderBy('updated_at','asc')->get()->toArray();
		//echo "<pre>";
		//var_dump($data);die();
        $answerinfo=Answer::where("ques_id",'=',$id)->orderBy('answer_time','asc')->select('user_id','answer_content','answer_time')->get()->toArray();
        /* $userinfo=[];
		for($i=0;$i<count($answerinfo);$i++){
			$userinfo[]=User::where('id',$answerinfo[$i]['user_id'])->value('user_name');
			var_dump($userinfo);die();
		} */
        return view('home.question.deta',compact('data','list','sessioninfo','answerinfo'));
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
        $list = Lanmu::all();
        $sessioninfo = $request->session()->get('homeuser');
        $input = $request->only(['ques_details','ufile']);   //获取所有参数信息
         unset($input['ufile']);
            //判断是否是一个有效上传文件
          if ($request->file('ufile') && $request->file('ufile')->isValid()) {
            //获取上传文件信息
            $file = $request->file('ufile');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./upload/",$filename);
                                
            $input['ques_img']=$filename;
           
        }
        
        Question::where("id",$id)->update($input);
       $data=Question::where('id','=',$id)->get()->toArray();
      // echo "<pre>";
       //var_dump($data);die;
        $answerinfo=Answer::where([["ques_id",$data[0]['ques_id']],["answer_state",'1']])->select('user_id','answer_content','answer_time')->get();
        for($i=0;$i<count($answerinfo);$i++){
            $userinfo[]=User::where('id',$answerinfo[$i]['user_id'])->value('user_name');
         }
        return view('home.question.deta',compact('data','list','sessioninfo','answerinfo','userinfo'));
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
