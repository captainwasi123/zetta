<?php

namespace App\Http\Controllers\coach;

use App\Http\Controllers\Controller;
use App\Models\lesson\lessonFroms;
use App\Models\lesson\Locations;
use Illuminate\Http\Request;
use App\Models\lesson\orders;
use App\Models\User;
use Auth;

class orderController extends Controller
{
    //
    function index(){
        $data = orders::where('seller_id', Auth::id())->latest()->get();

        return view('coach.orders.index', ['data' => $data]);
    }

    public function orderView($id)
    {
        $id = base64_decode($id);
        $data = orders::with(['buyer','lesson','forms'])->find($id);
        $locations = Locations::where('lesson_id',$data->lesson_id)->get();
        if ($data->lesson->group_members != null) {
            $d= orders::where('lesson_id',$data->lesson_id)->get();
            $buyer = [];
            foreach ($d as $key => $value) {
                $buyer[$key] = $value->buyer_id;
            }
            $group = User::whereIn('id',$buyer)->get();
            return view('coach.orders.orderview',['data'=>$data,'location'=>$locations,'buyers'=>$group]);

        }else{
            return view('coach.orders.orderview',['data'=>$data,'location'=>$locations]);
        }
    }

    function group_order_msg(Request $request){
        // dd($request);

        $forms = new lessonFroms();
        $forms->order_id = $request->order_id;
        $forms->user_id = $request->user_id;
        $forms->msg = $request->msg;
//        $forms->save();
        $last = $forms::with('user')->latest()->first();

        $html = ' <li>
        <div class="chat-img"><img src="'.asset('public').'/storage/user/profile_img/'.$last->user->profile_img.'" alt="user" /></div>
        <div class="chat-content">
           <h5 class="col-white">'.$last->user->fname.' '.$last->user->lname.'</h5>
           <div class="box bg-light-info col-silver">'.$last->msg.'</div>
        </div>
        <div class="chat-time">'.$last->created_at->format('M d | g:i a').'</div>
     </li>';

        $data['html'] = $html;
        return response()->json($data);
    }
}
