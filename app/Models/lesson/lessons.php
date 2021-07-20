<?php

namespace App\Models\lesson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lesson\Equipments;
use App\Models\lesson\Locations;
use App\Models\lesson\Packages;
use App\Models\lesson\orders;
use App\Models\User;
use Auth;

class lessons extends Model
{
    use HasFactory;
    protected $table = 'tbl_coach_lesson_info';

    public static function addLesson(array $data){
        $l = new lessons;
        $l->user_id = Auth::id();
        $l->title = $data['title'];
        $l->description = $data['description'];
        $l->location_covered = $data['locationType'];
        $l->skills_level = $data['skill_level'];
        $l->participants = $data['participants'];
        $l->group_members = empty($data['group_members']) ? null : $data['group_members'];
        $l->availability = $data['availability'];
        $l->status = '1';
        $l->save(); 
        $id = $l->id;

        lessons::addEquipment($id, $data['equipments']);
        lessons::addLocation($id, $data['location']);
        $pack = array(
            'basic' => array(
                'price' => $data['price_basic'],
                'service' => $data['service_basic']
            ),
            'standard' => array(
                'price' => $data['price_standard'],
                'service' => $data['service_standard']
            ),
            'premium' => array(
                'price' => $data['price_premium'],
                'service' => $data['service_premium']
            )
        );

        Packages::addPackage($id, $pack);
        return $id;
    }

    public static function editLesson(array $data){
        $l = lessons::find(base64_decode($data['lid']));
        $l->title = $data['title'];
        $l->description = $data['description'];
        $l->location_covered = $data['locationType'];
        $l->skills_level = $data['skill_level'];
        $l->participants = $data['participants'];
        $l->group_members = empty($data['group_members']) ? null : $data['group_members'];
        $l->availability = $data['availability'];
        $l->save(); 
        $id = $l->id;

        Equipments::where('lesson_id', $id)->delete();
        Locations::where('lesson_id', $id)->delete();
        Packages::where('lesson_id', $id)->delete();
        
        lessons::addEquipment($id, $data['equipments']);
        lessons::addLocation($id, $data['location']);
        $pack = array(
            'basic' => array(
                'price' => $data['price_basic'],
                'service' => $data['service_basic']
            ),
            'standard' => array(
                'price' => $data['price_standard'],
                'service' => $data['service_standard']
            ),
            'premium' => array(
                'price' => $data['price_premium'],
                'service' => $data['service_premium']
            )
        );

        Packages::addPackage($id, $pack);
        return $id;
    }

    public static function addEquipment($id, array $data){
        foreach($data as $val){
            $e = new Equipments;
            $e->lesson_id = $id;
            $e->equip_id = $val;
            $e->save();
        }
    }

    public static function addLocation($id, array $data){
        foreach($data as $val){
            $e = new Locations;
            $e->lesson_id = $id;
            $e->address = $val;
            $e->save();
        }
    }

    public static function updateImage($id, $filename){
        $i = lessons::find($id);
        $i->cover_img = $filename;
        $i->save();
    }




    public function equipment(){
        return $this->hasMany(Equipments::class, 'lesson_id', 'id');
    }

    public function locations(){
        return $this->hasMany(Locations::class, 'lesson_id', 'id');
    }

    public function packages(){
        return $this->hasMany(Packages::class, 'lesson_id', 'id');
    }

    public function activeOrders(){
        return $this->hasMany(orders::class, 'lesson_id', 'id')->where('status', '1');
    }
    public function cancelOrders(){
        return $this->hasMany(orders::class, 'lesson_id', 'id')->where('status', '2');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
