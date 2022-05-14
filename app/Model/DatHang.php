<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DatHang extends Model
{
    //
    protected $table = 'dat_hang';
    protected $filltable = [
        'id',
        'khach_hang_id',
        'ghi_chu',
    ];
    public function khachhang() {
        return $this->belongsTo('App\Model\KhachHang','khach_hang_id');
    }

    public function chitiet()
    {
        return $this->hasMany('App\Model\ChiTiet','dat_hang_id');
    }
}
