<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Decor extends Model
{
    //
    protected $table = 'decor';
    protected $filltable = [
        'id',
        'title',
        'slug',
        'content',
    ];

}
