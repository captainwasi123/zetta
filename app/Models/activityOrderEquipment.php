<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\userEquipment;

class activityOrderEquipment extends Model
{
    use HasFactory;
    protected $table = 'tbl_orders_activity_equiment_info';
    public $timestamps = false;


    public function equip(){
        return $this->belongsTo(userEquipment::class, 'equipment_id');
    }
}
