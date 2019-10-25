<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feeds extends Model
{
    //
    protected $casts = [
        'filter_keywords' => 'array',
        'regex_curations' => 'array',
    ];
}
