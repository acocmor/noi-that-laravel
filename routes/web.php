<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WebsiteController@getIndex')->name('index');




Route::prefix('gio-hang')->group(function () {
    Route::get('/', 'CartController@getCart')->name('index.cart');

    Route::get('/cart', 'CartController@getCartTemp')->name('index.getCart');

    Route::get('/them/{id}', 'CartController@addCart' )->name('index.addCart');

    Route::get('/sua/{id}/{tong}', 'CartController@updateCart')->name('index.updateCart');

    Route::get('/xoa/{id}', 'CartController@getDelete')->name('index.getDelete');
});

Route::prefix('thanh-toan')->middleware('payment')->group(function () {
    Route::get('/', 'PaymentController@getPayment')->name('index.getPayment');

    Route::post('/', 'PaymentController@postPayment')->name('index.postPayment');

});

Route::get('/thong-bao','PaymentController@getThanhCong')->name('index.getThanhCong');



Route::group(['prefix' => 'lien-he'], function() {
    Route::get('/', 'WebsiteController@getLienHe')->name('getLienHe');

    Route::post('/', 'WebsiteController@postLienHe')->name('postLienHe');
});

Route::group(['prefix' => 'san-pham'], function () {
    Route::get('/', 'WebsiteController@getProductPage')->name('getProductPage');

    Route::get('{id}/{slug}', 'WebsiteController@getTrangLSP')->name('getTrangLSP');

    Route::get('{id}', 'WebsiteController@getSP')->name('getSP');

});

Route::get('search', 'WebsiteController@getSearch')->name('getSearch');

Route::get('chinh-sach-{id}/{slug}', 'WebsiteController@getChinhSach')->name('getChinhSach');

Route::get('gioi-thieu', 'WebsiteController@getGioiThieu')->name('getGioiThieu');

Route::get('lien-he-tu-van/{id}', 'WebsiteController@getLHTV')->name('getLHTV');
Route::post('lien-he-tu-van/{id}', 'WebsiteController@postLHTV')->name('postLHTV');


Route::get('admin/dang-nhap', 'AdminController@getLoginAdmin')->name('admin.login');
Route::post('admin/dang-nhap', 'AdminController@postLoginAdmin')->name('admin.postLogin');
Route::get('admin/dang-xuat', 'AdminController@getLogoutAdmin')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'], function () {
    
    Route::get('/', function () {
        return view('admin.pages.index');
    })->name('admin.index');

    Route::get('/san-pham-page', function () {
        return view('admin.pages.sanpham');
    })->name('admin.sanpham.getIndex')->middleware('checkRole2');

    Route::group(['prefix' =>'profile'], function () {
            
    });

    Route::group(['prefix' =>'don-hang'], function () {
        Route::get('/', 'DonHangConTroller@getDanhSach')->name('admin.donhang.getDanhSach');

        Route::get('xoa/{id}', 'DonHangConTroller@getXoa')->name('admin.donhang.getXoa');

        Route::get('xem/{id}', 'DonHangConTroller@getXem')->name('admin.donhang.getXem');
    });

    Route::group(['prefix' =>'loai-san-pham', 'middleware' => 'checkRole2'], function () {
        Route::get('/', 'LoaiSanPhamConTroller@getDanhSach')->name('admin.loaisanpham.getDanhSach');

        Route::post('them', 'LoaiSanPhamConTroller@postThem')->name('admin.loaisanpham.postThem');

        Route::get('sua/{id}', 'LoaiSanPhamConTroller@getSua')->name('admin.loaisanpham.getSua');
        Route::post('sua/{id}', 'LoaiSanPhamConTroller@postSua')->name('admin.loaisanpham.postSua');

        Route::get('xoa/{id}', 'LoaiSanPhamConTroller@getXoa')->name('admin.loaisanpham.getXoa');
    });

    Route::group(['prefix' =>'san-pham', 'middleware' => 'checkRole2'], function () {
        Route::get('/', 'SanPhamConTroller@getDanhSach')->name('admin.sanpham.getDanhSach');

        Route::get('them', 'SanPhamConTroller@getThem')->name('admin.sanpham.getThem');
        Route::post('them', 'SanPhamConTroller@postThem')->name('admin.sanpham.postThem');

        Route::get('sua/{id}', 'SanPhamConTroller@getSua')->name('admin.sanpham.formSua');
        Route::post('sua/{id}', 'SanPhamConTroller@postSua')->name('admin.sanpham.postSua');

        Route::get('check', 'SanPhamConTroller@getCheck')->name('admin.sanpham.getCheck');

        Route::get('xoa/{id}', 'SanPhamConTroller@getXoa')->name('admin.sanpham.getXoa');

        Route::get('xem/{id}', 'SanPhamConTroller@getXem')->name('admin.sanpham.getXem');
    });

    Route::group(['prefix' =>'danh-sach-khach-hang-lien-he'], function () {
        Route::get('/', 'KHLienHeConTroller@getDanhSach')->name('admin.khlienhe.getDanhSach');

        Route::get('view/{id}', 'KHLienHeConTroller@getView')->name('admin.khlienhe.getView');

        Route::get('xoa/{id}', 'KHLienHeConTroller@getXoa')->name('admin.khlienhe.getXoa');

    });

    Route::group(['prefix' =>'thiet-lap-website', 'middleware' => 'checkRole'], function () {
        Route::get('/', 'SettingsController@getDanhSach')->name('admin.website.getDanhSach');

        Route::get('thiet-lap-chung', 'SettingsController@getTLC')->name('admin.website.getTLC');
        Route::post('thiet-lap-chung/{id}', 'SettingsController@postTLC')->name('admin.website.postTLC');
        Route::post('thiet-lap-chung', 'SettingsController@postThemTLC')->name('admin.website.postThemTLC');

        Route::get('trang-lien-he', 'SettingsController@getLH')->name('admin.website.getLH');
        Route::post('trang-lien-he/{id}', 'SettingsController@postLH')->name('admin.website.postLH');

        Route::get('danh-sach-cua-hang', 'SettingsController@getCH')->name('admin.website.getCH');
        Route::post('danh-sach-cua-hang', 'SettingsController@postThemCH')->name('admin.website.postThemCH');

        Route::get('danh-sach-cua-hang/sua/{id}', 'SettingsController@getSuaCH')->name('admin.website.getSuaCH');
        Route::post('danh-sach-cua-hang/sua/{id}', 'SettingsController@postCH')->name('admin.website.postCH');

        Route::get('danh-sach-cua-hang/xoa/{id}', 'SettingsController@getXoaCH')->name('admin.website.getXoaCH');

        Route::get('chinh-sach-cua-hang', 'SettingsController@getCS')->name('admin.website.getCS');
        Route::get('chinh-sach-cua-hang/them', 'SettingsController@getThemCS')->name('admin.website.getThemCS');
        Route::post('chinh-sach-cua-hang/them', 'SettingsController@postThemCS')->name('admin.website.postThemCS');
        Route::get('chinh-sach-cua-hang/check', 'SettingsController@getCheckCS')->name('admin.website.getCheckCS');
        Route::get('chinh-sach-cua-hang/sua/{id}', 'SettingsController@getSuaCS')->name('admin.website.getSuaCS');
        Route::post('chinh-sach-cua-hang/sua/{id}', 'SettingsController@postSuaCS')->name('admin.website.postSuaCS');
        Route::get('chinh-sach-cua-hang/xoa/{id}', 'SettingsController@getXoaCS')->name('admin.website.getXoaCS');
        Route::get('chinh-sach-cua-hang/xem/{id}', 'SettingsController@getXemCS')->name('admin.website.getXemCS');

        Route::get('trang-gioi-thieu', 'SettingsController@getGioiThieu')->name('admin.website.getGioiThieu');
        Route::post('trang-gioi-thieu/{id}', 'SettingsController@postGioiThieu')->name('admin.website.postGioiThieu');
        Route::post('trang-gioi-thieu', 'SettingsController@postAddGioiThieu')->name('admin.website.postAddGioiThieu');

    });


    Route::group(['prefix' =>'user', 'middleware' => 'checkRole'], function () {
        Route::get('/', 'UserController@getDanhSach')->name('admin.user.getDanhSach');

        Route::get('/them-nguoi-dung', 'UserController@getThem')->name('admin.user.getThem');
        Route::post('/them-nguoi-dung', 'UserController@postThem')->name('admin.user.postThem');

        Route::get('/sua-nguoi-dung/{id}', 'UserController@getSua')->name('admin.user.getSua');
        Route::post('/sua-nguoi-dung/{id}', 'UserController@postSua')->name('admin.user.postSua');

        Route::post('/resetPassword/{id}', 'UserController@postResetPassword')->name('admin.user.postResetPassword');

        Route::get('/xoa/{id}', 'UserController@getXoa')->name('admin.user.getXoa');

    });

    Route::group(['prefix' =>'profile'], function () {
        Route::get('/', 'ProfileController@getProfile')->name('admin.user.getProfile');

        Route::post('/doi-mat-khau-{id}', 'ProfileController@postChangePassword')->name('admin.user.postChangePassword');

        Route::post('/changePass', 'ProfileController@changePass')->name('admin.user.changePass');
    });

    Route::group(['prefix' =>'chuc-nang'], function () {
        Route::get('/', 'ChucNangController@getCN')->name('admin.user.getCN');
    });

});

