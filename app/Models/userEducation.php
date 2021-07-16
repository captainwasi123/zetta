<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class userEducation extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_education_info';

    public static function addEdu(array $data){
        $l = new userEducation;
        $l->user_id = Auth::id();
        $l->degree = $data['degree'];
        $l->institute = $data['institute'];
        $l->finish_year = $data['finish_year'];
        $l->save();
    }
}
