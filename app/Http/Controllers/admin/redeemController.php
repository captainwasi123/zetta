<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\redeemChallenges;

class redeemController extends Controller
{
    //Challenges
        function challenges(){
            $data = redeemChallenges::latest()->get();

            return view('admin.redeem.challenges.index', ['data' => $data]);
        }
        function challengesAdd(){

            return view('admin.redeem.challenges.add');
        }
        function challengesInsert(Request $request){
            $data = $request->all();

            redeemChallenges::addChallenge($data);
            
            return redirect()->back()->with('success', 'Challenge Created.');
        }

}
