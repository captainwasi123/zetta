<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lesson\lessons;
use App\Models\availability\slots;
use App\Models\availability\holidays;
use Auth;

class availabilityController extends Controller
{
    //
    function index(){
        $lessons = lessons::where('user_id', Auth::id())->get();
        $slots = slots::where('user_id', Auth::id())->get();
        $holidays = holidays::where('user_id', Auth::id())->get();

        return view('coach.availability.index', ['lessons' => $lessons, 'slots' => $slots, 'holidays' => $holidays]);
    }

    function insertSlot(Request $request){
        $data = $request->all();
        slots::addSlot($data);
        
        return redirect()->back()->with('success', 'New Slot Added.');
    }

    function delete($id){
        $id = base64_decode($id);
        slots::destroy($id);


        return redirect()->back()->with('success', 'Slot Deleted.');
    }


    function insertHoliday(Request $request){
        $data = $request->all();
        holidays::addHoliday($data['holidate']);

        return redirect()->back()->with('success', 'New Holiday Added.');
    }

    function deleteHoliday($id){
        $id = base64_decode($id);
        holidays::destroy($id);


        return redirect()->back()->with('success', 'Holiday Deleted.');
    }
}
