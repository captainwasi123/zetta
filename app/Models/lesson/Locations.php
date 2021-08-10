<?php

namespace App\Models\lesson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lesson\lessons;

class Locations extends Model
{
    use HasFactory;
    protected $table = 'tbl_coach_lesson_location';
    public $timestamps = false;
 

    public function lesson(){
        return $this->belongsTo(lessons::class, 'lesson_id');
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
}
