<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Team;
use App\User;
use App\Permission;

class APIController extends Controller
{
    //get all the roles from something
    public function roles($type, $value) {
      switch ($type) {
        case 'team':
          $data = Team::search($value)->roles()->get();
          break;
        case 'user':
          $data = User::search($value)->roles()->get();
          break;
        case 'permission':
          $data = Permission::search($value)->roles()->get();
          break;

        default:
          return null;
          break;
      }

      return $data;
    }


    //get all the users from something
    public function users($type, $value) {
      switch ($type) {
        case 'team':
          $data = Team::search($value)->users()->get();
          break;
        case 'role':
          $data = Role::search($value)->users()->get();
          break;

        default:
          return null;
          break;
      }

      return $data;
    }


    //get all the teams from something
    public function teams($type, $value) {
      switch ($type) {
        case 'user':
          $data = User::search($value)->teams()->get();
          break;
        case 'role':
          $data = Role::search($value)->teams()->get();
          break;

        default:
          return null;
          break;
      }

      return $data;
    }
}
