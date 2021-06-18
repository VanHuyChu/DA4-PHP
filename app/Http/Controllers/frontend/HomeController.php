<?php

namespace App\Http\Controllers\frontend;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Harimayco\Menu\Models\Menus;
class HomeController extends Controller
{
    public function GetHome()
    {
        $data['setting'] = Setting::find(1);
        $data['product_fe']=Products::where('featured','=','1')->take(4)->get();
        // $data['product_fe']=Products::where('featured','=','1')->where('img','<>','no-img.jpg')->take(4)->get();
        $data['product_new']=Products::orderby('created_at','DESC')->take(8)->get();
        return view('frontend.index',$data);
    }

    public function GetContact()
    {
        $data['setting'] = Setting::find(1);
        return view('frontend.contact',$data);
    }

    public function GetAbout()
    {
        $data['setting'] = Setting::find(1);
        return view('frontend.about',$data);
    }
}
