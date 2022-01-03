<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteCoach extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_favourite_coach';


    public function coach()
    {
        return $this->belongsTo(User::class,'coach_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
