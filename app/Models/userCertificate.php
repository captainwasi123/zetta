<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class userCertificate extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_certificate_info';

    public static function addCertificate(array $data){
        $l = new userCertificate;
        $l->user_id = Auth::id();
        $l->certificate = $data['certificate'];
        $l->institute = $data['institute'];
        $l->save();
    }
}
