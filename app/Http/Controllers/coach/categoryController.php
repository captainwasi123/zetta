<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userCategory;
use Auth;

class categoryController extends Controller
{
    //
    function index(){

        return view('coach.category.list');
    }

    function add(){

        return view('coach.category.add');
    }

    function insert(Request $request){
        $data = $request->all();
        userCategory::addCategory($data);

        return redirect()->back()->with('success', 'New Category Added.');
    }


    function edit($id){
        $id = base64_decode($id);
        $data = userCategory::where('id', $id)->where('user_id', Auth::id())->first();
        if(!empty($data->id)){

            return view('coach.category.edit', ['data' => $data]);
        }else{
            return redirect()->back();
        }
    }

    function update(Request $request){
        $data = $request->all();
        userCategory::updateCategory($data);

        return redirect()->back()->with('success', 'Category Updated.');
    }

    function delete($id){
        $id = base64_decode($id);
        $data = userCategory::destroy($id);
        
        return redirect()->back()->with('success', 'Record Deleted.');
    }
}
