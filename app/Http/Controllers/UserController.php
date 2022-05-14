<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Model\LoaiSanPham;
use App\Model\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function getDanhSach() {
        $user = User::all();

        $viewdata = [
            'user' => $user,
        ];
        return view('admin.pages.users.list', $viewdata);
    }

    public function getThem() {
        $danhsach = Role::all();

        $viewData = [
            'role' => $danhsach
        ];
        return view('admin.pages.users.create', $viewData);
    }

    public function postThem(Request $request) {
        $data = $request->except('_token');

        $messages = [
            "name.required" => "Hãy nhập tên!",
            "name.max" => "Tên quá dài!",
            "email.required" => "Hãy nhập email!",
            "password.required" => "Hãy nhập password!",
            "password.min" => "Độ dài mật khẩu lớn hơn 8!",
            "password.max" => "Độ dài mật khẩu nhỏ hơn 32!",
            "ma_nv.required" => "Hãy nhập mã nhân viên!",
            "ma_nv.unique" => "Trùng mã nhân viên!"
        ];

        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'email' => 'required',
            'password' => 'required|min:8|max:32',
            'ma_nv' => 'required|unique:users,ma_nv'
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $user = new User;
            $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->ma_nv = $request->ma_nv;

            $user->save();

            return redirect(route('admin.user.getDanhSach'))->with('thongbao', 'Thêm thành công!');
        }
    }

    public function getSua($id) {
        $user = User::find($id);
        $role = Role::all();

        return view('admin.pages.users.edit', ['user' => $user, 'role'=>$role]);
    }

    public function postSua(Request $request, $id) {
        $user = User::find($id);

        $data = $request->except('_token');

        if($user->ma_nv == $request->ma_nv) {

            $messages = [
                "name.required" => "Hãy nhập tên!",
                "name.max" => "Tên quá dài!",
                "ma_nv.required" => "Hãy nhập mã nhân viên!",
            ];
            
            $validator = Validator::make($data,[
                'name' => 'required|max:50',
                'ma_nv' => 'required',
            ], $messages);
        } else {
            $messages = [
                "name.required" => "Hãy nhập tên!",
                "name.max" => "Tên quá dài!",
                "ma_nv.required" => "Hãy nhập mã nhân viên!",
                "ma_nv.unique" => "Trùng mã nhân viên!"
            ];
            
            $validator = Validator::make($data,[
                'name' => 'required|max:50',
                'ma_nv' => 'required|unique:users,ma_nv'
            ], $messages);
        }

        if($validator->fails()) {
    		$errors = $validator->errors();
    		return redirect()->back()->with('errors', $errors);
    	} else {

        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->ma_nv = $request->ma_nv;

        $user->save();

        return redirect(route('admin.user.getDanhSach'))->with('thongbao', 'Sửa thành công!');
    }
}


    public function getXoa($id) {
        $user = User::find($id);
        
        $user->delete();

        return redirect(route('admin.user.getDanhSach'))->with('thongbao', 'Xoá thành công!');
    }

    public function postResetPassword($id) {
        $user = User::find($id);
    
        $user->password = bcrypt("12345678");

        $user->save();

        return back()->with('thongbao', 'Đặt lại mật khẩu về mặc định thành công!');

    }
}
