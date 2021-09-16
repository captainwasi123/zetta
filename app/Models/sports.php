<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sportsCategory;

class sports extends Model
{
    use HasFactory;
    protected $table = 'tbl_sports_info';

    public static function addSports(array $data){
        $c = new sports;
        $c->name = $data['name'];
        $c->category_id = $data['category_id'];
        $c->save();

        return $c->id;
    }

    public static function updateSports(array $data){
        $c = sports::find(base64_decode($data['sid']));
        $c->name = $data['name'];
        $c->category_id = $data['category_id'];
        $c->save();

        return $c->id;
    }

    public static function addFeatureImage($id, $filename){
        $l = sports::find($id);
        $l->image = $filename;
        $l->save();
    }

    public function category(){
        return $this->belongsTo(sportsCategory::class, 'category_id');
    }
}
