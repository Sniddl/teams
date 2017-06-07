<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Role;
use App\Permission;
use Auth;

class TeamController extends Controller
{
    public function create(Request $r) {
      $this->validate($r, [
        'name' => 'required|unique:teams|max:255|regex:/^[a-zA-Z0-9-_]+$/',
      ]);
      $t = new Team;
      $t->name = $r->name;
      $t->save();

      $u = Auth::user();

      $role = new Role;
      $role->name = $r->name.':Admin';
      $role->save();

      $role->permissions()->sync([
        Permission::search('manage users')->id,
        Permission::search('manage roles')->id,
        Permission::search('edit page')->id,
        Permission::search('create invites')->id,
        Permission::search('view')->id,
      ]);

      $u->roles()->save($role);
      $t->roles()->save($role);
      $t->users()->save($u);
      return back();
    }


    public function page($name, $page=null) {
      $team = Team::search($name);
      if(!$page) return view("team.home")->with('team', $team);
      return view("team.$page")->with('team', $team);
    }
}
