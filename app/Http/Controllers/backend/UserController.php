<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function List()
    {
        $users = Users::all();
        // $users = User::paginate(12);
        return view('Backend.User.listuser',compact('users'));
    }
    function add()
    {
        return view('Backend.User.adduser');
    }
    function addpost(Request $request)
    {
        $user = new Users;
        $user->full = $request->user_fullname;
        $user->email = $request->user_email;
        $user->password = Hash::make($request->user_password);
        $user->phone = $request->user_phone;
        $user->level = $request->user_level;
        $user->address = $request->user_address;

        $user->save();
        return redirect()->route('user.index')->with('thong-bao', 'success');
    }
    function edit($id)
    {
        $data['user']=Users::find($id);
        return view('Backend.User.edituser',$data);
    }
    function editpost(Request $request, $id)
    {
        $user = Users::find($id);
        $user->full = $request->user_fullname;
        $user->email = $request->user_email;
        $user->phone = $request->user_phone;
        $user->level = $request->user_level;
        $user->address = $request->user_address;
        $user->save();
        return redirect()->route('user.index')->with('thong-bao-update', 'success');
    }
    function del($id)
    {
        // $user = Users::find($id);
        // $user->delete();
        // return redirect()->route('user.index')->with('thong-bao-delete', 'succsess');
         $user = Users::find($id);
        if ($user->hasRole('super-admin')) {
            return back()->with('thong-bao-loi', 'Bạn không thể xóa tài khoản này');
        } else {
            $user->delete();
            return redirect()->route('admin_user_list')->with('thong-bao-thanh-cong', 'Đã xóa thành công quản trị ');
        }
    }
   //Gán quyền
   public function assign_permission(Request $request, $id)
   {
       //dd($request->all());
       //Tìm user theo id
       $user = Users::find($id);
       //Xóa tất cả các quyền đã tồn tại của user theo id đó
       $user->revokePermissionTo(['edit', 'add', 'delete']);
       //Kiểm tra user đó có bất kỳ Role nào không
       if ($user->hasAnyRole(['user', 'admin'])) {
           //Gọi tên Role của user đó
           $roles = $user->getRoleNames();
           foreach ($roles as $key => $value) {
               //Xóa role của user đó
               $user->removeRole($value);
           }
       }
       //Tiến hành thêm quyền khi tích vào ô checkbox
       if ($request->add) {
           $user->givePermissionTo('add'); //Gán quyền add
       }
       if ($request->edit) {
           $user->givePermissionTo('edit'); //Gán quyền edit
       }
       if ($request->delete) {
           $user->givePermissionTo('delete'); //Gán quyền delete
       }

       return redirect()->back(); //trả về trang hiện tại
   }
}
