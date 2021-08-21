<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redeemChallenges extends Model
{
    use HasFactory;
    protected $table = 'tbl_redeem_challenges_info';


    public static function addChallenge(array $data){
        $c = new redeemChallenges;
        $c->title = $data['title'];
        $c->no_orders = $data['no_orders'];
        $c->rating = $data['rating'];
        $c->reward = $data['reward'];
        $c->expiry_date = date('Y-m-d', strtotime($data['expiry_date']));
        $c->status = '1';
        $c->save();
    }
}
