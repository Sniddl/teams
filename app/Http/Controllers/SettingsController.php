<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permerssion;
use App\Setting;
use App\Team;
use App\Role;
use Auth;

class SettingsController extends Controller
{
    public function user() {
      return view("auth.settings");
    }

    public function team() {
      return view("team.settings");
    }
}
