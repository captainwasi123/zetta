<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userEquipment;
use App\Models\activity\activities;
use App\Models\activity\medias;
use App\Models\activity\equipments;
use App\Models\activity\friends;
use App\Models\activity\locations;
use App\Models\User;
use App\Models\sportsCategory;
use App\Models\sports;
use App\Models\friends as friendsList;
use App\Models\FavouriteActivity as FA;
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
        $users = friendsList::where('user_id',Auth::id())->get();
        $categories = sportsCategory::orderBy('name')->get();

        return view('buddy.activity.add', ['equip' => $equip,'users'=>$users, 'categories' => $categories]);
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
        if(!empty($request->file('media'))){
            foreach($request->file('media') as $file)
            {
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = $id.'-'.$filename;
                $mid = medias::addMedia($id, $filename);
                $file->move(base_path('/public/storage/user/activity/media/'), $mid.'-'.$filename); 
            }
        }

        return redirect()->back()->with('success', 'New Activity Added.');
    }

    function edit($id){
        $id = base64_decode($id);
        $data = activities::find($id);
        if(!empty($data->id)){
            $equip = userEquipment::where('user_id', Auth::id())->get();
            $users = friendsList::where('user_id',Auth::id())->get();
            $friend = friends::where('activity_id',$id)->first();
            $categories = sportsCategory::all();

            return view('buddy.activity.edit', ['equip' => $equip, 'data' => $data,'users'=>$users,'friend'=>$friend, 'categories' => $categories]);
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
        
        if(!empty($request->file('media'))){
            foreach($request->file('media') as $file)
            {
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = $id.'-'.$filename;
                $mid = medias::addMedia($id, $filename);
                $file->move(base_path('/public/storage/user/activity/media/'), $mid.'-'.$filename); 
            }
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

    function getSports($id){
        $data = sports::where('category_id', $id)->orderBy('name')->get();

        return view('coach.lessons.response.sports_name', ['sports' => $data]);
    }



    
    function favouriteActivity(){
        
   
        $data=FA::where('user_id', Auth::id())->get();
  

        return view('buddy.favouriteActivity',['data' => $data]);
    }


    function deleteMedia($id){
        $id = base64_decode($id);

        medias::destroy($id);


        return redirect()->back()->with('success', 'Media Item Deleted.');
    }
}
