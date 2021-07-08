<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userCategory;

class categoryController extends Controller
{
    //
    function index(){

    }

    function add(){

        return view('coach.category.add');
    }

    function insert(Request $request){
        $data = $request->all();
        userCategory::addCategory($data);

        return redirect()->back()->with('success', 'New Category Added.');
    }
}
