<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\activity\equipments;
use App\Models\activity\locations;
use App\Models\activity\medias;
use Auth;
use App\Models\FavouriteActivity;
use App\Models\sportsCategory;
use App\Models\sports;
use App\Models\User;
use App\Models\ActivityOrders;

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
        $l->participants = $data['participants'];
        $l->group_members = empty($data['group_members']) ? null : $data['group_members'];
        $l->activity_type = $data['activityType'];
        $l->category_id = $data['category'];
        $l->sports_id = $data['sports'];
        $l->held_date = $data['held_date'].' '.$data['held_time'];
        $l->availability = $data['availability'];

        $l->availability_for = empty($data['availability_for']) ? null :  json_encode($data['availability_for']);
        // $l->availability_for = json_encode($data['availability_for']);
        $l->status = '1';
        $l->save();
        $id = $l->id;

        if(isset($data['equipments'])){
            activities::addEquipment($id, $data['equipments']);
        }
        activities::addLocation($id, $data);
        if(isset($data['friend'])){
            activities::addFriend($id,$data);
        }
        return $id;
    }

    public static function editActivity(array $data){
        $l = activities::find(base64_decode($data['aid']));
        $l->title = $data['title'];
        $l->description = $data['description'];
        $l->location_covered = $data['locationType'];
        $l->participants = $data['participants'];
        $l->group_members = empty($data['group_members']) ? null : $data['group_members'];
        $l->activity_type = $data['activityType'];
        $l->category_id = $data['category'];
        $l->sports_id = $data['sports'];
        $l->held_date = $data['held_date'].' '.$data['held_time'];
        $l->availability = $data['availability'];
        $l->availability_for = empty($data['availability_for']) ? null :  json_encode($data['availability_for']);

        $l->save();
        $id = $l->id;


        equipments::where('activity_id', $id)->delete();
        locations::where('activity_id', $id)->delete();
        friends::where('activity_id', $id)->delete();
        if(isset($data['equipments'])){ 
            activities::addEquipment($id, $data['equipments']);
        }
        if(isset($data['location'])){
            activities::addLocation($id, $data);
        }
        if(isset($data['friend'])){
            activities::addFriend($id,$data);
        }

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
            $new[$k]['lat'] = $data['lat'][$k];
            $new[$k]['lng'] = $data['lng'][$k];
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

    
    public function favActivity(){
        return $this->hasMany(FavouriteActivity::class, 'activity_id', 'id')->where('user_id', Auth::id());
    }


    public function category(){
        return $this->belongsTo(sportsCategory::class, 'category_id');
    }
    public function sports(){
        return $this->belongsTo(sports::class, 'sports_id');
    }

    public function activeOrders(){
        return $this->hasMany(ActivityOrders::class, 'activity_id', 'id')->where('status', '1');
    }
    public function cancelOrders(){
        return $this->hasMany(ActivityOrders::class, 'activity_id', 'id')->where('status', '2');
    }


    public function medias(){
        return $this->hasMany(medias::class, 'activity_id', 'id');
    }

    // public function getAvailabilityForAttribute($value)
    // {
    //     $this->attributes['availability_for'] = json_encode($value);
    // }

    // public function setAvailabilityForAttribute($value)
    // {
    //     return $this->attributes['availability_for'] = json_decode($value);
    // }
}
