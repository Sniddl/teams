<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Team;

class PostController extends Controller
{
    public function create(Request $r) {
      $p = new Post;
      $t = Team::search($r->team);
      $p->team_id = $t->id;
      $p->title = $r->title;
      $p->text = $r->text;
      $p->save();
      return $p;
    }

    public function get($name){
      $t = Team::search($name);
      foreach ($t->posts as $p){
        $p->time = $p->created_at->diffForHumans();
      }
      return $t->posts;
    }
}
