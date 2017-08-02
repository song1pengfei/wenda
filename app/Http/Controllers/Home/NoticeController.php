<?php

namespace App\Http\Controllers\Home;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Notice;
use App\Models\Home\Lanmu;
use Illuminate\Support\Facades\Redis;

class NoticeController extends Controller
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
        $allClick = Redis::get("click");
		return view('home.notice.notice',['click' => $allClick],compact('list','usname'));
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
		$name = session("homeuser");
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
		$list = Lanmu::all();
		//单条数据
        $single = Notice::find($id);
		return view('Home.notice.notice',compact('list','usname','list','single'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //var_dump($id);
        Notice::where("id","=",$id)->delete();
		return redirect('admin/notice');
    }
}
