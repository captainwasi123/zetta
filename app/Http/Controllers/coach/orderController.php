<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lesson\orders;
use Auth;

class orderController extends Controller
{
    //
    function index(){
        $data = orders::where('seller_id', Auth::id())->latest()->get();

        return view('coach.orders.index', ['data' => $data]);
    }
}
