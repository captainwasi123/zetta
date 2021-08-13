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
        $recent = friends::where('user_id', Auth::id())->orWhere('friend_id', Auth::id())->latest()->limit(4)->get();

        return view('buddy.friends.index', ['friends' => $friends, 'recent' => $recent]);
    }

    public function search($val){
        if(empty($val)){
            $data = array();
        }else{
            $data = User::where('status', '1')
                ->where('id', '!=', Auth::id())
                ->when(1>0, function($q) use ($val){
                    return $q->where('fname', 'like', '%'.$val.'%')
                                ->orWhere('lname', 'like', '%'.$val.'%');
                })->get();
        }

        return view('buddy.friends.searchResult', ['data' => $data]);
    }

    function addFriend($id){
        $id = base64_decode($id);
       
        $f = new friends;
        $f->user_id = Auth::id();
        $f->friend_id = $id;
        $f->save();

        return redirect()->back()->with('success', 'Friend Added.');
    }

    function removeFriend($id){
        $id = base64_decode($id);
       
        friends::destroy($id);

        return redirect()->back()->with('success', 'Friend Removed.');
    }
}
