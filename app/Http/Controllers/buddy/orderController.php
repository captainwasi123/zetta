<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use App\Models\lesson\lessonFroms;
use App\Models\lesson\Locations;
use Illuminate\Http\Request;
use App\Models\lesson\orders;
use App\Models\User;
use Auth;

class orderController extends Controller
{
    //
    function index(){
        $data = orders::where('buyer_id', Auth::id())->latest()->get();

        return view('buddy.orders.index', ['data' => $data]);
    }

    public function orderView($id)
    {
        $id = base64_decode($id);
        $data = orders::with(['buyer','lesson','forms'])->find($id);
        $locations = Locations::where('lesson_id',$data->lesson_id)->get();
        if ($data->lesson->group_members != null) {
            $d= orders::where('lesson_id',$data->lesson_id)->get();
            $buyer = [];
            foreach ($d as $key => $value) {
                $buyer[$key] = $value->buyer_id;
            }
            $group = User::whereIn('id',$buyer)->get();
            return view('buddy.orders.orderview',['data'=>$data,'location'=>$locations,'buyers'=>$group]);

        }else{
            return view('buddy.orders.orderview',['data'=>$data,'location'=>$locations]);
        }
    }

}
