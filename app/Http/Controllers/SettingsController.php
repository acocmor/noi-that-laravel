<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Model\LoaiSanPham;
use App\Model\SanPham;
use App\Model\Website;
use App\Model\TTLienHe;
use App\Model\Address;
use App\Model\ChinhSach;
use App\Model\GioiThieu;

class SettingsController extends Controller
{
    //
    public function getDanhSach() {
        return view('admin.pages.website.list');
    }

    public function getTLC() {
        $tlc = Website::find(1);
        $viewdata = [
            'tlc' => $tlc,
        ];
        return view('admin.pages.website.thiet-lap-website', $viewdata);
    }

    public function postThemTLC(Request $request) {
        $tlc = new Website;
        $data = $request->except('_token');

        $messages = [
                'name.required' => 'Hãy nhập địa chỉ website!',
                'name_website.required' => 'Hãy nhập tên website!',
            ];

        $validator = Validator::make($data, [
                'name' => 'required',
                'name_website' => 'required',
        ], $messages);
            
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $tlc->name_website = $request->name;
            $tlc->ten_cong_ty = $request->name_website;
            $tlc->hotline = $request->hotline;
            $tlc->email = $request->email;
            $tlc->social_facebook = $request->social_facebook;
            $tlc->dia_chi = $request->dia_chi;

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $name = $file->getClientOriginalName();
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect()->back()->with('errors', 'File ảnh tải lên không đúng định dạng!');
                }
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                while (file_exists("images/website/logo/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                $file->move("images/website/logo/", $hinh);
                $tlc->logo = $hinh;
            } 

            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $name = $file->getClientOriginalName();
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect()->back()->with('errors', 'File ảnh tải lên không đúng định dạng!');
                }
                
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                while (file_exists("images/website/banner/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                $file->move("images/website/banner/", $hinh);
                $tlc->banner = $hinh;
            } 

            if ($request->hasFile('slide')) {
                $file = $request->file('slide');
                $name = $file->getClientOriginalName();
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect()->back()->with('errors', 'File ảnh tải lên không đúng định dạng!');
                }
                
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                while (file_exists("images/website/slides/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                $file->move("images/website/slides/", $hinh);
                $tlc->slide = $hinh;
            }

            $tlc->save();

            return redirect(route('admin.website.getTLC'))->with('thongbao', 'Thêm thành công!');
        }
    }

    public function postTLC(Request $request, $id) {
        $tlc = Website::find($id);
        $data = $request->except('_token');

        $messages = [
                'name.required' => 'Hãy nhập địa chỉ website!',
                'name_website.required' => 'Hãy nhập tên website!',
            ];

        $validator = Validator::make($data, [
                'name' => 'required',
                'name_website' => 'required',
        ], $messages);
            
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $tlc->name_website = $request->name;
            $tlc->ten_cong_ty = $request->name_website;
            $tlc->hotline = $request->hotline;
            $tlc->email = $request->email;
            $tlc->social_facebook = $request->social_facebook;
            $tlc->dia_chi = $request->dia_chi;

            
            if ($request->hasFile('logo')) {
                
                $file = $request->file('logo');
                $name = $file->getClientOriginalName();
                if ($name != "no_image") {
                        if (File::exists(public_path('images/website/logo/' . $tlc->logo))) {
                        File::delete(public_path('images/website/logo/' . $tlc->logo));
                    }
                }
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect()->back()->with('errors', 'File ảnh tải lên không đúng định dạng!');
                }
                
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                while (file_exists("images/website/logo/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                $file->move("images/website/logo/", $hinh);
                $tlc->logo = $hinh;
            } 

            if ($request->hasFile('banner')) {
                
                $file = $request->file('banner');
                $name = $file->getClientOriginalName();
                if ($name != "no_image") {
                        if (File::exists(public_path('images/website/banner/' . $tlc->banner))) {
                        File::delete(public_path('images/website/banner/' . $tlc->banner));
                    }
                }
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect()->back()->with('errors', 'File ảnh tải lên không đúng định dạng!');
                }
                
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                while (file_exists("images/website/banner/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                $file->move("images/website/banner/", $hinh);
                $tlc->banner = $hinh;
            } 

            if ($request->hasFile('slide')) {
                
                $file = $request->file('slide');
                $name = $file->getClientOriginalName();
                if ($name != "no_image") {
                        if (File::exists(public_path('images/website/slides/' . $tlc->slide))) {
                        File::delete(public_path('images/website/slides/' . $tlc->slide));
                    }
                }
                $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect()->back()->with('errors', 'File ảnh tải lên không đúng định dạng!');
                }
                
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                while (file_exists("images/website/slides/" . $hinh)) {
                    $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
                }
                $file->move("images/website/slides/", $hinh);
                $tlc->banner = $hinh;
            } 

            $tlc->save();

            return redirect(route('admin.website.getTLC'))->with('thongbao', 'Cập nhật thành công!');
        }
    }

    public function getLH() {
        $lh = TTLienHe::find(1);
        $viewdata = [
            'lh' => $lh,
        ];
        return view('admin.pages.website.lien-he', $viewdata);
    }

    public function postLH(Request $request, $id) {
        $lh = TTLienHe::find($id);
        $data = $request->except('_token');
        $lh->content = $request->content;
        $lh->maps = $request->maps;
        $lh->save();
        return redirect(route('admin.website.getLH'))->with('thongbao', 'Cập nhật thành công!');
    }

    public function getCH() {
        $ch = Address::all();
        $viewdata = [
            'ch' => $ch,
        ];
        return view('admin.pages.website.list-cua-hang', $viewdata);
    }

    public function postThemCh(Request $request) {

        $data = $request->except('_token');
        $messages = [
                'dia_chi.required' => 'Hãy nhập địa chỉ!',
            ];

        $validator = Validator::make($data, [
                'dia_chi' => 'required',
        ], $messages);
            
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $ch = new Address;
            $ch->dia_chi = $request->dia_chi;
            $ch->hotline_add = $request->hotline_add;
            $ch->save();
            return redirect(route('admin.website.getCH'))->with('thongbao', 'Thêm mới địa chỉ thành công!');
        }
    }

    public function getXoaCH($id) {
        $ch = Address::find($id);
        $ch->delete();
        return redirect(route('admin.website.getCH'))->with('thongbao', 'Xoá thành công!');

    }

    public function getSuaCH($id) {
        $ch = Address::find($id);
        return response()->json(['data'=>$ch],200);
    }

    public function postCH(Request $request, $id) {
        $ch = Address::find($id);
        $data = $request->except('_token');
        $messages = [
                'dia_chi.required' => 'Hãy nhập địa chỉ!',
            ];

        $validator = Validator::make($data, [
                'dia_chi' => 'required',
        ], $messages);
            
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {

            $ch->dia_chi = $request->dia_chi;
            $ch->hotline_add = $request->hotline_add;
            $ch->save();
            return redirect(route('admin.website.getCH'))->with('thongbao', 'Cập nhật địa chỉ thành công!');
        }
    }   

    public function getCS() {
        $cs = ChinhSach::all();
        $viewdata = [
            'cs' => $cs,
        ];
        return view('admin.pages.website.chinh-sach.list', $viewdata);
    }

    public function getThemCS() {
        return view('admin.pages.website.chinh-sach.add');
    }

    public function postThemCS(Request $request) {
        $data = $request->except('_token');

        $messages = [
            'title.required' => 'Hãy nhập tên chính sách!',
            'title.unique' => 'Trùng tên chính sách!',
            'title.min' => 'Tên sản quá ngắn!',
            'title.max' => 'Tên sản quá dài!',
        ];
        $validator = Validator::make($data, [
            'title' => 'required|min:3|max:100|unique:chinh_sach,title',
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $cs = new ChinhSach;
            $cs->title = $request->title;
            $cs->slug = Str::slug($request->title , '-');

            if($request->hien_thi == "on" ) {
                $cs->hien_thi = true;
            } else {
                $cs->hien_thi = false;
            }
            $cs->content = $request->content;
            $cs->save();
            return redirect(route('admin.website.getCS'))->with('thongbao', 'Thêm mới thành công chính sách!');
        }
    }

    public function getCheckCS(Request $request) {
        $cs = ChinhSach::find($request->id);
        $cs->hien_thi = $request->status;
        $cs->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function getXoaCS($id) {
        $cs = ChinhSach::find($id);
        $cs->delete();
        return redirect(route('admin.website.getCS'))->with('thongbao', 'Xoá thành công!');
    }

    public function getSuaCS($id) {
        $cs = ChinhSach::find($id);
        $viewdata = [
            'cs' => $cs,
        ];
        return view('admin.pages.website.chinh-sach.sua', $viewdata);
    }

    public function getXemCS($id) {
        $cs = ChinhSach::find($id);
        $viewdata = [
            'cs' => $cs,
        ];
        return view('admin.pages.website.chinh-sach.xem', $viewdata);
    }

    public function postSuaCS(Request $request, $id) {
        $cs = ChinhSach::find($id);
        $data = $request->except('_token');

        if ($request->title == $cs->title) {
            $messages = [
                'title.required' => 'Hãy nhập tên chính sách!',
                'title.min' => 'Tên sản quá ngắn!',
                'title.max' => 'Tên sản quá dài!',
            ];
            $validator = Validator::make($data, [
                'title' => 'required|min:3|max:100',
            ], $messages);
        } else {
            $messages = [
                'title.required' => 'Hãy nhập tên chính sách!',
                'title.unique' => 'Trùng tên chính sách!',
                'title.min' => 'Tên sản quá ngắn!',
                'title.max' => 'Tên sản quá dài!',
            ];
            $validator = Validator::make($data, [
                'title' => 'required|min:3|max:100|unique:chinh_sach,title',
            ], $messages);
        }
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {

            $cs->title = $request->title;
            $cs->slug = Str::slug($request->title , '-');

            if($request->hien_thi == "on" ) {
                $cs->hien_thi = true;
            } else {
                $cs->hien_thi = false;
            }
            $cs->content = $request->content;
            $cs->save();
            return redirect(route('admin.website.getCS'))->with('thongbao', 'Thêm mới thành công chính sách!');
        }
    }

    public function getGioiThieu() {
        $gt = GioiThieu::find(1);
        $viewData = [
            'gt' => $gt,
        ];
        return view('admin.pages.website.gioi-thieu', $viewData);
    }

    public function postAddGioiThieu(Request $request) {
        $data = $request->except('_token');

        $messages = [
            'index_content.required' => 'Hãy nhập nội dung giới thiệu ngoài TRANG CHỦ!',
            'content.required' => 'Hãy nhập nội dung TRANG GIỚI THIỆU!',
            
        ];
        $validator = Validator::make($data, [
            'index_content' => 'required',
            'content' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $gt = new GioiThieu;
            $gt->index_content = $request->index_content;
            $gt->content = $request->content;
            $gt->save();
            return redirect(route('admin.website.getGioiThieu'))->with('thongbao', 'Thêm mới thành công!');
        }
    }

    public function postGioiThieu(Request $request, $id) {
        $gt = GioiThieu::find($id);
        $data = $request->except('_token');

        $messages = [
            'index_content.required' => 'Hãy nhập nội dung giới thiệu ngoài TRANG CHỦ!',
            'content.required' => 'Hãy nhập nội dung TRANG GIỚI THIỆU!',
        ];
        $validator = Validator::make($data, [
            'index_content' => 'required',
            'content' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } else {
            $gt->index_content = $request->index_content;
            $gt->content = $request->content;
            $gt->save();
            return redirect(route('admin.website.getGioiThieu'))->with('thongbao', 'Cập nhật thành công!');
        }
    }
    
}
