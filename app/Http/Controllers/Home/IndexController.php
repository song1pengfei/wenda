<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Home\Notice;
use App\Models\Home\Lanmu;
use App\Models\Home\Adu;
use App\Models\Home\Login;
use App\Models\Home\User;
use \DB;

class IndexController extends Controller
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
     
     public static function objectToArray($e)
    {
        $e = (array)$e;
        foreach ($e as $k => $v) {
            if (gettype($v) == 'resource') return;
            if (gettype($v) == 'object' || gettype($v) == 'array')
                $e[$k] = (array)self::objectToArray($v);
        }

        return $e;
    }
     
     
    public function index()
    {
        $name = session("homeuser");
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
        //获取两条数据并按照时间降序
        $Noticelist = Notice::orderBy('notice_time','desc')->take(4)->get();
		$list = Lanmu::all();
		$adulist = Adu::orderBy('id','desc')->take(1)->get();
        $inte=User::orderBy('user_inte','desc')->take(8)->get();//积分排名
		//根据积分排名获取本条数据的login_id
		$login_id=[];
		foreach($inte as $k=>$v){
			//$login_id=$v['login_id'];
			$login_id[]= $v->login_id;
		}
		$othername = [];
		for($i=0;$i<count($login_id);$i++){
			$othername[] = Login::where('id',$login_id[$i])->get()->toArray();
		}
		
		$userinte=User::orderBy('user_inte','desc')->take(8)->get()->toArray();
		$arr2=[];
		  foreach($othername as $value){    
			foreach($value as $v){    
				 $arr2[]=$v;    
			}    
       }    
		//echo "<pre>";
		//var_dump($othername);die();
		$we=\DB::table("question")->get()->toArray();
        $wen=$this->objectToArray($we);
        return view('home.index',compact('adulist','list','usname','Noticelist','arr2','userinte','wen'));
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
