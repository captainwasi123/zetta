<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redeemReward extends Model
{
    use HasFactory;
    protected $table = 'tbl_redeem_rewards_info';

    public static function addRewards(array $data){
        $r = new redeemReward;
        $r->cost = $data['cost'];
        $r->reward = $data['reward'];
        $r->save();
    }
}
