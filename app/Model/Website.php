<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    //
    protected $table = 'website';
    protected $filltable = [
        'id',
        'name_website',
        'ten_cong_ty',
        'logo',
        'hotline',
        'email',
        'banner',
        'social_facebook',
    ];

    public function ttlienhe()
    {
        return $this->hasMany('App\Model\TTLienHe','lien_he_id');
    }

}
