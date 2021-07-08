<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class userLang extends Model
{
    use HasFactory;

    protected $table = 'tbl_users_lang_info';

    public $timestamps = false;

    public static function addLang(array $data){
		$l = new userLang;
		$l->user_id = Auth::id();
		$l->language = $data['lang'];
		$l->level = $data['lang_level'];
		$l->save();
    }
}
