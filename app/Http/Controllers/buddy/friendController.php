<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\friends;
use Auth;

class friendController extends Controller
{
    //

    public function my_friends()
    {
        $friends = friends::where('user_id', Auth::id())->orWhere('friend_id', Auth::id())->latest()->get();

        return view('buddy.friends.index', ['friends' => $friends]);
    }

    public function search($val){
        if(empty($val)){
            $data = array();
        }else{
            $data = User::where('status', '1')
                ->when(1>0, function($q) use ($val){
                    return $q->where('fname', 'like', '%'.$val.'%')
                                ->orWhere('lname', 'like', '%'.$val.'%');
                })->get();
        }

        return view('buddy.friends.searchResult', ['data' => $data]);
    }
}
