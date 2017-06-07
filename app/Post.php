<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function team() {
    return $this->belongsTo('App\Team');
  }
}
