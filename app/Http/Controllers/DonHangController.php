<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DonHang;
use App\Model\SanPham;
use App\Model\DanhSachKHLH;

class DonHangController extends Controller
{
    //
    public function getDanhSach() {
        $kh = DanhSachKHLH::orderBy('id', 'desc')->get();
        $viewData = [
            'kh' => $kh,
        ];
        return view('admin.pages.donhang.danhsach', $viewData);
    }

    public function getXem($id) {
        $sp = SanPham::find($id);
        $viewData = [
            'sp' => $sp,
        ];
        return view('admin.pages.donhang.xem', $viewData);
    }
}
