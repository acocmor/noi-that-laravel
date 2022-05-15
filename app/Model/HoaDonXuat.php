<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HoaDonXuat extends Model
{
    protected $table = 'hoa_don_xuat';
    protected $fillable = [
        'nhan_vien_id',
        'khach_hang_id',
        'ngay_lap',
        'tong_tien',
    ];

    public function chi_tiet_hdx() {
        return $this->hasMany(ChiTietHoaDonXuat::class, 'hoa_don_xuat_id');
    }
}