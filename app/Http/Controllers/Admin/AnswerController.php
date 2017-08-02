<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Answer;
use DB;

class AnswerController extends Controller
{
    public function index()
    {
        //分页
        $list = answer::all();
        $list = Answer::paginate(5); //5条每页浏览
        //加载模板
        return view("admin.answer",['list'=>$list]);
    }

    //加载修改页面
    public function edit($id)
    {
        $answer = \DB::table("answer")->where("id",$id)->first(); //获取要编辑的信息
        return view("admin.answer_add",["v"=>$answer]);
    }

    //执行修改
    public function update($id,Request $request)
    {
        $UpDateAnswer=Answer::find($id);
        $UpDateAnswer ->answer_state =$request->answer_state;
        //var_dump($UpDateAdu ->adu_title);die();
        if ($request->file('answer_img') && $request->file('answer_img')->isValid()) {
            //获取上传文件信息
            $file = $request->file('answer_img');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./AnswerUpload/",$filename);
        }else{
            //闪存信息
            return redirect('admin/answertianjia')->with('status', '请选择上传文件!');
        }
        $UpDateAnswer->answer_img=$filename;
        $UpDateAnswer->update();
        return redirect("admin/answer");
    }

    public function create()
    {
        return view("admin/answertianjia");
    }

    //答案执行添加
    public function store(Request $request)
    {
        $InsertAnswer = new answer;
        if($request->answer_content="") {
            return "请输入后再提交";
        }else{
            $InsertAnswer->answer_content = $request->answer_content;
        }
        //判断是否是一个有效上传文件
        if ($request->file('answer_img') && $request->file('answer_img')->isValid()) {
            //获取上传文件信息
            $file = $request->file('answer_img');
            $ext = $file->extension(); //获取文件的扩展名
            //随机一个新的文件名
            $filename = time().rand(1000,9999).".".$ext;
            //移动上传文件
            $file->move("./AnswerUpload/",$filename);
        }else{
            //闪存信息
            return redirect('admin/answertianjia')->with('status', '请选择上传文件!');
        }
        $InsertAnswer ->answer_img =$filename;
        //var_dump($InsertAdu->adu_img);die();
        $InsertAnswer->save();
        return redirect("admin/answer");

        //$answer_content = $request->input('answer_content');
        //DB::insert('insert into answer (answer_content) values (?)',[$answer_content]);
        //return redirect("admin/answer");
    }

    //执行删除
    public function destroy($id)
    {
        DB::delete('delete from answer where id = ?',[$id]);
        return redirect('admin/answer');
    }
}
