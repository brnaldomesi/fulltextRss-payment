<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  /**
   * Get the feeds for the team.
   */
  public function feeds()
  {
      return $this->hasMany('App\Models\Feed');
  }

  /**
   * Get the team members.
   */
  public function users()
  {
      return $this->hasMany('App\User');
  }
}
