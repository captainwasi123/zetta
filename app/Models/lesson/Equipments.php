<?php

namespace App\Models\lesson;
use App\Models\userEquipment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    use HasFactory;
    protected $table = 'tbl_coach_lesson_equipments';
    public $timestamps = false;
    
    public function user_equipment(){
        return $this->belongsTo(userEquipment::class, 'equip_id');
    }

}
