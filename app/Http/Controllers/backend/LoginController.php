<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\backend\LoginRequest;
use App\Models\customer;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function GetLogin()
   {
      return view('backend.login.login');
   }
   public function PostLogin(LoginRequest $request)
   {
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
      {
         return redirect('admin');
      }
      else {
         return redirect('login')->withInput()->with('thongbao','Tài khoản khoặc mật khẩu không chính xác!');
      }
   }

   public function GetIndex()
   {
      $year_n=Carbon::now()->format('Y');
      $month_n=Carbon::now()->format('m');
      for($i=1;$i<=$month_n;$i++){
         $monthjs[$i]='Thang '.$i;
         $numberjs[$i]=customer::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$year_n)->sum('total');
      }
      $data['monthjs']=$monthjs;
      $data['numberjs']=$numberjs;
      $data['order']=customer::where('state',0)->count();

      return view('backend.index',$data);
   }

   public function Logout()
   {
      Auth::logout();
      return redirect('login');
   }
   public function Menu()
   {
        return view('backend.menu.menu');
   }
}
