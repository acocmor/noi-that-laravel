<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    //
    protected $table = 'loai_san_pham';
    protected $filltable = [
        'id',
        'name',
        'slug',
    ];

    public function sanpham()
    {
        return $this->hasMany('App\Model\SanPham','loai_san_pham_id');
    }

}
