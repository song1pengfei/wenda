<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Admin\Notice;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      /* $list = notice::all();
	  $list = Notice::paginate(5); //5条每页浏览
	  var_dump($list);die();
      return view("admin.notice",['list'=>$list]); */
      $db = \DB::table("notice");
		$where=[];
		if($request->has('notice_title')){
			$notice_title=$request->input('notice_title');
			//var_dump($notice_title);die();
			$db->where('notice_title',"like","%{$notice_title}%");
			$where['notice_title']=$notice_title;
			//var_dump($where['notice_title']);die();
		}
		$list = $db->paginate(5); //常规分页
		return view("admin.notice",['list'=>$list,'where'=>$where]);	  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.addnotice");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//var_dump($request);die();
		//var_dump($request->notice_title);die();
        $InsertNotice = new Notice;
		//$stu->name = $request->name;
		$InsertNotice ->notice_title =$request->notice_title;
		$InsertNotice ->notice_content = $request ->notice_content;
		$InsertNotice ->notice_time =$request->ntime;
		$InsertNotice->save();
		//return redirect()->action('NoticeController@index');
		return redirect("admin/notice");
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
        $list = notice::where("id",$id)->first();
		//echo "<pre>";
		//var_dump($list);die();
		return view("admin.editnotice",['list'=>$list]);
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
        $input = $request ->only(["notice_title","notice_content","notice_time"]);
		notice::where("id","=",$id)->update($input);
		return redirect("admin/notice");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		//var_dump($id);
        Notice::where("id","=",$id)->delete();
		return redirect('admin/notice');
    }
}
