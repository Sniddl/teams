@extends('team.edit.layout')
@section('team')

<div class="panel panel-default">
    <div class="panel-body">


        <form class="" action="/team/{{$team->name}}/edit/name" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="teamname">Team Name</label>
            <input type="text" class="form-control" id="teamname" placeholder="{{$team->name}}">
          </div>
        </form>
      <hr>

        <form class="" action="/team/{{$team->name}}/edit/invite" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="title">Invite Code</label>
            <div type="text" class="form-control" id="title" >asdf</div>
          </div>
        </form>
      <hr>


    </div>
</div>

@endsection
