<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SettingController extends Controller
{
    public function setting()
    {
        $setting = Setting::where('id', 1)->first();
        return view('backend.setting.setting', compact('setting'));
    }
    public function settingPost(Request $request)
    {
       // dd($request->all());
        $setting = Setting::find($request->set_id);
        if ($setting) {
            if ($request->body_logo_sm) {
                $setting->logo=$request->body_logo;
            }
            if ($request->about) {

                $setting->about=$request->body;
            }
            if ($request->contact) {

                $setting->contact=$request->body_contact;
            }
        }else{
            $setting = new Setting();
            if ($request->body_logo_sm) {
                $setting->logo=$request->body_logo;
            }
            if ($request->about) {

                $setting->about=$request->body;
            }
            if ($request->contact) {

                $setting->contact=$request->body_contact;
            }
        }

        $setting->save();
        return redirect()->back();
    }
}
