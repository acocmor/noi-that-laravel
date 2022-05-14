<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChiTiet extends Model
{
    //
    protected $table = 'chi_tiet';
    protected $filltable = [
        'id',
        'dat_hang_id',
        'san_pham_id',
    ];
    public function dathang() {
        return $this->belongsTo('App\Model\DatHang','dat_hang_id');
    }
    public function sanpham() {
        return $this->belongsTo('App\Model\SanPham','san_pham_id');
    }

    
}
