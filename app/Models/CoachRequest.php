<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachRequest extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_coach_request';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
