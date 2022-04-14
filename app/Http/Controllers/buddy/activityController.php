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
use App\Models\activity\skills;
use App\Models\User;
use App\Models\sportsCategory;
use App\Models\sports;
use App\Models\friends as friendsList;
use App\Models\FavouriteActivity as FA;
use App\Models\userCategorySelect;
use Auth;

class activityController extends Controller
{
    //

    function index(){
        $data = array(
            'active' => activities::where('user_id', Auth::id())->where('status', '1')->get(),
            'draft' => activities::where('user_id', Auth::id())->where('status', '0')->get(),
            'paused' => activities::where('user_id', Auth::id())->where('status', '2')->get(),
        );
        return view('buddy.activity.index', ['data' => $data]);
    }

    function add(){
        $equip = userEquipment::where('user_id', Auth::id())->get();
        $users = friendsList::where('user_id',Auth::id())->get();
        $sports = sports::orderBy('name')->get();
        $userSports  = userCategorySelect::where('user_id', Auth::id())->orderBy('id', 'desc')->get();

        return view('buddy.activity.add', ['equip' => $equip,'users'=>$users, 'sports' => $sports, 'userSports' => $userSports]);
    }

    function insert(Request $request){
        $data = $request->all();
        $id = activities::addActivity($data);
        if(!empty($data['skill_level'])){
            foreach($data['skill_level'] as $val){
                $s = new skills;
                $s->activity_id = $id;
                $s->skills = $val;
                $s->save();
            }
        }
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
            $userSports  = userCategorySelect::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
            $sports = sports::orderBy('name')->get();

            return view('buddy.activity.edit', ['equip' => $equip, 'data' => $data,'users'=>$users,'friend'=>$friend, 'userSports' => $userSports, 'sports' => $sports]);
        }else{
            return redirect()->back();
        }
    }

    function draft($id){
        $id = base64_decode($id);
        $data = activities::find($id);
        $data->status = '0';
        $data->save();

        return redirect()->back()->with('success', 'Activity sent to draft.');
    }

    function paused($id){
        $id = base64_decode($id);
        $data = activities::find($id);
        $data->status = '2';
        $data->save();

        return redirect()->back()->with('success', 'Activity sent to paused.');
    }

    function active($id){
        $id = base64_decode($id);
        $data = activities::find($id);
        $data->status = '1';
        $data->save();

        return redirect()->back()->with('success', 'Activity sent to active.');
    }

    function update(Request $request){
        $data = $request->all();
        $id = activities::editActivity($data);
        skills::where('activity_id', $id)->delete();
        if(!empty($data['skill_level'])){
            foreach($data['skill_level'] as $val){
                $s = new skills;
                $s->activity_id = $id;
                $s->skills = $val;
                $s->save();
            }
        }
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


    function deleteMedia($id){
        $id = base64_decode($id);

        medias::destroy($id);


        return redirect()->back()->with('success', 'Media Item Deleted.');
    }
}
