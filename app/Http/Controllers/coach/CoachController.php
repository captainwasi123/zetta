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
      
      return view('web.buddy.dashboard');
    }
    
    public function lesson_favourite()
    {
      return view('web.buddy.lesson_favourite');
    }

    public function equipment()
    {
      return view('web.buddy.equipment');
    
    }

    public function my_wallet()
    {
      return view('web.buddy.my_wallet');
    }

    public function my_account()
    {
      return view('web.buddy.my_account');
    }

    public function order()
    {
      return view('web.buddy.order');
    }
}
