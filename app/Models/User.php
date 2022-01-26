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
use App\Models\userWallet;
use App\Models\lesson\lessons;
use App\Models\lesson\orders;
use App\Models\activity\activities;
use App\Models\FavouriteCoach;
use App\Models\FavouriteBuddy;
use App\Models\FavouriteActivity;
use App\Models\FavouriteLesson;
use App\Models\friends;
use App\Models\userLevel;
use App\Models\reviews;
use App\Models\coupons;
use Auth;

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
        $u->username = $data['username'];
        $u->email = $data['email'];
        $u->password = bcrypt($data['password']);
        $u->source = '1';
        $u->status = '5';
        $u->type   = $data['user_type'];
        $u->dob   = date('Y-m-d', strtotime($data['user_dob']));
        $u->save();

        return $u->id;
    }


    public function wallet(){
        return $this->belongsTo(userWallet::class, 'id', 'user_id');
    }
    public function level(){
        return $this->belongsTo(userLevel::class, 'level_status');
    }
    public function coupons(){
        return $this->hasMany(coupons::class, 'user_id', 'id')->orderBy('status');
    }

    public function reviews(){
        return $this->hasMany(reviews::class, 'seller_id', 'id');
    }
    public function avgRating()
    {
        return $this->reviews()
          ->selectRaw('avg(rating) as aggregate');
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
    public function lessonOrders(){
        return $this->hasMany(orders::class, 'seller_id', 'id');
    }

    public function activities(){
        return $this->hasMany(activities::class, 'user_id', 'id');
    }

    public function media()
    {
        return $this->hasMany(userMedia::class, 'user_id', 'id');
    }

    public function fav_activity()
    {
        return $this->hasMany(FavouriteActivity::class,'user_id','id');
    }
    public function fav_lesson()
    {
        return $this->hasMany(FavouriteLesson::class,'user_id','id');
    }

    public function coach_request()
    {
        return $this->belongsTo(CoachRequest::class ,'user_id');
    }


    //Favorite
        public function favCoach(){
            return $this->hasMany(FavouriteCoach::class, 'coach_id', 'id')->where('user_id', Auth::id());
        }
        public function favBuddy(){
            return $this->hasMany(FavouriteBuddy::class, 'buddy_id', 'id')->where('user_id', Auth::id());
        }

    //Check Friend
        public function checkFriend(){
            return $this->hasMany(friends::class, 'friend_id', 'id')->where('user_id', Auth::id());
        }
}
