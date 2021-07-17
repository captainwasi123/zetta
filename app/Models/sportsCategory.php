<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sportsCategory extends Model
{
    use HasFactory;
    protected $table = 'tbl_sports_category_info';

    public static function addCategory(array $data){
        $c = new sportsCategory;
        $c->name = $data['name'];
        $c->save();

        return $c->id;
    }

    public static function updateCategory(array $data){
        $c = sportsCategory::find(base64_decode($data['cid']));
        $c->name = $data['name'];
        $c->save();

        return $c->id;
    }

    public static function addFeatureImage($id, $filename){
        $l = sportsCategory::find($id);
        $l->image = $filename;
        $l->save();
    }
}
