<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Model\LoaiSanPham;
use App\Model\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChucNangController extends Controller
{
    //
    public function getCN() {
        return view('admin.pages.chucnang.list');
    }

}
