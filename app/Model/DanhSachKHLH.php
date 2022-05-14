<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DanhSachKHLH extends Model
{
    //
    protected $table = 'danh_sach_kh_lh';
    protected $filltable = [
        'id',
        'name',
        'email',
        'phone_number',
        'desc',
        'sanpham_id',
    ];
    public function sanpham() {
        return $this->belongsTo('App\Model\SanPham','sanpham_id');
    }
}
