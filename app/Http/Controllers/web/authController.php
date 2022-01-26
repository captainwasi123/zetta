<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userFavorite;
use Auth;
use Mail;

class authController extends Controller
{

    function register(Request $request){
    	$data = $request->all();
        if(empty($data['user_dob']) || empty($data['username']) || empty($data['email']) || empty($data['password'])){
            return 'nodob';
        }else{
        	if(empty($data['password'])){
    	    	$user = User::where('email', $data['email'])->count();
    	    	if($user != '0'){
    	    		return 'exist';
    	    	}else{
    	    		return $data;
    	    	}
    	    }else{
    	    	if($data['password'] != $data['confirmation_password']){
    	    		return 'nomatch';
    	    	}else{
                    if(strlen($data['password']) < 6){
                        return 'strong';
                    }else{
        	    		$id = User::addUser($data);
                        $userAdd = User::find($id);
                        if($userAdd->email_status == '0'){
                            Mail::send('email.activation', array('id'=>$userAdd->id), function($message) use ($data)  {
                                $message->to($data['email'])->subject("Activate your new account");
                                $message->from("noreply@zettaa.com", 'Zettaa');
                            });
                            $userAdd->email_status = '1';
                            $userAdd->save();
                        }
            	    	return 'success';
                    }

    	    	}
    	    }
        }
    }

    function login(Request $request){
        $att = array();
    	$data = $request->all();
        $check = user::where('email',$data['email'])->first();
        if(!empty($check->id)){
            $att = ['email' => $data['email'], 'password' => $data['password'], 'status' => '1'];
        }else{
            $check = user::where('username',$data['email'])->first();
            if(!empty($check->id)){
                $att = ['username' => $data['email'], 'password' => $data['password'], 'status' => '1'];
            }else{
                return 'incorrect';
            }
        }

    	if(Auth::attempt($att)){
            if($check->type == '1'){
                return '/buddy';
            }else{
                return '/coach';
            }
    	}else{
    		return 'incorrect';
    	}
    }

    function confirmnwithlogin($id)
    {
        $u = User::find($id);
        $u->status = '1';
        $u->save();
        $email=$u->email;
        $fname=$u->username;


        Auth::loginUsingId($id);

        if($u->email_status == '1'){
            Mail::send('email.accountConfirmation', array('fname'=>$fname,  'email' => $email), function($message) use ($email)  {
                $message->to($email)->subject("Welcome to Zettaa");
                $message->from("noreply@zettaa.com", 'Zettaa');
            });

            $u->email_status = '2';
            $u->save();
        }
        return redirect('/');
    }

    function coverPic(Request $request){
        if(Auth::check()){
            $file = $request->file('coverImage');
            $filename = Auth::id().'-'.date('dmyHis').'.'.$file->getClientOriginalExtension();
            $u = User::find(Auth::id());
            $u->cover_img = $filename;
            $u->save();
            $file->move(base_path('/public/cover_img/'), $filename);

            return redirect()->back();
        }else{
            return redirect('/');
        }
    }

    function logout(){
    	Auth::logout();

    	return redirect()->back();
    }


    function addFavorite($id){
        if(Auth::check()){
            $id = base64_decode($id);
            userFavorite::addFavor($id);

            return redirect()->back();
        }else{
            return redirect('/');
        }
    }
    function removeFavorite($id){
        if(Auth::check()){
            $id = base64_decode($id);
            userFavorite::where('favor_id', $id)->where('user_id', Auth::id())->delete();

            return redirect()->back();
        }else{
            return redirect('/');
        }
    }

    function savedProfile(){
        if(Auth::check()){
            $data = userFavorite::where('user_id', Auth::id())->get();

            return view('web.saved', ['databelt' => $data]);
        }else{
            return redirect('/');
        }
    }

    function userTypeSetup(Request $request){
        $data = $request->all();
        $u = User::find(Auth::id());
        $u->type = $data['usertype'];
        $u->save();

        if($u->type == '2' && count($u->skills) == '0'){
            return redirect('/helper/rule_1');
        }else if($u->type == '3' && empty($u->details)){
            return redirect('/agency/rule_1');
        }else if($u->type == '1' && empty($u->details)){
            return redirect('/employer/rule_1');
        }else{
            return '';
        }
    }

}
