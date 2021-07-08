<?php

namespace App\Http\Controllers\coach;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Http\Controllers\Controller;


class CoachController extends Controller
{
    
  public function index(){
      
      return view('coach.dashboard');
    }
    
    public function lesson_favourite()
    {
      return view('coach.lesson_favourite');
    }

    public function equipment()
    {
      return view('coach.equipment');
    
    }

    public function my_wallet()
    {
      return view('coach.my_wallet');
    }

    public function order()
    {
      return view('coach.order');
    }
}
