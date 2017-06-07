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

@extends('team.layout')

@section('team')

    @foreach($team->posts as $post)
      <post text="{{$post->text}}" time="{{$post->created_at->diffForHumans()}}" title="{{$post->title}}"></post>
    @endforeach

    @if($team->posts->count() < 1)
    <div class="panel panel-default">
        <div class="panel-body">
          <h3>Uh-oh!</h3>
           <p>This team hasn't posted anything yet. Please come back soon.
        </div>
    </div>
    @endif

@endsection
