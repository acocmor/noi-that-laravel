<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Model\LoaiSanPham;
use App\Model\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function getProfile() {
        if(Auth::Check()) {
            $user = Auth::User()->all();
            $viewdata = [
                'user' => $user,
            ];
        return view('admin.pages.profile', $viewdata);
        }
    }

    public function postChangePassword(Request $request, $id) {
        $user = User::find($id);
        $data = $request->except('_token');

        $oldp = bcrypt($request->old_password);

        if ($oldp != $user->password) {
            return redirect()->back()->with('loi', 'Mật khẩu cũ sai!');
        } else {

        $messages = [
            "old_password.required" => "Hãy nhập password!",
            "old_password.min" => "Độ dài mật khẩu lớn hơn 8!",
            "old_password.max" => "Độ dài mật khẩu nhỏ hơn 32!",
            "new_password.required" => "Hãy nhập password!",
            "new_password.min" => "Độ dài mật khẩu lớn hơn 8!",
            "new_password.max" => "Độ dài mật khẩu nhỏ hơn 32!",
        ];

        $validator = Validator::make($data, [
            'old_password' => 'required|min:8|max:32',
            'new_password' => 'required|min:8|max:32',
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $user->password = bcrypt($request->new_password);

            $user->save();

            return redirect(route('admin.user.getProfile'))->with('thongbao', 'Đổi mật khẩu thành công!');
        }
    }
    }

    public function changePass(Request $request) {
        if(Auth::Check()) {
            $data = $request->except('_token');
            $request_data = $request->All();
            $messages = [
                "old_password.required" => "Hãy nhập password!",
                "old_password.min" => "Độ dài mật khẩu lớn hơn 8!",
                "old_password.max" => "Độ dài mật khẩu nhỏ hơn 32!",
                "new_password.required" => "Hãy nhập password!",
                "new_password.min" => "Độ dài mật khẩu lớn hơn 8!",
                "new_password.max" => "Độ dài mật khẩu nhỏ hơn 32!",
            ];

            $validator = Validator::make($data, [
                'old_password' => 'required|min:8|max:32',
                'new_password' => 'required|min:8|max:32',
            ], $messages);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect(route('admin.user.getProfile'))->with('errors', $errors);
            } else {  
                $current_password = Auth::User()->password;           
                if(Hash::check($request->old_password, $current_password))
                {           
                    $user_id = Auth::User()->id;                       
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['new_password']);
                    $obj_user->save(); 
                    return redirect(route('admin.user.getProfile'))->with('thongbao', 'Đổi mật khẩu thành công!');
                }
                else
                {           
                    return redirect(route('admin.user.getProfile'))->with('loi', 'Mật khẩu cũ sai!');
                }
            } 
        } else {
            return redirect(route('admin.user.getProfile'));
        }
    }

}
