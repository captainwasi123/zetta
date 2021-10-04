<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\sportsCategory;
use App\Models\sports;

class userEquipment extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_equipment_info';

    public static function addEquipment(array $data){
        $l = new userEquipment;
        $l->user_id = Auth::id();
        $l->name = $data['name'];
        $l->category_id = $data['category'];
        $l->sports_id = $data['sports'];
        $l->qty = $data['qty'];
        $l->package = $data['package'];
        $l->price = empty($data['price']) ? null : $data['price'];
        $l->save();

        return $l->id;
    }

    public static function updateEquipment(array $data){
        $l = userEquipment::find(base64_decode($data['eid']));
        $l->name = $data['name'];
        $l->category_id = $data['category'];
        $l->sports_id = $data['sports'];
        $l->qty = $data['qty'];
        $l->package = $data['package'];
        $l->price = empty($data['price']) ? null : $data['price'];
        $l->save();
    }

    public static function updateImage($id, $filename){
        $i = userEquipment::find($id);
        $i->image = $filename;
        $i->save();
    }

    public function category(){
        return $this->belongsTo(sportsCategory::class, 'category_id');
    }

    public function sports(){
        return $this->belongsTo(sports::class, 'sports_id');
    }
}
