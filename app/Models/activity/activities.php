<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\activity\equipments;
use App\Models\activity\locations;
use Auth;
use App\Models\User;

class activities extends Model
{
    use HasFactory;
    protected $table = 'tbl_buddy_activity_info';

    public static function addActivity(array $data){
        $l = new activities;
        $l->user_id = Auth::id();
        $l->title = $data['title'];
        $l->description = $data['description'];
        $l->location_covered = $data['locationType'];
        $l->group_members = empty($data['group_members']) ? null : $data['group_members'];
        $l->activity_type = $data['activityType'];
        $l->status = '1';
        $l->save();
        $id = $l->id;

        activities::addEquipment($id, $data['equipments']);
        activities::addLocation($id, $data);
        activities::addFriend($id,$data);
        return $id;
    }

    public static function editActivity(array $data){
        $l = activities::find(base64_decode($data['aid']));
        $l->title = $data['title'];
        $l->description = $data['description'];
        $l->location_covered = $data['locationType'];
        $l->group_members = empty($data['group_members']) ? null : $data['group_members'];
        $l->activity_type = $data['activityType'];
        $l->save();
        $id = $l->id;


        equipments::where('activity_id', $id)->delete();
        locations::where('activity_id', $id)->delete();
        friends::where('activity_id', $id)->delete();
        activities::addEquipment($id, $data['equipments']);
        activities::addLocation($id, $data);
        activities::addFriend($id,$data);
        return $id;
    }



    public static function addEquipment($id, array $data){
        foreach($data as $val){
            $e = new equipments;
            $e->activity_id = $id;
            $e->equip_id = $val;
            $e->save();
        }
    }

    public static function addFriend($id, array $data){
            $e = new friends();
            $e->activity_id = $id;
            $e->friend_id = $data['friend'];
            $e->save();
    }

    public static function addLocation($id, array $data){
        $new = [];
        foreach($data['location'] as $k => $val){
            $new[$k]['activity_id'] = $id;
            $new[$k]['address'] = $val;
            $new[$k]['lat'] = $data['lat'];
            $new[$k]['lng'] = $data['lng'];

            // $e = new Locations;
            // $e->lesson_id = $id;
            // $e->address = $val;
            // $e->lat = $data['lat'];
            // $e->lat = $data['lng'];
            // $e->save();
        }
        Locations::insert($new);
    }

    public static function updateImage($id, $filename){
        $i = activities::find($id);
        $i->cover_img = $filename;
        $i->save();
    }



    public function equipment(){
        return $this->hasMany(equipments::class, 'activity_id', 'id');
    }

    public function locations(){
        return $this->hasMany(locations::class, 'activity_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friend(){
        return $this->belongsTo(friends::class,'activity_id','id');
    }

    public function fav_act()
    {
        return $this->belongsTo(friends::class,'activity_id');
    }
}
