<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\country;
use App\Models\userLang;
use App\Models\userCategory;
use App\Models\userEducation;
use App\Models\userCertificate;
use App\Models\userEquipment;
use App\Models\lesson\lessons;
use App\Models\activity\activities;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_users_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function adduser(array $data){
        $u = new User;
        $u->email = $data['email'];
        $u->password = bcrypt($data['password']);
        $u->source = '1';
        $u->status = '1';
        $u->type   = $data['user_type'];
        $u->save();
    }


    public function country(){
        return $this->belongsTo(country::class, 'country_id');
    }
    
    public function langs(){
        return $this->hasMany(userLang::class, 'user_id', 'id');
    }
    public function category(){
        return $this->hasMany(userCategory::class, 'user_id', 'id');
    }
    public function education(){
        return $this->hasMany(userEducation::class, 'user_id', 'id')->orderBy('finish_year', 'desc');
    }
    public function certificate(){
        return $this->hasMany(userCertificate::class, 'user_id', 'id');
    }
    public function equipment(){
        return $this->hasMany(userEquipment::class, 'user_id', 'id');
    }


    public function lessons(){
        return $this->hasMany(lessons::class, 'user_id', 'id');
    }
    public function activities(){
        return $this->hasMany(activities::class, 'user_id', 'id');
    }

}
