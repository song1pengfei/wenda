<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Answer;
use App\Models\Home\Question;
use App\Models\Home\Lanmu;
use Illuminate\Support\Facades\View;
use App\Models\Home\Comment;
use App\Models\Home\User;
use Illuminate\Support\Facades\Redis;


class AnswerController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = session("homeuser");
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
        $list = Lanmu::all();

		//获取问题
		/* $QuestionList = Question::find($id);
		$QuestionUser=$QuestionList->user_id; */
		//var_dump($QuestionUser);die();
		//$QuestionUserName=User::where('id','=',$QuestionUser)->get();
		//var_dump($QuestionUserName);die();
		//获取回答
		//$AnswerList=Answer::where('ques_id','=',$id)->get();
		//var_dump($AnswerList);die();
		/* $AnswerList = Answer::find($id);
		$AnswerUser=$AnswerList->user_id;
		$UserList=User::where('id','=',$AnswerUser)->get(); */
		//var_dump($UserList);die();
        //return view('home.detail.detail',compact('list','QuestionList','AnswerList','UserList','QuestionUserName','usname'));
        return view('home.detail.detail',compact('list','usname'));
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
		if(empty(session("homeuser"))){
			return redirect("home/login");
		}
		$date = $request->session()->get('homeuser')->toArray();
		$a=[];
		foreach($date[0] as $v){
			$a[]=$v;
		}
		//var_dump($a);die();
		$datas['answer_content'] = $request->input('answer_content');
		$datas['ques_id'] = $request->input('ques_id');
		$datas['user_id'] =$a[0];
		$datas['answer_ip']=$_SERVER['REMOTE_ADDR'];
		$datas['answer_time']=date("Y-m-d H:i:s",time());
		if(!empty($datas['answer_content'])){
			$words = array('我曹','我日','你妹');    
			$badword = "/".implode("|",$words)."/i";			
			if(preg_match($badword,$datas['answer_content'])){
			    $datas['answer_state']=0;
				    $id = \DB::table("answer")->insertGetId($datas);
				\DB::table("answer")->where("id",$id)->update(['answer_id' => $id]);
				return json_encode("请文明用语!");
             }else{ 
			    $datas['answer_state']=1;
				    $id = \DB::table("answer")->insertGetId($datas);
				\DB::table("answer")->where("id",$id)->update(['answer_id' => $id]);
								
			}
		}
		        
		        //获取回答
		        $userinfo=User::where('login_id',$a[0])->get()->toArray();//user表的信息
				//$inte=User::where('login_id',$login_id)->value('user_inte');//数值
				$inte=$userinfo[0]['user_inte'];
				//$userinfo[0]['user_inte']=$inte++;
				$user_inte=$inte+1;
				$inputs['user_inte']=$user_inte;		
				//var_dump($user_inte);die();
				User::where('login_id',$a[0])->update($inputs);
                $AnswerList = Answer::where('id','=',$id)->select('answer_content','answer_time')->get()->toJson();
                return $AnswerList;
		
		 
        
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $click = Redis::get("click");
		$name = session("homeuser");
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
        $list = Lanmu::all();
        //获取问题
		$QuestionList = Question::find($id);
		$QuestionUser=$QuestionList->user_id;
		//var_dump($QuestionUser);die();
		//获取提问者信息
		$QuestionUserName=User::where('id','=',$QuestionUser)->get();
		//var_dump($QuestionUserName);die();
		//var_dump($CommentList);die();
		//获取回答
		$AnswerList=Answer::where('ques_id','=',$id)->where('answer_state','=','1')->orderBy('answer_time','desc')->get()->toArray();
		//echo "<pre>";
		//var_dump($AnswerList);die();
		//$UserList[]=User::where('id','=',$arr)->first();
	    $arr=[];
		foreach($AnswerList as $v){
			if($v['ques_id']==$id){
				$arr[]=$v['user_id'];
			}
		}
		    for($i=0;$i<count($arr);$i++){
			$UserList[]=User::where('id','=',$arr[$i])->value("user_name");
		}

		  //echo "<pre>";
		 //var_dump($ComList);die();
		/*var_dump($arr);die();
		   if(is_array($UserList)){
			echo "aaa";
		}else{
			echo "bb";
		}   */
		  /* if(count($UserList == count($UserList, 1))){
              echo '一维';
        }else{
             echo '二维';
          }
		die();  */
		//var_dump($AnswerList);die();
		//$AnswerList = Answer::find($id);
		/* $AnswerUser=$AnswerList->user_id;
		$UserList=User::where('id','=',$AnswerUser)->get(); */
		//var_dump($UserList);die();

        return view('home.detail.detail',compact('list','usname','ComList','QuestionList','AnswerList','UserList','QuestionUserName','click'));
    }

    public function isLike()
    {
        $click = Redis::get("click");
        if ($click) {
            Redis::set("click", 0);
            //return "点赞成功";
            return ['status' => 0,'msg'=> '点赞成功','count' => 0];
        } else {
            Redis::set("click", 1);
            //return "取消点赞";
            return ['status' => 1,'msg'=> '取消点赞', 'count' => 1];
        }
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
