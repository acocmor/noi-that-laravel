<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChinhSach extends Model
{
    //
    protected $table = 'chinh_sach';
    protected $filltable = [
        'id',
        'title',
        'slug',
        'content',
        'hien_thi',
    ];

}
