<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  public function users () {
    return $this->belongsToMany('App\User');
  }

  public function roles () {
    return $this->belongsToMany('App\Role');
  }

  public static function search ($name) {
    return Team::where('name',$name)->firstOrFail();
  }
}
