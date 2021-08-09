<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userEquipment;
use App\Models\activity\activities;
use App\Models\activity\equipments;
use App\Models\activity\friends;
use App\Models\activity\locations;
use App\Models\User;
use Auth;

class activityController extends Controller
{
    //

    function index(){
        $data = array(
            'active' => activities::where('user_id', Auth::id())->where('status', '1')->get(),
        );
        return view('buddy.activity.index', ['data' => $data]);
    }

    function add(){
        $equip = userEquipment::where('user_id', Auth::id())->get();
        $users = User::where('id','!=',Auth::id())->get();

        return view('buddy.activity.add', ['equip' => $equip,'users'=>$users]);
    }

    function insert(Request $request){
        $data = $request->all();
        $id = activities::addActivity($data);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/user/activity/main_image/'), $filename);

            activities::updateImage($id, $filename);
        }

        return redirect()->back()->with('success', 'New Activity Added.');
    }

    function edit($id){
        $id = base64_decode($id);
        $equip = userEquipment::where('user_id', Auth::id())->get();
        $users = User::where('id','!=',Auth::id())->get();
        $data = activities::find($id);
        $friend = friends::where('activity_id',$id)->first();
        if(!empty($data->id)){

            return view('buddy.activity.edit', ['equip' => $equip, 'data' => $data,'users'=>$users,'friend'=>$friend]);
        }else{
            return redirect()->back();
        }
    }

    function update(Request $request){
        $data = $request->all();
        $id = activities::editActivity($data);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/user/activity/main_image/'), $filename);

            activities::updateImage($id, $filename);
        }

        return redirect()->back()->with('success', 'Activity Update.');
    }


    function delete($id){
        $id = base64_decode($id);

        activities::where('id', $id)->delete();
        equipments::where('activity_id', $id)->delete();
        locations::where('activity_id', $id)->delete();


        return redirect()->back()->with('success', 'Lesson Deleted.');
    }
}
