<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  public function roles () {
    return $this->belongsToMany('App\Role');
  }

  public static function search ($name) {
    return Permission::where('name',$name)->firstOrFail();
  }
}
