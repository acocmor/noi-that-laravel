<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DonHang;
use App\Model\SanPham;
use App\Model\HoaDonXuat;
use App\Model\ChiTietHoaDonXuat;
use PDF;

class DatHangController extends Controller
{
    public function getDanhSach() {
        $hoadonxuat = HoaDonXuat::orderBy('id', 'desc')->get();
        $viewData = [
            'hoadonxuat' => $hoadonxuat,
        ];
        return view('admin.pages.hoadon.danhsach', $viewData);
    }

    public function acceptOrder($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        $hoadonxuat->status = 1;
        $hoadonxuat->update();
        return redirect()->back()->with('thongbao', 'Xác nhận đơn hàng DH'.$hoadonxuat->id.' thành công!');
    }

    public function startShip($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        $hoadonxuat->status = 2;
        $hoadonxuat->update();
        return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' đã bắt đầu được giao!');
    }

    public function acceptPayment($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        $hoadonxuat->status = 3;
        $hoadonxuat->update();
        return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' đã được thanh toán!');
    }

    public function cancelOrder($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        if($hoadonxuat->status == 0) {
            $hoadonxuat->status = -1;
            $hoadonxuat->update();
            return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' đã được huỷ!');
        } else if($hoadonxuat->status == -2) {
            $hoadonxuat->status = -1;
            $hoadonxuat->update();
            return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' đã được huỷ!');
        }

        return redirect()->back()->with('loi', 'Lỗi huỷ đơn hàng!');
    }

    public function cancelShip($id) {
        $hoadonxuat = HoaDonXuat::find($id);
        $hoadonxuat->status = -2;
        $hoadonxuat->update();
        return redirect()->back()->with('thongbao', 'Đơn hàng DH'.$hoadonxuat->id.' giao hàng không thành công, chờ giao lại!');
    }

    public function getView($id)
    {
        $hoadonxuat = HoaDonXuat::find($id);
        $respone = array('data' => $hoadonxuat);

        $respone['data']['khach_hang'] = $hoadonxuat->ho_ten;
        $respone['data']['sdt'] = $hoadonxuat->sdt;
        $respone['data']['email'] = $hoadonxuat->email;
        $respone['data']['dia_chi'] = $hoadonxuat->dia_chi;

        foreach ($hoadonxuat->chi_tiet_hdx as $item) {
            $respone['data']['chi_tiet_hdx'] = $item;
            if($item->sanpham) {
                foreach ($item->sanpham as $item2) {
                }
            } else {
                $respone['data']['chi_tiet_hdx']['sanpham'] = "Không tồn tại";
            }
        }
        return $respone;
    }

    public function print($id)
    {
        $hdx = HoaDonXuat::find($id);
        $cthdx = ChiTietHoaDonXuat::where('hoa_don_xuat_id', $id)->get();

        $pdf = PDF::loadView('admin.pages.hoadon.print', compact('hdx', 'cthdx'));

        $title = 'HDX'.$id.'-ngay-xuat-'.$hdx->ngay_lap.'.pdf';
		return $pdf->stream($title);
    }
}
