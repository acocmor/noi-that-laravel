<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GioiThieu extends Model
{
    //
    protected $table = 'gioi_thieu';
    protected $filltable = [
        'id',
        'index_content',
        'content',
    ];
}
