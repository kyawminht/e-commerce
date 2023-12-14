<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting()
    {
        $setting=Setting::first();
        return view('admin.setting.index',compact('setting'));
    }

    public function store(Request $request)
    {
        $setting=Setting::first();

        if ($setting){
            //update
            $setting->update([
                'website_name'=>$request->website_name,
                'page_title'=>$request->page_title,
                'meta_keyword'=>$request->meta_keyword,
                'meta_description'=>$request->meta_description,
                'address'=>$request->address,
                'phone1'=>$request->phone1,
                'phone2'=>$request->phone2,
                'email1'=>$request->email1,
                'email2'=>$request->email2,
                'facebook'=>$request->facebook,
                'instagram'=>$request->instagram,
                'twitter'=>$request->twitter,
                'youtube'=>$request->youtube,

            ]);
            return redirect()->back()->with('message','Site data updated successfully');
        }else{
            //create
            Setting::create([
                'website_name'=>$request->website_name,
                'page_title'=>$request->page_title,
                'meta_keyword'=>$request->meta_keyword,
                'meta_description'=>$request->meta_description,
                'address'=>$request->address,
                'phone1'=>$request->phone1,
                'phone2'=>$request->phone2,
                'email1'=>$request->email1,
                'email2'=>$request->email2,
                'facebook'=>$request->facebook,
                'instagram'=>$request->instagram,
                'twitter'=>$request->twitter,
                'youtube'=>$request->youtube,

            ]);

            return redirect()->back()->with('message','Site data added successfully');
        }
    }
}
