<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\activity\activities;
use App\Models\lesson\lessons;
use App\Models\User;

class webController extends Controller
{
    
    function index(){
        $data = array(
        	'lessons' => lessons::where('status', '1')->latest()->limit(10)->get(),
            'activities' => activities::where('status', '1')->where('activity_type', '1')->latest()->limit(10)->get(),
        );

		return view('web.index')->with($data);
    }


    //Filter

        function search(Request $request){
            $data = $request->all();
            
            return redirect('/filter/'.$data['val'].'/'.$data['type']);
        }
        function filter($val, $type){
            $data = array('search_data' => array('val' => $val, 'type' => $type));
            if($type == 'Lessons'){
                $data['lessons'] = lessons::where('status', '1')->where('title', 'like', '%'.$val.'%')->latest()->paginate(18);

                return view('web.filter.lessons')->with($data);

            }elseif($type == 'Activities'){
                $data['activities'] = activities::where('status', '1')->where('title', 'like', '%'.$val.'%')->latest()->paginate(18);

                return view('web.filter.activity')->with($data);

            }elseif($type == 'Coaches'){
                $data['coaches'] = User::where('status', '1')
                                    ->where('type', '1')
                                    ->when(1>0, function ($q) use ($val) {
                                        return $q->where('fname', 'like', '%'.$val.'%')
                                                    ->orWhere('lname', 'like', '%'.$val.'%');
                                    })
                                    ->latest()->paginate(18);

                return view('web.filter.coaches')->with($data);
            
            }elseif($type == 'Sports Buddies'){
                $data['buddies'] = User::where('status', '1')
                                    ->where('type', '2')
                                    ->when(1>0, function ($q) use ($val) {
                                        return $q->where('fname', 'like', '%'.$val.'%')
                                                    ->orWhere('lname', 'like', '%'.$val.'%');
                                    })
                                    ->latest()->paginate(18);

                return view('web.filter.buddies')->with($data);
            }
        }


    //Activities

        function activityDetails($id){
            $id = base64_decode($id);
            $data = activities::find($id);
            if(!empty($data->id)){
                $tactivities = activities::where('status', '1')->where('user_id', $data->user_id)->latest()->limit(10)->get();
                $oactivities = activities::where('status', '1')->where('user_id', '!=', $data->user_id)->latest()->limit(10)->get();
                return view('web.activity.details', ['data' => $data, 'tactivities' => $tactivities, 'oactivities' => $oactivities]);
            }else{
                return redirect()->back();
            }
        }



    //Lessons

        function lessonDetails($id){
            $id = base64_decode($id);
            $data = lessons::find($id);
            if(!empty($data->id)){
                $tlessons = lessons::where('status', '1')->where('user_id', $data->user_id)->latest()->limit(10)->get();
                $olessons = lessons::where('status', '1')->where('user_id', '!=', $data->user_id)->latest()->limit(10)->get();
                return view('web.lesson.details', ['data' => $data, 'tlessons' => $tlessons, 'olessons' => $olessons]);
            }else{
                return redirect()->back();
            }
        }
}
