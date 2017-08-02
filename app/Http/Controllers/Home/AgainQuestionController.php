<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Question;
use App\Models\Home\User;
use App\Models\Home\Answer;
class AgainQuestionController extends Controller
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
		$date = $request->session()->get('homeuser')->toArray();
		$a=[];
		foreach($date[0] as $v){
			$a[]=$v;
		}
		$requests['user_id'] =$a[0];
		//var_dump($request['user_id']);die();
        $requests['ques_id'] = $request->input('ques_id');
		$requests['lanmu_id']=$request->input('lanmu_id');
		$requests['ques_details']=$request->input('asktext');
		$requests['ques_ip']=$_SERVER['REMOTE_ADDR'];
		$requests['updated_at']=date("Y-m-d H:i:s",time());
		//var_dump($requests);die();
		$id=\DB::table("question")->insertGetId($requests);
		$again=Question::where('id','=',$id)->select('ques_details','updated_at')->get()->toJson();
		//echo "<pre>";
		//var_dump($again);die();
		return $again;
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = \Session::table('login');
		var_dump($session);die();
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
