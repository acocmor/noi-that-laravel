<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TTLienHe extends Model
{
    //
    protected $table = 'tt_lien_he';
    protected $filltable = [
        'id',
        'ten_cong_ty',
        'address_id',
        'hotline_id',
        'email',
        'facebook',
        'zalo',
        'twitter',
        'maps',
    ];

    public function website()
    {
        return $this->beLongsTo('App\Model\Website','lien_he_id');
    }

    public function address()
    {
        return $this->hasMany('App\Model\Address','address_id');
    }

    public function hotline()
    {
        return $this->hasMany('App\Model\Hotline','hotline_id');
    }
}
