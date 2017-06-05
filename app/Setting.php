<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  public function users () {
    return $this->belongsToMany('App\User');
  }

  public function teams () {
    return $this->belongsToMany('App\Team');
  }


}
