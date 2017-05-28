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

    public static function search ($name) {
      return User::where('username',$name)->firstOrFail();
    }


    public function hasRole($role){
      if(is_string($role)){
        return $this->roles->contains('name', $role);
      }
      return !! $role->intersect($this->roles)->count();
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
