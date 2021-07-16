<?php

namespace App\Http\Controllers\buddy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\country;
use App\Models\userLang;
use App\Models\userEducation;
use App\Models\userCertificate;

class settingController extends Controller
{ 

    //

    public function index()
    {
        $data = array(
            'countries' => country::all(),
        );
        return view('buddy.my_account.index')->with($data);
    }

    function uploadProfilePicture(Request $request){
        $file = $request->file('profileImage');
        $filename = Auth::id().'-'.date('dmyHis').'.'.$file->getClientOriginalExtension();
        $u = User::find(Auth::id());
        $u->profile_img = $filename;
        $u->save();
        $file->move(base_path('/public/user/profile_img/'), $filename);

        return redirect()->back();
    }

    function update_profile(Request $request){
        $data = $request->all();
        $u = User::find(Auth::id());
        $u->fname = $data['first_name'];
        $u->lname = $data['last_name'];
        $u->country_id = $data['country'];
        $u->city = $data['city'];
        $u->gender = $data['gender'];
        $u->description = $data['description'];
        $u->save();

        return redirect()->back()->with('success', 'Profile Successfully updated.');
    }

    function add_lang(Request $request){
        $data = $request->all();
        userLang::addLang($data);

        return redirect()->back()->with('success', 'New Language Added.');
    }

     function add_edu(Request $request){
        $data = $request->all();
        userEducation::addEdu($data);

        return redirect()->back()->with('success', 'New Education Added.');
    }

    function add_certificate(Request $request){
        $data = $request->all();
        userCertificate::addCertificate($data);

        return redirect()->back()->with('success', 'New Certificate Added.');
    }
}
