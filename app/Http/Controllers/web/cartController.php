<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lesson\lessons;
use App\Models\lesson\orders as lessonOrders;
use App\Models\activity\activities;
use App\Models\ActivityOrders;
use App\Models\saleSetting;
use App\Models\userEquipment;
use Auth;

use Stripe;
use StripeClient;

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
            $price = null;
            if(!empty($data->id)){
                return view('web.cart', ['data' => $data, 'pack' => $packk, 'type' => $type,'price'=>$price]);
            }else{
                return redirect('/');
            }
        }

        if ($type == 'activity') {
            $data = activities::find($id);
            $userequipment = userEquipment::get();
            if (count($data->equipment)>0){
                $ids = [];
                $price = 0;

                foreach ($data->equipment as $k => $val){
                    $ids[$k] = $val->equip_id;
                }

                foreach ($userequipment->whereIn('id',$ids) as $equ){
                    $price += $equ->price;
                }
            }
            if(!empty($data->id)){
                return view('web.cart', ['data' => $data, 'pack' => $packk, 'type' => $type,'price'=>$price]);
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
        $priceDed = 0;
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

            $priceDed = $odata['price'];
            $oid = lessonOrders::newOrder($odata);
        }
        if($type == 'activity'){
            $data = $request->all();
            $aid = base64_decode($data['lid']);
            $pack = base64_decode($data['pack_id']);
            $type = base64_decode($data['type']);
            $userequipment = userEquipment::get();
            $act = activities::find($aid);
            if (count($act->equipment)>0){
                $ids = [];
                $price = 0;

                foreach ($act->equipment as $k => $val){
                    $ids[$k] = $val->equip_id;
                }

                foreach ($userequipment->whereIn('id',$ids) as $equ){
                    $price += $equ->price;
                }
            }

            $odata = array(
                'activity_id' => $aid,
                'seller_id' => $act->user_id,
                'price' => $price,
                'commision' =>  ($price/100)*$saleSetting->commision,
                'earning' => ($price - ($price/100)*$saleSetting->commision)
            );

            $priceDed = $odata['price'];
            $oid = ActivityOrders::newOrder($odata);
        }

        return view('web.payment', ['type' => $type, 'id' => $oid, 'amount' => $priceDed]);

    }

    //Payment
    public function stripePayment(Request $request)
    {
        \Stripe\Stripe::setApiKey(
          env('STRIPE_PRIVATE_KEY')
        );
        $charge_amount = $request->get('amount')*100;
        $paymentIntent = \Stripe\PaymentIntent::create([
          'amount' => $charge_amount,
          'currency' => 'usd'
        ]);
        
        return response()->json($paymentIntent);
       
    }
    
    public function orderComfirmed($id, $type){
        if($type == 'lesson'){
            $d = lessonOrders::find($id);
            $d->status = '1';
            $d->save();
        }elseif($type == 'activity'){
            $d = ActivityOrders::find($id);
            $d->status = '1';
            $d->save();
        }

        return 'success';
    }
}
