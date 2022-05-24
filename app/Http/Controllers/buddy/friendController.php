<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\friends;
use App\Models\friendRequest;
use Auth;

class friendController extends Controller
{
    //

    public function my_friends()
    {
        $friends = friends::where('user_id', Auth::id())->orWhere('friend_id', Auth::id())->latest()->get();
        $recent = friends::where('user_id', Auth::id())->orWhere('friend_id', Auth::id())->latest()->limit(4)->get();

        $requests = friendRequest::where('friend_id', Auth::id())->latest()->get();

        return view('buddy.friends.index', ['friends' => $friends, 'recent' => $recent, 'requests' => $requests]);
    }

    public function search($val){
        if(empty($val)){
            $data = array();
        }else{
            $data = User::where('id', '!=', Auth::id())
                ->when(1>0, function($q) use ($val){
                    return $q->where('fname', 'like', '%'.$val.'%')
                                ->orWhere('lname', 'like', '%'.$val.'%');
                                
                })->get();
                
        }

        return view('buddy.friends.searchResult', ['data' => $data]);
    }

    function addFriend($id){
        $id = base64_decode($id);

        $u1 = friendRequest::where(['friend_id' => $id, 'user_id' => Auth::id()])
                        ->orWhere(['user_id' => $id, 'friend_id' => Auth::id()])
                        ->first();
        $u2 = friends::where(['friend_id' => $id, 'user_id' => Auth::id()])
                        ->orWhere(['user_id' => $id, 'friend_id' => Auth::id()])
                        ->first();

        if(!empty($u1->id)){
            return redirect('/buddy/friends')->with('error', 'Request Already Sent.');
        }elseif(!empty($u2->id)){
            return redirect('/buddy/friends')->with('error', 'Already Friend.');
        }else{
            
            $f = new friendRequest;
            $f->user_id = Auth::id();
            $f->friend_id = $id;
            $f->save();

            return redirect('/buddy/friends')->with('success', 'Friend Request Sent.');
        }
    }

    function acceptRequestFriend($id){
        $id = base64_decode($id);

        $rf = friendRequest::find($id);

        $f = new friends;
        $f->user_id = $rf->user_id;
        $f->friend_id = $rf->friend_id;
        $f->save();

        friendRequest::destroy($id);

        return redirect()->back()->with('success', 'Friend Added.');
    }

    function rejectRequestFriend($id){
        $id = base64_decode($id);

        friendRequest::destroy($id);

        return redirect()->back()->with('success', 'Request Rejected.');
    }

    function removeFriend($id){
        $id = base64_decode($id);

        friends::destroy($id);

        return redirect()->back()->with('success', 'Friend Removed.');
    }

    function getNotification(){

        $requests = friendRequest::where('friend_id', Auth::id())->count();

        return $requests;
    }
}
