<?php

namespace App\Http\Controllers\coach;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\lesson\orders;
use App\Http\Controllers\Controller;


class CoachController extends Controller
{

    public function index(){
        $data['orders'] = orders::with(['buyer','lesson'])->where('seller_id', Auth::id())->where('status',1)->latest()->get();
        return view('coach.dashboard')->with($data);
    }

    public function lesson_favourite()
    {
      return view('coach.lesson_favourite');
    }


    public function my_wallet()
    {
      return view('coach.my_account.wallet');
    }


    public function my_account_area()
    {
        return view('buddy.my_account.my_account_area');
    }

    public function friend()
    {
        return view('coach.friend.index');
    }

    public function search_friends(Request $request)
    {
        if($request->search) {
            $output="";
            $users=User::where('username','LIKE','%'.$request->search."%")->orWhere('fname','LIKE','%'.$request->search."%")->orWhere('lname','LIKE','%'.$request->search."%")->get();
            if($users){
                foreach ($users as $key => $user) {
                    $output .= '<li>
                        <a href="javascript:void(0)"><img src="'.asset('public').'/storage/user/profile_img/'.$user->profile_img.'" alt="user-img" class="img-circle">
                        <span> '.$user->fname .' '.$user->lname.' <small class="bg-green">online</small></span> <b> Hello , How are you sir? </b> </a>
                    </li>';
                }
                return response()->json($output);
            }
        }
    }

    public function messages()
    {
        return view('coach.messages.index');
    }

}
