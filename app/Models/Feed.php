<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    //
    protected $casts = [
        'filter_keywords' => 'array',
    ];
}
