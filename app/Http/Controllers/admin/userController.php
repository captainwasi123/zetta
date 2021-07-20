<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    //
    function active(){
        $data = User::where('status', '1')->latest()->get();

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
}
