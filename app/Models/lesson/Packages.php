<?php

namespace App\Models\lesson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lesson\PackageDetails;

class Packages extends Model
{
    use HasFactory;
    protected $table = 'tbl_coach_lesson_packages';
    public $timestamps = false;

    public static function addPackage($id, array $pack){
        if(!empty($pack['basic'])){
            $p = new Packages;
            $p->lesson_id = $id;
            $p->title = 'Basic';
            $p->price = $pack['basic']['price'];
            $p->save();

            Packages::addDetails($p->id, $pack['basic']['service']);
        }
        if(!empty($pack['standard'])){
            $p = new Packages;
            $p->lesson_id = $id;
            $p->title = 'Standard';
            $p->price = $pack['standard']['price'];
            $p->save();

            Packages::addDetails($p->id, $pack['standard']['service']);
        }
        if(!empty($pack['premium'])){
            $p = new Packages;
            $p->lesson_id = $id;
            $p->title = 'Premium';
            $p->price = $pack['premium']['price'];
            $p->save();

            Packages::addDetails($p->id, $pack['premium']['service']);
        }
    }

    public static function addDetails($id, array $data){
        foreach($data as $val){
            if(!empty($val)){
                $d = new PackageDetails;
                $d->package_id = $id;
                $d->service = $val;
                $d->save();
            }
        }
    }

    public function details(){
        return $this->hasMany(PackageDetails::class, 'package_id', 'id');
    }
}
