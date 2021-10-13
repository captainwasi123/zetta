<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\FavouriteActivity;
use App\Models\FavouriteBuddy;
use App\Models\FavouriteCoach;
use App\Models\FavouriteLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth;

class FavouriteController extends Controller
{
    public function fav_lesson($id)
    {
        $data = [];
        if (auth()->check()) {
            $favless = new FavouriteLesson();
            $check = $favless->where('user_id',auth()->user()->id)->where('lesson_id',$id)->count();
            if ($check > 0) {
                $data['status'] = 300;
                $favless->where('user_id',auth()->user()->id)->where('lesson_id',$id)->delete();
                return response($data);
            }else{
                $data['status'] = 200;
                $favless->lesson_id = $id;
                $favless->user_id = auth()->user()->id;
                $favless->save();
                return response($data);
            }
        }else{
            return back();
        }
    }


    public function delfavlesson($id)
    {
        $id=FavouriteLesson::where('user_id', auth()->user()->id)->where('id',$id)->first();
        $id->delete();

        return back();
    }


    public function fav_activity($id)
    {

            $data = [];
            if(auth()->check()){
                $favAact = new FavouriteActivity();
                $check = $favAact->where('user_id',auth()->user()->id)->where('activity_id',$id)->count();



            if($check > 0){
                $data['status'] = 300;
                $favAact->where('user_id',auth()->user()->id)->where('activity_id',$id)->delete();
                return response($data);
            }

                $data['status'] = 200;
                $favAact->activity_id = $id;
                $favAact->user_id = auth()->user()->id;
                $favAact->save();
                return response()->json($data);
            }else{
                return back();
            }


    }

    public function delfavactivity($id)
    {
        $id=FavouriteActivity::where('user_id', auth()->user()->id)->where('id',$id)->first();
        $id->delete();

        return back();
    }


   

    public function fav_coach($id)
    {
        $data = [];
        if(auth()->check()){
            $favcoach = new FavouriteCoach();
            $check = $favcoach->where('user_id',auth()->user()->id)->where('coach_id',$id)->count();
            if($check > 0){
                $data['status'] = 300;
                $favcoach->where('user_id',auth()->user()->id)->where('coach_id',$id)->delete();
                return response()->json($data);
            }
            $data['status'] = 200;
            $favcoach->coach_id = $id;
            $favcoach->user_id = auth()->user()->id;
            $favcoach->save();
            return response()->json($data);
        }else{
            return back();
        }

    }

    public function delfavcoach($id)
    {
        $id=FavouriteCoach::where('user_id', auth()->user()->id)->where('id',$id)->first();
        $id->delete();

        return back();
    }


    public function fav_buddy($id)
    {
        $data = [];
        if(auth()->check()){
            $favBuddy = new FavouriteBuddy();
            $check = $favBuddy->where('user_id',auth()->user()->id)->where('buddy_id',$id)->count();
            if($check > 0){
                $data['status'] = 300;
                $favBuddy->where('user_id',auth()->user()->id)->where('buddy_id',$id)->delete();
                return response()->json($data);
            }
            $data['status'] = 200;
            $favBuddy->buddy_id = $id;
            $favBuddy->user_id = auth()->user()->id;
            $favBuddy->save();
            return response()->json($data);
        }else{
            return back();
        }

    }


    public function delfavbuddy($id)
    {
        $id=FavouriteBuddy::where('user_id', auth()->user()->id)->where('id',$id)->first();
        $id->delete();

        return back();
    }
}
