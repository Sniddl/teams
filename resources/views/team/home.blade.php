<!-- Things that will be on this page.
<ul>
  <li>Logo</li>
  <li>Banner</li>
  <li>number of members</li>
  <li>Join link?</li>
  <li>settings</li>
  <li>roster</li>
  <li>pages</li>
</ul> -->

@extends('layouts.app')

@section('content')
<banner></banner>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$team->name}}</div>

                <div class="panel-body">

                  @can('manage users', $team)
                    <li>can manage users</li>
                  @endcan

                  @can('manage roles', $team)
                    <li>can manage roles</li>
                  @endcan

                  @can('edit page', $team)
                    <li>can edit page</li>
                  @endcan

                  @can('create invites', $team)
                    <li>can create invites</li>
                  @endcan

                  @can('view', $team)
                    <li>can view</li>
                  @endcan





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
