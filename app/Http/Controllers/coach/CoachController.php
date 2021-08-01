<?php

namespace App\Http\Controllers\coach;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\lesson\orders;
use App\Http\Controllers\Controller;


class CoachController extends Controller
{

    public function index(){
        $data['orders'] = orders::with(['buyer','lesson'])->where('seller_id', Auth::id())->where('status',1)->latest()->get();
        return view('coach.dashboard')->with($data);
    }

    public function lesson_favourite()
    {
      return view('coach.lesson_favourite');
    }


    public function my_wallet()
    {
      return view('coach.my_account.wallet');
    }


    public function my_account_area()
    {
        return view('buddy.my_account.my_account_area');
    }

}
