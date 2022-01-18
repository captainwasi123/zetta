<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\redeemChallenges;
use App\Models\redeemReward;
use App\Models\coupons;
use App\Models\userWallet;
use Auth;

class redeemController extends Controller
{
    //
    public function index()
    {
        $data = array(
            'challenges' => redeemChallenges::where('status', '1')->where('expiry_date', '>=', date('Y-m-d'))->limit(4)->get(),
            'rewards' => redeemReward::limit(4)->get()
        );
        
        return view('buddy.analytics-and-redeem.index')->with($data);
    }

    function convertReward($id){
        $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $id = base64_decode($id);
        $reward = redeemReward::find($id);
        $coins = empty(Auth::user()->wallet->coin) ? 0 : Auth::user()->wallet->coin;
        if($coins < $reward->cost){
            return json_encode(['status' => 200, 'message' => 'Insufficient coin balance']);
        }else{
            $w = userWallet::where('user_id', Auth::id())->first();
            $w->coin = $w->coin - $reward->cost;
            $w->save();

            $c = new coupons;
            $c->user_id = Auth::id();
            $c->coupon = substr(str_shuffle($permitted_chars), 0, 6);
            $c->price = $reward->reward;
            $c->status = '1';
            $c->save();

            return json_encode(['status' => 300, 'message' => 'Coupon Successfully Created.', 'coupon' => $c->coupon, 'balance' => $w->coin]);
        }


    }
}
