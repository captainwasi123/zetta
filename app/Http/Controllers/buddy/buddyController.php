<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use App\Models\CoachRequest;
use App\Models\ActivityOrders;
use App\Models\User;
use App\Models\earningHistory;
use App\Models\FavouriteBuddy as FB;
use Illuminate\Http\Request;
use App\Models\inbox\chat;
use App\Models\lesson\orderSessions;
use App\Models\activity\activities;
use Auth;

class buddyController extends Controller
{
    //
    public function index(){
        $sender = Auth::id();
        $data_list = chat::where("sender_id",$sender)
                        ->orWhere("receiver_id",$sender)
                        ->get();
        
        $orders = orderSessions::whereHas('orders', function($q){
            return $q->where('buyer_id', Auth::id());
        })->get();

        $activities = activities::orderBy('held_date')->get();

      return view('buddy.dashboard', ['chat_list' => $data_list->reverse(), 'orders' => $orders, 'activities' => $activities]);
    }

    public function become_a_coach(){

        return view('buddy.include.become_a_coach');
    }


    public function my_wallet()
    {
        $data = array(
            'totalEarning' => earningHistory::where('user_id', Auth::id())->sum('amount'),
            'currMonthEarning' => earningHistory::where('user_id', Auth::id())->whereMonth('created_at', date('m'))->sum('amount')
        );

        return view('buddy.my_account.wallet')->with($data);
    }

    public function my_account_area()
    {
        return view('buddy.my_account.my_account_area');
    }

    public function messages()
    {
        return view('buddy.messages.index');
    }

    public function coach_requet (Request $request)
    {
        //dd(auth()->user()->coach_request_status);
        $check = CoachRequest::where('user_id',auth()->user()->id)->get();
        if(auth()->user()->coach_request_status == 0 && count($check) > 0){
            return back()->with('pending', 'Your Reqest For Coach Is In Pending !');
        }else if(auth()->user()->coach_request_status == null){
            $u = User::find(auth()->user()->id);
            $u->coach_request_status = 1;
            $u->save();

            $req = new CoachRequest();
            $req->user_id = auth()->user()->id;
            $req->answer1 = $request->answer1;
            $req->answer1Detail = $request->answer1Detail;
            $req->answer2 = $request->answer2;
            $req->answer2Detail = $request->answer2Detail;
            $req->answer3Detail = $request->answer3Detail;
            $req->answer4 = $request->answer4;
            $req->answer4Detail = $request->answer4Detail;
            $req->answer5Detail = $request->answer5Detail;
            $req->answer6Detail = $request->answer6Detail;
            $req->answer7Detail = $request->answer7Detail;
            $req->save();
            return back()->with('success','Your Request For Coach Is Submitted .');
        }else{
            return redirect()->route('coach.dashboard');
        }

    }



    function favouriteBuddy(){
        
   
        $data=FB::where('user_id', Auth::id())->get();
  
       
        return view('buddy.favouriteBuddy',['data' => $data]);
    }


   
}
