<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function getLoginAdmin() {
            return view('admin.layouts.dangnhap');
    }

    public function postLoginAdmin(Request $request) {

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6|max:32',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩU',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không quá 32 ký tự',
        ]);

        $remember = $request->has('remember') ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect(route('admin.index'));
        } else {
            return redirect()->back()->with('thongbao', 'Đăng nhập thất bại!');
        }

    }

    public function getLogoutAdmin() {
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function postResetPassword($id) {
        $user = User::find($id);
    
        $user->password = bcrypt("123456");

        return back()->with('thongbao', 'Đặt lại mật khẩu về mặc định thành công!');

    }
}
