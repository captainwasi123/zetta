<?php

namespace App\Models\activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medias extends Model
{
    use HasFactory;
    protected $table = 'tbl_buddy_activity_media';
    public $timestamps = false;

    public static function addMedia($id, $filename){
        $m = new medias;
        $m->activity_id = $id;
        $m->media = $filename;
        $m->save();

        return $m->id;
    }
}
