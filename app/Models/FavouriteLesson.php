<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteLesson extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_favourite_lesson';


    public function lesson()
    {
        return $this->belongsTo(activities::class,'lesson_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
