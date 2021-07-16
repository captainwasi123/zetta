<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipments extends Model
{
    use HasFactory;
    protected $table = 'tbl_buddy_activity_equipments';
    public $timestamps = false;
}
