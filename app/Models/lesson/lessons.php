<?php

namespace App\Models\lesson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lesson\Equipments;
use App\Models\lesson\Locations;
use App\Models\lesson\Packages;
use App\Models\lesson\orders;
use App\Models\lesson\medias;
use App\Models\lesson\skills;
use App\Models\User;
use App\Models\FavouriteLesson;
use App\Models\sportsCategory;
use App\Models\sports;
use App\Models\availability\slots;
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
        $l->participants = $data['participants'];
        $l->group_members = empty($data['group_members']) ? null : $data['group_members'];
        $l->held_date = $data['held_date'].' '.$data['held_time'];
        $l->availability = $data['availability'];
        $l->availability_for = empty($data['availability_for']) ? null :  json_encode($data['availability_for']);

        $l->category_id = $data['category'];
        $l->sports_id = $data['sports'];
        $l->status = '1';
        $l->save();
        $id = $l->id;

        if(isset($data['equipments'])){
            lessons::addEquipment($id, $data['equipments']);
        }
        lessons::addLocation($id, $data);
        $pack = array(
            'basic' => array(
                'price' => $data['price_basic'],
                'duartion' => $data['duartion_basic'],
                'days' => $data['day_basic'],
                'service' => $data['service_basic']
            ),
            'standard' => array(
                'price' => $data['price_standard'],
                'duartion' => $data['duartion_standard'],
                'days' => $data['day_standard'],
                'service' => $data['service_standard']
            ),
            'premium' => array(
                'price' => $data['price_premium'],
                'duartion' => $data['duartion_premium'],
                'days' => $data['day_premium'],
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
        $l->participants = $data['participants'];
        $l->group_members = empty($data['group_members']) ? null : $data['group_members'];
        $l->held_date = $data['held_date'].' '.$data['held_time'];
        $l->availability = $data['availability'];
        $l->availability_for = empty($data['availability_for']) ? null :  json_encode($data['availability_for']);
        $l->category_id = $data['category'];
        $l->sports_id = $data['sports'];
        $l->save();
        $id = $l->id;

        Equipments::where('lesson_id', $id)->delete();
        Locations::where('lesson_id', $id)->delete();
        Packages::where('lesson_id', $id)->delete();

        if(isset($data['equipments'])){
            lessons::addEquipment($id, $data['equipments']);
        }
        lessons::addLocation($id, $data);
        $pack = array(
            'basic' => array(
                'price' => $data['price_basic'],
                'duartion' => $data['duartion_basic'],
                'days' => $data['day_basic'],
                'service' => $data['service_basic']
            ),
            'standard' => array(
                'price' => $data['price_standard'],
                'duartion' => $data['duartion_standard'],
                'days' => $data['day_standard'],
                'service' => $data['service_standard']
            ),
            'premium' => array(
                'price' => $data['price_premium'],
                'duartion' => $data['duartion_premium'],
                'days' => $data['day_premium'],
                'service' => $data['service_premium']
            )
        );

        Packages::addPackage($id, $pack);
        return $id;
    }

    public static function addEquipment($id, array $data){
        $new=[];
        foreach($data as $k => $val){
            $new[$k]['lesson_id'] = $id;
            $new[$k]['equip_id'] = $val;
            // $e = new Equipments;
            // $e->lesson_id = $id;
            // $e->equip_id = $val;
            // $e->save();
        }
        Equipments::insert($new);
    }

    public static function addLocation($id, array $data){
        $new1= [];
        foreach($data['location'] as $k => $val){
            $new1[$k]['lesson_id'] = $id;
            $new1[$k]['address'] = $val;
            $new1[$k]['lat'] = $data['lat'];
            $new1[$k]['lng'] = $data['lng'];

            // $e = new Locations;
            // $e->lesson_id = $id;
            // $e->address = $val;
            // $e->lat = $data['lat'];
            // $e->lat = $data['lng'];
            // $e->save();
        }
        Locations::insert($new1);
    }

    public static function updateImage($id, $filename){
        $i = lessons::find($id);
        $i->cover_img = $filename;
        $i->save();
    }
 



    public function skills(){
        return $this->hasMany(skills::class, 'lesson_id', 'id');
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
    
    public function favLesson(){
        return $this->hasMany(FavouriteLesson::class, 'lesson_id', 'id')->where('user_id', Auth::id());
    }

    public function category(){
        return $this->belongsTo(sportsCategory::class, 'category_id');
    }
    public function sports(){
        return $this->belongsTo(sports::class, 'sports_id');
    }

    public function slots(){
        return $this->hasMany(slots::class, 'lesson_id', 'id');
    }

    public function medias(){
        return $this->hasMany(medias::class, 'lesson_id', 'id');
    }
}
