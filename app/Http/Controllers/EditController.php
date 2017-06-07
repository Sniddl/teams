<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Team;

class EditController extends Controller
{
    public function home($team, $page) {
      $team = Team::search($team);
      if (Auth::user()->can('edit page',$team)) return view("team.edit.$page")->with('team', $team);
      return abort(404);
    }
}
