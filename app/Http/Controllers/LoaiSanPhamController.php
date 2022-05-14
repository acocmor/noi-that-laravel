<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Model\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    //
    public function getDanhSach() {
        $lsp = LoaiSanPham::all();
        $viewdata = [
            'lsp' => $lsp,
        ];
        return view('admin.pages.loaisanpham.danhsach', $viewdata);
    }

    public function postThem(Request $request) {
        $data = $request->except('_token');

        $messages = [
            'name.required' => 'Hãy nhập tên loại sản phẩm!',
            'name.unique' => 'Trùng tên loại sản phẩm!',
            'name.min' => 'Tên quá ngắn!',
            'name.max' => 'Tên quá dài!'
        ];

        $validator = Validator::make($data, [
            'name' => 'required|min:3|max:100|unique:loai_san_pham,name',
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $lsp = new LoaiSanPham;
            $lsp->name = $request->name;
            $lsp->slug = Str::slug($request->name , '-');
            $lsp->save();
            return redirect()->back()->with('thongbao', 'Thêm thành công: '.$request->name);
        }
    }

    public function getSua($id) {
        $lsp = LoaiSanPham::find($id);
        return response()->json(['data'=>$lsp],200);
    }

    public function postSua(Request $request, $id) {
        $lsp = new LoaiSanPham;
        $lsp = LoaiSanPham::find($id);
        $data = $request->except('_token');

        if ($request->name != $lsp->name) {

            $messages = [
                'name.required' => 'Hãy nhập tên loại sản phẩm!',
                'name.unique' => 'Trùng tên loại sản phẩm!',
                'name.min' => 'Tên quá ngắn!',
                'name.max' => 'Tên quá dài!'
            ];

            $validator = Validator::make($data, [
                'name' => 'required|min:3|max:100|unique:loai_san_pham,name',
            ], $messages);
        } else {
            $messages = [
                'name.required' => 'Hãy nhập tên loại sản phẩm!',
                'name.min' => 'Tên quá ngắn!',
                'name.max' => 'Tên quá dài!'
            ];

            $validator = Validator::make($data, [
                'name' => 'required|min:3|max:100',
            ], $messages);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $lsp->name = $request->name;
            $lsp->slug = Str::slug($request->name , '-');
            $lsp->save();
            return redirect()->back()->with('thongbao', 'Sửa thành công: '.$request->name);
        }

    }


    public function getXoa($id) {
        LoaiSanPham::find($id)->delete();
        // return response()->json(['success'=>'Xoá thành công'],200);
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }
}
