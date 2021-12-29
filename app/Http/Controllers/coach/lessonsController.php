<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userEquipment;
use App\Models\lesson\lessons;
use App\Models\lesson\medias;
use App\Models\lesson\Equipments;
use App\Models\lesson\Locations;
use App\Models\lesson\Packages;
use App\Models\lesson\skills;
use App\Models\sportsCategory;
use App\Models\sports;
use App\Models\FavouriteLesson as FL;

use Auth;

class lessonsController extends Controller
{
    //
    function index(){
        $data = array(
            'paused' => lessons::where('user_id', Auth::id())->where('status', '0')->get(),
            'active' => lessons::where('user_id', Auth::id())->where('status', '1')->get(),
            'draft' => lessons::where('user_id', Auth::id())->where('status', '2')->get(),
        );
        return view('coach.lessons.index', ['data' => $data]);
    }

    function add(){
        $equip = userEquipment::where('user_id', Auth::id())->get();
        $categories = sportsCategory::orderBy('name')->get();

        return view('coach.lessons.add', ['equip' => $equip, 'categories' => $categories]);
    }

    function insert(Request $request){
        $data = $request->all();
        $id = lessons::addLesson($data);
        if(!empty($data['skill_level'])){
            foreach($data['skill_level'] as $val){
                $s = new skills;
                $s->lesson_id = $id;
                $s->skills = $val;
                $s->save();
            }
        }
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/user/lessons/main_image/'), $filename);

            lessons::updateImage($id, $filename);
        }

        if(!empty($request->file('media'))){
            foreach($request->file('media') as $file)
            {
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = $id.'-'.$filename;
                $mid = medias::addMedia($id, $filename);
                $file->move(base_path('/public/storage/user/lessons/media/'), $mid.'-'.$filename); 
            }
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
        skills::where('lesson_id', $id)->delete();
        if(!empty($data['skill_level'])){
            foreach($data['skill_level'] as $val){
                $s = new skills;
                $s->lesson_id = $id;
                $s->skills = $val;
                $s->save();
            }
        }
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/storage/user/lessons/main_image/'), $filename);

            lessons::updateImage($id, $filename);
        }
        
        if(!empty($request->file('media'))){
            foreach($request->file('media') as $file)
            {
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = $id.'-'.$filename;
                $mid = medias::addMedia($id, $filename);
                $file->move(base_path('/public/storage/user/lessons/media/'), $mid.'-'.$filename); 
            }
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

    function moveLessonDraft($id){
        $id = base64_decode($id);

        $l = lessons::find($id);
        $l->status = '2';
        $l->save();


        return redirect()->back()->with('success', 'Lesson moved to Draft.');
    }

    function moveLessonPaused($id){
        $id = base64_decode($id);

        $l = lessons::find($id);
        $l->status = '0';
        $l->save();


        return redirect()->back()->with('success', 'Lesson moved to Paused.');
    }

    function moveLessonActive($id){
        $id = base64_decode($id);

        $l = lessons::find($id);
        $l->status = '1';
        $l->save();


        return redirect()->back()->with('success', 'Lesson moved to Active.');
    }


    function getSports($id){
        $data = sports::where('category_id', $id)->orderBy('name')->get();

        return view('coach.lessons.response.sports_name', ['sports' => $data]);
    }


    function favouriteLesson(){
        
   
        $data=FL::where('user_id', Auth::id())->get();
        // dd($data);

        return view('coach.favouriteLesson',['data' => $data]);
    }
    
    function deleteMedia($id){
        $id = base64_decode($id);

        medias::destroy($id);


        return redirect()->back()->with('success', 'Media Item Deleted.');
    }
}
