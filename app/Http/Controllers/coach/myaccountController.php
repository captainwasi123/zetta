<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userLevel;
use App\Models\earningHistory;
use App\Models\reviews;
use App\Models\User;
use Auth;

class myaccountController extends Controller
{
    //
    function index(){
        $levels = userLevel::all();
        $level = userLevel::orderBy('id', 'desc')->get();
        $totalEarning = earningHistory::where('user_id', Auth::id())->sum('amount');
        $reviews = array(
            '1' => reviews::where('seller_id', Auth::id())->where('rating', '1')->count(),
            '2' => reviews::where('seller_id', Auth::id())->where('rating', '2')->count(),
            '3' => reviews::where('seller_id', Auth::id())->where('rating', '3')->count(),
            '4' => reviews::where('seller_id', Auth::id())->where('rating', '4')->count(),
            '5' => reviews::where('seller_id', Auth::id())->where('rating', '5')->count(),
            'total' => reviews::where('seller_id', Auth::id())->count(),
        );

        $currOrders = count(Auth::user()->lessonOrders);
        $rating_avg = empty(Auth::user()->avgRating) ? '0' : Auth::user()->avgRating[0]->aggregate;

        foreach($level as $val){
            if($val->no_orders <= $currOrders && $val->rating <= $rating_avg && $val->earning <= $totalEarning){
                $u = User::find(Auth::id());
                $u->level_status = $val->id;
                $u->save();

            }else{
                User::where('id', Auth::id())->update([
                    'level_status' => ($val->id)-1
                ]);
            }
        }

        return view('coach.my_account_area.index', ['levels' => $levels, 'totalEarning' => $totalEarning, 'reviews' => $reviews]);
    }
}
