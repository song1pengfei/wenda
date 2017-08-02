<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Question;

class QuestionController extends Controller
{
    public function index()
    {
        //$list=Question::all();
        $list =Question::whereColumn('id','ques_id')->paginate(5); 
        return view("admin/question",["list"=>$list]);
    }

    public function edit($id)
    {
        $vo=Question::where("id",$id)->first();
       
        return view("admin.questionedit",["vo"=>$vo]);
    }
    
    public function update(Request $request, $id)
    {
		$input = $request->only(["ques_state","ques_note"]);
		
		$id = Question::where("id",$id)->update($input);
		
		//print_r($res);die();
		if($id>0){
			return redirect("admin/question");
		}else{
			return back()->with("err","修改失败!");
		}
	
    }


}
