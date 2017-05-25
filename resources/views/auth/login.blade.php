@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <label for="email">email</label>
    <input id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus>

    <label for="password">password</label>
    <input id="password" type="password"  name="password" required>

    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    <button type="submit" >
        Login
    </button>

    <a href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>
</form>
@endsection
