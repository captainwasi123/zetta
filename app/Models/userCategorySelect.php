<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User;
use App\Models\sportsCategory;

class userCategorySelect extends Model
{
    use HasFactory;
    protected $table = 'tbl_users_category_select_info';
    public $timestamps = false;

    public static function addCategory($id){
        $c = new userCategory;
        $c->user_id = Auth::id();
        $c->cat_id = $id;
        $c->save();
    }


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cat(){
        return $this->belongsTo(sportsCategory::class, 'cat_id');
    }
}
