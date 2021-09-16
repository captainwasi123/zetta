<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sportsCategory;
use App\Models\userCategory;
use App\Models\sports;

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

    //Sports
        function sports(){
            $data = sports::orderBy('name')->get();

            return view('admin.setting.sports.index', ['data' => $data]);
        }
        function sportsAdd(){
            $categories = sportsCategory::orderBy('name')->get();

            return view('admin.setting.sports.add', ['categories' => $categories]);
        }
        function sportsInsert(Request $request){
            $data = $request->all();

            $id = sports::addSports($data);
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = $id.'-'.$filename;
                $file->move(base_path('/public/storage/settings/sports/'), $filename);
                sports::addFeatureImage($id, $filename);
            }

            return redirect()->back()->with('success', 'New Category Added.');
        }
        function sportsEdit($id){
            $id = base64_decode($id);
            $data = sports::find($id);
            $categories = sportsCategory::orderBy('name')->get();

            return view('admin.setting.sports.edit', ['data' => $data, 'categories' => $categories]);
        }
        function sportsUpdate(Request $request){
            $data = $request->all();
            $id = base64_decode($data['sid']);
            sports::updateSports($data);
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = $id.'-'.$filename;
                $file->move(base_path('/public/storage/settings/sports/'), $filename);
                sports::addFeatureImage($id, $filename);
            }

            return redirect()->back()->with('success', 'Sports Updated.');
        }

        function sportsDelete($id){
            $id = base64_decode($id);
            $data = sports::destroy($id);

            return redirect()->back()->with('success', 'Sports Deleted.');
        }

}
