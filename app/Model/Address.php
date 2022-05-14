<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'address';
    protected $filltable = [
        'id',
        'dia_chi',
        'official_add',
        'hotline_add',
    ];

    public function ttlienhe()
    {
        return $this->beLongsTo('App\Model\TTLienHe','address_id');
    }
}
