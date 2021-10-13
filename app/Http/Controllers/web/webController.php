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
use App\Models\sportsCategory;
use App\Models\sports;
use Carbon\Carbon;
use App\Models\inbox\chat;
use App\Events\sendChat;
use Pusher\Pusher;
use URL;

class webController extends Controller
{

    function index(){
        $data = array(
        	'lessons' => lessons::with('packages')->where('status', '1')->latest()->limit(10)->get(),
            'uactivities' => activities::with(['user','equipment','equipment.user_equipment'])->where('status', '1')->where('activity_type', '1')->whereDate('held_date', '>', Carbon::now())->orderBy('held_date', 'asc')->limit(10)->get(),
            'activities' => activities::with(['user','equipment','equipment.user_equipment'])->where('status', '1')->where('activity_type', '1')->latest()->limit(10)->get(),
            'alocation' => Activity_location::where('lat', '!=', null)->where('lng', '!=', null)->groupBy('lat', 'lng')->get(),
            'llocation' => Locations::where('lat', '!=', null)->where('lng', '!=', null)->groupBy('lat', 'lng')->get(),
            'ulocation' => User::where('status', '1')->where('lat', '!=', null)->where('lng', '!=', null)->get(),
            'sports' => sports::all()
        );
		return view('web.index')->with($data);
    }


    //Filter

        function search(Request $request){
            $data = $request->all();

            return redirect('/filter/'.$data['val'].'/'.$data['country'].'/'.$data['add']);
        }
        function filter($val, $type, $add){

            $data = array(  'search_data' => array(
                                                    'val' => $val,
                                                    'type' => $type,
                                                    'add' => $add
                                                ),
                            'sCategories' => Auth::check() ? userCategory::where('user_id', Auth::id())->get() : sportsCategory::all());

            $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];


            $data['lessons'] = lessons::where('status', '1')
                                ->whereHas('user', function($q) use ($type){
                                    return $q->whereHas('country', function($qq) use ($type){
                                        return $qq->where('nicename', 'like', '%'.$type.'%');
                                    });
                                })
                                ->whereHas('category', function($q) use ($val){
                                    return $q->where('name', 'like', '%'.$val.'%');
                                })
                                ->latest()->paginate(18);

            $data['activities'] = activities::where('status', '1')
                                ->whereHas('user', function($q) use ($type){
                                    return $q->whereHas('country', function($qq) use ($type){
                                        return $qq->where('nicename', 'like', '%'.$type.'%');
                                    });
                                })
                                ->whereHas('category', function($q) use ($val){
                                    return $q->where('name', 'like', '%'.$val.'%');
                                })
                                ->latest()->paginate(18);

            $data['coaches'] = User::where('status', '1')
                                ->where('type', '2')
                                ->whereHas('country', function($qq) use ($type){
                                    return $qq->where('nicename', 'like', '%'.$type.'%');
                                })
                                ->latest()->paginate(18);

            $data['buddies'] = User::where('status', '1')
                                ->where('type', '1')
                                ->whereHas('country', function($qq) use ($type){
                                    return $qq->where('nicename', 'like', '%'.$type.'%');
                                })
                                ->latest()->paginate(18);

            return view('web.filter.search')->with($data);

        }

        function search_filter($type){
            $lesson = lessons::with('user');
            if($type == 'online_coach'){
                $data = array('search_data' => array('val' => 'Online Coach', 'type' => $type), 'sCategories' => Auth::check() ? userCategory::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = $lesson ->where('availability',1)->groupBy('user_id')->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'group_coach'){
                $data = array('search_data' => array('val' => 'Group Coach', 'type' => $type), 'sCategories' => Auth::check() ? userCategory::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = $lesson ->where('participants','=',1)->groupBy('user_id')->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'private_coach'){
                $data = array('search_data' => array('val' => 'Private Coach', 'type' => $type), 'sCategories' => Auth::check() ? userCategory::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = $lesson ->where('participants','=',0)->groupBy('user_id')->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'girl'){
                $data = array('search_data' => array('val' => 'Girl Coach', 'type' => $type), 'sCategories' => Auth::check() ? userCategory::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = User::where('gender','Female')
                ->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'friend'){
                $data = array('search_data' => array('val' => 'Friend', 'type' => $type), 'sCategories' => Auth::check() ? userCategory::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = User::where('type','1')
                ->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }
        }


    function all($type){
        $data = array('search_data' => array('type' => $type), 'sCategories' => Auth::check() ? userCategory::where('user_id', Auth::id())->get() : sportsCategory::all());

        $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

        if($type == 'Lessons'){
            $data['lessons'] = lessons::where('status', '1')->latest()->paginate(18);

            return view('web.filter.lessons')->with($data);

        }


        elseif($type == 'Activities'){
            $data['activities'] = activities::where('status', '1')->latest()->paginate(18);

            return view('web.filter.activity')->with($data);

        }


        elseif($type == 'Coaches'){
            $data['coaches'] = User::where('status', '1')
                                ->where('type', '2')
                                ->latest()->paginate(18);

            return view('web.filter.coaches')->with($data);

        }


        elseif($type == 'Sports Buddies'){
            $data['buddies'] = User::where('status', '1')
                                ->where('type', '1')
                                ->latest()->paginate(18);

            return view('web.filter.buddies')->with($data);
        }else{
            return redirect('/');
        }
    }

    function stickmanSearch(Request $request){
        $rdata = $request->all();

        if(isset($rdata['stickman'])){
        $data['lessons'] = lessons::where('status', '1')
                            ->when(!empty($rdata['stickman']), function ($qq) use ($rdata){
                                return $qq->whereHas('category', function ($q) use ($rdata) {
                                    $q->whereIn('name', $rdata['stickman']);
                                });
                            })
                            ->latest()->paginate(18);


        $data['activities'] = activities::where('status', '1')
                                ->when(!empty($rdata['stickman']), function ($qq) use ($rdata){
                                    return $qq->whereHas('category', function ($q) use ($rdata) {
                                        $q->whereIn('name', $rdata['stickman']);
                                    });
                                })
                                ->latest()->paginate(18);

        $data['coaches'] = User::where('status', '1')
                            ->where('type', '2')
                            ->whereHas('category', function ($q) use ($rdata) {
                                $q->whereIn('name', $rdata['stickman']);
                            })
                            ->latest()->paginate(18);

        $data['buddies'] = User::where('status', '1')
                            ->where('type', '1')
                            ->whereHas('category', function ($q) use ($rdata) {
                                $q->whereIn('name', $rdata['stickman']);
                            })
                            ->latest()->paginate(18);

        $data['searchCategory'] = sportsCategory::whereIn('name', $rdata['stickman'])->get();
        $data['search_add'] = $rdata['type'];

        return view('web.filter.response.allResult')->with($data);
        }else{
            $data['lessons'] = array();
            $data['activities'] = array();
            $data['coaches'] = array();
            $data['buddies'] = array();
            $data['searchCategory'] = array();
            $data['search_add'] = $rdata['type'];
            $data['search_value'] = $rdata['sValue'];
            return view('web.filter.response.allResult')->with($data);
        }
    }

    //Activities

        function activityDetails($id){
            $id = base64_decode($id);
            $data = activities::with(['equipment','equipment.user_equipment'])->find($id);
            $location = Activity_location::where('activity_id',$id)->get();


            if(!empty($data->id)){
                $tactivities = activities::where('status', '1')->where('user_id', $data->user_id)->where('id', '!=', $id)->latest()->limit(10)->get();
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
                $tlessons = lessons::where('status', '1')->where('user_id', $data->user_id)->where('id', '!=', $id)->latest()->limit(10)->get();
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

    function getUserMessage($id){
        $id = base64_decode($id);
        $data = User::find($id);

        return view('web.response.message_box', ['data' => $data]);
    }

    function sendMessage(Request $request){
        if(Auth::check()){
            $data = $request->all();
            $filename = null;
            $file_fullname = null;
            $attach_block = null;
            $timestamp = chat::addChat($data, $filename, $file_fullname);
            $name = empty(Auth::user()->fname) ? 'Newuser' : Auth::user()->fname.' '.Auth::user()->lname;



            $pusher = new Pusher(
                        env('PUSHER_APP_KEY'),
                        env('PUSHER_APP_SECRET'),
                        env('PUSHER_APP_ID'),
                        array(
                            'cluster' => env('PUSHER_APP_CLUSTER')
                        )
                    );
            $img = empty(Auth::user()->profile_img) ? 'none' : Auth::user()->profile_img;
            $pusher->trigger('send-chatChannel.'.base64_decode($data['msg_id']).'.'.Auth::id(), 'sendChat',
                        array(
                            'message'   => $data['message'],
                            'image'     => $img,
                            'name'      => $name,
                            'timestamp' => $timestamp->diffForHumans()
                        )
                    );
            $pusher->trigger('noti-chatChannel.'.base64_decode($data['msg_id']), 'notiChat', 'received');

            return redirect()->back()->with('success', 'Message Sent.');

        }else{
            return redirect()->back();
        }
    }

    function stickmanSubCategory($id){
        $data = sports::where('category_id', $id)->get();

        return view('web.filter.response.subCategory', ['data' => $data, 'id' => $id]);
    }

    //Footer Pages
        function terms(){

            return view('web.terms');
        }
        function faq(){

            return view('web.faq');
        }
        function refund_cancel_policy(){

            return view('web.refund_cancel_policy');
        }
        // function cookiePolicy(){

        //     return view('web.cookiePolicy');
        // }

        function aboutUs(){

            return view('web.about');
        }

        function cookiePolicy(){

            return view('web.cookiePolicy');
        }

        function disclaimerPolicy(){

            return view('web.disclaimerPolicy');
        }




}


