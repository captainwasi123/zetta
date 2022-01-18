<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userCategory;
use App\Models\sports;
use Auth;

class categoryController extends Controller
{
    //
    function index(){
        $data = sports::orderBy('name')->get();

        return view('buddy.sports.list', ['data' => $data]);
    }

    function add(){
        return view('buddy.sports.add');
    }

    function insert(Request $request){
        $data = $request->all();
        userCategory::addCategory($data);

        return redirect()->back()->with('success', 'Sports Request Added.');
    }

    function delete($id){
        $id = base64_decode($id);
        $data = userCategory::destroy($id);

        return redirect()->back()->with('success', 'Record Deleted.');
    }
}
