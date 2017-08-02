<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \DB;
use App\Models\Home\Question;
use App\Models\Home\User;
use App\Models\Home\Answer;
use App\Models\Home\Login;
use App\Models\Home\Comment;
class GerenController extends Controller
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
            //echo "<pre>";
            //var_dump($array);
         return $array;
        }
         
     }
    public function index(Request $request)
    {
		//$date = $request->session()->get('homeuser');
		$date = $request->session()->get('homeuser')->toArray();		
		$a=[];
		$b=null;
		$b = $date[0]->id;
		//我的历程
		//回答
		$AnswerProgress = Answer::where('user_id',$b)->orderBy('answer_time','desc')->get()->toArray();
		//$firsttime=strtotime($AnsweProgress);
		//评论
		$CommentProgress = Comment::where('user_id',$b)->orderBy('comment_time','desc')->get()->toArray();
		//$secondtime=strtotime($CommentProgress);
		//echo "<pre>";
		//var_dump($AnsweProgress);die();
		foreach($date[0] as $v){
			$a[]=$v;
			
		}
		 
		//我的回答开始
		$login_id =$a[0];//7
		//var_dump($login_id);die();
		$User_id=User::where('login_id','=',$login_id)->value('id');//8
		//var_dump($User_id);die();
		//$Answer_ques_id=Answer::where('user_id','=',$login_id)->value('ques_id');
		//获取当前用户名回答的问题的id
		$Ques_id=[];
		$Answer=Answer::where('user_id','=',$login_id)->orderBy('answer_time','desc')->get()->toArray();
		foreach($Answer as $vv){
			$Ques_id[] = $vv['ques_id'];
		}
		//var_dump($Ques_id);die();
	    $MeQuestion=[];
		for($i=0;$i<count($Ques_id);$i++){
			$MeQuestion[]=Question::where('id','=',$Ques_id[$i])->orderBy('updated_at','desc')->get()->toArray();
		}
		$Questionarray=[];
		foreach($MeQuestion as $v){
			$Questionarray[]=$v[0];
		}
		//echo  "<pre>";
		//var_dump($Questionarray);die();
		//我的回答结束
		//个人信息开始
        $name = session("homeuser");
        $aname = $this->ob($name);
        $user = $this->ob($aname[0]);
        $id=$user['id'];
        $all=\DB::table('user')->where('login_id' , $id)->get(); 
        //dd($all);
        $no=$this->ob($all);
        $meng=$this->ob($no[0]);
		//个人信息结束
		//我的问题开始
        //$quesinfo=Question::where('user_id',$id)->latest('updated_at')->get();
        $quesinfo=Question::where('user_id',$id)->orderBy('updated_at','asc')->get()->toArray();
		//echo "<pre>";
		//var_dump($quesinfo);die();
		$quesinfo_ques_id=Question::where('user_id',$id)->value('ques_id');
		$QuesAnswer=Answer::where('ques_id',$quesinfo_ques_id)->orderBy('answer_time','asc')->get()->toArray();

		//我的问题结束
        return view('home.answer.index',compact('sname','meng','Question','Answer','quesinfo','user','QuesAnswer','Questionarray','AnswerProgress','CommentProgress'));
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
