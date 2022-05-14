<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KHLienHe extends Model
{
    //
    protected $table = 'kh_lien_he';
    protected $filltable = [
        'id',
        'name',
        'email',
        'phone_number',
        'title',
        'content',
    ];

}
