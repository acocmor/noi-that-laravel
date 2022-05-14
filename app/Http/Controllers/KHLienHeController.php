<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Model\LoaiSanPham;
use App\Model\SanPham;
use App\Model\KHLienhe;
use Carbon\Carbon;

class KHLienHeController extends Controller
{
    //
    public function getDanhSach() {
        $khlh = KHLienHe::orderBy('id','DESC')->get();
        $viewdata = [
            'khlh' => $khlh,
        ];
        return view('admin.pages.kh_lienhe.danhsach', $viewdata);
    }

    public function getView($id) {
        $khlh = KHLienHe::find($id);
        $time= $khlh->created_at->format('d/m/Y H:m:s');
        return response()->json(['data'=>$khlh, 'time'=>$time],200);
    }

    public function getXoa($id) {
        KHLienHe::find($id)->delete();
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }
}
