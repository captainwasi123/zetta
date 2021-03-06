<?php

namespace App\Models\lesson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\lesson\lessons;
use App\Models\userWallet;
use App\Models\lesson\orderSessions;
use App\Models\orders\equipments as lessonOrderEquipment;
use Auth;

class orders extends Model
{
    use HasFactory;
    protected $table = 'tbl_orders_lesson_info';

    public static function newOrder(array $data){
        $o = new orders;
        $o->lesson_id = $data['lesson_id'];
        $o->seller_id = $data['seller_id'];
        $o->buyer_id = \Auth::id();
        $o->plan = $data['plan'];
        $o->price = $data['price'];
        $o->qty = $data['qty'];
        $o->commision = $data['commision'];
        $o->earning = $data['earning'];
        $o->booking_date = $data['booking_date'];
        $o->booking_time = $data['booking_time'];
        $o->status = '9';
        $o->save();

        userWallet::addBalance($data['seller_id'], $data['earning']);
        return $o->id;
    }


    public function equipments(){
        return $this->hasMany(lessonOrderEquipment::class, 'order_id', 'id');
    }
    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id');
    }
    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function lesson(){
        return $this->belongsTo(lessons::class, 'lesson_id');
    }

    public function forms()
    {
        return $this->hasMany(lessonFroms::class, 'order_id','id');
    }
    public function sessions()
    {
        return $this->hasMany(orderSessions::class, 'order_id','id');
    }
    public function sessionsCompleted()
    {
        return $this->hasMany(orderSessions::class, 'order_id','id')->where('status', '2');
    }
}
