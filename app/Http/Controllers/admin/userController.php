<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CoachRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;

class userController extends Controller
{
    //
    function active(){
        $data = User::with('country')->where('status', '1')->latest()->get();

        return view('admin.users.active', ['data' => $data]);
    }
    function blocked(){
        $data = User::where('status', '0')->latest()->get();

        return view('admin.users.blocked', ['data' => $data]);
    }



    function block($id){
        $id = base64_decode($id);
        $u = User::find($id);
        $u->status = '0';
        $u->save();

        return redirect()->back()->with('success', 'User blocked.');
    }
    function activate($id){
        $id = base64_decode($id);
        $u = User::find($id);
        $u->status = '1';
        $u->save();

        return redirect()->back()->with('success', 'User Activated.');
    }


    function idProof(){
        $data = User::where('id_proof_status', '1')->latest()->get();

        return view('admin.users.idProof', ['data' => $data]);
    }
    function idProofApprove($id){
        $id = base64_decode($id);
        $u = User::find($id);
        $u->id_proof_status = '2';
        $u->save();

        return redirect()->back()->with('success', 'ID proof verified.');
    }
    function idProofReject($id){
        $id = base64_decode($id);
        $u = User::find($id);
        $u->id_proof_status = null;
        $u->save();

        return redirect()->back()->with('success', 'ID proof rejected.');
    }


    function addProof(){
        $data = User::where('add_proof_status', '1')->latest()->get();

        return view('admin.users.addProof', ['data' => $data]);
    }
    function addProofApprove($id){
        $id = base64_decode($id);
        $u = User::find($id);
        $u->add_proof_status = '2';
        $u->save();

        return redirect()->back()->with('success', 'Address proof verified.');
    }
    function addProofReject($id){
        $id = base64_decode($id);
        $u = User::find($id);
        $u->add_proof_status = null;
        $u->save();

        return redirect()->back()->with('success', 'Address proof rejected.');
    }

    public function coach_requets()
    {
    //   echo  $u = User::with('coach_request')->where('coach_request_status',0)->get(); dd();
        $req = CoachRequest::with('user')->get();
        $data['data'] = $req;

        return view('admin.users.coachRequests')->with($data);
    }

    public function coach_requets_answers($id)
    {
        $id = base64_decode($id);
         
        $data = CoachRequest::find($id);

        return view('admin.users.response.questionaire', ['data' => $data]);
    }


    public function coach_requet_approve($id)
    {
        $id = base64_decode($id);
        $req = CoachRequest::find($id);
        $u = User::where('id',$req->user_id)->first();
        $u->type = 2;
        $u->coach_request_status = 2;
        $u->save();

        $data = array('email' => $u->email);
        Mail::send('email.coachConfirmation', $data, function($message) use ($data)  {
            $message->to($data['email'])->subject("Coach Approval");
            $message->from("noreply@zettaa.com", 'Zettaa');
        });
        $req->delete();
        return redirect()->back()->with('success', 'User Request For Coach Is Approved.');
    }
}
