<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\activity\activities;
use App\Models\lesson\lessons;
use App\Models\lesson\Locations;
use App\Models\User;
use App\Models\friends;
use Illuminate\Support\Facades\DB;
use App\Models\activity\locations as Activity_location;
use App\Models\userCategorySelect;
use App\Models\userEquipment;
use Symfony\Component\HttpFoundation\AcceptHeader;
use App\Models\sportsCategory;
use App\Models\sports;
use Carbon\Carbon;
use App\Models\inbox\chat;
use App\Events\sendChat;
use Pusher\Pusher;
use App\Models\orders\order;
use Illuminate\Support\Str;
use App\Models\reviews;
use Mail;
use URL;
use App;
use Hash;
class webController extends Controller
{

    function index(){
        $date = date('Y-m-d');
        $data = array(
        	'lessons' => lessons::with('packages')
                            ->where('status', '1')
                            ->latest()
                            ->limit(10)
                            ->get(),

            'uactivities' => activities::where('status', '1')
                            ->where('activity_type', '1')
                            ->whereDate('held_date', '>', Carbon::now())
                            ->orderBy('held_date', 'asc')
                            ->limit(10)
                            ->get(),

            'activities' => activities::with(['user','equipment','equipment.user_equipment'])
                            ->whereDate('held_date', '>', Carbon::now())
                            ->where('status', '1')
                            ->where('activity_type', '1')
                            ->latest()
                            ->limit(10)
                            ->get(),

            'alocation' => Activity_location::where('lat', '!=', null)
                            ->where('lng', '!=', null)
                            ->whereHas('activity', function($q){
                                return $q->where('activity_type', '1')
                                            ->whereDate('held_date', '>', Carbon::now());
                            })
                            ->groupBy('lat', 'lng')
                            ->get(),

            'llocation' => Locations::where('lat', '!=', null)
                            ->where('lng', '!=', null)
                            ->groupBy('lat', 'lng')
                            ->get(),
            'sports' => sports::all()
        );
        //dd($data['uactivities']);
		return view('web.index')->with($data);
    }


    //Filter

        function search(Request $request){
            $data = $request->all();
            $val = isset($data['val']) ? $data['val'] : 'all';
            $country = isset($data['country']) ? $data['country'] : 'all';
            $add = isset($data['add']) ? $data['add'] : 'all';

            return redirect('/filter/'.$val.'/'.$country.'/'.$add);
        }
        function filter($val, $type, $add){

            $data = array(  'search_data' => array(
                                                    'val' => $val == 'all' ? '' : $val,
                                                    'type' => $type == 'all' ? '' : $type,
                                                    'add' => $add == 'all' ? '' : $add
                                                ),
                            'sCategories' => Auth::check() ? userCategorySelect::where('user_id', Auth::id())->get() : sportsCategory::all());
            
            $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];


            $data['lessons'] = lessons::where('status', '1')
                                ->when($type != 'all', function($w) use ($type){
                                    return $w->whereHas('user', function($q) use ($type){
                                        return $q->whereHas('country', function($qq) use ($type){
                                            return $qq->where('nicename', 'like', '%'.$type.'%');
                                        });
                                    });
                                })
                                ->when($val != 'all', function($w) use ($val){
                                    return $w->whereHas('sports', function($q) use ($val){
                                        return $q->where('name', 'like', '%'.$val.'%');
                                    });
                                })
                                ->latest()->paginate(6);

            $data['activities'] = activities::where('status', '1')
                                ->where('activity_type', '1')
                                ->whereDate('held_date', '>', Carbon::now())
                                ->when($type != 'all', function($w) use ($type){
                                    return $w->whereHas('user', function($q) use ($type){
                                        return $q->whereHas('country', function($qq) use ($type){
                                            return $qq->where('nicename', 'like', '%'.$type.'%');
                                        });
                                    });
                                })
                                ->when($val != 'all', function($w) use ($val){
                                    return $w->whereHas('sports', function($q) use ($val){
                                        return $q->where('name', 'like', '%'.$val.'%');
                                    });
                                })
                                ->latest()->paginate(6);

            $data['coaches'] = User::where('status', '1')
                                ->where('type', '2')
                                ->when($type != 'all', function($w) use ($type){
                                    return $w->whereHas('country', function($qq) use ($type){
                                        return $qq->where('nicename', 'like', '%'.$type.'%');
                                    });
                                })
                                ->latest()->paginate(6);

            $data['buddies'] = User::where('status', '1')
                                ->where('type', '1')
                                ->when($type != 'all', function($w) use ($type){
                                    return $w->whereHas('country', function($qq) use ($type){
                                        return $qq->where('nicename', 'like', '%'.$type.'%');
                                    });
                                })
                                ->latest()->paginate(6);

            //dd($data['sCategories']);
            return view('web.filter.search')->with($data);

        }

        function search_filter($type){
            $lesson = lessons::with('user');
            if($type == 'online_coach'){
                $data = array('search_data' => array('val' => 'Online Coach', 'type' => $type), 'sCategories' => Auth::check() ? userCategorySelect::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = $lesson ->where('availability',1)->groupBy('user_id')->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'group_coach'){
                $data = array('search_data' => array('val' => 'Group Coach', 'type' => $type), 'sCategories' => Auth::check() ? userCategorySelect::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = $lesson ->where('participants','=',1)->groupBy('user_id')->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'private_coach'){
                $data = array('search_data' => array('val' => 'Private Coach', 'type' => $type), 'sCategories' => Auth::check() ? userCategorySelect::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = $lesson ->where('participants','=',0)->groupBy('user_id')->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'girl'){
                $data = array('search_data' => array('val' => 'Girl Coach', 'type' => $type), 'sCategories' => Auth::check() ? userCategorySelect::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = User::where('gender','Female')
                ->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }elseif($type == 'friend'){
                $data = array('search_data' => array('val' => 'Friend', 'type' => $type), 'sCategories' => Auth::check() ? userCategorySelect::where('user_id', Auth::id())->get() : sportsCategory::all());
                $data['coaches'] = User::where('type','1')
                ->paginate(18);


                $data['sCategories'] = count($data['sCategories']) == 0 ? sportsCategory::all() : $data['sCategories'];

                return view('web.filter.search_filter')->with($data);
            }
        }


    function all($type){
        $data = array('search_data' => array('type' => $type), 'sCategories' => Auth::check() ? userCategorySelect::where('user_id', Auth::id())->get() : sportsCategory::all());

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
                $reviews = array(
                    '1' => reviews::where('seller_id', $data->user_id)->where('rating', '1')->count(),
                    '2' => reviews::where('seller_id', $data->user_id)->where('rating', '2')->count(),
                    '3' => reviews::where('seller_id', $data->user_id)->where('rating', '3')->count(),
                    '4' => reviews::where('seller_id', $data->user_id)->where('rating', '4')->count(),
                    '5' => reviews::where('seller_id', $data->user_id)->where('rating', '5')->count(),
                    'total' => reviews::where('seller_id', $data->user_id)->count(),
                );

                $tactivities = activities::where('status', '1')->where('user_id', $data->user_id)->where('id', '!=', $id)->latest()->limit(10)->get();
                $oactivities = activities::where('status', '1')->where('user_id', '!=', $data->user_id)->latest()->limit(10)->get();
                return view('web.activity.details', ['data' => $data, 'tactivities' => $tactivities, 'oactivities' => $oactivities,'location' => $location, 'reviews' => $reviews]);
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
                $reviews = array(
                    '1' => reviews::where('seller_id', $data->user_id)->where('rating', '1')->count(),
                    '2' => reviews::where('seller_id', $data->user_id)->where('rating', '2')->count(),
                    '3' => reviews::where('seller_id', $data->user_id)->where('rating', '3')->count(),
                    '4' => reviews::where('seller_id', $data->user_id)->where('rating', '4')->count(),
                    '5' => reviews::where('seller_id', $data->user_id)->where('rating', '5')->count(),
                    'total' => reviews::where('seller_id', $data->user_id)->count(),
                );
                
                $tlessons = lessons::where('status', '1')->where('user_id', $data->user_id)->where('id', '!=', $id)->latest()->limit(10)->get();
                $olessons = lessons::where('status', '1')->where('user_id', '!=', $data->user_id)->latest()->limit(10)->get();
                return view('web.lesson.details', ['data' => $data, 'tlessons' => $tlessons, 'olessons' => $olessons,'location' => $less_location, 'reviews' => $reviews]);
            }else{
                return redirect()->back();
            }
        }

    // Coach Details

        function coachDetails($id)
        {
            $id = base64_decode($id);
            $is_friend = 0;
            $data = User::with(['country','langs','category','education','certificate','equipment','lessons','activities','media'])->find($id);
            if(Auth::check()){
                $f = friends::where(['user_id' => $id, 'friend_id' => Auth::id()])
                                ->orWhere(['user_id' => Auth::id(), 'friend_id' => $id])
                                ->first();
                if(!empty($f->id)){
                    $is_friend = 1;
                }
            }
            if(!empty($data->id)){
                return view('web.profiles.coach_profile', ['data' => $data, 'is_friend' => $is_friend]);
            }else{
                return redirect()->back();
            }
        }

    // buddy deatils

    function buddyDetails($id)
    {
        $id = base64_decode($id);
        $is_friend = 0;
        if(Auth::check()){
            $f = friends::where(['user_id' => $id, 'friend_id' => Auth::id()])
                            ->orWhere(['user_id' => Auth::id(), 'friend_id' => $id])
                            ->first();
            if(!empty($f->id)){
                $is_friend = 1;
            }
        }
        $data = User::with(['country','langs','category','education','certificate','equipment','activities','media'])->find($id);
        if(!empty($data->id)){
            return view('web.profiles.buddy_profile', ['data' => $data, 'is_friend' => $is_friend]);
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


        public function changeLang($lang)
        {
            App::setlocale($lang);
            session()->put('locale', $lang);

            return redirect()->back();
        }



    //New Pages
        public function contact(){

            return view('web.contact');
        }
        public function contactSubmit(Request $request){
            $data = $request->all();
            $edata = array('name' => $data['name'], 'email' => $data['email'], 'detail' => $data['message']);
            //dd($data);
            Mail::send('email.contact_form', $edata, function($message) use ($data)  {
                $message->to('info@zettaasports.com')->subject("New Inquiry From Contact Us Form | Zettaa");
                $message->from("noreply@zettaa.com", 'Zettaa');
            });

            return redirect()->back()->with('success', 'The Zettaa team thank you for your message. We will make sure to respond as soon as possible.');
        }

        public function thankyou(){
            $data=order::where('buyer_id', Auth::id())->where('status', '1')->latest()->limit(1)->get();
       
            return view('web.thankyou', ['data' => $data]);
        }

        
        public function partner(){

           
            return view('web.partner');
        }

        
        public function labelzettacoach(){

           
            return view('web.labelzettacoach');
        }

        function forgotPassword(Request $request){


            $request->validate([
                'email' => 'required|email|exists:tbl_users_info',
            ]);
    
            $token = Str::random(64);
    
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
              ]);
    
            Mail::send('email.recoverPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
                $message->from("noreply@zettaa.com", 'Zettaa');
            });

           
    
            return redirect('/');
    
        }

        public function showResetPasswordForm($token) {


            return view('web.forgetPasswordLink', ['token' => $token]);
         }


         public function submitResetPasswordForm(Request $request)
         {
               $request->validate([
     
                   'password' => '|required_with:confirmation_password|same:confirmation_password',
                   'confirmation_password' => 'required'
               ]);
               $updatePassword = DB::table('password_resets')
                                   ->where([ 'token' => $request->token])->first();
     
               if(!$updatePassword){
                   return back()->withInput()->with('error', 'Invalid token!');
               }
               $user = User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);
                       DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
     
               return redirect('/')->with('success', 'Your password has been changed!'); 
     
           }
     
}


