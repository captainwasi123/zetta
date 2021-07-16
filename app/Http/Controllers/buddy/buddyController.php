<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class buddyController extends Controller
{
    //  
    public function index(){
      
      return view('buddy.dashboard');
    }
}
