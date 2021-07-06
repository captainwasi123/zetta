<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class webController extends Controller
{
    
    function index(){
    	
		return view('web.index');
    }
}
