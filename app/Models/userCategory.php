<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class userCategory extends Model
{
    use HasFactory;
    protected $table = 'tbl_users_category_info';

    public static function addCategory(array $data){
        $c = new userCategory;
        $c->user_id = Auth::id();
        $c->name = $data['category'];
        $c->accomplishment = $data['accomp'];
        $c->skill_level = $data['skill_level'];
        $c->save();
    }
}
