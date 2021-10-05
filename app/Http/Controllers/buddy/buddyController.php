<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use App\Models\CoachRequest;
use App\Models\ActivityOrders;
use App\Models\User;
use App\Models\earningHistory;
use Illuminate\Http\Request;
use App\Models\inbox\chat;
use Auth;

class buddyController extends Controller
{
    //
    public function index(){
        $sender = Auth::id();
        $data_list = chat::where("sender_id",$sender)
                        ->orWhere("receiver_id",$sender)
                        ->distinct("sender_id", "receiver_id")
                        ->orderBy('created_at', 'desc')
                        ->get();
                        
      return view('buddy.dashboard', ['chat_list' => $data_list]);
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
            $u->coach_request_status = 0;
            $u->save();

            $req = new CoachRequest();
            $req->user_id = auth()->user()->id;
            $req->answer = $request->answer;
            $req->save();
            return back()->with('success','Your Request For Coach Is Submitted .');
        }else{
            return redirect()->route('coach.dashboard');
        }

    }
}
