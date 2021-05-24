<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class authController extends Controller
{
    //
    function login(){

    	return view('admin.login');
    }

    function loginAttempt(Request $request){
    	$data = $request->all();

    	if(Auth::guard('admin')->attempt(['username' => $data['username'], 'password' => $data['password'], 'is_active' => '1'])){

    		return redirect(route('admin.dashboard'));
    	}else{
    		return redirect()->back()->with('error', 'Authentication Failed.');
    	}
    }

    function logout(){

    	Auth::guard('admin')->logout();

    	return redirect('admin/login')->with('error', 'Logged Out.');
    }
}
