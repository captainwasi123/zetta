<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\redeemChallenges;
use App\Models\redeemBadges;
use Helper;

class redeemController extends Controller
{
    //Challenges
        function challenges(){
            $data = redeemChallenges::latest()->get();

            return view('admin.redeem.challenges.index', ['data' => $data]);
        }
        function challengesAdd(){

            return view('admin.redeem.challenges.add');
        }

        function challengesInsert(Request $request){
            $data = $request->all();

            redeemChallenges::addChallenge($data);

            return redirect()->back()->with('success', 'Challenge Created.');
        }

        function badges()
        {
           
            $data=redeemBadges::latest()->get();
           
            return view('admin.redeem.badges.index', ['data' => $data]);
        }

   

        function badgesInsert(Request $request){
            if(!empty($request->bid)){
                $badge = redeemBadges::where('id',$request->bid)->first();
              
                $msg = "Badge Updated Successfully";
            }else{
                $badge = new redeemBadges();
                $msg = "Badge Added Successfully";
            }
            $badge->title = $request->title;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = date('dmyHis').'.'.$file->getClientOriginalExtension();
                $filename = rand().'-'.$filename;
                $file->move(base_path('/public/admin/images/'), $filename);
    
                $badge->image = $filename;
            }
           
            $badge->save();
    
            return redirect()->route('admin.redeem.badges')->with('success',$msg);
        }
    
        function badgeEdit(Request $request){
            $id = base64_decode($request->id);        
            $badge = new redeemBadges();
            $data = array(
                'edit_badge' => $badge::where('id',$id)->first(),
                "data" => redeemBadges::latest()->get(),
                'is_edit' => true,
            );
            return view('admin.redeem.badges.index')->with($data);
        }

       
        function delete($id){
            $id = base64_decode($id);
            $data = redeemBadges::destroy($id);
            
            return redirect()->back()->with('success', 'Record Deleted.');
        }


        

       
    

       

}
