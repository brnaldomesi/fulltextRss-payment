<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = ['team_id', 'feed_title', 'feed_url', 'audience', 'filter_keywords'];

    //
    protected $casts = [
      'filter_keywords' => 'array',
    ];
}
