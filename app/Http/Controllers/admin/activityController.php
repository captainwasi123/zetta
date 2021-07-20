<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\activity\activities;

class activityController extends Controller
{
    //
    function active(){
        $data = activities::where('status', '1')->latest()->get();

        return view('admin.activities.active', ['data' => $data]);
    }
    function blocked(){
        $data = activities::where('status', '0')->latest()->get();

        return view('admin.activities.blocked', ['data' => $data]);
    }



    function block($id){
        $id = base64_decode($id);
        $u = activities::find($id);
        $u->status = '0';
        $u->save();

        return redirect()->back()->with('success', 'Activities blocked.');
    }
    function activate($id){
        $id = base64_decode($id);
        $u = activities::find($id);
        $u->status = '1';
        $u->save();

        return redirect()->back()->with('success', 'Activities Activated.');
    }
}
