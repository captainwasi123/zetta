<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class earningHistory extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_earning_history';

    public static function addHistory($id, $amount){
        $h = new earningHistory;
        $h->user_id = $id;
        $h->amount = $amount;
        $h->save();
    }
}
