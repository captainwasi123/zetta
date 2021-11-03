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
use App\Models\User;
use App\Models\availability\holidays;
use App\Models\availability\slots;
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

                $holiday = array();
                $holiarr = array();
                $holi = holidays::where('user_id', $data->user_id)->get();
                $slots = slots::where('lesson_id', $data->id)->get();

                foreach ($holi as $key => $value) {
                    $day = array();
                    array_push($day, date('n', strtotime($value->date)));
                    array_push($day, date('j', strtotime($value->date)));
                    array_push($day, date('Y', strtotime($value->date)));
                    
                    array_push($holiday, $day);
                    
                    array_push($holiarr, $value->holiday);
                    
                }
                return view('web.cart', ['data' => $data, 'pack' => $packk, 'type' => $type,'price'=>$price, 'holiday' => $holiday, 'slots' => $slots]);
            }else{
                return redirect('/');
            }
        }

        if ($type == 'activity') {
            $data = activities::find($id);
            $userequipment = userEquipment::get();
            $price = 0;
            if (count($data->equipment)>0){
                $ids = [];

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
                'earning' => ($lesson->packages[$pack]->price - ($lesson->packages[$pack]->price/100)*$saleSetting->commision),
                'booking_date' => empty($data['booking_date']) ? null : date('Y-m-d', strtotime($data['booking_date'])),
                'booking_time' => empty($data['booking_time']) ? null : date('H:i:s', strtotime($data['booking_time'])),
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
            $price = 0;
            if (count($act->equipment)>0){
                $ids = [];

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
            $priceDed = $odata['price'];

            $oid = ActivityOrders::newOrder($odata);
        }

        if($priceDed == 0){
            return redirect('/order/confirmed/free/'.$oid.'/'.$type);
        }else{
            return view('web.payment', ['type' => $type, 'id' => $oid, 'amount' => $priceDed]);
        }
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
    public function orderComfirmedFree($id, $type){
        if($type == 'lesson'){
            $d = lessonOrders::find($id);
            $d->status = '1';
            $d->save();
        }elseif($type == 'activity'){
            $d = ActivityOrders::find($id);
            $d->status = '1';
            $d->save();
        }

        return redirect('/')->with('success', 'Order Confirmed.');
    }

    public function getSlots($date){
        $data = explode('|', $date);
        $day = date('l', strtotime($data[0]));

        $slots = slots::where('lesson_id',$data[1])->where('day',$day)->get();
        $lesson = lessons::find($data[1]);
        $duration = empty($lesson->packages[$data[2]]->duration) ? 0 : $lesson->packages[$data[2]]->duration;
        $select = '';
        foreach($slots as $val){
            $booked = lessonOrders::where('lesson_id', $data[1])
                                    ->where('booking_date', date('Y-m-d', strtotime($data[0])))
                                    ->where('booking_time', $val->start_time)->first();

           $x = 0;
           $buffer = 30; 
           $start = $val->start_time; 
           $end = $val->end_time; 
           $end = date('H:i:s',strtotime('-'.$buffer.' minutes',strtotime($end)));
           while($start <= $end){
                $select .= '<option value="'.$start.'">'.date('H:i:s', strtotime($start)).'</option>';

                $start = date('H:i:s',strtotime('+'.$duration.' minutes',strtotime($start))); $x++;
           }
        }
        if(count($slots) == 0){
            $select = '<option value="">No Slots Available</option>';
        }
        return $select;
    }
}
