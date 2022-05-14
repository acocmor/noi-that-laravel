<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //
    protected $table = 'khach_hang';
    protected $filltable = [
        'id',
        'name',
        'phone_number',
        'email',
        'address',
    ];

    public function dathang()
    {
        return $this->hasMany('App\Model\DatHang','khach_hang_id');
    }
}
