<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class reviews extends Model
{
    use HasFactory;
    protected $table = 'tbl_review_info';

    public function user(){
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
