<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sportsCategory;
use App\Models\userCategory;

class settingController extends Controller
{
    //Sports Category
        function category(){
            $data = sportsCategory::orderBy('name')->get();

            return view('admin.setting.category.index', ['data' => $data]);
        }
        function categoryAdd(){
            
            return view('admin.setting.category.add');
        }
        function categoryInsert(Request $request){
            $data = $request->all();

            $id = sportsCategory::addCategory($data);
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = $id.'-'.$filename;
                $file->move(base_path('/public/storage/settings/category/'), $filename);
                sportsCategory::addFeatureImage($id, $filename);
            }
            
            return redirect()->back()->with('success', 'New Category Added.');
        }


        function categoryEdit($id){
            $id = base64_decode($id);
            $data = sportsCategory::find($id);

            return view('admin.setting.category.edit', ['data' => $data]);
        }
        function categoryUpdate(Request $request){
            $data = $request->all();
            $id = base64_decode($data['cid']);
            sportsCategory::updateCategory($data);
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = $id.'-'.$filename;
                $file->move(base_path('/public/storage/settings/category/'), $filename);
                sportsCategory::addFeatureImage($id, $filename);
            }
            
            return redirect()->back()->with('success', 'Category Updated.');
        }

        function categoryDelete($id){
            $id = base64_decode($id);
            $data = sportsCategory::destroy($id);

            return redirect()->back()->with('success', 'Category Deleted.');
        }


        function categoryRequest(){
            $data = userCategory::orderBy('name')->get();

            return view('admin.setting.category.requests', ['data' => $data]);
        }
        function categoryRequestDelete($id){
            $id = base64_decode($id);
            $data = userCategory::destroy($id);

            return redirect()->back()->with('success', 'Request Deleted.');
        }

}
