<?php

namespace App\Models;

use App\Models\activity\activities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteActivity extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_favourite_activity';


    public function activity()
    {
        return $this->belongsTo(activities::class,'activity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
