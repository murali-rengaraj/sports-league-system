@extends('layouts.master')

@section('content')
    <div class="container w-25 mt-5">
        <h4 class="text-center">Register Form</h4>
        <form action="" method="post" class="border p-1">

            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
            <br>
            <input type="submit" class="form-control bg-success">
        </form>
    </div>
@endsection