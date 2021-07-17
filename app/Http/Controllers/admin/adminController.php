<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\admin;
use App\Models\admin\role;
use App\Models\User;
use Illuminate\Support\Arr;

class adminController extends Controller
{
    function index(){
		return view('admin.index');
    }

    function login(){

    	return view('admin.login');
    }

    function loginAttempt(Request $request){
    	$data = $request->all();
    	if(Auth::guard('admin')->attempt(['username' => $data['username'], 'password' => $data['password'], 'status' => '1'])){

    		return redirect('admin');
    	}else{
    		return redirect()->back()->with('error', 'Authentication Failed.');
    	}
    }

    function logout(){
		Auth::guard('admin')->logout();
		
		return redirect(route('admin.login'));
    }


    function users(){
        $databelt = admin::where('status', '!=', '3')->get();

        return view('admin.users.list', ['databelt' => $databelt]);
    }

    function addUsers(){
        $roles = role::all();

        return view('admin.users.add', ['roles' => $roles]);
    }

    function insertUsers(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:tbl_admin_users_info|max:16',
            'password' => 'required|confirmed|min:6',
        ]);
        $data = $request->all();

        admin::addUser($data);

        return redirect()->back()->with('success', 'User Registered.');
    }
    function updateUsers(Request $request){
        $data = $request->all();

        admin::updateUser($data);

        return redirect()->back()->with('success', 'User Updated.');
    }

    function editUsers($id){
        $id = base64_decode($id);
        $data = admin::find($id);

        $roles = role::all();

        return view('admin.users.edit', ['roles' => $roles, 'data' => $data]);
    }
    function inActiveUsers($id){
        $id = base64_decode($id);

        $a = admin::find($id);
        $a->status = '2';
        $a->save();

        return redirect()->back()->with('success', 'User In-Aactivated.');
    }
    function activeUsers($id){
        $id = base64_decode($id);

        $a = admin::find($id);
        $a->status = '1';
        $a->save();

        return redirect()->back()->with('success', 'User Aactivated.');
    }

    function deleteUsers($id){
        $id = base64_decode($id);

        $a = admin::find($id);
        $a->status = '3';
        $a->save();

        return redirect()->back()->with('success', 'User Deleted.');
    }

}
