<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = comment::all();
		$db = \DB::table("comment");
		$where=[];
		if($request->has('comment_ip')){
			$comment_ip=$request->input('comment_ip');
			$db->where('comment_ip',"like","%{$comment_ip}%");
			$where['comment_ip']=$comment_ip;
		}
       
       // $list = $db->get(); //获取全部
       $list = $db->orderBy("id",'asc')->paginate(1);
        return view("admin.comment", ['list' => $list,'where'=>$where]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Comment::where('id','=',$id)->first();
		return view('Admin.editcomment',['list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->only(['user_id','answer_id','ques_id','comment_ip','comment_id','comment_content','comment_state']);
		//var_dump($input);die();
		$input['comment_time']=date("Y-m-d H:i:s",time());
        $id = Comment::where("id",$id)->update($input);
		return redirect("admin/comment");
		 /* $this->validate($request, [
            'account' => 'required|max:16',
            'pass' => 'required|max:20|min:6',
        ]);
        
        //$db = new Adminer;
         $db->account=$request->account;
        $aa=$request->pass;
        $db->pass = md5($aa);
        $db->save(); 
        
        
        //获取指定的部分数据
        $data = $request->only("account","pass");
        $data['pass'] = md5($data['pass']);
        $data['addtime']=date("Y-m-d H:i:s",time());
        //$db = new Adminer;
      
        $aa =Adminer::insertGetID($data); 
        
        $InsertNotice ->account =$request->account;
		$InsertNotice ->pass = $request ->pass;
		$InsertNotice->addtime=date("Y-m-d H:i:s",time());
		$InsertNotice->save(); */
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where("id","=",$id)->delete();
		return redirect('admin/comment');
    }
}
