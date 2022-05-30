<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lesson\lessonFroms;
use App\Models\activity\locations;
use App\Models\ActivityOrders;
use App\Models\User;
use App\Models\reviews;
use Auth;

class activityOrderController extends Controller
{
    //
    function index(){
        $data = ActivityOrders::where('seller_id', Auth::id())->where('status', '1')->latest()->get();

        return view('buddy.activityOrders.index', ['data' => $data, 'status' => '1']);
    }

    function cancelled(){
        $data = ActivityOrders::where('seller_id', Auth::id())->where('status', '2')->latest()->get();

        return view('buddy.activityOrders.index', ['data' => $data, 'status' => '2']);
    }

    public function orderView($id)
    {
        $id = base64_decode($id);
        $data = ActivityOrders::find($id);
        $locations = locations::where('activity_id',$data->activity_id)->get();
        if ($data->activity->group_members != null) {
            $d= ActivityOrders::where('activity_id',$data->activity_id)->get();
            $buyer = [];
            foreach ($d as $key => $value) {
                $buyer[$key] = $value->buyer_id;
            }
            $group = User::whereIn('id',$buyer)->get();
            return view('buddy.activityOrders.orderview',['data'=>$data,'location'=>$locations,'buyers'=>$group]);

        }else{
            return view('buddy.activityOrders.orderview',['data'=>$data,'location'=>$locations]);
        }
    }
}
