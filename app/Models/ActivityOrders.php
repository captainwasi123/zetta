<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityOrders extends Model
{
    use HasFactory;
    protected $table = "tbl_orders_activity_info";

    public static function newOrder(array $data){
        $o = new ActivityOrders;
        $o->activity_id = $data['activity_id'];
        $o->seller_id = $data['seller_id'];
        $o->buyer_id = \Auth::id();
        $o->price = $data['price'];
        $o->commision = $data['commision'];
        $o->earning = $data['earning'];
        $o->status = '1';
        $o->save();

        return $o->id;
    }


    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id');
    }
    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function activity(){
        return $this->belongsTo(lessons::class, 'activity_id');
    }
}
