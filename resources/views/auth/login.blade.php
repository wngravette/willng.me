<!-- resources/views/auth/login.blade.php -->
@extends('auth.auth-wrap')
@section('auth_form')
<form method="POST" action="/auth/login">
    {!! csrf_field() !!}
    <dl class="form">
        <dt><label>Username</label></dt>
        <dd><input type="text" name="username" value="{{ old('username') }}"></dd>
    </dl>

    <dl class="form">
        <dt><label>Password</label></dt>
        <dd><input type="password" name="password" id="password"></dd>
    </dl>

    <div class="form-checkbox">
        <label>
        <input type="checkbox" name="remember">
        Remember me?
        </label>
    </div>

    <dl class="form">
        <dd><button class="btn" type="submit">Login</button></dd>
    </dl>
</form>
@endsection
