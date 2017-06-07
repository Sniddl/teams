@extends('layouts.app')

@section('content')
<banner team="{{$team->url}}" edit="{{\Auth::user()->can('edit page', $team)}}"></banner>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @yield('team')
        </div>
    </div>
</div>
@endsection
