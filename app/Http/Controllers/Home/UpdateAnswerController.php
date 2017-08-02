<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Question;
use App\Models\Home\User;
use App\Models\Home\Answer;
use App\Models\Home\Lanmu;
class UpdateAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Request $request, $id)
    {
		$list = Lanmu::all();
        $sessioninfo = $request->session()->get('homeuser');
	   //var_dump($id);die();
       $ques_id = Answer::where('id','=',$id)->value('ques_id');
	   $Answer = Answer::where('id','=',$id)->get();
	   $Question=Question::where('id','=',$ques_id)->get();
	   //echo "<pre>";
	   //var_dump($Answer);die();
	   return view('Home.reply.index',compact('list','sessioninfo','Answer','Question'));
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
        $inputs=Answer::find($id);	
        $inputs['answer_content']=$request->input('answer_content');
		$inputs['answer_time']=date("Y-m-d H:i:s",time());
		$inputs['ques_id']=$request->input('ques_id');
		$inputs['answer_ip']=$_SERVER['REMOTE_ADDR'];
		$inputs->update();
		
       $ques_id = Answer::where('id','=',$id)->value('ques_id');
	   $Answer = Answer::where('id','=',$id)->get();
	   $Question=Question::where('id','=',$ques_id)->get();
	   //echo "<pre>";
	   //var_dump($Answer);die();
	   return view('Home.reply.index',compact('list','sessioninfo','Answer','Question'));
		
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
