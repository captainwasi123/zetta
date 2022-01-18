<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\country;
use App\Models\Language;
use App\Models\userLang;
use App\Models\userEducation;
use App\Models\userCertificate;
use App\Models\userMedia;
use App\Models\userCategorySelect;
use App\Models\sportsCategory;
use App\Models\sports;

class settingController extends Controller
{
    //

    public function index()
    {
        $data = array(
            'countries' => country::all(),
            'languages' => Language::orderBy('name')->get(),
            'sports' => sports::orderBy('name')->get(),
            'userSports' => userCategorySelect::orderBy('id', 'desc')->get(),
        );
        return view('coach.my_account.index')->with($data);
    }

    function uploadProfilePicture(Request $request){
        $file = $request->file('profileImage');
        $filename = Auth::id().'-'.date('dmyHis').'.'.$file->getClientOriginalExtension();
        $u = User::find(Auth::id());
        $u->profile_img = $filename;
        $u->save();
        $file->move(base_path('/public/storage/user/profile_img/'), $filename);

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
        $u->availability = $data['availability'];
        $u->address = $data['address'];
        $u->lat = $data['lat'];
        $u->lng = $data['lng'];
        $u->description = $data['description'];
        $u->bank_name = $data['bank_name'];
        $u->iban = $data['iban'];
        $u->save();

        return redirect()->back()->with('success', 'Profile Successfully updated.');
    }

    function add_lang(Request $request){
        $data = $request->all();
        userLang::addLang($data);

        return redirect()->back()->with('success', 'New Language Added.');
    }

    function remover_lang($id)
    {
        $id = base64_decode($id);
        userLang::find($id)->delete();
        return redirect()->back()->with('success', 'Language Removed.');
    }

     function add_edu(Request $request){
        $data = $request->all();
        userEducation::addEdu($data);

        return redirect()->back()->with('success', 'New Education Added.');
    }

    function remove_edu($id){
        $id = base64_decode($id);
        userEducation::find($id)->delete();
        return redirect()->back()->with('success', 'Education Removed.');
    }

    function add_certificate(Request $request){
        $data = $request->all();
        userCertificate::addCertificate($data);

        return redirect()->back()->with('success', 'New Certificate Added.');
    }

    function remove_certificate($id){
        $id = base64_decode($id);
        userCertificate::find($id)->delete();
        return redirect()->back()->with('success', 'Certificate Removed.');
    }


    function addProof(Request $request){
        $file = $request->file('document');
        $filename = Auth::id().'-'.date('dmyHis').'.'.$file->getClientOriginalExtension();
        $u = User::find(Auth::id());
        $u->add_proof_status = '1';
        $u->add_proof_doc = $filename;
        $u->save();
        $file->move(base_path('/public/storage/user/add_proof/'), $filename);

        return redirect()->back();
    }

    function idProof(Request $request){
        $file = $request->file('document');
        $filename = Auth::id().'-'.date('dmyHis').'.'.$file->getClientOriginalExtension();
        $u = User::find(Auth::id());
        $u->id_proof_status = '1';
        $u->id_proof_doc = $filename;
        $u->save();
        $file->move(base_path('/public/storage/user/id_proof/'), $filename);

        return redirect()->back();
    }

    function addMedia(Request $request){
        $media = new userMedia();
        $file = $request->file('video');
        $filename = Auth::id().'-'.date('dmyHis').'.'.$file->getClientOriginalExtension();
        $media->user_id = Auth::user()->id;
        $media->media =  $filename;
        $media->status = 1;
        $media->save();
        $file->move(base_path('/public/storage/user/media/'), $filename);

        return redirect()->back()->with('success', 'New Media Added.');
    }
}
