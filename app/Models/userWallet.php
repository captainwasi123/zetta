<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\earningHistory;
use Auth;

class userWallet extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_wallet_info';
    public $timestamps = false;

    public static function addBalance($id, $balance){
        $w = userWallet::where('user_id', $id)->first();
        if(empty($w->user_id)){
            $w = new userWallet;
            $w->user_id = $id;
            $w->balance = $balance;
            $w->save();
        }else{
            $w->balance = $w->balance+$balance;
            $w->save();
        }

        earningHistory::addHistory($id, $balance);
        
    }


}
