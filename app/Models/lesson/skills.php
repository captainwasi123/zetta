<?php

namespace App\Models\lesson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skills extends Model
{
    use HasFactory;
    protected $table = 'tbl_coach_lesson_skills';
    public $timestamps = false;
}
