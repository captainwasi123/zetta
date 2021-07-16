<?php

namespace App\Models\availability;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lesson\lessons;
use Auth;

class slots extends Model
{
    use HasFactory;
    protected $table = 'tbl_coach_availability_slots';

    public static function addSlot($data){
        $s = new slots;
        $s->user_id = Auth::id();
        $s->lesson_id = $data['lesson_id'];
        $s->day = $data['day'];
        $s->start_time = $data['start_time'];
        $s->end_time = $data['end_time'];
        $s->save();
    }


    public function lesson(){
        return $this->belongsTo(lessons::class, 'lesson_id');
    }
}
