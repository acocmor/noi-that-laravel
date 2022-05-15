<?php
namespace App\Model;
class Cart
{
    public $sanPham = null;
    public $tongGia = 0;
    public $tongSoluong = 0;

    public function __construct($cart) {
        if ($cart) {
            $this->sanPham = $cart->sanPham;
            $this->tongGia = $cart->tongGia;
            $this->tongSoluong = $cart->tongSoluong;
        }
    }

    public function addCart($sanPham, $id) {
        $sanPhamInfo = ['id' => $sanPham->id, 'loai_san_pham' => $sanPham->loaisanpham->name, 'name' => $sanPham->name, 'gia_ban'=>$sanPham->gia-$sanPham->giam_gia, 'hinh_anh'=>$sanPham->hinh_anh];
        $newSanPham = ['so_luong' => 0, 'gia_ban' => $sanPham->gia-$sanPham->giam_gia, 'sanPhamInfo' => $sanPham];
        if ($this->sanPham) {
            if (array_key_exists($id, $this->sanPham)) {
                $newSanPham = $this->sanPham[$id];
            }
        }
        $newSanPham['so_luong']++;
        $newSanPham['gia_ban'] = $newSanPham['so_luong'] * ( $sanPham->gia-$sanPham->giam_gia);
        $this->sanPham[$id] = $newSanPham;
        $this->tongGia +=  $sanPham->gia-$sanPham->giam_gia;
        $this->tongSoluong++;
    }

    public function deleteItemCart($id) {
        $this->tongSoluong -= $this->sanPham[$id]['so_luong'];
        $this->tongGia -= $this->sanPham[$id]['gia_ban'];
        unset($this->sanPham[$id]);
    }

    public function UpdateItemCart($id, $tong) {
        $this->tongSoluong -= $this->sanPham[$id]['so_luong'];
        $this->tongGia -= $this->sanPham[$id]['gia_ban'];

        $this->sanPham[$id]['so_luong'] = $tong;
        $this->sanPham[$id]['gia_ban'] = $tong * $this->sanPham[$id]['sanPhamInfo']->gia_ban;

        $this->tongSoluong += $this->sanPham[$id]['so_luong'];
        $this->tongGia += $this->sanPham[$id]['gia_ban'];
    }
}