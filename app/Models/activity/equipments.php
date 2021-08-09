<?php

namespace App\Models\activity;

use App\Models\userEquipment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipments extends Model
{
    use HasFactory;
    protected $table = 'tbl_buddy_activity_equipments';
    public $timestamps = false;

    public function user_equipment(){
        return $this->belongsTo(userEquipment::class, 'equip_id');
    }
}
