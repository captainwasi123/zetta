<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\redeemChallenges;

class redeemController extends Controller
{
    //
    public function index()
    {
        $data = array(
            'challenges' => redeemChallenges::where('status', '1')->where('expiry_date', '>=', date('Y-m-d'))->limit(4)->get()
        );
        
        return view('buddy.analytics-and-redeem.index')->with($data);
    }
}
