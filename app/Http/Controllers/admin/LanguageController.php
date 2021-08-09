<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $data = array(
            'data' => Language::latest()->get(),
        );
        return view('admin.setting.language.index')->with($data);
    }

    public function language_add()
    {
        return view('admin.setting.language.add');
    }

    public function language_save(Request $request)
    {
        if ($request->id) {
            $lang = Language::find($request->id);
            $msg = ['success'=>'Language Updated'];
        }else{
            $lang = new Language();
            $msg = ['success'=>'Language Add'];
        }

        $lang->name = $request->name;
        $lang->save();
        return redirect()->route('admin.setting.language')->with($msg);
    }

    public function language_edit($id)
    {
        $id = base64_decode($id);
        $lang = Language::find($id);
        return view('admin.setting.language.add')->with(['edit'=>$lang]);
    }

    public function language_delete($id)
    {
        $id = base64_decode($id);
        Language::find($id)->delete();
        return redirect()->back()->with('success','Language Deleted');
    }
}
