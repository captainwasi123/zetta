<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteBuddy extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_favourite_buddy';


    public function buddy()
    {
        return $this->belongsTo(activities::class,'buddy_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
