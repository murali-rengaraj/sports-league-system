@extends('layouts.master')

@section('content')
<div class="mt-1 ms-3">
    <a href="{{ url('/') }}">
        <button class="btn btn-warning">
            Home
        </button>
    </a>
</div>
<div class="container w-25 mt-5">
    <h2 class="text-center text-info">Login</h2>
    @if (Session::has('invalid'))
        <h5 class="alert alert-danger text-center">{{ Session::get('invalid') }}</h5>
    @endif
    <form action="{{ url('/login') }}" method="post">
        @csrf
        <label for="email" class="form-label">Email: </label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        @error('email')
        <p class="alert-sm alert-danger">{{ $errors->first('email') }}</p>
        @enderror

        <label for="pass" class="form-label">Password: </label>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
        @error('password')
        <p class="alert-sm alert-danger">{{ $errors->first('password') }}</p>
        @enderror

        <br>
        <input type="submit" value="Login" class="form-control btn btn-success">
        <p>Register <a href="{{ url('/register') }}">here</a></p>
    </form>
</div>
@endsection