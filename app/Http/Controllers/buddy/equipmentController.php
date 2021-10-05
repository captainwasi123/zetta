<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userEquipment;
use App\Models\sportsCategory;

class equipmentController extends Controller
{
    //
    public function index()
    {

      return view('buddy.equipment.index');

    }

    function add(){
        $data['categories'] = sportsCategory::all();
 
        return view('buddy.equipment.add')->with($data);
    }

    function insert(Request $request){
        $data = $request->all();
        $id = userEquipment::addEquipment($data);

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/user/equipment/'), $filename);

            userEquipment::updateImage($id, $filename);
        }

        return redirect()->back()->with('success', 'New Equipment Added.');
    }

    function edit($id){
        $id = base64_decode($id);
        $data = userEquipment::find($id);
        $categories = sportsCategory::all();
        if(!empty($data->id)){
            return view('buddy.equipment.edit', ['data' => $data, 'categories' => $categories]);
        }else{
            return redirect()->back();
        }
    }
    function update(Request $request){
        $data = $request->all();
        $id = base64_decode($data['eid']);
        userEquipment::updateEquipment($data);

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
            $filename = $id.'-'.$filename;
            $file->move(base_path('/public/user/equipment/'), $filename);

            userEquipment::updateImage($id, $filename);
        }

        return redirect()->back()->with('success', 'Equipment Updated.');
    }

    function delete($id){
        $id = base64_decode($id);
        $data = userEquipment::destroy($id);

        return redirect()->back()->with('success', 'Record Deleted.');
    }
}
