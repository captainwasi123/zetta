<?php

namespace App\Models\lesson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lesson\orders;

class orderSessions extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_lession_session_info';


    public function orders(){
        return $this->belongsTo(orders::class, 'order_id');
    }
}
