<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\activity\activities;

class locations extends Model
{
    use HasFactory;
    protected $table = 'tbl_buddy_activity_location';
    public $timestamps = false;




    public function activity(){
        return $this->belongsTo(activities::class, 'activity_id');
    }
}
