<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use App\Models\CoachRequest;
use App\Models\ActivityOrders;
use App\Models\User;
use App\Models\earningHistory;
use Illuminate\Http\Request;
use Auth;

class buddyController extends Controller
{
    //
    public function index(){

      return view('buddy.dashboard');
    }

    public function my_orders()
    {
        $orders = ActivityOrders::where('seller_id', Auth::id())->where('status',1)->latest()->get();

        return view('buddy.orders', ['orders' => $orders]);
    }

    public function my_wallet()
    {
        $data = array(
            'totalEarning' => earningHistory::where('user_id', Auth::id())->sum('amount'),
            'currMonthEarning' => earningHistory::where('user_id', Auth::id())->whereMonth('created_at', date('m'))->sum('amount')
        );

        return view('buddy.my_account.wallet')->with($data);
    }

    public function my_friends()
    {
        return view('buddy.friends');
    }

    public function analytics_and_redeem()
    {
        return view('buddy.analytics-and-redeem');
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
