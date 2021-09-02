<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userEquipment;
use App\Models\lesson\lessons;
use App\Models\lesson\Equipments;
use App\Models\lesson\Locations;
use App\Models\lesson\Packages;
use App\Models\sportsCategory;
use Auth;

class lessonsController extends Controller
{
    //
    function index(){
        $data = array(
            'active' => lessons::where('user_id', Auth::id())->where('status', '1')->get(),
        );
        return view('coach.lessons.index', ['data' => $data]);
    }

    function add(){
        $equip = userEquipment::where('user_id', Auth::id())->get();
        $categories = sportsCategory::all();

        return view('coach.lessons.add', ['equip' => $equip, 'categories' => $categories]);
    }

    function insert(Request $request){
        $data = $request->all();
        $id = lessons::addLesson($data);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/user/lessons/main_image/'), $filename);

            lessons::updateImage($id, $filename);
        }

        return redirect()->back()->with('success', 'New Lesson Added.');
    }

    function edit($id){
        $id = base64_decode($id);
        $data = lessons::with('packages')->find($id);
        $categories = sportsCategory::all();
        if(!empty($data->id)){
            $equip = userEquipment::where('user_id', Auth::id())->get();

            return view('coach.lessons.edit', ['data' => $data, 'equip' => $equip, 'categories' => $categories]);
        }else{
            return redirect()->back();
        }
    }

    function update(Request $request){
        $data = $request->all();
        $id = base64_decode($data['lid']);
        lessons::editLesson($data);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/user/lessons/main_image/'), $filename);

            lessons::updateImage($id, $filename);
        }

        return redirect()->back()->with('success', 'Lesson Updated.');
    }

    function delete($id){
        $id = base64_decode($id);

        lessons::where('id', $id)->delete();
        Equipments::where('lesson_id', $id)->delete();
        Locations::where('lesson_id', $id)->delete();
        Packages::where('lesson_id', $id)->delete();


        return redirect()->back()->with('success', 'Lesson Deleted.');
    }
}
