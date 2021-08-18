<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User;
use App\Models\sportsCategory;

class userCategory extends Model
{
    use HasFactory;
    protected $table = 'tbl_users_category_info';

    public static function addCategory(array $data){
        $c = new userCategory;
        $c->user_id = Auth::id();
        $c->name = $data['category'];
        $c->save();
    }


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cat(){
        return $this->belongsTo(sportsCategory::class, 'name', 'name');
    }
}
