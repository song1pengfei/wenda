<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Answer;
use App\Models\Home\Question;
use App\Models\Home\User;
use App\Models\Home\Lanmu;
use Illuminate\Support\Facades\View;
use App\Models\Home\Comment;

class CommentController extends Controller
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
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
        $list = Lanmu::all();
		$QuestionList = Question::find(1);
		$AnswerList = Answer::find(1);
		$AnswerUser=$AnswerList->user_id;
		$UserList=User::where('id','=',$AnswerUser)->get();
		//var_dump($UserList);die();
        return view('home.detail.detail',compact('list','QuestionList','AnswerList','UserList','usname'));
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
		$date = $request->session()->get('homeuser')->toArray();
		$a=[];
		foreach($date[0] as $v){
			$a[]=$v;
		}
		$datas['user_id'] =$a[0];
		$datas['comment_content'] = $request->input('comment_content');
		//var_dump($datas['comment_content']);die();
		$datas['ques_id'] = $request->input('ques_id');
		$datas['answer_id'] = $request->input('answer_id');
		$datas['comment_ip']=$_SERVER['REMOTE_ADDR'];
		$datas['comment_time']=date("Y-m-d H:i:s",time());
		if(!empty($datas['comment_content'])){
			$words = array('我曹','我日','你妹');    
			$badword = "/".implode("|",$words)."/i";			
			if(preg_match($badword,$datas['comment_content'])){
			    $datas['comment_state']=0;
				   $id = \DB::table("Comment")->insertGetId($datas);
				\DB::table("comment")->where("id",$id)->update(['comment_id' => $id]);
                //return "不能带有敏感词！";
                return json_encode("请文明用语!");				
			}else{ 
			    $datas['comment_state']=1;
				   $id = \DB::table("Comment")->insertGetId($datas);
				\DB::table("comment")->where("id",$id)->update(['comment_id' => $id]);
                $userinfo=User::where('login_id',$a[0])->get()->toArray();//user表的信息
				//$inte=User::where('login_id',$login_id)->value('user_inte');//数值
				$inte=$userinfo[0]['user_inte'];
				//$userinfo[0]['user_inte']=$inte++;
				$user_inte=$inte+1;
				$inputs['user_inte']=$user_inte;		
				//var_dump($user_inte);die();
				User::where('login_id',$a[0])->update($inputs);				
			}
		}
		//var_dump($datas);die();
		//$CommentMessage = Comment::where('id','=',$id)->get()->toArray();
		$CommentMessage = Comment::where('id','=',$id)->select('comment_content','comment_time')->get()->toJson();
		return $CommentMessage;
		//var_dump($CommentMessage);die();
		  /* if(is_array($CommentMessage)){
			echo "aaaa";
		}else{
			echo  "bbb";
		   }   */
		   /* foreach($CommentMessage as $message){
			   if($message['comment_state'] == 0){
			        return "不能带有敏感词";
		          }
		       if($message['comment_state'] == 1){
				   $returnmessage=$message['comment_content'];
			       return $returnmessage;
		          } 
		   } */
		  /* if($CommentMessage['comment_state'] == 0){
			return "不能带有敏感词";
		}
		if($CommentMessage->['comment_state'] == 1){
			return $CommentMessage;
		}   */
		//var_dump($CommentMessage);die();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		//$CommentList= Comment::where('answer_id','=',$id)->select("","comment_content")->get()->toJson(); 
		$CommentList= Comment::where('answer_id','=',$id)->select("user_id")->get()->toArray();
		$CommentMessage=[];
		foreach($CommentList as $v){
			//$CommentMessage['name']=User::where('id','=',$v['user_id'])->select('user_name')->get()->toArray();//查看谁评论的，暂时出问题了							
			$CommentMessage[]=Comment::where('user_id','=',$v['user_id'])->where('comment_state','=','1')->select('comment_content','comment_time')->get()->toArray();							
		}
		//$CommentMessage[]=Comment::where('answer_id','=',$id)->select("comment_content","comment_time")->get()->toArray();
		//echo "<pre>";
		//var_dump($CommentMessage);die();
		  /*  if(count($CommentMessage == count($CommentMessage, 1))){
              echo '一维';
        }else{
             echo '二维';
          } */
		return $CommentMessage;
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
