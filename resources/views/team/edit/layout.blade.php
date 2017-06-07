@extends('layouts.app')

@section('content')
<banner team="{{$team->name}}" edit="editing"></banner>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @yield('team')
        </div>
    </div>
</div>
@endsection
