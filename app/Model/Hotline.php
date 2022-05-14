<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hotline extends Model
{
    //
    protected $table = 'hotline';
    protected $filltable = [
        'id',
        'hotline',
        'offical_hotline',
        'hotline_id',
    ];

    public function ttlienhe()
    {
        return $this->beLongsTo('App\Model\TTLienHe','hotline_id');
    }
}
