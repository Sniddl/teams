<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users () {
      return $this->belongsToMany('App\User');
    }

    public function teams () {
      return $this->belongsToMany('App\Team');
    }

    public function permissions () {
      return $this->belongsToMany('App\Permission');
    }

    public static function search ($name) {
      return Role::where('name',$name)->firstOrFail();
    }


    // public static function allPermissions () {
    //   $roles = Role::get();
    //   foreach ($roles as $role) {
    //     $role->permissions = $role->permissions();
    //
    //     foreach ($role->permissions as $perm) {
    //       unset($perm->id);
    //       unset($perm->pivot);
    //       unset($perm->created_at);
    //       unset($perm->updated_at);
    //     }
    //
    //     unset($role->id);
    //     unset($role->created_at);
    //     unset($role->updated_at);
    //
    //   }
    //   return $roles;
    // }
    //
    //
    // public static function allTeams () {
    //   $roles = Role::get();
    //   foreach ($roles as $role) {
    //     $role->teams = $role->teams();
    //
    //     foreach ($role->teams as $team) {
    //       unset($team->id);
    //       unset($team->pivot);
    //       unset($team->created_at);
    //       unset($team->updated_at);
    //     }
    //
    //     unset($role->id);
    //     unset($role->created_at);
    //     unset($role->updated_at);
    //
    //   }
    //   return $roles;
    // }
}
