<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Lanmu;
use App\Models\Home\Question;
use App\Models\Home\Answer;


class ListController extends Controller
{
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
    public function index(Request $request)
    {
		$name = session("homeuser");
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
        $list = Lanmu::all();
		$id = $request->route('id');
		$arr = Lanmu::where('id',$id)-> get();
		
		
		$arr1 = Question::where('lanmu_id',$id)->orderBy('updated_at','desc')->paginate(2);

		return view("home.list",compact('usname','list','arr','arr1'));
    }

	  public function index2(Request $request)
    {
        $name = session("homeuser");
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
        $list = Lanmu::all();
		$id = $request->route('id');
		$arr = Lanmu::where('id',$id)-> get();
		$arr2 = Question::where('lanmu_id',$id)->orderBy('ques_inte','desc')->paginate(2);
		
		return view("home.list.highscore",compact('usname','list','arr','arr2'));
    } 
	 public function index3(Request $request)
    {
        $name = session("homeuser");
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
        $list = Lanmu::all();
		$id = $request->route('id');
		$arr = Lanmu::where('id',$id)-> get();
		
		$aa = Answer::orderBy('answer_browse','desc')->get();
		$bb = [];
		foreach($aa as $v){
			//echo $v->ques_id;			
			$bb[] = Question::where('lanmu_id',$id)->where('ques_id',$v->ques_id)->get()->toArray();

		}		
		//echo "<pre>";
		//print_r($bb);die;
		$arr3 =array();
		foreach($bb as $vo){								
			$arr3 = array_merge($arr3,$vo);									
		}
		
		
		//$arr3::paginate(2);
		//echo "<pre>";
		//var_dump($arr3);die;
		return view("home.list.hot",compact('usname','list','arr','arr3'));
    }
	public function index4(Request $request)
    {
		$name = session("homeuser");
        $aname = $this->ob($name);
        $sname = $this->ob($aname[0]);
        $usname=$sname['login_name'];
        $list = Lanmu::all();
		$id = $request->route('id');
		$arr = Lanmu::where('id',$id)->get();

		$cc = Answer::orderBy('answer_comments','desc')->take(3)->get();
		$dd = [];
		foreach($cc as $v1){
			$dd[] = Question::where('lanmu_id',$id)->where('ques_id',$v1->ques_id)->get()->toArray();
		}
		$arr4 = array();
		foreach($dd as $vv){
			$arr4 = array_merge($arr4,$vv);
		}
		//echo "<pre>";
		//var_dump($arr4);die;
		
		return view("home.list.feed",compact('usname','list','arr','arr4'));
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
