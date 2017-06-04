@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @foreach($teams as $team)
                    <module team="{{$team}}" route="/team/{{$team->name}}"></module>
                    @endforeach
                    <module></module>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
