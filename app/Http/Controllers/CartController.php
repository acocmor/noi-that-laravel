<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SanPham;
use App\Model\Cart;

class CartController extends Controller
{
   //
   public function getCart() {
        return view('pages.gio-hang');
    }

    public function getCartTemp() {
        return view('pages.layouts.cart');
    }

    public function addCart(Request $request, $id) {
        $sanPham = SanPham::find($id);
        if ($sanPham != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($sanPham, $id);

            $request->session()->put('Cart', $newCart);
        }
        view('pages.layouts.cart', compact('newCart'));
        return redirect()->back();
    }

    public function getDelete(Request $request, $id) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);

        if(Count($newCart->sanPham) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }
        return redirect()->route('index.getCart');
    }

    public function updateCart(Request $request, $id, $tong) {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id, $tong);

        $request->Session()->put('Cart', $newCart);
    
        return redirect()->route('index.getCart');
    }
}
