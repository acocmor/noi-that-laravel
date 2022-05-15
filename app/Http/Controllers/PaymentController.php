<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SanPham;
use App\Model\HoaDonXuat;
use App\Model\ChiTietHoaDonXuat;

class PaymentController extends Controller
{
    //
    public function getPayment() {
        return view('pages.thanh-toan');
    }
    
    public function getThanhCong() {
        return view('pages.thong-bao');
    }

    public function postPayment(Request $request) {

        $this->validate($request,[
            "ho_ten" => "required",
            "dien_thoai" => "required",
            "dia_chi" => "required",
        ],[
            'ho_ten.required' => 'Hãy nhập họ tên!',
            'dien_thoai.required' => 'Hãy nhập só điện thoại!',
            'dia_chi.required' => 'Hãy nhập địa chỉ!',
        ]);

        $cart = \Session::get('Cart');

        $hdx = new HoaDonXuat;
        $hdx->ngay_lap = \Carbon\Carbon::now();
        $hdx->tong_tien = $cart->tongGia;
        $hdx->save();

        foreach ($cart->sanPham as $key => $value) {
            $cthdx = new ChiTietHoaDonXuat;
            $cthdx->hoa_don_xuat_id = $hdx->id;
            $cthdx->san_pham_id = $key;
            $cthdx->so_luong = $value['so_luong'];
            $cthdx->don_gia = $value['gia_ban'];
            $cthdx->thanh_tien = $value['so_luong'] * $value['gia_ban'];
            $cthdx->save();

            $sp = SanPham::find($key);
            $sp->da_ban += $value['so_luong'];
            $sp->update();
        }

        $request->session()->forget('Cart');

        return redirect()->route('index.getThanhCong');
    }
}
