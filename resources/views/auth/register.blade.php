@extends('layouts.master')

@section('content')
<div class="container w-50 mt-5">
    <h2 class="text-center text-info">Register</h2>
    <form action="{{ url('/register') }}" method="post">
        @csrf
        <label for="name" class="form-label">Name: </label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        @error('name')
        <p class="alert alert-danger">{{ $errors->first('name') }}</p>
        @enderror

        <label for="email" class="form-label">Email: </label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        @error('email')
        <p class="alert-sm alert-danger">{{ $errors->first('email') }}</p>
        @enderror

        <label for="pass" class="form-label">Password: </label>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
        @error('password')
        <p class="alert-sm alert-danger">{{ $message }}</p>
        <!-- <p class="alert-sm alert-danger">{{ $errors->first('password') }}</p> -->
        @enderror

        <label for="password_confirmation" class="form-label">Conform Password: </label>
        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">

        <input type="hidden" value="user" name="user">
        <br>
        <input type="submit" value="Submit" class="form-control btn btn-success">
        <p>Login <a href="{{ url('login') }}">here</a></p>
    </form>
</div>
@endsection