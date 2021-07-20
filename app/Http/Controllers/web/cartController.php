<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lesson\lessons;
use App\Models\lesson\orders as lessonOrders;
use App\Models\activity\activities;
use App\Models\saleSetting;
use Auth;

class cartController extends Controller
{
    //
    function cart($type, $id, $pack){
        $id = base64_decode($id);
        $packk = '';
        switch ($pack) {
            case 'basic':
                $packk = 0;
                break;

            case 'standard':
                $packk = 1;
                break;

            case 'premium':
                $packk = 2;
                break;
            
            default:
                // code...
                break;
        }
        if($type == 'lesson'){

            $data = lessons::find($id);
            if(!empty($data->id)){

                return view('web.cart', ['data' => $data, 'pack' => $packk, 'type' => $type]);
            }else{
                return redirect('/');
            }
        }
    }



    //Checkout
    function checkout(Request $request){
        $data = $request->all();
        $lid = base64_decode($data['lid']);
        $pack = base64_decode($data['pack_id']);
        $type = base64_decode($data['type']);
        $saleSetting = saleSetting::first();

        if($type == 'lesson'){
            $lesson = lessons::find($lid);
            $odata = array(
                'lesson_id' => $lid,
                'seller_id' => $lesson->user_id,
                'plan' => $pack,
                'price' => $lesson->packages[$pack]->price,
                'commision' =>  ($lesson->packages[$pack]->price/100)*$saleSetting->commision,
                'earning' => ($lesson->packages[$pack]->price - ($lesson->packages[$pack]->price/100)*$saleSetting->commision)
            );
            $oid = lessonOrders::newOrder($odata);

            return redirect()->back()->with('success', 'Order Submited. Order#: '.$oid);
        }

    }
}
