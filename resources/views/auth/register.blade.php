@extends('layouts.app')

@section('content')

  <form method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}

      <label for="username">Username</label>
      <input id="username" type="text"  name="username" value="{{ old('username') }}" required autofocus>

      <label for="name">Display Name</label>
      <input id="displayname" type="text"  name="displayname" value="{{ old('displayname') }}" required>

      <label for="email">Email</label>
      <input id="email" type="email"  name="email" value="{{ old('email') }}" required>

      <label for="password">Password</label>
      <input id="password" type="password"  name="password" required>

      <label for="password-confirm">Password confirm</label>
      <input id="password-confirm" type="password"  name="password_confirmation" required>
      <button type="submit" >
          Register
      </button>

      @if (isset($errors))
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
  </form>



@endsection
