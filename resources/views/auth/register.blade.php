@extends('layouts.app')

@section('content')

  <form method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}

      <label for="name">name</label>
      <input id="name" type="text"  name="name" value="{{ old('name') }}" required autofocus>

      <label for="email">email</label>
      <input id="email" type="email"  name="email" value="{{ old('email') }}" required>

      <label for="password">password</label>
      <input id="password" type="password"  name="password" required>

      <label for="password-confirm">password confirm</label>
      <input id="password-confirm" type="password"  name="password_confirmation" required>
      <button type="submit" >
          Register
      </button>
  </form>



@endsection
