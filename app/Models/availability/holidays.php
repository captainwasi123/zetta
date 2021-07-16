<?php

namespace App\Models\availability;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class holidays extends Model
{
    use HasFactory;
    protected $table = 'tbl_coach_holidays';
    public $timestamps = false;

    public static function addHoliday($date){
        $h = new holidays;
        $h->user_id = Auth::id();
        $h->date = date('Y-m-d', strtotime($date));
        $h->save();
    }
}
