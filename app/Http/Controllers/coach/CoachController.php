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
      
      return view('web.coach.dashboard');
    }
    
    public function lesson_favourite()
    {
      return view('web.coach.lesson_favourite');
    }

    public function equipment()
    {
      return view('web.coach.equipment');
    
    }

    public function my_wallet()
    {
      return view('web.coach.my_wallet');
    }

    public function my_account()
    {
      return view('web.coach.my_account');
    }

    public function order()
    {
      return view('web.coach.order');
    }
}
