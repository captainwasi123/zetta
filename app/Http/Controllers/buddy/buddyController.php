<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use App\Models\lesson\orders;
use Illuminate\Http\Request;

class buddyController extends Controller
{
    //
    public function index(){

      return view('buddy.dashboard');
    }

    public function my_orders()
    {
        return view('buddy.orders');
    }

    public function my_wallet()
    {
        $data['orders'] = orders::with(['buyer','lesson'])->where('seller_id', Auth::id())->where('status',1)->latest()->get();
        return view('buddy.my_account.wallet');
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
}
