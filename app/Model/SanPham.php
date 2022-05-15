<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = 'san_pham';
    protected $filltable = [
        'id',
        'loai_san_pham_id',
        'name',
        'slug',
        'hinh_anh',
        'hien_thi',
        'mo_ta',
        'da_ban',
        'gia',
        'giam_gia',
    ];

    public function loaisanpham()
    {
        return $this->beLongsTo('App\Model\LoaiSanPham','loai_san_pham_id');
    }

    public function chi_tiet_hoa_don() {
        return $this->hasMany(ChiTietHoaDonXuat::class, 'san_pham_id');
    }
}
