<?php

namespace App\Models\lesson;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessonFroms extends Model
{
    use HasFactory;
    protected $table = 'tbl_coach_lesson_forms';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
