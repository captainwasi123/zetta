<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redeemBadges extends Model
{
    use HasFactory;
    protected $table='tbl_redeem_bages_info';



    // public static function addbadges(array $data){
    //     $c = new redeemBadges;
    //     $c->title = $data['title'];
    //     $c->save();

    //     return $c->id;
    // }

    // public static function updatebadges(array $data){
    //     $c = redeemBadges::find(base64_decode($data['bid']));
    //     $c->title = $data['title'];
    //     $c->save();

    //     return $c->id;
    // }

    // public static function addFeatureImage($id, $filename){
    //     $l = redeemBadges::find($id);
    //     $l->image = $filename;
    //     $l->save();
    // }
}
