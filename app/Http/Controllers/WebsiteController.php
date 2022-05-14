<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SanPham;
use App\Model\LoaiSanPham;
use App\Model\KHLienHe;
use App\Model\ChinhSach;
use App\Model\GioiThieu;
use App\Model\DanhSachKHLH;
use App\Model\Website;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class WebsiteController extends Controller
{
    //

    public function getIndex() {
        $sp = SanPham::where('hien_thi', 1)->take(12)->get();
        $web = Website::find(1);
        $viewData = [
            'sp' => $sp,
            'web' => $web,
        ];
        return view('pages.index', $viewData);
    }

    public function getProductPage() {
        $pro = LoaiSanPham::all();
        $viewData = [
            'loai_sp' => $pro, 
        ];
        return view('pages.product-page', $viewData);
    }

    public function getTrangLSP($id) {
        $lsp = LoaiSanPham::find($id);
        // $sp = SanPham::where('loai_san_pham_id', $lsp->id)->paginate(2);
        $sp = DB::table('san_pham')->where('loai_san_pham_id', $id)->paginate(9);
        $viewData = [
            'lsp' => $lsp,
            'item' => $sp,
        ];

        return view('pages.category-product', $viewData);
    }

    public function getSP($id) {
        $sp = SanPham::find($id);

        $viewData = [
            'sp' => $sp,
        ];

        return view('pages.product', $viewData);
    }

    public function getLienHe() {
        return view('pages.contact_page');
    }

    public function postLienHe(Request $request) {
        $data = $request->except('_token');
        $khlh = new KHLienHe;
        $khlh->name = $request->name;
        $khlh->email = $request->email;
        $khlh->phone_number = $request->phone_number;
        $khlh->title = $request->title;
        $khlh->content = $request->content;

        $khlh->save();

        echo "<script> alert('Cảm ơn bạn đã gửi thông tin, chúng tôi sẽ sớm liên hệ tới bạn!') </script> ";

        return view('pages.contact_page');
    }

    public function getSearch(Request $request) {
        $pro = SanPham::where('name', 'like', '%'.$request->input_search.'%')->get();
        $viewData = [
            'pro' => $pro,
        ];
        return view('pages.product-page', $viewData);
    }

    public function getChinhSach($id) {
        $cs = ChinhSach::find($id);
        $viewData = [
            'cs' => $cs,
        ];
        return view('pages.chinh-sach', $viewData);
    }

    public function getGioiThieu() {
        $gt = GioiThieu::find(1);
        $viewData = [
            'gt' => $gt,
        ];
        return view('pages.gioi-thieu', $viewData);
    }

    public function getLHTV($id) {
        $sp = SanPham::find($id);
        $viewData = [
            'sp' => $sp,
        ];
        return view('pages.mua-san-pham', $viewData);
    }

    public function postLHTV(Request $request, $id) {
        $kh = new DanhSachKHLH;
        $kh->name = $request->name;
        $kh->email = $request->email;
        $kh->phone_number = $request->phone_number;
        $kh->ghi_chu = $request->ghi_chu;
        $kh->sanpham_id = $id;
        $kh->save();

        return redirect(route('getProductPage'));
    }
}
