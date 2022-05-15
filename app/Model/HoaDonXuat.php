<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HoaDonXuat extends Model
{
    protected $table = 'hoa_don_xuat';
    protected $fillable = [
        'ngay_lap',
        'tong_tien',
        'ho_ten',
        'email',
        'sdt',
        'dia_chi',
        'status',
    ];

    public function chi_tiet_hdx() {
        return $this->hasMany(ChiTietHoaDonXuat::class, 'hoa_don_xuat_id');
    }
}