<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'display_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function teams () {
      return $this->belongsToMany('App\Team');
    }

    public function roles () {
      return $this->belongsToMany('App\Role');
    }

    public function settings () {
      return $this->belongsToMany('App\Setting');
    }

    public static function search ($name) {
      return User::where('username',$name)->firstOrFail();
    }


    public function hasRole($team, $role){
      $roles = $this->roles()->where('name', 'like', "$team->name:%")->get();
      $r = "$team->name:$role";
      $array = $roles->pluck('name')->all();
      return in_array($r, $array);
    }

    public function hasPermission($team, $permission){
      $roles = $this->roles()->where('name', 'like', "$team->name:%")->get();
      $array = [];
      foreach($roles as $role) {
        $perms = $role->permissions()->get();
        foreach($perms as $perm) {
          array_push($array, $perm->name);
        }
      }
      return in_array($permission, $array);
    }

    public function allowedTo($permission, $team=null) {
      $perms = [];
      $obj = $this;
      if ($team) $obj = $team;
      foreach ($obj->roles as $role) {
        foreach ($role->permissions as $perm) {
          array_push($perms, $perm->name);
        }
      }
      return in_array($permission, $perms);
    }
}
