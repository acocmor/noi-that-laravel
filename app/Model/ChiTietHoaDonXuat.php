<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonXuat extends Model
{
    protected $table = 'chi_tiet_hoa_don';
    protected $fillable = [
        'hoa_don_xuat_id',
        'san_pham_id',
        'so_luong',
        'don_gia',
        'giam_gia',
        'thanh_tien',
    ];

    public function hoa_don_xuat() {
        return $this->belongsTo(HoaDonXuat::class, 'hoa_don_xuat_id');
    }

    public function sanpham() {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }
}