<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Model\LoaiSanPham;
use App\Model\SanPham;

class SanPhamController extends Controller
{
    //
    public function getDanhSach() {
        $sp = SanPham::orderBy('id','DESC')->get();
        $lsp = LoaiSanPham::all();
        $viewdata = [
            'sp' => $sp,
            'lsp' => $lsp
        ];
        return view('admin.pages.sanpham.danhsach', $viewdata);
    }

    public function getThem() {
        $lsp = LoaiSanPham::all();
        $viewdata = [
            'lsp' => $lsp
        ];
        return view('admin.pages.sanpham.add', $viewdata);
    }

    public function postThem(Request $request) {
        $data = $request->except('_token');

        $messages = [
            'name.required' => 'Hãy nhập tên sản phẩm!',
            'gia.required' => 'Hãy nhập giá sản phẩm!',
            'giamgia.required' => 'Hãy nhập giảm giá sản phẩm!',
            'giamgia.min' => 'Giảm giá thấp nhất là 0!',
            'giamgia.numeric' => 'Giá sai định dạng!',
            'gia.min' => 'Giá thấp nhất là 0!',
            'gia.numeric' => 'Giá sai định dạng!',
            'name.unique' => 'Trùng tên sản phẩm!',
            'name.min' => 'Tên sản phẩm quá ngắn!',
            'name.max' => 'Tên sản phẩm quá dài!',
            'loaisanpham.required' => 'Hãy chọn loại sản phẩm!',
        ];

        $validator = Validator::make($data, [
            'name' => 'required|min:3|max:100|unique:san_pham,name',
            'loaisanpham' => 'required',
            'gia' => 'required|min:0|numeric',
            'giamgia' => 'required|min:0|numeric',
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $sp = new SanPham;
            $sp->loai_san_pham_id = $request->loaisanpham;
            $sp->name = $request->name;
            $sp->slug = Str::slug($request->name , '-');

            if($request->hienthi == "on" ) {
                $sp->hien_thi = true;
            } else {
                $sp->hien_thi = false;
            }

            $sp->mo_ta = $request->mota;

            $sp->gia = $request->gia;
            if($request->giamgia < $request->gia) {
                $sp->giam_gia = $request->giamgia;
            }
            $sp->da_ban = $request->daban;
            
            if ($request->hasFile('hinhanh')) {
                $file = $request->file('hinhanh');
                $duoi = $file->getClientOriginalExtension();

                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif') {
                    return redirect()->back()->with('errors', 'File ảnh tải lên không đúng định dạng!');
                }

                $name = $file->getClientOriginalName();
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;

                while (file_exists("upload/sanpham/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                
                $file->move("upload/sanpham/", $hinh);
                
                $sp->hinh_anh = $hinh;

            } else {

                $sp->hinh_anh = "";
            }
            $sp->save();
            return redirect(route('admin.sanpham.getDanhSach'))->with('thongbao', 'Thêm thành công: '.$request->name);
        }
    }

    public function getSua($id) {
        $lsp = LoaiSanPham::all();
        $sp = SanPham::find($id);
        $viewdata = [
            'lsp' => $lsp,
            'sp' => $sp,
        ];
        return view('admin.pages.sanpham.edit', $viewdata);
    }

    public function getXem($id) {
        $lsp = LoaiSanPham::all();
        $sp = SanPham::find($id);
        $viewdata = [
            'lsp' => $lsp,
            'sp' => $sp,
        ];
        return view('admin.pages.sanpham.view', $viewdata);
    }

    public function postSua(Request $request, $id) {
        $sp = new SanPham;
        $sp = SanPham::find($id);
        $data = $request->except('_token');

        if($request->name  != $sp->name) {

            $messages = [
                'name.required' => 'Hãy nhập tên sản phẩm!',
                'name.unique' => 'Trùng tên sản phẩm!',
                'name.min' => 'Tên sản phẩm quá ngắn!',
                'name.max' => 'Tên sản phẩm quá dài!',
                'loaisanpham.required' => 'Hãy chọn loại sản phẩm!',
                'gia.required' => 'Hãy nhập giá sản phẩm!',
                'giamgia.required' => 'Hãy nhập giảm giá sản phẩm!',
                'giamgia.min' => 'Giảm giá thấp nhất là 0!',
                'giamgia.numeric' => 'Giá sai định dạng!',
                'gia.min' => 'Giá thấp nhất là 0!',
                'gia.numeric' => 'Giá sai định dạng!',
            ];

            $validator = Validator::make($data, [
                'name' => 'required|min:3|max:100|unique:san_pham,name',
                'loaisanpham' => 'required',
                'gia' => 'required|min:0|numeric',
                 'giamgia' => 'required|min:0|numeric',
            ], $messages);
        } else {
             $messages = [
                'name.required' => 'Hãy nhập tên sản phẩm!',
                'name.min' => 'Tên sản phẩm quá ngắn!',
                'name.max' => 'Tên sản phẩm quá dài!',
                'loaisanpham.required' => 'Hãy chọn loại sản phẩm!',
                'gia.required' => 'Hãy nhập giá sản phẩm!',
                'giamgia.required' => 'Hãy nhập giảm giá sản phẩm!',
                'giamgia.min' => 'Giảm giá thấp nhất là 0!',
                'giamgia.numeric' => 'Giá sai định dạng!',
                'gia.min' => 'Giá thấp nhất là 0!',
                'gia.numeric' => 'Giá sai định dạng!',
            ];

            $validator = Validator::make($data, [
                'name' => 'required|min:3|max:100',
                'loaisanpham' => 'required',
                'gia' => 'required|min:0|numeric',
                'giamgia' => 'required|min:0|numeric',
            ], $messages);
        }
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $sp->loai_san_pham_id = $request->loaisanpham;
            $sp->name = $request->name;
            $sp->slug = Str::slug($request->name , '-');

            if($request->hienthi == "on" ) {
                $sp->hien_thi = true;
            } else {
                $sp->hien_thi = false;
            }

            $sp->mo_ta = $request->mota;

            $sp->gia = $request->gia;
            if($request->giamgia < $sp->gia) {
                $sp->giam_gia = $request->giamgia;
            }
            $sp->da_ban = $request->daban;
            
            if ($request->hasFile('hinhanh')) {
                
                $file = $request->file('hinhanh');
                $name = $file->getClientOriginalName();
                if ($name != "no_image") {
                        if (File::exists(public_path('upload/sanpham/' . $sp->hinh_anh))) {
                        File::delete(public_path('upload/sanpham/' . $sp->hinh_anh));
                    }
                }
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif') {
                    return redirect()->back()->with('errors', 'File ảnh tải lên không đúng định dạng!');
                }
                
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                while (file_exists("upload/sanpham/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                $file->move("upload/sanpham/", $hinh);
                $sp->hinh_anh = $hinh;
            } 
            $sp->save();
            return redirect(route('admin.sanpham.getDanhSach'))->with('thongbao', 'Sửa thành công: '.$request->name);
        }
    }


    public function getXoa($id) {
        $sp = SanPham::find($id);
        
        if (File::exists(public_path('upload/sanpham/' . $sp->hinh_anh))) {
            File::delete(public_path('upload/sanpham/' . $sp->hinh_anh));
        }

        $sp->delete();

        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }

    // public function postCheck(Request $request, $id) {
    //     $sp=SanPham::find($id);
    //     $sp->hien_thi = $request->hien_thi;
    //     $sp->save();
    // }

    // public function hienThi(Request $request, $id) {
       
    //     $sp=SanPham::find($id)->update($request->all());
    // }

    public function getCheck(Request $request) {
        $sp = SanPham::find($request->id);
        $sp->hien_thi = $request->status;
        $sp->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
