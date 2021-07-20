<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lesson\lessons;

class lessonsController extends Controller
{
    //
    function active(){
        $data = lessons::where('status', '1')->latest()->get();

        return view('admin.lessons.active', ['data' => $data]);
    }
    function blocked(){
        $data = lessons::where('status', '0')->latest()->get();

        return view('admin.lessons.blocked', ['data' => $data]);
    }



    function block($id){
        $id = base64_decode($id);
        $u = lessons::find($id);
        $u->status = '0';
        $u->save();

        return redirect()->back()->with('success', 'Lesson blocked.');
    }
    function activate($id){
        $id = base64_decode($id);
        $u = lessons::find($id);
        $u->status = '1';
        $u->save();

        return redirect()->back()->with('success', 'Lesson Activated.');
    }
}
