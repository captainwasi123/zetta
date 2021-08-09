<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\activity\activities;
use App\Models\lesson\lessons;
use App\Models\lesson\Locations;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\activity\locations as Activity_location;
use App\Models\userCategory;
use App\Models\userEquipment;
use Symfony\Component\HttpFoundation\AcceptHeader;

class webController extends Controller
{

    function index(){
        $data = array(
        	'lessons' => lessons::with('packages')->where('status', '1')->latest()->limit(10)->get(),
            'activities' => activities::with(['user','equipment','equipment.user_equipment'])->where('status', '1')->where('activity_type', '1')->latest()->limit(10)->get(),
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
            }else{
                return redirect('/');
            }
        }

        function search_filter($type){
            $lesson = lessons::with('user');
            if($type == 'online_coach'){
                $data = array('search_data' => array('val' => 'Online Coach', 'type' => $type));
                $data['coaches'] = $lesson ->where('availability',1)->groupBy('user_id')->paginate(18);
                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'group_coach'){
                $data = array('search_data' => array('val' => 'Group Coach', 'type' => $type));
                $data['coaches'] = $lesson ->where('participants','=',1)->groupBy('user_id')->paginate(18);
                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'private_coach'){
                $data = array('search_data' => array('val' => 'Private Coach', 'type' => $type));
                $data['coaches'] = $lesson ->where('participants','=',0)->groupBy('user_id')->paginate(18);
                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'girl'){
                $data = array('search_data' => array('val' => 'Girl Coach', 'type' => $type));
                $data['coaches'] = User::where('gender','Female')
                ->paginate(18);
                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'friend'){
                $data = array('search_data' => array('val' => 'Friend', 'type' => $type));
                $data['coaches'] = User::where('type','1')
                ->paginate(18);
                return view('web.filter.search_filter')->with($data);
            }
        }


    //Activities

        function activityDetails($id){
            $id = base64_decode($id);
            $data = activities::with(['equipment','equipment.user_equipment'])->find($id);
            $location = Activity_location::where('activity_id',$id)->get();


            if(!empty($data->id)){
                $tactivities = activities::where('status', '1')->where('user_id', $data->user_id)->latest()->limit(10)->get();
                $oactivities = activities::where('status', '1')->where('user_id', '!=', $data->user_id)->latest()->limit(10)->get();
                return view('web.activity.details', ['data' => $data, 'tactivities' => $tactivities, 'oactivities' => $oactivities,'location' => $location]);
            }else{
                return redirect()->back();
            }
        }



    //Lessons

        function lessonDetails($id){
            $id = base64_decode($id);
            $data = lessons::find($id);
            $less_location = Locations::where('lesson_id',$id)->get();

            if(!empty($data->id)){
                $tlessons = lessons::where('status', '1')->where('user_id', $data->user_id)->latest()->limit(10)->get();
                $olessons = lessons::where('status', '1')->where('user_id', '!=', $data->user_id)->latest()->limit(10)->get();
                return view('web.lesson.details', ['data' => $data, 'tlessons' => $tlessons, 'olessons' => $olessons,'location' => $less_location]);
            }else{
                return redirect()->back();
            }
        }

    // Coach Details

        function coachDetails($id)
        {
            $id = base64_decode($id);
            $data = User::with(['country','langs','category','education','certificate','equipment','lessons','activities','media'])->find($id);
            if(!empty($data->id)){
                return view('web.profiles.coach_profile', ['data' => $data]);
            }else{
                return redirect()->back();
            }
        }

    // buddy deatils

    function buddyDetails($id)
    {
        $id = base64_decode($id);
        $data = User::with(['country','langs','category','education','certificate','equipment','activities','media'])->find($id);
        if(!empty($data->id)){
            return view('web.profiles.buddy_profile', ['data' => $data]);
        }else{
            return redirect()->back();
        }
    }
}
