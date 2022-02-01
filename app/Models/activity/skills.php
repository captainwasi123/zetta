<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skills extends Model
{
    use HasFactory;
    protected $table = 'tbl_buddy_activity_skills';
    public $timestamps = false;
}
