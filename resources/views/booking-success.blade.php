@extends('layouts.master')

@section('content')
    <div class="container w-50 text-center mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-success">🎉 Booking Successful!</h2>
            <p class="lead">Thank you, <strong>{{ session('name') }}</strong>! Your booking for
                <strong>{{ session('event_name') }}</strong> has been confirmed.
            </p>
            <p><strong>Tickets:</strong> {{ session('ticket_quantity') }}</p>
            <p><strong>Total Paid:</strong> &#8377;{{ session('amount') }}</p>
            <div class="d-flex justify-content-center">
                <a href="{{ url('/') }}" class="btn btn-warning mt-3" style="width: max-content">Return to Home</a>
            </div>
        </div>
    </div>
@endsection
